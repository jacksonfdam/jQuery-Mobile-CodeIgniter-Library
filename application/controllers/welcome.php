<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('mobile');
	}

	public function index()
	{
		$this->mobile->header('Welcome to CodeIgniter!', 'e')->button('welcome/help', 'Help', 'info');

		$this->mobile->navbar(array(
			'welcome/index' 	=> array('text' => 'Home', 		'icon' => 'home'),
			'welcome/settings'	=> array('text' => 'Settings', 	'icon' => 'gear')
		), 'a');

		$this->mobile->footer('Footer', 'a');

		$this->mobile->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */