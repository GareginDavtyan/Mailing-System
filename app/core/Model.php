<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/12/2017
 * Time: 11:56 PM
 */
class Model
{
    public $db;

    public function __counstruct(){
        global $db;

        $this->db = $db;
    }
}