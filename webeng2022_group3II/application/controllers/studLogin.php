<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class studLogin extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('Student', '', TRUE);
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }

    public function index(){
        $this->load->view('header');
        $this->load->view('student_login_view');
        $this->load->view('footer');
    }

  
    function verifyUser(){
        //This method will have yje credentials validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('studEmail', 'Login Email', 'trim|required');
            $this->form_validation->set_rules('studPassword', 'Password', 'trim|required|min_length[6]|max_length[20]');
    
            if($this->form_validation->run()==FALSE){ echo "if";
                //Field validation failed. User redirected to login page
                $this->load->helper(array('form'));
                $this->load->view('header');
                $this->load->view('student_login_view');
                $this->load->view('footer');
                $this->session->set_flashdata('login_status', '<div class="alert alert-danger text-center" style="width:500px">Error! Please enter a valid user email and login password. </div>');
            }
            else{ //echo "else";
                //Passed Validation. Continue to verify user login details
                $email = $this->input->post('studEmail');
                $password = $this->input->post('studPassword');
                $sNumber = $this->checkDatabase($email, $password);
                $data = $this->Student->getStudentData($sNumber);
                //var_dump($data);
     
                $this->load->view('student_header_logged');
                $this->load->view('student_main_view', $data);
                $this->load->view('footer');
            }
        }//End of user verify

       function checkDatabase($email, $password){
            //query the databse
            $result = $this->Student->verifyLogin($email, $password);
    
            if($result){
                $sess_array=array();
                foreach($result as $row){
                    $sess_array=array(
                        'studMatricNo'=>$row->studMatricNo,
                        'studName'=>$row->studName,
                        'studEmail'=>$email /**hmm?  'email'=>$row->customerEmail */
                    );
    
                    $studMatricNo=$row->studMatricNo;
                    $this->session->set_userdata('logged_in', $sess_array);
                }
                //var_dump($sess_array);
                return $studMatricNo;
            }
            else{
                $this->session->set_flashdata('login_status','<dic class="alert" style="width:50%">User Record Not Found! Please enter a correct username and password. </div>');
                $this->load->view('header');
                $this->load->view('student_login_view');
                $this->load->view('footer');
            }
        }//end of checkDatabase
    }//end of class