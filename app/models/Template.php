<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/11/2017
 * Time: 15:28 AM
 */
class Template extends Model
{
    public $table = "`template`";

    public $id;
    public $title;
    public $content;


    public function __construct($id = 0){
        parent::__counstruct();

        $this->id = $id;
        $this->getTemplate();
    }

    /**
     * Get user's data by id
     * @author Garegin
     * @return array User's list
     */
    public function getTemplate(){
        if(!$this->id){
            return false;
        }

        $query = $this->db->query("SELECT * FROM {$this->table} WHERE `id` = " . $this->id);
        $r = $query->fetch(PDO::FETCH_ASSOC);

        if($r){
            $this->title = $r['title'];
            $this->content = $r['content'];
        }
    }


    /**
     * Get templates list or one template, if parameter $id is sent
     *
     * @author Garegin
     * @param int $id has default value template id
     * @return array templates list
     */
    public function getList($id = 0){

        $sql_add = "";
        if($id){
            $sql_add = " WHERE `id` = " . $id;
        }

        $query = $this->db->query("SELECT * FROM {$this->table} " . $sql_add);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}