<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller {
	 use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }
	public function __construct()
	{
		parent::__construct();
		$this->__resTraitConstruct();
		$this->load->model('Mahasiswa_model','mahasiswa');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100;
	}

	public function index_get()

	{
		$id = $this->get('id'); //cek request method get ada id nya ga di params kalau di postman
		if ($id === NUll) {
			
		$mahasiswa = $this->mahasiswa->getMahasiswa();
		}else {
			$mahasiswa = $this->mahasiswa->getMahasiswa($id);

		}	
		if ($mahasiswa) {
			 $this->response([
                    'status' => true,
                    'data' => $mahasiswa
                ], 200); // OK (200) being the HTTP response code
            
		}else{
			$this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], 404); // NOT_FOUND (404) being the HTTP response code

		}

	}
	public function index_delete()
	{
		$id=$this->delete('id');

		if ($id===NULL) {
			$this->response([
                    'status' => false,
                    'message' => 'provide an id'
                ], 400); // BAD_REQUEST (400) being the HTTP response code
			
		}else{
			if( $this->mahasiswa->deleteMahasiswa($id) > 0) {
				//ok
				 $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], 204); // NO_CONTENT (204) being the HTTP response code
            

			}else{
				//gagal
				$this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], 400); // BAD_REQUEST (400) being the HTTP response code
			

			}

		}

    }

    public function index_post()
    {
    	$data = [
    				'nrp' => $this->post('nrp'),
    				'nama' => $this->post('nama'),
    				'email' => $this->post('email'),
    				'jurusan' => $this->post('jurusan')
    			];

    			if ($this->mahasiswa->createMahasiswa($data) > 0) {

    				$this->response([
                    'status' => true,
                    'message' => ' new mahasiswa has been created.'
                ], 201); // CREATED (201) being the HTTP response code
			
    			}else{
    				$this->response([
                    'status' => false,
                    'message' => 'failed to create new data'
                ], 400); // BAD_REQUEST (400) being the HTTP response code

    			}

    	    }


    public function index_put()
     	    {
     	    	$id = $this->put('id');
     	    	$data = [
    				'nrp' => $this->put('nrp'),
    				'nama' => $this->put('nama'),
    				'email' => $this->put('email'),
    				'jurusan' => $this->put('jurusan')
    			];
    			if ($this->mahasiswa->updateMahasiswa($data,$id) > 0) {

    				$this->response([ 
                    'status' => true,
                    'message' => ' data mahasiswa has been updated.'
                ], 200); // CREATED (201) being the HTTP response code
			
    			}else{
    				$this->response([
                    'status' => false,
                    'message' => 'failed to update new data'
                ], 400); // BAD_REQUEST (400) being the HTTP response code

    			}

     	    	
     	    } 	    
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/api/Mahasiswa.php */
