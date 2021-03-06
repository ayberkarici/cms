<?php 
class Portfolio_model extends CI_Model 
{
    public $tableName = "portfolios";

    public function __construct()
    {       
        parent::__construct();
    }

    // Tüm kayıtları getiren metot
    public function get_all($where = array(), $order = "id ASC", $limit = array("count" => 0, "start" => 0))
    {
        $this->db->where($where)->order_by($order);

        if(!empty($limit))
            $this->db->limit($limit["count"], $limit["start"]);

        if($limit['count'] == 1 && $limit['start'] == 0) {
            $result = $this->db->get($this->tableName)->result();
            return $result[0];
        } else {
            return $this->db->get($this->tableName)->result();
        }
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }
    
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function get_random($where = array()) {
        $this->db->order_by("rand()");
        $this->db->limit(1);

        return $this->db->where($where)->get($this->tableName)->row();
    }
    
    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }

}
