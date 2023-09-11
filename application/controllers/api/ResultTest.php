<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class ResultTest extends CI_Controller {
	 use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }
	public function __construct()
	{
		parent::__construct();
		$this->__resTraitConstruct();
		$this->load->model('ResultTest_model','resultTest');
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100;
	}




    public function index_post()
    {
		$now = new DateTime(); 
    	$data = [
    				'kode_anak' => $this->post('arus'),
    				'berat_badan' => $this->post('kelembaban'),
    				'tinggi_badan' => $this->post('tegangan'),
    				'suhu_anak' => $this->post('suhu'),
					'kode_alat_posyandu' => 'ALAT01',
					'waktu' =>  $now->format("Y-m-d H:i:s"),
    			];

    			if ($this->resultTest->createResultRest($data) > 0) {

    				$this->response([
                    'status' => true,
                    'message' => ' new data rresult has been created.'
                ], 201); // CREATED (201) being the HTTP response code
			
    			}else{
    				$this->response([
                    'status' => false,
                    'message' => 'failed to create new data'
                ], 400); // BAD_REQUEST (400) being the HTTP response code

    			}

    	    }



     	      
}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/api/Mahasiswa.php */
