<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Subcategory extends ActiveRecord\Model 
{
  static $belongs_to = array(
    array('category'),
    array('section', 'through'=>'category')
  );
  static $has_many = array(
    array('advertisements', 'conditions' => array(' draft = ? ', 0) )
  );


}

