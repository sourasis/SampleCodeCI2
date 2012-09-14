<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Userdocuments extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'label' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'path' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
      'type_id' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => TRUE,
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => '11',
      ),
      'createdon' => array(
        'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        'null' => TRUE,
      ),
      'status' => array(
        'type' => 'INT',
        'constraint' => '4',
        'default' => 1, 
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('usersdocuments');
  }

  public function down()
  {
    $this->dbforge->drop_table('usersdocuments');
  }
}
