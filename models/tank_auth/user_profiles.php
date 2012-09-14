<?php
class User_profiles extends CI_Model
{
  private $table_name			= 'users';

  function __construct()
  {
    parent::__construct();

    $ci =& get_instance();
    $this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
  }

  function get_user_by_id($user_id)
  {
    // c1@c1:: take a join of user_profiles and users and get the row based on user_id
    return NULL;
  }

  function get_user_by_fbid($fbid)
  {
    // c1@c1:: take a join of user_profiles and users and get the row based on fbid
    return NULL;
  }

}
?>
