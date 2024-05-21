<?php
class M_admin extends CI_Model {

    function get_users(){
        $this->db->select('*');
        $this->db->from('user');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function insert_users($data){
       $this->db->insert('user', $data);
       return TRUE;
    }

    function users_del($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }


    function updateUser($id,$data){
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);

        return TRUE;
    }

    function get_user_byid($id) {
        $query = $this->db->where('id_user',$id);
        $q = $this->db->get('user');
        $data = $q->result();
        
        return $data;
    }


    function get_devices_byid($id) {
        $query = $this->db->where('id_devices',$id);
        $q = $this->db->get('devices');
        $data = $q->result();
        
        return $data;
    }

    function get_devices(){
        $this->db->select('*');
        $this->db->from('devices');
        $this->db->order_by('id_devices', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
    
    function insert_devices($data){
       $this->db->insert('devices', $data);
       return TRUE;
    }

    function devices_del($id) {
        $this->db->where('id_devices', $id);
        $this->db->delete('devices');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }
    
    function updateDevices($id,$data){
        $this->db->where('id_devices', $id);
        $this->db->update('devices', $data);

        return TRUE;
    }


    function empty_data(){
        $this->db->truncate('histori');
        return TRUE;
    }

    function get_rfid(){
        $this->db->select('*');
        $this->db->from('rfid');
        $this->db->order_by('id_rfid', 'desc');
        //$this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_rfid_byid($id) {
        $query = $this->db->where('id_rfid',$id);
        $q = $this->db->get('rfid');
        $data = $q->result();
        
        return $data;
    }

    function get_rfid_byid_row($id) {
        return $this->db->count_all_results('rfid');

    }

    function updateRFID($id,$data){
        $this->db->where('id_rfid', $id);
        $this->db->update('rfid', $data);

        return TRUE;
    }

    function rfid_del($id) {
        $this->db->where('id_rfid', $id);
        $this->db->delete('rfid');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function get_absensi($ket,$today,$tomorrow){
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->join('devices','absensi.id_devices=devices.id_devices','inner');
        $this->db->join('rfid','absensi.id_rfid=rfid.id_rfid','inner');
        $this->db->where("keterangan", $ket);
        $this->db->where("created_at >=", $today);
        $this->db->where("created_at <", $tomorrow);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }


    function get_history(){
        $this->db->select('*');
        $this->db->from('histori');
        $this->db->join('rfid', 'rfid.id_rfid=histori.id_rfid', 'inner');
        $this->db->join('devices', 'devices.id_devices=histori.id_devices', 'inner');
        $this->db->order_by('id_histori', 'desc');
        $this->db->limit(50);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function getkey(){
        $query = $this->db->where('id_key',1);
        $q = $this->db->get('secret_key');
        $data = $q->result();
        
        return $data;
    }

    function waktuoperasional(){
        $this->db->select('*');
        $this->db->from('waktu_operasional');
        $this->db->limit(2);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function updateWaktuOperasional($id,$data){
        $this->db->where('id_waktu_operasional', $id);
        $this->db->update('waktu_operasional', $data);

        return TRUE;
    }


}

?>