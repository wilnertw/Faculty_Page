<?php
class Student extends CI_Model{
    private $s_matricNo;
    private $s_name;
    private $s_ic;
    private $s_gender;
    private $s_phone;
    private $s_registerSession;
    private $s_level;
    private $s_programme;


    public function updateStudent($data){
        //var_dump($c_data)
        $value = array(
        'studName'=>trim($data['studName']),
        'studIC'=>trim($data['studIC']),
        'studGender'=>trim($data['studGender']),
        'studPhoneNo'=>trim($data['studPhoneNo']),
        'studRegisterSession'=>trim($data['studRegisterSession']),
        'studProgramme'=>trim($data['studProgramme'])
        );

        $this->db->where('studMatricNo', $data['studMatricNo']);

        if($this->db->update('students', $value)){
            //echo 'update success';
            return true;
        }
        else{
            //echo 'update error';
            return false;
        }
    }

    function checkStudDuplication($matricNo){
            $this->db->select('studMatricNo');
            $this->db->from('students');
            $this->db->where('studMatricNo', $matricNo);

            $this->db->limit(1);
            $query=$this->db->get();

            //echo "1";
            $query->row_array();

            if($query->num_rows()==1){
                return true;
                //encho "2";
            }
            else{
                //echo "3";
                return false;
            }
    }


    function insertNewStudent($data){
    if($data){
        $this->db->trans_begin(true);

        //check the duplication of account
        $query = $this->db->get_where('studlogin', array('studEmail'=> trim($data['studEmail'])));
        $count = $query->num_rows();

        if($count == 0){
            $this->db->select_max('studMatricNo');
            $result = $this->db->get('students');
            
            // if($result->num_rows()>0){
            //     $sArray = $result->result_array();
            //     $sCount = $sArray[0]['studRegNo'];
            //     $sNumber = $sCount + 1;
            // }
            // else{
            //     $sNumber = 10000;
            // }

            $value = array('studMatricNo'=>trim($data['studMatricNo']),
                            'studName'=>trim($data['studName']),
                            'studIC'=>trim($data['studIC']),
                            'studGender'=>trim($data['studGender']),
                            'studPhoneNo'=>trim($data['studPhoneNo']),
                            'studRegisterSession'=>trim($data['studRegisterSession']),
                            'studProgramme'=>trim($data['studProgramme'])
                        );

                        $this->db->insert('students', $value);

                        $valuelogin = array(
                            'studMatricNo'=>trim($data['studMatricNo']),
                            'studEmail'=>trim($data['studEmail']),
                            'studPassword'=>sha1($data['studPassword'])
                        );
                        $this->db->insert('studlogin', $valuelogin);
        }
        else{
            $this->db->trans_rollback();
            return false;
        }

        // === It is used to check the equality of both operands and their data type. 
        if($this->db->trans_status()===FALSE){
            $this->db->trans_rollback();
            return false;
        }
        else{
            $this->db->trans_commit();
            return true;
        }
    }
    else{
        return false;
    }
    }

    function verifyLogin($email, $password){
        $this->db->select('studlogin.studMatricNo, students.studName');
        $this->db->from('studlogin');
        $this->db->join('students', 'students.studMatricNo=studlogin.studMatricNo');
        $this->db->where('studlogin.studEmail', $email);
        $this->db->where('studlogin.studPassword', sha1($password));

        $this->db->limit(1);
        $query=$this->db->get();

        //echo "1";
        $query->row_array();

        if($query->num_rows()==1){
            return $query->result();
            //encho "2";
        }
        else{
            //echo "3";
            return false;
        }
    }

    function getStudentData($sNumber){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('studMatricNo', $sNumber);
        $query=$this->db->get();

        if($query->num_rows()==1){
            return $query->row_array();
        }
        else{
            return false;
            
        }
    }
}
?>
