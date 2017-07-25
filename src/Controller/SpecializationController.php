<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Specialization Controller
 *
 * @property \App\Model\Table\SpecializationTable $Specialization
 */
class SpecializationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $specialization = $this->paginate($this->Specialization);

        $this->set(compact('specialization'));
        $this->set('_serialize', ['specialization']);
    }
    
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $specializations=  $this->Specialization->find('all',[
            'contain' => 'slevels'
        ]);
        
        $this->set('total', count($specializations));
        $this->set('rows', $specializations);
    }

    /**
     * View method
     *
     * @param string|null $id Specialization id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialization = $this->Specialization->get($id, [
            'contain' => []
        ]);

        $this->set('specialization', $specialization);
        $this->set('_serialize', ['specialization']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('window');
        $specialization = $this->Specialization->newEntity();
        if ($this->request->is('post')) {
            $specialization = $this->Specialization->patchEntity($specialization, $this->request->data);
            if ($this->Specialization->save($specialization)) {
                $this->log('The specialization has been saved.');

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->log('error saving specialization: '.  json_encode($specialization->errors()));
            }
        }
        $this->set(compact('specialization'));
        $this->set('_serialize', ['specialization']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Specialization id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $specialization = $this->Specialization->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialization = $this->Specialization->patchEntity($specialization, $this->request->data);
            if ($this->Specialization->save($specialization)) {
                $this->Flash->success(__('The specialization has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The specialization could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('specialization'));
        $this->set('_serialize', ['specialization']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Specialization id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $specialization = $this->Specialization->get($id);
        if ($this->Specialization->delete($specialization)) {
            $this->log('The specialization has been deleted.');
        } else {
            $this->log('error saving specialization: '.  json_encode($specialization->errors()));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
