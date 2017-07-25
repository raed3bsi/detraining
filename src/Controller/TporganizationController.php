<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tporganization Controller
 *
 * @property \App\Model\Table\TporganizationTable $Tporganization
 */
class TporganizationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize() {
        parent::initialize();
  //      $this->loadComponent('Menu');
    }

    
    public function index($tpotype=NULL)
    {
        $this->loadModel('Tporganizationtype');
        $orgtypename=  $this->Tporganizationtype->get($tpotype)->orgtypename;
        $this->request->session()->write('tpotype', $tpotype);
//        $this->set('menu', $this->Menu->loadMenus('tporganization/index', ''));
        $this->set('orgtypename', $orgtypename);
    }
    
    public function loadcontent(){
        $this->viewBuilder()->layout('ajax');
        $tpotype=  $this->request->session()->read('tpotype');
        $query=  $this->Tporganization->find('all')
                ->contain('address.city.country')
                ->where(['orgtypeid' => $tpotype]);
        
        $tporganization = $this->paginate($query);

        $this->set('total', count($tporganization));
        $this->set('rows',$tporganization);
        //$this->set('_serialize', ['tporganization']);
    }

    /**
     * View method
     *
     * @param string|null $id Tporganization id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tporganization = $this->Tporganization->get($id, [
            'contain' => []
        ]);

        $this->set('tporganization', $tporganization);
        $this->set('_serialize', ['tporganization']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('window');
        $this->loadModel('Address');
        $tporganization = $this->Tporganization->newEntity();
        $address=$this->Address->newEntity();
        $tporganization->address=  $address;
        //$tporganization->address->cityid=2;
        //$tporganization->address->city=  $this->findcity(2);
        $tporganization->orgtypeid=  $this->request->session()->read('tpotype');
        if ($this->request->is('post')) {
            $tporganization = $this->Tporganization->patchEntity($tporganization, $this->request->data,[
                'associated' => ['address']
            ]);
            $address= $this->Address->patchEntity($address, $tporganization->address);
            $address->city=  $this->findcity($address->cityid);
            $tporganization->businessunit=  $this->initbusinessunit($tporganization->organizationname);
            $this->log('add organization address object:'.json_encode($address));
            $this->log('add organization patched object:'.json_encode($tporganization));
            
            if(!$this->Address->save($address)){
                $this->log('error saving address:'.json_encode($address->errors()));
            }
            $tporganization->addressid=$address->addressid;
            if ($this->Tporganization->save($tporganization)) {
                $this->Flash->success(__('The tporganization has been saved.'));
                $this->log('New organization created');
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->log('add organization errors:'.json_encode($tporganization->errors()));
                $this->Flash->error(__('The tporganization could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Tporganizationtype');
        $orgtypename=  $this->Tporganizationtype->get($tporganization->orgtypeid)->orgtypename;
        $this->set('orgtypename', $orgtypename);
        $this->set(compact('tporganization'));
        $this->set('_serialize', ['tporganization']);
    }
    
    private function findcity($cid){
        $this->loadModel('City');
        return $this->City->get($cid);
    }

        private function initbusinessunit($orgname){
        $this->loadModel('Businessunit');
        $rootunit=  $this->Businessunit->newEntity();
        $rootunit->businessunitname=$orgname;
        $rootunit->businessunitstatus='Inactive';
        $rootunit->butypeid=1;
        return $rootunit;
    }

    /**
     * Edit method
     *
     * @param string|null $id Tporganization id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    private function changebu($buid,$newname){
        $this->loadModel('Businessunit');
        $businessunit=  $this->Businessunit->get($buid);
        if($businessunit==NULL){
            return $this->initbusinessunit($newname);
        }
        $businessunit->businessunitname=$newname;
        return $businessunit;
    }


    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $this->loadModel('Address');
        $tporganization = $this->Tporganization->get($id, [
            'contain' => ['address.city']
        ]);
        $address=  $this->Address->get($tporganization->addressid);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tporganization = $this->Tporganization->patchEntity($tporganization, $this->request->data,[
                'associated' => ['address']
            ]);
            
            $address= $this->Address->patchEntity($address, $tporganization->addres->toArray());
            $address->city=  $this->findcity($address->cityid);
            $tporganization->businessunit=  $this->changebu($tporganization->rootunitid,
                    $tporganization->organizationname);
            if(!$this->Address->save($address)){
                $this->log('error saving address:'.json_encode($address->errors()));
            }
            $tporganization->addressid=$address->addressid;
            if ($this->Tporganization->save($tporganization)) {
                $this->Flash->success(__('The tporganization has been saved.'));

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tporganization could not be saved. Please, try again.'));
            }
        }
        
        $this->loadModel('Tporganizationtype');
        $orgtypename=  $this->Tporganizationtype->get($tporganization->orgtypeid)->orgtypename;
        $this->set('orgtypename', $orgtypename);
        $this->set(compact('tporganization'));
        $this->set('_serialize', ['tporganization']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tporganization id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $tporganization = $this->Tporganization->get($id, [
            'contain' => ['address','businessunit']
        ]);
        $this->loadModel('Address');
        $address=$tporganization->address;
        if(!$this->Address->delete($address)){
            $this->log('error deleting organization address:'.$address->errors());
        }
        $businessunit=$tporganization->businessunit;
        $this->loadModel('Businessunit');
        if(!$this->Businessunit->delete($businessunit)){
            $this->log('error deleting organization business unit:'.$businessunit->errors());
        }
        if ($this->Tporganization->delete($tporganization)) {
            $this->Flash->success(__('The tporganization has been deleted.'));
            $this->log('Organization deleted');
        } else {
            $this->log('error deleting organization:'.$tporganization->errors());
            $this->Flash->error(__('The tporganization could not be deleted. Please, try again.'));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
