<?php

class User_model extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function get_user_id($email) {
                $result = $this->db->get_where('user_master', array('user_email' => $email));
                $id = $result->first_row()->iduser_master;
                return $id;
        }
        
        function check_email_exists($email) {
                $result = $this->db->get_where('user_master', array('user_email' => $email));
                if ($result->num_rows()) {
                    return TRUE;
                } 
                else {
                    return FALSE;
                }
        }
        
        function check_account_verified($id) {
                $result = $this->db->get_where('user_verify', array('user_master_iduser_master' => $id));
                if ($result->num_rows()) {
                    $account_verified = $result->first_row()->account_verified;
                    if ($account_verified == 0) {
                        return FALSE;
                    }
                    else {
                        return TRUE;
                    }
                }
                else {
                    return FALSE;
                }
        }
        
        function verify_account($verification_key) {
                $data = array(
                    'account_verified'  => 1
                );
                $this->db->where('verification_key', $verification_key);
                $result = $this->db->update('user_verify', $data);
                return $result;
        }
        
        function generate_verification_key($email) {
                $result = $this->db->get_where('user_master', array('user_email' => $email));
                $verification_key = md5($email);
                $id = $result->first_row()->iduser_master;
                $data = array(
                    'verification_key'          => $verification_key,
                    'account_verified'          => 0,
                    'user_master_iduser_master' => $id
                );
                $this->db->insert('user_verify', $data);
        }
        
        function send_mail_to_user($email) {
                $result = $this->db->get_where('user_master', array('user_email' => $email));
                $id = $result->first_row()->iduser_master;
                $result_new = $this->db->get_where('user_verify', array('user_master_iduser_master' => $id));
                $verification_key = $result_new->first_row()->verification_key;
                
                /*
                 * Configure this part
                 */
                
                $this->load->library('email');
               
                $email_config['useragent'] = 'igniteplate';
                $email_config['protocol'] = 'sendmail';
                $email_config['mailpath'] = '/usr/sbin/sendmail';
                $email_config['charset'] = 'iso-8859-1';
                $email_config['wordwrap'] = TRUE;
                $email_config['mailtype'] = 'html';

                $this->email->initialize($email_config);
                
                $this->email->from('your@example.com', 'Your Name');
                $this->email->to($email);
                
                $message = 'Click the following link to confirm your registration.<br/><a href="'.site_url().'/user/verify/'.$verification_key.'">'.site_url().'/user/verify/'.$verification_key.'</a>';
                
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