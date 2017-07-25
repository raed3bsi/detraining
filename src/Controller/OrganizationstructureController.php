<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organizationstructure Controller
 *
 * @property \App\Model\Table\OrganizationstructureTable $Organizationstructure
 */
class OrganizationstructureController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $organizationstructure = $this->paginate($this->Organizationstructure);

        $this->set(compact('organizationstructure'));
        $this->set('_serialize', ['organizationstructure']);
    }

    /**
     * View method
     *
     * @param string|null $id Organizationstructure id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organizationstructure = $this->Organizationstructure->get($id, [
            'contain' => []
        ]);

        $this->set('organizationstructure', $organizationstructure);
        $this->set('_serialize', ['organizationstructure']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organizationstructure = $this->Organizationstructure->newEntity();
        if ($this->request->is('post')) {
            $organizationstructure = $this->Organizationstructure->patchEntity($organizationstructure, $this->request->data);
            if ($this->Organizationstructure->save($organizationstructure)) {
                $this->Flash->success(__('The organizationstructure has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organizationstructure could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organizationstructure'));
        $this->set('_serialize', ['organizationstructure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Organizationstructure id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organizationstructure = $this->Organizationstructure->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organizationstructure = $this->Organizationstructure->patchEntity($organizationstructure, $this->request->data);
            if ($this->Organizationstructure->save($organizationstructure)) {
                $this->Flash->success(__('The organizationstructure has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organizationstructure could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('organizationstructure'));
        $this->set('_serialize', ['organizationstructure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Organizationstructure id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organizationstructure = $this->Organizationstructure->get($id);
        if ($this->Organizationstructure->delete($organizationstructure)) {
            $this->Flash->success(__('The organizationstructure has been deleted.'));
        } else {
            $this->Flash->error(__('The organizationstructure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
