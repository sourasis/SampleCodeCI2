<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class City extends ActiveRecord\Model 
{
  static $has_many = array(
    array('advertisements')
  );

  static $belongs_to = array(
    array('province')
  );

  static function find_assoc($params=FALSE)
  {
    if($params)
      $cities = self::find('all', $params);
    else
      $cities = self::find('all');
    $out = array();
    foreach($cities as $city) $out[$city->id] = $city->name;
    return $out;
  }
}

