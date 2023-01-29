<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginRole extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }

    public function index(){
        $this->load->view('header');
        $this->load->view('login_role_view');
        $this->load->view('footer');
    }

}