<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends App_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->load->view('welcome/index', $this->data);
  }

  function test()
  {

    $this->load->view('welcome/index', $this->data);
  }

  function logs(){
    $this->load->spark( 'fire_log/0.8.2');
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
