<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
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
        $data['title'] = "Agenda Kegiatan :: My Asisten";
        $data['judul'] = 'Agenda Kegiatan';
        $data['linkpage'] ='';
		$this->template->load('home', 'agenda' ,$data);	
	}

	function load_agenda() {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_agenda',
			'order' => 'tgl_agenda DESC'
		];
		$res = $this->Modular->queryBuild($req)->result();
		$output = array();
		foreach ($res as $key => $value) {
			$iddata = $value->kd_agenda.'=t_agenda=kd_agenda=agenda=0.jpg';
			$detail = '
				<div style="overflow-x: auto; overflow-y: auto;">
					<b>Tgl: '.$value->tgl_agenda.'</b><br>
					<b>Jam: '.$value->jam_agenda.'</b><br>
					Alamat: '.$value->alamat.'
				</div>
			';
			$data = [
				'id' 				=> $value->kd_agenda,
				'ids' 				=> $iddata,
				'nama' 				=> $value->nama_agenda,
				'kd_venue' 			=> $value->tamu_utama,
				'detail' 			=> $detail,
				'jumlah_peserta' 	=> $value->jumlah_peserta
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function buat_agd() {
        $data['title'] = "Buat Agenda :: My Asisten";
        $data['judul'] = 'Form Agenda Kegiatan';
        $data['linkpage'] ='<a href="https://chat.openai.com/chat" target="_blank" class="btn btn-success btn-sm">Buat Naskah di ChatGPT</a>';
		$data['url'] = base_url('agenda/simpan_agd');
		$data['id'] = rand(0, 99).date('mdh');
		$data['nama'] = '';
		$data['tamu'] = '';
		$data['tgl'] = '';
		$data['jam'] = '';
		$data['jam_akhir'] = '';
		
		$data['kd_venue'] = $this->Modular->Venue()->result();
		$data['jumlah_peserta'] = '';
		$data['keterangan'] = '';
		$this->template->load('home', 'form_agenda' ,$data);	
	}

	function simpan_agd() {
		$req = [
			'method' => 'insert',
			'table' => 't_agenda',
			'value' => [
				'kd_agenda' => $this->input->post('id'),
				'nama_agenda' => $this->input->post('nama'),
				'tgl_agenda' => $this->input->post('tgl'),
				'jam_agenda' => $this->input->post('jam'),
				'jam_akhir' => $this->input->post('jam_akhir'),
				'naskah_pidato' => $this->input->post('naskah'),
				'sts_agenda' => '1',
				'admin_ygbuat' => $this->session->userdata('kd_sesi'),
				'tgl_buat' => date('Y-m-d H:i:s'),
				'kd_venue' => $this->input->post('kd_venue'),
				'jumlah_peserta' => $this->input->post('jumlah_peserta'),
				'keterangan' => $this->input->post('keterangan')
			]
		];
		$this->Modular->queryBuild($req);
	}

	function edit_agd($id) {
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_agenda',
			'where' => [
				'kd_agenda' => $id
			]
		];
		$row = $this->Modular->queryBuild($req)->row();
        $data['title'] = "Update Agenda Kegiatan :: My Asisten";
        $data['judul'] = 'Update Agenda Kegiatan ';
        $data['linkpage'] ='<a href="https://chat.openai.com/chat" target="_blank" class="btn btn-success btn-sm">Buat Naskah di ChatGPT</a>';
		$data['url'] = base_url('agenda/update_agd');
		$data['id'] = $id;
		$data['nama'] = $row->nama_agenda;
		$data['tamu'] = $row->tamu_utama;
		$data['tgl'] = $row->tgl_agenda;
		$data['jam'] = $row->jam_agenda;
		$data['jam_akhir'] = $row->jam_akhir;
		
		$data['kd_venue'] = $this->Modular->Venue()->result();
		$data['jumlah_peserta'] = $row->jumlah_peserta;
		$data['keterangan'] = $row->keterangan;
		$this->template->load('home', 'form_agenda' ,$data);	
	}

	function update_agd() {
		$req = [
			'method' => 'update',
			'table' => 't_agenda',
			'value' => [
				'nama_agenda' => $this->input->post('nama'),
				'tamu_utama' => $this->input->post('tamu'),
				'tgl_agenda' => $this->input->post('tgl'),
				'jam_agenda' => $this->input->post('jam'),
				'jam_akhir' => $this->input->post('jam_akhir'),
				'lokasi_acara' => $this->input->post('lokasi_acara'),
				'naskah_pidato' => $this->input->post('naskah'),
				'admin_ygbuat' => '',

				'kd_venue' => $this->input->post('kd_venue'),
				'jumlah_venue' => $this->input->post('jumlah_peserta'),
				'keterangan' => $this->input->post('keterangan')
			],
			'where' => ['kd_agenda' => $this->input->post('id')]
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
			'table' => 't_agenda',
			'where' => [
				'kd_agenda' => $id
			] 
		];
		$data['row'] = $this->Modular->queryBuild($req)->row();
		$this->template->load('home', 'naskah' ,$data);	
	}
}