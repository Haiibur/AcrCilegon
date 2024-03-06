<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
		$data['title'] = "Produk :: My Asisten";
		$data['judul'] = 'Produk';
		$data['linkpage'] = '';
		$this->template->load('home', 'Produk', $data);
	}

	function load_produk()
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_produk',
			'order' => 'kd_produk DESC'
		];

		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_produk . '=t_produk=kd_produk=Produk=0.jpg';
			$data = [
				'id' => $value->kd_produk,
				'ids' => $iddata,
				'nama_produk'		 => $value->nama_produk,
				'file_produk'		 => base_url().'./assets/upload_produk/'.$value->file_produk,
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_produk()
	{
		$data['title'] 			= "Produk :: My Asisten";
		$data['judul'] 			= 'Form Produk';
		$data['url'] 			= base_url('Produk/Insert_produk');
		$data['id'] 			= rand(0, 99) . date('mdh');
		$data['nama_produk']    = '';
		$data['file_produk'] 	= '';
		
		$this->template->load('home', 'form_produk', $data);
	}

	function Insert_produk()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_produk';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Produk 2
		if ($this->upload->do_upload('file_produk')) {
			$data_file_produk = $this->upload->data();
			$file_produk = $data_file_produk['file_name'];

			$req = [
				'method' => 'insert',
				'table' => 't_produk',
				'value' => [
					'nama_produk'		 => $this->input->post('nama_produk'),
					'file_produk'		 => $file_produk,
				]
			];
			
			$this->Modular->queryBuild($req);

		} else {
			$error = $this->upload->display_errors();
		}
	}

	function edit_produk($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_produk',
			'where' => [
				'kd_produk' => $id
			]
		];

		$row = $this->Modular->queryBuild($req)->row();
		$data['title'] = "Update Produk :: My Asisten";
		$data['judul'] = 'Update Produk ';
		$data['url'] = base_url('Produk/update_produk');
		$data['id'] = $id;
		$data['nama_produk'] 	= $row->nama_produk;
		$data['file_produk'] 	= $row->file_produk;
		$this->template->load('home', 'form_produk', $data);
		
	}

	function update_produk()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_produk';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Produk 2
		if ($this->upload->do_upload('file_produk')) {
			$data_file_produk = $this->upload->data();
			$file_produk = $data_file_produk['file_name'];

			$req = [
				'method' => 'update',
				'table' => 't_produk',
				'value' => [
					'nama_produk' 	 => $this->input->post('nama_produk'),
					'file_produk' 	 => $file_produk,
				],
				
				'where' => ['kd_produk' => $this->input->post('id')]
			];
			
			$this->Modular->queryBuild($req);
			
		} else {
			$error = $this->upload->display_errors();
			// Handle kesalahan upload foto gambar 2
		}
	}
}