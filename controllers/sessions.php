<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->twitter_config = array(
      'key' => 'nIp5A3LTeN95y9VNzm8ETA',
      'secret' => 'T8xtdRgR5rc4WWqy7ajLkeiPVPCIkOVKz7EnKYZ341Q'
    );
    $this->facebook_config = array(
      'id' => '425057324213186',
      'secret' => '8f563ceb783448003c734507f4402e8e',
      'scope' => array('publish_actions'),
    );

    $this->data['errors'] = array();
    $this->data['_c_tab'] = 'social';

  }

  function index()
  {
    $msg = $this->session->flashdata('message').$this->session->flashdata('error');
    if(strlen($msg) < 1) 
    {
      $this->data['message'] = anchor('/', 'Please continue to the home page.');
    }
    $this->load->view('sessions/index', $this->data);
  }


  function profile()
  {
    $this->_require_user();
    if($this->data['current_user']->activated != 1)
      redirect('/auth/send_again/');
    $this->data['current_user']->update_attributes(array('profile_set' => TRUE));
    $this->data['captcha_registration'] = $this->config->item('captcha_registration', 'tank_auth');
    $this->data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
    $this->data['user'] =  $this->data['current_user'];
    $this->data['userprofile'] = UserProfile::find_by_user_id($this->data['current_user']->id);
    $this->load->view('sessions/profile', $this->data);
  }

  function create_profile()
  {
    return show_404();

    $this->_require_user();

    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $user_id = $this->data['current_user']->id;

    $this->form_validation->set_rules('postalcode', 'Postal Code', 'trim|required|xss_clean');
    $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
    $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|xss_clean');
    $this->form_validation->set_rules('skype', 'Skype', 'trim|required|xss_clean');

    $this->_validate_captcha();

    if ($this->form_validation->run())
    {// validation ok
      //fixme: Shift to php activerecord
      $profile = UserProfile::find_by_user_id($user_id);
      $profile->update_attributes(array(
        'postalcode' => $this->form_validation->set_value('postalcode'),
        'city' => $this->form_validation->set_value('city'),
        'telephone' => $this->form_validation->set_value('telephone'),
        'skype' => $this->form_validation->set_value('skype')  
      ));

    } 
    else 
    {
      $errors = $this->tank_auth->get_error_message();
      foreach ($errors as $k => $v)	$this->data['errors'][$k] = $this->lang->line($v);
    }
    $this->data['captcha_registration'] = $this->config->item('captcha_registration', 'tank_auth');
    $this->data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
    $this->data['user'] =  $this->data['current_user'];
    $this->data['userprofile'] = UserProfile::find_by_user_id($this->data['current_user']->id);
    $this->load->view('sessions/profile', $this->data);
  }



  function create_share()
  {
    $this->_require_user();

    $this->load->library('Share');
    $this->form_validation->set_rules('sharecontent', 'Social message', 'trim|required|xss_clean');
    $this->form_validation->set_rules('fbcheckbox', 'Facebook', 'integer');
    $this->form_validation->set_rules('twittercheckbox', 'Twitter', 'integer');
    if ($this->form_validation->run())
    {
      $message = '';
      $error = '';

      $post = array(
          'text' =>  $this->form_validation->set_value('sharecontent'),
          'url' => base_url('/'),
          'heading' => 'Join me on Clicbye',
          'description' => 'Clicbye is an up and coming local advertisements portal',
          'hashtag' => 'clicbye',
        );
      $twitter_user = $this->data['current_user']->twitter_details();
      $facebook_user = $this->data['current_user']->facebook_details();

      if($this->form_validation->set_value('twittercheckbox') == 1) 
      {
        if($twitter_user)
        {
        $result = $this->share->twitter_post($post, $this->twitter_config,  $twitter_user);
        if($result['error']) 
          $error .= htmlentities($result['error']);
        else
          $message .= ' Successfully shared on twitter.';
        }
        else
        {
          $error .= anchor('/sessions/twitter/', 'Click here to connect to Twitter.').'<br>';
        }
      }

      if($this->form_validation->set_value('fbcheckbox') == 1) 
      {
        if($facebook_user)
        {
        $result = $this->share->facebook_post($post, $this->facebook_config, $facebook_user);
        if($result['error']) 
          $error .= htmlentities($result['error']);
        else
          $message .= ' Successfully shared on facebook.';
        }
        else
        {
          $error .= anchor('/sessions/facebook/', 'Click here to connect to Facebook.').'<br>';
        }
      }

      if(strlen($message.$error) < 1)
        $error = 'Please choose atleast one of facebook or twitter';

      $this->_flash_now($message, FALSE);
      $this->_flash_error_now($error, TRUE);
    } 

    $this->data['captcha_registration'] = $this->config->item('captcha_registration', 'tank_auth');
    $this->data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
    $this->data['user'] =  $this->data['current_user'];
    $this->data['userprofile'] = UserProfile::find_by_user_id($this->data['current_user']->id);
    $this->load->view('sessions/profile', $this->data);
  }

  function create_corporate()
  {
    $this->_require_user();
    $this->data['_c_tab'] = 'corporation';

    $this->load->library('tank_auth');
    $this->lang->load('tank_auth');
    $user_id = $this->data['current_user']->id;

    $this->form_validation->set_rules('corp_biz_name', 'Organization Name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('corp_contactperson', 'Contact Person', 'trim|required|xss_clean');
    $this->form_validation->set_rules('corp_address', 'Address', 'trim|required|xss_clean');
    $this->form_validation->set_rules('corp_telephone', 'Telephone', 'trim|xss_clean');
    $this->form_validation->set_rules('corp_fax', 'Fax', 'trim|xss_clean');
    $this->form_validation->set_rules('corp_website', 'Website', 'trim|xss_clean');
    $this->form_validation->set_rules('postalcode', 'Website', 'trim|xss_clean');
    $this->form_validation->set_rules('city', 'Website', 'trim|xss_clean');
    $this->form_validation->set_rules('corp_biz_description', 'Organization Description', 'trim|required|xss_clean');

    //$this->_do_upload('',500); // NOT WORKING !

    $this->_validate_captcha();

    if ($this->form_validation->run())
    {// validation ok
      $update_rows = array(
        'corporation' => 1,        
        'corp_biz_name' => $this->form_validation->set_value('corp_biz_name'),
        'corp_contactperson' => $this->form_validation->set_value('corp_contactperson'),
        'corp_address' => $this->form_validation->set_value('corp_address'),
        'corp_telephone' => $this->form_validation->set_value('corp_telephone'),
        'corp_fax' => $this->form_validation->set_value('corp_fax'),
        'corp_website' => $this->form_validation->set_value('corp_website'),
        'postalcode' => $this->form_validation->set_value('postalcode'),
        'city' => $this->form_validation->set_value('city'),
        'corp_biz_description' => $this->form_validation->set_value('corp_biz_description'),
      );
      $where = array('user_id'=>$user_id);

      UserProfile::table()->update($update_rows,$where);

    } 
    else 
    {
      $errors = $this->tank_auth->get_error_message();
      foreach ($errors as $k => $v)	$this->data['errors'][$k] = $this->lang->line($v);
    }

    $this->data['captcha_registration'] = $this->config->item('captcha_registration', 'tank_auth');
    $this->data['use_recaptcha'] = $this->config->item('use_recaptcha', 'tank_auth');
    $this->data['user'] =  $this->data['current_user'];
    $this->data['userprofile'] = UserProfile::find_by_user_id($this->data['current_user']->id);
    $this->load->view('sessions/profile', $this->data);
  }


  function facebook()
  {
    $this->load->spark('oauth2/0.4.0');

    $provider = $this->oauth2->provider('facebook', $this->facebook_config);
    if ( ! $this->input->get('code'))
    {
      // By sending no options it'll come back here
      $url = $provider->authorize();

      redirect($url);
    }
    else
    {
      try
      {
        // Have a go at creating an access token from the code
        $token = $provider->access($_GET['code']);

        // Use this object to try and get some user details (username, full name, etc)
        $user = $provider->get_user_info($token);
      }
      catch (OAuth2_Exception $e)
      {
        log_message('error', 'Facebook oauth2 failed: '. $e->getMessage());
        $this->_exit('Facebook login failed. Please try again.');
      }
      $this->_login_or_register_facebook($user, $token);
    }
  }



  function twitter()
  {
    try 
    {
      $this->load->spark('oauth/0.3.1');
      $consumer = $this->oauth->consumer($this->twitter_config);
      $provider = $this->oauth->provider('twitter');
      $callback = site_url('sessions/twitter_callback');

      $consumer->callback($callback); 
      $token = $provider->request_token($consumer);
      $this->session->set_userdata('twitter_oauth_token', base64_encode(serialize($token)));
      $url = $provider->authorize($token, array(
        'oauth_callback' => $callback,
      ));
    } 
    catch (Exception $e) 
    {
      log_message('error', 'Twitter oauth failed: '. $e->getMessage());
      $this->_exit('Twitter login failed. Please try again.');
    }
    redirect($url);
  }

  function twitter_callback()
  {
    try 
    {
      $this->load->spark('oauth/0.3.1');
      $consumer = $this->oauth->consumer($this->twitter_config);
      $provider = $this->oauth->provider('twitter');

      if (!$this->session->userdata('twitter_oauth_token') || !$this->input->get_post('oauth_token') )
      {
        log_message('error', 'Twitter callback called without enough data');
        $this->_exit('Tiemporary twitter login error.  Please try agian!');
      }
      $token = unserialize(base64_decode($this->session->userdata('twitter_oauth_token')));
      if ( ! empty($token) AND $token->access_token !== $this->input->get_post('oauth_token'))
      {   
        $this->session->unset_userdata('oauth_token');
        $this->_exit('Invalid infomation received from Twitter.  Please try again.');
      }

      $verifier = $this->input->get_post('oauth_verifier');
      $token->verifier($verifier);

      $token = $provider->access_token($consumer, $token);
      $user = $provider->get_user_info($consumer, $token);

    } 
    catch (Exception $e) 
    {
      log_message('error', 'Twitter oauth failed: '. $e->getMessage());
      $this->_exit('Twitter login failed. Please try again.');
    }
    $this->_login_or_register_twitter($user, $token);
  }


  function _login_or_register_facebook($facebook_user, $token)
  {
    $user = Socialnetwork::find_by_uid_and_provider($facebook_user['uid'], 'facebook');
    if($user) $user = $user->user;

    if($user && $this->data['current_user'])
    {
      if($user->id != $this->data['current_user']->id) 
      {
        $this->_flash_error('You are already logged in as a different user.  Please logout to continue login as '.$facebook_user['nickname']);
        redirect('/');
      }
      $user = $this->data['current_user'];
      $this->_flash('You are already logged in.');
    } 

    if ($user AND $user->id) 
    {
      $this->_login($user);
    }
    else
    {
      $user = new User();
      if($this->data['current_user'])
      {
        $user = $this->data['current_user'];
        $this->_flash("Associated Facebook user '".$facebook_user["nickname"]."' with your account. ");
      }
      $user->activated = TRUE;
      $user->save();
      $user->facebook_modify($facebook_user, $token);
      $profile = new UserProfile();
      $profile->user_id = $user->id;
      $profile->save();
      if($user->is_valid()) 
      {
        $this->_login($user);
      } 
      else 
      {
        log_message('error', 'User: '. $user->to_json(array('except' => 'password') )."
          Errors: ".print_r($user->errors, TRUE));
        $this->_exit('message', 'Failed to register user.');
      }
    }
  }



  function _login_or_register_twitter($twitter_user, $token)
  {
    $user = Socialnetwork::find_by_uid_and_provider($twitter_user['uid'], 'twitter');
    if($user) $user = $user->user;

    if($user && $this->data['current_user'])
    {
      if($user->id != $this->data['current_user']->id) 
      {
        $this->_flash_error('You are already logged in as a different user.  Please logout to continue login as '.$twitter_user['nickname']);
        redirect('/');
      }
      $user = $this->data['current_user'];
      $this->_flash('You are already logged in.');
    } 

    if ($user AND $user->id) 
    {
      $this->_login($user);
    }
    else
    {
      $user = new User();
      if($this->data['current_user'])
      {
        $user = $this->data['current_user'];
        $this->_flash("Associated '@".$twitter_user["nickname"]."' with your account. ");
      }
      $user->activated = TRUE;
      $user->save();
      $user->twitter_modify($twitter_user, $token);
      $profile = new UserProfile();
      $profile->user_id = $user->id;
      $profile->save();
      if($user->is_valid()) 
      {
        $this->_login($user);
      } 
      else 
      {
        log_message('error', 'User: '. $user->to_json(array('except' => 'password') )."
          Errors: ".print_r($user->errors, TRUE));
        $this->_exit('message', 'Failed to register user.');
      }
    }
  }

  /*
   * Assumes user is a valid loaded model object
   */

  function _login($user) 
  { 
    if ($user->banned == 1) 
    {		
      $this->error = array('banned' => $user->ban_reason);
      $this->_exit('You have been banned - '.$user->ban_reason);
    } 
    else 
    {
      $this->session->set_userdata(array(
        'user_id'	=> $user->id,
        'username'	=> $user->username,
        'status'	=> ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
      ));
      $this->load->model('tank_auth/users');
      $this->users->update_login_info(
        $user->id,
        $this->config->item('login_record_ip', 'tank_auth'),
        $this->config->item('login_record_time', 'tank_auth')
      );
      redirect('/');
    }
  }

  function _exit($message)
  {
    log_message('info', $message);
    $this->session->set_flashdata('message', $message);
    redirect('/');
  }


  function _validate_captcha()
  {
    $captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
    $use_recaptcha = $this->config->item('use_recaptcha', 'tank_auth');

    if ($captcha_registration) 
    {
      if ($use_recaptcha) 
      {
        $this->form_validation->set_rules('recaptcha_response_field', 'Confirmation Code', 'trim|xss_clean|required|callback__check_recaptcha');
      } 
      else 
      {
        $this->form_validation->set_rules('captcha', 'Confirmation Code', 'trim|xss_clean|required|callback__check_captcha');
      }
    }
  }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
