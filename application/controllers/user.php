<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

  public function login()
  {
    $this->load->library('form_validation');

    $rules = array(
      array(
        'field' => 'user_email',
        'label' => 'Email',
        'rules' => 'required|valid_email|xss_clean'
        ),
      array(
        'field' => 'user_pass',
        'label' => 'Password',
        'rules' => 'required'
        )
      );

    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

    if (!$this->form_validation->run())
    {
      $this->template->title('User Login');
      $this->template->set_layout('base')->build('user/login');
    }
    else
    {
      $identity = $this->input->post('user_email');
      $password = $this->input->post('user_pass');

      if ($this->ion_auth->login($identity, $password, FALSE))
      {
        redirect('user/dashboard', 'location');
      }
      else
      {
        echo "Could not log in";
      }
    }
  }

  public function register()
  {
    $this->load->library('form_validation');

    $rules = array(
      array(
        'field' => 'user_name',
        'label' => 'Username',
        'rules' => 'required|xss_clean'
        ),
      array(
        'field' => 'user_email',
        'label' => 'Email',
        'rules' => 'required|valid_email|xss_clean'
        ),
      array(
        'field' => 'user_pass',
        'label' => 'Password',
        'rules' => 'required'
        ),
      array(
        'field' => 'pass_conf',
        'label' => 'Password Confirmation',
        'rules' => 'required|matches[user_pass]'
        )
      );

    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

    if (!$this->form_validation->run())
    {
      $this->template->title('User Register');
      $this->template->set_layout('base')->build('user/register');
    }
    else
    {
      $username = $this->input->post('user_name');
      $password = $this->input->post('user_pass');
      $email = $this->input->post('user_email');

      if (!$this->ion_auth->email_check($email))
      {
        if ($this->ion_auth->register($username, $password, $email, array()))
        {
          redirect('user/login', 'location');
        }
      }
      else
      {
        echo "Email already registered";
      }
    }
  }

  public function dashboard()
  {
    $this->template->title('User Dashboard');
    $this->template->set_layout('base')->build('user/dashboard');
  }

  public function logout()
  {
    $this->ion_auth->logout();
    redirect('main', 'location');
  }

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */