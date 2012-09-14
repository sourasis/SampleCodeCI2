<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Users extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'password' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
       'skype' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
       'telephone' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'profile_set' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'default' => '0',
      ),
       'activated' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'default' => '0',
      ),
      'banned' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'default' => '0',
      ),
      'ban_reason' => array( // will be a serialized array of all token ids activated by this user
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'new_password_key' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'new_password_requested' => array(
        'type' => 'DATETIME',
        'null' => TRUE,
      ),
      'new_email' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'new_email_key' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
        'null' => TRUE,
      ),
      'last_ip' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
      ),
      'last_login' => array(
        'type' => 'DATETIME',
        'default' => '0000-00-00 00:00:00',
      ),
      'username' => array( //Always blank.  Kept for future use.
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
    $this->dbforge->create_table('users');

    $this->dbforge->db->query('ALTER TABLE users ADD UNIQUE (email)');
  }

  public function down()
  {
    $this->dbforge->drop_table('users');
  }
}
