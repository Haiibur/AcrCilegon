<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_Vanue extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->_isLogged();
		$this->load->helper('form');
	}

	function _isLogged() {
		if($this->session->userdata('status_sesi') != TRUE) {
			redirect('login', 'refresh');
		}
	}

	public function index() {
        $data['title'] = "Lokasi Venue :: My Asisten";
        $data['judul'] = 'Lokasi Venue';
        $data['linkpage'] ='';
		$this->template->load('home', 'lokasi_venue' ,$data);	
	}

	function load_lokasi_venue() {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_lokasi_venue',
			'order' => 'kd_venue DESC'
		];
		
		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_venue.'=t_lokasi_venue=kd_venue=lokasi_vanue=0.jpg';
			$data = [
				'id' 			=> $value->kd_venue,
				'ids' 			=> $iddata,
				'nama_venue' 	=> $value->nama_venue,
				'foto_venue' 	=> base_url().'./assets/upload_Lokasi_Vanue/'.$value->foto_venue,
				'titik_lokasi'  => $value->titik_lokasi,
				'ket_venue' 	=> $value->ket_venue,
				'status'		=> $value->status
			];
			array_push($output, $data);
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_lokasi_venue() {
		$data=[
			'title'			=> "Form Lokasi Venue :: My Asisten",
			'judul'			=> "Form Lokasi Venue",
			'url'			=> base_url('lokasi_vanue/Insert_lokasi_venue'),
			'id'			=> '',
			'nama_venue'	=> '',
			'foto_venue'	=> '',
			'titik_lokasi'  => '',
			'ket_venue'		=> '',
			'status'		=> ''
		];
		
		$this->template->load('home', 'form_lokasi_venue' ,$data);	
	}

	function Insert_lokasi_venue() {
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_Lokasi_Vanue';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);
		
		// Upload gambar lokasi
		if ($this->upload->do_upload('foto_venue')) {
			$data = $this->upload->data();
			$foto_venue = $data['file_name'];
			
			$req = [
				'method' => 'insert',
				'table' => 't_lokasi_venue',
				'value' => [
					'nama_venue'	 => $this->input->post('nama_venue'),
					'foto_venue' 	 => $foto_venue,
					'titik_lokasi' 	 => $this->input->post('titik_lokasi'),
					'ket_venue' 	 => $this->input->post('ket_venue'),
					'status' 		 => $this->input->post('status'),
				],
			];

			$this->Modular->queryBuild($req);
		} else {
			$error = $this->upload->display_errors();
		}
	}	
	

	function edit_lokasi_venue($id) {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_lokasi_venue',
			'where' => [
				'kd_venue' => $id
			]
		];
		
		$row = $this->Modular->queryBuild($req)->row();

		$data=[
			'title'			=> "Form Lokasi Venue :: My Asisten",
			'judul'			=> "Form Lokasi Venue",
			'url'			=> base_url('lokasi_vanue/update_lokasi_venue'),
			'id'			=> $id,
			'nama_venue'	=> $row->nama_venue,
			'foto_venue'	=> $row->foto_venue,
			'titik_lokasi' 	=> $row->titik_lokasi,
			'ket_venue'		=> $row->ket_venue,
			'status'		=> $row->status
		];
		
		$this->template->load('home', 'form_lokasi_venue' ,$data);	
	}

	function update_lokasi_venue() {
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_Lokasi_Vanue';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);
				
		// Upload gambar lokasi
		if ($this->upload->do_upload('foto_venue')) {
			$data = $this->upload->data();
			$foto_venue = $data['file_name'];
			
			$req = [
				'method' => 'update',
				'table' => 't_lokasi_venue',
				'value' => [
					'nama_venue'	 => $this->input->post('nama_venue'),
					'foto_venue' 	 => $foto_venue,
					'titik_lokasi' 	 => $this->input->post('titik_lokasi'),
					'ket_venue' 	 => $this->input->post('ket_venue'),
					'status' 		 => $this->input->post('status'),
				],
				'where' => ['kd_venue' => $this->input->post('id')]
			];

			$this->Modular->queryBuild($req);
		} else {
			$error = $this->upload->display_errors();
		}
	}
}