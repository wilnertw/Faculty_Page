<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adLogin extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->model('Admin', '', TRUE);
        $this->load->library('session');
            $this->load->helper('form');
            $this->load->helper('url');
    }

    public function index(){
        $this->load->view('header');
        $this->load->view('admin_login_view');
        $this->load->view('footer');
    }

  
    function verifyUser(){
        //This method will have yje credentials validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('adEmail', 'Login Email', 'trim|required');
            $this->form_validation->set_rules('adPassword', 'Password', 'trim|required|min_length[6]|max_length[20]');
    
            if($this->form_validation->run()==FALSE){ echo "if";
                //Field validation failed. User redirected to login page
                $this->load->helper(array('form'));
                $this->load->view('header');
                $this->load->view('admin_login_view');
                $this->load->view('footer');
                $this->session->set_flashdata('login_status', '<div class="alert alert-danger text-center" style="width:500px">Error! Please enter a valid user email and login password. </div>');
            }
            else{ //echo "else";
                //Passed Validation. Continue to verify user login details
                $email = $this->input->post('adEmail');
                $password = $this->input->post('adPassword');
                $adminID = $this->checkDatabase($email, $password);
                $data = $this->Admin->getAdminData($adminID);
                //var_dump($data);
     
                $this->load->view('admin_header_logged');
                $this->load->view('admin_dashboard', $data);
                $this->load->view('footer');
            }
        }//End of user verify

       function checkDatabase($email, $password){
            //query the databse
            $result = $this->Admin->verifyLogin($email, $password);
    
            if($result){
                $sess_array=array();
                foreach($result as $row){
                    $sess_array=array(
                        'adID'=>$row->adID,
                        'adName'=>$row->adName,
                        'adEmail'=>$email
                    );
    
                    $adID=$row->adID;
                    $this->session->set_userdata('logged_in', $sess_array);
                }
                //var_dump($sess_array);
                return $adID;
            }
            else{
                $this->session->set_flashdata('login_status','<dic class="alert" style="width:50%">User Record Not Found! Please enter a correct username and password. </div>');
                $this->load->view('header');
                $this->load->view('admin_login_view');
                $this->load->view('footer');
            }
        }//end of checkDatabase
    }//end of class