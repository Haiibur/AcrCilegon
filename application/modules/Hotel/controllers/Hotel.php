<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends CI_Controller
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
		$data['title'] = "Hotel :: My Asisten";
		$data['judul'] = 'Hotel';
		$data['linkpage'] = '';
		$this->template->load('home', 'Hotel', $data);
	}

	function load_hotel()
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_hotel',
			'order' => 'kd_hotel DESC'
		];

		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		foreach ($res as $key => $value) {
			$iddata = $value->kd_hotel . '=t_hotel=kd_hotel=Hotel=0.jpg';			
			$data = [
				'id' => $value->kd_hotel,
				'ids' => $iddata,
				'nama_hotel'			 => '<b>' . $value->nama_hotel . '</b>',
				'foto_1'				 => base_url().'./assets/upload_Hotel/'.$value->foto_1,
				'foto_2' 				 => base_url().'./assets/upload_Hotel/'.$value->foto_2,
				'foto_3' 				 => base_url().'./assets/upload_Hotel/'.$value->foto_3,
				'foto_4' 				 => base_url().'./assets/upload_Hotel/'.$value->foto_4,
				'foto_5' 				 => base_url().'./assets/upload_Hotel/'.$value->foto_5,
				'titik_lokasi'	 		 => $value->titik_lokasi,
				'ket_hotel'	 			 => $value->ket_hotel,
				'harga'	 		 		 => $value->harga,
				'no_tlp'	 			 => $value->no_tlp
			];

			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_hotel()
	{
		$data['title'] 			= "Hotel :: My Asisten";
		$data['judul'] 			= 'Form Hotel';
		$data['url'] 			= base_url('Hotel/Insert_Hotel');
		$data['id'] 			= rand(0, 99) . date('mdh');

		$data['nama_hotel']   		= '';
		$data['foto_1'] 			= '';
		$data['foto_2'] 			= '';
		$data['foto_3'] 			= '';
		$data['foto_4'] 			= '';
		$data['foto_5'] 			= '';
		$data['titik_lokasi']		= '';
		$data['ket_hotel']			= '';
		$data['harga']				= '';
		$data['no_tlp']				= '';
		
		$this->template->load('home', 'form_hotel', $data);
	}

	function Insert_Hotel()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_hotel';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Hotel 1
		if ($this->upload->do_upload('foto_1')) {
			$data_gambar_1 = $this->upload->data();
			$foto_1 = $data_gambar_1['file_name'];

			// Upload Hotel 2
			if ($this->upload->do_upload('foto_2')) {
				$data_gambar_2 = $this->upload->data();
				$foto_2 = $data_gambar_2['file_name'];

				// Upload Hotel 3
				if ($this->upload->do_upload('foto_3')) {
					$data_gambar_3 = $this->upload->data();
					$foto_3 = $data_gambar_3['file_name'];

					// Upload Hotel 4
					if ($this->upload->do_upload('foto_4')) {
						$data_gambar_4 = $this->upload->data();
						$foto_4 = $data_gambar_4['file_name'];

						// Upload Hotel 5
						if ($this->upload->do_upload('foto_5')) {
							$data_gambar_5 = $this->upload->data();
							$foto_5 = $data_gambar_5['file_name'];

							$req = [
								'method' => 'insert',
								'table' => 't_hotel',
								'value' => [
									'nama_hotel' 	 => $this->input->post('nama_hotel'),
									'foto_1' 		 => $foto_1,
									'foto_2' 		 => $foto_2,
									'foto_3' 		 => $foto_3,
									'foto_4' 		 => $foto_4,
									'foto_5' 		 => $foto_5,
									'titik_lokasi' 	 => $this->input->post('titik_lokasi'),
									'ket_hotel' 	 => $this->input->post('ket_hotel'),
									'harga' 	 	 => $this->input->post('harga'),
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

	function edit_hotel($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_hotel',
			'where' => [
				'kd_Hotel' => $id
			]
		];

		$row = $this->Modular->queryBuild($req)->row();
		$data['title'] 			= "Update Hotel :: My Asisten";
		$data['judul'] 			= 'Update Hotel ';
		$data['url'] 			= base_url('Hotel/update_hotel');
		$data['id'] 			= $id;
		$data['nama_hotel'] 	= $row->nama_hotel;
		$data['foto_1']			= $row->foto_1;
		$data['foto_2'] 	 	= $row->foto_2;
		$data['foto_3'] 	 	= $row->foto_3;
		$data['foto_4'] 		= $row->foto_4;
		$data['foto_5'] 		= $row->foto_5;
		$data['titik_lokasi']	= $row->titik_lokasi;
		$data['ket_hotel']		= $row->ket_hotel;
		$data['harga']			= $row->harga;
		$data['no_tlp']		= $row->no_tlp;
		$this->template->load('home', 'form_Hotel', $data);
		
	}

	function update_hotel()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_hotel';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload Hotel 1
		if ($this->upload->do_upload('foto_1')) {
			$data_gambar_1 = $this->upload->data();
			$foto_1 = $data_gambar_1['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Hotel 2
		if ($this->upload->do_upload('foto_2')) {
			$data_gambar_2 = $this->upload->data();
			$foto_2 = $data_gambar_2['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Hotel 3
		if ($this->upload->do_upload('foto_3')) {
			$data_gambar_3 = $this->upload->data();
			$foto_3 = $data_gambar_3['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Hotel 4
		if ($this->upload->do_upload('foto_4')) {
			$data_gambar_4 = $this->upload->data();
			$foto_4 = $data_gambar_4['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		// Upload Hotel 5
		if ($this->upload->do_upload('foto_5')) {
			$data_gambar_5 = $this->upload->data();
			$foto_5 = $data_gambar_5['file_name'];
		} else {
			$error = $this->upload->display_errors();
		}

		$req = [
			'method' => 'update',
			'table' => 't_hotel',
			'value' => [
				'nama_hotel' 	 => $this->input->post('nama_hotel'),
				'foto_1' 		 => $foto_1,
				'foto_2' 		 => $foto_2,
				'foto_3' 		 => $foto_3,
				'foto_4' 		 => $foto_4,
				'foto_5' 		 => $foto_5,
				'titik_lokasi' 	 => $this->input->post('titik_lokasi'),
				'ket_hotel' 	 => $this->input->post('ket_hotel'),
				'harga' 	 	 => $this->input->post('harga'),
				'no_tlp' 		 => $this->input->post('no_tlp')
			],
			'where' => ['kd_hotel' => $this->input->post('id')]
		];
		
		$this->Modular->queryBuild($req);
	}
}