<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Regions extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'province_id' => array(
        'type' => 'INT',
        'constraint' => '11',
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('regions');
  }

  public function down()
  {
    $this->dbforge->drop_table('regions');
  }
}
