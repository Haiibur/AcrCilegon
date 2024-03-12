<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_Kehadiran extends CI_Controller
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
		$data['title'] = "Absen Kehadiran :: My Asisten";
		$data['judul'] = 'Absen Kehadiran';
		$data['linkpage'] = '';
		$this->template->load('home', 'Absen_Kehadiran', $data);
	}

	function load_absen_kehadiran()
	{
		$res = $this->Modular->Absen_Kehadiran()->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_hadir.'=t_absen_kehadiran=kd_hadir=Absen_Kehadiran=0.jpg';
			$data = [
				'id' 				 => $value->kd_hadir,
				'ids'				 => $iddata,
				'kd_hadir'			 => $value->kd_hadir,
				'peserta_kd'		 => $value->nama_level_peserta,
				'agenda_kd'			 => $value->nama_agenda,
				'tgl_absen'			 => date("d M Y H:i:s", strtotime($value->tgl_absen)),
				'nama_provinsi'		 => $value->nama_provinsi,
				'nama_kabupaten'	 => $value->nama_kabupaten,
			];
			array_push($output, $data);
		}
		
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function getkabupaten()
    {
        $kd_provinsi = $this->input->post('kd_provinsi', TRUE);
        $data = $this->Modular->get_kabupaten($kd_provinsi)->result();

        echo json_encode($data);
    }

	function form_tambah_absen_kehadiran()
	{
		$data['title'] 			= "Absen Kehadiran :: My Asisten";
		$data['judul'] 			= 'Form Absen Kehadiran';
		$data['url'] 			= base_url('Absen_Kehadiran/Insert_absen_kehadiran');
		$data['id'] 			= rand(0, 99) . date('mdh');

		$data['peserta_kd']		= $this->Modular->level_peserta()->result();
		$data['agenda_kd']		= $this->Modular->Agenda()->result();
		$data['provinsi']		= $this->Modular->get_provinsi()->result();
		
		$this->template->load('home', 'form_absen_kehadiran', $data);
	}

	function Insert_absen_kehadiran()
	{	
		date_default_timezone_set('Asia/Jakarta');

		$req = [
			'method' => 'insert',
			'table' => 't_absen_kehadiran',
			'value' => [
				'peserta_kd'		=> $this->input->post('peserta_kd'),
				'agenda_kd'			=> $this->input->post('agenda_kd'),
				'tgl_absen'			=> date("Y-m-d H:i:s"),
				'prov_kd'			=> $this->input->post('kd_provinsi'),
				'kab_kd'			=> $this->input->post('kd_kabupaten'),
			]
		];
		
		$this->Modular->queryBuild($req);
	}

	function edit_absen_kehadiran($id)
	{
		$req = [
			'method' => 'get',
			'select' => '*',
			'table' => 't_absen_kehadiran',
			'where' => [
				'kd_hadir' => $id
			]
		];
		
		$row = $this->Modular->queryBuild($req)->row();
		$kabupaten=$this->Modular->get_kabupaten($row->kab_kd)->row();
		
		$data['title'] = "Update Absen_Kehadiran :: My Asisten";
		$data['judul'] = 'Update Absen_Kehadiran ';
		$data['url'] = base_url('Absen_Kehadiran/update_absen_kehadiran');
		$data['id'] = $id;

		$data['peserta_kd']		= $this->Modular->level_peserta()->result();
		$data['agenda_kd']		= $this->Modular->Agenda()->result();
		$data['provinsi']		= $this->Modular->get_provinsi()->result();
		
		$this->template->load('home', 'form_absen_kehadiran', $data);	
	}

	function update_absen_kehadiran()
	{
		$req = [
			'method' => 'update',
			'table' => 't_absen_kehadiran',
			'value' => [
				'peserta_kd'		=> $this->input->post('peserta_kd'),
				'agenda_kd'			=> $this->input->post('agenda_kd'),
				'tgl_absen'			=> date("Y-m-d H:i:s"),
				'prov_kd'			=> $this->input->post('kd_provinsi'),
				'kab_kd'			=> $this->input->post('kd_kabupaten'),
			],
			'where' => ['kd_hadir' => $this->input->post('id')]
		];
		
		$this->Modular->queryBuild($req);
	}
}