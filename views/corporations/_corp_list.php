<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php foreach($corporations as $corp)
      {
?>
<div class="side-box">
        <h2 class="article-head"><?php echo $corp->corp_biz_name; ?></h2>
        <div class="main-body listings">
          <div class="padding">
            <div class="list-image"> <img src="<?php echo $corp->corp_logopath; ?>" alt="" title="" /> </div>
            <div class="corp-details"> <font class="strong text14"><?php echo $corp->corp_contactperson; ?></font><br />
              <span><?php echo ellipsize($corp->corp_biz_description,400,1,'...'); ?></span>
              <p><a href="corporations/profile/<?php echo $corp->id; ?>" class="blue-button">View Details</a></p>
            </div>
            <div class="clr">&nbsp;</div>
          </div>
          <ul class="maketabs list-bottom">
            <li><span class="plus-icon">&nbsp;</span>Add To sender List</li>
            <li><img src="assets/images/fb-like.jpg" alt="" title=""/></li>
            <li><img src="assets/images/tweet-like.jpg" alt="" title=""/></li>
            <li style="border:0;"><span class="plus-icon gloc">&nbsp;</span>See on the Map</li>
          </ul>
          <div class="clr">&nbsp;</div>
        </div>
        <span class="shadow list">&nbsp;</span> </div>
<?php }