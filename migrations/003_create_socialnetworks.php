<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Socialnetworks extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => '11',
      ),
      'provider' => array(
        'type' => 'VARCHAR',
        'constraint' => 25,
      ),
      'uid' => array(
        'type' => 'VARCHAR',
        'constraint' => 25,
        'null' => TRUE,
      ),
      'access_token' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'secret' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'expires' => array(
        'type' => 'INT',
        'constraint' => '15',
        'null' => TRUE,
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'handle' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'location' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'image' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
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
    $this->dbforge->create_table('socialnetworks');

    $this->dbforge->db->query('ALTER TABLE socialnetworks ADD UNIQUE (user_id, provider)');
    $this->dbforge->db->query('ALTER TABLE socialnetworks ADD UNIQUE (provider, uid)');
  }

  public function down()
  {
    $this->dbforge->drop_table('socialnetworks');
  }
}
