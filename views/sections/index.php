<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>
<?php if(!empty($latest_products)) { ?>
<!-- Latest Products -->

<section class="latest-product">
  <div class="cnr-section">
    <div class="latest-inner">
      <h2 class="latest">Latest Products</h2>
      <a class="prev browse left disabled"></a>
      <div class="scrollable" id="scrollable"> 
        
        <!-- root element for the items -->
        <div class="items">
          <?php
        $counter = 1;
        echo '<div>';
        foreach($latest_products as $each) {
          if($counter == 5) {
              $counter = 1;
              echo '</div><div>';
          }
?>
          <a href="ads/<?php echo $each->advertisement_id;?>"><img src="<?php echo $each->file_path.$each->file_name; ?>" alt="" title="" /></a>
          <?php
          $counter++;
        }
?>
        </div>
        </div>
      </div>
      <a class="next browse right"></a>
      <div class="clr">&nbsp;</div>
      <span class="shadow">&nbsp;</span> </div>
  </div>
</section>
<!-- end Latest Products -->
<?php } ?>
<?php $this->load->view('sections/_list'); ?>
<?php $this->load->view('layouts/footer');

