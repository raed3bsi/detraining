<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BusinessunitPosition Controller
 *
 * @property \App\Model\Table\BusinessunitPositionTable $BusinessunitPosition
 */
class BusinessunitPositionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $businessunitPosition = $this->paginate($this->BusinessunitPosition);

        $this->set(compact('businessunitPosition'));
        $this->set('_serialize', ['businessunitPosition']);
    }

    /**
     * View method
     *
     * @param string|null $id Businessunit Position id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessunitPosition = $this->BusinessunitPosition->get($id, [
            'contain' => []
        ]);

        $this->set('businessunitPosition', $businessunitPosition);
        $this->set('_serialize', ['businessunitPosition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $businessunitPosition = $this->BusinessunitPosition->newEntity();
        if ($this->request->is('post')) {
            $businessunitPosition = $this->BusinessunitPosition->patchEntity($businessunitPosition, $this->request->data);
            if ($this->BusinessunitPosition->save($businessunitPosition)) {
                $this->Flash->success(__('The businessunit position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The businessunit position could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('businessunitPosition'));
        $this->set('_serialize', ['businessunitPosition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Businessunit Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $businessunitPosition = $this->BusinessunitPosition->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessunitPosition = $this->BusinessunitPosition->patchEntity($businessunitPosition, $this->request->data);
            if ($this->BusinessunitPosition->save($businessunitPosition)) {
                $this->Flash->success(__('The businessunit position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The businessunit position could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('businessunitPosition'));
        $this->set('_serialize', ['businessunitPosition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Businessunit Position id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $businessunitPosition = $this->BusinessunitPosition->get($id);
        if ($this->BusinessunitPosition->delete($businessunitPosition)) {
            $this->Flash->success(__('The businessunit position has been deleted.'));
        } else {
            $this->Flash->error(__('The businessunit position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
