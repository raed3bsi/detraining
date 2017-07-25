<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Coursecategory Controller
 *
 * @property \App\Model\Table\CoursecategoryTable $Coursecategory
 */
class CoursecategoryController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
    }
    
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $query=  $this->Coursecategory->find('threaded',[
            'keyField' => $this->Coursecategory->primaryKey(),
            'parentField' => 'parentcategory'
        ]);
        $query->select(['nocourses' => $query->func()->count('courses.courseid')])
                ->leftJoinWith('courses')->group(['Coursecategory.categoryid'])
                ->autoFields(true)
                ;
        $categories=$query->toArray();
        $this->set($categories);
    }

    /**
     * View method
     *
     * @param string|null $id Coursecategory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coursecategory = $this->Coursecategory->get($id, [
            'contain' => []
        ]);

        $this->set('coursecategory', $coursecategory);
        $this->set('_serialize', ['coursecategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($parentcatid=NULL)
    {
        $this->viewBuilder()->layout('window');
        $coursecategory = $this->Coursecategory->newEntity();
        $coursecategory->parentcategory=$parentcatid;
        
        if ($this->request->is('post')) {
            $coursecategory = $this->Coursecategory->patchEntity($coursecategory, $this->request->data);
            //check if parent category has courses or not if it has throw exception
            if ($this->Coursecategory->save($coursecategory)) {
                $this->Flash->success(__('The coursecategory has been saved.'));
                $this->log('Course category saved');
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coursecategory could not be saved. Please, try again.'));
                $this->log('error saving category:'.json_encode($coursecategory->errors()));
            }
        }
        $this->set(compact('coursecategory'));
        $this->set('_serialize', ['coursecategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Coursecategory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $coursecategory = $this->Coursecategory->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursecategory = $this->Coursecategory->patchEntity($coursecategory, $this->request->data);
            if ($this->Coursecategory->save($coursecategory)) {
                $this->Flash->success(__('The coursecategory has been saved.'));

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coursecategory could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('coursecategory'));
        $this->set('_serialize', ['coursecategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coursecategory id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coursecategory = $this->Coursecategory->get($id);
        if ($this->Coursecategory->delete($coursecategory)) {
            $this->Flash->success(__('The coursecategory has been deleted.'));
        } else {
            $this->Flash->error(__('The coursecategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
