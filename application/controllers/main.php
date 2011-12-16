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
                $data['page_title'] = 'register';
		$this->load->view('register', $data);
	}  
        
	public function login()
	{
                $data['page_title'] = 'login';
		$this->load->view('login', $data);
        }
}