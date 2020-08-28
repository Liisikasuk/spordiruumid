<?php
defined('BASEPATH') or exit('No direct script access allowed');

<<<<<<< HEAD
class Guide extends CI_Controller
=======
class Home extends CI_Controller
>>>>>>> master
{


	public function __construct()
	{
		parent::__construct();
		
<<<<<<< HEAD
		
	}
	
    function view(){
		$this->load->view('templates/header',$data);
		$this->load->view('pages/fullcalendar',$data);
		$this->load->view('templates/footer',$data);
        

        }
        
=======
		$this->load->model('home_model');
	}
	

>>>>>>> master
	function menu(){
		$data['menu'] = 'home'; // Capitalize the first letter
		$data['unapprovedBookings'] = $this->home_model->getUnapprovedBookings($this->session->userdata('building'));
		return $data;
		}

<<<<<<< HEAD
	
=======
	function view()
	{//	$data['title'] = "Hello Everyone!";
		$data=$this->menu();
		
		$this->load->view('templates/header',$data);
		$this->load->view('pages/fullcalendar',$data);
		$this->load->view('templates/footer',$data);
	}


>>>>>>> master
}
