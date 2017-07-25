<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PersonAssignedPositions Controller
 *
 * @property \App\Model\Table\PersonAssignedPositionsTable $PersonAssignedPositions
 */
class PersonAssignedPositionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $personAssignedPositions = $this->paginate($this->PersonAssignedPositions);

        $this->set(compact('personAssignedPositions'));
        $this->set('_serialize', ['personAssignedPositions']);
    }

    /**
     * View method
     *
     * @param string|null $id Person Assigned Position id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personAssignedPosition = $this->PersonAssignedPositions->get($id, [
            'contain' => []
        ]);

        $this->set('personAssignedPosition', $personAssignedPosition);
        $this->set('_serialize', ['personAssignedPosition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personAssignedPosition = $this->PersonAssignedPositions->newEntity();
        if ($this->request->is('post')) {
            $personAssignedPosition = $this->PersonAssignedPositions->patchEntity($personAssignedPosition, $this->request->data);
            if ($this->PersonAssignedPositions->save($personAssignedPosition)) {
                $this->Flash->success(__('The person assigned position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person assigned position could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('personAssignedPosition'));
        $this->set('_serialize', ['personAssignedPosition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person Assigned Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personAssignedPosition = $this->PersonAssignedPositions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personAssignedPosition = $this->PersonAssignedPositions->patchEntity($personAssignedPosition, $this->request->data);
            if ($this->PersonAssignedPositions->save($personAssignedPosition)) {
                $this->Flash->success(__('The person assigned position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The person assigned position could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('personAssignedPosition'));
        $this->set('_serialize', ['personAssignedPosition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person Assigned Position id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personAssignedPosition = $this->PersonAssignedPositions->get($id);
        if ($this->PersonAssignedPositions->delete($personAssignedPosition)) {
            $this->Flash->success(__('The person assigned position has been deleted.'));
        } else {
            $this->Flash->error(__('The person assigned position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
