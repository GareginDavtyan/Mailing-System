<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/12/2017
 * Time: 4:51 AM
 */
class State extends Controller
{
    /**
     * Get statistic for sent mails
     * @author Garegin
     * @return array statistic list
     */
    public function index(){
        $statistic = $this->model('MailSent');
        $data = array(
            'page' => 'statistic',
            'page_title' => 'Sent Email Statistic',
            'list' => $statistic->getList()
        );

        $this->view('statistic/index',$data);
    }


    /**
     * Get queue statistic
     * @author Garegin
     * @return array queue statistic
     */
    public function queue(){
        $queue = $this->model('MailSent');
        $data = array(
            'page' => 'queue',
            'page_title' => 'Queue Statistic',
            'list' => $queue->queueStatistic()
        );

        $this->view('statistic/queue',$data);
    }
}