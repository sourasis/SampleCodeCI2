<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>

<div id="container">
	<div class=""><div class="breadcrums"> <a href="#" class="link-blue fl">Home</a> &nbsp;&raquo;
    <h1 class="breadcrums-text">Corporation Panel</h1>
  </div>
  <!-- Left Sction-->
  <section class="left-section">
    
<?php
    $this->load->view('corporations/_corp_ads_list');

    $this->load->view('corporations/_package_stats');

    $this->load->view('corporations/_followers');
?>
    
    
  </section>
  <!-- end Left Section--> 
  <!-- Right section -->
  <aside> 
    <!-- Profile -->
    <div class="grey-box">
      <h2 class="page-head">Profil</h2>
      <div class="edit-profile"> <a href="#" class="links">Modify my profil</a> <a href="#" class="links">Manage Privecy</a> <a href="#" class="links brd-none">Buy Package</a> </div>
      <div class="clr">&nbsp;</div>
    </div>
   
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>

<?php $this->load->view('layouts/footer');