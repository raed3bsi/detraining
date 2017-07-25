<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Positions Controller
 *
 * @property \App\Model\Table\PositionsTable $Positions
 */
class PositionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($unitid=NULL)
    {
        $this->viewBuilder()->layout('ajax');
        $positions = $this->Positions->find('all',[
            'conditions' => ['businessunitid' => $unitid]
        ])->all();

        $this->set('total', count($positions));
        $this->set('rows', $positions);
        
    }

    /**
     * View method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => ['securitygroup']
        ]);

        $this->set('position', $position);
        $this->set('_serialize', ['position']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($unitid=NULL)
    {
        $this->viewBuilder()->layout('window');
        
        $position = $this->Positions->newEntity();
        $position->businessunitid=$unitid;
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
            $position->securitygroup=  $this->initsgroup($position->positionname);
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index', $unitid]);
            } else {
                $this->log(json_encode($position->errors()));
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('position'));
        $this->set('_serialize', ['position']);
    }
    
    private function initsgroup($groupname){
        $this->loadModel('Securitygroup');
        $sgroup=  $this->Securitygroup->newEntity();
        $sgroup->sgtypeid=  $this->findsgtype();
        $sgroup->sgroupstatus='Active';
        $sgroup->sgroupname=$groupname;
        return $sgroup;
    }


    private function findsgtype(){
        $this->loadModel('Sgrouptype');
        return $this->Sgrouptype->find('all',[
            'conditions' => ['sgtypecode' => 'position']
        ])->first()->sgtypeid;
    }

    /**
     * Edit method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The position could not be saved. Please, try again.'));
            }
        }
        $securitygroup = $this->Positions->securitygroup->find('list', ['limit' => 200]);
        $this->set(compact('position', 'securitygroup'));
        $this->set('_serialize', ['position']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $position = $this->Positions->get($id);
        if ($this->Positions->delete($position)) {
            $this->Flash->success(__('The position has been deleted.'));
        } else {
            $this->Flash->error(__('The position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
