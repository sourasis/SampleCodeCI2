<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?> 
<?php $this->load->view('layouts/header');  ?>
<div id="container" style="margin-top:0px;">
  <div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo;
    <h1 class="breadcrums-text">Corporations</h1>
  </div>
  <!-- Left Sction-->
  <section class="left-section">
    <div class="corporate-listing"><!--Corporate listing-->
<?php 
    $this->load->view('corporations/_corp_list');

    $countcorps = count($corporations);
    $page = 1;
?>
        
        <div class="clr">&nbsp;</div>
        <!-- Pagination -->
        <div class="pagination">
        	<ul class="maketabs">
<?php for(;$countcorps > 0;)  { ?>
                <li class="active"><a href="corporations/index/<?php echo $page; ?>"><?php echo $page; ?></a></li>
<?php
              $countcorps -= MAX_LIST_CORPS_PER_PAGE;
              $page++;
}

?>
            </ul>
        </div>
        
    </div>
  </section>
  <!-- end Left SEction--> 
  
  <!-- Right section -->
  <aside>
    <div class="grey-box">
      <h4 class="page-head">General Filter</h4>
      <ul class="makelist side-form">
        <li>
          <input type="checkbox" class="styled" />
          <label>Offre</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Recherche</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Corporatrion</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Vehicles</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Real Estate</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Furniture</label>
        </li>
        <li>
        <input type="checkbox" class="styled" />
        <label>
        Jobs
        <li>
        <input type="checkbox" class="styled" />
        <label>Electronic</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Holidays / Travel</label>
        </li>
        <li>
        <input type="checkbox" class="styled" />
        <label>
        Tools / Materials
        <li>
        <input type="checkbox" class="styled" />
        <label>Sports / Leisure</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Family</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Animals</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Computing</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Services</label>
        </li>
        <li>
          <input type="checkbox" class="styled" />
          <label>Community</label>
        </li>
      </ul>
      <br />
      <p class="centerAll"> <a href="#" class="green-button">Submit Filter</a></p>
      <div class="clr">&nbsp;</div>
      <span class="shadow side">&nbsp;</span> </div>
    
    <!-- Last Viewed -->
    <div class="side-box green-module">
      <h4 class="head-green blue">Last Viewed</h4>
      <ul class="makelist image-gal fl">
        <li class="">
          <div class="image-gal"><a href="#"><img src="assets/images/view-all-img.jpg" alt="" title="" /></a></div>
        </li>
        <li class="">
          <div class="image-gal"><a href="#"><img src="assets/images/view-all-img.jpg" alt="" title="" /></a></div>
        </li>
        <li class="last-clm">
          <div class="image-gal"><a href="#"><img src="assets/images/view-all-img.jpg" alt="" title="" /></a></div>
        </li>
      </ul>
      <div class="clr">&nbsp;</div>
    </div>
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>
<?php $this->load->view('layouts/footer');