<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of Permissionitem
 *
 * @author Raed Alabsi
 */
class Permissionitem {
    private $modelname;
    private $actionname;
    private $fields;
    private $erestrictions;
    private $urestrictions;
    private $ownership;
    
    function __construct($modelname, $actionname, $fields, $erestrictions, $urestrictions, $ownership=FALSE) {
        $this->modelname = $modelname;
        $this->actionname = $actionname;
        $this->fields = $fields;
        $this->erestrictions = $erestrictions;
        $this->urestrictions = $urestrictions;
        $this->ownership = $ownership;
        
    }
    function getModelname() {
        return $this->modelname;
    }

    function getActionname() {
        return $this->actionname;
    }

    function getFields() {
        return $this->fields;
    }

    function getErestrictions() {
        return $this->erestrictions;
    }

    function getUrestrictions() {
        return $this->urestrictions;
    }

    function getOwnership() {
        return $this->ownership;
    }

    function setModelname($modelname) {
        $this->modelname = $modelname;
    }

    function setActionname($actionname) {
        $this->actionname = $actionname;
    }

    function setFields($fields) {
        $this->fields = $fields;
    }

    function setErestrictions($erestrictions) {
        $this->erestrictions = $erestrictions;
    }

    function setUrestrictions($urestrictions) {
        $this->urestrictions = $urestrictions;
    }

    function setOwnership($ownership) {
        $this->ownership = $ownership;
    }


}
