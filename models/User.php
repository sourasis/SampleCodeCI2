<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends ActiveRecord\Model 
{
  static $has_one = array(
    array('user_profile'),
    array('facebook', 'class_name' => 'Socialnetwork', 'conditions' => array('provider = ?', 'facebook')),
    array('twitter', 'class_name' => 'Socialnetwork', 'conditions' => array('provider = ?', 'twitter'))
  );

  static $has_many = array(
    array('socialnetworks')
  );

  function facebook_details()
  {
    if(!$this->facebook) return FALSE;
    return array(
      'uid' => $this->facebook->uid,
      'access_token' => $this->facebook->access_token,
      'expires' => $this->facebook->expires,
      'display' => $this->facebook->handle,
      'name' => $this->facebook->name,
    );
  }

 
  function facebook_modify($facebook_user, $token) 
  {
    $params = array(
      'provider' => 'facebook',
      'user_id' => $this->id,
      'uid' => $facebook_user['uid'],
      'access_token' => $token->access_token,
      'expires' => $token->expires,
      'name' => $facebook_user['name'],
      'handle' => $facebook_user['nickname'],
      'email' => $facebook_user['email'],
      'location' => $facebook_user['location'],
      'image' => $facebook_user['image'],
    );

    $facebook = $this->facebook;
    if(empty($facebook)) 
    {
      $facebook = $this->create_socialnetwork($params);
    }
    else
    {
      $facebook->update_attributes($facebook);
    }
    if($facebook->is_invalid()) throw new Exception('Invalid facebook information');
  }

  function twitter_details()
  {
    if(!$this->twitter) return FALSE;
    return array(
      'uid' => $this->twitter->uid,
      'access_token' => $this->twitter->access_token,
      'secret' => $this->twitter->secret,
      'display' => '@'.$this->twitter->handle,
      'name' => $this->twitter->name,
    );
  }

  function twitter_modify($twitter_user, $token) 
  {
    $params = array(
      'provider' => 'twitter',
      'user_id' => $this->id,
      'uid' => $twitter_user['uid'],
      'access_token' => $token->access_token,
      'secret' => $token->secret,
      'name' => $twitter_user['name'],
      'handle' => $twitter_user['nickname'],
      'location' => $twitter_user['location'],
      'image' => $twitter_user['image'],
    );

    $twitter = $this->twitter;
    if(empty($twitter)) 
    {
      $twitter = $this->create_socialnetwork($params);
    }
    else
    {
      $twitter->update_attributes($twitter);
    }
    if($twitter->is_invalid()) throw new Exception('Invalid twitter information');

  }

  function display_name()
  {
    $name = '';
    if(strlen($name) < 1 ) $name = $this->name;
    if(strlen($name) < 1 AND !empty($this->twitte)) $name = '@'.$this->twitter->handle;
    if(strlen($name) < 1 ) $name = $this->email;

    return $name;
  }

}

