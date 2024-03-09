<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galleri extends CI_Controller
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
		$data['title'] = "Galleri :: My Asisten";
		$data['judul'] = 'Galleri';
		$data['linkpage'] = '';
		$this->template->load('home', 'Galleri', $data);
	}

	function load_Galleri()
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_galleri',
			'order' => 'kd_galleri DESC'
		];

		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		foreach ($res as $key => $value) {
			$iddata = $value->kd_galleri . '=t_galleri=kd_galleri=Galleri=0.jpg';			
			$data = [
				'id' => $value->kd_galleri,
				'ids' => $iddata,

				'nama_galleri'	 => $value->nama_galleri,
				'foto_galleri_1' => base_url().'./assets/upload_galleri/'.$value->foto_galleri_1,
				'tgl_post'		 => date("d M Y H:i:s", strtotime($value->tgl_post)),
				'link_vidio'	 => $value->link_vidio,
				'ket_galleri'	 => $value->ket_galleri
			];

			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_galleri()
	{
		$data['title'] 			= "Galleri :: My Asisten";
		$data['judul'] 			= 'Form Galleri';
		$data['url'] 			= base_url('Galleri/Insert_galleri');
		$data['id'] 			= rand(0, 99) . date('mdh');

		$data['nama_galleri']    = '';
		$data['foto_galleri_1'] = '';
		$data['foto_galleri_2'] = '';
		$data['foto_galleri_3'] = '';
		$data['foto_galleri_4'] = '';
		$data['foto_galleri_5'] = '';
		$data['link_vidio']		= '';
		$data['ket_galleri']	= '';
		
		$this->template->load('home', 'form_galleri', $data);
	}

	function Insert_galleri()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_galleri';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		$upload_errors = array();
	
		// Loop untuk mengupload gambar 1-5
		for ($i = 1; $i <= 5; $i++) {
			$field_name = 'foto_galleri_' . $i;
	
			// Lakukan upload
			if ($this->upload->do_upload($field_name)) {
				$data_gambar = $this->upload->data();
				${'foto_galleri_' . $i} = $data_gambar['file_name'];
			} else {
				// Jika terjadi error, simpan pesan error
				$upload_errors[] = $this->upload->display_errors();
			}
		}

		date_default_timezone_set('Asia/Jakarta');
		// Jika tidak ada error, lakukan insert data
		if (empty($upload_errors)) {
			$req = [
				'method' => 'insert',
				'table' => 't_galleri',
				'value' => [
					'nama_galleri' 	 => $this->input->post('nama_galleri'),
					'foto_galleri_1' => $foto_galleri_1,
					'foto_galleri_2' => $foto_galleri_2,
					'foto_galleri_3' => $foto_galleri_3,
					'foto_galleri_4' => $foto_galleri_4,
					'foto_galleri_5' => $foto_galleri_5,
					'link_vidio' 	 => $this->input->post('link_vidio'),
					'tgl_post' 	 	 => date("Y-m-d H:i:s"),
					'ket_galleri' 	 => $this->input->post('ket_galleri')
				]
			];
			
			$this->Modular->queryBuild($req);
		} else {
			// Jika terdapat error pada upload, tangani error sesuai kebutuhan aplikasi
			foreach ($upload_errors as $error) {
				// Handle error (misalnya, log error, tampilkan pesan kepada pengguna, dll.)
			}
		}
	}

	function edit_galleri($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_galleri',
			'where' => [
				'kd_galleri' => $id
			]
		];

		$row = $this->Modular->queryBuild($req)->row();
		$data['title'] = "Update Galleri :: My Asisten";
		$data['judul'] = 'Update Galleri ';
		$data['url'] = base_url('Galleri/update_galleri');
		$data['id'] = $id;

		$data['nama_galleri'] 	= $row->nama_galleri;
		$data['foto_galleri_1'] = $row->foto_galleri_1;
		$data['foto_galleri_2'] = $row->foto_galleri_2;
		$data['foto_galleri_3'] = $row->foto_galleri_3;
		$data['foto_galleri_4'] = $row->foto_galleri_4;
		$data['foto_galleri_5'] = $row->foto_galleri_5;
		$data['link_vidio']		= $row->link_vidio;
		$data['ket_galleri'] 	= $row->ket_galleri;
		
		$this->template->load('home', 'form_galleri', $data);
		
	}

	function update_galleri()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_galleri';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		$upload_errors = array();
	
		// Loop untuk mengupload gambar 1-5
		for ($i = 1; $i <= 5; $i++) {
			$field_name = 'foto_galleri_' . $i;
	
			// Lakukan upload
			if ($this->upload->do_upload($field_name)) {
				$data_gambar = $this->upload->data();
				${'foto_galleri_' . $i} = $data_gambar['file_name'];
			} else {
				// Jika terjadi error, simpan pesan error
				$upload_errors[] = $this->upload->display_errors();
			}
		}

		date_default_timezone_set('Asia/Jakarta');
	
		// Jika tidak ada error, lakukan insert data
		if (empty($upload_errors)) {
			$req = [
				'method' => 'update',
				'table' => 't_galleri',
				'value' => [
					'nama_galleri' 	 => $this->input->post('nama_galleri'),
					'foto_galleri_1' => $foto_galleri_1,
					'foto_galleri_2' => $foto_galleri_2,
					'foto_galleri_3' => $foto_galleri_3,
					'foto_galleri_4' => $foto_galleri_4,
					'foto_galleri_5' => $foto_galleri_5,
					'link_vidio' 	 => $this->input->post('link_vidio'),
					'tgl_post' 	 	 => date("Y-m-d H:i:s"),
					'ket_galleri' 	 => $this->input->post('ket_galleri')
				],
				'where' => ['kd_galleri' => $this->input->post('id')]
			];
			
			$this->Modular->queryBuild($req);
		} else {
			// Jika terdapat error pada upload, tangani error sesuai kebutuhan aplikasi
			foreach ($upload_errors as $error) {
				// Handle error (misalnya, log error, tampilkan pesan kepada pengguna, dll.)
			}
		}
	}
}