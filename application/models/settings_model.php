<?php

class Settings_model extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function get_site_name() {
            $result = $this->db->get_where('admin_settings', array('setting' => 'site_name'));
            $site_name = $result->first_row()->value;
            return $site_name;
        }
        
    }

?>