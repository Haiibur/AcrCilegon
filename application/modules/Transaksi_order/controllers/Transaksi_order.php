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
		$data['title'] = "Transaksi Produk :: My Asisten";
		$data['judul'] = 'Transaksi Produk';
		$data['linkpage'] = '';
		$this->template->load('home', 'Transaksi_order', $data);
	}

	function load_transaksi_order()
	{
		$res = $this->Modular->Transaksi_order()->result();
		$output = array();
		
		foreach ($res as $key => $value) {
			$iddata = $value->kd_order.'=produk_order=kd_order=Transaksi_order=0.jpg';

			$detail1 = 
			'<div class="btn-group dropup" style="display: flex;">
				<a class="btn btn-sm btn-primary" style="color: white;">' . 
					($value->status_kirim == 0 ? '<small>Dibatalkan</small>' : 
						($value->status_kirim == 1 ? '<small>Proses Kemas</small>' : 
							($value->status_kirim == 2 ? '<small>Dikirim</small>' : 
								($value->status_kirim == 3 ? '<small>Selesai</small>' : '<small>Non-Aktif</small>')
							)
						)
					) . 
				'</a>
				<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
				<div class="dropdown-menu">
					<a href="' . base_url() . 'Transaksi_order/update_status/' . $value->kd_order . '/0" class="dropdown-item" style="text-align: center;">
						Dibatalkan
					</a> 
					<a href="' . base_url() . 'Transaksi_order/update_status/' . $value->kd_order . '/1" class="dropdown-item" style="text-align: center;">
						Proses Kemas
					</a>
					<a href="' . base_url() . 'Transaksi_order/update_status/' . $value->kd_order . '/2" class="dropdown-item" style="text-align: center;">
						Dikirim
					</a>
					<a href="' . base_url() . 'Transaksi_order/update_status/' . $value->kd_order . '/3" class="dropdown-item" style="text-align: center;">
						Selesai
					</a>
				</div>
			</div>';
		

			$detail2 = 
			'<div class="btn-group dropup" style="display: flex;">
				<a class="btn btn-sm btn-primary" style="color: white;">' . ($value->status_bayar == 0 ? '<small>Belum Bayar</small>' : '<small>Lunas</small>') . '</a>
				<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
				<div class="dropdown-menu">' .
					($value->status_bayar == 0 
						? '<a href="' . base_url() . 'Transaksi_order/update_statuss/' . $value->kd_order . '/1" class="dropdown-item" style="text-align: center;">
								Lunas
						   </a>' 
						: '<a href="' . base_url() . 'Transaksi_order/update_statuss/' . $value->kd_order . '/0" class="dropdown-item" style="text-align: center;">
								Belum Bayar
						   </a>') .
				'</div>
			</div>';

			$data = [
				'id' => $value->kd_order,
				'ids' => $iddata,
				'kd_order'				 => $value->kd_order,
				'tgl_order'				 => $value->tgl_order,
				'nama_peserta'	 		 => $value->nama_peserta,
				'tlp_peserta'	 		 => $value->tlp_peserta,
				'nama_produk'	 		 => $value->nama_produk,
				'qty_order'		 		 => $value->qty_order,
				'harga_order'		 	 => $value->harga_order,
				'jumlah_bayar'	 	 	 => $value->jumlah_bayar,
				'status_kirim'	 	 	 => $detail1,
				'status_bayar'	 	 	 => $detail2,
				'alamat_kirim'		 	 => $value->alamat_kirim,
			];
			array_push($output, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	function form_tambah_transaksi_order()
	{
		$data['title'] 					= "Transaksi Order :: My Asisten";
		$data['judul'] 					= 'Form Transaksi Order';
		$data['url'] 					= base_url('Transaksi_order/Insert_transaksi_order');
		$data['id'] 					= rand(0, 99) . date('mdh');
		
		$data['Peserta']			    = $this->Modular->Pendaftaran()->result();
		$data['Produk']				 	= $this->Modular->Produk()->result();
		$data['qty_order']				= '';
		$data['harga_order']			= '';
		$data['alamat_kirim']			= '';
		
		$this->template->load('home', 'form_transaksi_order', $data);
	}

	function Insert_transaksi_order()
	{
		///// ID UNDANGAN /////
		$table1       = 'produk_order';
		$field1       = 'kd_order';

		$lastKode1    = $this->Modular->getMax($table1, $field1);

		$noUrut1      = (int) substr($lastKode1, -4, 4);
		$noUrut1++;

		$str1         = 'ODR';
		$kd_order  = $str1 . sprintf('%04s', $noUrut1);

		date_default_timezone_set('Asia/Jakarta');

		$req = [
			'method' => 'insert',
			'table' => 'produk_order',
			'value' => [
				'kd_order'		 		=> $kd_order,
				'pendaftar_kd'			=> $this->input->post('peserta'),
				'tgl_order'				=> date("Y-m-d H:i:s"),
				'alamat_kirim'			=> $this->input->post('alamat_kirim'),
			]
		];
		$req2 = [
			'method' => 'insert',
			'table' => 'produk_order_detail',
			'value' => [
				'order_kd'		 	=> $kd_order,
				'produk_id'			=> $this->input->post('produk'),
				'qty_order'			=> $this->input->post('qty_order'),
				'harga_order'		=> $this->input->post('harga_order'),
			]
		];
		
		$this->Modular->queryBuild($req);
		$this->Modular->queryBuild($req2);
		
		redirect(site_url('Transaksi_order'));
	}

	function edit_transaksi_order($id)
	{
		$row = $this->Modular->Transaksi_order_detail($id)->row();
		
		$data['title'] = "Detail Order :: My Asisten";
		$data['judul'] = 'Detail Order';
		$data['url'] 					= base_url('Transaksi_order/update_transaksi_order');
		$data['id'] = $id;

		$data['Peserta']			    = $this->Modular->Pendaftaran()->result();
		$data['Produk']				 	= $this->Modular->Produk()->result();
		$data['qty_order'] 				= $row->qty_order;
		$data['harga_order'] 			= $row->harga_order;
		$data['alamat_kirim'] 			= $row->alamat_kirim;
		
		$this->template->load('home', 'form_transaksi_order', $data);
		
	}

	function detail_order($id)
	{
		$row = $this->Modular->Transaksi_order_detail($id)->row();
		
		$data['title'] = "Detail Order :: My Asisten";
		$data['judul'] = 'Detail Order';
		$data['id'] = $id;
		
		$data['kd_order'] 				= $row->kd_order;
		$data['tgl_order'] 				= $row->tgl_order;
		$data['nama_peserta'] 			= $row->nama_peserta;
		$data['tlp_peserta'] 			= $row->tlp_peserta;
		$data['qty_order'] 				= $row->qty_order;
		$data['harga_order'] 			= $row->harga_order;
		$data['alamat_kirim'] 			= $row->alamat_kirim;
		$data['status_kirim'] 			= $row->status_kirim;
		$data['status_bayar'] 			= $row->status_bayar;
		$data['nama_produk'] 			= $row->nama_produk;
		$data['harga'] 					= $row->harga;
		$data['satuan_produk'] 			= $row->satuan_produk;
		$data['email_peserta'] 			= $row->email_peserta;
		$data['kode_undangan'] 			= $row->undangan_kd;

		$this->template->load('home', 'detail_order', $data);
		
	}

	function update_transaksi_order()
	{
		$req = [
			'method' => 'update',
			'table' => 'produk_order',
			'value' => [
				'pendaftar_kd'			=> $this->input->post('peserta'),
				'alamat_kirim'			=> $this->input->post('alamat_kirim'),
			],
			'where' => ['kd_order' => $this->input->post('id')]
		];
		$req2 = [
			'method' => 'update',
			'table' => 'produk_order_detail',
			'value' => [
				'produk_id'			=> $this->input->post('produk'),
				'qty_order'			=> $this->input->post('qty_order'),
				'harga_order'		=> $this->input->post('harga_order'),
			],
			'where' => ['order_kd' => $this->input->post('id')]
		];
		
		$this->Modular->queryBuild($req);
		$this->Modular->queryBuild($req2);
	}

	public function update_status($id, $status) {
        $req = [
            'method' => 'update',
            'table' => 'produk_order',
            'value' => [
                'status_kirim' => $status,
            ],
            'where' => ['kd_order' => $id]
        ];

        // Panggil fungsi untuk menjalankan query pembaruan status
        $this->Modular->queryBuild($req);

		redirect('Transaksi_order');
    }

	public function update_statuss($id, $status) {
        $req = [
            'method' => 'update',
            'table' => 'produk_order',
            'value' => [
                'status_bayar' => $status,
            ],
            'where' => ['kd_order' => $id]
        ];

        // Panggil fungsi untuk menjalankan query pembaruan status
        $this->Modular->queryBuild($req);

		redirect('Transaksi_order');
    }
}