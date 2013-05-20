<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

  /**
   * Standard Page
   * @return view Returns the standard page
   */
  public function index($page_name)
  {
    $this->output->cache(3600);
    $this->template->title($page_name);
    $this->template->set_layout('base')->build('page/'.$page_name);
  }

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */