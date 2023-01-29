<?php
class Admin extends CI_Model{
    // private $s_matricNo;
    // private $s_name;
    // private $s_ic;
    // private $s_gender;
    // private $s_phone;
    // private $s_registerSession;
    // private $s_level;
    // private $s_programme;


    public function updateAdmin($data){
        //var_dump($c_data)
        $value = array(
        'adID'=>trim($data['adID']),
        'adName'=>trim($data['adName']),
        'adPhoneNo'=>trim($data['adPhoneNo']),
        'adGender'=>trim($data['adGender']),
        'adIC'=>trim($data['adIC']),
        'adPosition'=>trim($data['adPosition'])
        );

        $this->db->where('adID', $data['adID']);

        if($this->db->update('admins', $value)){
            //echo 'update success';
            return true;
        }
        else{
            //echo 'update error';
            return false;
        }
    }

    function checkAdDuplication($adminID){
            $this->db->select('adID');
            $this->db->from('admins');
            $this->db->where('adID', $adminID);

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


    function insertNewAdmin($data){
    if($data){
        $this->db->trans_begin(true);

        //check the duplication of account
        $query = $this->db->get_where('adlogin', array('adEmail'=> trim($data['adEmail'])));
        $count = $query->num_rows();

        if($count == 0){
            $this->db->select_max('adID');
            $result = $this->db->get('admins');
            
            $value = array('adID'=>trim($data['adID']),
                            'adName'=>trim($data['adName']),
                            'adPhoneNo'=>trim($data['adPhoneNo']),
                            'adGender'=>trim($data['adGender']),
                            'adIC'=>trim($data['adIC']),
                            'adPosition'=>trim($data['adPosition'])
                        );

                        $this->db->insert('admins', $value);

                        $valuelogin = array(
                            'adID'=>trim($data['adID']),
                            'adEmail'=>trim($data['adEmail']),
                            'adPassword'=>sha1($data['adPassword'])
                        );
                        $this->db->insert('adlogin', $valuelogin);
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
        $this->db->select('adlogin.adID , admins.adName');
        $this->db->from('adlogin');
        $this->db->join('admins', 'admins.adID=adlogin.adID');
        $this->db->where('adlogin.adEmail', $email);
        $this->db->where('adlogin.adPassword', sha1($password));

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

    function getAdminData($adminID){
        $this->db->select('*');
        $this->db->from('admins');
        $this->db->where('adID', $adminID);
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
