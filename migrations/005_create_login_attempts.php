<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Login_Attempts extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'session_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'ip_address' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
      ),
      'login' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
    ));

    $this->dbforge->add_field("`time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP");

    $this->dbforge->add_key('session_id', TRUE);
    $this->dbforge->create_table('login_attempts');
  }

  public function down()
  {
    $this->dbforge->drop_table('login_attempts');
  }
}
