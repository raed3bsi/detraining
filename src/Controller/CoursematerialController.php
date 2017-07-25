<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Coursematerial Controller
 *
 * @property \App\Model\Table\CoursematerialTable $Coursematerial
 */
class CoursematerialController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    
    public function index()
    {
        $coursematerial = $this->paginate($this->Coursematerial);

        $this->set(compact('coursematerial'));
        $this->set('_serialize', ['coursematerial']);
    }
    
    public function loadContents(){
        $this->viewBuilder()->layout('ajax');
        $topicid=  $this->request->session()->read('topicid');
        $materials=  $this->Coursematerial->find('all',[
            'conditions' => ['topicid' => $topicid]
        ]);
        $this->set('total', count($materials));
        $this->set('rows', $materials);
    }

    /**
     * View method
     *
     * @param string|null $id Coursematerial id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('window');
        $coursematerial = $this->Coursematerial->get($id, [
            'contain' => []
        ]);

        $this->set('coursematerial', $coursematerial);
        $this->set('_serialize', ['coursematerial']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('window');
        $coursematerial = $this->Coursematerial->newEntity();
        //
        if ($this->request->is('post')) {
            $topicid=  $this->request->session()->read('topicid');
            $this->log('files: '.json_encode($this->request->data));
            $nofiles=  count($_FILES['tmaterials']['name']);
            $this->log('no files: '.$nofiles);
            for($i=0;$i<$nofiles;$i++){
                $coursematerial = $this->Coursematerial->newEntity();
                $coursematerial->topicid=$topicid;
                $name= explode('.', $_FILES['tmaterials']['name'][$i]);
                $coursematerial->materialname=$name[0];
                $coursematerial->filetype=$_FILES['tmaterials']['type'][$i];
                $ext='';
                if(isset($name[1])){
                    $ext=$name[1];
                }
                $this->log('ext: '.$ext);
                $filepath= $this->folderPath().$topicid.'_'.hash('sha256', $coursematerial->materialname)
                        .'.'.$ext;
                //$target=new \Cake\Filesystem\File($filepath);
                //$target->create();
                $this->log('file path: '.$filepath);
                move_uploaded_file($_FILES['tmaterials']['tmp_name'][$i],__DIR__.'/../../webroot'.$filepath);
                //$target->copy(, FALSE);
                $coursematerial->materialfile=  $filepath;
                $coursematerial->extention=$ext;
                $mid=  $this->savematerial($coursematerial);
                //$coursematerial->materialfile=$coursematerial->materialfile.$mid.'.'.$ext;
                
                //$this->savematerial($coursematerial);
            }
            return $this->redirect('/coursetopic/view/'.$topicid);
            //$coursematerial = $this->Coursematerial->patchEntity($coursematerial, $this->request->data);
            
        }
        $this->set(compact('coursematerial'));
        $this->set('_serialize', ['coursematerial']);
    }
    
    private function folderPath(){
        return '/files/coursematerials/';
    }


    private function savematerial($coursematerial){
        if ($this->Coursematerial->save($coursematerial)) {
            $this->log('material saved');
            return $coursematerial->materialid;
        } else {
            $this->log('error saving material: '.  json_encode($coursematerial));
            return NULL;
        }
    }
    
    public function downloadfile($id){
        $this->viewBuilder()->layout('ajax');
        $cm=$this->Coursematerial->get($id);
        $filename=  $cm->materialfile;
        //$rootpath=  str_replace('\\', '/', dirname(__DIR__, 2));
        //$this->log('real path: '.join(DIRECTORY_SEPARATOR, [realpath($rootpath.'/webroot/files/coursematerials'),
          //  substr($filename, 23)]));
          
          $path=WWW_ROOT.  str_replace('/',DIRECTORY_SEPARATOR,substr($filename, 1));
          $this->log('path: '.$path);
          //$this->response->download($path);
          /*
          $this->response->type(['pdf' => 'application/pdf']);
          $fileobj=new \Cake\Filesystem\File($path);
          $fdata=$fileobj->read();
          $this->response->body($fdata);
          $this->log('file contents: '.$fdata);
          $this->response->type('pdf');
           * 
           */
          $this->response->file($path
                //join(DIRECTORY_SEPARATOR, [realpath($rootpath.'/webroot/files/coursematerials'),
            //substr($filename, 23)])
                ,[ 'name' => $cm->materialname]);
        $this->response->getFile()->name($cm->materialname);
        //$this->log('file path: '.$this->response->getFile()->path);
        return $this->response;
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Coursematerial id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coursematerial = $this->Coursematerial->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursematerial = $this->Coursematerial->patchEntity($coursematerial, $this->request->data);
            if ($this->Coursematerial->save($coursematerial)) {
                $this->Flash->success(__('The coursematerial has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The coursematerial could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('coursematerial'));
        $this->set('_serialize', ['coursematerial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Coursematerial id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->layout('ajax');
        $this->request->allowMethod(['post', 'delete']);
        $coursematerial = $this->Coursematerial->get($id);
        $path=WWW_ROOT.  str_replace('/',DIRECTORY_SEPARATOR,substr($coursematerial->materialfile, 1));
        if ($this->Coursematerial->delete($coursematerial)) {
            unlink($path);
            $this->log('material deleted');
        } else {
            $this->log('error deleting material: '.json_encode($coursematerial->errors()));
        }

        //return $this->redirect(['action' => 'index']);
    }
}
