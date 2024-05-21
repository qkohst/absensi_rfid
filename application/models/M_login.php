<?php
class M_login extends CI_Model {
        
    function prosesLogin($username){
        $this->db->where('username',$username);
        
        return $this->db->get('user')->row();
    }

    function checkEmail($email){
        $this->db->where('email',$email);
        
        return $this->db->get('user')->row();
    }
    
    function viewDataByID($username){
        $query = $this->db->where('username',$username);
        $q = $this->db->get('user');
        $data = $q->result();
        
        return $data;
    }

    function viewDataByIDemail($email){
        $query = $this->db->where('email',$email);
        $q = $this->db->get('user');
        $data = $q->result();
        
        return $data;
    }

    function checkDataUsrbyID($id,$pass){
        $this->db->where('id_user',$id);
        $this->db->where('password',$pass);
        
        return $this->db->get('user')->row();
    }

    function changepassUser($id,$data){
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);

        return TRUE;
    }

    function adduser($data){
        $this->db->insert('user', $data);

        return TRUE;
    }

}

?>