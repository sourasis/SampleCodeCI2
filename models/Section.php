<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Section extends ActiveRecord\Model 
{
  static $has_many = array(
    array('categories'),
    array('subcategories', 'through' => 'categories' )
  );
  static $belongs_to = array(
    array('image'),
  );

  function get_age_in_minutes()
  {
    return abs(strtotime('now') - strtotime($this->updated_at->format('c')))/(60);
  }

  function refresh_image($image=FALSE)
  {
    if(empty($image))
    {
      $image = Image::section_image($this->id);
    }

    $set = array('updated_at' => date('Y-m-d H:i:s'));
    $set['image_id'] = FALSE;
    if($image) $set['image_id'] = $image->id;
    $where = array('id' => $this->id);
    Section::table()->update($set, $where);

    return $image;
  }

  function get_random_image()
  {
    if($this->age_in_minutes > 5) 
    {
      //Refresh image if it is more than 4 minutes old.
      app_info('Section :'.$this->id.' '.$this->name.' image is '.$this->age_in_minutes.' mins old. Refreshing');

      return $this->refresh_image();
    }
    if(isset($this->image->id)) return $this->image;
    if(!empty($this->image_id) && $this->image_id > 0) return Image::find($this->image_id);
    return FALSE;
  }
  function get_random_image_path()
  {    
    $out = 'assets/images/default_image.png';
    if(!$this->random_image) return $out;
    return $this->random_image->url_path;
  }
}

