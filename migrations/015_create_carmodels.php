<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Carmodels extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'carbrand_id' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
      'advertisements_count' => array(
        'type' => 'INT',
        'constraint' => '8',
      ),
      'created_at' => array(
        'type' => 'DATETIME',
        'default' => '0000-00-00 00:00:00',
      ),
      'updated_at' => array(
        'type' => 'DATETIME',
        'default' => '0000-00-00 00:00:00',
      ),

    ));

    
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('carmodels');
  }

  public function down()
  {
    $this->dbforge->drop_table('carmodels');
  }
}
