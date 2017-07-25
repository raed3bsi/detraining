<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Placementtest Controller
 *
 * @property \App\Model\Table\PlacementtestTable $Placementtest
 */
class PlacementtestController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $placementtest = $this->paginate($this->Placementtest);

        $this->set(compact('placementtest'));
        $this->set('_serialize', ['placementtest']);
    }

    /**
     * View method
     *
     * @param string|null $id Placementtest id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $placementtest = $this->Placementtest->get($id, [
            'contain' => []
        ]);

        $this->set('placementtest', $placementtest);
        $this->set('_serialize', ['placementtest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $placementtest = $this->Placementtest->newEntity();
        if ($this->request->is('post')) {
            $placementtest = $this->Placementtest->patchEntity($placementtest, $this->request->data);
            if ($this->Placementtest->save($placementtest)) {
                $this->Flash->success(__('The placementtest has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The placementtest could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('placementtest'));
        $this->set('_serialize', ['placementtest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Placementtest id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $placementtest = $this->Placementtest->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $placementtest = $this->Placementtest->patchEntity($placementtest, $this->request->data);
            if ($this->Placementtest->save($placementtest)) {
                $this->Flash->success(__('The placementtest has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The placementtest could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('placementtest'));
        $this->set('_serialize', ['placementtest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Placementtest id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $placementtest = $this->Placementtest->get($id);
        if ($this->Placementtest->delete($placementtest)) {
            $this->Flash->success(__('The placementtest has been deleted.'));
        } else {
            $this->Flash->error(__('The placementtest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
