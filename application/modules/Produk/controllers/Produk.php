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
		$res = $this->Modular->Produk()->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_produk . '=t_produk=kd_produk=Produk=0.jpg';
			$data = [
				'id' => $value->kd_produk,
				'ids' => $iddata,
				'gambar_1'		 	 => base_url().'./assets/upload_produk/'.$value->gambar_1,
				'katagori_produk'	 => $value->nama_kat,
				'nama_produk'		 => $value->nama_produk,
				'harga'		 		 => $value->harga,
				'satuan_produk'		 => $value->satuan_produk,
				'status_produk'		 => $value->status_produk,
				'ket_produk'		 => $value->ket_produk,
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_produk()
	{
		$data['title'] 				= "Produk :: My Asisten";
		$data['judul'] 				= 'Form Produk';
		$data['url'] 				= base_url('Produk/Insert_produk');
		$data['id'] 				= rand(0, 99) . date('mdh');
		$data['katagori_produk']    = $this->Modular->produk_kat()->result();
		$data['nama_produk'] 		= '';
		$data['harga'] 				= '';
		$data['satuan_produk'] 		= '';
		$data['gambar_1'] 			= '';
		$data['gambar_2'] 			= '';
		$data['gambar_3'] 			= '';
		$data['gambar_4'] 			= '';
		$data['gambar_5'] 			= '';
		$data['status_produk'] 		= '';
		$data['ket_produk'] 		= '';
		
		$this->template->load('home', 'form_produk', $data);
	}

	function Insert_produk()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_produk';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Produk 1
		if ($this->upload->do_upload('gambar_1')) {
			$data_file_produk1 = $this->upload->data();
			$file_produk1 = $data_file_produk1['file_name'];
			
			// Upload Produk 2
			if ($this->upload->do_upload('gambar_2')) {
				$data_file_produk2 = $this->upload->data();
				$file_produk2 = $data_file_produk2['file_name'];

				// Upload Produk 2
				if ($this->upload->do_upload('gambar_3')) {
					$data_file_produk3 = $this->upload->data();
					$file_produk3 = $data_file_produk3['file_name'];

					// Upload Produk 3
					if ($this->upload->do_upload('gambar_4')) {
						$data_file_produk4 = $this->upload->data();
						$file_produk4= $data_file_produk4['file_name'];

						// Upload Produk 4
						if ($this->upload->do_upload('gambar_5')) {
							$data_file_produk5 = $this->upload->data();
							$file_produk5 = $data_file_produk5['file_name'];

							date_default_timezone_set('Asia/Jakarta');

							$req = [
								'method' => 'insert',
								'table' => 't_produk',
								'value' => [
									'katagori_produk'	 => $this->input->post('katagori_produk'),
									'nama_produk'		 => $this->input->post('nama_produk'),
									'harga'		 		 => $this->input->post('harga'),
									'satuan_produk'		 => $this->input->post('satuan_produk'),
									'gambar_1'		 	 => $file_produk1,
									'gambar_2'		 	 => $file_produk2,
									'gambar_3'		 	 => $file_produk3,
									'gambar_4'		 	 => $file_produk4,
									'gambar_5'		 	 => $file_produk5,
									'status_produk'		 => $this->input->post('status_produk'),
									'tgl_buat'			 => date("Y-m-d H:i:s"),
									'ket_produk'		 => $this->input->post('ket_produk'),
								]
							];
							
							$this->Modular->queryBuild($req);
						} else {
							$error = $this->upload->display_errors();
						}		
					} else {
						$error = $this->upload->display_errors();
					}
				} else {
					$error = $this->upload->display_errors();
				}
			} else {
				$error = $this->upload->display_errors();
			}
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
		$data['katagori_produk']    = $this->Modular->produk_kat()->result();
		$data['nama_produk'] 		= $row->nama_produk;
		$data['harga'] 				= $row->harga;
		$data['satuan_produk'] 		= $row->satuan_produk;
		$data['gambar_1'] 			= $row->gambar_1;
		$data['gambar_2'] 			= $row->gambar_2;
		$data['gambar_3'] 			= $row->gambar_3;
		$data['gambar_4'] 			= $row->gambar_4;
		$data['gambar_5'] 			= $row->gambar_5;
		$data['status_produk'] 		= $row->status_produk;
		$data['ket_produk'] 		= $row->ket_produk;
		$this->template->load('home', 'form_produk', $data);
	}

	function update_produk()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_produk';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Produk 1
		if ($this->upload->do_upload('gambar_1')) {
			$data_file_produk1 = $this->upload->data();
			$file_produk1 = $data_file_produk1['file_name'];
			
			// Upload Produk 2
			if ($this->upload->do_upload('gambar_2')) {
				$data_file_produk2 = $this->upload->data();
				$file_produk2 = $data_file_produk2['file_name'];

				// Upload Produk 2
				if ($this->upload->do_upload('gambar_3')) {
					$data_file_produk3 = $this->upload->data();
					$file_produk3 = $data_file_produk3['file_name'];

					// Upload Produk 3
					if ($this->upload->do_upload('gambar_4')) {
						$data_file_produk4 = $this->upload->data();
						$file_produk4= $data_file_produk4['file_name'];

						// Upload Produk 4
						if ($this->upload->do_upload('gambar_5')) {
							$data_file_produk5 = $this->upload->data();
							$file_produk5 = $data_file_produk5['file_name'];

							date_default_timezone_set('Asia/Jakarta');

							$req = [
								'method' => 'update',
								'table' => 't_produk',
								'value' => [
									'katagori_produk'	 => $this->input->post('katagori_produk'),
									'nama_produk'		 => $this->input->post('nama_produk'),
									'harga'		 		 => $this->input->post('harga'),
									'satuan_produk'		 => $this->input->post('satuan_produk'),
									'gambar_1'		 	 => $file_produk1,
									'gambar_2'		 	 => $file_produk2,
									'gambar_3'		 	 => $file_produk3,
									'gambar_4'		 	 => $file_produk4,
									'gambar_5'		 	 => $file_produk5,
									'status_produk'		 => $this->input->post('status_produk'),
									'tgl_buat'			 => date("Y-m-d H:i:s"),
									'ket_produk'		 => $this->input->post('ket_produk'),
								]
							];
							
							$this->Modular->queryBuild($req);
						} else {
							$error = $this->upload->display_errors();
						}		
					} else {
						$error = $this->upload->display_errors();
					}
				} else {
					$error = $this->upload->display_errors();
				}
			} else {
				$error = $this->upload->display_errors();
			}
		} else {
			$error = $this->upload->display_errors();
		}
	}
}