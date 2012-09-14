<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Countries extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'code' => array(
        'type' => 'VARCHAR',
        'constraint' => '5',
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('countries');
  }

  public function down()
  {
    $this->dbforge->drop_table('countries');
  }
}
