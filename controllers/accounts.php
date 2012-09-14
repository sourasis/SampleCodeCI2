<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->_require_user();
  }

  function index()
  {
    redirect('/accounts/profile');
  }

  function profile()
  {
    $userads = &$this->_advertisement($this->data['current_user']->id);
    $this->_render('accounts/profile', $this->data['current_user']->name);
  }

  function &_advertisement($user_id)
  {
    if(empty($user_id)) show_404();
    
    $this->data['userads'] = Advertisement::find_all_by_user_id($user_id);    
    
    return $this->data['userads'];
  }
  
  function _render($view, $pagetitle="Ads")
  {
    $this->_pagetitle($pagetitle);
    $this->load->view($view, $this->data );
  }
}

/* End of file accounts.php */
/* Location: ./application/controllers/accounts.php */
