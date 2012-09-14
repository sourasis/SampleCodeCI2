<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class UserProfile extends ActiveRecord\Model 
{
  static $belongs_to = array(
    array('user')
  );

  function get_corp_logopath()
  {
    return 'assets/images/img-slide3.jpg';
  }
}

