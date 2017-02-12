<?php

/**
 * Created by PhpStorm.
 * User: gareg
 * Date: 2/11/2017
 * Time: 11:50 PM
 */
class Home extends Controller
{
    /**
     * Get user list
     * @author Garegin
     * @return array user list
     */
    public function index(){
        $user = $this->model('User');
        $template = $this->model('Template');

        $data = array(
            'page' => 'home',
            'page_title' => 'Users List',
            'list' => $user->getList(),
            'template_list' => $template->getList()
        );

        $this->view('home/index',$data);
    }

    /**
     * Get template list
     * @author Garegin
     * @return array template list
     */
    public function template($id = 0){
        $template = $this->model('Template');

        $data = array(
            'page' => 'template',
            'page_title' => 'Templates List',
            'list' => $template->getList($id)
        );

        $this->view('home/mail_temp',$data);
    }
}