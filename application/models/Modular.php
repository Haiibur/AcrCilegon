<?php class Modular extends CI_Model {
	public function __construct() {
		parent::__construct();	
	}

  public function queryBuild($req) {
    foreach ($req as $key => $value) {
      if ($req['method'] == 'get') {
        $this->db->select($req['select']);
        $this->db->from($req['table']);
        if (isset($req['join'])) {
          foreach ($req['join'] as $table => $bound) {
            $this->db->join($table, $bound);
          }
        }
        if (isset($req['order'])) { $this->db->order_by($req['order']); }
        if (isset($req['where'])) { $this->db->where($req['where']); }
        if (isset($req['wherein'])) {
          foreach($req['wherein'] as $keyVal => $arrayVal) {
            $this->db->where_in($keyVal, $arrayVal);
          } 
        }
        if (isset($req['like'])) { $this->db->like($req['like']); }
        if (isset($req['not_like'])) { $this->db->not_like($req['not_like']); }
        if (isset($req['group'])) { $this->db->group_by($req['group']); }
        if (isset($req['limit'])) { $this->db->limit($req['limit']); }
        return $this->db->get();
      } elseif ($req['method'] == 'insert') {
        return $this->db->insert($req['table'], $req['value']);
      } elseif ($req['method'] == 'update') {
        if (isset($req['where'])) { $this->db->where($req['where']); }
        return $this->db->update($req['table'], $req['value']);
      } elseif($req['method'] == 'delete') {
        if (isset($req['where'])) { $this->db->where($req['where']); }
        return $this->db->delete($req['table']);
      }
    }
  }

  function get_provinsi()
  {
    $query = "SELECT * FROM t_provinsi";
    return $this->db->query($query);
  }

  function Agenda()
  {
    $query = "SELECT * FROM t_agenda";
    return $this->db->query($query);
  }

  function Venue()
  {
    $query = "SELECT * FROM t_lokasi_venue";
    return $this->db->query($query);
  }

  function level_peserta()
  {
    $query = "SELECT * FROM t_peserta_level";
    return $this->db->query($query);
  }

  function get_kabupaten($id)
  {
    $query = "SELECT * FROM t_kabupaten where prov_kd='$id'";
    return $this->db->query($query);
  }
  
  function Kabupaten()
  {
    $query = "SELECT * FROM t_kabupaten INNER JOIN t_provinsi ON t_provinsi.kd_provinsi= t_kabupaten.prov_kd";
    return $this->db->query($query);
  }

  function Undangan()
  {
    $query = "SELECT * FROM t_undangan 
    INNER JOIN t_provinsi ON t_provinsi.kd_provinsi= t_undangan.prov_kd 
    INNER JOIN t_kabupaten ON t_kabupaten.kd_kabupaten=t_undangan.kab_kd";
    return $this->db->query($query);
  }

  function Pendaftaran()
  {
    $query = "SELECT * FROM t_pendaftaran 
    INNER JOIN t_undangan ON t_undangan.kode_undangan= t_pendaftaran.undangan_kd 
    INNER JOIN t_peserta_level ON t_peserta_level.kd_level_peserta=t_pendaftaran.level_peserta";
    return $this->db->query($query);
  }

  function Absen_Kehadiran()
  {
    $query = "SELECT * FROM t_absen_kehadiran 
    INNER JOIN t_agenda ON t_agenda.kd_agenda= t_absen_kehadiran.agenda_kd 
    INNER JOIN t_provinsi ON t_provinsi.kd_provinsi= t_absen_kehadiran.prov_kd 
    INNER JOIN t_kabupaten ON t_kabupaten.kd_kabupaten= t_absen_kehadiran.kab_kd 
    INNER JOIN t_peserta_level ON t_peserta_level.kd_level_peserta=t_absen_kehadiran.peserta_kd";
    return $this->db->query($query);
  }

  public function getMax($table = null, $field = null)
	{
		$this->db->select_max($field);
		return $this->db->get($table)->row_array()[$field];
	}
} 
?>