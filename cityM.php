<?php
class cityM extends CI_Model
{
	public function selectcityBystateId($where)
	{
		return $this->db->where($where)->get("tblcity")->result();
	}

	public function insertcity($data)
	{
		$this->db->insert("tblcity",$data);
	}

	public function deletecityById($where)
	{
		return $this->db->delete("tblcity",$where);
	}

	public function loadcityById($where)
	{
		return $this->db->where($where)->get("tblcity")->result()[0];
	}

	public function updatecity($newdata,$where)
	{
		$this->db->Update("tblcity",$newdata,$where);
	}
}
?>