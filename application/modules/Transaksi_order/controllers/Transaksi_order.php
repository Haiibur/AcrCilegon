<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_order extends CI_Controller
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
		$data['title'] = "Transaksi_order :: My Asisten";
		$data['judul'] = 'Transaksi_order';
		$data['linkpage'] = '';
		$this->template->load('home', 'Transaksi_order', $data);
	}

	function load_transaksi_order()
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_transaksi_order',
			'order' => 'kd_transaksi_order DESC'
		];

		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_transaksi_order . '=t_transaksi_order=kd_transaksi_order=Transaksi_order=0.jpg';
			$data = [
				'id' => $value->kd_transaksi_order,
				'ids' => $iddata,
				'nama_transaksi_order'		 => $value->nama_transaksi_order,
				'file_transaksi_order'		 => base_url().'./assets/upload_transaksi_order/'.$value->file_transaksi_order,
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_transaksi_order()
	{
		$data['title'] 			= "Transaksi_order :: My Asisten";
		$data['judul'] 			= 'Form Transaksi_order';
		$data['url'] 			= base_url('Transaksi_order/Insert_transaksi_order');
		$data['id'] 			= rand(0, 99) . date('mdh');
		$data['nama_transaksi_order']    = '';
		$data['file_transaksi_order'] 	= '';
		
		$this->template->load('home', 'form_transaksi_order', $data);
	}

	function Insert_transaksi_order()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_transaksi_order';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Transaksi_order 2
		if ($this->upload->do_upload('file_transaksi_order')) {
			$data_file_transaksi_order = $this->upload->data();
			$file_transaksi_order = $data_file_transaksi_order['file_name'];

			$req = [
				'method' => 'insert',
				'table' => 't_transaksi_order',
				'value' => [
					'nama_transaksi_order'		 => $this->input->post('nama_transaksi_order'),
					'file_transaksi_order'		 => $file_transaksi_order,
				]
			];
			
			$this->Modular->queryBuild($req);

		} else {
			$error = $this->upload->display_errors();
		}
	}

	function edit_transaksi_order($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_transaksi_order',
			'where' => [
				'kd_transaksi_order' => $id
			]
		];

		$row = $this->Modular->queryBuild($req)->row();
		$data['title'] = "Update Transaksi_order :: My Asisten";
		$data['judul'] = 'Update Transaksi_order ';
		$data['url'] = base_url('Transaksi_order/update_transaksi_order');
		$data['id'] = $id;
		$data['nama_transaksi_order'] 	= $row->nama_transaksi_order;
		$data['file_transaksi_order'] 	= $row->file_transaksi_order;
		$this->template->load('home', 'form_transaksi_order', $data);
		
	}

	function update_transaksi_order()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_transaksi_order';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Transaksi_order 2
		if ($this->upload->do_upload('file_transaksi_order')) {
			$data_file_transaksi_order = $this->upload->data();
			$file_transaksi_order = $data_file_transaksi_order['file_name'];

			$req = [
				'method' => 'update',
				'table' => 't_transaksi_order',
				'value' => [
					'nama_transaksi_order' 	 => $this->input->post('nama_transaksi_order'),
					'file_transaksi_order' 	 => $file_transaksi_order,
				],
				
				'where' => ['kd_transaksi_order' => $this->input->post('id')]
			];
			
			$this->Modular->queryBuild($req);
			
		} else {
			$error = $this->upload->display_errors();
			// Handle kesalahan upload foto gambar 2
		}
	}
}