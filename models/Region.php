<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Region extends ActiveRecord\Model 
{
  static $has_many = array(
    array('provinces')
  );

  static function find_assoc($params=FALSE)
  {
    if($params)
      $regions = self::find('all', $params);
    else
      $regions = self::find('all');
    $out = array();
    foreach($regions as $region) $out[$region->id] = $region->name;
    return $out;
  }
}

