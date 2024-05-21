<?php
class M_api extends CI_Model {
        
	function getmode($iddev){
		$query = $this->db->where('id_devices',$iddev);
        $q = $this->db->get('devices');
        $data = $q->result();
        
        return $data;
	}

	function getkey(){
		$query = $this->db->where('id_key',1);
        $q = $this->db->get('secret_key');
        $data = $q->result();
        
        return $data;
	}

	function getdevice($iddev){
		$query = $this->db->where('id_devices',$iddev);
        $q = $this->db->get('devices');
        $data = $q->result();
        
        return $data;
	}

	function insert_rfid($data){
		$this->db->insert('rfid', $data);
       return TRUE;
	}

	function last_rfid(){
		$this->db->select('*');
        $this->db->from('rfid');
        $this->db->order_by('id_rfid', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
	}

	function insert_histori($data){
		$this->db->insert('histori', $data);
       return TRUE;
	}

	function checkRFID($rfid){
		$query = $this->db->where('uid',$rfid);
        $q = $this->db->get('rfid');
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

    function insert_absensi($data){
		$this->db->insert('absensi', $data);
       return TRUE;
	}

	function get_absensi($ket,$today,$tomorrow){
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where("keterangan", $ket);
        $this->db->where("created_at >=", $today);
        $this->db->where("created_at <", $tomorrow);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function lastRFIDfoto($idrfid){
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where("id_rfid", $idrfid);
        $this->db->order_by('id_absensi', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function update_absensi($id_absensi, $data){
        $this->db->where('id_absensi', $id_absensi);
        $this->db->update('absensi', $data);

        return TRUE;
    }


}

?>