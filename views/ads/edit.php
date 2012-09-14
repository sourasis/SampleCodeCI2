<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>

<div id="container">
  <div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo;
    <h1 class="breadcrums-text">Contact Us</h1>
  </div>
  <!-- Left Sction-->
  <section class="left-section"> 
    <!--Main Box-->
    <div class="side-box">
      <h2 class="article-head border-radius-top">Add New Ads</h2>
      <div class="main-body">
        <div id="drawer"> Please fill in the empty fields marked with a <samp style="color:red">red</samp> border. </div>

<?php

echo form_open_multipart(
  $advertisement->update_url(),'',
  array(
    'id' => $advertisement->id,     
  )
);
?>

<?php
  if($subcategory->category->type == 'GeneralCategory')
  {
    $this->load->view('ads/_form.php');
  }
  elseif($subcategory->category->type == 'CarCategory')
  {
    $this->load->view('ads/_form_car.php');
  }
  elseif($subcategory->category->type == 'RealEstateCategory')
  {
    $this->load->view('ads/_form_realestate.php');
  }
?>

<?php echo form_close(); ?>

            <script>
  $(function() {
      var root = $("#wizard").scrollable();
  
      // some variables that we need
    var api = root.scrollable(), drawer = $("#drawer");

    // validation logic is done inside the onBeforeSeek callback
    api.onBeforeSeek(function(event, i) {

    // we are going 1 step backwards so no need for validation
    if (api.getIndex() < i) {

		         // 1. get current page
		         var page = root.find(".page").eq(api.getIndex()),

			 // 2. .. and all required fields inside the page
			 inputs = page.find(".required :input").removeClass("error"),

			 // 3. .. which are empty
			 empty = inputs.filter(function() {
			 return $(this).val().replace(/\s*/g, '') == '';
			 });

		         // if there are empty fields, then
		         if (empty.length) {

			 // slide down the drawer
			 drawer.slideDown(function()  {

			 // colored flash effect
			 drawer.css("backgroundColor", "#fffac0");
			 setTimeout(function() { drawer.css("backgroundColor", "#fffac0"); }, 1000);
			 });

			 // add a CSS class name "error" for empty & required fields
			 empty.addClass("error");

			 // cancel seeking of the scrollable by returning false
			 return false;

		         // everything is good
		         } else {

			 // hide the drawer
			 drawer.slideUp();
		         }

	                 }

	                 // update status bar
	                 $("#status a").removeClass("cs-active").eq(i).addClass("cs-active");

                         });
                         
                             // if tab is pressed on the next button seek to next page
    root.find("button.next").keydown(function(e) {
    if (e.keyCode == 9) {

    // seeks to next tab by executing our validation routine
    api.next();
    e.preventDefault();
    }
    });
                           });
</script> 
      </div>
    </div>
    <!--Main Box-->
    <div class="clr">&nbsp;</div>
    <p class="cntnt-bot">&nbsp;</p>
  </section>
  <!-- end Left SEction--> 
  
  <!-- Right section -->
  <aside>
    <div class="side-box blue-module">
      <h2 class="side-head">Promo Du jour</h2>
      <div class="images box"> <img src="assets/images/mod1.jpg" alt="" title="" /> </div>
      <div class="box-text">
        <p><span class="grey6">Fathers Day</span> June 17, Free Shiping
          Dads do amazing Things. Gift 
          accordingly... <a href="#">by clicbye.com</a></p>
        <a href="#" class="green-button">View Details</a></div>
    </div>
    <div class="side-box green-module">
      <h2 class="head-green">Social</h2>
      <div class="images aside"> <img src="assets/images/mod1.jpg" alt="" title="" /> </div>
      <div class="box-text side fr">
        <p class="blue-clr strong">Lorem ipsum dolor sit amet, 
          consectetur adipisicing elit, sed do eiusmod tempor</p>
      </div>
      <div class="clr">&nbsp;</div>
      <div class="box-text" style="padding-top:0px;"><a href="#" class="green-button">View Details</a></div>
      <div class="clr">&nbsp;</div>
    </div>
    <div class="side-box small">
      <h3 class="blue-head">Gagnez Des Points</h3>
      <div class="images bags"><img src="assets/images/bags.png" alt="" title="" /></div>
      <p class="half-wid">Lorem ipsum dolor sit amet, 
        consectetur adipisicing elit, <a href="#">read more</a> </p>
      <div class="clr">&nbsp;</div>
    </div>
    <div class="side-box green-module" style="height:230px;">
      <h4 class="head-green blue">Lasted View</h4>
      <div class="images aside grid"> <img src="assets/images/mod1.jpg" alt="" title="" /> <a href="#" class="green-button">View Details</a>
        <div class="clr">&nbsp;</div>
      </div>
      <div class="images aside grid" style="margin-left:30px;"> <img src="assets/images/mod1.jpg" alt="" title="" /> <a href="#" class="green-button">View Details</a>
        <div class="clr">&nbsp;</div>
      </div>
      <div class="clr">&nbsp;</div>
    </div>
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>

<?php $this->load->view('layouts/footer');
