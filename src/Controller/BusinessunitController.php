<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Businessunit Controller
 *
 * @property \App\Model\Table\BusinessunitTable $Businessunit
 */
class BusinessunitController extends AppController
{
    public $helpers=['Ajax','Javascript'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
//        $this->loadComponent('Menu');
        
    }


    public function index($rootid)
    {
//        $this->set('menu', $this->Menu->loadMenus('businessunit/index', ''));
        $this->request->session()->write('burootid', $rootid);
        
    }
    
    public function loadContents()
    {
        $this->viewBuilder()->layout('ajax');
        $rootid=$this->request->session()->read('burootid');
        $this->log('root id:'.$rootid);
        $utable=  \Cake\ORM\TableRegistry::get('Businessunit');
        $utable->recover();
        $bunits=  $utable->//find('all')->find('threaded')->toArray();
                find('children', ['for' => $rootid])->
                find('threaded',[
                    'keyField' => $this->Businessunit->primaryKey(),
                    'parentField' => 'superunitid'
                ])->toArray();
        
        //$this->log('children:'.$this->Businessunit->childCount($bunits));
        $rootunit=  $this->Businessunit->get($rootid);
        $rootunit->children=$bunits;
        $this->set( array($rootunit));
        //$this->set('_serialize',['bunits']);
    }
    
    public function destructure(){
        $derootid=5;//it should be defined in general configuration
        return $this->redirect(['action' => 'index',$derootid]);
    }

    /**
     * View method
     *
     * @param string|null $id Businessunit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $businessunit = $this->Businessunit->get($id, [
            'contain' => ['BusinessunitHasEntities']
        ]);

        $this->set('businessunit', $businessunit);
        $this->set('_serialize', ['businessunit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($parentid=null)
    {
        $this->viewBuilder()->layout('window');
        $businessunit = $this->Businessunit->newEntity();
        $businessunit->superunitid=$parentid;
        $businessunit->butypeid=2;
        $businessunit->businessunitstatus='active';
        if ($this->request->is('post')) {
            $businessunit = $this->Businessunit->patchEntity($businessunit, $this->request->data);
            if ($this->Businessunit->save($businessunit)) {
                $this->Flash->success(__('The businessunit has been saved.'));

                //return $this->redirect(['action' => 'index',$businessunit->businessunitid]);
            } else {
                $this->Flash->error(__('The businessunit could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('businessunit'));
        $this->set('_serialize', ['businessunit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Businessunit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $businessunit = $this->Businessunit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $businessunit = $this->Businessunit->patchEntity($businessunit, $this->request->data);
            if ($this->Businessunit->save($businessunit)) {
                $this->Flash->success(__('The businessunit has been saved.'));

                //return $this->redirect(['action' => 'index', $businessunit->businessunitid]);
            } else {
                $this->Flash->error(__('The businessunit could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('businessunit'));
        $this->set('_serialize', ['businessunit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Businessunit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $businessunit = $this->Businessunit->get($id);
        if ($this->Businessunit->delete($businessunit)) {
            $this->Flash->success(__('The businessunit has been deleted.'));
        } else {
            $this->Flash->error(__('The businessunit could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
