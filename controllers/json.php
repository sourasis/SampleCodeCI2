<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Json extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->_require_user();
  }

  function index($id=FALSE)
  {
    redirect('/');
  }

  function provinces($data)
  {
    if(empty($data)) echo json_encode(array("result"=>"FAILED")); 
    $provinces = &$this->_provinces(array('conditions'=>array('region_id = ?', $data)));
    echo json_encode($provinces); 
  }

  function cities($data)
  {
    if(empty($data)) echo json_encode(array("result"=>"FAILED")); 
    $cities = &$this->_cities(array('conditions'=>array('province_id = ?', $data)));
    echo json_encode($cities); 
  }


  function &_provinces($params='')
  {
    $this->data['provinces'] = Province::find_assoc($params); 
    return $this->data['provinces'];
  }

  function &_cities($params='')
  {
    $this->data['cities'] = City::find_assoc($params); 
    return $this->data['cities'];
  }
  
}

/* End of file json.php */
/* Location: ./application/controllers/json.php */
