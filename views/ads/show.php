<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>


<div id="container" style="margin-top:0px;">
  <div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo; <h1 class="breadcrums-text">Product Listings</h1></div>
  <!-- Left Sction-->
<?php
if($advertisement->draft > 0 ) 
{
  echo form_open(
    Advertisement::publish_url(),'',
    array(
      'id' => $advertisement->id,     
    )
  );
?>
  <section class="left-section"> 
    <!--Main Box-->
    <div class="side-box">
      <h3 class="article-head">This has not been published.  This is a preview.</h3>
      <div class="main-body ">
  <a href="<?php  echo $advertisement->edit_url(); ?>"><button type="button" class="black-button" style="" > Modify </button></a>
  <button type="submit" class="black-button" style="" > Publish </button>
</div>
</div>
</section>
<?php
} 
  if($subcategory->category->type == 'GeneralCategory')
  {
    $this->load->view('ads/_single.php');
  }
  elseif($subcategory->category->type == 'CarCategory')
  {
    $this->load->view('ads/_single_car.php');
  }
  elseif($subcategory->category->type == 'RealEstateCategory')
  {
    $this->load->view('ads/_single_realestate.php');
  }

  if($advertisement->draft > 0 ) echo form_close();
?>
  <!-- end Left Section--> 
  <!-- Right section -->
  <aside>
<?php if($current_user){?>      
    <div class="grey-box">
      <h4 class="page-head blue-clr text20">User Info</h4>
      <ul class="makelist side-form">
        <li><a href="#" class="strong text14 blue-clr"><span class="contact-icons">&nbsp;</span><?php echo $current_user->name; ?></a></li>
        <li><span class="contact-icons msg">&nbsp;</span><a mailto="<?php echo $current_user->email; ?>">Contact To User</a></li>
        <li><span class="contact-icons mphone">&nbsp;</span><?php echo $current_user->telephone; ?><br /></li>
      </ul>
      <p class="border-top">&nbsp;</p>
      <a href="#" class="green-clr strong">See all user's ad</a>

      <div class="clr">&nbsp;</div>
      <span class="shadow side">&nbsp;</span>
    </div>
<?php } ?>
    <div class="grey-box">
      <h4 class="page-head">Compare listing<a href="#" class="blue-clr text12 strong fr">Clear All</a></h4>
      <ul class="makelist image-gal fl">
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
      </ul>
      <div class="clr">&nbsp;</div>
      <span class="shadow side">&nbsp;</span> </div>
    <div class="clr">&nbsp;</div>
    <p class="centerAll"> <a href="#" class="green-button">Compare</a></p>
    <div class="side-box">
      <h2 class="head-green blue">Last Viewed</h2>
      <ul class="makelist image-gal fl">
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <a href="#">Delete</a></li>
      </ul>
      <div class="clr">&nbsp;</div>
    </div>
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>

<?php $this->load->view('layouts/footer');
