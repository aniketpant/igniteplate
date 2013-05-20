<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

  /**
   * Home Page
   * @return view Returns the home page
   */
  public function index()
  {
    $this->template->title('Home');
    $this->template->set_layout('base')->build('standard/main');
  }

  /**
   * Login Page
   * @return view Returns the login page
   */
  public function login()
  {
    $this->template->title('Login');
    $this->template->set_layout('base')->build('standard/login');
  }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */