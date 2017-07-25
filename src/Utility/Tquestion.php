<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of Tquestion
 *
 * @author Raed Alabsi
 */
class Tquestion {
    public $questionid;
    public $typename;
    public $questiondescription;
    public $difficulty;
    public $points;
    public $negativepoints;
    function __construct($questionid, $typename, $questiondescription, $difficulty, $points, $negativepoints) {
        $this->questionid = $questionid;
        $this->typename = $typename;
        $this->questiondescription = $questiondescription;
        $this->difficulty = $difficulty;
        $this->points = $points;
        $this->negativepoints = $negativepoints;
    }

}
