<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * City Controller
 *
 * @property \App\Model\Table\CityTable $City
 */
class CityController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['country']
        ];
        $city = $this->paginate($this->City);

        $this->set(compact('city'));
        $this->set('_serialize', ['city']);
    }
    
    public function findlist($countryid){
        $this->viewBuilder()->layout('window');
        $this->request->session()->write('countryid', $countryid);
        $cities=  $this->City->find('all')->where(['countryid' => $countryid])->toArray();
        if($cities==NULL){
            $cities=array();
        }
        $this->set($cities);
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->City->get($id, [
            'contain' => ['country']
        ]);

        $this->set('city', $city);
        $this->set('_serialize', ['city']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('ajax');
        $city = $this->City->newEntity();
        $city->countryid=  $this->request->session()->read('countryid');
        if ($this->request->is('post')) {
            $city = $this->City->patchEntity($city, $this->request->data);
            if ($this->City->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }
        $country = $this->City->country->find('list');
        $this->set(compact('city', 'country'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->City->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->City->patchEntity($city, $this->request->data);
            if ($this->City->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The city could not be saved. Please, try again.'));
            }
        }
        $country = $this->City->country->find('list', ['limit' => 200]);
        $this->set(compact('city', 'country'));
        $this->set('_serialize', ['city']);
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->City->get($id);
        if ($this->City->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
