<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Department Controller
 *
 * @property \App\Model\Table\DepartmentTable $Department
 */
class DepartmentController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('Departmenttype');
        $this->paginate=[
            'contain' => ['parentdept','depttype']
        ];
        $depttypes=  $this->Departmenttype->find('all',[
            'contain' => ['supertype']
        ]);
        $department = $this->paginate($this->Department);

        $this->set(compact('department'));
        $this->set('depttypes',$depttypes);
        $this->set('_serialize', ['department']);
    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $department = $this->Department->get($id, [
            'contain' => []
        ]);

        $this->set('department', $department);
        $this->set('_serialize', ['department']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($typeid=null, $pdeptid=null)
    {
        $this->loadModel('Departmenttype');
        $depttype=  $this->Departmenttype->get($typeid,[
            'contain' => ['supertype']
        ]);
        $department = $this->Department->newEntity();
        $department->depttypeid=$depttype->depttypeid;
        if($pdeptid!=NULL){
            $department->parentdeptid=$pdeptid;
        }
        $parentdepts=  $this->Department->find('list', [
            'conditions' => ['depttypeid' => $depttype->supertype->depttypeid]
        ]);
        if ($this->request->is('post')) {
            $department = $this->Department->patchEntity($department, $this->request->data);
            if ($this->Department->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The department could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('department'));
        $this->set('parentdepts',$parentdepts);
        $this->set('_serialize', ['department']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Department->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Department->patchEntity($department, $this->request->data);
            if ($this->Department->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The department could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('department'));
        $this->set('_serialize', ['department']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Department->get($id);
        if ($this->Department->delete($department)) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
