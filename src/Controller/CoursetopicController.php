<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\TopicsJason;

/**
 * Coursetopic Controller
 *
 * @property \App\Model\Table\CoursetopicTable $Coursetopic
 */
class CoursetopicController extends AppController
{
    public $helpers=['Ajax','Javascript'];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow('topicversion');
    }

    public function index($versionid)
    {
        $curfolder=new \Cake\Filesystem\Folder();
        $this->log('pwd: '.__DIR__);
        $this->request->session()->write('versionid', $versionid);
        $coursetopic = $this->Coursetopic->Courseversion->get($versionid,[
            'contain' => ['maintopic']
        ])->maintopic;
        $this->loadModel('Testcategory');
        $tcats=  $this->Testcategory->find()
                ->where(['tcategoryname NOT IN' => ['Final exam','Placement test']])->all();
        $this->request->session()->write('roottopicid', $coursetopic->topicid);
        $this->set('tcats', $tcats);
        //$this->set('maintopicid', $coursetopic->topicid);
        
    }
    
    public function loadContents(){
        $this->log('load contents called...');
        $this->viewBuilder()->layout('ajax');
        $rootid=$this->request->session()->read('roottopicid');
        $this->log('loading subtopics of:'.$rootid);
        $roottopics= $this->Coursetopic->//find('all')->find('threaded')->toArray();
                find('children', ['for' => $rootid])->
                find('threaded',[
                    'keyField' => $this->Coursetopic->primaryKey(),
                    'parentField' => 'parenttopicid'
                ])->toArray();
        $this->log('loaded topics: '.json_encode($roottopics));
        $maintopic=  $this->Coursetopic->get($rootid);
        $maintopic->children=$roottopics;
        $this->set(array($maintopic));
        
        //$this->set('_serialize', ['roottopics']);
    }

    private function findTopicChildren($topic, $maxtopic=  array()){
        $this->log('before topic id:'.$topic->topicid);
        $topicjason=new TopicsJason($topic->topicid, $topic->description, $topic->topictitle, 
                ' '.$topic->traininghours.' ');
        if($topic->firstchild==NULL){
            $this->log('first child is null');
            $topic->subtopics=array();
            $topicjason->children=NULL;
            return $topicjason;
        }
        
        $current=$topic->firstchild;
        $topic->subtopics=array();
        while($current!=NULL){
            
            $current=  $this->Coursetopic->get($current->topicid,[
                'contain' => ['firstchild', 'prevtopic','nexttopic']
            ]);
            array_push($topicjason->children, $this->findTopicChildren($current));
            $this->log('after topic id:'.$topic->topicid);
            $this->log('a new child appended');
            if(array_key_exists($current->topicid, $maxtopic)){
                break;
            }
            $current=$current->nexttopic;
        }
        //$this->log('number of children:'.array_count_values($topic->children));
        return $topicjason;
    }
    
    public function questiontopics($topicid=null){
        $this->viewBuilder()->layout('ajax');
        $topicspath=  $this->Coursetopic->find('path', ['for' => $topicid])->toArray();
        $rootid=$topicid;
        $this->log($topicid.' path to root: '.json_encode($topicspath));
        if(count($topicspath)>0){
            $rootid=$topicspath[0]->topicid;
        }
        
        $roottopics=  $this->Coursetopic->//find('all')->find('threaded')->toArray();
                find('children', ['for' => $rootid])->
                find('threaded',[
                    'keyField' => $this->Coursetopic->primaryKey(),
                    'parentField' => 'parenttopicid'
                ])->toArray();
        $maintopic=  $this->Coursetopic->get($rootid);
        $maintopic->children=$roottopics;
        $topicslist=array();
        if($maintopic!=NULL){
            array_push($topicslist, new \App\Utility\Topicslist($maintopic->topicid, 
                    $maintopic->topictitle,  $this->getlistchildren($maintopic)));
        }
        $this->set( $topicslist);
    }
    
    public function getlistchildren($ctjson){
        $children=array();
        if(count($ctjson->children)==0){
            return $children;
        }
        foreach($ctjson->children as $child){
            array_push($children, new \App\Utility\Topicslist($child->topicid, $child->topictitle,  
            $this->getlistchildren($child)));
        }
        return $children;
    }

        private function findlastleave($topic){
        $last=$topic;
        $current=$topic;
        while($current!=NULL){
            $last=$current;
            $current=  $this->Coursetopic->get($current->topicid,[
                'contain' => ['firstchild', 'prevtopic','nexttopic']
            ]);
            $current= $this->findLastChild($current);
        }
        return $last;
    }
    
    public function topicversion($tid){
        //$this->viewBuilder()->layout('ajax');
        $root=  $this->findroot($this->Coursetopic->get($tid));
        $this->log($root->topicid);
        $version=  $this->Coursetopic->get($root->topicid,[
            'contain' => ['courseversion']
        ])->courseversion;
//$this->log($version->courseversion->versionid);
        $this->response->body($version->versionid);
        //$this->set('versionid', $version->versionid);
        return $this->response;
    }


    private function findroot($topic){
        $root=$topic;
        $current=$topic;
        while ($current!=null){
            $root=$current;
            $current=  $this->Coursetopic->get($current->topicid,[
                'contain' => ['firstchild','parenttopic']
            ])->parenttopic;
        }
        return $root;
    }

    /**
     * View method
     *
     * @param string|null $id Coursetopic id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coursetopic = $this->Coursetopic->get($id, [
            'contain' => []
        ]);
        $this->request->session()->write('topicid', $id);
        $this->loadModel('Testcategory');
        $testcats=  $this->Testcategory->find()
                ->where(['tcategoryname NOT IN' => ['Final exam','Placement test']])->all();;

        $this->set('testcats', $testcats);
        $this->set('coursetopic', $coursetopic);
        $this->set('_serialize', ['coursetopic']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($reftid=null, $hitmode=null)
    {
        $this->viewBuilder()->layout('window');
        $coursetopic = $this->Coursetopic->newEntity();
        if($hitmode!=null && $reftid!=NULL){
            $this->request->session()->write('hitmode', $hitmode);
            $this->request->session()->write('reftid', $reftid);
        }
        
        if ($this->request->is('post')) {
            $result=$this->savetopic(
                    $this->Coursetopic->patchEntity($coursetopic, $this->request->data));
            
            if ($result) {//should save the previous and next topics.
                $this->Flash->success(__('The coursetopic has been saved.'));

                //return $this->redirect(['action' => 'index',  $this->request->session()->read('versionid')]);
            } 
            else {
                $this->Flash->error(__('The coursetopic could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('coursetopic'));
        $this->set('_serialize', ['coursetopic']);
    }
    
    private function findLastChild($topic){
        if($topic->firstchild==null){
            return null;
        }
        $last=$topic->firstchild;
        $last=  $this->Coursetopic->get($last->topicid,[
            'contain' => ['nexttopic']
        ]);
        while($last->nexttopic!=NULL){
            $last=$last->nexttopic;
            $last=  $this->Coursetopic->get($last->topicid,[
            'contain' => ['nexttopic']
            ]);
        }
        return $last;
        
    }
    
    private function movestepsup($coursetopic, $nosteps){
        $this->log('moving topic up '.$nosteps.' steps');
        for($i=0;$i<$nosteps;$i++){
            $this->Coursetopic->moveUp($coursetopic);
        }
    }
    
    private function movestepsdown($coursetopic, $nosteps){
        $this->log('moving topic down '.$nosteps.' steps');
        for($i=0;$i<$nosteps;$i++){
            $this->Coursetopic->moveDown($coursetopic);
        }
    }

    private function savetopic($coursetopic, $hitmode=null, $reftid=null){
        if($hitmode==NULL){
            $hitmode=  $this->request->session()->read('hitmode');
        }
        if($reftid==NULL){
            $reftid=  $this->request->session()->read('reftid');
        }
        $this->log('saving new topic');
        $parentid=$reftid;
        $msteps=0;//move steps.
        $reftopic=  $this->Coursetopic->get($reftid);
        if(!($hitmode=='over' || $hitmode=='append')){
            $parentid=$reftopic->parenttopicid;
            //if parent id is null throw exception
            $msteps= $this->countsteps($parentid, $reftopic->lft);
                    
            if($hitmode=='before' || $hitmode=='top'){
                $msteps++;
            }
        }
        if($parentid==NULL){
            throw new \Cake\Network\Exception\MethodNotAllowedException(
                    __('A course can has only one root topic'));
        }
        $this->log('hit mode:'.$hitmode.' reference:'.$reftid.' move steps:'.$msteps);
        
        $coursetopic->versionid=$reftopic->versionid;
        $coursetopic->parenttopicid=$parentid;
        if($this->Coursetopic->save($coursetopic)){
            $this->log('course topic saved');
            $this->movestepsup($coursetopic, $msteps);
            return true;
        }else{
            $this->log('error saving topic:'.$coursetopic->errors());
            return false;
        }
        /*
        if($hitmode=='over' || $hitmode=='append'){
            $coursetopic->parenttopicid=$reftid;
            $coursetopic->previoustopicid=  $this->findLastChild($reftopic)==NULL? NULL:
                    $this->findLastChild($reftopic)->previoustopicid;
            return $coursetopic;
        }
        $coursetopic->parenttopicid=$reftopic->parenttopicid;
        if($hitmode=='before' || $hitmode=='top'){
            $coursetopic->previoustopicid=$reftopic->previoustopicid;
            $coursetopic->nexttopic=$reftopic;
            //$reftopic->prevtopic=$coursetopic;
        }
        else{
            if($reftopic->nexttopic!=NULL){
                $coursetopic->nexttopic=$reftopic->nexttopic;
                //$reftopic->nexttopic->prevtopic=$coursetopic;
            }
            $coursetopic->prevtopic=$reftopic;
        }
        return $coursetopic;
         * 
         */
    }

    /**
     * Edit method
     *
     * @param string|null $id Coursetopic id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $coursetopic = $this->Coursetopic->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //if request data contains parentid, lft or rght throw exception
            $coursetopic = $this->Coursetopic->patchEntity($coursetopic, $this->request->data);
            if($coursetopic->parenttopicid==NULL){
                if(!$this->isroot($coursetopic->topicid, $coursetopic->versionid)){
                    throw new \Cake\Network\Exception\MethodNotAllowedException(
                    __('A course version can has only one root topic'));
                }
            }
            if ($this->Coursetopic->save($coursetopic)) {
                $this->log('course topic edited');
                $this->Flash->success(__('The coursetopic has been saved.'));

                //return $this->redirect(['action' => 'index', $this->request->session()->read('versionid')]);
            } else {
                $this->log('error editing course topic: '.json_encode($coursetopic->errors()));
                $this->Flash->error(__('The coursetopic could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('coursetopic'));
        $this->set('_serialize', ['coursetopic']);
    }
    
    private function isroot($topicid, $versionid){
        $this->loadModel('Courseversion');
        $vroot=  $this->Courseversion->get($versionid,[
            'contain' => ['maintopic']
        ])->maintopic;
        return $vroot->topicid==$topicid;
    }

    /**
     * Delete method
     *
     * @param string|null $id Coursetopic id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        //$this->request->allowMethod(['post', 'delete']);
        $coursetopic = $this->Coursetopic->get($id);
        if($coursetopic->parenttopicid==NULL){
            throw new \Cake\Network\Exception\MethodNotAllowedException(
                    __('It is not allowed to remove a root topic'));
        }
        if ($this->Coursetopic->delete($coursetopic)) {
            $this->log('topic '.$id.' removed');
        } else {
            $this->log('error deleting topic '.$id);
            $this->log(json_encode($coursetopic));
        }

        //return $this->redirect(['action' => 'index', $this->request->session()->read('versionid')]);
    }
    
    public function moveNode($snodeid, $refnodeid, $hitmode){
        $this->log('moving node...');
        $this->viewBuilder()->layout('ajax');
        $sourcetopic=  $this->Coursetopic->get($snodeid);
        $parentid=$refnodeid;
        $targetleft=-1;
        $tordermodifier=0;
        if(!($hitmode=='over' || $hitmode=='append')){
            $reftopic=  $this->Coursetopic->get($refnodeid);
            $parentid=$reftopic->parenttopicid;
            //if parent id is null throw exception
            $targetleft=$reftopic->lft;
            if($hitmode=='before' || $hitmode=='top'){
                $tordermodifier=1;
            }
            
        }
        if($parentid==NULL){
            throw new \Cake\Network\Exception\MethodNotAllowedException(
                    __('It is not allowed to remove a root topic'));
        }
        $this->log('hit mode:'.$hitmode.' reference:'.$refnodeid);
        $sourcetopic->parenttopicid=$parentid;
        if($this->Coursetopic->save($sourcetopic)){
            $this->log('move node parent updated');
            if($targetleft!=-1){
                $torder=  $this->countsteps($parentid, $targetleft);
                $sorder=  $this->countsteps($parentid, $sourcetopic->lft);
                $nosteps=$torder-$sorder;
                if($nosteps>0){//moving up
                    $this->movestepsup($sourcetopic, $nosteps+$tordermodifier-1);
                }else{
                    $this->movestepsdown($sourcetopic, abs($nosteps+$tordermodifier));
                }
            }
        }else{
            $this->log('move node error updating parent:'.$sourcetopic->errors());
        }
        /*
        $snext=$sourcetopic->nexttopic;
        if($snext!=null){
            $snext->previoustopicid=$sourcetopic->previoustopicid;
            $this->Coursetopic->save($snext);
        }
        $sourcetopic=  $this->fillAssociations($sourcetopic, $hitmode, $refnodeid);
        $this->Coursetopic->save($sourcetopic);
         * 
         */
    }
    
    private function countsteps($parentid, $minlft){
        return $this->Coursetopic->find('all', [
                'conditions' => ['parenttopicid' => $parentid, 'lft >' => $minlft]
            ])->count();
    }

    public function addtest($topicid, $tcatid){//add a quiz or assignment to a topic
        $this->request->session()->write('topicid', $topicid);
        return $this->redirect(['controller' => 'evaltest', 'action' => 'add', $tcatid]);
    }
}
