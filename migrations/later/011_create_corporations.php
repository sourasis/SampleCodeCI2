<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Corporations extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'contact_person' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'address' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'fax' => array(
        'type' => 'VARCHAR',
        'constraint' => '15',
        'null' => TRUE,
      ),
      'logo_path' => array(
        'type' => 'VARCHAR',
        'constraint' => '155',
        'null' => TRUE,
      ),
      'website' => array(
        'type' => 'VARCHAR',
        'constraint' => '155',
        'null' => TRUE,
      ),
      'background' => array(
        'type' => 'VARCHAR',
        'constraint' => '155',
        'null' => TRUE,
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('corporations');
  }

  public function down()
  {
    $this->dbforge->drop_table('corporations');
  }
}
