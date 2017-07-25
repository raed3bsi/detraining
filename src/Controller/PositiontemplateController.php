<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Positiontemplate Controller
 *
 * @property \App\Model\Table\PositiontemplateTable $Positiontemplate
 */
class PositiontemplateController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $positiontemplate = $this->paginate($this->Positiontemplate);

        $this->set(compact('positiontemplate'));
        $this->set('_serialize', ['positiontemplate']);
    }

    /**
     * View method
     *
     * @param string|null $id Positiontemplate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $positiontemplate = $this->Positiontemplate->get($id, [
            'contain' => []
        ]);

        $this->set('positiontemplate', $positiontemplate);
        $this->set('_serialize', ['positiontemplate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $positiontemplate = $this->Positiontemplate->newEntity();
        if ($this->request->is('post')) {
            $positiontemplate = $this->Positiontemplate->patchEntity($positiontemplate, $this->request->data);
            if ($this->Positiontemplate->save($positiontemplate)) {
                $this->Flash->success(__('The positiontemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The positiontemplate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('positiontemplate'));
        $this->set('_serialize', ['positiontemplate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Positiontemplate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $positiontemplate = $this->Positiontemplate->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $positiontemplate = $this->Positiontemplate->patchEntity($positiontemplate, $this->request->data);
            if ($this->Positiontemplate->save($positiontemplate)) {
                $this->Flash->success(__('The positiontemplate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The positiontemplate could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('positiontemplate'));
        $this->set('_serialize', ['positiontemplate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Positiontemplate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $positiontemplate = $this->Positiontemplate->get($id);
        if ($this->Positiontemplate->delete($positiontemplate)) {
            $this->Flash->success(__('The positiontemplate has been deleted.'));
        } else {
            $this->Flash->error(__('The positiontemplate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
