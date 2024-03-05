<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
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
		$data['title'] = "Wisata :: My Asisten";
		$data['judul'] = 'Wisata';
		$data['linkpage'] = '';
		$this->template->load('home', 'Wisata', $data);
	}

	function load_wisata()
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_wisata',
			'order' => 'kd_wisata DESC'
		];

		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		foreach ($res as $key => $value) {
			$iddata = $value->kd_wisata . '=t_wisata=kd_wisata=Wisata=0.jpg';			
			$data = [
				'id' 					 => $value->kd_wisata,
				'ids' 					 => $iddata,
				'nama_wisata'			 => $value->nama_wisata,
				'foto_1'				 => base_url().'./assets/upload_wisata/'.$value->foto_1,
				'foto_2' 				 => base_url().'./assets/upload_wisata/'.$value->foto_2,
				'foto_3' 				 => base_url().'./assets/upload_wisata/'.$value->foto_3,
				'foto_4' 				 => base_url().'./assets/upload_wisata/'.$value->foto_4,
				'foto_5' 				 => base_url().'./assets/upload_wisata/'.$value->foto_5,
				'ket_wisata'	 		 => $value->ket_wisata,
				'no_tlp'	 			 => $value->no_tlp,
			];

			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_wisata()
	{
		$data['title'] 			= "Wisata :: My Asisten";
		$data['judul'] 			= 'Form Wisata';
		$data['url'] 			= base_url('Wisata/Insert_Wisata');
		$data['id'] 			= rand(0, 99) . date('mdh');

		$data['nama_wisata']   		= '';
		$data['foto_1'] 			= '';
		$data['foto_2'] 			= '';
		$data['foto_3'] 			= '';
		$data['foto_4'] 			= '';
		$data['foto_5'] 			= '';
		$data['ket_wisata']			= '';
		$data['no_tlp']				= '';
		
		$this->template->load('home', 'form_wisata', $data);
	}

	function Insert_Wisata()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_wisata';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 6048;
		$this->load->library('upload', $config);

		// Upload Wisata 1
		if ($this->upload->do_upload('foto_1')) {
			$data_gambar_1 = $this->upload->data();
			$foto_1 = $data_gambar_1['file_name'];

			// Upload Wisata 2
			if ($this->upload->do_upload('foto_2')) {
				$data_gambar_2 = $this->upload->data();
				$foto_2 = $data_gambar_2['file_name'];

				// Upload Wisata 3
				if ($this->upload->do_upload('foto_3')) {
					$data_gambar_3 = $this->upload->data();
					$foto_3 = $data_gambar_3['file_name'];

					// Upload Wisata 4
					if ($this->upload->do_upload('foto_4')) {
						$data_gambar_4 = $this->upload->data();
						$foto_4 = $data_gambar_4['file_name'];

						// Upload Wisata 5
						if ($this->upload->do_upload('foto_5')) {
							$data_gambar_5 = $this->upload->data();
							$foto_5 = $data_gambar_5['file_name'];

							$req = [
								'method' => 'insert',
								'table' => 't_wisata',
								'value' => [
									'nama_wisata' 	 => $this->input->post('nama_wisata'),
									'foto_1' 		 => $foto_1,
									'foto_2' 		 => $foto_2,
									'foto_3' 		 => $foto_3,
									'foto_4' 		 => $foto_4,
									'foto_5' 		 => $foto_5,
									'ket_wisata' 	 => $this->input->post('ket_wisata'),
									'no_tlp' 		 => $this->input->post('no_tlp')
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

	function edit_wisata($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_wisata',
			'where' => [
				'kd_wisata' => $id
			]
		];

		$row = $this->Modular->queryBuild($req)->row();
		$data['title'] 			= "Update Wisata :: My Asisten";
		$data['judul'] 			= 'Update Wisata ';
		$data['url'] 			= base_url('Wisata/update_wisata');
		$data['id'] 			= $id;
		$data['nama_wisata'] 	= $row->nama_wisata;
		$data['foto_1']			= $row->foto_1;
		$data['foto_2'] 	 	= $row->foto_2;
		$data['foto_3'] 	 	= $row->foto_3;
		$data['foto_4'] 		= $row->foto_4;
		$data['foto_5'] 		= $row->foto_5;
		$data['ket_wisata']		= $row->ket_wisata;
		$data['no_tlp']			= $row->no_tlp;

		$this->template->load('home', 'form_wisata', $data);
		
	}

	function update_wisata()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_wisata';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Wisata 1
		if ($this->upload->do_upload('foto_1')) {
			$data_gambar_1 = $this->upload->data();
			$foto_1 = $data_gambar_1['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Wisata 2
		if ($this->upload->do_upload('foto_2')) {
			$data_gambar_2 = $this->upload->data();
			$foto_2 = $data_gambar_2['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Wisata 3
		if ($this->upload->do_upload('foto_3')) {
			$data_gambar_3 = $this->upload->data();
			$foto_3 = $data_gambar_3['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Wisata 4
		if ($this->upload->do_upload('foto_4')) {
			$data_gambar_4 = $this->upload->data();
			$foto_4 = $data_gambar_4['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Wisata 5
		if ($this->upload->do_upload('foto_5')) {
			$data_gambar_5 = $this->upload->data();
			$foto_5 = $data_gambar_5['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		$req = [
			'method' => 'update',
			'table' => 't_wisata',
			'value' => [
				'nama_wisata' 	 => $this->input->post('nama_wisata'),
				'foto_1' 		 => $foto_1,
				'foto_2' 		 => $foto_2,
				'foto_3' 		 => $foto_3,
				'foto_4' 		 => $foto_4,
				'foto_5' 		 => $foto_5,
				'ket_wisata' 	 => $this->input->post('ket_wisata'),
				'no_tlp' 		 => $this->input->post('no_tlp')
			],
			'where' => ['kd_wisata' => $this->input->post('id')]
		];
		
		$this->Modular->queryBuild($req);
	}
}