<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>
<?php

$have_errors = !empty($__errors);

/*
$telephone = array(
  'name'	=> 'telephone',
  'id'	=> 'telephone',
  'value' => $userprofile->telephone,
  'class'	=> 'text register',
);
$skype = array(
  'name'	=> 'skype',
  'id'	=> 'skype',
  'value' => $userprofile->skype,
  'class'	=> 'text register',
);
 */
$sharecontent = array(
  'name'	=> 'sharecontent',
  'id'	=> 'sharecontent',
  'value'	=> $have_errors ? set_value('sharecontent') : '',
  'class' => 'text-area',
  'style' => 'width:98%',
  'rows'  => 5  
);
$fbcheckbox = array(
  'name'	=> 'fbcheckbox',
  'id'	=> 'fbcheckbox',
  'value'	=> 1,
  'checked'	=> $have_errors ? set_value('fbcheckbox') : FALSE,
  'class' => 'styled',
);
$twittercheckbox = array(
  'name'	=> 'twittercheckbox',
  'id'	=> 'twittercheckbox',
  'value'	=> 1,
  'checked'	=> $have_errors ? set_value('twittercheckbox'): FALSE,
  'class' => 'styled',
);

$corp_biz_name = array(
  'name'	=> 'corp_biz_name',
  'id'	=> 'corp_biz_name',
  'value' => $userprofile->corp_biz_name,
  'class'	=> 'text register',
);
$corp_contactperson = array(
  'name'	=> 'corp_contactperson',
  'id'	=> 'corp_contactperson',
  'value' => $userprofile->corp_contactperson,
  'class'	=> 'text register',
);
$corp_address = array(
  'name'	=> 'corp_address',
  'id'	=> 'corp_address',
  'value' => $userprofile->corp_address,
  'class'	=> 'text register',
);
$postalcode = array(
  'name'	=> 'postalcode',
  'id'	=> 'postalcode',
  'value'	=> $userprofile->postalcode,
  'maxlength'	=> 80,
  'class'	=> 'text register',
);
$city = array(
  'name'	=> 'city',
  'id'	=> 'city',
  'value' => $userprofile->city,
  'class'	=> 'text register',
);
$corp_telephone = array(
  'name'	=> 'corp_telephone',
  'id'	=> 'corp_telephone',
  'value' => ($userprofile->corp_telephone)?$userprofile->corp_telephone:$user->telephone,
  'class'	=> 'text register',
);
$corp_fax = array(
  'name'	=> 'corp_fax',
  'id'	=> 'corp_fax',
  'value' => $userprofile->corp_fax,
  'class'	=> 'text register',
);
$corp_website = array(
  'name'	=> 'corp_website',
  'id'	=> 'corp_website',
  'value' => $userprofile->corp_website,
  'class'	=> 'text register',
);
$corp_logopath = array(
  'name'	=> 'corp_logopath',
  'id'	=> 'corp_logopath',
  'value'	=> $userprofile->corp_logopath,
  'style' => "width:175px; margin-right:4px;",
  'class'	=> 'text text-small',
);
$corp_biz_description = array(
  'name'	=> 'corp_biz_description',
  'id'	=> 'corp_biz_description',
  'value' => $userprofile->corp_biz_description,
  'class'	=> 'text',
);
$corp_package = array(
  'name'	=> 'corp_package',
  'id'	=> 'corp_package',
  'value' => set_value('corp_package'),
  'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
  'class'	=> 'text register',
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

            <!-- page1 -->
            <div class="page">
              <h4 class="page-head">Welcome to clicbye </h4>
              <p>You almost done. You can start winning token by inviting your friends from Facebook and Twitter. By doing that, every time you post a message or look from something, we will share with your friend's your need. Every friend that will register will give you token. Look in the right boxe what you can get for token</p>
              <ul class="tabs">
                <!-- <li><a class="current" href="#">Complete Profile</a></li>-->
                <li><a class="<?php if($_c_tab == 'social') echo 'current'; ?>" href="#">Share with social media</a></li>
                <li><a class="<?php if($_c_tab == 'corporation') echo 'current'; ?>" href="#">Are you a corporation</a></li>
              </ul>

              <!-- tab "panes" -->
              <div class="panes">

<?php /*
                <div class="tab-containt" style="display: block;">

                  <ul class="halfwid form-reg fl brd-right" style="margin-right:30px">
                  <?php echo form_open('/sessions/create_profile','',array('ftype'=>'user')); ?>
                     email 

                     username 

                     password 
                    <li class="required">
                      <?php echo form_label('Telephone&nbsp;<span>*</span>', $telephone['id'],array('class'=>'register')); ?>
                    <?php echo form_input($telephone); ?><br />
<?php echo form_error($telephone['name']); echo isset($errors[$telephone['name']])?$errors[$telephone['name']]:''; ?>
                    </li>
                    <li class="required">
                      <?php echo form_label('Skype&nbsp;<span>*</span>', $skype['id'],array('class'=>'register')); ?>
                    <?php echo form_input($skype); ?><br />
<?php echo form_error($skype['name']); echo isset($errors[$skype['name']])?$errors[$skype['name']]:''; ?>
                    </li>
                    <li class="clearfix">
                      <button type="submit" class="black-button fl">Submit</button>
                    </li>
                    <?php echo form_close(); ?>
                  </ul>
                  <div class="fb-reg">
                    <p class="strong text14 blue-clr">Why complete your profile</p>
                    <p>Completing your profil will help people to reach you easly when you post ad. Make sure you complete it. </p>
                  </div>
                  <div class="clr">&nbsp;</div>
                </div>

 */
?>
                <div class="tab-containt" style="display: none;">
                  <ul class="form-reg">
              <?php echo form_open('sessions/create_share','',array('ftype'=>'share')); ?>
                    <!-- address -->
                    <li class="required">
                      <label style="width:auto; margin-bottom:10px;" class="blue-clr">Invite your Facebook and twitter friends. You can writte them a little message</label>
                      <?php echo form_textarea($sharecontent); ?><br />
<?php echo form_error($sharecontent['name']); echo isset($errors[$sharecontent['name']])?$errors[$sharecontent['name']]:''; ?>
                    </li>
                    <li class="required">
                      <p class="fl">
                        <?php echo form_checkbox($fbcheckbox); ?> 
                        Facebook &nbsp; &nbsp;
                      </p>
                      <p class="fl">
                        <?php echo form_checkbox($twittercheckbox); ?> 
                        Twitter
                      </p>
                    </li>
                    <li class="border-bottom">&nbsp;</li>
                  </ul>
                  <div class="clr">&nbsp;</div>
                  <div class="">
                    <p class="strong blue-clr text14">Why connect to your social medias</p>
                    <p class="text11">Connecting to you social media will help us push your ad on them everytime you add a d. 
                      Every time you post a message or look from something, we will share with your friend's your need. Every friend that will register will give you token. Look in the right boxe what you can get for token </p>
                  </div>
                  <div class="clr">&nbsp;</div>
                  <p class="clearfix">
                      <button type="submit" class="black-button" style="float:left"> Invite Friends</button>
                    </p>
                </div>
                <?php echo form_close(); ?>

                <div class="tab-containt" style="display: none;">
                  <ul class="form-reg">
<?php echo form_open_multipart('/sessions/create_corporate','',array('ftype'=>'corporate')); ?>
                    <li class="required">
                      <?php echo form_label('Name of Organization&nbsp;<span>*</span>', $corp_biz_name['id'],array('class'=>'register')); ?>
                    <?php echo form_input($corp_biz_name); ?><br />
<?php echo form_error($corp_biz_name['name']); echo isset($errors[$corp_biz_name['name']])?$errors[$corp_biz_name['name']]:''; ?>
                    </li>
                    <li class="required">
                      <?php echo form_label('Contact Person&nbsp;<span>*</span>', $corp_contactperson['id'],array('class'=>'register')); ?>
                    <?php echo form_input($corp_contactperson); ?><br />
<?php echo form_error($corp_contactperson['name']); echo isset($errors[$corp_contactperson['name']])?$errors[$corp_contactperson['name']]:''; ?>
                    </li>
                    <li class="required">
                      <?php echo form_label('Address&nbsp;<span>*</span>', $corp_address['id'],array('class'=>'register')); ?>
                    <?php echo form_input($corp_address); ?><br />
<?php echo form_error($corp_address['name']); echo isset($errors[$corp_address['name']])?$errors[$corp_address['name']]:''; ?>
                    </li>
                    <li class="required">
                    <?php echo form_label('Postal Code&nbsp;<span>*</span>', $postalcode['id'],array('class'=>'register')); ?>
                    <?php echo form_input($postalcode); ?><br />
<?php echo form_error($postalcode['name']); echo isset($errors[$postalcode['name']])?$errors[$postalcode['name']]:''; ?>
                    </li>
                    <li class="required">
                      <?php echo form_label('City&nbsp;<span>*</span>', $city['id'],array('class'=>'register')); ?>
                    <?php echo form_input($city); ?><br />
<?php echo form_error($city['name']); echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?>
                    </li>
                    <li>
                      <?php echo form_label('Telephone', $corp_telephone['id'],array('class'=>'register')); ?>
                    <?php echo form_input($corp_telephone); ?><br />
<?php echo form_error($corp_telephone['name']); echo isset($errors[$corp_telephone['name']])?$errors[$corp_telephone['name']]:''; ?>
                    </li>
                    <li>
                      <?php echo form_label('Fax', $corp_fax['id'],array('class'=>'register')); ?>
                    <?php echo form_input($corp_fax); ?><br />
<?php echo form_error($corp_fax['name']); echo isset($errors[$corp_fax['name']])?$errors[$corp_fax['name']]:''; ?>
                    </li>
                    <li>
                      <?php echo form_label('website', $corp_website['id'],array('class'=>'register')); ?>
                    <?php echo form_input($corp_website); ?><br />
<?php echo form_error($corp_website['name']); echo isset($errors[$corp_website['name']])?$errors[$corp_website['name']]:''; ?>
                    </li>
                    <li class="required">
                      <label>Logo</label>
                      <br />
                      <div style="position: relative;height: 30px;width: 300px;">
                        <input type="file" style="position: relative;width:310px;text-align: right;-moz-opacity: 0;filter: alpha(opacity: 0);opacity: 0;z-index: 2;"
                            onchange="document.getElementById('corp_logopath').value = this.value;">
                        <div style="position: absolute;top: 0px;left: 0px;width: 350px;padding: 0;margin: 0;z-index: 1;line-height: 90%;">
                          <?php echo form_input($corp_logopath); ?>
                          <input type="button" class="black-button" value="Selectionnez">
                        </div>
                        </div>

                    </li>
                    <li class="">
                    <label> Organization Description <span>*</span> </label>
                    <?php echo form_textarea($corp_biz_description); ?>
<?php echo form_error($corp_biz_description['name']); echo isset($errors[$corp_biz_description['name']])?$errors[$corp_biz_description['name']]:''; ?>
                    </li>
                    <li class="required">
                      <label class="register">Buy package <span>*</span></label>
                      <br>
                      <select class="fl">
                        <option>Entry 1</option>
                      </select>
                      <font class="text11">Package details will be showed her<br>
                      when selected in the dropdown list</font>
                    </li>
                    <li class="clearfix">
                      <button type="submit" class="black-button fl">Submit</button>
                    </li>
<?php echo form_close(); ?>
                  </ul>
                </div>

              </div>
<script>
// perform JavaScript after the document is scriptable.
$(function() {
  // setup ul.tabs to work as tabs for each div directly under div.panes
  $tabs = $("ul.tabs").tabs("div.panes > div.tab-containt");
});
</script>
              <div class="clr">&nbsp;</div>
            </div>
            <!--items-->
            <div class="clr">&nbsp;</div>

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
