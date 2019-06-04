<?php
/**
 * MY_Controller
 * This is our main controller which will extend by all controller in project we are 
 * setting session and everything here so we can change it latter
 *
 * */
class MY_Controller extends CI_Controller {
	public $Usersession;
	public $userId;
	public $userName;
	public $userEmail;
	public $type;
	public $image;
	public $test;
	public $access;
	public $language;
	public $database;
	public $rights;
	public function __construct() {
		parent::__construct ();
		require_once APPPATH . 'config/tablenames_constants.php';
		require_once APPPATH . 'config/default_constants.php';
		if ($this->session->userdata ( 'userdata' )) {
			
			
			$this->Usersession = $this->session->userdata ( 'userdata' );
			$this->id = $this->Usersession->id;
			$this->name = $this->Usersession->name;
			$this->username = $this->Usersession->username;
			$this->email = $this->Usersession->email;
			$this->mobile = $this->Usersession->mobile;
			$this->image = $this->Usersession->image;
			$this->language = $this->Usersession->language;
			
			$this->database = $this->Usersession->company_db;
			$this->guid = $this->Usersession->guid;
			$this->company_id = $this->Usersession->company_id;
			$this->type = $this->Usersession->type;
		    

			
			
		} else {
			
			
			if($this->router->fetch_class () != 'login' && $this->router->fetch_class () != 'logout'){
			 redirect ( SITE_URL );
			}
		}
		if($this->language == 'en'){
			$this->language='english';
		}  if($this->language == 'fr'){
			$this->language='spanish';
		} 
		$this->language = empty($this->language) ? 'english':$this->language;




		
		
		$this->config->set_item('language', $this->language);
        $this->lang->load('rest_controller',$this->language);
		$this->session->set_userdata('site_lang', $this->language);
		// if($this->router->fetch_class () != 'customer'){
				
		// 	redirect ( SITE_URL.'company/customer');
		// 	return true;
		//    }
		

		
		
		
	}
	public function redirection($response) {
		
		if (($response == '1') && ($this->router->fetch_class () != $this->myvalues->dashboardDetails ['controller'])) {
			redirect ( SITE_URL . 'admin/' . $this->myvalues->dashboardDetails ['controller'] );
		}
	}
	/**
	 * loadView
	 *
	 * This method load view for our project
	 *
	 * @param string $viewName
	 *        	is view name which is individual file
	 * @param array $data
	 *        	is view data
	 */
	public function loadView($viewName, $data) {
		
		
		if ($this->session->userdata('userdata')) {
			
			$path = 'AdminCommonviews';
			
			$this->load->view ( $path . '/header',$data);
			$this->load->view ( $path . '/navbar',$data);
			$this->load->view ( $viewName,$data);
			$this->load->view ( $path . '/footer', $data);
			
		} else {
			
			$path = 'frontCommonViews';
			$this->load->view ( $path . '/header',$data);
			$this->load->view ( $viewName, $data);
			$this->load->view ( $path . '/footer', $data);
			
		}
	}
	public function validateData($rules, $data = []) {
		
		/*
		 * $this->load->library('form_validation'); $this->form_validation->set_rules('txtUsername', 'course_code', 'trim|xss_clean|required'); $this->form_validation->set_rules('pwdPassword', 'name', 'xss_clean|min_length[8]|required'); if ($this->form_validation->run() == TRUE) { echo validation_errors(); } else { echo validation_errors(); } die;
		 */
		$this->load->library ( 'form_validation' );
		// $this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules ( $rules );
		
		$this->form_validation->run ();
		
		if ($this->form_validation->run () == FALSE) {
			$response = [ 
					"status" => ERROR_CODE,
					"message" => validation_errors () 
			];
			
			die ( json_encode ( $response ) );
		}
	}
	public function validateDataWeb($rules, $data = []) {
		$this->load->library ( 'form_validation', $config );
		$this->form_validation->set_rules ( $rules );
		$this->form_validation->set_error_delimiters ( '<span class="help-inline text-danger" style = "color:red;">', '</span>' );
		
		if (count ( $data ) > 0)
			$this->form_validation->set_data ( $data );
		return ($this->form_validation->run ());
	}
	
	/**
	 * checkInt
	 * This method is check a value which is encoded is integer or not
	 *
	 * @param $value is
	 *        	the value which we want to check integer or not
	 *        	
	 * @return $ids either return to child class or redirect to request URI
	 */
	public function checkInt($value) {
		$ids = $this->utility->decode ( $value );
		echo $ids;
		die ();
		
		if (! ctype_digit ( $ids )) {
			
			$response ['status'] = ERROR_CODE;
			$response ['message'] = $this->lang->line ( 'operation_error' );
			apiResponse ( $response );
			die ();
		} else {
			
			return $ids;
		}
	}
	
	/**
	 * this method filter ajax request
	 */
	public function filterAjaxrequest() {
		if ($this->input->post () && $this->input->is_ajax_request ()) {
			return true;
		} else {
			
			$data ['status'] = ERROR_CODE;
			$data ['message'] = 'This is not valid request to our code';
			$data ['data'] = null;
			
			echo json_encode ( $data );
			die ();
		}
	}


	
}

?>
