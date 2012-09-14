<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subcategories extends App_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->_redirect('categories/index');
  }

  function show($subcategory_id)
  {
    if( ! $subcategory_id ) show_404();
    $this->data['subcategory'] = Subcategory::find('first', array(
      'conditions' => array('id = ? ',$subcategory_id), 
      'readonly' => true,
      'include' => array('advertisements')
    ));
    
    if(! $this->data['subcategory'] ) show_404(); 
    $this->_render('subcategories/show', $this->data['subcategory']->name);
  }

  function _render($view, $pagetitle="Ads")
  {
    $this->_pagetitle($pagetitle);
    $this->load->view($view, $this->data );
  }

}

/* End of file subcategories.php */
/* Location: ./application/controllers/subcategories.php */
