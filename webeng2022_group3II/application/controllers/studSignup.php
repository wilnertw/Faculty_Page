<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class studSignup extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Student', '', TRUE);
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }
    public function index(){
        $this->load->view('header');
        $this->load->view('student_signupform_view');
        $this->load->view('footer');
    }

 
    function addnew(){
        //Sign Up form validation
        $this->load->library('form_validation');
        $data['content']="studformSignUp"; //$data['content']="formSignup";

        
        //define the rules of input validation
        $this->form_validation->set_rules('studMatricNo', 'Matric No', 'trim|required');
        $this->form_validation->set_rules('studName', 'Name', 'trim|required');
        $this->form_validation->set_rules('studIC', 'Indentity Card Number', 'trim|required');
        $this->form_validation->set_rules('studGender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('studPhoneNo', 'Phone Number', 'trim|required|regex_match[/^(\d{10}|\d{11})$/]');
        $this->form_validation->set_rules('studRegisterSession', 'Register Session','trim|required');
        $this->form_validation->set_rules('studProgramme', 'Programme', 'trim|required');
        $this->form_validation->set_rules('studEmail', 'Login Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('studPassword', 'Login Password', 'trim|required|min_length[6]|max_length[20]');

        $this->form_validation->set_error_delimiters('<div class="error_msg">','</div>');

        $matricNo=$this->input->post('studMatricNo');
        $checkStudDuplication = $this->Student-> checkStudDuplication($matricNo);
        if($checkStudDuplication==true){
            $this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Matric Number already exist! </div>');
            $this->load->view('header');
            $this->load->view('student_signupform_view', $data);
            $this->load->view('footer');
        }
        else if($this->form_validation->run() == FALSE){
            //Field validation failed. User redirected to login page
            $this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Error! Please Enter Correct Information!</div>');
            $this->load->view('header');
            $this->load->view('student_signupform_view', $data);
            $this->load->view('footer');
        }
        else{
            //Binding form data from view into array $Data
            $data['studMatricNo']=$this->input->post('studMatricNo');
            $data['studName']=$this->input->post('studName');
            $data['studIC']=$this->input->post('studIC');
            $data['studGender']=$this->input->post('studGender');
            $data['studPhoneNo']=$this->input->post('studPhoneNo');
            $data['studRegisterSession']=$this->input->post('studRegisterSession');
            $data['studProgramme']=$this->input->post('studProgramme');
            $data['studEmail']=$this->input->post('studEmail');
            $data['studPassword']=$this->input->post('studPassword');
        
        //Pass the $data to controller
        $this->load->model('Student', '', TRUE);
        $result = $this->Student-> insertNewStudent($data);

        if($result){
            $this->session->set_flashdata('status','<div class="alert_green" style="width:60%"> New Student Data Was Added Successfully! </div>');
            $this->load->view('header');
            $this->load->view('student_signupform_view', $data);
            $this->load->view('footer');
        }else{
            $this->session->set_flashdata('status','<div class="alert" style="width:500px"> Error! Please Try Again. </div>');
            $this->load->view('header');
            $this->load->view('student_signupform_view');
            $this->load->view('footer');
        }
        }
    }//end of addnew method
}//end of class
?>
