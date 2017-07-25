<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use App\Utility;
use Cake\Event\Event;
use Cake\Controller\Controller;

/**
 * CakePHP MenuComponent
 * @author Raed Alabsi
 */
class MenuComponent extends Component {
    private $handlers ;
    public function initialize(array $config) {
        $this->handlers=array();
        $this->handlers['single']=new Utility\defaultItemHandler($this->request->session()->read('generalparams'));
        $this->handlers['model'] =new Utility\typesItemHandler();
        $this->handlers['enum']=new Utility\enumItemHandler();
        return parent::initialize($config);
    }
    
    public function beforeRender(Event $event){
        $this->log('menu component before render ');
        $controller=  $this->_registry->getController();
        $layout=$controller->viewBuilder()->layout();
        if($layout=='default' || $layout==''){
            $url=$controller->request->url;
            
            $menuname=  Utility\Menuconf::pagemenu($url);
            //$this->log('url: '.$url.' menu name: '.$menuname);
            if($menuname!=NULL){
                if(!$this->request->session()->check('menu.'.$menuname)){
                    $this->request->session()->write('menu.'.$menuname, 
                            $this->buildMenuObject($menuname));
                }
                $currmenu=  $this->request->session()->read('menu.'.$menuname);
                $this->log('menu: '.json_encode($currmenu));
                $controller->set('menu', $currmenu);
                //$controller->viewVars['menu']=$currmenu;
            }
        }
        
    }
    
    private function buildMenuObject($mid){
        $submenus=  Utility\Menuconf::findmenu($mid);
        $menuobject=array();
        foreach ($submenus as $menupanel){
            $mpobject=array();
            $mpobject['id'] = $mid.'.'.$menupanel['id'];
            $mpobject['name']=$menupanel['name'];
            $mpobject['items']=$this->buildMenuItems($menupanel['items']);
            $menuobject[$menupanel['id']]=$mpobject;
        }
        return $menuobject;
    }
    
    private function buildMenuItems($mitems){
        $menuitems=array();
        $prefix='';
        foreach ($mitems as $miobject){
            $variants=[['id' => '', 'name' => '']];
            if(count($miobject['params'])>0){
                $pobj=$miobject['params'][0];
                $pvals=  $this->handlers[$pobj['type']]->generateItems($pobj['confs']);
                if(count($pvals)>0){
                    $variants=$pvals;
                }
            }
            foreach ($variants as $ivar){
                array_push($menuitems, [
                    'viewelem' => $miobject['viewelem'],
                    'url' => $prefix.$miobject['url'].'/'.$ivar['id'],
                    'label' => $miobject['label'].' '.$ivar['name']
                ]);
            }
        }
        return $menuitems;
    }

    public function loadMenus($action, $args){
        $curmenus=array();
        if($this->request->session()->check('curmenus')){
            $curmenus=$this->request->session()->read('curmenus');
        }
        $displayMenu=array();
        $acmenus=  Utility\Menuconf::actionMenus($action);
        if($acmenus==NULL){
            foreach ($curmenus as $cm){
                array_push($displayMenu, $cm);
            }
            return $displayMenu;
        }
        $newmenus=array();
        
        $execluded=  $this->getexecluded($action, $args);
        foreach ($acmenus as $am){
            if(isset($curmenus[$am])){
                $newmenus[$am]=$curmenus[$am];
                array_push($displayMenu, $curmenus[$am]);
                
            }else{
                $menu=  $this->buildMenu($am);
                $newmenus[$menu['mid']]=$menu;
                array_push($displayMenu, $menu);
            }
        }
        $this->request->session()->write('curmenus', $newmenus);
        return $displayMenu;
    }
    
    public function reloadMenu($mid){
        $curmenus=array();
        if($this->request->session()->check('curmenus')){
            $curmenus=$this->request->session()->read('curmenus');
        }
        $curmenus[$mid]=  $this->buildMenu($mid);
        $this->request->session()->write('curmenus', $curmenus);
        return $curmenus[$mid];
    }

        private function filterExecluded($pattern, $menu){
        $unmatched=array();
        foreach ($menu['mitems'] as $mitem){
            if(!preg_match($pattern, $mitem['url'])){
                array_push($unmatched, $mitem);
            }
        }
        return ['mid' => $menu['mid'], 'mlabel' => $menu['mlabel'], 'mitems' => $unmatched];
    }

    private function buildMenu($mid){
        $mconf=  Utility\Menuconf::loadMenu($mid);
        if($mconf==NULL){
            return NULL;
        }
        $mitems=array();
        foreach ($mconf['mitems'] as $iid){
            $iconf=  Utility\Menuconf::loadItem($iid['id']);
            $this->log('loading menu item:'.$iid['id']);
            $this->log(json_encode($iconf));
            if($iconf!=NULL){
                $refdom=NULL;
                if(isset($iid['refdom'])){
                    $refdom=$iid['refdom'];
                }
                $urls=$this->handlers[$iconf['handler']]->handleItem($iconf,$iid['jsfunc'], $refdom);
                $mitems=array_merge($mitems, $urls);
                if($iid['separator']){
                    array_push($mitems, ['separator' => 'yes']);
                }
            }
        }
        return ['mid' => $mconf['mid'], 'mlabel' => $mconf['mlabel'], 'mitems' => $mitems];
    }

    private function getexecluded($action, $args){
        $execluded=  Utility\Menuconf::actionexeclude();
        $ops[0]='';
        $ops[1]='/'.$action.'*';
        $ops[2]='/'.$action.'/'.$args;
        return $ops[$execluded];
    }

}
