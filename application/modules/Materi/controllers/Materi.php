<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
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
		$data['title'] = "Materi :: My Asisten";
		$data['judul'] = 'Materi';
		$data['linkpage'] = '';
		$this->template->load('home', 'Materi', $data);
	}

	function load_Materi()
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_materi',
			'order' => 'kd_materi DESC'
		];

		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_materi . '=t_materi=kd_materi=Materi=0.jpg';
			$data = [
				'id' => $value->kd_materi,
				'ids' => $iddata,
				'nama_materi'		 => $value->nama_materi,
				'file_materi'		 => base_url().'./assets/upload_materi/'.$value->file_materi,
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_Materi()
	{
		$data['title'] 			= "Materi :: My Asisten";
		$data['judul'] 			= 'Form Materi';
		$data['url'] 			= base_url('Materi/Insert_materi');
		$data['id'] 			= rand(0, 99) . date('mdh');
		$data['nama_materi']    = '';
		$data['file_materi'] 	= '';
		
		$this->template->load('home', 'form_materi', $data);
	}

	function Insert_materi()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_materi';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Materi 2
		if ($this->upload->do_upload('file_materi')) {
			$data_file_materi = $this->upload->data();
			$file_materi = $data_file_materi['file_name'];

			$req = [
				'method' => 'insert',
				'table' => 't_materi',
				'value' => [
					'nama_materi'		 => $this->input->post('nama_materi'),
					'file_materi'		 => $file_materi,
				]
			];
			
			$this->Modular->queryBuild($req);

		} else {
			$error = $this->upload->display_errors();
		}
	}

	function edit_materi($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_materi',
			'where' => [
				'kd_materi' => $id
			]
		];

		$row = $this->Modular->queryBuild($req)->row();
		$data['title'] = "Update Materi :: My Asisten";
		$data['judul'] = 'Update Materi ';
		$data['url'] = base_url('Materi/update_Materi');
		$data['id'] = $id;
		$data['nama_materi'] 	= $row->nama_materi;
		$data['file_materi'] 	= $row->file_materi;
		$this->template->load('home', 'form_materi', $data);
		
	}

	function update_Materi()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_materi';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Materi 2
		if ($this->upload->do_upload('file_materi')) {
			$data_file_materi = $this->upload->data();
			$file_materi = $data_file_materi['file_name'];

			$req = [
				'method' => 'update',
				'table' => 't_materi',
				'value' => [
					'nama_materi' 	 => $this->input->post('nama_materi'),
					'file_materi' 	 => $file_materi,
				],
				
				'where' => ['kd_materi' => $this->input->post('id')]
			];
			
			$this->Modular->queryBuild($req);
			
		} else {
			$error = $this->upload->display_errors();
			// Handle kesalahan upload foto gambar 2
		}
	}
}