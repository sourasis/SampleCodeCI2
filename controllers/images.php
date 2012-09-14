<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Images extends App_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->_api_require_user();
  }

  function upload()
  {
    if(!$this->input->post('Filename')) show_404();

    $result = $this->_process_uploads('Filedata');
    $out = array();

    if(!empty($result['error']) || empty($result['images'])) 
      return $this->_show_error($result['error'], 400, 'Client Error: Upload failed.  Sending back 400.');

      //The image is now in tempuploads with $result containing info about it.
      /* Step 1: Save this information with userid in the database.
         Step 2: Now you have imageid.
         Step 3: Rename the file to userid-imageid.extention and move to the uploads folder.
         Step 4: Update the image in the database with this info.
         Step 5: Send back the image id.
         Step 6: Capture image ids in onComplete and save it in a hidden field.
         Step 7: Retrieve image id in ads#create and ads#update and update them with advertisement id.
      */

    //Step 1 and 2
    $params = $result['images'];
    $params['user_id'] = $this->data['current_user']->id;
    $params['file_path'] = 'tempuploads/';
    unset($params['full_path']);
    $image = new Image($params);
    $image->save();
    if($image->is_invalid())
      return $this->_show_error('Server error while processing the file. Try again', 503);

    //Step 3
    $ext = strtolower($image->file_ext);
    $name = $image->user_id.'-'.$image->id.'-'.md5(uniqid(rand(), TRUE)).$ext;
    $source = $result['images']['full_path'];
    $dest = $result['images']['file_path'].'../uploads/'.$name;

    app_debug("Ranaming <$source> to  <$dest>");
    if(!rename($source, $dest))
      return $this->_show_error('Server error while storing the file. Try again', 503);

    //Step 4
    $image->file_name = $name;
    $image->file_path = 'uploads/';
    $image->file_ext = $ext;
    $image->save();
    if($image->is_invalid())
      return $this->_show_error('Server error while saving the file. Try again', 503);
 
    //Step 5
    $out['id'] = $image->id;
    $out['url_path'] = $image->url_path;
    app_debug($out);
    echo json_encode($out);
  }

  function _show_error($err, $code, $log=FALSE)
  {
    $out = array('error' => $err);
    if(empty($log)) $log = 'Error uploading image: <'.$code.'>'.$err;
    app_error($log);
    $this->output->set_status_header($code);
    app_debug($out);
    echo json_encode($out); //The swf just ignores this completely. :(
    return TRUE;
  }
  
  function _process_uploads($field)
  {
    $config['upload_path'] = './tempuploads/';
    $config['allowed_types'] = '*';
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

}

/* End of file images.php */
/* Location: ./application/controllers/images.php */
