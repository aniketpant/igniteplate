<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
                $data['page_title'] = 'Home';
		$this->load->view('main', $data);
	}  
        
	public function about()
	{
                $data['page_title'] = 'About';
		$this->load->view('about', $data);
	}  
        
	public function register()
	{
                $this->form_validation->set_error_delimiters('<div class="alert-message error">', '</div>');
                $data['error'] = NULL;
                if ($this->form_validation->run('signup') == FALSE) //validate registration data
                {
                    $this->load->view('register', $data);
		}
                else 
                {
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    
                    //check if email already registered.
                    $this->load->model('usermodel', 'user');
                    $check_val = $this->user->check_email_exists($email);
                    
                    if( is_true($checkval) ) //email address found
                    {
                        $data['error'] = "This email address is already registered with us!";
                        $this->load->view('register', $data);
                    }
                    
                    else // proceed with registration
                    {
                        $registration_val = $this->simpleloginsecure->create($email, $password);
                        if (is_true($registration_val) ) {
                            $this->load->view('registration_success');
                        }
                        else {
                            $this->load->view('registration_problem');
                        }
                    }
                }
	}  
        
	public function login()
	{
                if ( $this->session->userdata('logged_in') == TRUE) 
                {
                    redirect('home/index', 'location');
                }
                else
                {      
                    $data['page_title'] = 'Login';
                    $data['error'] ="";
                    //$data['logged_in'] = $this->session->userdata('logged_in');
                    
                    $this->form_validation->set_error_delimiters('<div class="alert-message error"><a class="close" href="#">×</a><p>', '</p></div>');
                    
                    if ($this->form_validation->run('login') == FALSE) //present and validate login form
                    {
                        
                        $this->load->view('login', $data);
                    }
                    else
                    {
                        $email = $this->input->post('email');
                        $password = $this->input->post('password');
                        
                        $check_val = $this->simpleloginsecure->login($email, $password);

                        if ($check_val == FALSE) 
                        {
                            $data['error'] = "Incorrect username or password. Please try again.";
                            $this->load->view('login', $data);
                        }

                        else //successful login
                        {
                            $this->load->view('dashboard');
                        }
                    }
                }
        }
}