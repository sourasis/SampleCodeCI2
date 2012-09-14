<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Category extends ActiveRecord\Model 
{
  static $has_many = array(
    array('subcategories')
  );

  static $belongs_to = array(
    array('section')
  );

}

