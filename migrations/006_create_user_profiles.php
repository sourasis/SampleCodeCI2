<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_User_Profiles extends CI_Migration {

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
        'default' => 0
      ),
      'country' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE,
      ),
      'website' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
     'postalcode' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE,
      ),
      'city' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'corporation' => array(
        'type' => 'TINYINT',
        'constraint' => '2',
        'default' => 0,
      ),
      'corp_biz_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'corp_contactperson' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'corp_address' => array(
        'type' => 'TEXT',
        'null' => TRUE,
      ),
      'corp_telephone' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE,
      ),
      'corp_fax' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'corp_website' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'corp_biz_description' => array(
        'type' => 'TEXT',
        'null' => TRUE,
      ),
      'corp_logopath' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'corp_package_id' => array(
        'type' => 'INT',
        'constraint' => '11',
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
    $this->dbforge->create_table('user_profiles');
  }

  public function down()
  {
    $this->dbforge->drop_table('user_profiles');
  }
}
