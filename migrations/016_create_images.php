<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Images extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'file_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
      'file_path' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
       'file_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'raw_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'orig_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'client_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'file_ext' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'file_size' => array( // in KBs
        'type' => 'VARCHAR',
        'constraint' => '10',
        'null' => TRUE,
      ),
      'is_image' => array(
        'type' => 'varchar',
        'constraint' => '3',
        'default'=>'yes',
      ),
      'image_width' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
        'null' => TRUE,
      ),
      'image_height' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
        'null' => TRUE,
      ),
      'image_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'image_size_str' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'advertisement_id' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => TRUE,
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => '11',
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
    $this->dbforge->create_table('images');

    //$this->dbforge->db->query('ALTER TABLE images ADD UNIQUE (file_name, file_path)');
  }

  public function down()
  {
    $this->dbforge->drop_table('images');
  }
}
