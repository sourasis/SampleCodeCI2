<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php  $this->load->view('layouts/header'); 

$facebook_url = base_url('/sessions/facebook');
$twitter_url = base_url('/sessions/twitter');

if ($use_username) {
  $username = array(
    'name'	=> 'username',
    'id'	=> 'username',
    'value' => set_value('username'),
    'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
    'class'	=> 'text register',
  );
}
$name = array(
  'name'	=> 'name',
  'id'	=> 'name',
  'value'	=> set_value('name'),
  'maxlength'	=> 80,
  'class'	=> 'text register',
);
$telephone = array(
  'name'	=> 'telephone',
  'id'	=> 'telephone',
  'value' => set_value('telephone'),
  'class'	=> 'text register',
);
$skype = array(
  'name'	=> 'skype',
  'id'	=> 'skype',
  'value' => set_value('skype'),
  'class'	=> 'text register',
);
$email = array(
  'name'	=> 'email',
  'id'	=> 'email',
  'value'	=> set_value('email'),
  'maxlength'	=> 80,
  'class'	=> 'text register',
);
$password = array(
  'name'	=> 'password',
  'id'	=> 'password',
  'value' => set_value('password'),
  'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
  'class'	=> 'text register',
);
$confirm_password = array(
  'name'	=> 'confirm_password',
  'id'	=> 'confirm_password',
  'value' => set_value('confirm_password'),
  'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
  'class'	=> 'text register',
);
$captcha = array(
  'name'	=> 'captcha',
  'id'	=> 'captcha',
  'maxlength'	=> 8,
);
$agreewithme = array(
  'name'	=> 'agreewithme',
  'id'	=> 'agreewithme',
  'value'	=> 1,
  'checked'	=> set_value('agreewithme'),
  'class' => 'styled',
);
$newsletter = array(
  'name'	=> 'newsletter',
  'id'	=> 'newsletter',
  'value'	=> 1,
  'checked'	=> set_value('newsletter'),
  'class' => 'styled',
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
        <div id="drawer"> Please fill in the empty fields marked with	a <samp style="color:red">red</samp> border. </div>
        <?php echo form_open($this->uri->uri_string()); ?>
            <div class="items">
              <div class="page">
                <p>Don't pay to post ads anymore, instead get token for it. Registration is free and simple. Use our form or if you have facebook juste connect to get register. </p>
                <ul class="halfwid form-reg fl brd-right">
                  <!-- Name -->
                  <li class="required">
                    <?php echo form_label('Name&nbsp;<span>*</span>', $name['id'],array('class'=>'register')); ?>
                    <?php echo form_input($name); ?><br />
<?php echo form_error($name['name']); echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?>
                  </li>
                  <!-- username -->
                  <?php if ($use_username) { ?>	
                  <li class="required">
                    <?php echo form_label('Username&nbsp;<span>*</span>', $username['id'],array('class'=>'register')); ?> 
                    <?php echo form_input($username); ?><br />
<?php echo form_error($username['name']); echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
                  </li>
                  <?php } ?>

                  <!-- email -->
                  <li class="required">
                    <?php echo form_label('Email Address&nbsp;<span>*</span>', $email['id'],array('class'=>'register')); ?>
                    <?php echo form_input($email); ?><br />
<?php echo form_error($email['name']); echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
                  </li>

                  <!-- password -->
                  <li class="required">
                    <?php echo form_label('Password&nbsp;<span>*</span>', $password['id'],array('class'=>'register')); ?>
                    <?php echo form_password($password); ?>
<?php echo form_error($password['name']); ?> <br />
                  </li>
                  <li class="required">
                    <?php echo form_label('Confirm Password&nbsp;<span>*</span>', $confirm_password['id'],array('class'=>'register')); ?>
                    <?php echo form_password($confirm_password); ?> <br />
<?php echo form_error($confirm_password['name']); ?>
                  </li>
                  <li class="">
                    <?php echo form_label('Telephone&nbsp;', $telephone['id'],array('class'=>'register')); ?>
                    <?php echo form_input($telephone); ?><br />
<?php echo form_error($telephone['name']); echo isset($errors[$telephone['name']])?$errors[$telephone['name']]:''; ?>
                  </li>
                  <li class="">
                    <?php echo form_label('Skype&nbsp;', $skype['id'],array('class'=>'register')); ?>
                    <?php echo form_input($skype); ?><br />
<?php echo form_error($skype['name']); echo isset($errors[$skype['name']])?$errors[$skype['name']]:''; ?>
                  </li>
                  <li class="required">
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
                  </li>
                  <li>
                    <p>
                      <?php echo form_checkbox($agreewithme); ?> Agree with the term
<?php echo form_error($agreewithme['name']); echo isset($errors[$agreewithme['name']])?$errors[$agreewithme['name']]:''; ?>
                    </p>
                    <p>
                      <?php echo form_checkbox($newsletter); ?> Receive Newsletter
<?php echo form_error($newsletter['name']); echo isset($errors[$newsletter['name']])?$errors[$newsletter['name']]:''; ?>
                    </p>
                  </li>
                  <li class="clearfix">
                    <button type="submit" class="next black-button fl">Register</button>
                  </li>
                </ul>
                <?php echo form_close(); ?>

                <div class="fb-reg fl centerAll">
                  <p class="strong">Use Facebook to register</p>
                  <p><a href="<?php echo $facebook_url; ?>"><img src="assets/images/cnct-fb.png" alt="" title="" /></a></p>
                </div>           
                <div class="clr">&nbsp;</div>
              </div>              
            </div>
            <!--items-->
            <div class="clr">&nbsp;</div>
          <!--wizard-->

        </form>

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
