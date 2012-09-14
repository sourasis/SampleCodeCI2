<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_User_Autologin extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'key_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => '11',
        'default' => 0
      ),
      'user_agent' => array(
        'type' => 'VARCHAR',
        'constraint' => '150',
      ),
      'last_ip' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
      ),
    ));

    $this->dbforge->add_field("`last_login` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP");
    $this->dbforge->add_key('key_id', TRUE);
    $this->dbforge->add_key('user_id', TRUE);
    $this->dbforge->create_table('user_autologin');
  }

  public function down()
  {
    $this->dbforge->drop_table('user_autologin');
  }
}
