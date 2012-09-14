<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
      foreach($userads as $adv)
      {
?>
<tr>
  <td><div class="images-user-panel">
      <img src="<?php echo $adv->image_path; ?>" alt="" class="img" title="" /></div></td>
  <td valign="middle"><p>
      <?php if($adv->draft>0) echo "(DRAFT)  "; ?>
    <a href="<?php echo $adv->show_url();?>">
      <?php echo ellipsize($adv->title,70,1); ?>
    </a>
  </p></td>
  <!--<td><input type="text" class="text fl" name="" id="" value=""/>-->
  <!--  <button class="black-button" type="button">Ok</button>-->
  <!--</td>-->
  <td align="center"><?php echo substr($adv->created_at,0,16); ?></td>
  <td align="center">2</td>
  <td align="center">1</td>
  <td align="center">
    <a href="#" class="grey-button">Promoumoir</a>
    <a href="#" class="grey-button">Article Vendu</a> 
    <div class="grey-button">
      <a href="#" title="Voir" class="function-btn"><span class="button-icons see">&nbsp;</span></a>
      <a href="<?php echo $adv->edit_url(); ?>" title="Modifier" class="function-btn"><span class="button-icons modify">&nbsp;</span></a>
      <a href="<?php echo $adv->delete_url(); ?>" title="Supprimer" class="function-btn"><span class="button-icons remove">&nbsp;</span></a>
      <a href="#" title="Up"  class="function-btn"><span class="button-icons up">&nbsp;</span></a>
    </div>
  </td>
</tr>
<?php
      }
