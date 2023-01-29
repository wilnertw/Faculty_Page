<?php
class UpdateAdmin extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('Admin', '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index(){
        // form validation
        $this->load->library('form_validation');
        $data['content']="formUpdate";

        //define the rules of input validation
        $this->form_validation->set_rules('adID', 'Admin ID', 'trim|required');
        $this->form_validation->set_rules('adName', 'Name', 'trim|required');
        $this->form_validation->set_rules('adIC', 'Indentity Card Number', 'trim|required');
        $this->form_validation->set_rules('adGender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('adPhoneNo', 'Phone Number', 'trim|required|regex_match[/^(\d{10}|\d{11})$/]');
        $this->form_validation->set_rules('adPosition', 'Position','trim|required');

        $this->form_validation->set_error_delimiters('<div class="error_msg">','</div>');


        if($this->form_validation->run() == FALSE){
            //Field validation failed. User redirected to login page
            //$this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:60%">Error! Please Enter Correct Information!</div>');
            $adminID=$this->session->userdata['logged_in']['adID'];
            $data=$this->Admin->getAdminData($adminID);
            $this->load->view('admin_header_logged');
            $this->load->view('admin_updateDetail_view', $data);
            $this->load->view('footer');
        }
        else{
            //adding new admin into database
            $data['adID']=$this->input->post('adID');
            $data['adName']=$this->input->post('adName');
            $data['adIC']=$this->input->post('adIC');
            $data['adGender']=$this->input->post('adGender');
            $data['adPhoneNo']=$this->input->post('adPhoneNo');
            $data['adPosition']=$this->input->post('adPosition');
        
            //Pass the $data to controller
            $this->load->model('Admin', '', TRUE);
            $result = $this->Admin-> updateAdmin($data);

            if($result){
                $this->session->set_flashdata('status','<div class="alert_green" style="width:60%">Admin Data Was Update Successfully! </div>');
                $adminID=$this->session->userdata['logged_in']['adID'];
                $data=$this->Admin->getAdminData($adminID);
                $this->load->view('admin_header_logged');
                $this->load->view('admin_updateDetail_view', $data);
                $this->load->view('footer');
            }
            else{
                $this->session->set_flashdata('status','<div class="alert" style="width:500px"> Error! Please Try Again. </div>');
                $email=$this->session->userdata['logged_in']['adID'];
                $data=$this->Admin->getAdminData($email);  //$data=$this->Customer->getCustomerData($cNumber);
                $this->load->view('admin_header_logged');
                $this->load->view('admin_updateDetail_view', $data);
                $this->load->view('footer');
            }//result condition
        }//form validation condition
    }//end of addnew method
}//end of class
?>
