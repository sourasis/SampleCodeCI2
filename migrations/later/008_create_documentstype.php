<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Documentstype extends CI_Migration {

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
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('documentstype');
  }

  public function down()
  {
    $this->dbforge->drop_table('documentstype');
  }
}
