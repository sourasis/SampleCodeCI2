<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>
<?php
$password = array(
  'name'	=> 'password',
  'id'	=> 'password',
  'size'	=> 30,
);
?>
<div id="container">
  <div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo;
    <h1 class="breadcrums-text">Registration</h1>
  </div>
  <!-- Left Sction-->
  <section class="left-section"> 
    <!--Main Box-->
    <div class="side-box">
      <h2 class="article-head border-radius-top">Registration</h2>
      <div class="main-body">
<?php echo form_open($this->uri->uri_string()); ?>
<table>
  <tr>
    <td><?php echo form_label('Password', $password['id']); ?></td>
    <td><?php echo form_password($password); ?></td>
    <td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
  </tr>
</table>
<?php echo form_submit('cancel', 'Delete account'); ?>
<?php echo form_close(); ?>
      </div>
    </div>
    <!--Main Box-->
    
    <div class="clr">&nbsp;</div>
    <p class="cntnt-bot">&nbsp;</p>
  </section>
  <!-- end Left SEction-->
  
  <!-- Right section -->
  <aside>
    <div class="side-box">
      <h2 class="head-green blue">Gift you can win</h2>
      <ul class="makelist image-gal fl">
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
               <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
               <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
        <li class="">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <span class="text11"><a href="#" class="blue-clr">massage 1000 token</a></span></li>
      </ul>
      <div class="clr">&nbsp;</div>
    </div>
    
    <div class="side-box blue-module">
      <h2 class="side-head">Token Info</h2>
      <div class="images box"> <img src="assets/images/mod1.jpg" alt="" title="" /> </div>
      <div class="box-text">
        <p><span class="grey6">Fathers Day</span> June 17, Free Shiping
          Dads do amazing Things. Gift 
          accordingly... <a href="#">by clicbye.com</a></p>
        <a href="#" class="green-button">View Details</a></div>
    </div>
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>
<?php $this->load->view('layouts/footer');