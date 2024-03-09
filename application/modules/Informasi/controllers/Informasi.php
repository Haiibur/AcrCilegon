<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->_isLogged();
	}

	function _isLogged()
	{
		if ($this->session->userdata('status_sesi') != TRUE) {
			redirect('login', 'refresh');
		}
	}

	public function index()
	{
		$data['title'] = "Informasi :: My Asisten";
		$data['judul'] = 'Informasi';
		$data['linkpage'] = '';
		$this->template->load('home', 'Informasi', $data);
	}

	function load_informasi()
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_informasi',
			'order' => 'kd_informasi DESC'
		];

		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_informasi . '=t_informasi=kd_informasi=Informasi=0.jpg';
			
			$data = [
				'id' 					 => $value->kd_informasi,
				'ids' 					 => $iddata,
				
				'tgl_post'		 		 => date("d M Y H:i:s", strtotime($value->tgl_post)),
				'judul_informasi'		 => $value->judul_informasi,
				'gambar_informasi' 		 => base_url().'./assets/upload_informasi/'.$value->gambar_informasi,
				'link_youtube' 			 => $value->link_youtube,
				'status_informasi'		 => $value->status_informasi,
				'ket_informasi'			 => $value->ket_informasi,
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_informasi()
	{
		$data['title'] 				= "Informasi :: My Asisten";
		$data['judul'] 				= 'Form Informasi';
		$data['url'] 				= base_url('Informasi/Insert_informasi');
		$data['id'] 				= rand(0, 99) . date('mdh');

		$data['judul_informasi'] 	= '';
		$data['gambar_informasi']   = '';
		$data['link_youtube']   	= '';
		$data['status_informasi'] 	= '';
		$data['ket_informasi'] 		= '';
		
		$this->template->load('home', 'form_informasi', $data);
	}


	
	function Insert_informasi()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_informasi';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		date_default_timezone_set('Asia/Jakarta');

		// Upload Informasi 2
		if ($this->upload->do_upload('gambar_informasi')) {
			$data_gambar_informasi = $this->upload->data();
			$gambar_informasi = $data_gambar_informasi['file_name'];

			$req = [
				'method' => 'insert',
				'table' => 't_informasi',
				'value' => [
					'tgl_post'				 => date("Y-m-d H:i:s"),
					'judul_informasi'		 => $this->input->post('judul_informasi'),
					'gambar_informasi'		 => $gambar_informasi,
					'link_youtube'			 => $this->input->post('link_youtube'),
					'status_informasi'		 => $this->input->post('status_informasi'),
					'ket_informasi'			 => $this->input->post('ket_informasi'),
				]
			];
			
			$this->Modular->queryBuild($req);

		} else {
			$error = $this->upload->display_errors();
		}
	}

	function edit_informasi($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_informasi',
			'where' => [
				'kd_informasi' => $id
			]
		];

		$row = $this->Modular->queryBuild($req)->row();
		$data['title']				= "Update Informasi :: My Asisten";
		$data['judul'] 				= 'Update Informasi ';
		$data['url'] 				= base_url('Informasi/update_informasi');
		$data['id'] 				= $id;

		$data['judul_informasi'] 	= $row->judul_informasi;
		$data['gambar_informasi'] 	= $row->gambar_informasi;
		$data['link_youtube'] 		= $row->link_youtube;
		$data['status_informasi'] 	= $row->status_informasi;
		$data['ket_informasi'] 		= $row->ket_informasi;
		$this->template->load('home', 'form_informasi', $data);
		
	}

	function update_informasi()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_informasi';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Informasi 2
		if ($this->upload->do_upload('gambar_informasi')) {
			$data_gambar_informasi = $this->upload->data();
			$gambar_informasi = $data_gambar_informasi['file_name'];

			date_default_timezone_set('Asia/Jakarta');

			$req = [
				'method' => 'update',
				'table' => 't_informasi',
				'value' => [
					'tgl_post'				 => date("Y-m-d H:i:s"),
					'judul_informasi'		 => $this->input->post('judul_informasi'),
					'gambar_informasi'		 => $gambar_informasi,
					'link_youtube'			 => $this->input->post('link_youtube'),
					'status_informasi'		 => $this->input->post('status_informasi'),
					'ket_informasi'			 => $this->input->post('ket_informasi'),
				],
				'where' => ['kd_informasi' => $this->input->post('id')]
			];
			
			$this->Modular->queryBuild($req);
			
		} else {
			$error = $this->upload->display_errors();
			// Handle kesalahan upload foto gambar 2
		}
	}
}