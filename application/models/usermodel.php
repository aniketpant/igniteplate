<?php
    class activitymodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function check_email_exists($email) {
                $this->email = $email;
                $result = $this->db->get_where('login_master', array('email' => $this->email));
                if ($result->num_rows()) {
                    return true;
                } 
                else {
                    return false;
                }
        }
    }

?>