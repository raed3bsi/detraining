<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Exchangerates Controller
 *
 * @property \App\Model\Table\ExchangeratesTable $Exchangerates
 */
class ExchangeratesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $exchangerates = $this->paginate($this->Exchangerates);

        $this->set(compact('exchangerates'));
        $this->set('_serialize', ['exchangerates']);
    }

    /**
     * View method
     *
     * @param string|null $id Exchangerate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exchangerate = $this->Exchangerates->get($id, [
            'contain' => ['Journalentry']
        ]);

        $this->set('exchangerate', $exchangerate);
        $this->set('_serialize', ['exchangerate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exchangerate = $this->Exchangerates->newEntity();
        if ($this->request->is('post')) {
            $exchangerate = $this->Exchangerates->patchEntity($exchangerate, $this->request->data);
            if ($this->Exchangerates->save($exchangerate)) {
                $this->Flash->success(__('The exchangerate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exchangerate could not be saved. Please, try again.'));
            }
        }
        $journalentry = $this->Exchangerates->Journalentry->find('list', ['limit' => 200]);
        $this->set(compact('exchangerate', 'journalentry'));
        $this->set('_serialize', ['exchangerate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exchangerate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exchangerate = $this->Exchangerates->get($id, [
            'contain' => ['Journalentry']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exchangerate = $this->Exchangerates->patchEntity($exchangerate, $this->request->data);
            if ($this->Exchangerates->save($exchangerate)) {
                $this->Flash->success(__('The exchangerate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exchangerate could not be saved. Please, try again.'));
            }
        }
        $journalentry = $this->Exchangerates->Journalentry->find('list', ['limit' => 200]);
        $this->set(compact('exchangerate', 'journalentry'));
        $this->set('_serialize', ['exchangerate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exchangerate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exchangerate = $this->Exchangerates->get($id);
        if ($this->Exchangerates->delete($exchangerate)) {
            $this->Flash->success(__('The exchangerate has been deleted.'));
        } else {
            $this->Flash->error(__('The exchangerate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
