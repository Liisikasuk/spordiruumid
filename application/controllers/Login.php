<?php
class Login extends CI_Controller{
    
  function __construct(){
	parent::__construct();
	$this->load->library('facebook'); 
    $this->load->model('login_model');
  }
 
  function index(){
	$data['google']=$this->login();
	$data['facebook']=$this->fblogin();
    $this->load->view('templates/header');
    $this->load->view('pages/login',$data);
    $this->load->view('templates/footer');
  }
 
  function auth(){
    $email    = $this->input->post('email',TRUE);
    //$password = md5($this->input->post('password',TRUE));
    $password = $this->input->post('password',TRUE);
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['name'];
        $email = $data['email'];
        $roleID = $data['roleID'];
        $building = $data['buildingID'];
        $sesdata = array(
            'username'  => $name,
            'email'     => $email,
            'roleID'     => $roleID,
            'buildingID' => $building,
            'session_id' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($roleID === '1'){
            redirect('page');
 
        // access login for staff
        }elseif($roleID === '2'){
            redirect('page/staff');
 
        // access login for author
        }else{
            redirect('page/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login');
	}
	
	}
	



//begin with Facebook OAuth
// Source code: https://www.codexworld.com/facebook-login-codeigniter/
	function fblogin()
	{

	$userData = array(); 
         
	// Authenticate user with facebook 
	if($this->facebook->is_authenticated()){ 
		// Get user info from facebook 
		$fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email'); 

		// Preparing data for database insertion 
	//	$userData['oauth_provider'] = 'facebook'; 
		$userData['login_oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
		$userData['userName']    = !empty($fbUser['first_name'])?$fbUser['first_name'].' '.$fbUser['last_name']:''; 
	//	$userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
		$userData['email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
	//	$userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
	//	$userData['picture']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
	//	$userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
		 
		// Insert or update user data to the database 
		$userID = $this->login_model->checkUser($userData); 
		 
		// Check user data insert or update status 
		if(!empty($userID)){ 
			$data['userData'] = $userData; 
			 
			// Store the user profile info into session 
			$this->session->set_userdata('userData', $userData); 
		}else{ 
		   $data['userData'] = array(); 
		} 
		 
		// Facebook logout URL 
		$data['logoutURL'] = $this->facebook->logout_url(); 
	}else{ 
		// Facebook authentication url 
		$data['authURL'] =  $this->facebook->login_url(); 
	} 
	 

	if(!$this->session->userdata('userData'))
	{
	  
	   return $data;
	   
	}
	else
	{
		print_r($data);
		$this->load->view('templates/header');
		$this->load->view('pages/fblogin', $data);
		$this->load->view('templates/footer');
	}
	// Load login/profile view 
	
	  
	
	
		
	}

//end of Facebook OAuth


	// Google OAuth start
	// used Webslesson from youtube: https://www.youtube.com/watch?v=Kd9Yp9CcVIY and his/her homepage https://www.webslesson.info/2020/03/google-login-integration-in-codeigniter.html
	// WPHire from youtube: https://www.youtube.com/watch?v=lAqOZ3nXG7o

	function login()
	{
	 include_once APPPATH . "libraries/vendor/autoload.php";
	// $data=array();
	 $google_client = new Google_Client();
 	 $google_client->setClientId('840873810053-5dbvqpg2qjpd0ir5a11o3k7srljqdbbu.apps.googleusercontent.com'); //Define your ClientID
 	 $google_client->setClientSecret('XoNmVkn5mPIDGCzxk1RaK_Fi'); //Define your Client Secret Key
 	 $google_client->setRedirectUri('http://localhost/spordiruumid/login/login'); //Define your Redirect Uri
 	 $google_client->addScope('email');
 	 $google_client->addScope('profile');
 
	 if(isset($_GET["code"]))
	 {
		$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 
		if(!isset($token["error"]))
		{
		 $google_client->setAccessToken($token['access_token']);
 		 $this->session->set_userdata('access_token', $token['access_token']);
 		 $google_service = new Google_Service_Oauth2($google_client);
 		 $data = $google_service->userinfo->get();
 		 $current_datetime = date('Y-m-d H:i:s');
 
		 if($this->login_model->is_already_register($data['id']))
		 {
			//update data
			$user_data = array(
			'userName'  => $data['given_name'].' '.$data['family_name'],
			'email'  => $data['email'],
			'updated_at' => $current_datetime
			);
 
			$this->login_model->update_user_data($user_data, $data['id']);
		 }
		 else
		 {
			//insert data
			$user_data = array(
			 'login_oauth_uid' => $data['id'],
			 'userName'  => $data['given_name'].' '.$data['family_name'],
			 'email'  => $data['email'],
			 'created_at'  => $current_datetime
			);
 
			$this->login_model->insert_user_data($user_data);
		 }
		 $this->session->set_userdata('user_data', $user_data);
		}
	 }
	 $login_button = '';
	 if(!$this->session->userdata('access_token'))
	 {
		$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'assets/img/sign-in-with-google.png"  width="54%" /></a>';
		$data['login_button'] = $login_button;
		return $data;
		
	 }
	 else
	 {
		$this->load->view('pages/logingoogle', $data);
	 }
	}
// Google OAuth finish

 
  function logout(){
			$this->session->sess_destroy();

			$this->session->unset_userdata('access_token');
			$this->session->unset_userdata('user_data');
	
      redirect('login');
  }
 
}