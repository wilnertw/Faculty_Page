<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class adLogged extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('Admin', '', TRUE);
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }

    public function index(){
        $this->load->view('admin_header_logged');
        $this->load->view('content_main');
        $this->load->view('footer');
    }
}
