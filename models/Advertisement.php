<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Advertisement extends ActiveRecord\Model 
{
  static $belongs_to = array(
    array('subcategory'),
    array('user'),
    array('city'),
    array('carmodel'),
  );

  static $after_save = array('post_save'); 

  static $validates_presence_of = array(
    array('user_id'), 
    array('subcategory_id'), 
    array('title'), 
    array('city_id'),
    array('want_or_offer', 'message' => 'Please select at least one.'), 
    array('price_type',  'message' => 'Please select at least one'),
  );

  static $validates_numericality_of = array(
    array('user_id', 'only_integer'=> TRUE, 'greater_than' => 0),
    array('city_id', 'only_integer'=> TRUE, 'greater_than' => 0),
    array('subcategory_id', 'only_integer'=> TRUE, 'greater_than' => 0),
  );

  public function validate() 
  {
    if($this->price_type == 'custom' && !preg_match('/^[\d\.]+$/', trim($this->price)))
      $this->errors->add('price', "Please correct the price value.");
    foreach( array('description') as $field) {
      if(preg_match('/http:\/\//', $this->$field))
        $this->errors->add($field, "You cannot add a link here.");
    }

  }

  public function has_image()
  {
    //Todo: caching
    if(!$this->id) return FALSE;
    if(Image::count(array('conditions' => array('advertisement_id = ? ', $this->id )) ) > 0 ) return TRUE;
    return FALSE;
  }

  public function post_save()
  {
    $this->update_subcategory_count();
    $this->update_images();
    $this->update_section_image();
  }

  public function update_subcategory_count()
  {
    $this->subcategory->advertisements_count = Advertisement::count(array('conditions' => array('subcategory_id = ? AND draft = ? ', $this->subcategory->id, 0 )) );
    $this->subcategory->save();
    return TRUE;
  }

  protected $image_ids = FALSE;

  function set_image_ids($val) 
  {
    if(empty($this->image_ids)) $this->image_ids = array();
    $this->image_ids = array_merge($this->image_ids, $val);
  }

  //if image_ids is populated and we are saved. Ensure the two are in sync.
  function update_images()
  {
    if($this->image_ids === FALSE) return TRUE; //nothing to do
    if(!$this->id) return TRUE; //nothing to do
    //Remove old images.
    $set = array('advertisement_id' => 0);
    $where = array('advertisement_id' => $this->id);
    Image::table()->update($set, $where);

    //Add the current set of images.
    if(count($this->image_ids)>0) 
    {
      $set = array('advertisement_id' => $this->id);
      $where = array('id' => $this->image_ids);
      Image::table()->update($set, $where);
    }

  }

  function update_section_image()
  {
    if($this->draft !== 0) return TRUE;
    $sub = Subcategory::find($this->subcategory_id, array(
      'include' => array('category'),
    ));
    $section = Section::find($sub->category->section_id);
    $section->refresh_image();
  }


  function get_image_path()
  {
    //Todo: caching
    $out = 'assets/images/listing-side.jpg';
    if(!$this->id) return $out;
    $image = Image::find('first', array(
      'conditions' => array('advertisement_id' => $this->id),
      'order' => ' created_at ASC, id ASC ',
    ));
    if($image) return $image->url_path;
    return $out;
  }

  function get_posted_since()
  {
    return 'Parue depuis 6 jours';
  }


  //Url helpers
  static function index_url()
  {
    return base_url('/categories/index');
  }
  static function add_url($subcategory_id=FALSE)
  {
    if(!$subcategory_id)  return base_url('/ads/add');
    return base_url('/ads/add/'.$subcategory_id);
  }

  static function create_url()
  {
    return base_url('/ads/create');
  }


  function show_url()
  {
    return base_url('/ads/'.$this->id);
  }

  function edit_url()
  {
    return base_url('/ads/edit/'.$this->id);
  }

  function update_url()
  {
    return base_url('/ads/update/'.$this->id);
  }

  function delete_url()
  {
    return base_url('/ads/destroy/'.$this->id);
  }
  
  function publish_url()
  {
    return base_url('/ads/publish/');
  }

}

