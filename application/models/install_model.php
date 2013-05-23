<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install_model extends CI_Model {

  function __construct()
  {
  }

  /**
   * Sets the provided values to the config keys under ./application/config/database.php
   * @param  array $config Contains the key and value for the config file
   * @return bool
   */
  function write_config($config)
  {
    $fields = array(
      'hostname',
      'username',
      'password',
      'database',
      );

    $data = read_file('./private/database-sample.php');
    $file = APPPATH.'config/database.php';

    foreach ($fields as $item)
    {
      $data = str_replace('__'.strtoupper($item).'__', mysql_real_escape_string($config[$item]), $data);
    }
    if (write_file($file, $data))
    {
      $message = 'Database configuration file was written!';
      @chmod($file, FILE_READ_MODE);
      {
        if (is_really_writable($file))
        {
          $message = 'The database configuration is still writable, make sure to set permissions to <code>0644</code>!';
        }
      }
      return TRUE;
    }
    else
    {
      $message = 'Could not write the database configuration file!';
      return FALSE;
    }
    log_message('info', $message);
  }

}

/* End of file install_model.php */
/* Location: ./application/models/install_model.php */