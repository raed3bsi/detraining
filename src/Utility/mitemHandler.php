<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 *
 * @author Raed Alabsi
 */
interface mitemHandler {
public function handleItem(array $item, $jsfunc, $refdom=NULL);
public function generateItems(array $conf);
}
