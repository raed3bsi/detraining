<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of Topicslist
 *
 * @author Raed Alabsi
 */
class Topicslist {
    public $id;
    public $text;
    public $children;
    function __construct($id, $text, $children=array()) {
        $this->id = $id;
        $this->text = $text;
        $this->children=$children;
    }

}
