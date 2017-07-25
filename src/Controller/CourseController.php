<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Propertygrid;

/**
 * Course Controller
 *
 * @property \App\Model\Table\CourseTable $Course
 */
class CourseController extends AppController
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
        $course = $this->paginate($this->Course);

        $this->set(compact('course'));
        $this->set('_serialize', ['course']);
    }
    
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $courses=  $this->Course->find('all',[
            'contain' => ['category', 'owner.person'],
            'order' => ['courseid' => 'DESC']
        ]);
        $this->set('total', count($courses));
        $this->set('rows',$courses);
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->request->session()->write('courseid', $id);
        $course = $this->Course->get($id, [
            'contain' => ['Fieldofstudy', 'category','owner.person']
        ]);

        $this->set('course', $course);
        $this->set('_serialize', ['course']);
    }
    
    public function loadProperty(){
        $this->viewBuilder()->layout('ajax');
        $courseid=  $this->request->session()->read('courseid');
        $course = $this->Course->get($courseid, [
            'contain' => ['Fieldofstudy', 'category','owner.person']
        ]);
        $props[0]=new Propertygrid('Course number', $course->coursenumber, '');
        $props[1]=new Propertygrid('Course name', $course->coursename, '');
        $props[2]=new Propertygrid('Category', $course->category->categoryname, '');
        $props[3]=new Propertygrid('Course status', $course->coursestatus, '');
        $props[4]=new Propertygrid('Last version', $course->lastversion, '');
        $props[5]=new Propertygrid('Created by', $course->owner->person->personname, '');
        $this->set('total',count($props));
        $this->set('rows', $props);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('window');
        $course = $this->Course->newEntity();
        $this->loadModel('Coursecategory');
        $categories=  $this->Coursecategory->find('list')
                ->notMatching('subcats');
        if ($this->request->is('post')) {
            $course = $this->Course->patchEntity($course, $this->request->data, [
                'associated' => ['versions']
            ]);
            $course->coursestatus='active';
            $course->lastversion=1;
            $course->createdby=  $this->Auth->user('userid');
            $course->createdon= new \DateTime();
            $course->versions[0]->versionstatus='active';
            $course->versions[0]->versionseq=1;
            $course->versions[0]->createdby=$this->Auth->user('userid');
            //$course->versions[0]->service->stypeid=  $this->initservice('courseversion')->stypeid;
            $this->loadModel('Coursetopic');
            $maintopic=  $this->Coursetopic->newEntity();
            $maintopic->topictitle=$course->versions[0]->versionname;
            $maintopic->traininghours=$course->versions[0]->traininghours;
            $course->versions[0]->maintopic=$maintopic;
            if ($this->Course->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                $this->log('New course added');
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
                $this->log('error adding course: '.json_encode($course->errors()));
            }
        }
        $fieldofstudy = $this->Course->Fieldofstudy->find('list', ['limit' => 200]);
        $this->set(compact('course', 'fieldofstudy'));
        //$this->set('currencies', $this->Service->getcurrencies());
        $this->set('categories', $categories);
        $this->set('_serialize', ['course']);
    }
    
    private function initservice(){
        return $this->Service->initService('courseversion');
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $course = $this->Course->get($id, [
            'contain' => ['Fieldofstudy']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Course->patchEntity($course, $this->request->data);
            if ($this->Course->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                $this->log('Course '.$course->coursename.' edited successfully.');
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
                $this->log('Error editing Course '.$course->coursename.' :  '
                        .  json_encode($course->errors()));
            }
        }
        $fieldofstudy = $this->Course->Fieldofstudy->find('list', ['limit' => 200]);
        $this->loadModel('Coursecategory');
        $categories=  $this->Coursecategory->find('list')
                ->notMatching('subcats');
        $this->set('categories', $categories);
        $this->set(compact('course', 'fieldofstudy'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Course->get($id);
        if ($this->Course->delete($course)) {
            $this->log('Course '.$course->coursename.' deleted successfully.');
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->log('Error deleting Course '.$course->coursename.' :   '.
                    json_encode($course->errors()));
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
