<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/11/2017
 * Time: 12:02 PM
 */
class Ajax extends Controller
{
    public function sendMails(){

        //we can do this only for authorized users
        if(isset($_POST['id_users']) && isset($_POST['id_template'])){
            $id_users = $_POST['id_users'];
            $id_template = $_POST['id_template'];

            $queue = $this->model('Queue');
            $queue->createSession($id_template);
            $res = $queue->setMails($id_users);

            echo $res;
            die;
        }
    }
}