<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->_isLogged();
	}

	function _isLogged() {
		if($this->session->userdata('status_sesi') != TRUE) {
			redirect('login', 'refresh');
		}
	}

	// public function index() {
    //     $data['title'] = "Profil Sistem :: My Asisten";
    //     $data['judul'] = 'Profil Sistem';
    //     $data['linkpage'] ='';
	// 	$this->template->load('home', 'profil' ,$data);	
	// }

	// function load_profil()
	// {
    //     $req = [
    //         'method' => 'get',
    //         'select' => '*',
    //         'table' => 't_profil',
	// 		'order' => 'kd_profil DESC'
    //     ];
    //     $res = $this->Modular->queryBuild($req)->result();

	// 	$output = array();
	// 	foreach ($res as $key => $value) {
	// 		$iddata = $value->kd_profil . '=t_profil=kd_profil=Profil=0.jpg';
			
	// 		$data = [
	// 			'nama_profil_sistem'	=> $value->nama_profil_sistem,
	// 			'logo'				 	=> base_url() . './assets/profil_sistem/' . $value->logo,
	// 			'versi' 				=> $value->versi,
	// 			'ket_Profil' 		 	=> $value->ket_profil,
	// 			'ket_tentang_css' 	 	=> $value->ket_tentang_css,
	// 			'foto_walikota'		 	=> base_url() . './assets/profil_sistem/' . $value->foto_walikota,
	// 			'no_tlp' 			 	=> $value->no_tlp,
	// 			'email' 				=> $value->email,
	// 			'tgl_pelaksanaan' 		=> $value->tgl_pelaksanaan,
	// 			'alamat' 			 	=> $value->alamat,
	// 			'kode_undangan'		  	=> $value->kode_undangan,
	// 			'kordinat_lokasi_utama'	=> $value->kordinat_lokasi_utama,
	// 		];

	// 		array_push($output, $data);
	// 	}
	// 	$this->output->set_content_type('application/json')->set_output(json_encode($output));
	// }

	// function form_tambah_profil()
	// {
	// 	$data['title'] 			= "Profil Sistem :: My Asisten";
	// 	$data['judul'] 			= 'Form Profil Sistem';
	// 	$data['url'] 			= base_url('Profil/Insert_Profil');
	// 	$data['id'] 			= rand(0, 99) . date('mdh');

    //     $data['nama_profil']		 	= '';
	// 	$data['logo']				 	= '';
	// 	$data['versi'] 				 	= '';
    //     $data['ket_profil'] 		 	= '';
    //     $data['ket_tentang_css'] 	 	= '';
	// 	$data['foto_walikota']		 	= '';
    //     $data['no_tlp'] 			 	= '';
	// 	$data['email'] 					= '';
	// 	$data['tgl_pelaksanaan'] 		= '';
    //     $data['alamat'] 			 	= '';
    //     $data['kode_undangan']		  	= '';
	// 	$data['kordinat_lokasi_utama']	= '';
		
	// 	$this->template->load('home', 'form_profil', $data);
	// }

	// function Insert_Profil()
	// {
	// 	// Konfigurasi untuk upload gambar lokasi
	// 	$config['upload_path']   = './assets/upload_profil';
	// 	$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
	// 	$config['max_size']      = 200000;
	// 	$this->load->library('upload', $config);
	
	// 	$upload_errors = array();
	// 	$gambar_files = array(); // Simpan nama file gambar
	
	// 	// Loop untuk mengupload gambar 1-5
	// 	for ($i = 1; $i <= 2; $i++) {
	// 		$field_name = 'foto_' . $i;
	
	// 		// Lakukan upload
	// 		if ($this->upload->do_upload($field_name)) {
	// 			$data_gambar = $this->upload->data();
	// 			$gambar_files[$field_name] = $data_gambar['file_name'];
	// 		} else {
	// 			// Jika terjadi error, simpan pesan error
	// 			$error = $this->upload->display_errors();
	// 			if ($error != "You did not select a file to upload.") {
	// 				$upload_errors[] = $error;
	// 			}
	// 		}
	// 	}
	
	// 	// Mengatur nilai default untuk variabel gambar
	// 	$foto_1 = isset($gambar_files['foto_1']) ? $gambar_files['foto_1'] : 'NULL';
	// 	$foto_2 = isset($gambar_files['foto_2']) ? $gambar_files['foto_2'] : 'NULL';
	
	// 	// Insert data tanpa memeriksa keberadaan file gambar
	// 	$req = [
	// 		'method' => 'insert',
	// 		'table'  => 't_profil',
	// 		'value'  => [
	// 			'nama_profil_sistem' 	=> $this->input->post('nama_profil'),
	// 			'logo' 					=> $foto_1,
	// 			'versi' 				=> $this->input->post('versi'),
	// 			'ket_Profil' 			=> $this->input->post('ket_Profil'),
	// 			'ket_tentang_css' 		=> $this->input->post('ket_tentang_css'),
	// 			'foto_walikota' 		=> $foto_2,
	// 			'no_tlp' 				=> $this->input->post('no_tlp'),
	// 			'email' 				=> $this->input->post('email'),
	// 			'tgl_pelaksanaan' 		=> $this->input->post('tgl_pelaksanaan'),
	// 			'alamat' 				=> $this->input->post('alamat'),
	// 			'kode_undangan'			=> $this->input->post('kode_undangan'),
	// 			'kordinat_lokasi_utama' => $this->input->post('kordinat_lokasi_utama')
	// 		]
	// 	];
	
	// 	$this->Modular->queryBuild($req);
	
	// 	// Tangani error jika ada
	// 	if (!empty($upload_errors)) {
	// 		// Handle error pada upload (misalnya, log error, tampilkan pesan kepada pengguna, dll.)
	// 		foreach ($upload_errors as $error) {
	// 			// Handle error (misalnya, log error, tampilkan pesan kepada pengguna, dll.)
	// 		}
	// 	}
	// }
	
	// function edit_profil($id)
	// {
	// 	$req = [
	// 		'method' => 'get',
	// 		'select' => '*',
	// 		'table' => 't_Profil',
	// 		'where' => [
	// 			'kd_Profil' => $id
	// 		]
	// 	];

	// 	$res = $this->Modular->queryBuild($req)->row();
	// 	$data['title'] 			= "Update profil :: My Asisten";
	// 	$data['judul'] 			= 'Update profil ';
	// 	$data['url'] 			= base_url('Profil/update_Profil');
	// 	$data['id'] 			= $id;
		
    //     $data['nama_profil_sistem']	 	= $res->nama_profil_sistem;
	// 	$data['logo']				 	= $res->logo;
	// 	$data['versi'] 				 	= $res->versi;
    //     $data['ket_Profil'] 		 	= $res->ket_profil;
    //     $data['ket_tentang_css'] 	 	= $res->ket_tentang_css;
	// 	$data['foto_walikota']		 	= $res->foto_walikota;
    //     $data['no_tlp'] 			 	= $res->no_tlp;
	// 	$data['email'] 					= $res->email;
	// 	$data['tgl_pelaksanaan'] 		= $res->tgl_pelaksanaan;
    //     $data['alamat'] 			 	= $res->alamat;
    //     $data['kode_undangan']		  	= $res->kode_undangan;
	// 	$data['kordinat_lokasi_utama']	= $res->kordinat_lokasi_utama;

	// 	$this->template->load('home', 'form_Profil', $data);
	// }

	// function update_profil()
	// {
	// 	// Konfigurasi untuk upload gambar lokasi
	// 	$config['upload_path']   = './assets/upload_Profil';
	// 	$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
	// 	$config['max_size']      = 6048;
	// 	$this->load->library('upload', $config);
	
	// 	$gambar_files = array(); // Simpan nama file gambar
	
	// 	// Loop untuk mengupload gambar 1-5
	// 	for ($i = 1; $i <= 5; $i++) {
	// 		$field_name = 'foto_' . $i;
	
	// 		// Lakukan upload
	// 		if ($this->upload->do_upload($field_name)) {
	// 			$data_gambar = $this->upload->data();
	// 			$gambar_files[$field_name] = $data_gambar['file_name'];
	// 		} else {
	// 			// Jika terjadi error, simpan pesan error
	// 			$error = $this->upload->display_errors();
	// 			if ($error != "You did not select a file to upload.") {
	// 				$upload_errors[] = $error;
	// 			}
	// 		}
	// 	}
	
	// 	// Mengatur nilai default untuk variabel gambar
	// 	$foto_1 = isset($gambar_files['foto_1']) ? $gambar_files['foto_1'] : 'NULL';
	// 	$foto_2 = isset($gambar_files['foto_2']) ? $gambar_files['foto_2'] : 'NULL';
	// 	$foto_3 = isset($gambar_files['foto_3']) ? $gambar_files['foto_3'] : 'NULL';
	// 	$foto_4 = isset($gambar_files['foto_4']) ? $gambar_files['foto_4'] : 'NULL';
	// 	$foto_5 = isset($gambar_files['foto_5']) ? $gambar_files['foto_5'] : 'NULL';
	
	// 	// Insert data tanpa memeriksa keberadaan file gambar
	// 	$req = [
	// 		'method' => 'update',
	// 		'table'  => 't_Profil',
	// 		'value'  => [
	// 			'nama_Profil'    => $this->input->post('nama_Profil'),
	// 			'foto_1'        => $foto_1,
	// 			'foto_2'        => $foto_2,
	// 			'foto_3'        => $foto_3,
	// 			'foto_4'        => $foto_4,
	// 			'foto_5'        => $foto_5,
	// 			'lat'           => $this->input->post('lat'),
	// 			'longg'         => $this->input->post('longg'),
	// 			'ket_Profil'    => $this->input->post('ket_Profil'),
	// 			'harga'         => $this->input->post('harga'),
	// 			'no_tlp'        => $this->input->post('no_tlp'),
	// 			'link_website'  => $this->input->post('link_website')
	// 		],
	// 		'where' => ['kd_Profil' => $this->input->post('id')]
	// 	];
	
	// 	$this->Modular->queryBuild($req);
	// }







		public function index() {
        $data['title'] = "Profil Sistem :: My Asisten";
        $data['judul'] = 'Profil Sistem';
        $data['linkpage'] ='';

        $req = [
            'method' => 'get',
            'select' => '*',
            'table' => 't_profil',
			'where' =>'kd_profil=1'
        ];
        $res = $this->Modular->queryBuild($req)->row();

        $data['id']	 					= 1;
        $data['nama_profil']	 		= $res->nama_profil_sistem;
		$data['logo']				 	= $res->logo;
		$data['versi'] 				 	= $res->versi;
        $data['ket_profil'] 		 	= $res->ket_profil;
        $data['ket_tentang_css'] 	 	= $res->ket_tentang_css;
		$data['tgl_pelaksanaan'] 	 	= $res->tgl_pelaksanaan;
		$data['foto_walikota']		 	= $res->foto_walikota;
        $data['no_tlp'] 			 	= $res->no_tlp;
		$data['email'] 					= $res->email;
        $data['alamat'] 			 	= $res->alamat;
        $data['kode_undangan']		  	= $res->kode_undangan;
		$data['kordinat_lokasi_utama']	= $res->kordinat_lokasi_utama;
		
		$this->template->load('home', 'profil_index' ,$data);	
	}

	function update_prf() {
		// Konfigurasi untuk upload gambar lokasi
		$config['upload_path']   = './assets/profil_sistem';
		$config['allowed_types'] = 'mp4|mp3|jpg|jpeg|png|gif';
		$config['max_size']      = 200000;
		$this->load->library('upload', $config);
	
		$gambar_files = array(); // Simpan nama file gambar
	
		// Loop untuk mengupload gambar 1-2
		for ($i = 1; $i <= 2; $i++) {
			$field_name = 'foto_' . $i;
	
			// Lakukan upload jika ada file yang diunggah
			if (!empty($_FILES[$field_name]['name']) && $this->upload->do_upload($field_name)) {
				$data_gambar = $this->upload->data();
				$gambar_files[$field_name] = $data_gambar['file_name'];
			} elseif (!empty($this->input->post($field_name . '_existing'))) {
				// Jika tidak ada file yang diunggah, tetapi ada file yang ada sebelumnya, gunakan file yang ada sebelumnya
				$gambar_files[$field_name] = $this->input->post($field_name . '_existing');
			}
		}
	
		// Mengatur nilai default untuk variabel gambar
		$foto_1 = isset($gambar_files['foto_1']) ? $gambar_files['foto_1'] : '';
		$foto_2 = isset($gambar_files['foto_2']) ? $gambar_files['foto_2'] : '';
	
		// Insert data tanpa memeriksa keberadaan file gambar
		$req = [
			'method' => 'update',
			'table'  => 't_profil',
			'value'  => [
				'nama_profil_sistem'    => $this->input->post('nama_profil'),
				'logo'                  => $foto_1,
				'ket_profil'            => $this->input->post('ket_profil'),
				'ket_tentang_css'       => $this->input->post('ket_tentang_css'),
				'foto_walikota'         => $foto_2,
				'no_tlp'                => $this->input->post('no_tlp'),
				'email'                 => $this->input->post('email'),
				'tgl_pelaksanaan'       => $this->input->post('tgl_pelaksanaan'),
				'alamat'                => $this->input->post('alamat'),
				'kode_undangan'         => $this->input->post('kode_undangan'),
				'kordinat_lokasi_utama' => $this->input->post('kordinat_lokasi_utama')
			],
			'where' => ['kd_profil' => 1]
		];
	
		$this->Modular->queryBuild($req);
	}
	
}