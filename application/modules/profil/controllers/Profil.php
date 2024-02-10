<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->_isLogged();
	}

	function _isLogged() {
		if($this->session->userdata('status_sesi') != TRUE) {
			redirect('login', 'refresh');
		}
	}

	public function index() {
        $data['title'] = "Profil Sistem :: My Asisten";
        $data['judul'] = 'Profil Sistem';
        $data['linkpage'] ='';
        $req = [
            'method' => 'get',
            'select' => '*',
            'table' => 't_profil',
            'where' => [
                'kd_profil' => '1'
            ]
        ];
        $res = $this->Modular->queryBuild($req)->row();
        $data['nama'] = $res->nama_profil_sistem;
        $data['logo'] = $res->logo;
        $data['versi']= $res->versi;
		$this->template->load('home', 'profil' ,$data);	
	}

	function update_prf() {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_profil',
			'where' => [
				'kd_profil' => '1'
			]
		];
		$res = $this->Modular->queryBuild($req)->row_array();

        $config2['upload_path']  = './assets/img/profil/logo/';
        $config2['allowed_types']= 'png|jpg|jpeg|ico';
        $config2['file_name']    = $res['kd_profil'];
        $config2['encrypt_name'] = TRUE;
        $config2['overwrite']    = TRUE;
        $this->load->library('upload', $config2);
        if ($this->upload->do_upload('logo')) {
            if(file_exists($img = 'assets/img/profil/logo/'.$req['logo'])) {
                unlink($img);
            }
            $logo = $this->upload->data('file_name');
        } else {
            $logo = $res['logo'];
        }
		$req_update = [
			'method' => 'update',
			'table' => 't_profil',
			'where' => [
				'kd_profil' => $res['kd_profil']
			],
			'value' => [
				'nama_profil_sistem' => $this->input->post('nama'),
				'logo' => $logo,
				'versi' => $this->input->post('versi')
			]
		];
		$this->Modular->queryBuild($req_update);
	}
}