<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultTest_model extends CI_Model {


 public function createResultRest($data)
 {
 	$this->db->insert('tb_anak',$data);
 	return $this->db->affected_rows();
 }


}
/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */
