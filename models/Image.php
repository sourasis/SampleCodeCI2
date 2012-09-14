<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Image extends ActiveRecord\Model 
{
  static $belongs_to = array(
      array('advertisement'),
      array('user')
    );

  static $validates_presence_of = array(
        array('file_name'),
    );


  static function section_image($section_id)
  {
    return self::first(array(
      'joins' => array(
        'INNER JOIN advertisements a ON(advertisement_id = a.id)',
        'INNER JOIN subcategories s ON(s.id = a.subcategory_id)',
        'INNER JOIN categories c ON(c.id = s.category_id)',
        'INNER JOIN sections n ON(n.id = c.section_id)',),
      'conditions'=> array(' n.id = ?', $section_id),
      'order' => ' RAND()', 
    ));
  }


  function get_url_path()
  {
    return $this->file_path.$this->file_name;
  }

}
