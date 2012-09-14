<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

if(empty($__messages)) $__messages = $this->data['__messages']; 
if(empty($__errors)) $__errors = $this->data['__errors']; 

if(count($__messages) >0  || count($__errors) >0) {
?>
<div class="notice-alert">
<?php 
  if(!empty($__messages)) 
  {  
    foreach($__messages as $message => $message_is_htmlsafe)
    {
      $_view_message = (!empty($message_is_htmlsafe) && $message_is_htmlsafe) ? $message : _h($message);
      ?><p class="notice-message"><?php echo $_view_message; ?></p><?php echo "\n";
    }
  } 
?>

<?php 
  if(!empty($__errors)) 
  {  
    foreach($__errors as $error => $error_is_htmlsafe)
    {
      $_view_error = (!empty($error_is_htmlsafe) && $error_is_htmlsafe) ? $error : _h($error);
      ?><p class="notice-error"><?php echo $_view_error; ?></p><?php  echo "\n";
    }
  } 
?>

</div>
<?php }

if(!empty($debug)) { ?><pre><?php echo _h($debug); ?></pre><?php } ?>
