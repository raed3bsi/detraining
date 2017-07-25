<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Datasource\EntityInterface;
use Cake\ORM\TableRegistry;


/**
 * CakePHP OUsyncBehavior
 * @author Raed Alabsi
 */
class OUsyncBehavior extends Behavior {
    public function initialize(array $config) {
        //$uctable=  \Cake\ORM\TableRegistry::get('Unitsconfiguration');
        $mtable=  TableRegistry::get('Appmodel');
        $uctable=  TableRegistry::get('Unitsconfiguration');
        $amodel=$mtable->find('all', [
            'conditions' => ['modelname' => $config['modelname']],
            'contain' => ['unitconfigs']
        ])->first();
\Cake\Log\Log::error($amodel->modelname);
//log($amodel->modelname);
        $unitconfigs=$uctable->find('all', [
            'conditions' => ['modelid' => $amodel->id]
        ])->first()->toArray();
                //$amodel->unitconfigs->toArray();
        $unitconfigs['pkfield']=$amodel->pkfield;
        $unitconfigs['displayfield']=$amodel->displayfield;
        $this->_config=$unitconfigs;
        //parent::initialize($unitconfigs);
        
    }
    
    private function getUnitConfiguration($mid){
        $uctable=  TableRegistry::get('Unitsconfiguration');
        $unitconfigs=$uctable->find('all', [
            'conditions' => ['modelid' => $mid]
        ])->first();
        return $unitconfigs;
    }


    public function afterSave($event, EntityInterface $entity, $options){
        if($this->config('configas')=='unit'){
            $this->saveOunit($entity);
        }
        else if($this->config('configas')=='type'){
            $this->saveType($entity);
        }
        else if($this->config('configas')=='secondary'){
            $this->addTobu($entity);
        }
        
    }
    
    public function beforeDelete(Event $event, EntityInterface $entity, ArrayObject $options){
        $this->removeOunit($entity);
    }
    
    public function saveType(EntityInterface $entity){
        $butable=  TableRegistry::get('Businessunittype');
        $butype=  $this->findbyModelentity($entity->get($this->config('pkfield')), 
                $this->config('modelid'),'Businessunittype');
        if($butype==NULL){
            $butype=$butable->newEntity();
            $butype->set('modelid', $this->config('modelid'));
            $butype->set('entityid', $entity->get($this->config('pkfield')));
        }
        $butype->set('butypename', $entity->get($this->config('displayfield')));
        $butable->save($butype);
    }

    public function saveOunit(EntityInterface $entity){
        $butable=  TableRegistry::get('Businessunit');
        $bunit=  $this->findbyModelentity($entity->get($this->config('pkfield')), $this->config('modelid')
                ,'Businessunit');
        if($bunit==NULL){
            $bunit=$butable->newEntity();
            $bunit->set('modelid', $this->config('modelid'));
            $bunit->set('entityid', $entity->get($this->config('pkfield')));
            $bues=array();
            array_push($bues, $this->createBUEntity($this->config('pkfield'), $this->config('modelid')));
            $bunit->set('entities', $bues);
        }
        $bunit->set('businessunitname', $entity->get($this->config('displayfield')));
        $bunit->set('butypeid', $this->findOUType($entity)->get('butypeid'));
        $bunit->set('superunitid', $this->findOUParent($entity, $this->config('modelid'))->businessunitid);
        $butable->save($bunit);
    }
    
    private function createBUEntity($eid, $mid){
        $buentitiestable=  TableRegistry::get('BusinessunitHasEntities');
        $bu_entity=$buentitiestable->newEntity();
        $bu_entity->set('entityid', $eid);
        $bu_entity->set('modelid', $mid);
        return $bu_entity;
    }

    public function addTobu(EntityInterface $entity){
        $parentunit=  $this->findUnitByMember($entity->get($this->config('parentref')), 
                $this->config('modelid'));
        array_push($parentunit->get('entities'), $this->createBUEntity($entity->get(
        $this->config('pkfield')), $this->config('modelid')));
        $butable=  TableRegistry::get('Businessunit');
        $butable->save($parentunit);
    }

    public function removeOunit(EntityInterface $entity){
        $butable=  TableRegistry::get('Businessunit');
        $bunit=  $this->findbyModelentity($entity->get($this->config('pkfield')), $this->config('modelid'),
                'Businessunit');
        //if bunit has one or more positions then ask wither to cascade delete or prevent delete.
        $butable->delete($bunit);
    }

    public function findOUType(EntityInterface $entity){
        $utypeTable=  TableRegistry::get('Businessunittype');
        if($this->config('unittypeid')!=NULL){
            return $utypeTable->get($this->config('unittypeid'));
        }
        return $utypeTable->find('all', [
            'conditions' => ['modelid' => $this->config('typemodelid'),
                'entityid' => $entity->get($this->config('typeref'))]
        ])->first();
    }
    
    public function findOUParent(EntityInterface $entity, $mid){
        if($entity==NULL){
            return NULL;
        }
        $appmodel=  $this->findAppmodel($mid);
        $uconfig=  $this->getUnitConfiguration($mid);
        $epid=$uconfig->get('parentid');
        if($epid!=NULL && $uconfig->get('configas')=='unit'){
            if($entity->get($epid)!=NULL){
                return $this->findbyModelentity($entity->get($epid), $mid,'Businessunit');
            }
        }
        $pmid=$uconfig->get('parentmodel');
        if($pmid!=NULL){
            $prefval=$entity->get($uconfig->get('parentref'));
            $parentEntity=$this->findEntity($prefval, $pmid);
            if($parentEntity!=NULL){
                return $this->findOUParent($parentEntity, $pmid);
            }
        }
        $outable=  TableRegistry::get('Businessunit');
        $defaultuid=$uconfig->get('defaultunitid');
        if($defaultuid!=NULL){
            return $outable->get($defaultuid);
        }
        return NULL;
    }
    
    private function findEntity($pkval, $mid){
        $etable=  TableRegistry::get($this->findAppmodel($mid)->get('modelname'));
        return $etable->get($pkval);
    }

    private function findAppmodel($mid){
        $mtable=  TableRegistry::get('Appmodel');
        return $mtable->get($mid,[
            'contain' => ['unitconfigs']
        ]);
    }
    
    private function findbyModelentity($eid, $mid, $reftable){
        $outable=  TableRegistry::get($reftable);
        return $outable->find('all', [
            'conditions' => ['modelid' => $mid,
                'entityid' => $eid]
        ])->first();
    }
    
    private function findUnitByMember($eid,$mid){
        $outable=  TableRegistry::get('Businessunit');
        $bunit=$outable->find()->innerJoinWith('entities', function($q) use ($eid,$mid){
                return $q->where(['entityid' => $eid,'modelid' => $mid]);
        })->contain('entities')->first();
        return $bunit;
    }

}
