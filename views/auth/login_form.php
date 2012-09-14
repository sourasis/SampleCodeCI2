<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>
<?php

$login_by_username =      (isset($login_by_username))?$login_by_username:FALSE;
$login_by_email =         (isset($login_by_email))?$login_by_email:FALSE;
$fburl = 'sessions/facebook';
$twurl = 'sessions/twitter';

$login = array(
  'name'	=> 'login',
  'id'	=> 'login',
  'value' => set_value('login'),
  'maxlength'	=> 80,
  'style'	=> 'width:250px',
  'class' => 'text',
);
if ($login_by_username AND $login_by_email) {
  $login_label = 'Email or login';
} else if ($login_by_username) {
  $login_label = 'Login';
} else {
  $login_label = 'Email';
}
$password = array(
  'name'	=> 'password',
  'id'	=> 'password',
  'style'	=> 'width:250px',
  'class' => 'text',
);
$remember = array(
  'name'	=> 'remember',
  'id'	=> 'remember',
  'value'	=> 1,
  'checked'	=> set_value('remember'),
  'class' => 'styled',
);
$captcha = array(
  'name'	=> 'captcha',
  'id'	=> 'captcha',
  'maxlength'	=> 8,
);
?>
<div id="container" style="margin-top:0px;">
<div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo; <h1 class="breadcrums-text">Login</h1></div>
<!-- Left Section--> 
<section class="left-section">

<?php echo form_open('auth/login'); ?>
<fieldset>
  <ul class="makelist login-form">
    <li>
    <?php echo form_label($login_label, $login['id']); ?><br />
    <?php echo form_input($login); ?>
    <?php echo form_error($login['name']); ?>
    <?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
    </li>
    <li>
    <?php echo form_label('Password', $password['id']); ?><br />
    <?php echo form_password($password); ?>
    <?php echo form_error($password['name']); ?>
    <?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
    </li>
    <li class="">
    <span class="fl text11">
    <?php echo form_checkbox($remember); ?> 
    <?php echo form_label('Remember me', $remember['id']); ?>
    </span>
    </li>
    <li><br />
    <span class="fr text11">
    <?php echo anchor($fburl, 'Facebook'); ?> &nbsp;|&nbsp;      
    <?php echo anchor($twurl, 'Twitter'); ?> &nbsp;|&nbsp;      
    <?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?> &nbsp;|&nbsp;
    <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
    </span>
    </li>
    <li>
      <input type="submit" class="black-button" value="Submit" name="" id="" /> 
    </li>
  </ul>
</fieldset>
<?php echo form_close(); ?>
</section>
<!-- end Left Section--> 
<!-- Right section -->
  <aside>
    <div class="grey-box">
      <h4 class="page-head blue-clr text20">User Info</h4>
      <ul class="makelist side-form">
        <li><a href="#" class="strong text14 blue-clr"><span class="contact-icons">&nbsp;</span>Djibril Bahre</a></li>
        <li><span class="contact-icons msg">&nbsp;</span>Contact To User</li>
        <li><span class="contact-icons mphone">&nbsp;</span>418 - 222 - 5555</li>
      </ul>
      <p class="border-top">&nbsp;</p>
      <a href="#" class="green-clr strong">See all user's ad</a>
      <div class="clr">&nbsp;</div>
      <span class="shadow side">&nbsp;</span> </div>
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
