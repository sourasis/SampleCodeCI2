<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Carbrand extends ActiveRecord\Model 
{
  static $has_many = array(
    array('carmodels')
  );

  static function find_assoc($params=FALSE)
  {
    if($params)
      $carbrands = self::find('all', $params);
    else
      $carbrands = self::find('all');
    $out = array();
    foreach($carbrands as $cbrand) $out[$cbrand->id] = $cbrand->name;
    return $out;
  }
}

