<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fieldofstudy Controller
 *
 * @property \App\Model\Table\FieldofstudyTable $Fieldofstudy
 */
class FieldofstudyController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$fieldofstudy = $this->paginate($this->Fieldofstudy);

        //$this->set(compact('fieldofstudy'));
        //$this->set('_serialize', ['fieldofstudy']);
    }
    
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $fieldsofstudy=  $this->Fieldofstudy->find('all');
        
        $this->set('total', count($fieldsofstudy));
        $this->set('rows', $fieldsofstudy);
    }

    /**
     * View method
     *
     * @param string|null $id Fieldofstudy id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fieldofstudy = $this->Fieldofstudy->get($id, [
            'contain' => []
        ]);

        $this->set('fieldofstudy', $fieldofstudy);
        $this->set('_serialize', ['fieldofstudy']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('window');
        $fieldofstudy = $this->Fieldofstudy->newEntity();
        if ($this->request->is('post')) {
            $fieldofstudy = $this->Fieldofstudy->patchEntity($fieldofstudy, $this->request->data);
            if ($this->Fieldofstudy->save($fieldofstudy)) {
                $this->log('The fieldofstudy has been added.');
            } else {
                $this->log('error adding field of study: '.  json_encode($fieldofstudy->errors()));
            }
        }
        $this->set(compact('fieldofstudy'));
        $this->set('_serialize', ['fieldofstudy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fieldofstudy id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $fieldofstudy = $this->Fieldofstudy->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fieldofstudy = $this->Fieldofstudy->patchEntity($fieldofstudy, $this->request->data);
            if ($this->Fieldofstudy->save($fieldofstudy)) {
                $this->log('The fieldofstudy has been edited.');
            } else {
                $this->log('error editing field of study: '.  json_encode($fieldofstudy->errors()));
            }
        }
        $this->set(compact('fieldofstudy'));
        $this->set('_serialize', ['fieldofstudy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fieldofstudy id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $fieldofstudy = $this->Fieldofstudy->get($id);
        if ($this->Fieldofstudy->delete($fieldofstudy)) {
            $this->log('The fieldofstudy has been deleted.');
            } else {
                $this->log('error deleting field of study: '.  json_encode($fieldofstudy->errors()));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
