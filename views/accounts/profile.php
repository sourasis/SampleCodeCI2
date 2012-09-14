<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>

<div id="container" style="margin-top:0px;">
  <div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo;
    <h1 class="breadcrums-text">User Panel</h1>
  </div>
  <!-- Left Sction-->
  <section class="left-section">
    <h2 class="article-head"><span class="arrow">&nbsp;</span>Your Ads</h2>
<?php
    if( ! $userads )
    {
?>

<h4>You haven't created any ads. <a href="<?php echo Advertisement::add_url(); ?>">Visit all the categories</a>.</h4>

<?php
    }
    else
    {
?>
    <table width="100%" border="0" cellpadding="5" cellspacing="0" class="table-panel">
          <tr>
            <th width="8%">Photo</th>
            <th>Titre</th>
            <!--<th width="16%">Prix</th>-->
            <th width="11%">Parution</th>
            <th width="8%">Visiters</th>
            <th width="6%">Page</th>
            <th width="32%" class="centerAll">Fonctions</th>
          </tr>
  
<?php $this->load->view('accounts/_user_ads_list.php'); ?>

    </table>
<?php } ?>
    <!-- Company Feeds-->
    
    <h3 class="deals-head">Compnaies Feeds</h3>
    <ul class="makelist comp-feeds">
      <li>
        <div class="cmp-name"><a href="#">Company Name</a></div>
        <div class="feeds">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
        <div class="logos-network fr"><a href="#" class="facebook">Facebook</a></div>
        <div class="clr">&nbsp;</div>
      </li>
      <li>
        <div class="cmp-name"><a href="#">Company Name</a></div>
        <div class="feeds">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
        <div class="logos-network fr"><a href="#" class="twitter">Facebook</a></div>
        <div class="clr">&nbsp;</div>
      </li>
      <li>
        <div class="cmp-name"><a href="#">Company Name</a></div>
        <div class="feeds">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
        <div class="logos-network fr"><a href="#" class="facebook">Facebook</a></div>
        <div class="clr">&nbsp;</div>
      </li>
    </ul>
  </section>
  <!-- end Left Section--> 
  <!-- Right section -->
  <aside> 
    <!-- Profile -->
    <div class="grey-box">
      <h2 class="page-head">Profil</h2>
      <div class="loader centerAll"> <font class="text11">Complete your profile</font><br />
        <div class="load-container fl">
          <div class="load-bar">&nbsp;</div>
        </div>
        <font class="text11">81%</font> </div>
      <div class="clr">&nbsp;</div>
      <div class="edit-profile"> <a href="sessions/profile" class="links">Modify my profil</a> <a href="#" class="links brd-none">Modify my Alerts</a> </div>
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
    <!-- Invite Your Friend -->
    <div class="grey-box">
      <h4 class="page-head">Invite your friends<br />
        <a href="#" class="blue-clr text11 normTxt">Tokan in Bank 500</a><a href="#" class="blue-clr text11 normTxt">Select All</a></h4>
      <a href="#" class="blue-clr text11 normTxt">Select All</a>
      <ul class="makelist image-gal reward-module fl">
        <li class="invite-frends"> <span class="logos-network invite"><a href="#" class="twitter">Facebook</a></span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            Invite</label>
        </li>
        <li class="invite-frends"><span class="logos-network invite"><a href="#" class="facebook">Facebook</a></span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            Invite</label>
        </li>
        <li class="last-clm invite-frends"><span class="logos-network invite"><a href="#" class="twitter">Facebook</a></span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            Invite</label>
        </li>
        <li class="invite-frends"><span class="logos-network invite"><a href="#" class="facebook">Facebook</a></span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            Invite</label>
        </li>
        <li class="invite-frends"><span class="logos-network invite"><a href="#" class="twitter">Facebook</a></span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            Invite</label>
        </li>
        <li class="last-clm invite-frends"><span class="logos-network invite"><a href="#" class="facebook">Facebook</a></span>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 token-text">
            <input type="checkbox" class="styled" value="" name="" id="" />
            Invite</label>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
      <div class="centerAll"> <a href="#" class="green-button">Invite</a></div>
    </div>
    <div class="clr">&nbsp;</div>
    <!-- Companies you following -->
    <div class="side-box">
      <h2 class="head-green blue">Companies you following</h2>
      <ul class="makelist image-gal fl" style="padding-bottom:0">
        <li>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 cmp-logo">
            <input type="checkbox" class="styled" value="" name="" id="" />
          </label>
        </li>
        <li>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 cmp-logo">
            <input type="checkbox" class="styled" value="" name="" id="" />
          </label>
        </li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 cmp-logo">
            <input type="checkbox" class="styled" value="" name="" id="" />
          </label>
        </li>
        <li>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 cmp-logo">
            <input type="checkbox" class="styled" value="" name="" id="" />
          </label>
        </li>
        <li>
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 cmp-logo">
            <input type="checkbox" class="styled" value="" name="" id="" />
          </label>
        </li>
        <li class="last-clm">
          <div class="image-gal"><img src="assets/images/view-all-img.jpg" alt="" title="" /></div>
          <label class="text11 cmp-logo">
            <input type="checkbox" class="styled" value="" name="" id="" />
          </label>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
      <div class="centerAll"> <a href="#" class="green-button">Unsusbcribe</a></div>
      <div class="clr">&nbsp;</div>
      <br />
    </div>
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>

<?php $this->load->view('layouts/footer');
