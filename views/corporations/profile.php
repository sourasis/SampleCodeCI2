<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?> 
<?php $this->load->view('layouts/header');  ?>

<div id="container">
  <!-- Left Sction-->
  <section class="left-section"> 
    <!--Main Box-->
    <div class="side-box">
      <h1 class="article-head"><?php echo _h($userprofile->corp_biz_name); ?>
        <a href="corporations/dashboard" class="green-button" style="float:right;padding:1px 10px;">See all your Ads</a>
      </h1>
      		<div class="padding"><div class="article-image">
            	<img src="<?php echo _h($userprofile->corp_logopath); ?>" alt="" title="" />
            </div> 
            <div class="content">
            	<p>
                <?php echo $userprofile->corp_biz_description; ?>
              </p>
            </div>
            <div class="clr">&nbsp;</div></div>
      <!--Main Box--> 
    </div>

<!-- NOT SURE WHAT WILL THIS BE    
    <h3 class="deals-head">Compnaies Feeds</h3>
    
    <ul class="makelist comp-feeds">
      <li>
        <div class="cmp-name"><a href="#">Company Name</a></div>
        <div class="feeds">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
        <div class="logos-network fr"><a class="facebook" href="#">Facebook</a></div>
        <div class="clr">&nbsp;</div>
      </li>
      <li>
        <div class="cmp-name"><a href="#">Company Name</a></div>
        <div class="feeds">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
        <div class="logos-network fr"><a class="twitter" href="#">Facebook</a></div>
        <div class="clr">&nbsp;</div>
      </li>
      <li>
        <div class="cmp-name"><a href="#">Company Name</a></div>
        <div class="feeds">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
        <div class="logos-network fr"><a class="facebook" href="#">Facebook</a></div>
        <div class="clr">&nbsp;</div>
      </li>
    </ul>
 -->   
    <div class="grey-box">
      <h4 class="page-head">People who follow this company</h4>
      <ul style="padding-bottom:0" class="makelist image-gal main-pg fl">
        <li>
          <div class="image-gal"><a href=""><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
         <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        <li>
          <div class="image-gal"><a href="#"><img title="" alt="" src="assets/images/prof1.jpg"></a></div>
          
        </li>
        
      </ul>
      <div class="clr">&nbsp;</div>
    </div>
  </section>
  <!-- end Left Section--> 
  <!-- Right section -->
  <aside>
  	<!--Google map-->
    <div class="grey-box">
    	<h4 class="page-head">Location: </h4>
        <p><?php echo _h($userprofile->corp_address); ?></p>
		<h4 class="page-head only-txt">Website: <a href="#" class="blue-clr text11 fr normTxt"><?php echo _h($userprofile->corp_website); ?></a></h4>
        <div class="google-map" align="center">
            <img src="assets/images/maps.google.co.png" alt="" title="" >
            <a href="#" class="blue-clr">Get direction</a>
        </div>
        <p>&nbsp;</p>
        <div class="clr">&nbsp;</div>
        <div class="centerAll"> <a href="#" class="green-button">See Corporation other Ads</a></div>
    <div class="clr">&nbsp;</div>
    </div>
    <!-- Rewards Products List -->
    <div class="grey-box">
      <h4 class="page-head">Reward Products<a href="#" class="blue-clr text11 fr normTxt">Tokan in Bank 500</a></h4>
      <ul class="makelist image-gal reward-module fl">
        <li class=""> <span>Message</span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            100 Tokens</label>
        </li>
        <li class=""> <span>Message</span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            100 Tokens</label>
        </li>
        <li class="last-clm"> <span>Message</span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            100 Tokens</label>
        </li>
        <li class=""> <span>Message</span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            100 Tokens</label>
        </li>
        <li class=""> <span>Message</span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            100 Tokens</label>
        </li>
        <li class="last-clm"> <span>Message</span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            100 Tokens</label>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
      <div class="centerAll"> <a href="#" class="green-button">Exchange</a></div>
    </div>
    
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>


<?php $this->load->view('layouts/footer');
