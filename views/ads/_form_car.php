<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  $want_or_offer = array(
    'name'  =>  'advertisement[want_or_offer]',
    'class' => 'styled',  
    'model'  => $advertisement, //for_choice
    'field'  => 'want_or_offer', //for_choice
  );
  $price_type = array(
    'name'  =>  'advertisement[price_type]',
    'class' => 'styled',  
    'model'  => $advertisement, //for_choice
    'field'  => 'price_type', //for_choice
  );
  $title = array(
    'name'  =>  'advertisement[title]',
    'id'  => 'title',
    'value'  => $advertisement->title,
    'class'  => 'text',
  );
  $car_year = array(
    'name'  =>  'advertisement[car_year]',
    'id'  => 'car_year',
    'value'  => $advertisement->car_year,
    'maxlength'  => 4,
    'class'  => 'text',
  );
  $car_km = array(
    'name'  =>  'advertisement[car_km]',
    'id'  => 'car_km',
    'value'  => $advertisement->car_km,
    'maxlength'  => 10,
    'class'  => 'text',
  );
  $car_color = array(
    'name'  =>  'advertisement[car_color]',
    'id'  => 'car_color',
    'value'  => $advertisement->car_color,
    'maxlength'  => 20,
    'class'  => 'text',
  );
  $car_passengers = array(
    'name'  =>  'advertisement[car_passengers]',
    'id'  => 'car_passengers',
    'value'  => $advertisement->car_passengers,
    'maxlength'  => 3,
    'class'  => 'text',
  );
  $car_doors = array(
    'name'  =>  'advertisement[car_doors]',
    'id'  => 'car_doors',
    'value'  => $advertisement->car_doors,
    'maxlength'  => 3,
    'class'  => 'text',
  );
  $car_engine_size = array(
    'name'  =>  'advertisement[car_engine_size]',
    'id'  => 'car_engine_size',
    'value'  => $advertisement->car_engine_size,
    'maxlength'  => 5,
    'class'  => 'text',
  );
  $car_traction = array(
    'name'  =>  'advertisement[car_traction]',
    'id'  => 'car_traction',
    'value'  => $advertisement->car_traction,
    'maxlength'  => 10,
    'class'  => 'text',
  );
  $price = array(
    'name'  =>  'advertisement[price]',
    'id'  => 'price',
    'value'  => $advertisement->price,
    'maxlength'  => 10,
    'style' => 'width:40px;margin-right:10px',
    'class'  => 'text',
  );
  $description = array(
    'name'  =>  'advertisement[description]',
    'id'  => 'description',
    'value'  => $advertisement->description,
    'style' => 'height:100px',
    'class'  => 'text-area',
  );
  $car_other_info = array(
    'name'  =>  'advertisement[car_other_info]',
    'id'  => 'car_other_info',
    'value'  => $advertisement->car_other_info,
    'style' => 'height:40px',
    'class'  => 'text-area',
  );

  $promote_priviledged = array(
    'name'	=> 'advertisement[promote_priviledged]',
    'id'	=> 'promote_priviledged',
    'model'  => $advertisement, //for_choice
    'field'  => 'promote_priviledged', //for_choice
    'class' => 'styled',
  );
  $promote_gallery = array(
    'name'	=> 'advertisement[promote_gallery]',
    'id'	=> 'promote_gallery',
    'model'  => $advertisement, //for_choice
    'field'  => 'promote_gallery', //for_choice
    'class' => 'styled',
  );
  $promote_urgent = array(
    'name'	=> 'advertisement[promote_urgent]',
    'id'	=> 'promote_urgent',
    'model'  => $advertisement, //for_choice
    'field'  => 'promote_urgent', //for_choice
    'class' => 'styled',
  );
  $to_be_shared_on_facebook = array(
    'name'	=> 'advertisement[to_be_shared_on_facebook]',
    'id'	=> 'to_be_shared_on_facebook',
    'model'  => $advertisement, //for_choice
    'field'  => 'to_be_shared_on_facebook', //for_choice
    'class' => 'styled',
    'disabled' => ($advertisement->draft < 1),
  );
  $to_be_shared_on_twitter = array(
    'name'	=> 'advertisement[to_be_shared_on_twitter]',
    'id'	=> 'to_be_shared_on_twitter',
    'model'  => $advertisement, //for_choice
    'field'  => 'to_be_shared_on_twitter', //for_choice
    'class' => 'styled',
    'disabled' => ($advertisement->draft < 1),
  );
  $to_be_shared_on_kijiji = array(
    'name'	=> 'advertisement[to_be_shared_on_kijiji]',
    'id'	=> 'to_be_shared_on_kijiji',
    'model'  => $advertisement, //for_choice
    'field'  => 'to_be_shared_on_kijiji', //for_choice
    'class' => 'styled',
    'disabled' => ($advertisement->draft < 1),
  );
  $website = array(
    'name'  =>  'advertisement[website]',
    'id'  => 'website',
    'value'  => $advertisement->website,
    'class'  => 'text',
  );
  $is_show_phone = array(
    'name'	=> 'advertisement[is_show_phone]',
    'id'	=> 'is_show_phone',
    'model'  => $advertisement, //for_choice
    'field'  => 'is_show_phone', //for_choice
    'class' => 'styled',
  );
  $is_contact_skype = array(
    'name'	=> 'advertisement[is_contact_skype]',
    'id'	=> 'is_contact_skype',
    'model'  => $advertisement, //for_choice
    'field'  => 'is_contact_skype', //for_choice
    'class' => 'styled',
  );
 ?>
<div id="wizard">
    <div id="status" class="cs-buttons"> <a id="cs-button-games-1" class="cs-button-games cs-active" href="<?php echo uri_string(); ?>#"><span>&nbsp;</span>1</a> <a id="cs-button-games-2" class="cs-button-games" href="<?php echo uri_string(); ?>#"><span>&nbsp;</span>1</a><a id="cs-button-games-3" class="cs-button-games" href="<?php echo uri_string(); ?>#"><span>&nbsp;</span>1</a> <a id="cs-button-games-4" class="cs-button-games" href="<?php echo uri_string(); ?>#"><span>&nbsp;</span>1</a> </div>
  <div class="items"> 

    <!-- page1 -->
    <div class="page">
      <h4 class="page-head">Informations generales de I'announce</h4>
      <ul class="form-reg">
        <!-- email -->
        <li class="required" id="cities">
        <label >Region <span>*</span></label>
        <?php echo form_dropdown('region_id', $regions, '', 'onChange="populate_provinces(this.value);"'); ?>
        <?php echo active_errors($advertisement, 'region_id' ); ?>
        <?php if(!empty($cities))
        {
        ?>
        <span id="cityspan"><label >City <span>*</span></label>
        <h4>
        <?php
          foreach($cities as $id => $city){
            echo $city;break;  
          }
        ?>
        </h4>
        </span>
        <?php } ?>
        </li>
        <li class="required">
        <label>Choice <span>*</span></label>
        <p class="fl">
        <?php echo form_radio(for_choice($want_or_offer,'offering')); ?>
        I am Offering&nbsp;&nbsp;</p>

        <p class="fl">
        <?php echo form_radio(for_choice($want_or_offer, 'searching')); ?>
        I am Searching&nbsp;&nbsp;</p>
        <?php echo active_errors($advertisement, 'want_or_offer' ); ?>
        </li>

        <!-- username -->
        <li>
        <label>Price <span>*</span></label>
        <p class="fl">
        <?php echo form_radio(for_choice($price_type,'custom')); ?>
        <?php echo form_input($price) ?>
        </p>      
        <p class="fl">
        <?php echo form_radio(for_choice($price_type,'free')); ?>
        Free&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p class="fl">
        <?php echo form_radio(for_choice($price_type,'on_request')); ?>
        On Request&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p class="fl">
        <?php echo form_radio(for_choice($price_type,'exchange')); ?>
        Exchange&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <?php echo active_errors($advertisement, 'price_type' ); ?>
        </li>

        <!-- password -->
        <li class="required">
        <label> Title <span>*</span> </label>
        <?php echo form_input($title); ?>
        <?php echo active_errors($advertisement, 'title' ); ?>
        </li>
        <li class="required">
        <label> Description <span>*</span> </label>
        <?php echo form_textarea($description); ?>
        <?php echo active_errors($advertisement, 'description' ); ?>
        </li>
        <li class="">
        <label> Add a website for 3.99 $ </label>
        <?php echo form_input($website); ?>
        <?php echo active_errors($advertisement, 'website' ); ?>
        </li>
        <li class="">
        <label style="width:300px;">Keep your Phone visible ? </label>
        
        <?php echo form_checkbox(for_choice($is_show_phone,'yes')); ?> 
        <?php echo form_label('Show Phone', $is_show_phone['id']); ?>
        </li>
        <li class="">
        <label style="width:300px;">Contact you by Skype ?</label>
        
        <?php echo form_checkbox(for_choice($is_contact_skype,'yes')); ?> 
        <?php echo form_label('Contact by Skype', $is_contact_skype['id']); ?>
        </li>
        <li >
        <label> Select your Photos </label>
        <input class="text text-small" name="image"  id="file_upload" type="file" style="width:175px; margin-right:4px;">
        </li>


        <div id="image-preview" class="load-image">
          <ul class="maketabs profile-load">
<?php 
  if(!empty($images))
  {
    foreach($images as $image) 
    {
      $checkbox =  '<input type="checkbox" name="advertisement[image_ids][]" value="'.$image->id.'"  checked="checked"  /> ';
      $image_tag = '<img src="'. $image->url_path.'" alt="" title="" />';
      echo '<li>'.$checkbox.$image_tag.'</li>';
    }
  }


?>
 


          </ul>
        </div>
        </li>

        <li class="clearfix">
        <button type="button" class="next right black-button">Next</button>
        </li>


      </ul>
      <div class="clr">&nbsp;</div>
    </div>

<!-- page2 -->
    <div class="page">
      <h4 class="page-head">Informations generales de I'announce</h4>
      <ul class="form-reg">
        <li class="required">
          <label class="small">Brand <span>*</span></label>
          <?php echo form_dropdown('advertisement[carbrand_id]', $carbrands, ''); ?>
          <?php echo active_errors($advertisement, 'carbrand_id' ); ?>
        </li>

        <li class="required half">
          <label class="small">Model <span>*</span></label>
          <?php echo form_dropdown('advertisement[carmodel_id]', $carmodels, ''); ?>
          <?php echo active_errors($advertisement, 'carmodel_id' ); ?>
        </li>
        
        <!-- zip / city -->
        <li class="required half">
          <label class="small">Type <span>*</span></label>
          <?php echo form_dropdown('advertisement[car_condition]', array('Used'=>'Used','New'=>'New'), ''); ?>
          <?php echo active_errors($advertisement, 'car_condition' ); ?>
        </li>
        <li class="required half">
          <label class="small">Superstructure <span>*</span></label>
          <?php echo form_dropdown('advertisement[car_type]', array('Sedan'=>'Sedan','Sport'=>'Sport'), ''); ?>
          <?php echo active_errors($advertisement, 'car_type' ); ?>
        </li>
        <li class="required">
          <label class="small">Year <span>*</span></label>
          <?php echo form_input($car_year); ?>
          <?php echo active_errors($advertisement, 'car_year' ); ?>
        </li>
        <li class="required">
          <label class="small">Mile <span>*</span></label>
          <?php echo form_input($car_km); ?>
          <?php echo active_errors($advertisement, 'car_km' ); ?>
        </li>
        <li class="required">
          <label class="small">Color <span>*</span></label>
          <?php echo form_input($car_color); ?>
          <?php echo active_errors($advertisement, 'car_color' ); ?>
        </li>
        <li class="required half">
          <label class="small">Air Conditioning <span>*</span></label>
          <?php echo form_dropdown('advertisement[car_airconditioning]', array('No'=>'No','Yes'=>'Yes'), ''); ?>
          <?php echo active_errors($advertisement, 'car_airconditioning' ); ?>
        </li>
        <li class="required">
          <label class="small">Number of Passenger(s) <span>*</span></label>
          <?php echo form_input($car_passengers); ?>
          <?php echo active_errors($advertisement, 'car_passengers' ); ?>
        </li>
        <li class="required half">
          <label class="small">Transmission <span>*</span></label>
          <?php echo form_dropdown('advertisement[car_transmission]', array('Auto'=>'Auto','Manual'=>'Manual'), ''); ?>
          <?php echo active_errors($advertisement, 'car_transmission' ); ?>
        </li>
        <li class="required half">
          <label class="small">Fuel <span>*</span></label>
          <?php echo form_dropdown('advertisement[car_fueltype]', array('Petrol'=>'Petrol','Diesel'=>'Diesel'), ''); ?>
          <?php echo active_errors($advertisement, 'car_fueltype' ); ?>
        </li>
        <li class="required">
          <label class="small">Number of Door(s) <span>*</span></label>
          <?php echo form_input($car_doors); ?>
          <?php echo active_errors($advertisement, 'car_doors' ); ?>
        </li>
        <li class="">
          <label class="small">Engine(ex. 2.9L/100Km) </label>
          <?php echo form_input($car_engine_size); ?>
          <?php echo active_errors($advertisement, 'car_engine_size' ); ?>
        </li>
        <li class="required">
          <label class="small">Traction <span>*</span></label>
          <?php echo form_input($car_traction); ?>
          <?php echo active_errors($advertisement, 'car_traction' ); ?>
        </li>
        <li class="">
          <label class="small">Other Information </label>
          <?php echo form_input($car_other_info); ?>
          <?php echo active_errors($advertisement, 'car_other_info' ); ?>
        </li>
        <li class="border-bottom">&nbsp;</li>
        <li class="clearfix">
          <button type="button" class="prev disabled black-button" style="float:left"> Previous </button>
          <button type="button" class="next right black-button"> Next </button>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
    </div>
    <!-- page3 -->
    <div class="page">
      <h4 class="page-head">Share your add on these site and social network</h4>
      <ul class="form-reg share-module">
        <li class="centerAll">
        <img src="assets/images/fb_icon.png" alt="" title="" /><br />
        
        <?php echo form_checkbox(for_choice($to_be_shared_on_facebook,'on')); ?> 
        <?php echo form_label('Facebook Share', $to_be_shared_on_facebook['id']); ?>
        </li>
        <li class="centerAll">
        <img src="assets/images/twitter_icon.png" alt="" title="" /><br />
        
        <?php echo form_checkbox(for_choice($to_be_shared_on_twitter,'on')); ?> 
        <?php echo form_label('Twitter Share', $to_be_shared_on_twitter['id']); ?>
        </li>
        <li class="centerAll">
        <img src="assets/images/kijiji_logo.png" alt="" title="" /><br />
        
        <?php echo form_checkbox(for_choice($to_be_shared_on_kijiji,'on')); ?> 
        <?php echo form_label('Kijiji Share', $to_be_shared_on_kijiji['id']); ?>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
      <p class="border-bottom">&nbsp;</p>
      <div class="clearfix">
        <button type="button" class="prev disabled black-button" style="float:left"> Previous </button>
        <button type="button" class="next right black-button fr"> Next </button>
      </div>
      <div class="clr">&nbsp;</div>
    </div>
    <!-- page4 -->
    <div class="page">
      <h4 class="page-head">Promote your ads</h4>
      <ul class="form-reg">
        <li class="">
        <label style="width:300px;">Add to priviledged ad - $8.99 ? </label>
        
        <?php echo form_checkbox(for_choice($promote_priviledged,'on')); ?> 
        <?php echo form_label('Ad Priviledge', $promote_priviledged['id']); ?>
        </li>
        <li class="">
        <label style="width:300px;">Add to gallery - $24.99 ? </label>
        
        <?php echo form_checkbox(for_choice($promote_gallery,'on')); ?> 
        <?php echo form_label('Ad Gallery', $promote_gallery['id']); ?>
        </li>
        <li class="">
        <label style="width:300px;">Add an "Urgent" tag - $5.99</label>
        
        <?php echo form_checkbox(for_choice($promote_urgent,'on')); ?> 
        <?php echo form_label('Ad Urgent', $promote_urgent['id']); ?>
        </li>
        <li class="border-bottom">&nbsp;</li>
        <li class="clearfix centerAll">
          <button type="button" class="prev disabled black-button" style="float:left"> Previous </button>
          <button type="submit" class="black-button" style="" > <?php if($advertisement->draft > 0) echo 'Preview';  else echo 'Publish'; ?></button>
        </li>
      </ul>

      <div class="clr">&nbsp;</div>
    </div>
  </div>
  <!--items-->
  <div class="clr">&nbsp;</div>
</div>
<!--wizard-->

