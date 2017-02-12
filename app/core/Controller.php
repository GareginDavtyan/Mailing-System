<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/10/2017
 * Time: 11:40 PM
 */
class Controller
{
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data){
        require_once '../app/views/main.php';
    }
}