<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('MAX_LIST_CORPS_PER_PAGE', 10);

class Corporations extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->_require_user(array('except'=>array('index', 'profile')));
  }

  function index($data=null)
  {
    
    $corps = $this->_corp_list();    
    $this->_render('corporations/index', 'Corporation > All');
  }

  function dashboard()
  {
    $userprofile = &$this->_userprofile($this->data['current_user']->id);
    if($userprofile->corporation !== 1)
    {
      $this->_flash('You need to be a corporation to view this page');
      $this->_redirect('/');
    }

    $this->data['advertisements'] = Advertisement::Find('all',
                                      array('conditions'=>array('user_id = ? AND draft = ? ',$userprofile->user_id, 0)));
    
    $this->_render('corporations/dashboard', 'Dashboard');
  }

  function profile($data='')
  {
    if(empty($data))
    {
      $userprofile = &$this->_userprofile($this->data['current_user']->id);
    } else {
      $userprofile = &$this->_userprofile($data);
      if($userprofile->corporation !== 1)
      {
        $this->_flash('You need to be a corporation to view this page');
        $this->_redirect('/');
      }
    }

    $this->_render('corporations/profile', 'Corporation Profile');    
  }

  function &_userprofile($id)
  {
    if(empty($id)) show_404();

    $this->data['userprofile'] = UserProfile::find_by_user_id($id);
    return $this->data['userprofile'];
  }

  function _render($view, $pagetitle="Corporation")
  {
    $this->_pagetitle($pagetitle);
    $this->load->view($view, $this->data );
  }

  function &_corp_list($page='')
  {
    if($page) {
      $conditions = array('corporation > ? ORDER BY id DESC limit ?,?', 0, $page, MAX_LIST_CORPS_PER_PAGE);
    }
    else {
      $conditions = array('corporation > ?', 0);
    }
    $this->data['corporations'] = UserProfile::find('all',array(
              'conditions' => $conditions)); 
    return $this->data['corporations'];
  }
}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */
