<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

use Cake\Datasource\ModelAwareTrait;
/**
 * Description of typesItemHandler
 *
 * @author Raed Alabsi
 */
class typesItemHandler implements mitemHandler {
    use ModelAwareTrait;
    public function handleItem(array $item, $jsfunc, $refdom=null) {
        try{
            $typestable=  $this->loadModel($item['typesmodel']);
            $alltypes=$typestable->find('all');
            $urls=array();
            foreach ($alltypes as $tobj){
                $label=  __($item['ilabel']).$tobj->get($item['namefield']);
                $val='/'.$item['controller'].'/'.$item['action'].'/'.$tobj->get($item['idfield']);
                $nurl=['label' => $label, 'url' => $val, 'jsfunc' => $jsfunc];
                if($refdom!=NULL){
                    $nurl['refdom']=$refdom;
                }
                array_push($urls, $nurl);
            }
            return $urls;
        }
        catch (\Cake\Datasource\Exception\MissingModelException $ex){
            return array();
        }
        
    }

    public function generateItems(array $conf) {
        $typestable=  $this->loadModel($conf['modelname']);
        $alltypes=$typestable->find('list', $conf['options'])->toArray();
        //echo 'no types: '.count($alltypes);
        $items=array();
        foreach (array_keys($alltypes) as $itemid){
            array_push($items, ['id' => $itemid, 'name' => $alltypes[$itemid]]);
        }
        return $items;
    }

//put your code here
}
