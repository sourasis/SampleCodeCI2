<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="container" style="margin-top:0px;">
  <div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo;
    <h1 class="breadcrums-text"><?php echo $subcategory->name; ?></h1>
  </div>
  <!-- Left Sction-->
  <section class="left-section">
<?php
      if($subcategory->advertisements)
      {
        foreach($subcategory->advertisements as $adv)
        {
?>
    <!--Main Box-->
    <div class="side-box">
      <h2 class="article-head
<?php
      echo ($this->input->post('promote_priviledged') == 'on' OR
            $this->input->post('promote_gallery') == 'on' OR
            $this->input->post('promote_urgent') == 'on')
            ? 'special' : '';
?>">
<?php echo $adv->title; ?></h2>
      <div class="main-body listings">
        <div class="padding">
          <div class="list-image"> <a href="<?php echo $adv->show_url(); ?>"><img src="<?php echo $adv->image_path; ?>" alt="" title="" /></a> </div>
          <ul class="maketabs list-heading">
            <li class="first"><?php echo $adv->price; ?> <?php echo $adv->currency_type; ?></li>
            <!--<li>Quebec (165 km)</li>-->
            <li><?php echo $adv->posted_since; ?></li>
          </ul>
          <p><?php echo ellipsize($adv->description,100,1); ?></p>
          <a href="<?php echo $adv->show_url(); ?>" class="blue-button">View Details</a>
          <div class="clr">&nbsp;</div>
        </div>
        <ul class="maketabs list-bottom">
          <li><span class="plus-icon">&nbsp;</span>Add To sender List</li>
          <li><img src="assets/images/fb-like.jpg" alt="" title=""/></li>
          <li><img src="assets/images/tweet-like.jpg" alt="" title=""/></li>
          <li><span class="plus-icon gloc">&nbsp;</span>See on the Map</li>
          <li style="border:0;">
            <input type="checkbox" class="styled" style="margin-right:10px;"/>
            Add Compare List</li>
        </ul>
        <div class="clr">&nbsp;</div>
      </div>
      <span class="shadow list">&nbsp;</span>
    </div>
    <!-- end Main Box--> 
    
<?php
        }
      }
      else echo "No advertisements listed in this category";

?>
    <!--Main Box-->
<!--
    <div class="side-box">
      <h2 class="article-head special">Title</h2>
      <div class="main-body listings">
        <div class="padding">
          <div class="list-image"> <img src="assets/images/listing-side.jpg" alt="" title="" /> </div>
          <ul class="maketabs list-heading">
            <li class="first">655 $</li>
            <li>Quebec (165 km)</li>
            <li>Parue depuis 6 jours</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, ....</p>
          <a href="#" class="blue-button">View Details</a>
          <div class="clr">&nbsp;</div>
        </div>
        <ul class="maketabs list-bottom">
          <li><span class="plus-icon">&nbsp;</span>Add To sender List</li>
          <li><img src="assets/images/fb-like.jpg" alt="" title=""/></li>
          <li><img src="assets/images/tweet-like.jpg" alt="" title=""/></li>
          <li><span class="plus-icon gloc">&nbsp;</span>See on the Map</li>
          <li style="border:0;">
            <input type="checkbox" class="styled" style="margin-right:10px;"/>
            Add Compare List</li>
        </ul>
        <div class="clr">&nbsp;</div>
      </div>
      <span class="shadow list">&nbsp;</span>
    </div>
-->
    <!-- end Main Box-->

    <p class="cntnt-bot">&nbsp;</p>
  </section>
  <!-- end Left SEction--> 
  
  <!-- Right section -->
  <aside>
    <div class="grey-box">
      <h4 class="page-head">General Filter</h4>
      <ul class="makelist side-form">
        <li>
          <input type="checkbox" class="styled" />
          <label>Offre</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Recherche</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Corporatrion</label>
        </li>
        <li class="print-range"><br />
          <label>Price Range:</label>
          <br/>
          <div class="custom">
            <select class="styled">
              <option>$663</option>
            </select>
          </div>
          <span class="fl">To &nbsp;</span>
          <div class="custom mrg-none">
            <select class="styled">
              <option>$663</option>
              <option>$663</option>
              <option>$663</option>
              <option>$663</option>
              <option>$663</option>
            </select>
          </div>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
      <span class="shadow side">&nbsp;</span> </div>
    <div class="grey-box">
      <h4 class="page-head">Filter if Car Listing</h4>
      <ul class="side-form maketabs filter-field">
        <li class="custom">
          <select class="styled">
            <option>Car Mark</option>
          </select>
        </li>
        <li class="custom">
          <select class="styled">
            <option>Car Model</option>
          </select>
        </li>
        <li class="custom">
          <select class="styled">
            <option>Car Color</option>
          </select>
        </li>
        <li class="custom">
          <select class="styled">
            <option>Nb Passenger</option>
          </select>
        </li>
        <li class="custom">
          <select class="styled">
            <option>Gaz Type</option>
          </select>
        </li>
        <li class="custom">
          <select class="styled">
            <option>Auto or manual</option>
          </select>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
      <span class="shadow side">&nbsp;</span> </div>
    
    <!-- Filter if House Listing -->
    <div class="grey-box mrg-none">
      <h4 class="page-head">Filter if House Listing</h4>
      <ul class="makelist side-form filter-field">
        <li class="custom">
          <select class="styled">
            <option>House Type</option>
          </select>
        </li>
        <li class="custom">
          <select class="styled">
            <option>NB Rooms</option>
          </select>
        </li>
        <li class="custom">
          <select class="styled">
            <option>Nb Bathroom</option>
          </select>
        </li>
        <li class="fullwid">
          <input type="text" class="text fl" value="Date Mode" />
          <span class="calender fl">&nbsp;</span></li>
      </ul>
      <div class="clr">&nbsp;</div>
      <span class="shadow side">&nbsp;</span> </div>
    <div class="clr">&nbsp;</div>
    <p class="centerAll"> <a href="#" class="green-button">Submit Filter</a></p>
    
    <!-- Last Viewed -->
    <div class="side-box green-module">
      <h4 class="head-green blue">Last Viewed</h4>
      <ul class="makelist image-gal fl">
        <li class="">
          <div class="image-gal"><a href="#"><img src="assets/images/view-all-img.jpg" alt="" title="" /></a></div>
        </li>
        <li class="">
          <div class="image-gal"><a href="#"><img src="assets/images/view-all-img.jpg" alt="" title="" /></a></div>
        </li>
        <li class="last-clm">
          <div class="image-gal"><a href="#"><img src="assets/images/view-all-img.jpg" alt="" title="" /></a></div>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
    </div>
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>