<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of Propertygrid
 *
 * @author Raed Alabsi
 */
class Propertygrid {
    public $name;
    public $value;
    public $group;
    function __construct($name, $value, $group) {
        $this->name = $name;
        $this->value = $value;
        $this->group = $group;
    }

}
