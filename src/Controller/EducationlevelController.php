<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Educationlevel Controller
 *
 * @property \App\Model\Table\EducationlevelTable $Educationlevel
 */
class EducationlevelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $educationlevel = $this->paginate($this->Educationlevel);

        $this->set(compact('educationlevel'));
        $this->set('_serialize', ['educationlevel']);
    }

    /**
     * View method
     *
     * @param string|null $id Educationlevel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $educationlevel = $this->Educationlevel->get($id, [
            'contain' => []
        ]);

        $this->set('educationlevel', $educationlevel);
        $this->set('_serialize', ['educationlevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $educationlevel = $this->Educationlevel->newEntity();
        if ($this->request->is('post')) {
            $educationlevel = $this->Educationlevel->patchEntity($educationlevel, $this->request->data);
            if ($this->Educationlevel->save($educationlevel)) {
                $this->Flash->success(__('The educationlevel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The educationlevel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('educationlevel'));
        $this->set('_serialize', ['educationlevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Educationlevel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $educationlevel = $this->Educationlevel->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $educationlevel = $this->Educationlevel->patchEntity($educationlevel, $this->request->data);
            if ($this->Educationlevel->save($educationlevel)) {
                $this->Flash->success(__('The educationlevel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The educationlevel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('educationlevel'));
        $this->set('_serialize', ['educationlevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Educationlevel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $educationlevel = $this->Educationlevel->get($id);
        if ($this->Educationlevel->delete($educationlevel)) {
            $this->Flash->success(__('The educationlevel has been deleted.'));
        } else {
            $this->Flash->error(__('The educationlevel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
