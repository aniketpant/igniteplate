<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

  public function index()
  {
    $this->template->title('Home');
    // $this->template->set($this->load->view('standard/main'), $body);
    $this->template->set_layout('base')->build('standard/main');
  }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
