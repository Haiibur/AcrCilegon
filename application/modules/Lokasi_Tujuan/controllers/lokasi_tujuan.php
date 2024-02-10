<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lokasi_tujuan extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->_isLogged();
	}

	function _isLogged() {
		if($this->session->userdata('status_sesi') != TRUE) {
			redirect('login', 'refresh');
		}
	}

	public function index() {
        $data['title'] = "Lokasi Tujuan :: My Asisten";
        $data['judul'] = 'Lokasi Tujuan';
        $data['linkpage'] ='';
		$this->template->load('home', 'lokasi_tujuan' ,$data);	
	}

	function load_lokasi_tujuan() {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_lokasi_tujuan',
			'order' => 'tgl_lokasi_tujuan DESC'
		];
		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		foreach ($res as $key => $value) {
			$iddata = $value->kd_lokasi_tujuan.'=t_lokasi_tujuan=kd_lokasi_tujuan=lokasi_tujuan=0.jpg';
			$detail = '
				<div style="overflow-x: auto; overflow-y: auto;">
					<b>Tgl: '.$value->tgl_lokasi_tujuan.'</b><br>
					<b>Jam: '.$value->jam_lokasi_tujuan.'</b><br>
					Alamat: '.$value->alamat.'
				</div>
			';
			$data = [
				'id' => $value->kd_lokasi_tujuan,
				'ids' => $iddata,
				'nama' => '<b>'.$value->nama_lokasi_tujuan.'</b>',
				'tamu' => '<b>'.$value->tamu_utama.'</b>',
				'detail' => $detail,
				'naskah' => base_url('naskah-lokasi_tujuan/'.$value->kd_lokasi_tujuan)
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_lokasi_tujuan() {
		$data=[
			'title'			=> "Form Lokasi Tujuan :: My Asisten",
			'judul'			=> "Form Lokasi Tujuan",
			'url'			=> base_url('lokasi_tujuan/Insert_Lokasi_Tujuan'),
			'nama_lokasi'	=> '',
			'ket_lokasi'	=> '',
			'gambar_lokasi' => '',
			'link_vidio'	=> ''
		];
		
		$this->template->load('home', 'form_lokasi_tujuan' ,$data);	
	}

	function Insert_Lokasi_Tujuan() {
		$req = [
			'method' => 'insert',
			'table' => 't_lokasi_tujuan',
			'value' => [
				'nama_lokasi' => $this->input->post('nama_lokasi'),
				'ket_lokasi' => $this->input->post('ket_lokasi'),
				'gambar_lokasi' => $this->input->post('gambar_lokasi'),
				'link_vidio' => $this->input->post('link_vidio'),
			]
		];
		$this->Modular->queryBuild($req);
	}

	function edit_agd($id) {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_lokasi_tujuan',
			'where' => [
				'kd_lokasi_tujuan' => $id
			]
		];
		$row = $this->Modular->queryBuild($req)->row();
        $data['title'] = "Update lokasi_tujuan Kegiatan :: My Asisten";
        $data['judul'] = 'Update lokasi_tujuan Kegiatan ';
        $data['linkpage'] ='<a href="https://chat.openai.com/chat" target="_blank" class="btn btn-success btn-sm">Buat Naskah di ChatGPT</a>';
		$data['url'] = base_url('lokasi_tujuan/update_agd');
		$data['id'] = $id;
		$data['nama'] = $row->nama_lokasi_tujuan;
		$data['tamu'] = $row->tamu_utama;
		$data['tgl'] = $row->tgl_lokasi_tujuan;
		$data['jam'] = $row->jam_lokasi_tujuan;
		$data['jam_akhir'] = $row->jam_akhir;
		$data['naskah'] = $row->naskah_pidato;
		$data['alamat'] = $row->alamat;
		$data['lokasi_acara'] = $row->lokasi_acara;
		$this->template->load('home', 'form_lokasi_tujuan' ,$data);	
	}

	function update_agd() {
		$req = [
			'method' => 'update',
			'table' => 't_lokasi_tujuan',
			'value' => [
				'nama_lokasi_tujuan' => $this->input->post('nama'),
				'tamu_utama' => $this->input->post('tamu'),
				'tgl_lokasi_tujuan' => $this->input->post('tgl'),
				'jam_lokasi_tujuan' => $this->input->post('jam'),
				'jam_akhir' => $this->input->post('jam_akhir'),
				'lokasi_acara' => $this->input->post('lokasi_acara'),
				'naskah_pidato' => $this->input->post('naskah'),
				'admin_ygbuat' => '',
				'alamat' => $this->input->post('alamat')
			],
			'where' => ['kd_lokasi_tujuan' => $this->input->post('id')]
		];
		$this->Modular->queryBuild($req);
	}
	function detail_nsk($id) {
        $data['title'] = "Naskah :: My Asisten";
        $data['judul'] = 'Naskah Kegiatan';
        $data['linkpage'] ='<a href="javascript:history.back()" class="btn btn-danger btn-sm">Kembali</a>';
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_lokasi_tujuan',
			'where' => [
				'kd_lokasi_tujuan' => $id
			] 
		];
		$data['row'] = $this->Modular->queryBuild($req)->row();
		$this->template->load('home', 'naskah' ,$data);	
	}
}