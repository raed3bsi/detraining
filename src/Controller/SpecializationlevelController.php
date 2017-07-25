<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Specializationlevel Controller
 *
 * @property \App\Model\Table\SpecializationlevelTable $Specializationlevel
 */
class SpecializationlevelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $specializationlevel = $this->paginate($this->Specializationlevel);

        $this->set(compact('specializationlevel'));
        $this->set('_serialize', ['specializationlevel']);
    }
    
    public function loadContents($specid=null){
        $this->viewBuilder()->layout('ajax');
        $slevels=array();
        if($specid!=null){
            $slevels=  $this->Specializationlevel->find('all',[
                'contain' => ['Course'],
                'conditions' => ['specializationid' => $specid],
                'order' => ['levelno' => 'asc']
            ]);
        }
        $this->set('total', count($slevels));
        $this->set('rows', $slevels);
    }

    /**
     * View method
     *
     * @param string|null $id Specializationlevel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specializationlevel = $this->Specializationlevel->get($id, [
            'contain' => []
        ]);

        $this->set('specializationlevel', $specializationlevel);
        $this->set('_serialize', ['specializationlevel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($specid=NULL)
    {
        $this->viewBuilder()->layout('window');
        $specializationlevel = $this->Specializationlevel->newEntity();
        $specializationlevel->specializationid=$specid;
        if ($this->request->is('post')) {
            $specializationlevel = $this->Specializationlevel->patchEntity($specializationlevel, $this->request->data);
            $specializationlevel->levelno=  $this->findlevelno($specializationlevel->specializationid);
            $this->log('saving level: '.json_encode($specializationlevel));
            if ($this->Specializationlevel->save($specializationlevel)) {
                $this->log('The specializationlevel has been saved.');

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->log('error saving specialization level: '.  json_encode($specializationlevel->errors()));
            }
        }
        $this->set('courses', $this->loadcourses($specid, $specializationlevel->slevelid));
        $this->set(compact('specializationlevel'));
        $this->set('_serialize', ['specializationlevel']);
    }
    
    private function findlevelno($specid){
        $this->loadModel('Specialization');
        $specs=  $this->Specialization->get($specid,[
            'contain' => 'slevels'
        ]);
        return $specs->numoflevels+1;
    }
    
    private function loadcourses($specid, $slevelid){
        $this->loadModel('Course');
        $this->log('specialization id: '.$specid);
        return $this->Course->find('list')
                ->notMatching('Specializationlevel', function($q) use($specid,$slevelid){
                    $conds=['specializationid' => $specid];
                    if($slevelid!=NULL){
                        $conds['Specializationlevel.slevelid !=']=$slevelid;
                    }
                    $this->log('conds: '.json_encode($conds));
                    return $q->where($conds);
                });
    }

    /**
     * Edit method
     *
     * @param string|null $id Specializationlevel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('window');
        $specializationlevel = $this->Specializationlevel->get($id, [
            'contain' => ['Course']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specializationlevel = $this->Specializationlevel->patchEntity($specializationlevel, $this->request->data);
            if ($this->Specializationlevel->save($specializationlevel)) {
                $this->log('The specializationlevel has been saved.');

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->log('error editing specialization level: '.  json_encode($specializationlevel->errors()));
            }
        }
        $this->set('courses', $this->loadcourses($specializationlevel->specializationid, $specializationlevel->slevelid));
        $this->set(compact('specializationlevel'));
        $this->set('_serialize', ['specializationlevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Specializationlevel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $specializationlevel = $this->Specializationlevel->get($id);
        
        if ($this->Specializationlevel->delete($specializationlevel)) {
            $this->Flash->success(__('The specializationlevel has been deleted.'));
        } else {
            $this->Flash->error(__('The specializationlevel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
