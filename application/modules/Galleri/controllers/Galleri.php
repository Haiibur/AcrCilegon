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
				'katagori'		 => '<b>' . $value->katagori . '</b>',
				'nama_galleri'	 => '<b>' . $value->nama_galleri . '</b>',
				'foto_galleri_2' => base_url().'./assets/upload_galleri/'.$value->foto_galleri_2,
				'foto_galleri_3' => base_url().'./assets/upload_galleri/'.$value->foto_galleri_3,
				'foto_galleri_4' => base_url().'./assets/upload_galleri/'.$value->foto_galleri_4,
				'foto_galleri_5' => base_url().'./assets/upload_galleri/'.$value->foto_galleri_5,
				'link_vidio'	 => $value->link_vidio

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

		$data['nama_galleri']   = '';
		$data['foto_galleri_2'] = '';
		$data['foto_galleri_3'] = '';
		$data['foto_galleri_4'] = '';
		$data['foto_galleri_5'] = '';
		$data['link_vidio']		= '';
		
		$this->template->load('home', 'form_galleri', $data);
	}

	function Insert_galleri()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_galleri';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload galleri 2
		if ($this->upload->do_upload('foto_galleri_2')) {
			$data_gambar_2 = $this->upload->data();
			$foto_galleri_2 = $data_gambar_2['file_name'];

			// Upload galleri 3
			if ($this->upload->do_upload('foto_galleri_3')) {
				$data_gambar_3 = $this->upload->data();
				$foto_galleri_3 = $data_gambar_3['file_name'];

				// Upload galleri 4
				if ($this->upload->do_upload('foto_galleri_4')) {
					$data_gambar_4 = $this->upload->data();
					$foto_galleri_4 = $data_gambar_4['file_name'];

					// Upload galleri 5
					if ($this->upload->do_upload('foto_galleri_5')) {
						$data_gambar_5 = $this->upload->data();
						$foto_galleri_5 = $data_gambar_5['file_name'];

							$req = [
								'method' => 'insert',
								'table' => 't_galleri',
								'value' => [
									'katagori' 	 	 => $this->input->post('katagori'),
									'nama_Galleri' 	 => $this->input->post('nama_galleri'),
									'foto_galleri_2' => $foto_galleri_2,
									'foto_galleri_3' => $foto_galleri_3,
									'foto_galleri_4' => $foto_galleri_4,
									'foto_galleri_5' => $foto_galleri_5,
									'link_vidio' 	 => $this->input->post('link_vidio')
								]
							];
							
							$this->Modular->queryBuild($req);
					} else {
						$error = $this->upload->display_errors();
						// Handle kesalahan upload foto gambar 5
					}
				} else {
					$error = $this->upload->display_errors();
					// Handle kesalahan upload foto gambar 4
				}
			} else {
				$error = $this->upload->display_errors();
				// Handle kesalahan upload foto gambar 3
			}
		} else {
			$error = $this->upload->display_errors();
			// Handle kesalahan upload foto gambar 2
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
		$data['katagori'] 		= $row->katagori;
		$data['nama_galleri'] 	= $row->nama_galleri;
		$data['foto_galleri_2'] = $row->foto_galleri_2;
		$data['foto_galleri_3'] = $row->foto_galleri_3;
		$data['foto_galleri_4'] = $row->foto_galleri_4;
		$data['foto_galleri_5'] = $row->foto_galleri_5;
		$data['link_vidio']		= $row->link_vidio;
		$this->template->load('home', 'form_galleri', $data);
		
	}

	function update_galleri()
	{
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/upload_galleri';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);

		// Upload galleri 2
		if ($this->upload->do_upload('foto_galleri_2')) {
			$data_gambar_2 = $this->upload->data();
			$foto_galleri_2 = $data_gambar_2['file_name'];

			// Upload galleri 3
			if ($this->upload->do_upload('foto_galleri_3')) {
				$data_gambar_3 = $this->upload->data();
				$foto_galleri_3 = $data_gambar_3['file_name'];

				// Upload galleri 4
				if ($this->upload->do_upload('foto_galleri_4')) {
					$data_gambar_4 = $this->upload->data();
					$foto_galleri_4 = $data_gambar_4['file_name'];

					// Upload galleri 5
					if ($this->upload->do_upload('foto_galleri_5')) {
						$data_gambar_5 = $this->upload->data();
						$foto_galleri_5 = $data_gambar_5['file_name'];

							$req = [
								'method' => 'update',
								'table' => 't_galleri',
								'value' => [
									'katagori' 	 	 => $this->input->post('katagori'),
									'nama_Galleri' 	 => $this->input->post('nama_galleri'),
									'foto_galleri_2' => $foto_galleri_2,
									'foto_galleri_3' => $foto_galleri_3,
									'foto_galleri_4' => $foto_galleri_4,
									'foto_galleri_5' => $foto_galleri_5,
									'link_vidio' 	 => $this->input->post('link_vidio')
								],
								'where' => ['kd_galleri' => $this->input->post('id')]
							];
							
							$this->Modular->queryBuild($req);
					} else {
						$error = $this->upload->display_errors();
						// Handle kesalahan upload foto gambar 5
					}
				} else {
					$error = $this->upload->display_errors();
					// Handle kesalahan upload foto gambar 4
				}
			} else {
				$error = $this->upload->display_errors();
				// Handle kesalahan upload foto gambar 3
			}
			
		} else {
			$error = $this->upload->display_errors();
			// Handle kesalahan upload foto gambar 2
		}
	}
}