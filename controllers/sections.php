<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('MAX_LATEST_PRODUCTS',50);

class Sections extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->_pagetitle('Home');
  }

  function index()
  {
    $this->_latest_products();

    $this->data['sections'] = Section::find('all', array(
          'include'=>array('categories'=>array('subcategories'), 'image'),
          'readonly' => true
    ));
    
    $this->load->view('sections/index', $this->data);
  }

  function &_latest_products()
  {
    $this->data['latest_products'] = Image::find('all', array(
      'conditions' => array('advertisement_id > 0'),
      'group' => 'advertisement_id',
      'order' => 'created_at desc',
      'limit'=> MAX_LATEST_PRODUCTS,
    ));
    return $this->data['latest_products'];
  }
}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
