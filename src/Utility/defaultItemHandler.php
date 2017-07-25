<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of defaultItemHandler
 *
 * @author Raed Alabsi
 */
class defaultItemHandler implements mitemHandler {
    private $loadedvars;
    function __construct($vars) {
        $this->loadedvars=$vars;
    }

    public function handleItem(array $item, $jsfunc, $refdom=null) {
        $urls=array();
        $label=__($item['ilabel']);
        $url='/'.$item['controller'].'/'.$item['action'];
        $nurl=['label' => $label, 'url' => $url, 'jsfunc' => $jsfunc];
        if($refdom!=NULL){
            $nurl['refdom']=$refdom;
        }
        array_push($urls, $nurl);
        
        return $urls;
    }

    public function generateItems(array $conf) {
        $vals=array();
        foreach ($conf as $var){
            if(isset($this->loadedvars[$var])){
                array_push($vals, $this->loadedvars[$var]);
            }
        }
        if(count($vals)>0){
            return [['id' => implode('/', $vals), 'name' => '']];
        }
        return [];
    }

//put your code here
}
