<?php
    class activitymodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function check_email_exists($email) {
                $result = $this->db->get_where('user_master', array('email' => $email));
                if ($result->num_rows()) {
                    return TRUE;
                } 
                else {
                    return FALSE;
                }
        }
        
        function check_account_verified($email) {
                $result = $this->db->get_where('user_master', array('email' => $email));
                $id = $result->row(0)->id;
                $result_new = $this->db->get_where('user_verify', array('user_master_iduser_master' => $id));
                $account_verified = $result_new->row(0)->account_verified;
                if ($account_verified == 0) {
                    return FALSE;
                }
                else {
                    return TRUE;
                }
        }
        
        function generate_verification_key($email) {
                $result = $this->db->get_where('user_master', array('email' => $email));
                $verification_key = md5($email);
                $id = $result->row(0)->id;
                $data = array(
                    'verification_key'          => $verification_key,
                    'account_verified'          => 0,
                    'user_master_iduser_master' => $id
                );
                $this->db->insert('user_verify', $data);
        }
        
        function send_mail_to_user($email) {
                $result = $this->db->get_where('user_master', array('email' => $email));
                $id = $result->row(0)->id;
                $result_new = $this->db->get_where('user_verify', array('user_master_iduser_master' => $id));
                $verification_key = $result_new->row(0)->verification_key;
                
                /*
                 * Configure this part
                 */
                
                $this->load->library('email');

                $this->email->from('your@example.com', 'Your Name');
                $this->email->to($email);
                
                $message = 'Click the following link to confirm your registration.<br/>';
                
                $this->email->subject('igniteplate - Account Verification');
                $this->email->message($message);

                $this->email->send();

                echo $this->email->print_debugger();
        }
        
        function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=true, $include_numbers=true, $include_special_chars=true)
        {
            $length = rand($chars_min, $chars_max);
            $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
            if($include_numbers) {
                $selection .= "1234567890";
            }
            if($include_special_chars) {
                $selection .= "!@\"#$%&[]{}?|";
            }

            $password = "";
            for($i=0; $i<$length; $i++) {
                $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
                $password .=  $current_letter;
            }                

            return $password;
        }
        
    }

?>