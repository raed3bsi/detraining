<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of enumItemHandler
 *
 * @author Raed Alabsi
 */
class enumItemHandler implements mitemHandler {
    public function handleItem(array $item, $jsfunc, $refdom=NULL) {
        $urls=array();
        foreach ($item['params'] as $param){
            $iurl='/'.$item['controller'].'/'.$item['action'].'/'.implode('/', $param['values']);
            $nurl=['label' => __($param['label']), 'url' => $iurl, 'jsfunc' => $jsfunc];
            if($refdom!=NULL){
                $nurl['refdom']=$refdom;
            }
            array_push($urls, $nurl);
        }
        return $urls;
    }

    public function generateItems(array $conf) {
        return $conf;
    }

//put your code here
}
