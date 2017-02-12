<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/12/2017
 * Time: 3:34 AM
 */
class MailSent extends Model
{
    public $table = "`mail_sent`";
    public $table_queue = "`mail_queue`";
    public $table_session = "`session`";
    public $table_user = "`user`";
    public $table_template = "`template`";


    public function __construct(){
        parent::__counstruct();
    }

    /**
     * Get Statistic for sent mails
     *
     * @todo pagination availability
     * @author Garegin
     * @return array Statistic
     */
    public function getList(){

        $sql = "
            SELECT m.*, u.`name` as user_name, u.`email` AS user_email, t.`title` as template_name
            FROM {$this->table} m
            LEFT JOIN {$this->table_user} u ON m.`id_user` = u.`id`
            LEFT JOIN {$this->table_template} t ON m.`id_template` = t.`id`
        ";

        $query = $this->db->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get statistic for mails in queue
     *
     * @author Garegin
     * @return array mails in queue and sent mails statistic list
     */
    public function queueStatistic(){
        // subquery for counting sent mails
        $sql_sent_count = "
            SELECT COUNT(*) FROM {$this->table} WHERE `id_session` = s.`id`
        ";

        // subquery for counting mails in queue
        $sql_queue_count = "
            SELECT COUNT(*) FROM {$this->table_queue} WHERE `id_session` = s.`id`
        ";

        // subquery for counting mails in process to send
        $sql_in_process_count = "
            SELECT COUNT(*) FROM {$this->table_queue} WHERE `id_session` = s.`id` AND `sending` = 1
        ";

        $sql = "
            SELECT 
                s.`id`, s.`date_add`,
                ($sql_sent_count) AS sent_count,
                ($sql_queue_count) AS queue_count,
                ($sql_in_process_count) AS in_process_count
            FROM {$this->table_session} s
            ORDER BY s.`date_add`
        ";

        $query = $this->db->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Adding sent mail info to `statistic` table
     * @author Garegin
     * @param $id_user integer Id of the user
     * @param $id_template integer Id of the sent mail template
     * @return boolean True if row is inserted and false otherwise
     */
    public static function addToSent($id_session, $id_user, $id_template){
        if(!$id_session || !$id_template || !$id_user){
            return false;
        }

        global $db;

        $sql = "
            INSERT INTO `mail_sent`
                (`id_session`, `id_user`, `id_template`, `date_sent`)
            VALUES
                ($id_session, $id_user, $id_template, NOW())
        ";

        $res = $db->query($sql);

        return $res ? true : false;
    }
}