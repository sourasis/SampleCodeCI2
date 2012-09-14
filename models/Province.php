<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Province extends ActiveRecord\Model 
{
  static $has_many = array(
    array('cities')
  );

  static $belongs_to = array(
    array('region')
  );

  static function find_assoc($params=FALSE)
  {
    if($params)
      $provinces = self::find('all', $params);
    else
      $provinces = self::find('all');
    $out = array();
    foreach($provinces as $province) $out[$province->id] = $province->name;
    return $out;
  }
}

