<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
   
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

	public function index() {
            
                $data['page_title'] = 'Home';
		$this->load->view('main', $data);
                
	}  
        
	public function sample() {
            
                $data['page_title'] = 'Sample Page';
		$this->load->view('sample-page', $data);
                
	}  
        
	public function register() {
            
                $data['page_title'] = 'Register';
                $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
                $data['error'] = NULL;
                if ($this->form_validation->run('standard/signup') == FALSE) //validate registration data
                {
                    $this->load->view('register', $data);
		}
                else 
                {
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    
                    $this->load->model('user_model', 'user');
                    
                    //check if email already registered.
                    $check_val = $this->user->check_email_exists($email);
                    
                    if( $check_val == TRUE ) //email address found
                    {
                        $data['error'] = "This email address is already registered with us!";
                        $this->load->view('register', $data);
                    }
                    
                    else // proceed with registration
                    {
                        $registration_val = $this->simpleloginsecure->create($email, $password, FALSE);
                        if ($registration_val) {
                            $this->user->generate_verification_key($email);
                            $this->user->send_mail_to_user($email);
                            $this->load->view('messages/registration_success');
                        }
                        else {
                            $this->load->view('messages/registration_problem');
                        }
                    }
                }
                
	}  
        
	public function login() {
            
                if ( $this->session->userdata('logged_in') == TRUE) 
                {
                    redirect('user', 'location');
                }
                else
                {      
                    $data['page_title'] = 'Login';
                    $data['error'] = NULL;
                    
                    $this->form_validation->set_error_delimiters('<div class="alert alert-error"><p>', '</p></div>');
                    
                    if ($this->form_validation->run('standard/login') == FALSE) //present and validate login form
                    {
                        $this->load->view('login', $data);
                    }
                    else
                    {
                        $email = $this->input->post('email');
                        $password = $this->input->post('password');
                        
                        $check_val = $this->simpleloginsecure->login($email, $password);
                        $this->session->set_userdata(array('logged_in' => FALSE));

                        $data['check_val'] = $check_val;
                        
                        if ($check_val == FALSE) 
                        {
                            $data['error'] = 'Incorrect username or password. Please try again.';
                            $this->load->view('login', $data);
                        }
                        
                        else //successful login
                        {
                            $this->load->model('user_model', 'user');
                            $id = $this->user->get_user_id($email);
                            if ($this->user->check_account_verified($id)) {
                                $this->session->set_userdata(array('logged_in' => TRUE));
                                redirect('user', 'location');
                            }
                            else {
                                $this->session->set_userdata(array('logged_in' => FALSE));
                                $this->load->view('messages/account_not_confirmed');
                            }
                        }
                    }
                }
                
        }
}