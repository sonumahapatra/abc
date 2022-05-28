<?php

	class areacontroller extends CI_Controller
	{
		function __construct()
		{
			parent:: __construct();
			$this->load->Model('areamodel');
			$this->load->Model('citymodel');
		}
		function index()
		{
			$data['area'] = $this->citymodel->select_all('db_area');
		}
		function addarea()
		{
			
			if($this->session->userdata('admin'))
			{
				$data['s'] = $this->session->userdata('admin');
			}
			else
			{
				redirect(base_url().'landingcontroller'); 
			}
			if($this->input->get_post('add_area_btn'))
			{
		
				$city = $this->input->get_post('city');
				$area  = $this->input->get_post('area');
				$areadata = array('city_id'=>$city, 'areaname'=>$area);
				$x = $this->areamodel->add_area('db_area',$areadata);
				redirect(base_url().'areacontroller/viewarea');
			}
			else
			{
				// redirect(base_url().'landingcontroller');


}			}

			
			$data['city'] = $this->citymodel->select_all('db_city');	
			$this->load->view('admin/addarea',$data);
		}
		function viewarea()
		{
			$data['area'] = $this->areamodel->select_all('db_area');
			if($this->session->userdata('admin'))
			{
				$data['s'] = $this->session->userdata('admin');
			}
			else
			{
				redirect(base_url().'landingcontroller');
			}
			$this->load->view('admin/viewarea',$data);
		}
		
		
		function all_area()
		{
			$data['area'] = $this->areamodel->select_all('db_area');
			$this->load->view('admin/all_area',$data);
		}	
		function delete_area()
		{
		
			if($this->input->get_post('id'))
			{
				$d = $this->input->get_post('id');
				$did = array('id'=>$d);
				$this->areamodel->delete_area('db_area',$did);
			}
		}
	}

?>
