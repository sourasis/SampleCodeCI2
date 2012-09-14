<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Usersocialdetails extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => '11',
      ),
      'birthday' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'gender' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
        'null' => TRUE,
      ),
      'inviter_id' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => TRUE,
      ),
      'profilepic_path' => array(
        'type' => 'VARCHAR',
        'constraint' => '150',
        'null' => TRUE,
      ),
      'fb_image_path' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'twitter_image_path' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'fb_fullname' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'fb_handler' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'twitter_handler' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'fb_keys' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'twitter_keys' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'fb_access_token' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'fb_authenticated' => array(
        'type' => 'ENUM',
        'constraint' => "'0','1'",
        'null' => TRUE,
        'default' => '0',
      ),
      'twitter_following' => array(
        'type' => 'ENUM',
        'constraint' => "'0','1'",
        'null' => TRUE,
        'default' => '0',
      ),
      'twitter_access_token' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'twitter_secret' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE,
      ),
      'twitter_authenticated' => array(
        'type' => 'ENUM',
        'constraint' => "'0','1'",
        'null' => TRUE,
        'default' => '0',
      ),
      'createdon' => array(
        'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        'null' => TRUE,
      ),
      'modifiedon' => array(
        'type' => 'TIMESTAMP',
        'null' => TRUE,
      ),
      'twitter_linked_on' => array(
        'type' => 'TIMESTAMP',
        'null' => TRUE,
      ),
      'fb_linked_on' => array(
        'type' => 'TIMESTAMP',
        'null' => TRUE,
      ),
      'status' => array(
        'type' => 'ENUM',
        'constraint' => "'0','1'",
        'null' => TRUE,
        'default' => '1',
      ),
    ));

    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('usersocialdetails');
  }

  public function down()
  {
    $this->dbforge->drop_table('usersocialdetails');
  }
}
