<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Courseversion Controller
 *
 * @property \App\Model\Table\CourseversionTable $Courseversion
 */
class CourseversionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Service');
    }

/*
    public function index()
    {
        $this->paginate=[
            'contain' => ['course']
        ];
        $courseversion = $this->paginate($this->Courseversion);
        $this->log('number of versions:'.$courseversion->count());

        $this->set(compact('courseversion'));
        $this->set('_serialize', ['courseversion']);
    }
  
 * 
 */  
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $courseid=  $this->request->session()->read('courseid');
        $versions=  $this->Courseversion->find('all',[
            'conditions' => ['courseid' => $courseid],
            'order' => ['versionseq' => 'DESC']
        ]);
        $this->set('total', count($versions));
        $this->set('rows', $versions);
    }

    


    /**
     * View method
     *
     * @param string|null $id Courseversion id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courseversion = $this->Courseversion->get($id, [
            'contain' => []
        ]);

        $this->set('courseversion', $courseversion);
        $this->set('_serialize', ['courseversion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('window');
        $courseid=  $this->request->session()->read('courseid');
        $courseversion = $this->Courseversion->newEntity();
        $courseversion->courseid=$courseid;
        if ($this->request->is('post')) {
            $courseversion = $this->Courseversion->patchEntity($courseversion, $this->request->data);
            $courseversion->createdby=$this->Auth->user('userid');
            $courseversion->versionstatus='active';
            $courseversion->course=  $this->findcourse($courseversion->courseid);
            $courseversion->course->lastversion++;
            $courseversion->versionseq=$courseversion->course->lastversion;
            $maintopic=  $this->Courseversion->Maintopic->newEntity();
            $maintopic->topictitle=$courseversion->versionname;
            $maintopic->traininghours=$courseversion->traininghours;
            $courseversion->maintopic=$maintopic;
            $this->log('adding version to '.$courseversion->course->coursename);
            if ($this->Courseversion->save($courseversion)) {
                $this->Flash->success(__('The courseversion has been saved.'));
                $this->log('new version created ');
            } else {
                $this->log('error creating version: '.json_encode($courseversion->errors()));
                $this->Flash->error(__('The courseversion could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('courseversion'));
        $this->set('_serialize', ['courseversion']);
    }
    
    private function findcourse($courseid){
        $this->loadModel('Course');
        return $this->Course->get($courseid);
    }

    /**
     * Edit method
     *
     * @param string|null $id Courseversion id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $courseversion = $this->Courseversion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courseversion = $this->Courseversion->patchEntity($courseversion, $this->request->data);
            $this->log('editing version: '.$courseversion->versionname);
            if ($this->Courseversion->save($courseversion)) {
                $this->log('version saved');
            } else {
                $this->log('error editing version: '.json_encode($courseversion->errors()));
            }
        }
        $this->set(compact('courseversion'));
        $this->set('_serialize', ['courseversion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Courseversion id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $courseversion = $this->Courseversion->get($id);
        $course=  $this->findcourse($courseversion->courseid);
        if($course->lastversion==$courseversion->versionseq){
            $course->lastversion--;
        }
        if ($this->Courseversion->delete($courseversion)) {
            $this->log('course version '.$id.' deleted');
            $this->Course->save($course);
            $this->log('course saved');
        } else {
            $this->log('error deleting version '.$id.' '.json_encode($courseversion->errors()));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
