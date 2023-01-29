<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class studProfile extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('Student', '', TRUE);
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }

    public function index(){
        $this->load->view('student_header_logged');
        $this->load->view('student_profile');
        $this->load->view('footer');
    }
}
