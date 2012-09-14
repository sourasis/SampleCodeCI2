<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>

<div id="container">
  <div class="breadcrums"> <a href="<?php echo base_url('/'); ?>" class="link-blue fl">Home</a> &nbsp;&raquo;
    <h1 class="breadcrums-text">Add an ad</h1>
  </div>
  <!-- Left Sction-->
  <section class="left-section"> 
    <!--Main Box-->
    <div class="side-box">
      <h2 class="article-head border-radius-top">Choose a category to place your ad -</h2>
      <div class="main-body">
        <div id="drawer"> Please fill in the empty fields marked with a <samp style="color:red">red</samp> border. </div>


<?php
          foreach($sections as $section )
          {
?>
          <article>
            <h2 style="padding-bottom:8px;border-bottom:dashed;color:#444;text-align:left;"><?php echo $section->name; ?></h2>
<?php
            foreach($section->categories as $category)
            {
?>
  
                  <h4 class="green-clr"><?php echo $category->name; ?></h4>
                  <ul class="makelist listing">
<?php
              foreach($category->subcategories as $subcategory)
              {
?>
                    <li>
                        <a href="ads/add/<?php echo $subcategory->id; ?>">
                          <?php echo $subcategory->name; ?>
                        </a> 
                    </li>
<?php
              }
?>
                </ul>
<?php
            }
?>
            </article>
<?php
          }
?>
            <div class="clr">&nbsp;</div>
        </div>
  </section>

  <!-- Right section -->
  <aside>
    <div class="side-box blue-module">
      <h2 class="side-head">Promo Du jour</h2>
      <div class="images box"> <img src="assets/images/mod1.jpg" alt="" title="" /> </div>
      <div class="box-text">
        <p><span class="grey6">Fathers Day</span> June 17, Free Shiping
          Dads do amazing Things. Gift 
          accordingly... <a href="#">by clicbye.com</a></p>
        <a href="#" class="green-button">View Details</a></div>
    </div>
    <div class="side-box green-module">
      <h2 class="head-green">Social</h2>
      <div class="images aside"> <img src="assets/images/mod1.jpg" alt="" title="" /> </div>
      <div class="box-text side fr">
        <p class="blue-clr strong">Lorem ipsum dolor sit amet, 
          consectetur adipisicing elit, sed do eiusmod tempor</p>
      </div>
      <div class="clr">&nbsp;</div>
      <div class="box-text" style="padding-top:0px;"><a href="#" class="green-button">View Details</a></div>
      <div class="clr">&nbsp;</div>
    </div>
    <div class="side-box small">
      <h3 class="blue-head">Gagnez Des Points</h3>
      <div class="images bags"><img src="assets/images/bags.png" alt="" title="" /></div>
      <p class="half-wid">Lorem ipsum dolor sit amet, 
        consectetur adipisicing elit, <a href="#">read more</a> </p>
      <div class="clr">&nbsp;</div>
    </div>
    <div class="side-box green-module" style="height:230px;">
      <h4 class="head-green blue">Lasted View</h4>
      <div class="images aside grid"> <img src="assets/images/mod1.jpg" alt="" title="" /> <a href="#" class="green-button">View Details</a>
        <div class="clr">&nbsp;</div>
      </div>
      <div class="images aside grid" style="margin-left:30px;"> <img src="assets/images/mod1.jpg" alt="" title="" /> <a href="#" class="green-button">View Details</a>
        <div class="clr">&nbsp;</div>
      </div>
      <div class="clr">&nbsp;</div>
    </div>
  </aside>
  <!-- end Right section -->
  <div class="clr">&nbsp;</div>

<?php $this->load->view('layouts/footer');
