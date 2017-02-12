<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/12/2017
 * Time: 2:06 AM
 */
class Queue extends Model
{
    public $table = "`mail_queue`";
    public $table_session = "`session`";

    public $id_session;
    public $id_template;
    public static $session_mail_count = 3;

    public function __construct(){
        parent::__counstruct();
    }

    /**
     * Create new queue session for list of user
     * @author Garegin
     * @param int $id_template Id of the selected template
     * @return last inserted id or False, if session doesn't inserted
     */
    public function createSession($id_template){
        if(!$id_template){
            return false;
        }

        $sql = "INSERT INTO {$this->table_session} (`id_template`) VALUES (?)";

        $query = $this->db->prepare($sql);
        $query->execute(array($id_template));

        $this->id_session = $this->db->lastInsertId();
        $this->id_template = $id_template;

        return $this->id_session;
    }


    /**
     * Inserts mails to queue
     *
     * @todo return more detailed answer: for example 98 added to queue, 2 not
     * @author Garegin
     * @param array $id_users Users ids (Can be also intager for one user)
     * @return boolean Return True if mails inserted to `mail_queue` table, False otherwise
     */
    public function setMails($id_users){
        if(!$this->id_session || !$this->id_template || !$id_users){
            return false;
        }

        // when we do not get an array (for one user)
        $id_users = is_array($id_users) ? $id_users : array($id_users);

        // $this->db->beginTransaction();
        foreach ($id_users as $id_user) {
            $sql = "
                INSERT INTO {$this->table} 
                    (`id_session`, `id_user`, `id_template`)
                VALUES
                    (?, ?, ?)
            ";

            $query = $this->db->prepare($sql);
            $query->execute(array($this->id_session, $id_user, $this->id_template));
        }

        //$db->commit();

        // we can also return more detailed answer: for example 98 added to queue, 2 not
        return true;
    }

    /**
     * Get list of queue mails from `mail_queue` tables
     * @author Garegin
     * @return array Queue list
     */
    public function getMails(){

        $sql = "
            SELECT * 
            FROM {$this->table}
            WHERE `sending` = 0
            ORDER BY `date_add`
            LIMIT " . self::$session_mail_count . "
        ";

        $query = $this->db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);


        //fixing sending status
        if($result){
            $ids = array_map(function($a){return $a['id'];}, $result);

            $sql = "
                UPDATE {$this->table}
                SET `sending` = 1
                WHERE `id` IN(" . implode(",", $ids) . ")
            ";

            $this->db->query($sql);
        }

        return $result;
    }


    /**
     * Update senging status `sending` = 0
     *
     * @author Garegin
     * @param int $id Id of row in `mail_queue` table
     * @return boolean True if status is updated, False otherwise
     */
    public function notSenging($id){
        if(!$id){
            return false;
        }

        $query = $this->db->query("UPDATE {$this->table} SET `sending` = 0 WHERE `id` = $id");

        return $query ? true : false;
    }


    /**
     * Remove row from `mail_queue` table
     * @author Garegin
     * @param int $id Id of row in `mail_queue` table
     * @return boolean True if row is deleted, False otherwise
     */
    public function removeFromQueue($id){
        if(!$id){
            return false;
        }

        $query = $this->db->query("DELETE FROM {$this->table} WHERE `id` = $id");

        return $query ? true : false;
    }



}