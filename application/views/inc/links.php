<?php
if ($this->session->userdata('logged_in'))   
{
    $links = array(
        0 => site_url()."/home/dashboard",
        1 => site_url()."/home/profile",
        3 => site_url()."/home/logout"
        );
    
    $links_text = array(        
        0 => "Dashboard",
        1 => "Profile",
        3 => "Logout"
        );
}
else 
{
     $links = array(
        0 => site_url()."/main",
        1 => site_url()."/main/about",
        2 => site_url()."/main/register",
        3 => site_url()."/main/login"
         );
    
    $links_text = array(        
        0 => "Home",
        1 => "About",
        2 => "Register",
        3 => "Login"
        );
}
?>
