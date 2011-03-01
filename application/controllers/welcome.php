<?if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
				
		$this->load->library('mobile');
	}

	function index()
	{			
		$this->mobile->header('Welcome')->button('welcome/login', 'Login', 'gear');
		
		$navbar = array(
			'welcome/index' => 'Index',
			'welcome/login' => 'Login'
		);
		
		$this->mobile->navbar($navbar, 'a');
		
		$this->mobile->view('welcome/index');
	}
		
	function login()
	{
		$this->mobile->header('Login')->back_to('welcome/index');
		
		$this->mobile->view('welcome/login');	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
