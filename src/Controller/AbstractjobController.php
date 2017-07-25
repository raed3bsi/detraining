<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Abstractjob Controller
 *
 * @property \App\Model\Table\AbstractjobTable $Abstractjob
 */
class AbstractjobController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $abstractjob = $this->paginate($this->Abstractjob);

        $this->set(compact('abstractjob'));
        $this->set('_serialize', ['abstractjob']);
    }
    
    public function findlist(){
        $this->viewBuilder()->layout('ajax');
        $absjobs=  $this->Abstractjob->find('all')->toArray();
        $this->set($absjobs);
    }

    /**
     * View method
     *
     * @param string|null $id Abstractjob id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abstractjob = $this->Abstractjob->get($id, [
            'contain' => []
        ]);

        $this->set('abstractjob', $abstractjob);
        $this->set('_serialize', ['abstractjob']);
    }
    

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('ajax');
        $abstractjob = $this->Abstractjob->newEntity();
        if ($this->request->is('post')) {
            $abstractjob = $this->Abstractjob->patchEntity($abstractjob, $this->request->data);
            $abstractjob->securitygroup=  $this->initsgroup($abstractjob->jobname);
            if ($this->Abstractjob->save($abstractjob)) {
                $this->Flash->success(__('The abstractjob has been saved.'));
                $this->log('job saved');

                //return $this->redirect(['action' => 'index']);
            } else {
                
                
                $this->log('error saving job');
                $this->log(json_encode($abstractjob->errors()));
                $this->Flash->error(__('The abstractjob could not be saved. Please, try again.'));
                return;
            }
        }
        $this->set(compact('abstractjob'));
        $this->set('_serialize', ['abstractjob']);
    }
    

    private function initsgroup($groupname){
        $this->loadModel('Securitygroup');
        $sgroup=  $this->Securitygroup->newEntity();
        $sgroup->sgtypeid=  $this->findsgtype();
        $sgroup->sgroupstatus='Active';
        $sgroup->sgroupname=$groupname;
        return $sgroup;
    }


    private function findsgtype(){
        $this->loadModel('Sgrouptype');
        return $this->Sgrouptype->find('all',[
            'conditions' => ['sgtypecode' => 'absjob']
        ])->first()->sgtypeid;
    }

    /**
     * Edit method
     *
     * @param string|null $id Abstractjob id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abstractjob = $this->Abstractjob->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abstractjob = $this->Abstractjob->patchEntity($abstractjob, $this->request->data);
            if ($this->Abstractjob->save($abstractjob)) {
                $this->Flash->success(__('The abstractjob has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The abstractjob could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('abstractjob'));
        $this->set('_serialize', ['abstractjob']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Abstractjob id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abstractjob = $this->Abstractjob->get($id);
        if ($this->Abstractjob->delete($abstractjob)) {
            $this->Flash->success(__('The abstractjob has been deleted.'));
        } else {
            $this->Flash->error(__('The abstractjob could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
