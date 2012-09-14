<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Carmodel extends ActiveRecord\Model 
{
  static $has_many = array(
    array('advertisements')
  );

  static $belongs_to = array(
    array('carbrand')
  );

  static function find_assoc($params=FALSE)
  {
    if($params)
      $carmodels = self::find('all', $params);
    else
      $carmodels = self::find('all');
    $out = array();
    foreach($carmodels as $cmodel) $out[$cmodel->id] = $cmodel->name;
    return $out;
  }

  static function find_brand_model_combo()
  {
    $carmodels = self::find('all',array(
      'readonly' => true,
      'include' => array('carbrand')
    ));

    $out = array();
    foreach($carmodels as $cmodel) $out[$cmodel->id] = $cmodel->carbrand->name." - ".$cmodel->name;
    return $out;
  }
}

