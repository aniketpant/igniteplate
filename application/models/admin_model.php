<?php

class Admin_model extends CI_Model {
        
        function __construct() {
            
                parent::__construct();
                
        }
        
        function update_site_name($site_name) {
            
                $this->db->where('setting', 'site_name');
                $this->db->update('admin_settings', array('value' => $site_name));
                
        }
        
        function make_admin($id) {
            
                $result = $this->db->get_where('user_roles', array('user_master_iduser_roles' => $id));
                if (!$result->first_row()->user_role) {
                    $this->db->where('user_master_iduser_roles', $id);
                    $this->db->update('user_roles', array('user_role' => 3));
                }
                
        }
        
        function check_guest_account_exist() {
            
                $result = $this->db->get_where('user_master', array('user_name' => 'guest'));
                return ($result->num_rows())?TRUE:FALSE;
                
        }
        
    }

?>