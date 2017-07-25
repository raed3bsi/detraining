<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Materialtype Controller
 *
 * @property \App\Model\Table\MaterialtypeTable $Materialtype
 */
class MaterialtypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $materialtype = $this->paginate($this->Materialtype);

        $this->set(compact('materialtype'));
        $this->set('_serialize', ['materialtype']);
    }

    /**
     * View method
     *
     * @param string|null $id Materialtype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialtype = $this->Materialtype->get($id, [
            'contain' => []
        ]);

        $this->set('materialtype', $materialtype);
        $this->set('_serialize', ['materialtype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materialtype = $this->Materialtype->newEntity();
        if ($this->request->is('post')) {
            $materialtype = $this->Materialtype->patchEntity($materialtype, $this->request->data);
            if ($this->Materialtype->save($materialtype)) {
                $this->Flash->success(__('The materialtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The materialtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('materialtype'));
        $this->set('_serialize', ['materialtype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Materialtype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialtype = $this->Materialtype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialtype = $this->Materialtype->patchEntity($materialtype, $this->request->data);
            if ($this->Materialtype->save($materialtype)) {
                $this->Flash->success(__('The materialtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The materialtype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('materialtype'));
        $this->set('_serialize', ['materialtype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Materialtype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialtype = $this->Materialtype->get($id);
        if ($this->Materialtype->delete($materialtype)) {
            $this->Flash->success(__('The materialtype has been deleted.'));
        } else {
            $this->Flash->error(__('The materialtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
