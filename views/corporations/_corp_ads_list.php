<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<h2 class="article-head"><span class="arrow">&nbsp;</span>Your Ads<a href="ads/add" class="fr right-but">Enter New Ad</a></h2>
    <div class="grey-box"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="table-panel">
      <tr>
        <th width="8%">Photo</th>
        <th>Titre</th>
        <!--<th width="16%">Prix</th>-->
        <th width="11%">Parution</th>
        <th width="8%">Visiters</th>
        <th width="6%">Page</th>
        <th width="32%" class="centerAll">Fonctions</th>
      </tr>
<?php
    
    foreach($advertisements as $adv)
    {
?>
      <tr>
        <td><div class="article-image"><a href="<?php echo $adv->show_url(); ?>"><img src="<?php echo _h($adv->image_path);?>" alt=""  title="" /></a></div></td>
        <td valign="middle"><p><a href="<?php echo $adv->show_url(); ?>"><?php echo _h($adv->title);?></a></p></td>
        <!--<td><input type="text" class="text fl" name="" id="" value=""/>
          <button class="black-button" type="button">Ok</button></td>-->
        <td align="center"><?php echo substr($adv->created_at,0,16); ?></td>
        <td align="center">13</td>
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
?>
    </table></div>