<?php
if ($this->session->userdata('logged_in'))   
{
    $links = array(
        0 => site_url().'/user',
        1 => site_url().'/user/profile',
        2 => site_url().'/user/logout'
        );
    
    $links_text = array(        
        0 => 'Dashboard',
        1 => 'Profile',
        2 => 'Logout'
        );
}
else 
{
     $links = array(
        0 => site_url().'/main',
        1 => site_url().'/main/sample',
        2 => site_url().'/main/register',
        3 => site_url().'/main/login'
        );
    
    $links_text = array(        
        0 => '<i class="icon-home"></i>&nbsp;Home',
        1 => '<i class="icon-star-empty"></i>&nbsp;Sample Page',
        2 => '<i class="icon-cog"></i>&nbsp;Register',
        3 => '<i class="icon-pencil"></i>&nbsp;Login'
        );
}
?>
