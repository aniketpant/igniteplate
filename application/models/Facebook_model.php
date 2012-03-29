<?php

class Facebook_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$config = array(
                        'appId'  => '313118635422066',
                        'secret' => '7d2b109d50df903c43f78bfbf0d4128f',
                        'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
                );

		$this->load->library('Facebook', $config);

		$user = $this->facebook->getUser();

		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.
		$profile = null;
		if($user)
		{
			try {
			    // Proceed knowing you have a logged in user who's authenticated.
				$profile = $this->facebook->api('/me?fields=id,name,link,email');
			} catch (FacebookApiException $e) {
				error_log($e);
			    $user = null;
			}
		}

		$fb_data = array(
                        'me' => $profile,
                        'uid' => $user,
                        'loginUrl' => $this->facebook->getLoginUrl(
                                array(
                                        'scope' => 'email,user_birthday,publish_stream', // app permissions
                                        'redirect_uri' => '' // URL where you want to redirect your users after a successful login
                                )
                        ),
                        'logoutUrl' => $this->facebook->getLogoutUrl(),
                );

		$this->session->set_userdata('fb_data', $fb_data);
	}
}

?>