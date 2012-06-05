<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
   
        function __construct() {
            
                parent::__construct();
                if ($this->session->userdata('is_admin') == TRUE && $this->session->userdata('logged_in') == TRUE) {
                    $this->session->set_userdata(array('login_flag' => 1));
                }
                else {
                    $this->session->set_userdata(array('login_flag' => 0));
                }
                $this->load->model('settings_model', 'settings');
                $this->session->set_userdata(array('admin_controls' => FALSE, 'site_name' => $this->settings->get_site_name()));
                
        }

	public function index()
	{
                if ($this->session->userdata('logged_in')) {
                    $data['page_title'] = 'Dashboard';
                    $this->load->view('user/dashboard', $data);
                }
                else {
                    redirect('main/login', 'location');
                }
	}
        
        public function profile()
        {
                if ($this->session->userdata('logged_in')) {
                    $data['page_title'] = 'Profile';
                    $this->load->view('user/profile', $data);
                }
                else {
                    redirect('main/login', 'location');
                }
        }
        
        public function verify($verification_key)
        {
                $this->load->model('user_model', 'user');
                $check_val = $this->user->verify_account($verification_key);
                if ($check_val) {
                    $this->load->view('messages/account_verified');
                }
                else {
                    $this->load->view('messages/account_verification_problem');
                }
        }
        
        public function logout()
        {
                $data['page_title'] = 'Logged Out';
                $this->simpleloginsecure->logout();
                $this->load->view('messages/logged-out', $data);
        }
}

?>