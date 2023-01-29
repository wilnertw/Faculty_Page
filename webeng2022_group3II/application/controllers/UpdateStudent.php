<?php
class UpdateStudent extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Student', '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index(){
        // form validation
        $this->load->library('form_validation');
        $data['content']="formUpdate";

        //define the rules of input validation
        $this->form_validation->set_rules('studMatricNo', 'Matric No', 'trim|required');
        $this->form_validation->set_rules('studName', 'Name', 'trim|required');
        $this->form_validation->set_rules('studIC', 'Indentity Card Number', 'trim|required');
        $this->form_validation->set_rules('studGender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('studPhoneNo', 'Phone Number', 'trim|required|regex_match[/^(\d{10}|\d{11})$/]');
        $this->form_validation->set_rules('studRegisterSession', 'Register Session','trim|required');
        $this->form_validation->set_rules('studProgramme', 'Programme', 'trim|required');

        //$this->form_validation->set_error_delimiters('<div class="error_msg">','</div>');


        if($this->form_validation->run() == FALSE){
            //Field validation failed. User redirected to login page
            //$this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Error! Please Enter Correct Information!</div>');
            $sNumber=$this->session->userdata['logged_in']['studMatricNo'];
            $data=$this->Student->getStudentData($sNumber);
            $this->load->view('student_header_logged');
            $this->load->view('student_main_view', $data);
            $this->load->view('footer');
        }
        else{
            //adding new student into database
            $data['studMatricNo']=$this->session->userdata['logged_in']['studMatricNo'];
            $data['studName']=$this->input->post('studName');
            $data['studIC']=$this->input->post('studIC');
            $data['studGender']=$this->input->post('studGender');
            $data['studPhoneNo']=$this->input->post('studPhoneNo');
            $data['studRegisterSession']=$this->input->post('studRegisterSession');
            $data['studProgramme']=$this->input->post('studProgramme');
        
            //Pass the $data to controller
            $this->load->model('Student', '', TRUE);
            $result = $this->Student-> updateStudent($data);

            if($result){
                $this->session->set_flashdata('status','<div class="alert_green" style="width:60%">Student Data Was Update Successfully! </div>');
                $sNumber=$this->session->userdata['logged_in']['studMatricNo'];
                $data=$this->Student->getStudentData($sNumber);
                $this->load->view('student_header_logged');
                $this->load->view('Student_main_view', $data);
                $this->load->view('footer');
            }
            else{
                $this->session->set_flashdata('status','<div class="alert" style="width:500px"> Error! Please Try Again. </div>');
                $email=$this->session->userdata['logged_in']['studMatricNo'];
                $data=$this->Student->getStudentData($email);  //$data=$this->Customer->getCustomerData($cNumber);
                $this->load->view('student_header_logged');
                $this->load->view('Student_main_view', $data);
                $this->load->view('footer');
            }//result condition
        }//form validation condition
    }//end of addnew method
}//end of class
?>
