<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Advertisements extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE,
      ),
      'title' => array(
        'type' => 'TEXT',
      ),
      'type' => array(  //GeneralAdvertisement,CarAdvertisement or RealestateAdvertisement
        'type' => 'VARCHAR',
        'constraint' => '40',
      ),
      'subcategory_id' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'user_id' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'city_id' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'price_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '16',
      ),
      'price' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'want_or_offer' => array( // 'want' or 'offer'
        'type' => 'VARCHAR',
        'constraint' => '16',
      ),

      'description' => array(
        'type' => 'TEXT',
        'null' => TRUE,
      ),
      'website' => array(
        'type' => 'TEXT',
        'null' => TRUE,
      ),
      'postalcode' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
        'null' => TRUE,
      ),
      'currency_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
        'null' => TRUE,
      ),
      'is_show_phone' => array(
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'no',
      ),
      'is_contact_skype' => array(
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'no',
      ),
      'promote_priviledged' => array(
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'off',
      ),
      'promote_gallery' => array(
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'off',
      ),
      'promote_urgent' => array(
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'off',
      ),
      'to_be_shared_on_facebook' => array( //'on' or 'off' 
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'off',
      ),
      'to_be_shared_on_twitter' => array( //'on' or 'off'
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'off',
      ),
      'to_be_shared_on_kijiji' => array( //'on' or 'off'
        'type' => 'VARCHAR',
        'constraint' => '5',
        'default' => 'off',
      ),
      'sold' => array(
        'type' => 'VARCHAR', //'yes', 'no'
        'constraint' => '4', 
        'default' => 'no', 
      ),
      'views' => array(
        'type' => 'INT', //active 
        'constraint' => '10',
        'default' => 0,
      ),
      'draft' => array(
        'type' => 'TINYINT', //1 for draft, 0 for published
        'constraint' => '1',
        'default' => '0',
      ),
      'status' => array(
        'type' => 'VARCHAR', //active 
        'constraint' => '15',
        'default' => 'active',
      ),


// When type==CarAdvertisement
      'carbrand_id' => array( //carbrand can be derived from this.
        'type' => 'INT',
        'constraint' => 11,
        'null' => TRUE,
      ),
      'carmodel_id' => array( //carbrand can be derived from this.
        'type' => 'INT',
        'constraint' => 11,
        'null' => TRUE,
      ),
      'car_condition' => array(
        'type' => 'VARCHAR', //'used' or 'new'
        'constraint' => '10',  
        'null' => TRUE,
      ),
      'car_type' => array(
        'type' => 'VARCHAR', //berline or sports
        'constraint' => '10',
        'null' => TRUE,
      ),
      'car_year' => array(
        'type' => 'SMALLINT',
        'constraint' => '4',
        'null' => TRUE,
      ),
      'car_km' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => TRUE,
      ),
      'car_color' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE,
      ),
      'car_airconditioning' => array(
        'type' => 'VARCHAR',  //'yes' or 'no'
        'constraint' => '4', 
        'null' => TRUE,
      ),
      'car_passengers' => array(
        'type' => 'TINYINT',
        'constraint' => '4',
        'null' => TRUE,
      ),
      'car_transmission' => array(
        'type' => 'VARCHAR',  //'auto' 'manual'
        'constraint' => '10', 
        'null' => TRUE,
      ),
      'car_fueltype' => array(
        'type' => 'VARCHAR', //'essence', 'diesel'
        'constraint' => '12', 
        'null' => TRUE,
      ),
      'car_doors' => array(
        'type' => 'TINYINT',
        'constraint' => '4',
        'null' => TRUE,
      ),
      'car_engine_size' => array(
        'type' => 'VARCHAR',
        'constraint' => '45',
        'null' => TRUE,
      ),
      'car_traction' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
        'null' => TRUE,
      ),
      'car_other_info' => array(
        'type' => 'TEXT',
        'null' => TRUE,
      ),

// When type==RealestateAdvertisement
      'realestate_type' => array( 
        'type' => 'VARCHAR', //'Condo', 'Bungalow', 'House', 'Paired'
        'constraint' => '10', 
        'null' => TRUE,
      ),
      'realestate_year' => array(
        'type' => 'SMALLINT',
        'constraint' => '4',
        'null' => TRUE,
      ),
      'realestate_rooms' => array(
        'type' => 'TINYINT',
        'constraint' => '4',
        'null' => TRUE,
      ),
      'realestate_bathrooms' => array(
        'type' => 'TINYINT',
        'constraint' => '4',
        'null' => TRUE,
      ),
      'realestate_size' => array(
        'type' => 'INT', 
        'constraint' => '9',
        'null' => TRUE,
      ),
      'realestate_size_units' => array(
        'type' => 'VARCHAR',// 'm2' 'pi2'
        'constraint' => '10', 
        'null' => TRUE,
      ),
      'realestate_other_info' => array(
        'type' => 'TEXT',
        'null' => TRUE,
      ),
      'realestate_evaluation' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => TRUE,
      ),
      'realestate_possession' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE,
      ),
      'realestate_sellertype' => array(
        'type' => 'VARCHAR', //Owner Courtier
        'constraint' => '10', 
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
    $this->dbforge->create_table('advertisements');
  }

  public function down()
  {
    $this->dbforge->drop_table('advertisements');
  }
}
