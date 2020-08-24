<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guide extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		
		
	}
	
    function view(){
		$this->load->view('templates/header',$data);
		$this->load->view('pages/fullcalendar',$data);
		$this->load->view('templates/footer',$data);
        

        }
        
	function menu(){
		$data['menu'] = 'home'; // Capitalize the first letter
		$data['unapprovedBookings'] = $this->home_model->getUnapprovedBookings($this->session->userdata('building'));
		return $data;
		}

	
}
