<?php defined("BASEPATH") or exit("No direct script access allowed");
(defined('ENVIRONMENT') && ENVIRONMENT === "development") or exit("Migrations only work in development");

class Migrate extends CI_Controller {

  public function index($version=-2)
  {
    $this->load->library("migration");
    $this->load->helper('url');

    echo '<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clicbye</title>
<base href="'.base_url().'" >
</head>
<body>';


    if($version >= 0) 
    {
      echo "<pre>Migrating to version: ".$version."\n</pre>";
      if(!$this->migration->version($version))
      {
        show_error($this->migration->error_string(),200, 'Migrating to version '.$version.' has failed.');
      }   
    } 
    else if($version == -2)
    {
      echo "<pre>Undoing migrations...\n</pre> <a href='".base_url('/migrate/index/-1') ."'>Click here to continue.</a>";
      if(!$this->migration->version(0))
      {
        show_error($this->migration->error_string(),200, 'Migrating to version 0 has failed.');
      }   
    } 
    else
    {
      echo "<pre>Migrating to the latest version....\n</pre>";
      if(!$this->migration->latest())
      {
        show_error($this->migration->error_string(),200, 'Migrating to latest has failed.');
      }   
      else
      {
        $this->_seeds();
      }
      echo "<a href='".base_url('/') ."'>Click here to continue.</a>";

    }   

    echo '</body></html>';

  }

  function _seeds()
  {
    $this->load->spark('php-activerecord/0.0.2');
  
    $section = $this->_new_section('Vehicles');
    $category = $this->_new_category('CarCategory', $section, 'Purchase / Sale');
    $this->_new_subcategory($category, 'Antiques / collection');
    $this->_new_subcategory($category, 'Cars');
    $this->_new_subcategory($category, 'Trucks');
    $this->_new_subcategory($category, 'Vans');
    $this->_new_subcategory($category, 'SUV');
    $this->_new_subcategory($category, 'Luxury Cars');
    $this->_new_subcategory($category, 'Snowmobiles');
    $this->_new_subcategory($category, 'Marine');
    $this->_new_subcategory($category, 'Air');
    $this->_new_subcategory($category, 'Recreational Vehicles');
    $this->_new_subcategory($category, 'Motorcycles');
    $this->_new_subcategory($category, 'Other');

    $category = $this->_new_category('CarCategory', $section, 'Recovery of Rent');
    $this->_new_subcategory($category, 'Cars');
    $this->_new_subcategory($category, 'Trucks');
    $this->_new_subcategory($category, 'SUV');
    $this->_new_subcategory($category, 'Luxury Cars');
    $this->_new_subcategory($category, 'Minifourgonettes');
    $this->_new_subcategory($category, 'Other');

    $category = $this->_new_category('CarCategory', $section, 'Parts / Equipment / Machineries');
    $this->_new_subcategory($category, 'Equipment');
    $this->_new_subcategory($category, 'Auto Parts');
    $this->_new_subcategory($category, 'Heavy Machinery');
    $this->_new_subcategory($category, 'Tires / Wheels');
    $this->_new_subcategory($category, 'Trailers');
    $this->_new_subcategory($category, 'Trucks');
    $this->_new_subcategory($category, 'Maintenance / troubleshooting');
    $this->_new_subcategory($category, 'Clothing');
    $this->_new_subcategory($category, 'Other');
    
    $section = $this->_new_section('Real Estate');
    $category = $this->_new_category('RealEstateCategory',$section , 'Purchase / Sale');
    $this->_new_subcategory($category, 'Residential Condo');
    $this->_new_subcategory($category, 'Residential / Houses');
    $this->_new_subcategory($category, 'Commercial / Industrial');
    $this->_new_subcategory($category, 'Chaltes');
    $this->_new_subcategory($category, 'Businesses');
    $this->_new_subcategory($category, 'Land');
    $this->_new_subcategory($category, 'Farms');

    $category = $this->_new_category('RealEstateCategory', $section, 'Rentals');
    $this->_new_subcategory($category, 'Residential / Houses');
    $this->_new_subcategory($category, 'Commercial / Industrial');
    $this->_new_subcategory($category, 'Chaltes');
    $this->_new_subcategory($category, 'Residential Condo / Apartment');
    $this->_new_subcategory($category, 'Rooms / Roommates');
    $this->_new_subcategory($category, 'Retirement Home');
    $this->_new_subcategory($category, 'Garagse / Warehouses');
    $this->_new_subcategory($category, 'Dwellings not in Canada');

    $category = $this->_new_category('RealEstateCategory', $section, 'Services');
    $this->_new_subcategory($category, 'Construction / Renovation');
    $this->_new_subcategory($category, 'Real Estate Brokerage');
    $this->_new_subcategory($category, 'Moving / Storage');
    $this->_new_subcategory($category, 'Snow Removal / Earthworks');


    $section = $this->_new_section('Furniture');
    $category = $this->_new_category('GeneralCategory', $section, 'Furniture');
    $this->_new_subcategory($category, 'Housewares');
    $this->_new_subcategory($category, 'Arts / Antiques');
    $this->_new_subcategory($category, 'Decoration');
    $this->_new_subcategory($category, 'Appliances');
    $this->_new_subcategory($category, 'Office Furniture');
    $this->_new_subcategory($category, 'Garden Furniture');
    $this->_new_subcategory($category, 'Home Furnishings');

    $section = $this->_new_section('Jobs');
    $category = $this->_new_category('GeneralCategory', $section, 'Careers and Occupations');
    $this->_new_subcategory($category, 'Purchasing / Quality');
    $this->_new_subcategory($category, 'Administration / Management');
    $this->_new_subcategory($category, 'Insurance / Finance Services');
    $this->_new_subcategory($category, 'Automotive / Transportation');
    $this->_new_subcategory($category, 'Retail Trade');
    $this->_new_subcategory($category, 'Accounting / Finance');
    $this->_new_subcategory($category, 'Right');
    $this->_new_subcategory($category, 'Education / Training');
    $this->_new_subcategory($category, 'Engineering / Science');
    $this->_new_subcategory($category, 'Marketing / Communications');
    $this->_new_subcategory($category, 'Crafts');
    $this->_new_subcategory($category, 'Production / Handling');
    $this->_new_subcategory($category, 'Human Resources');
    $this->_new_subcategory($category, 'Health / Social Services');
    $this->_new_subcategory($category, 'Administrative Support');
    $this->_new_subcategory($category, 'Technology');
    $this->_new_subcategory($category, 'Tourism / Hotel / Restaurant');
    $this->_new_subcategory($category, 'Sales / Customer Service');

    $category = $this->_new_category('GeneralCategory', $section, 'Owners');
    $this->_new_subcategory($category, 'Artists / Musicians');
    $this->_new_subcategory($category, 'Home');
    $this->_new_subcategory($category, 'Miscellaneous');


    $section = $this->_new_section('Electronic');
    $category = $this->_new_category('GeneralCategory', $section, 'Electronic');
    $this->_new_subcategory($category, 'Audio');
    $this->_new_subcategory($category, 'Game Consoles');
    $this->_new_subcategory($category, 'Games');
    $this->_new_subcategory($category, 'DVD Digitial Video');
    $this->_new_subcategory($category, 'Electronics');

    $section = $this->_new_section('Holidays / Travel');
    $category = $this->_new_category('GeneralCategory', $section , 'Holidays / Travel');
    $this->_new_subcategory($category, 'Canada');
    $this->_new_subcategory($category, 'United States');
    $this->_new_subcategory($category, 'All South');
    $this->_new_subcategory($category, 'All Europe');
    $this->_new_subcategory($category, 'Other Destinations');
    
    $section = $this->_new_section('Tools / Materials');
    $category = $this->_new_category('GeneralCategory', $section, 'Tools / Materials');
    $this->_new_subcategory($category, 'Firewood');
    $this->_new_subcategory($category, 'Heating Equipment');
    $this->_new_subcategory($category, 'Professional Equipment');
    $this->_new_subcategory($category, 'Seasonal Equipment');
    $this->_new_subcategory($category, 'Horticulture / Gardening');
    $this->_new_subcategory($category, 'Building Materials');
    $this->_new_subcategory($category, 'Tools');

    $section = $this->_new_section('Sports / Leisure');
    $category = $this->_new_category('GeneralCategory', $section, 'Sports / Leisure');
    $this->_new_subcategory($category, 'Activities / Events');
    $this->_new_subcategory($category, 'Collections / Hobbies');
    $this->_new_subcategory($category, 'Movies');
    $this->_new_subcategory($category, 'Books');
    $this->_new_subcategory($category, 'Music CD/Disks');
    $this->_new_subcategory($category, 'Musical Facilities');
    $this->_new_subcategory($category, 'Musical Instruments');
    $this->_new_subcategory($category, 'Photo');
    $this->_new_subcategory($category, 'Entertainment');
    $this->_new_subcategory($category, 'Sports');
    $this->_new_subcategory($category, 'Other');

    $section = $this->_new_section('Family');
    $category = $this->_new_category('GeneralCategory', $section, 'Family');
    $this->_new_subcategory($category, 'Jewellery / Accessories');
    $this->_new_subcategory($category, 'Daycare');
    $this->_new_subcategory($category, 'Toys');
    $this->_new_subcategory($category, 'Maternity');
    $this->_new_subcategory($category, 'Clothing / Shoes');

    $section = $this->_new_section('Animals');
    $category = $this->_new_category('GeneralCategory',$section , 'Animals');
    $this->_new_subcategory($category, 'Cats');
    $this->_new_subcategory($category, 'Dogs');
    $this->_new_subcategory($category, 'Birds');
    $this->_new_subcategory($category, 'Horses');
    $this->_new_subcategory($category, 'Accessories / Breeding / Grooming');
    $this->_new_subcategory($category, 'Other Animals');

    $section = $this->_new_section('Computing');
    $category = $this->_new_category('GeneralCategory',$section , 'Computing');
    $this->_new_subcategory($category, 'Computer Games');
    $this->_new_subcategory($category, 'Software');
    $this->_new_subcategory($category, 'Laptops');
    $this->_new_subcategory($category, 'Computer Peripherals');
    $this->_new_subcategory($category, 'Computer Services');
    $this->_new_subcategory($category, 'Desktops');

    $section = $this->_new_section('Services');
    $category = $this->_new_category('GeneralCategory',$section , 'Services');
    $this->_new_subcategory($category, 'Astrology / Clairvoyance');
    $this->_new_subcategory($category, 'Cell / Phone');
    $this->_new_subcategory($category, 'Carpooling');
    $this->_new_subcategory($category, 'Courses / Workshops / Trainings');
    $this->_new_subcategory($category, 'Daycare');
    $this->_new_subcategory($category, 'Wedding / Planning');
    $this->_new_subcategory($category, 'Massage Therapy');
    $this->_new_subcategory($category, 'Natural Medicine');
    $this->_new_subcategory($category, 'Business Opportunities / Partners');
    $this->_new_subcategory($category, 'Health / Beauty / Diet');
    $this->_new_subcategory($category, 'Domestic Services');
    $this->_new_subcategory($category, 'Financial / Legal / Ass');
    $this->_new_subcategory($category, 'Garage Sale / Flea / Auctions');

    $section = $this->_new_section('Community');
    $category = $this->_new_category('GeneralCategory',$section , 'Community');
    $this->_new_subcategory($category, 'To Give');
    $this->_new_subcategory($category, 'Opinion / Wishes / Lost / Found');
    $this->_new_subcategory($category, 'Community Support');
  
    $region = $this->_new_region('Region A');

    $province = $this->_new_province($region, 'Province AA');
    $this->_new_city($province, 'Montérégie');
    $this->_new_city($province, 'Chaudière-Appalaches');
    $this->_new_city($province, 'Townships');
    $this->_new_city($province, 'Centre-du-Quebec');
    $this->_new_city($province, 'Montreal');
    $this->_new_city($province, 'National Capital');

    $province = $this->_new_province($region, 'Province AB');
    $this->_new_city($province, 'North Shore');
    $this->_new_city($province, 'Northern Quebec');
    $this->_new_city($province, 'Mauricie');
    $this->_new_city($province, 'Lanaudière');

    $region = $this->_new_region('Region B');

    $province = $this->_new_province($region, 'Province BA');
    $this->_new_city($province, 'Saguenay-Lac-Saint-Jean');
    $this->_new_city($province, 'Lower St. Lawrence');

    $province = $this->_new_province($region, 'Province BB');
    $this->_new_city($province, 'Ottawa');
    $this->_new_city($province, 'Laurentians');
    $this->_new_city($province, 'Abitibi-Témiscamingue');
    $this->_new_city($province, 'Gaspésie-Îles-de-la-Madeleine');

    $carbrand = $this->_new_carbrand('Porsche');
    $this->_new_carmodel($carbrand, 'Cayenne');
    $this->_new_carmodel($carbrand, '911');
    $this->_new_carmodel($carbrand, 'Boxster');
    $this->_new_carmodel($carbrand, '912');
    $this->_new_carmodel($carbrand, 'Panamera');
    $this->_new_carmodel($carbrand, 'Carrera');
    $this->_new_carmodel($carbrand, 'Cayman');

    $carbrand = $this->_new_carbrand('Bugatti');
    $this->_new_carmodel($carbrand, 'Type 35');
    $this->_new_carmodel($carbrand, 'Veyron EB16.4');
    $this->_new_carmodel($carbrand, 'Type 252');
    $this->_new_carmodel($carbrand, 'EB110');
    $this->_new_carmodel($carbrand, 'Type 41 Royale');
  }

  function _new_section($name)
  {
    $section = Section::first(array('conditions' => array('name  = ?',  $name)));
    if($section) return $section;
    return Section::create(array('name' => $name));
  }

  function _new_category($type, $section, $name)
  {
    $category = Category::first(array('conditions' => array('name  = ? AND type = ? AND section_id = ? ',  $name, $type, $section->id)));
    if($category) return $category;
    return Category::create(array('type'=> $type, 'name' => $name, 'section_id' => $section->id));
  }

  function _new_subcategory($category, $name)
  {
    $subcategory = Subcategory::first(array('conditions' => array('name  = ? AND category_id = ?',  $name, $category->id)));
    if($subcategory) return $subcategory;
    return Subcategory::create(array('category_id'=> $category->id, 'name' => $name));
  }

  function _new_region($name)
  {
    $region = Region::first(array('conditions' => array('name  = ? ',  $name)));
    if($region) return $region;
    return Region::create(array('name' => $name));
  }

  function _new_province($region, $name)
  {
    $province = Province::first(array('conditions' => array('name  = ? AND region_id = ?',  $name, $region->id)));
    if($province) return $province;
    return Province::create(array('region_id'=> $region->id, 'name' => $name));
  }

  function _new_city($province, $name)
  {
    $city = City::first(array('conditions' => array('name  = ? AND province_id = ?',  $name, $province->id)));
    if($city) return $city;
    return City::create(array('province_id'=> $province->id,'name' => $name));
  }

  function _new_carbrand($name)
  {
    $carbrand = Carbrand::first(array('conditions' => array('name  = ?',  $name)));
    if($carbrand) return $carbrand;
    return Carbrand::create(array('name' => $name));
  }

  function _new_carmodel($carbrand, $name)
  {
    $carmodel = Carmodel::first(array('conditions' => array('name  = ? AND carbrand_id = ?',  $name, $carbrand->id)));
    if($carmodel) return $carmodel;
    return Carmodel::create(array('carbrand_id'=> $carbrand->id, 'name' => $name));
  }

}

