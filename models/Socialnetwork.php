<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Socialnetwork extends ActiveRecord\Model 
{
  static $validates_uniqueness_of = array(
    array(array('user_id','provider'), 'message' => 'User already is already registered with this provider!'),
    array(array('uid','provider'), 'message' => 'Another user is registered with this account'),
  );
  static $belongs_to = array(
    array('user'),
  );
}

