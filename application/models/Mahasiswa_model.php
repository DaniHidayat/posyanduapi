<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

	 public function getMahasiswa($id=null)
	{
		if ($id === null) {
			# code...
		return $this->db->get('mahasiswa')->result_array();
		}else{
			return $this->db->get_where('mahasiswa',['id' => $id])->result_array();
			}
		}

		 public function deleteMahasiswa($id)
		{
			$this->db->delete('mahasiswa',['id' => $id]);
			return $this->db->affected_rows(); //ada berapa baris yang terpengaruhi di dalam table nya

}
 public function createMahasiswa($data)
 {
 	$this->db->insert('mahasiswa',$data);
 	return $this->db->affected_rows();
 }

 public function updateMahasiswa($data,$id)
 {
 	$this->db->update('mahasiswa',$data,['id' => $id]);
 	return $this->db->affected_rows();
 }
}
/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */
