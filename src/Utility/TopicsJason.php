<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of TopicsJason
 *
 * @author Raed Alabsi
 */
class TopicsJason {
    public $key;
    public $tooltip;
    public $title;
    public $traininghours;
    public $children;
    
    function __construct( $key, $tooltip, $title, $traininghours) {
        $this->key=$key;
        $this->tooltip=$tooltip==NULL? '':$tooltip;
        $this->title=$title;
        $this->traininghours=$traininghours;
        $this->children=array();
    }

    function getKey() {
        return $this->key;
    }


    function getTooltip() {
        return $this->tooltip;
    }

    function getTitle() {
        return $this->title;
    }

    function getTraininghours() {
        return $this->traininghours;
    }

    function getChildren() {
        return $this->children;
    }


    function setKey($key) {
        $this->key = $key;
    }

    function setTooltip($tooltip) {
        $this->tooltip = $tooltip;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setTraininghours($traininghours) {
        $this->traininghours = $traininghours;
    }

    function setChildren($children) {
        $this->children = $children;
    }


}
