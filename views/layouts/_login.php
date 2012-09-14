<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$login_by_username =      (isset($login_by_username))?$login_by_username:FALSE;
$login_by_email =         (isset($login_by_email))?$login_by_email:FALSE;
$facebook_url = base_url('/sessions/facebook');
$twitter_url = base_url('/sessions/twitter');

$login = array(
  'name'	=> 'login',
  'id'	=> 'login',
  'value' => set_value('login'),
  'maxlength'	=> 80,
  'style'	=> 'width:250px',
  'class' => 'text',
);
if ($login_by_username AND $login_by_email) {
  $login_label = 'Email or login';
} else if ($login_by_username) {
  $login_label = 'Login';
} else {
  $login_label = 'Email';
}
$password = array(
  'name'	=> 'password',
  'id'	=> 'password',
  'style'	=> 'width:250px',
  'class' => 'text',
);
$remember = array(
  'name'	=> 'remember',
  'id'	=> 'remember',
  'value'	=> 1,
  'checked'	=> set_value('remember'),
  'class' => 'styled',
);
$captcha = array(
  'name'	=> 'captcha',
  'id'	=> 'captcha',
  'maxlength'	=> 8,
);
echo form_open('auth/login'); ?>
<fieldset>
  <ul class="makelist login-form">
    <li>
    <?php echo form_label($login_label, $login['id']); ?>
    <?php echo form_input($login); ?>
    <?php echo form_error($login['name']); ?>
    <?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
    </li>
    <li>
    <?php echo form_label('Password', $password['id']); ?>
    <?php echo form_password($password); ?>
    <?php echo form_error($password['name']); ?>
    <?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
    </li>
    <li class="">
    <input type="submit" class="black-button" value="Submit" name="" id="" /> 
    <span class="fr text11">
    <?php echo form_checkbox($remember); ?> 
    <?php echo form_label('Remember me', $remember['id']); ?>
    </span>
    </li>
    <li>
    <span class="fr text11">
    <?php echo anchor($twitter_url, 'Twitter'); ?> &nbsp;|&nbsp;      
    <?php echo anchor($facebook_url, 'Facebook'); ?> &nbsp;|&nbsp;      
    <?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?> &nbsp;|&nbsp;
    <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
    </span>
    </li>
  </ul>
</fieldset>
<?php echo form_close(); ?>
