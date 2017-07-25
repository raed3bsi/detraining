<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Questionconf;
use Cake\Database\Expression\QueryExpression;

/**
 * Question Controller
 *
 * @property \App\Model\Table\QuestionTable $Question
 */
class QuestionController extends AppController
{
    public $paginate=[
        'limit' => 1,
        'maxLimit' => 1,
        'Question' => [
            'conditions' => ['parent_questionid IS' => null ]
        ]
        
    ];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    
    public function index()
    {
        $this->paginate=[
        
        'Question' => [
            'limit' => 1,
        
            'conditions' => ['parent_questionid IS' => null ]
        ]
        
    ];
        $this->loadModel('Questiontype');
        $qtypes=  $this->Questiontype->find('all');
        $question = $this->paginate($this->Question);

        $this->set('qtypes', $qtypes);
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }
    
    

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function viewtest($testid, $tsid=NULL){
        $this->viewBuilder()->layout('window');
        $this->paginate=[
        
            'Question' => [
                'limit' => 1,

                'conditions' => ['parent_questionid IS' => null ]
            ]
        
        ];
        $query = $this->Question->find()->contain([
            'questiontype','subquestions.correctanswers','questionoptions',
            'subquestions.questionanswer' => function ($q) use ($tsid){
                if($tsid==NULL){
                    return $q->where(['traineetsid IS' => NULL]);
                }
                return $q->where(['traineetsid' => $tsid]);
            },
            'questionanswer' => function ($q) use ($tsid){
                if($tsid==NULL){
                    return $q->where(['traineetsid IS' => NULL]);
                }
                return $q->where(['traineetsid' => $tsid]);
            }
        ])->matching('Evaltest', function($q) use($testid){
            return $q->where(['Evaltest.testid' => $testid]);
        })->orderAsc('EvaltestQuestions.questionnumber');
        //$this->set('total', $query->getIterator()->count());
        $this->set('qtestid', $testid);
        $this->set('questions', $this->paginate($query));
    }
    
    public function savequestionanswer($id,$tsid=NULL){
        $this->viewBuilder()->layout('ajax');
        $question=  $this->Question->get($id,[
            'contain' => ['questionanswer' => function ($q) use ($tsid){
                if($tsid==NULL){
                    return $q->where(['traineetsid IS' => NULL]);
                }
                return $q->where(['traineetsid' => $tsid]);
            },'subquestions.questionanswer' => function ($q) use ($tsid){
                if($tsid==NULL){
                    return $q->where(['traineetsid IS' => NULL]);
                }
                return $q->where(['traineetsid' => $tsid]);
            }]
        ]);
        $question = $this->Question->patchEntity($question, $this->request->data,[
                'associated' => ['questionanswer','subquestions.questionanswer']
            ]);
        $qanswers=array();
        $qans=$question->questionanswer[0];
        $qans->questionid=$question->questionid;
        array_push($qanswers, $qans);
        foreach ($question->subquestions as $subq){
            $ans=$subq->questionanswer[0];
            $ans->questionid=$subq->questionid;
            array_push($qanswers, $ans);
        }
        $this->loadModel('Questionanswer');
        
        if ($this->Questionanswer->saveMany($qanswers)) {

            $this->log('question answers saved');
        } else {
            $this->log('error while saving question answers: '.  json_encode($qanswers));
                //var_dump($qanswers);
        }
    }

    public function view($id = null)
    {
        $this->viewBuilder()->layout('window');
        $question = $this->initqanswer($id);
        $voptions=  explode(',', $question->questiontype->viewoptions);
        $options=array();
        if($voptions[0]==1){
            $options=  $this->loadOptions($id);
            shuffle($options);
        }
        $this->set('qoptions', $options);
        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }
    
    private function loadOptions($qid){
        $this->loadModel('Correctanswer');
        $canswers=  $this->Correctanswer->find()
                ->innerJoinWith('question', function($q) use($qid){
                    return $q->where(['parent_questionid' => $qid]);
                })->where(['answerdescription !=' => ''])->all();
        $options=array();
        foreach ($canswers as $ans){
            $options[$ans->answerdescription]=$ans->answerdescription;
        }
        return $options;
    }


    private function initqanswer($qid){
        $question = $this->Question->find()->contain([
            'questiontype',
            'subquestions' => function ($q){
                return $q->where(['questiondescription !=' => '']);
            }
        ])->where(['questionid' => $qid])->first();
        $this->loadModel('Questionanswer');
        if(count($question->subquestions)==0){
            $question->questionanswer=array();
            $question->questionanswer[0]=  $this->Questionanswer->newEntity();
        }else{
            $this->log('subquestions answers: '.count($question->subquestions));
            for ($i=0;$i<count($question->subquestions);$i++){
                $question->subquestions[$i]->questionanswer=array();
                $question->subquestions[$i]->questionanswer[0]=$this->Questionanswer->newEntity();
            }
        }
        $this->log('initqanswer: '.json_encode($question));
        return $question;
        
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($type=1, $op='add')
    {
        //$this->viewBuilder()->autoLayout(FALSE);
        $this->log('add question: '.$type.' , '.$op);
        $this->viewBuilder()->layout('window');
        $question=  $this->initquestion($type, $op);
        //$this->addnewsubs($question);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Question->patchEntity($question, $this->request->data,[
                'associated' => ['subquestions','subquestions.correctanswers', 'correctanswers'],
                'validate' => false
            ]);
            
            //$this->addoptions($question);
            //$this->removeEmpty($question);
            $question->owner=$this->Auth->user('userid');
            $this->log('user id:'.$this->Auth->user('userid'));
            if($question->questionid==NULL){
                
                if($this->request->session()->check('curtest')){
                    
                    $test=  $this->Question->Evaltest->get($this->request->session()->read('curtest'),
                            ['contain' => ['placementtest', 'coursetopic.courseversion','Question']]);
                    if($test->placementtest!=NULL){
                        $question->specializationid=$test->placementtest->specializationid;
                    }else if($test->coursetopic!=NULL){
                        $question->courseid=$test->coursetopic->courseversion->courseid;
                    }
                    $this->loadModel('EvaltestQuestions');
                    $tqs=$this->EvaltestQuestions->newEntity();
                    $tqs->questionnumber=count($test->question)+1;
                    $tqs->testid=$test->testid;
                    
                    $question->evaltest_questions=[$tqs];
                }
            }
            $this->log('saving question: '.json_encode($question));
            if ($this->Question->save($question)) {
                $this->log('question saved');
                //return $this->redirect(['action' => 'index']);
            } else {

                $this->log('error saving question: '.json_encode($question->errors()));
                
            }
        }
        $topic=  $this->findtesttopic($question);
        $this->loadModel('Questiondifficulty');
        $qdiffs=  $this->Questiondifficulty->find('list')
                ->order('difficultyid');
        $this->set('topic', $topic);
        $this->set('qdiffs',$qdiffs);
        $this->set('confs',['pbysub' => explode(',', $question->questiontype->initoptions)[3]]);
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }
    
    private function initquestion($param, $op){
        if($op=='add'){
          $question = $this->Question->newEntity();
          $this->loadModel('Questiontype');
          $qtype=  $this->Questiontype->get($param);
          $question->qtypeid=$qtype->qtypeid;
          $question->questiontype=$qtype;
          $question->correctanswers=array();
          $question->subquestions=array();
          $initops=  explode(',', $qtype->initoptions);
          for($i=0;$i<$initops[0];$i++){
              $subq=  $this->Question->newEntity();
              $subq->correctanswers=array();
              $this->addcorrectanswers($initops[1], $subq);
              array_push($question->subquestions, $subq);
          }
          $this->addcorrectanswers($initops[2], $question);
          return $question;
        }  else {
            $question=  $this->Question->get($param, [
                'contain' => ['questiontype','correctanswers','subquestions.correctanswers',
                    'questionoptions','coursetopic']
            ]);
            return $question;
        }
    }
    
    private function findtesttopic($question){
        if($question->coursetopic!=NULL){
            return $question->coursetopic;
        }
        if($this->request->session()->check('curtest')){
            return $this->Question->Evaltest->get($this->request->session()->read('curtest'),[
                'contain' => ['coursetopic']
            ])->coursetopic;
        }
        return null;
    }
    
    private function addcorrectanswers($noanswers, $question){
        $this->loadModel('Correctanswer');
        for($i=0;$i<$noanswers;$i++){
            array_push($question->correctanswers, $this->Correctanswer->newEntity());
        }
//        $this->log($question->correctanswers[0]->answerdescription);
    }
    
    

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function movequestion($targetid, $sourceid, $hit){
        $this->viewBuilder()->layout('ajax');
        $this->log('moving question '.$sourceid.' '.$hit.' '.$targetid);
        if($this->request->session()->check('curtest')){
            $testid=$this->request->session()->read('curtest');
            $positionfactor=1;
            $stepsize=1;
            $exp='questionnumber = questionnumber+1';
            $consA=1;
            $consB=0;
            if($hit=='top'){
                $positionfactor--;
            }
            $this->loadModel('EvaltestQuestions');
            $sno=  $this->question_number($sourceid, $testid);
            $tno=  $this->question_number($targetid, $testid);
            if($sno<$tno){
                $positionfactor--;
                $stepsize=-1;
                $consA=0;
                $consB=1;
                $exp='questionnumber = questionnumber-1';
            }
            $newposition=$tno+$positionfactor;
            $limit=$newposition+$stepsize*-1;
            $lower=$consA*$limit+$consB*$sno;
            $upper=$consA*$sno+$consB*$limit;
            $this->log('new position: '.$newposition.' , limit: '.$limit.' , lower: '.$lower.' , upper: '.
                    $upper);
            $expr=new QueryExpression($exp);
            $this->EvaltestQuestions->updateAll($expr, ['testid' => $testid,
                'questionnumber >' => $lower, 'questionnumber <' => $upper]);
            $this->EvaltestQuestions->updateAll(['questionnumber' => $newposition], ['testid' => $testid,
                'questionid' => $sourceid]);
        }
        
    
    }
    
    private function question_number($qid, $tid){
        
        $query=$this->EvaltestQuestions->find()
                ->where(['testid' => $tid, 'questionid' => $qid]);
        if($query->isEmpty()){
            return NULL;
        }
        $qnumber=  $query
                ->first()->questionnumber;
        return $qnumber;
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->log('removing question: '.$id);
        $this->request->allowMethod(['post', 'delete']);
        $removefrombank=  0;
        $this->log('params: '.json_encode($this->request->data));
        if(isset($this->request->data['rqparam'])){
            $removefrombank=$this->request->data['rqparam'];
        }
        else{
            return $this->redirect(['action' => 'index']);
        }
        $this->log('remove from bank flag: '.$removefrombank);
        if($removefrombank==1){
            $this->log('removing question from question bank');
            $question = $this->Question->get($id);
            if ($this->Question->delete($question)) {
                $this->log('The question has been deleted.');
            } else {
                $this->log('The question could not be deleted. '.  json_encode($question->errors()));
            }
        }
        else{
            $this->loadModel('EvaltestQuestions');
            if($this->request->session()->check('curtest') && $id!=NULL){
                $testid=  $this->request->session()->read('curtest');
                $query=$this->EvaltestQuestions->find()
                        ->where(['testid' => $testid, 'questionid' => $id]);
                if(!$query->isEmpty()){
                    $etestquestion=  $query->first();
                    if($this->EvaltestQuestions->delete($etestquestion)){
                        $this->log('question removed from test '.$testid);
                    }  else {
                        $this->log('error removing question from a test: '.json_encode($etestquestion->errors()));
                    }
                }
                
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
