<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permission Controller
 *
 * @property \App\Model\Table\PermissionTable $Permission
 */
class PermissionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentPermission', 'action', 'amodel']
        ];
        $permission = $this->paginate($this->Permission);

        $this->set(compact('permission'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permission->get($id, [
            'contain' => ['ParentPermission', 'action', 'amodel', 'ChildPermission']
        ]);

        $this->set('permission', $permission);
        $this->set('_serialize', ['permission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permission->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permission->patchEntity($permission, $this->request->data);
            if ($this->Permission->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The permission could not be saved. Please, try again.'));
            }
        }
        $parentPermission = $this->Permission->ParentPermission->find('list', ['limit' => 200]);
        $action = $this->Permission->action->find('list', ['limit' => 200]);
        $amodel = $this->Permission->amodel->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'parentPermission', 'action', 'amodel'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permission->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permission->patchEntity($permission, $this->request->data);
            if ($this->Permission->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The permission could not be saved. Please, try again.'));
            }
        }
        $parentPermission = $this->Permission->ParentPermission->find('list', ['limit' => 200]);
        $action = $this->Permission->action->find('list', ['limit' => 200]);
        $amodel = $this->Permission->amodel->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'parentPermission', 'action', 'amodel'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permission->get($id);
        if ($this->Permission->delete($permission)) {
            $this->Flash->success(__('The permission has been deleted.'));
        } else {
            $this->Flash->error(__('The permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
