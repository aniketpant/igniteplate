<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

  public function index()
  {
    $data['page_title'] = 'Home';
    $this->load->view('standard/main', $data);
  }

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
