<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
            'standard/login' => 
            array(
                array(
                    'field'   => 'user_name',
                    'label'   => 'Username',
                    'rules'   => 'xss_clean|required'
                  ),
                array(
                    'field'   => 'password',
                    'label'   => 'Password',
                    'rules'   => 'xss_clean|required'
                  )
            ),
            'standard/signup' => 
            array(
                array(
                    'field'   => 'user_name',
                    'label'   => 'Username',
                    'rules'   => 'xss_clean|required'
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
            'standard/forgot_password' =>
            array(
                array(
                    'field' => 'user_name',
                    'label' => 'Username',
                    'rules' => 'xss_clean|is_email|required'
                )
            ),
            'standard/change_password' =>
            array(
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
            'admin/settings' =>
            array(
                array(
                    'field' => 'site_name',
                    'label' => 'Site Name',
                    'rules' => 'xss_clean|required'
                )
            ),
        );

/* End of file form_validation.php */
/* Location: /application/config/form_validation.php */ 