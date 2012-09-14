<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(empty($_pagetitle)) $_pagetitle = $this->data['_pagetitle'];

?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clicbye -<?php echo _h($_pagetitle); ?></title>
<base href="<?php echo base_url(); ?>" >
<link href="assets/css/basic.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<script src="assets/js/custom-form-elements.js"></script>
<!--image-scrollable-->
<link rel="stylesheet" type="text/css" href="assets/tabs/scrollable-horizontal.css">
<script src="assets/tabs/jquery.js"></script>

<!--Registration-Wizard-->
<link rel="stylesheet" href="assets/registration_wizard/tabs.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="assets/registration_wizard/scrollable-wizard.css">

<script>
document.createElement("article");  
document.createElement("footer");  
document.createElement("header");  
document.createElement("section");  
document.createElement("nav"); 
document.createElement("aside");
document.createElement("button");
</script>

<script type="text/javascript" src="assets/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="assets/highslide/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = 'assets/highslide/graphics/';
hs.outlineType = 'rounded-white';
</script>

<?php //This includes latest jquery 1.7.2 ?>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>

<?php //This is uploadify ?>
<link rel="stylesheet" type="text/css" href="assets/uploadify/uploadify.css" />
<script src="assets/uploadify/jquery.uploadify-3.1.min.js"></script>

<link rel="stylesheet" type="text/css" href="assets/css/slider.css" />

<script src="assets/js/popup.js"></script>

<!--registration-->

<script>
$(document).ready(function() {	
  function show_error(string) {
    $('#flash-messages-and-errors').html('<div class="notice-alert"><p class="notice-error">'+string+'</p></div>');
    $('.notice-alert').slideDown().delay(4000).slideUp(1000);
  }

<?php
$userdata = json_encode($this->session->userdata);
$userdata = $this->encrypt->encode($userdata);
$userdata = base64_encode($userdata);
$token = array('value'=>'clicbye');
?>
  $('#file_upload').uploadify({
    swf      : '<?php echo base_url('assets/uploadify/uploadify.swf'); ?>',
    uploader :'<?php echo base_url('images/upload'); ?>', 
    cancelImg:'<?php echo base_url('assets/uploadify/uploadify-cancel.png'); ?>', 
    multi    : true,
    auto     : true,
    formData : { _flash_csrf_token: '<?php
if(empty($current_user))
  echo '';
else
  echo $this->security->flash_csrf_token($current_user->id);
?>'  },
    onUploadError   : function(file, errorCode, errorMsg, errorString) {
      if(errorString != 'Cancelled') {
        show_error('The file ' + file.name + ' could not be uploaded. ');
      }
    },
    onUploadSuccess : function(file, data, response) {
      var image = $.parseJSON(data);
      var div = $('#image-preview > ul');
      checkbox =  '<input type="checkbox" name="advertisement[image_ids][]" value="'+image.id+'"  checked="checked"  /> ';
      image_tag = '<img src="'+ image.url_path+'" alt="" title="" />';
      div.append('<li>'+checkbox+image_tag+'</li>');
    }, 
 });

  $('.notice-alert').slideDown().delay(8000).slideUp(2000);
  $('.notice-perma-alert').slideDown();
  //select all the a tag with name equal to modal



  $('a[name=modal]').click(function(e) {
    //Cancel the link behavior
    e.preventDefault();

    //Get the A tag
    var id = $(this).attr('href');

    //Get the screen height and width
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();

    //Set heigth and width to mask to fill up the whole screen
    $('#mask').css({'width':maskWidth,'height':maskHeight});

    //transition effect		
    $('#mask').fadeIn(1000);	
    $('#mask').fadeTo("slow",0.5);	

    //Get the window height and width
    var winH = $(window).height();
    var winW = $(window).width();

    //Set the popup window to center
    $(id).css('top',  winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);

    //transition effect
    $(id).fadeIn(2000); 

  });

  //if close button is clicked
  $('.window .close').click(function (e) {
    //Cancel the link behavior
    e.preventDefault();

    $('#mask').hide();
    $('.window').hide();
  });		

  //if mask is clicked
  $('#mask').click(function () {
    $(this).hide();
    $('.window').hide();
  });	
  //if mask is clicked
  $('#close').click(function () {
    $(this).hide();
    $('.window').hide();
  });	
  //if mask is clicked
  $('#close').click(function () {
    $(this).hide();
    $('#mask').hide();
  });			

});

</script>


<!-- city manipulation : should be moved to a separate helper js -->
<script>

function populate_provinces(val){
  var province = val;
  
  var xhr = $.get("json/provinces/"+val,
   function(data){
      $('#provinces').remove();
      $('#cityspan').remove();

      var html = '<span id="provinces"><label >Province <span>*</span></label>';
      html += '<select name="province_id" onChange="populate_cities(this.value)">';
      html += '<option value="0">Select</option>';
      for (var j in data){
        html += '<option value="'+j+'">'+data[j]+'</option>';
      }
      html += '</select></span>';

      $('#cities').append(html);
   }, "json").error(function() { alert("error"); });
}

function populate_cities(val){
  var cities = val;
  
  var xhr = $.get("json/cities/"+val,
   function(data){
      $('#cityspan').remove();

      var html = '<span id="cityspan"><label >City <span>*</span></label>';
      html += '<select name="advertisement[city_id]" >';
      html += '<option value="0">Select</option>';
      for (var j in data){
        html += '<option value="'+j+'">'+data[j]+'</option>';
      }
      html += '</select></span>';

      $('#cities').append(html);
   }, "json").error(function() { alert("error"); });
}

function changeimage(loc,newimage){
  document.getElementById(loc).src = newimage;
}
</script>

<!--registration-->
<style>

#notice-alert, .notice-alert, #notice-perma-alert, .notice-perma-alert {
position: fixed;
left: 0;
top: 0;
width: 100%;
z-index: 999;
}
#notice-message, .notice-message, #notice-error, .notice-error {
margin-top:0px;
margin-bottom:0px;
overflow: visible;
text-align: center;
padding: 15px;
font-size: 18px;
border-bottom: 2px solid #86672E;
width: 100%;
z-index: 999;
background-color: #FFFEFE;
}
#notice-error, .notice-error {
background-color: #FFFAC0;
}
</style>

<!-- Accordian -->
<?php //<script src="assets/js/jquery_002.js" type="text/javascript"></script> 
//This script is bad.  Sujith needs to remove or replace this. ?>
<script src="assets/js/jquery.js" type="text/javascript"></script> 
<script src="assets/js/ibox.js" type="text/javascript"></script> 
<script>
iBox.padding = 50;
iBox.inherit_frames = false;
$(document).ready(function(){
  $('.tTip').betterTooltip({speed: 150, delay: 300});

  $('.cat-title span').click(function(){
    var id = $(this).attr('id');
    // alert(id);
    $('#sub-cat-'+id).toggle('slow');
  });

  $("#chained").scrollable({circular: true, mousewheel: true}).autoscroll({
    interval: 5000
  });

});

</script>
</head>

<body>
<!-- Header -->
<header>
<div class="cnr-section">
  <h1 class="logo fl"> <a href="#" title="Clicbye – site d'annonce gratuit">Site d'annonce gratuit</a> </h1>
  <nav class="reg-but fr">
  <ul class="maketabs reg">
<?php if(isset($current_user) AND $current_user) { ?>
    <li class="login"><a href="auth/logout">Logout</a></li> 
    <li class="register"><a href="accounts/profile">My Account</a></li>
<?php } else { ?>
    <li class="login"><a href="" onclick="return hs.htmlExpand(this, { contentId: 'highslide-html' } )" class="highslide">Login</a></li>
    <li class="register"><a href="auth/register">Register</a></li>
<?php }  ?>
    <li class="support"><a href="#"><span class="lv-icon">&nbsp;</span>Live Support</a></li>
  </ul>
  </nav>
  <!--Login-->
  <div class="highslide-html-content" id="highslide-html">
    <div class="login-module">
      <div class="highslide-header">
        <ul>
          <li class="highslide-close">
          <a href="#" onclick="return hs.close(this)" class="close"></a>
          </li>
        </ul>
      </div>
      <div class="highslide-body">
        <?php $this->load->view('layouts/_login'); ?>
      </div>
    </div>

  </div>

  <!-- Main Navigation -->
  <nav class="main fr">
  <ul class="maketabs menu">
    <li class="first"><a href="#">Accueil</a></li>
    <li><a href="ads/add">Ajoutez une annonce</a></li>
    <li><a href="#">Promo du jour</a></li>
    <li class="last"><a href="corporations/index">Corporations</a></li>
  </ul>
  </nav>
  <!-- end Main Navigation -->
  <div class="clr">&nbsp;</div>
</div>
</header>
<!-- Search Section -->
<section class="search-bar">
<div class="cnr-section">
  <ul class="maketabs seach-tabs">
    <li>
    <label>Quoi</label>
    <input type="text" name="" id="Quoi" class="text" style="width:110px" />
    </li>
    <li>
    <label>Categories</label>
    <div class="custom">
      <select class="styled">
        <option>Combo Box</option>
      </select>
    </div>
    </li>
    <li>
    <label>Categories</label>
    <div class="custom">
      <select class="styled">
        <option>Combo Box</option>
      </select>
    </div>
    </li>
    <li>
    <label>Parue Depuis</label>
    <div class="custom">
      <select class="styled">
        <option>Combo Box</option>
      </select>
    </div>
    </li>
    <li>
    <label>Distance Box</label>
    <div class="custom">
      <select class="styled">
        <option>Combo Box</option>
      </select>
    </div>
    </li>
    <li>
    <label>Trier Par</label>
    <div class="custom">
      <select class="styled">
        <option>Combo Box</option>
      </select>
    </div>
    </li>
    <li class="last">
    <input type="button" name="" value="Recherch" class="blue-but" />
    </li>
  </ul>
  <div class="clr">&nbsp;</div>
</div>
<span class="shadow" style="bottom:-13px;">&nbsp;</span> </section>
<!-- end Search SEction --> 
<div id="flash-messages-and-errors">
<?php $this->load->view('layouts/_flash'); ?>
</div>

