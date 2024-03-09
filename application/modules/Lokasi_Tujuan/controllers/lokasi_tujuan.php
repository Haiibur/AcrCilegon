<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_Tujuan extends CI_Controller {
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
        $data['title'] = "Lokasi Tujuan :: My Asisten";
        $data['judul'] = 'Lokasi Tujuan';
        $data['linkpage'] ='';
		$this->template->load('home', 'Lokasi_Tujuan' ,$data);	
	}

	function load_lokasi_tujuan() {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_lokasi_tujuan',
			'order' => 'kd_lokasi DESC'
		];
		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		foreach ($res as $key => $value) {
			$iddata = $value->kd_lokasi.'=t_lokasi_tujuan=kd_lokasi=lokasi=0.jpg';
			$data = [
				'id' 	=> $value->kd_lokasi,
				'ids' => $iddata,
				'nama_lokasi' 	=> $value->nama_lokasi,
				'ket_lokasi' 	=> $value->ket_lokasi,
				'gambar_lokasi' => base_url().'./assets/upload_Lokasi_Tujuan/'.$value->gambar_lokasi,
				'link_vidio' 	=> $value->link_vidio,
			];
			array_push($output, $data);
		}
		// var_dump($data);
		// die();
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_lokasi_tujuan() {
		$data=[
			'title'			=> "Form Lokasi Tujuan :: My Asisten",
			'judul'			=> "Form Lokasi Tujuan",
			'url'			=> base_url('Lokasi_Tujuan/Insert_Lokasi_Tujuan'),
			'id'			=> '',
			'nama_lokasi'	=> '',
			'ket_lokasi'	=> '',
			'gambar_lokasi' => '',
			'link_vidio'	=> ''
		];
		
		$this->template->load('home', 'form_lokasi_tujuan' ,$data);	
	}

	function Insert_Lokasi_Tujuan() {
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_Lokasi_Tujuan';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);
		
		// Upload gambar lokasi
		if ($this->upload->do_upload('gambar_lokasi')) {
			$data = $this->upload->data();
			$gambar_lokasi = $data['file_name'];
		
			$req = [
				'method' => 'insert',
				'table' => 't_lokasi_tujuan',
				'value' => [
					'nama_lokasi' => $this->input->post('nama_lokasi'),
					'ket_lokasi' => $this->input->post('ket_lokasi'),
					'gambar_lokasi' => $gambar_lokasi,
					'link_vidio' => $this->input->post('link_vidio'),
				]
			];

			$this->Modular->queryBuild($req);
		} else {
			$error = $this->upload->display_errors();
			// Handle kesalahan upload gambar
		}
	}	
	

	function edit_lokasi_tujuan($id) {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_lokasi_tujuan',
			'where' => [
				'kd_lokasi' => $id
			]
		];
		
		$row = $this->Modular->queryBuild($req)->row();

		$data=[
			'title'			=> "Form Lokasi Tujuan :: My Asisten",
			'judul'			=> "Form Lokasi Tujuan",
			'url'			=> base_url('lokasi_tujuan/update_lokasi_tujuan'),
			'id'			=> $id,
			'nama_lokasi'	=> $row->nama_lokasi,
			'ket_lokasi'	=> $row->ket_lokasi,
			'gambar_lokasi' => $row->gambar_lokasi,
			'link_vidio'	=> $row->link_vidio
		];
		$this->template->load('home', 'form_lokasi_tujuan' ,$data);	
	}

	function update_lokasi_tujuan() {
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_Lokasi_Tujuan';
		$config['allowed_types'] = 'jpg|jpeg|png|gif||png|mp4|mp3';
		$config['max_size']      = 2048; // in kilobytes
		$this->load->library('upload', $config);

		// Upload gambar lokasi
		if ($this->upload->do_upload('gambar_lokasi')) {
			$data = $this->upload->data();
			$gambar_lokasi = $data['file_name'];

			$req = [
				'method' => 'update',
				'table' => 't_lokasi_tujuan',
				'value' => [
					'nama_lokasi'	 => $this->input->post('nama_lokasi'),
					'ket_lokasi' 	 => $this->input->post('ket_lokasi'),
					'gambar_lokasi'  => $gambar_lokasi,
					'link_vidio' => $this->input->post('link_vidio'),
				],
				'where' => ['kd_lokasi' => $this->input->post('id')]
			];
			$this->Modular->queryBuild($req);
		} else {
			$error = $this->upload->display_errors();
			// Handle error jika upload gagal
			// Misalnya: echo $error; exit();
		}
	}
}