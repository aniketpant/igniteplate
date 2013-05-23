<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

  /**
   * Standard Page
   * @return view Returns the standard page
   */
  public function index($page_name)
  {
    $this->output->cache(3600);

    if (file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
    {
      $this->template->title($page_name);
      $this->template->set_layout('base')->build('pages/'.$page_name);
    }
    else
    {
      $this->template->title('Page not found');
      $this->template->set('page_name', $page_name);
      $this->template->set_layout('base')->build('pages/not_found');
    }
  }

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */