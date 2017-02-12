<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/11/2017
 * Time: 12:57 AM
 */
class User extends Model
{
    public $table = "`user`";

    public $id;
    public $name;
    public $email;

    public function __construct($id = 0){
        parent::__counstruct();

        $this->id = $id;
        $this->getUser();
    }


    /**
     * Get user's data by id
     * @author Garegin
     * @return array User's list
     */
    public function getUser(){
        if(!$this->id){
            return false;
        }

        $query = $this->db->query("SELECT * FROM {$this->table} WHERE `id` = " . $this->id);
        $r = $query->fetch(PDO::FETCH_ASSOC);

        if($r){
            $this->name = $r['name'];
            $this->email = $r['email'];
        }
    }

    /**
     * Get users list
     * @author Garegin
     * @return array Users list
     */
    public function getList(){

        global $db;

        $query = $this->db->query("SELECT * FROM {$this->table} ");

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}