
<?php

	class ProfileM extends CI_Model
	{
		public function getUserInfo($userid){
			return $this->db->select("u.*,c.*")->from("tbluser u")->join("tblcity c","c.CityId=u.CityId")->where("u.UserId",$userid)->get()->result()[0];
		}

		public function getUserCommunity($userid){
			$data=array(
				"UserId"=>$userid,
				"Status"=>0
			);
			return $this->db->where($data)->get("tblcommunity")->result();
		}

		
		public function updatePassword($newpass,$userid){
			$this->db->where("UserId",$userid)->set("Password",$newpass)->update("tbluser");
		}

		public function changeProPic($img,$userid){
			$this->db->where("UserId",$userid)->set("ProfileImage",$img)->update("tbluser");
		}

	}
?>
