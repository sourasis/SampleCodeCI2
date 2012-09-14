<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->view('layouts/header');  ?>

<!-- Latest Products -->
<section class="latest-product">
<div class="cnr-section">
  <h1>Hello, <?php echo $current_user ? $current_user->display_name() : 'Guest'; ?></h1><br />
<?php if(isset($message)) echo 'Message:'. $message; ?>
<?php if(isset($error)) echo 'Error: '.$error; ?>
  <div class="latest-inner">
    <h2 class="latest">Latest Products</h2>
    <a class="prev browse left disabled"></a>
    <div class="scrollable" id="scrollable"> 

      <!-- root element for the items -->
      <div class="items"> 

        <!-- 1-5 -->
        <div> <img src="assets/images/img-slide1.jpg" alt="" title="" /> <img src="assets/images/img-slide2.jpg" alt="" title="" /> <img src="assets/images/img-slide3.jpg" alt="" title="" /> <img src="assets/images/img-slide4.jpg" alt="" title="" /> <img src="assets/images/img-slide1.jpg" alt="" title="" /> <img src="assets/images/img-slide2.jpg" alt="" title="" /> </div>

        <!-- 5-10 -->
        <div> <img src="assets/images/img-slide1.jpg" alt="" title="" /> <img src="assets/images/img-slide2.jpg" alt="" title="" /> <img src="assets/images/img-slide3.jpg" alt="" title="" /> <img src="assets/images/img-slide4.jpg" alt="" title="" /> <img src="assets/images/img-slide1.jpg" alt="" title="" /> <img src="assets/images/img-slide2.jpg" alt="" title="" /> </div>

        <!-- 10-15 -->
        <div> <img src="assets/images/img-slide1.jpg" alt="" title="" /> <img src="assets/images/img-slide2.jpg" alt="" title="" /> <img src="assets/images/img-slide3.jpg" alt="" title="" /> <img src="assets/images/img-slide4.jpg" alt="" title="" /> <img src="assets/images/img-slide1.jpg" alt="" title="" /> <img src="assets/images/img-slide2.jpg" alt="" title="" /> </div>
      </div>
    </div>
    <a class="next browse right"></a>
    <div class="clr">&nbsp;</div>
    <span class="shadow">&nbsp;</span> 
  </div>
</div>
</section>
<!-- end Latest Products -->
<div id="container"> 
  <!-- Left SEction-->
  <section class="left-section">
  <h2 class="article-head"><span class="arrow">&nbsp;</span>Other Products</h2>
  <div class="art-section">
    <article>
    <h3>Vehicules<span class="plus">&nbsp;</span></h3>
    <div class="images"> <img src="assets/images/art-img1.jpg" alt="" title="" /> <span class="art-shadow">&nbsp;</span> </div>
    <h4 class="green-clr"><a href="#">Titre de  I'annonce</a></h4>
    <ul class="makelist listing">
      <li><a href="#">Antiques/collection</a> (0)</li>
      <li><a href="#">Voitures</a> (1)</li>
      <li><a href="#">Camions</a> (0)</li>
      <li><a href="#">Minifourgonnettes</a> (0)</li>
      <li><a href="#">VUS</a> (1)</li>
      <li><a href="#">Autos de luxe</a> (0)</li>
      <li><a href="#">Motoneiges</a> (0)</li>
      <li><a href="#">Marins</a> (0)</li>
    </ul>
    </article>
    <article>
    <h3>Vehicules<span class="plus">&nbsp;</span></h3>
    <div class="images"> <img src="assets/images/art-img1.jpg" alt="" title="" /> <span class="art-shadow">&nbsp;</span> </div>
    <h4 class="green-clr"><a href="#">Titre de  I'annonce</a></h4>
    <ul class="makelist listing">
      <li><a href="3">Antiques/collection</a> (0)</li>
      <li><a href="#">Voitures</a> (1)</li>
      <li><a href="#">Camions</a> (0)</li>
      <li><a href="#">Minifourgonnettes</a> (0)</li>
      <li><a href="#">VUS</a> (1)</li>
      <li><a href="#">Autos de luxe</a> (0)</li>
      <li><a href="#">Motoneiges</a> (0)</li>
      <li><a href="#">Marins</a> (0)</li>
    </ul>
    </article>
    <article>
    <h3>Vehicules <span class="plus">&nbsp;</span></h3>
    <div class="images"> <img src="assets/images/art-img1.jpg" alt="" title="" /> <span class="art-shadow">&nbsp;</span> </div>
    <h4 class="green-clr"><a href="#">Titre de  I'annonce</a></h4>
    <ul class="makelist listing">
      <li><a href="#">Antiques/collection</a> (0)</li>
      <li><a href="#">Voitures</a> (1)</li>
      <li><a href="#">Camions</a> (0)</li>
      <li><a href="#">Minifourgonnettes</a> (0)</li>
      <li><a href="#">VUS</a> (1)</li>
      <li><a href="">Autos de luxe</a> (0)</li>
      <li><a href="#">Motoneiges</a> (0)</li>
      <li><a href="#">Marins</a> (0)</li>
    </ul>
    </article>
    <div class="clr">&nbsp;</div>
    <span class="divider">&nbsp;</span>
    <article>
    <h3>Vehicules<span class="plus">&nbsp;</span></h3>
    <div class="images"> <img src="assets/images/art-img1.jpg" alt="" title="" /> <span class="art-shadow">&nbsp;</span> </div>
    <h4 class="green-clr"><a href="#">Titre de  I'annonce</a></h4>
    <ul class="makelist listing">
      <li><a href="#">Antiques/collection</a> (0)</li>
      <li><a href="#">Voitures</a> (1)</li>
      <li><a href="#">Camions</a> (0)</li>
      <li><a href="#">Minifourgonnettes</a> (0)</li>
      <li><a href="#">VUS</a> (1)</li>
      <li><a href="">Autos de luxe</a> (0)</li>
      <li><a href="#">Motoneiges</a> (0)</li>
      <li><a href="#">Marins</a> (0)</li>
    </ul>
    </article>
    <article>
    <h3>Vehicules<span class="plus">&nbsp;</span></h3>
    <div class="images"> <img src="assets/images/art-img1.jpg" alt="" title="" /> <span class="art-shadow">&nbsp;</span> </div>
    <h4 class="green-clr"><a href="#">Titre de  I'annonce</a></h4>
    <ul class="makelist listing">
      <li><a href="#">Antiques/collection</a> (0)</li>
      <li><a href="#">Voitures</a> (1)</li>
      <li><a href="#">Camions</a> (0)</li>
      <li><a href="#">Minifourgonnettes</a> (0)</li>
      <li><a href="#">VUS</a> (1)</li>
      <li><a href="">Autos de luxe</a> (0)</li>
      <li><a href="#">Motoneiges</a> (0)</li>
      <li><a href="#">Marins</a> (0)</li>
    </ul>
    </article>
    <article>
    <h3>Vehicules<span class="plus">&nbsp;</span></h3>
    <div class="images"> <img src="assets/images/art-img1.jpg" alt="" title="" /> <span class="art-shadow">&nbsp;</span> </div>
    <h4 class="green-clr"><a href="#">Titre de  I'annonce</a></h4>
    <ul class="makelist listing">
      <li><a href="#">Antiques/collection</a> (0)</li>
      <li><a href="#">Voitures</a> (1)</li>
      <li><a href="#">Camions</a> (0)</li>
      <li><a href="#">Minifourgonnettes</a> (0)</li>
      <li><a href="#">VUS</a> (1)</li>
      <li><a href="">Autos de luxe</a> (0)</li>
      <li><a href="#">Motoneiges</a> (0)</li>
      <li><a href="#">Marins</a> (0)</li>
    </ul>
    </article>
    <div class="clr">&nbsp;</div>
  </div>
  </section>
  <!-- end Left SEction--> 

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
    <h2 class="head-green">Promo Du jour</h2>
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
    <h4 class="head-green blue">Lasted view</h4>
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
</div>
<?php $this->load->view('layouts/footer'); 
