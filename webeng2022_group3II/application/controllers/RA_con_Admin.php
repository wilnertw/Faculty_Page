<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RA_con_Admin extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('RA_reg', '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');        
    }

    public function index(){

        $data['content'] = "RAadmin";
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('admin_pick', 'admin_pick', 'trim|required');
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';
        // exit();
        
        if($this->form_validation->run() == FALSE){ 
            /* Field VAalidation failed. User redirected to login page */ 

            $data['admin_pick'] = 1;

            $res = $this->RA_reg->getApplicantData($data['admin_pick']);
            $this->load->view('admin_header_logged');
            $this->load->view('project2_admin_view', $res);
            $this->load->view('footer');

        }else{
            $action = $this->input->post('action');
            
            if($action == 'fetch'){
                
               
                $data['admin_pick'] = $this->input->post('admin_pick');

                // echo '<pre>';
                //     print_r($data);
                //     echo '<pre>';
                //     exit();

                $res = $this->RA_reg->getApplicantData($data['admin_pick']);
                $this->load->view('admin_header_logged');
                $this->load->view('project2_admin_view', $res);
                $this->load->view('footer');
            }
            if($action == 'approve'){
                
                $data['admin_pick'] = $this->input->post('admin_pick');
                $data['sectD_Remarks'] = $this->input->post('sectD_Remarks');
                $data['admin_approve'] = 1;

                $this->load->model('RA_reg', '', TRUE);
                $result = $this->RA_reg->approveApplicant($data);

                if($result){
                    $this->session->set_flashdata('status', '<div class="alert alert-green text-center" style="width:500px">Applicant Approved</div>');
                    $res = $this->RA_reg->getApplicantData($data['admin_pick']);
                    $this->load->view('admin_header_logged');
                    $this->load->view('project2_admin_view', $res);
                    $this->load->view('footer');
                }
            }
            if($action == 'reject'){
                
                $data['admin_pick'] = $this->input->post('admin_pick');
                $data['sectD_Remarks'] = $this->input->post('sectD_Remarks');
                $data['admin_approve'] = 0;
                
                
                $this->load->model('RA_reg', '', TRUE);
                $result = $this->RA_reg->approveApplicant($data);
                
                if($result){
                    $this->session->set_flashdata('status', '<div class="alert alert-green text-center" style="width:500px">Applicant Rejected</div>');
                    $res = $this->RA_reg->getApplicantData($data['admin_pick']);
                    $this->load->view('admin_header_logged');
                    $this->load->view('project2_admin_view', $res);
                    $this->load->view('footer');
                }
            }
        }
    }
}