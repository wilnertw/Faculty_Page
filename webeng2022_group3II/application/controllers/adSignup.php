<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adSignup extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Admin', '', TRUE);
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }
    public function index(){
        $this->load->view('header');
        $this->load->view('admin_signupform_view');
        $this->load->view('footer');
    }

 
    function addnew(){
        //Sign Up form validation
        $this->load->library('form_validation');
        $data['content']="adformSignUp"; //$data['content']="formSignup";

        
        //define the rules of input validation
        $this->form_validation->set_rules('adID', 'Admin ID', 'trim|required');
        $this->form_validation->set_rules('adName', 'Name', 'trim|required');
        $this->form_validation->set_rules('adIC', 'Indentity Card Number', 'trim|required');
        $this->form_validation->set_rules('adGender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('adPhoneNo', 'Phone Number', 'trim|required|regex_match[/^(\d{10}|\d{11})$/]');
        $this->form_validation->set_rules('adPosition', 'Position','trim|required');
        $this->form_validation->set_rules('adEmail', 'Login Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('adPassword', 'Login Password', 'trim|required|min_length[6]|max_length[20]');

        $this->form_validation->set_error_delimiters('<div class="error_msg">','</div>');

        $adminID=$this->input->post('adID');
        $checkAdDuplication = $this->Admin-> checkAdDuplication($adminID);
        if($checkAdDuplication==true){
            $this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Admin ID already exist an account! </div>');
            $this->load->view('header');
            $this->load->view('admin_signupform_view', $data);
            $this->load->view('footer');
        }
        else if($this->form_validation->run() == FALSE){
            //Field validation failed. User redirected to login page
            $this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Error! Please Enter Correct Information!</div>');
            $this->load->view('header');
            $this->load->view('admin_signupform_view', $data);
            $this->load->view('footer');
        }
        else{
            //Binding form data from view into array $Data
            $data['adID']=$this->input->post('adID');
            $data['adName']=$this->input->post('adName');
            $data['adIC']=$this->input->post('adIC');
            $data['adGender']=$this->input->post('adGender');
            $data['adPhoneNo']=$this->input->post('adPhoneNo');
            $data['adPosition']=$this->input->post('adPosition');
            $data['adEmail']=$this->input->post('adEmail');
            $data['adPassword']=$this->input->post('adPassword');
        
        //Pass the $data to controller
        $this->load->model('Admin', '', TRUE);
        $result = $this->Admin-> insertNewAdmin($data);

        if($result){
            $this->session->set_flashdata('status','<div class="alert_green" style="width:60%"> New Admin Data Was Added Successfully! </div>');
            $this->load->view('header');
            $this->load->view('admin_signupform_view', $data);
            $this->load->view('footer');
        }else{
            $this->session->set_flashdata('status','<div class="alert" style="width:500px"> Error! Please Try Again. </div>');
            $this->load->view('header');
            $this->load->view('admin_signupform_view');
            $this->load->view('footer');
        }
        }
    }//end of addnew method
}//end of class
?>
