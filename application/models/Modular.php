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
} ?>