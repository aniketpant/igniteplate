<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
            'login' => 
                array(
                    array(
                        'field'   => 'email',
                        'label'   => 'Email',
                        'rules'   => 'xss_clean|required|valid_email'
                      ),
                    array(
                        'field'   => 'password',
                        'label'   => 'Password',
                        'rules'   => 'xss_clean|required'
                      )
            ),
            'signup' => 
                array(
                    array(
                        'field'   => 'email',
                        'label'   => 'Email',
                        'rules'   => 'xss_clean|required|valid_email'
                      ),
                    array(
                        'field'   => 'password',
                        'label'   => 'Password',
                        'rules'   => 'xss_clean|required|matches[passconf]|min_length[6]'
                      ),
                    array(
                        'field'   => 'passconf',
                        'label'   => 'Confirm Password',
                        'rules'   => 'xss_clean|required'
                    )
            ),
            'forgot_password'   =>
                array(
                    array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'xss_clean|is_email|required'
                    )
                )
        );

/* End of file form_validation.php */
/* Location: /application/config/form_validation.php */ 