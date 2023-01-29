<?php 

class RA_con extends CI_Controller{

    function __construct(){

        parent::__construct();
        
        $this->load->model('RA_reg', '', TRUE);
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index(){
        $this->load->view('header');
        $this->load->view('project2_student_view');
        $this->load->view('footer');

    }
    
    function addnew(){

        //Registeration Form validation
        $this->load->library('form_validation');
        $data ['content'] = "RAform";

        $this->form_validation->set_rules('category1', 'category1', 'trim|required');
        $this->form_validation->set_rules('category2', 'category 2', 'trim|required');
        $this->form_validation->set_rules('aName', 'Name', 'trim|required');
        $this->form_validation->set_rules('aID', 'ID', 'trim|required');
        $this->form_validation->set_rules('aFac', 'Faculty', 'trim|required');
        $this->form_validation->set_rules('aDep', 'Department', 'trim|required');
        $this->form_validation->set_rules('aEmail1', '1st Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('aEmail2', '2nd Email', 'trim|valid_email');
        $this->form_validation->set_rules('aOffHPNo', 'Office HP No', 'trim||regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('aHPNo', 'Phone', 'trim|required|regex_match[/^(\d{10}|\d{11})$/]');
        $this->form_validation->set_rules('aFOS', 'Field of Expertise', 'trim|required');
        $this->form_validation->set_rules('aRG', 'Research Group', 'trim|required');
        $this->form_validation->set_rules('aAlliance', 'Research Alliance', 'trim|required');

        $this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');

        if($this->form_validation->run() == FALSE){ 
            /* Field VAalidation failed. User redirected to login page */ 
            $this->session->set_flashdata('status', '<div class="alert alert-danger text-center" style="width:40%; margin-left: 31.5%">Error! Please Enter Correct Information!</div>');
            $this->load->view('header');
            $this->load->view('project2_student_view', $data);
            $this->load->view('footer');
        
        }else{
       
        //Binding form data from view into array $Data
            $data['cat1'] = $this->input->post('category1');
            $data['cat2'] = $this->input->post('category2');
            $data['cat3'] = $this->input->post('category3');
            $data['applicantName'] = $this->input->post('aName');
            $data['applicantID'] = $this->input->post('aID');
            $data['applicantFac'] = $this->input->post('aFac');
            $data['applicantDep'] = $this->input->post('aDep');
            $data['applicantEmail1'] = $this->input->post('aEmail1');
            $data['applicantEmail2'] = $this->input->post('aEmail2');
            $data['applicantOfficeHP'] = $this->input->post('aOffHPNo');
            $data['applicantHP'] = $this->input->post('aHPNo');
            $data['applicantFOS'] = $this->input->post('aFOS');
            $data['aplicantRG'] = $this->input->post('aRG');
            $data['aRGRemark'] = $this->input ->post('aRemark');
            $data['aplicantRA'] = $this->input->post('aAlliance'); 
            $data['aAlliance'] = $this->input->post('sectC_Remarks'); 

        //Pass the $data to controller
            $this->load->model('RA_reg', '', TRUE);
            $result = $this->RA_reg->insertNewApplicant($data);
        
            if($result){
                    
                $this->session->set_flashdata('status', '<div class="alert_green" style="width: 60%; margin-left: 47%">Registration Form Submitted</div>');

                $this->load->view('header');
                $this->load->view('project2_student_view', $data);
                $this->load->view('footer');
            }else{

                $this->session->set_flashdata('status', '<div class="alert" style="width:500px">Error! Please Try Again!!</div>');
                
                $this->load->view('header');
                $this->load->view('project2_student_view');
                $this->load->view('footer');
            }
        }
    }
}