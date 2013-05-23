<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {

  /**
   * Install Page
   * @return view Returns the installation page
   */
  public function index()
  {
    $this->load->library('form_validation');

    $rules = array(
      array(
        'field' => 'db_host',
        'label' => 'Database Host',
        'rules' => 'required|xss_clean'
        ),
      array(
        'field' => 'db_name',
        'label' => 'Database Name',
        'rules' => 'required|xss_clean'
        ),
      array(
        'field' => 'db_user',
        'label' => 'Database User',
        'rules' => 'required|xss_clean'
        ),
      array(
        'field' => 'db_pass',
        'label' => 'Database Password',
        'rules' => 'required|xss_clean'
        )
      );

    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

    if (!$this->form_validation->run())
    {
      $this->template->title('Install');
      $this->template->set_layout('base')->build('install/install');
    }
    else
    {
      $config = array(
        'hostname' => $this->input->post('db_host'),
        'username' => $this->input->post('db_user'),
        'password' => $this->input->post('db_pass'),
        'database' => $this->input->post('db_name'),
        );

      $this->load->model('install_model');

      if (!$this->load->database())
      {
        if ($this->install_model->write_config($config))
        {
          log_message('info', 'Config file written.');
        }
        else
        {
          log_message('info', 'Config file could not be written.');
        }
      }

      $this->template->title('Installation Success');
      $this->template->set_layout('base')->build('install/success');
    }
  }

}

/* End of file install.php */
/* Location: ./application/controllers/install.php */