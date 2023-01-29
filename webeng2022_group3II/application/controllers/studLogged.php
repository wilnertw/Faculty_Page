<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//purose: To show extra feature student can access
class studLogged extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('Student', '', TRUE);
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }

    public function index(){
        $this->load->view('student_header_logged');
        $this->load->view('content_main_logged.php');
        $this->load->view('footer');
    }
}
