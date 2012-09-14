<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php //var_dump($advertisement); ?>
  <section class="left-section"> 
    <!--Main Box-->
    <div class="side-box">
      <h1 class="article-head">
                   <?php echo _h(ellipsize(
                                        $advertisement->carmodel->carbrand->name."-".    
                                        $advertisement->carmodel->name." > ".
                                        $advertisement->title,40,1));
                  ?>
      </h1>
      <div class="main-body listings">
        <div class="padding">
          <ul class="makelist list-heading details fl">
            <li class="first"><span class="grey4">Price:&nbsp;</span><?php echo _h($advertisement->price);?> <?php echo _h($advertisement->currency_type);?></li>
            <li><span class="grey4">Place:&nbsp;</span><?php echo $advertisement->city->name; ?></li>
            <li><span class="grey4">Ad Type:&nbsp;</span><?php echo $advertisement->posted_since; ?></li>
          </ul>
          <ul class="makelist right-details fr">
            <li>Ad Number <?php echo $advertisement->id; ?></li>
            <li><?php echo $advertisement->posted_since; ?></li>
            <li>Share On:&nbsp;&nbsp;<a href="#"><img src="assets/images/fb-icon-small.jpg" alt="" title="" /></a>&nbsp;&nbsp; <a href="#"><img src="assets/images/tweet-icon.jpg" alt="" title="" /></a></li>
          </ul>
          <div class="clr">&nbsp;</div>
        </div>
        <ul class="maketabs list-bottom details">
          <li><span class="plus-icon">&nbsp;</span><a href="#">Add To sender List</a></li>
          <li><span class="plus-icon gloc">&nbsp;</span><a href="#">See on the Map</a></li>
          <li>
            <input type="checkbox" class="styled" style="margin-right:10px;"/>
            Add Compare List</li>
          <li  style="border:0;"><span class="plus-icon signal-icon">&nbsp;</span><a href="#">Signal Fraud</a></li>
<?php if(!empty($current_user) AND $current_user->id == $advertisement->user_id) { ?>
          <li  style="border:0;"><span class="plus-icon edit">&nbsp;</span><a href="<?php echo $advertisement->edit_url();?>">Edit</a></li>
<?php } ?>
        </ul>
        <div class="padding">
          <p class="blue-clr strong">Description</p>
          <p><?php echo _h($advertisement->description); ?></p>
          <div class="gallery-module"><!-- wrapper element for the large image -->
            <div id="image_wrap"> 
              <!-- Initially the image is a simple 1x1 pixel transparent GIF --> 
              <?php if($advertisement->has_image()) { ?>
              <img id="ad_cover_image" src="<?php echo $advertisement->image_path; ?>" width="500" height="375" alt="" title="" /> </div>
              <?php } ?>
            <!--<div class="centerAll"><a href="#" class="strong blue-clr">Play Diaporama</a></div>-->
            
            <!-- HTML structures -->
            <div class="scroller"> 
              <!-- "previous page" action --> 
              <a class="prev browse left"></a> 
              <!-- root element for scrollable -->
              <div class="scrollable" id="scrollable"> 
                <!-- root element for the items -->
                <div class="items"> 
<?php
  if(!empty($images))
  {
    echo '<div>';
    foreach($images as $image) 
    {
      $image_tag = '<img src="'. $image->url_path.'" alt="" title="" onClick="changeimage(\'ad_cover_image\',\''.$image->url_path.'\')"/>';
      echo $image_tag;
    }
    echo '</div>';
  }


/*
                  <!-- 1-5 -->
                  <div> <img src="assets/images/detail-img.jpg" alt="" title="" /> <img src="http://farm4.static.flickr.com/3089/2796719087_c3ee89a730_t.jpg" alt="" title="" /> <img src="http://farm1.static.flickr.com/79/244441862_08ec9b6b49_t.jpg" alt="" title="" /> <img src="http://farm1.static.flickr.com/28/66523124_b468cf4978_t.jpg" alt="" title="" /> <img src="http://farm1.static.flickr.com/28/66523124_b468cf4978_t.jpg" alt="" title="" /> </div>
                  
                  <!-- 5-10 -->
                  <div> <img src="http://farm1.static.flickr.com/163/399223609_db47d35b7c_t.jpg"  alt="" title=""/> <img src="http://farm1.static.flickr.com/135/321464104_c010dbf34c_t.jpg" alt="" title="" /> <img src="http://farm1.static.flickr.com/40/117346184_9760f3aabc_t.jpg" alt="" title="" /> <img src="http://farm1.static.flickr.com/153/399232237_6928a527c1_t.jpg" alt="" title="" /> <img src="http://farm1.static.flickr.com/28/66523124_b468cf4978_t.jpg" alt="" title="" /> </div>
                  
                  <!-- 10-15 -->
                  <div> <img src="http://farm4.static.flickr.com/3629/3323896446_3b87a8bf75_t.jpg" alt="" title="" /> <img src="http://farm4.static.flickr.com/3023/3323897466_e61624f6de_t.jpg" alt="" title="" /> <img src="http://farm4.static.flickr.com/3650/3323058611_d35c894fab_t.jpg" alt="" title="" /> <img src="http://farm4.static.flickr.com/3635/3323893254_3183671257_t.jpg" alt="" title=""/> <img src="http://farm1.static.flickr.com/28/66523124_b468cf4978_t.jpg" alt="" title="" /> </div>
                  </div>

 */

?>
              </div>
			  </div>
              <a class="next browse right"></a> </div>
          </div>
          <div class="clr">&nbsp;</div>
        </div>

        <div class="details">
          <h2 class="article-head blue-clr">Characteristics<span class="plus-blue"><a href="javascript:ShowContent('prd-details');"><img src="assets/images/plus_img.png" alt="" /></a></span></h2>
          <div class="padding" id="prd-details" style="display:none">
            <ul class="makelist list-details fl">
              <li><span class="strong">Brand:</span><span><?php echo _h($advertisement->carmodel->carbrand->name); ?></span></li>
              <li><span class="strong">Model:</span><span><?php echo _h($advertisement->carmodel->name); ?></span></li>
              <li><span class="strong">Type:</span><span><?php echo _h($advertisement->car_condition); ?></span></li>
              <li><span class="strong">Superstructure:</span><span><?php echo _h($advertisement->car_type); ?></span></li>
              <li><span class="strong">Year:</span><span><?php echo _h($advertisement->car_year); ?></span></li>
              <li><span class="strong">Mile:</span><span><?php echo _h($advertisement->car_km); ?></span></li>
              <li><span class="strong">Number of Door(s):</span><span><?php echo _h($advertisement->car_doors); ?></span></li>
              <li><span class="strong">Engine:</span><span><?php echo _h($advertisement->car_engine_size); ?></span></li>
              <li><span class="strong">Traction:</span><span><?php echo _h($advertisement->car_traction); ?></span></li>
            </ul>
            <ul class="makelist list-details fl">
              <li><span class="strong">Color:</span><span><?php echo _h($advertisement->car_color); ?></span></li>
              <li><span class="strong">Air Conditioning:</span><span><?php echo _h($advertisement->car_airconditioning); ?></span></li>
              <li><span class="strong">Number of Passenger(s):</span><span><?php echo _h($advertisement->car_passengers); ?></span></li>
              <li><span class="strong">Transmission:</span><span><?php echo _h($advertisement->car_transmission); ?></span></li>
              <li><span class="strong">Fuel:</span><span><?php echo _h($advertisement->car_fueltype); ?></span></li>
            </ul>
            <div class="clr">&nbsp;</div>
            <p><strong>Other Information: &nbsp;</strong><?php echo _h($advertisement->car_other_info); ?></p>
            <div class="clr">&nbsp;</div>
          </div>
        </div>

        <div class="clr">&nbsp;</div>
        <span class="shadow list">&nbsp;</span> </div>
      <!--Main Box--> 
    </div>
  </section>
