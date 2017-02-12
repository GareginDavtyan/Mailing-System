<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/12/2017
 * Time: 3:39 AM
 */
class Email extends Model
{
    public $id_session;
    public $id_user;
    public $id_template;

    public function __construct($id_session, $id_user, $id_template){
        parent::__counstruct();
        $this->id_user = $id_user;
        $this->id_template = $id_template;
        $this->id_session = $id_session;
    }

    /**
     * Sending email to user
     * @author Garegin
     * @return boolean True if mail sent, False otherwise
     */
    public function sendEmail(){

        // for testing
        return true;

        if(!$this->id_template || !$this->id_user){
            return false;
        }

        $user = new User($this->id_user);
        $template = new Template($this->id_template);

        return $this->send($user->email, $template->title, $template->content);
    }


    /**
     * Sending email to user
     * @author Garegin
     * @param string $to user's email to send
     * @param string $subject mail subject
     * @param string $message mail message
     * @return boolean True if mail sent, False otherwise
     */
    public function send($to, $subject, $message){

        if(!$to || !$message){
            return false;
        }

        // for html content
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';


        $headers[] = 'From: garegin1989@gmail.com';
        $headers[] = 'Reply-To: garegin1989@gmail.com';
        $headers[] = 'X-Mailer: PHP/' . phpversion();

        return mail($to, $subject, $message, implode("\r\n", $headers));
    }
}