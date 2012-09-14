<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>
<?php
if ($use_username) {
  $username = array(
    'name'	=> 'username',
    'id'	=> 'username',
    'value' => set_value('username'),
    'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
    'size'	=> 30,
  );
}
$email = array(
  'name'	=> 'email',
  'id'	=> 'email',
  'value'	=> set_value('email'),
  'maxlength'	=> 80,
  'size'	=> 30,
);
$password = array(
  'name'	=> 'password',
  'id'	=> 'password',
  'value' => set_value('password'),
  'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
  'size'	=> 30,
);
$confirm_password = array(
  'name'	=> 'confirm_password',
  'id'	=> 'confirm_password',
  'value' => set_value('confirm_password'),
  'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
  'size'	=> 30,
);
$captcha = array(
  'name'	=> 'captcha',
  'id'	=> 'captcha',
  'maxlength'	=> 8,
);
?>
<div id="container" style="margin-top:0px;">
<div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo; <h1 class="breadcrums-text">Register</h1></div>
<!-- Left Section--> 
<section class="left-section"> 
<?php echo form_open($this->uri->uri_string()); ?>
<table>
  <?php if ($use_username) { ?>
  <tr>
    <td><?php echo form_label('Username', $username['id']); ?></td>
    <td><?php echo form_input($username); ?></td>
    <td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td><?php echo form_label('Email Address', $email['id']); ?></td>
    <td><?php echo form_input($email); ?></td>
    <td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
  </tr>
  <tr>
    <td><?php echo form_label('Password', $password['id']); ?></td>
    <td><?php echo form_password($password); ?></td>
    <td style="color: red;"><?php echo form_error($password['name']); ?></td>
  </tr>
  <tr>
    <td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
    <td><?php echo form_password($confirm_password); ?></td>
    <td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
  </tr>

<?php if ($captcha_registration) {
  if ($use_recaptcha) { ?>
  <tr>
    <td colspan="2">
      <div id="recaptcha_image"></div>
    </td>
    <td>
      <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
      <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
      <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="recaptcha_only_if_image">Enter the words above</div>
      <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
    </td>
    <td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
    <td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
    <?php echo $recaptcha_html; ?>
  </tr>
  <?php } else { ?>
  <tr>
    <td colspan="3">
      <p>Enter the code exactly as it appears:</p>
      <?php echo $captcha_html; ?>
    </td>
  </tr>
  <tr>
    <td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
    <td><?php echo form_input($captcha); ?></td>
    <td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
  </tr>
<?php }
} ?>
</table>
<?php echo form_submit('register', 'Register'); ?>
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