<?php

/**
 * User Model
 * 
 * All required functions for managing user related tasks
 * 
 * @author  Aniket Pant
 */

class User_model extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        /**
         * Returns user id
         * 
         * @param   Email $email string
         * @return  int
         */
        function get_user_id($email) {
                $result = $this->db->get_where('user_master', array('user_email' => $email));
                $id = $result->first_row()->iduser_master;
                return $id;
        }
        
        /**
         * Checks if given email exists in database
         * 
         * @param   Email $email string
         * @return  bool
         */
        function check_email_exists($email) {
                $result = $this->db->get_where('user_master', array('user_email' => $email));
                if ($result->num_rows()) {
                    return TRUE;
                } 
                else {
                    return FALSE;
                }
        }
        
        /**
         * Returns user role
         * 
         * @param string $user_name User Name
         * @return int
         */
        function get_user_role($user_name) {
                $id = $this->get_user_id($user_name);
                $result = $this->db->get_where('user_roles', array('user_master_iduser_roles' => $id));
                $user_role = $result->first_row()->user_role;
                return $user_role;
        }
        
        /**
         * Checks if account verified
         * 
         * @param   UserID $id int
         * @return  bool
         */
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
        
        /**
         * Verify user account
         * 
         * @param VerificationKey string $verification_key
         * @return int 
         */
        function verify_account($verification_key) {
                $data = array(
                    'account_verified'  => 1
                );
                $this->db->where('verification_key', $verification_key);
                $result = $this->db->update('user_verify', $data);
                return $result;
        }
        
        /**
         * Generate verficiation key for user
         * 
         * @param Email string $email
         */
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
        
        /**
         * Sends mail to user
         * 
         * @param Email string $email 
         */
        function send_mail_to_user($email) {
                $result = $this->db->get_where('user_master', array('user_email' => $email));
                $id = $result->first_row()->iduser_master;
                $result_new = $this->db->get_where('user_verify', array('user_master_iduser_master' => $id));
                $verification_key = $result_new->first_row()->verification_key;
                
                /*
                 * Configure this part
                 */
                
                $this->load->library('email');
                
                $this->email->from('borncssed@gmail.com', 'Aniket Pant');
                $this->email->to($email);
                $this->email->reply_to('borncssed@gmail.com', 'Aniket Pant');
                
                $message = 'Click the following link to confirm your registration.<br/><a href="'.site_url().'/user/verify/'.$verification_key.'">'.site_url().'/user/verify/'.$verification_key.'</a>';
                
                $this->email->subject('igniteplate - Account Verification');
                $this->email->message($message);

                $this->email->send();
        }
        
        /**
         * Generates a random password
         * 
         * @param int $chars_min
         * @param int $chars_max
         * @param bool $use_upper_case
         * @param bool $include_numbers
         * @param bool $include_special_chars
         * @return string 
         */
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