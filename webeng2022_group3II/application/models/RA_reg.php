<?php

class RA_reg extends CI_Model{

    function __construct(){

        parent::__construct();
    }

    function insertNewApplicant($data){

        if($data){
            
            $this->db->trans_begin(true);

            $value = array(
                'CAT1' => trim($data['cat1']),
                'CAT2' => trim($data['cat2']),
                'CAT3' => trim($data['cat3']),
                'RApplicantName' => trim($data['applicantName']),
                'RApplicantID' => trim($data['applicantID']),
                'RApplicantFac' => trim($data['applicantFac']),
                'RApplicantDep' => trim($data['applicantDep']),
                'RApplicantEmail1' => trim($data['applicantEmail1']),
                'RApplicantEmail2' => trim($data['applicantEmail2']),
                'RApplicantOfficeHP' => trim($data['applicantOfficeHP']),
                'RApplicantHP' => trim($data['applicantHP']),
                'RApplicantFOS' => trim($data['applicantFOS']),
                'RAplicantRG' => trim($data['aplicantRG']),
                'RGRemark' => trim($data['aRGRemark']),
                'RAplicantRA' => trim($data['aplicantRA']),
                'RAAlliance' => trim($data['aAlliance'])
            );
            $this->db->insert('raapplicant', $value);
        
        }else{
            $this->db->trans_Rollback();
            return false;
        }

        if($this->db->trans_Status() == FALSE){
            $this->db->trans_Rollback();
            return false;

        }else{
            $this->db->trans_Commit();
            return true;
        }
    }

    function getApplicantData($AID){

        $this->db->select('*');
        $this->db->from('raapplicant');
        $this->db->where('ApplicantID', $AID);
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->row_array();
        }else{
            return false;
        }
    }

    public function approveApplicant($data){
    
        $value = array(
            'sectD_Remarks' => trim($data['sectD_Remarks']),
            'Admin_approve' => trim($data['admin_approve']));
        
        $this->db->where('ApplicantID', $data['admin_pick']);

        if($this->db->update('raapplicant', $value)){
            //echo 'update success'
            return true;
        }else{
            //echo 'update error'
            return false;
        }
    }
}