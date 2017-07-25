<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Departmenttype Controller
 *
 * @property \App\Model\Table\DepartmenttypeTable $Departmenttype
 */
class DepartmenttypeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate=[
            'contain' => ['subtypes']
        ];
        $departmenttype = $this->paginate($this->Departmenttype);

        $this->set(compact('departmenttype'));
        $this->set('_serialize', ['departmenttype']);
    }

    /**
     * View method
     *
     * @param string|null $id Departmenttype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departmenttype = $this->Departmenttype->get($id, [
            'contain' => ['Departmenttype']
        ]);

        $this->set('departmenttype', $departmenttype);
        $this->set('_serialize', ['departmenttype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departmenttype = $this->Departmenttype->newEntity();
        if ($this->request->is('post')) {
            $departmenttype = $this->Departmenttype->patchEntity($departmenttype, $this->request->data);
            $prevtype=  $this->Departmenttype->find('all',[
                'conditions' => 'Departmenttype.subtypeid is null'])->first();
            //$prevtype->subtypeid=$departmenttype->subtypeid;
            $prevtype->subtype=$departmenttype;
            
            if ($this->Departmenttype->save($prevtype)) {
                
                $this->Flash->success(__('The departmenttype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The departmenttype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('departmenttype'));
        $this->set('_serialize', ['departmenttype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departmenttype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departmenttype = $this->Departmenttype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departmenttype = $this->Departmenttype->patchEntity($departmenttype, $this->request->data);
            if ($this->Departmenttype->save($departmenttype)) {
                $this->Flash->success(__('The departmenttype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The departmenttype could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('departmenttype'));
        $this->set('_serialize', ['departmenttype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departmenttype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departmenttype = $this->Departmenttype->get($id);
        if ($this->Departmenttype->delete($departmenttype)) {
            $this->Flash->success(__('The departmenttype has been deleted.'));
        } else {
            $this->Flash->error(__('The departmenttype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
