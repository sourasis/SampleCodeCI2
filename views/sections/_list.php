<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/* This expects $categories to be an array of Category objects.
 * For every Category object $c,  $c->subcategories must be an array of Subcategory objects.
 */
//var_dump($categories);
?>
<script>
function togglecategories(id){
  var classes = $('#'+id).attr('class');
  if(classes == 'plus hide') $('#'+id).removeClass('plus hide').addClass('plus open');
  else if(classes == 'plus open') $('#'+id).removeClass('plus open').addClass('plus hide');
}
</script>
<div id="container">  
  <!-- Left SEction-->
  <section class="left-section">
    	<h2 class="article-head"><span class="arrow">&nbsp;</span>Products Listing</h2>
        <div class="art-section" id="col-2-1">
<?php
          foreach($sections as $section)
          {
            $randomimage = $section->random_image;
            if(empty($randomimage))
            {
              $randomimage_url = '';
              $randomimage_path = 'assets/images/default_image.png';
            } else {
              $randomimage_url = 'ads/'.$randomimage->advertisement_id;
              $randomimage_path = $randomimage->file_path.$randomimage->file_name;
            }
?>
          <article class="category">
          
            <h3 class="cat-title"><a href="<?php echo $randomimage_url; ?>"><?php echo $section->name; ?></a>
              <span class="plus hide" id="<?php echo $section->id; ?>" onclick="togglecategories(this.id);"></span>
            </h3>
          
          <div class="images">
            <a href="<?php echo $randomimage_url; ?>">          
            <img src="<?php echo $randomimage_path; ?>" alt="" title="" />
            </a>
            <span class="art-shadow">&nbsp;</span>
          </div>
          <div id="sub-cat-<?php echo $section->id; ?>">
<?php
            foreach($section->categories as $category)
            {
?>
            
                <h4 class="green-clr"><?php echo ($category->name !== $section) ? $category->name : ''; ?></h4>
                <ul class="makelist listing" >
<?php
            foreach($category->subcategories as $subcategory)
            {
?>
                    <li>
                        <a href="subcategories/show/<?php echo $subcategory->id; ?>">
                          <?php echo $subcategory->name; ?>
                        </a> (<?php echo $subcategory->advertisements_count; ?>)
                    </li>
<?php
            }
?>
                </ul>
        
<?php
            }
?>
          </div>
      </article>
<?php
          }
?>
            <div class="clr">&nbsp;</div>
        </div>
  </section>
  <!-- end Left SEction--> 
  
  <!-- Right section -->
  <aside> 
 	 <div class="side-box blue-module">
     	<h2 class="side-head">Promo Du jour</h2>
        <div class="images box">
        	<img src="assets/images/mod1.jpg" alt="" title="" />
        </div>
        <div class="box-text"><p><span class="grey6">Fathers Day</span>  June 17, Free Shiping
Dads do amazing Things. Gift 
accordingly... <a href="#">by clicbye.com</a></p>
		<a href="#" class="green-button">View Details</a></div>
     </div>
     
     <div class="side-box green-module">
     	<h2 class="head-green">Promo Du jour</h2>
        <div class="images aside">
        	<img src="assets/images/mod1.jpg" alt="" title="" />
        </div>
        <div class="box-text side fr"><p class="blue-clr strong">Lorem ipsum dolor sit amet, 
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
consectetur adipisicing elit,
<a href="#">read more</a> </p>
<div class="clr">&nbsp;</div>
     </div> 
     
     <div class="side-box green-module" style="height:230px;">
     	<h4 class="head-green blue">Lasted view</h4>
        <div class="images aside grid">
        	<img src="assets/images/mod1.jpg" alt="" title="" />
            <a href="#" class="green-button">View Details</a>
            <div class="clr">&nbsp;</div>
        </div>
        <div class="images aside grid" style="margin-left:30px;"> 
        	<img src="assets/images/mod1.jpg" alt="" title="" />
            <a href="#" class="green-button">View Details</a>
            <div class="clr">&nbsp;</div>
        </div>
        <div class="clr">&nbsp;</div>
     </div>
     
  </aside>
  <!-- end Right section --> 
 <div class="clr">&nbsp;</div> 
