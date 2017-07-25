<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Evaltest Controller
 *
 * @property \App\Model\Table\EvaltestTable $Evaltest
 */
class EvaltestController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize() {
        $this->loadComponent('Service');
        return parent::initialize();
    }

    public function index()
    {
        $evaltest = $this->paginate($this->Evaltest);

        $this->set(compact('evaltest'));
        $this->set('_serialize', ['evaltest']);
    }
    
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $topicid=  $this->request->session()->read('topicid');
        $tests=  $this->Evaltest->find('all', [
            'conditions' => ['topicid' => $topicid],
            'contain' => ['testcategory']
        ]);
        
        $this->set('total', count($tests));
        $this->set('rows', $tests);
    }

    /**
     * View method
     *
     * @param string|null $id Evaltest id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evaltest = $this->Evaltest->get($id, [
            'contain' => []
        ]);
        
        $this->set('evaltest', $evaltest);
        $this->set('_serialize', ['evaltest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    
    public function viewid($id){
        $this->viewBuilder()->layout('ajax');
        $this->set('testid',$id);
    }
    
    public function testquestions($testid=NULL){
        //\Cake\Cache\Cache::clear();
        $this->viewBuilder()->layout('ajax');
        if($this->request->session()->check('curtest')){
            $testid=  $this->request->session()->read('curtest');
        }
        if($testid==NULL){
            $this->set('total', 0);
            $this->set('rows', array());
            return;
        }
        $evaltest=  $this->Evaltest->get($testid);
        $this->log('evaltest '.$evaltest->testdescription);
        $testquestions=  $this->Evaltest->get($testid,[
            'contain' => ['Question.qdifficulty','Question.questiontype',
                'Question' => ['sort' => ['EvaltestQuestions.questionnumber' => 'ASC']]]
        ])->question;
        $total=  count($testquestions);
        $this->log('test questions:'.$total);
        $tquestions=array();
        //$testquestions=  json_encode($testquestions);
        foreach ($testquestions as $tq){
            $jsontq=new \App\Utility\Tquestion($tq->questionid, $tq->typename, $tq->questiondescription, 
                    $tq->difficulty, $tq->points, $tq->negativepoints);
            array_push($tquestions, $jsontq);
            
        }
        $this->set('total', $total);
        $this->set('rows', $tquestions);
        
    }
    
    public function importquestionsdata(){
        /*
         * find related course (if any) and its specializations.
         * find related specialization (if any) and its courses.
         * find questions where courseid in related courses or specialization in related
         * specializations and course id is null
         */
        $curtest=  $this->Evaltest->get($this->request->session()->read('curtest'),[
            'contain' => ['coursetopic.courseversion','placementtest','Question']
        ]);
        $relatedcourses=array();
        $relatedspecializations=array();
        if($curtest->coursetopic!=NULL){
            array_push($relatedcourses, $curtest->coursetopic->courseversion->courseid);
            //find course specializations:
            /*
             * select specializationid from specialization inner join with slevels.courses where courses.courseid=
             * current test course id
             */
        }
        else if($curtest->placementtest!=NULL){
            array_push($relatedspecializations, $curtest->placementtest->specializationid);
            $relatedcourses=  $this->specializationcourses($curtest->placementtest->specializationid);
        }
        //select from tests where ptestid=curtest->ptestid or topic->versionid in versions
        $this->loadModel('Question');
        /*
         * select from questions where courseid in relatedcourses or (
         * specializationid in related specializations and courseid is null)
         * inner join with Evaltest (where testid!=current test id)
         */
        $othertests=  $this->Evaltest->find()
        ->innerJoinWith('coursetopic.courseversion', function($q) use ($relatedcourses){
            return $q->where(['courseid IN' => $relatedcourses]);
        })->contain(['Question'])->all();
        if($curtest->placementtest!=NULL){
            $spid=$curtest->placementtest->specializationid;
            array_merge($othertests, $this->Evaltest->find()
                    ->contain([
                        'Question',
                        'placementtest' => function ($q) use ($spid){
                        return $q->where(['specializationid' => $spid]);
                        }
                        ])
                    ->where(['testid NOT IN' => [$curtest->testid]])->all());
        }
        $ctquestions=array();
        foreach($curtest->question as $ctqs){
            $ctquestions[$ctqs->questionid]=$ctqs->questionid;
        }
        $otqestions=array();
        foreach ($othertests as $otest){
            foreach ($otest->question as $oqs){
                if(!array_key_exists($oqs->questionid, $ctquestions)){
                    $otqestions[$oqs->questionid]=$oqs->questionid;
                }
            }
        }
        
        $imquestions=  $this->Question->find('all',[
            'conditions' => ['questionid NOT IN' => $ctquestions, 'questionid IN' => $otqestions],
            'contain' => ['qdifficulty','questiontype','questionoptions','subquestions']
        ]);
        $this->set('imquestions', $imquestions);
        
    }
    
    private function specializationcourses($spid){
        $this->loadModel('Specialization');
        $currentsp=  $this->Specialization->get($spid, [
            'contain' => ['slevels.courses']
        ]);
        $versions=array();
        
            foreach ($currentsp->slevels as $level){
                foreach ($level->courses as $course){
                    array_push($versions, $course->courseid);
                }
            }
        
        
        return $versions;
    }

    public function add($param, $op='add')
    {
        $evaltest=NULL;
        if($op=='add'){
            $evaltest= $this->initTest($param);
        }else{
            $evaltest=  $this->loadtest($param);
        }
        $this->request->session()->write('curtest', $evaltest->testid);
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->log('saving evaltest...'.$this->request->data()['testid']);
            
            $evaltest = $this->Evaltest->patchEntity($evaltest, $this->request->data,[
                'associated' => ['placementtest']
            ]);
            
            $this->log('saving evaltest...'.$evaltest->testid);
            
            if ($this->Evaltest->save($evaltest)) {
                $this->log('evaltest has been saved:'.$evaltest->testid);
                //$this->Flash->success(__('The evaltest has been saved.'));
                //set layout to ajax.
                //return test id.
                
                $this->request->session()->write('curtest', $evaltest->testid);
                return $this->redirect(['action' => 'viewid', $evaltest->testid]);
            } else {
                $this->log('failed to save evaltest: '.  json_encode($evaltest->errors()));
                $this->log('test id: '.$evaltest->testid.' ,duration: '.$evaltest->testduration);
                $this->Flash->error(__('The evaltest could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Questiontype');
        $qtypes=  $this->Questiontype->find('all');
        $this->set('qtypes', $qtypes);
        $this->set('currencies', $this->Service->getcurrencies());
        $this->set(compact('evaltest'));
        $this->set('_serialize', ['evaltest']);
    }
    
    private function initTest($tcatid){
        $evaltest = $this->Evaltest->newEntity();
        $this->loadModel('Testcategory');
        $testcategory=  $this->Testcategory->get($tcatid);
        $evaltest->testcategory=$testcategory;
        $evaltest->tcategoryid=$tcatid;
        $evaltest->durationunitfactor=1;
        if($testcategory->ishomework==1){
            $evaltest->durationunitfactor=24;
        }
        if($testcategory->tcategoryname=='Placement test'){
            $evaltest->placementtest=  $this->request->session()->read('ptest');
        }else{
            $evaltest->topicid=  $this->request->session()->read('topicid');
        }
        
        return $evaltest;
    }
    
    private function loadtest($id){
        $evaltest = $this->Evaltest->get($id, [
                        'contain' => ['testcategory','placementtest']
                    ]);
        return $evaltest;
    }

    /**
     * Edit method
     *
     * @param string|null $id Evaltest id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evaltest = $this->Evaltest->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evaltest = $this->Evaltest->patchEntity($evaltest, $this->request->data);
            if ($this->Evaltest->save($evaltest)) {
                $this->Flash->success(__('The evaltest has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evaltest could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('evaltest'));
        $this->set('_serialize', ['evaltest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evaltest id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $evaltest = $this->Evaltest->get($id);
        if ($this->Evaltest->delete($evaltest)) {
            $this->log('The evaltest has been deleted.');
        } else {
            $this->log('The evaltest could not be deleted. '.  json_encode($evaltest->errors()));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
