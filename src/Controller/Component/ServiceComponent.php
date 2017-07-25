<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\ModelAwareTrait;

/**
 * CakePHP ServiceComponent
 * @author Raed Alabsi
 */
class ServiceComponent extends Component {
    use ModelAwareTrait;
    
    public function initService($type){
        $Servicetype=$this->loadModel('Servicetype');
        $stype=$Servicetype->find('all',[
            'conditions' => ['typename' => $type]
        ])->first();
        $Service=  $this->loadModel('Service');
        $sservice=$Service->newEntity();
        if($stype!=NULL){
            
            $sservice->set('stypeid', $stype->get('stypeid'));
            
        }
        return $sservice;
    }
    
    public function getcurrencies(){
        $currencytable=  $this->loadModel('Currency');
        $currencies=$currencytable->find('list');
        return $currencies;
    }
}
