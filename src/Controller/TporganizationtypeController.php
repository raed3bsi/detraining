<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tporganizationtype Controller
 *
 * @property \App\Model\Table\TporganizationtypeTable $Tporganizationtype
 */
class TporganizationtypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$tporganizationtype = $this->paginate($this->Tporganizationtype);

        //$this->set(compact('tporganizationtype'));
        //$this->set('_serialize', ['tporganizationtype']);
    }
    
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $tporgtypes=  $this->Tporganizationtype->find('all');
        
        $this->set('total', count($tporgtypes));
        $this->set('rows', $tporgtypes);
    }

    /**
     * View method
     *
     * @param string|null $id Tporganizationtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tporganizationtype = $this->Tporganizationtype->get($id, [
            'contain' => []
        ]);

        $this->set('tporganizationtype', $tporganizationtype);
        $this->set('_serialize', ['tporganizationtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('window');
        $tporganizationtype = $this->Tporganizationtype->newEntity();
        if ($this->request->is('post')) {
            $tporganizationtype = $this->Tporganizationtype->patchEntity($tporganizationtype, $this->request->data);
            if ($this->Tporganizationtype->save($tporganizationtype)) {
                $this->log('The tporganizationtype has been saved.');

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->log('Error adding organization type: '.  json_encode($tporganizationtype->errors()));
            }
        }
        $this->set(compact('tporganizationtype'));
        $this->set('_serialize', ['tporganizationtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tporganizationtype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $tporganizationtype = $this->Tporganizationtype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tporganizationtype = $this->Tporganizationtype->patchEntity($tporganizationtype, $this->request->data);
            if ($this->Tporganizationtype->save($tporganizationtype)) {
                $this->log('The tporganizationtype has been edited.');

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->log('Error editing organization type: '.  json_encode($tporganizationtype->errors()));
            }
        }
        $this->set(compact('tporganizationtype'));
        $this->set('_serialize', ['tporganizationtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tporganizationtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $tporganizationtype = $this->Tporganizationtype->get($id);
        if ($this->Tporganizationtype->delete($tporganizationtype)) {
            $this->log('The tporganizationtype has been deleted.');
        } else {
            $this->log('error deleting organization type: '.  json_encode($tporganizationtype->errors()));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
