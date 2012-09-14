<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('MAX_LATEST_PRODUCTS',50);

class Categories extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->_pagetitle('Home');
  }

  function index()
  {
    $this->_redirect('sections/index');
  }

}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
