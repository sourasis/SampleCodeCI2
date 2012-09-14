<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->_require_user(array('except' => array('index','show')));
  }

  function index($id=FALSE)
  {
    if(empty($id))
      return $this->_redirect('categories/index');
    $advertisement = &$this->_advertisement($id);
    $subcategory = &$this->_subcategory($advertisement->subcategory_id);

    $title = 'Ads > Advertisement: '.$advertisement->title;
    if($advertisement->draft > 0) $title = 'Ads > Preview: '.$advertisement->title; 
    $this->_render('ads/show', $title);
  }


  function add($subcategory_id=FALSE)
  {
    if(empty($subcategory_id)) 
      return $this->_add_step1(); 
    $this->_new2($subcategory_id);
  }

  function _add_step1()
  {
    $sections = &$this->_categories();
    $this->_render('ads/add_step1', 'Ads > Create an add ');
  }


  function _new2($subcategory_id)
  {
    $subcategory = &$this->_subcategory($subcategory_id);
    $advertisement = &$this->_new_advertisement(array(
      'subcategory_id' =>  $subcategory->id,
    ));

    $regions = &$this->_regions();
    $this->data['regions'] = array_merge(array('0'=>'Select'), $this->data['regions']);
    if($subcategory->category->type == 'CarCategory')
    {
      $carmodels = &$this->_carmodels();
      $carbrands = &$this->_carbrands();
    }

    $this->_render('ads/add','Ads > Create '.$subcategory->name.' ad ');
  }


  function create()
  {
    app_debug($_POST);
    
    $params = $this->input->post('advertisement');
    if(empty($params)) redirect(Advertisement::add_url());
    $advertisement = &$this->_new_advertisement($params);

    $advertisement->draft = 1;
    $subcategory = &$this->_subcategory($advertisement->subcategory_id);
    if($subcategory->category->type == 'CarCategory')
    {
      $carmodels = &$this->_carmodels();
      $carbrands = &$this->_carbrands();
    }


    if($advertisement->save())
    {
      $this->_flash('Preview your post and Publish.');
      //app_debug($this->_process_uploads('image'));
      return redirect($advertisement->show_url());
    }
    $images = &$this->_images_by_id($params);
    $this->_flash_error_now('Please correct the errors to continue.');

    $regions = &$this->_regions();
    $this->data['regions'] = array_merge(array('0'=>'Select'), $this->data['regions']);
    
    if(!empty($params['city_id']))
    {
      $cities = &$this->_cities(array('conditions'=>array('id = ?', $params['city_id'])));
    }
    $this->_render('ads/add','Ads > Preview '.$advertisement->subcategory->name.' ad ');
  }

  function publish()
  {
    
    $advertisement = &$this->_advertisement($this->input->post('id'));
    $advertisement->draft = 0;
    if($advertisement->save())
    {
      $this->_flash('Advertisement published.');
      return redirect($advertisement->show_url());
    }
    $this->_flash_error('Ad could not be published.');
    return redirect($advertisement->show_url());
  }

  function edit($id=FALSE)
  {
    $advertisement = &$this->_advertisement($id);
    
    $subcategory = &$this->_subcategory($advertisement->subcategory_id);
    
    if($subcategory->category->type == 'CarCategory')
    {
      $carmodels = &$this->_carmodels();
      $carbrands = &$this->_carbrands();
    }

    $regions = &$this->_regions();
    $this->data['regions'] = array_merge(array('0'=>'Select'), $this->data['regions']);
    if(!empty($advertisement->city_id))
    {
      $cities = &$this->_cities(array('conditions'=>array('id = ?', $advertisement->city_id)));
    }
    $this->_render('ads/edit', 'Ads > Edit ');
  }

  function update($id=FALSE)
  {
    app_debug($_POST);
    $advertisement = &$this->_advertisement($id);

    $params = $this->input->post('advertisement');
    if(empty($params['image_ids'])) $params['image_ids'] = array();
    if(empty($params)) redirect($advertisement->edit_url());
    if($advertisement->update_attributes($params))
    {
      $this->_flash('Advertisement updated.');
      //app_debug($this->_process_uploads('image'));
      return redirect($advertisement->show_url());
    }
    $images = &$this->_images_by_id($params);
    $this->_flash_error_now('Please correct the errors to continue.');
    $cities = &$this->_cities();
    $this->_render('ads/edit', 'Ads > Edit ');
  }

  function destroy($id=FALSE)
  {
    $advertisement = &$this->_advertisement($id);
    $this->_flash_error('Ad has not been destroyed');
    $this->_redirect('/');
  }


  function _process_uploads($field)
  {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '10000';
    $config['max_width']  = '2000';
    $config['max_height']  = '2000';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload($field))
    {
      return array('error' => $this->upload->display_errors());
    }
    return array('images' => $this->upload->data());
  }



  function _share_facebook($id)
  {
    // share the ad to facebook
  }

  function _share_twitter($id)
  {
    // share the ad to twitter
  }

  function _share_kijiji($id)
  {
    // share the ad to Kijiji
  }

  /*
   * These helper functions ensure that $this->data is appropriately handled
   * and 404 is generated on invalid input.
   */

  function &_advertisement($id)
  {
    if(empty($id)) show_404();
    $advertisement =  Advertisement::find_by_id($id, array(
      'include' => array('subcategory','city','user','carmodel'=>array('carbrand')),
    ));
    if(empty($advertisement)) show_404();
    $images = &$this->_images($advertisement);
    $this->data['advertisement'] = $advertisement;
    return $this->data['advertisement'];
  }



  function &_new_advertisement($params=array())
  {
    $advertisement =  new Advertisement($params);
    $advertisement->user_id = $this->data['current_user']->id;
    $advertisement->draft = 1;
    $images = &$this->_images($advertisement);
    $this->data['advertisement'] = $advertisement;
    return $this->data['advertisement'];
  }


  function &_images_by_id($params)
  {
    $this->data['images'] = array();
    if(!empty($params['image_ids'])) 
    {
      $this->data['images'] = Image::find('all', array(
        'conditions' => array( 'id in (?)', $params['image_ids']), 
        'readonly' => true,
      ));
    }
    return $this->data['images'];
  }



  function &_images($advertisement)
  {
    $this->data['images'] = array();
    if(!empty($advertisement->id)) 
    {
      $this->data['images'] = Image::find('all', array(
        'conditions' => array('advertisement_id = ? ',$advertisement->id), 
        'readonly' => true,
      ));
    }
    return $this->data['images'];
  }


  function &_regions()
  {
    $this->data['regions'] = Region::find_assoc(); 
    return $this->data['regions'];
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

  function &_carbrands()
  {
    $this->data['carbrands'] = Carbrand::find_assoc(); 
    return $this->data['carbrands'];
  }

  function &_carmodels()
  {
    $this->data['carmodels'] = Carmodel::find_assoc(); 
    return $this->data['carmodels'];
  }

  function &_subcategory($subcategory_id)
  {
    if(empty($subcategory_id)) show_404();
    $this->data['subcategory'] = Subcategory::find('first', array(
      'conditions' => array('id = ? ',$subcategory_id), 
      'readonly' => true,
      'include' => array('category')
    ));
    if(empty($this->data['subcategory'])) show_404(); 
    return $this->data['subcategory'];
  }

  function &_categories()
  {
    $this->data['sections'] = Section::find('all', array(
          'include'=>array('categories'=>array('subcategories')),
          'readonly' => true
    ));

    return $this->data['sections'];

  }

  function _render($view, $pagetitle="Ads")
  {
    $this->_pagetitle($pagetitle);
    $this->load->view($view, $this->data );
  }



}

/* End of file ads.php */
/* Location: ./application/controllers/ads.php */
