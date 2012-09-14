<?php

/*
 * Text cleanup
 */
function _h($text)
{
  return htmlentities($text);

}

/*
 * Show errors from activerecord
 */
function active_errors($model, $field, $start = '', $end='', $force=FALSE)
{
  $out = '';
  if($force) $out = $start.$out.$end;
  if(!$model->errors) return $out;
  if(!$model->errors->is_invalid($field)) return $out;
  $out = '';
  $errors =  $model->errors->on($field);
  if(!is_array($errors)) $errors = array($errors);
  foreach($errors as $err)
  {
   $out .= '<span class="error">'._h($err).'</span>';
  }
  if(strlen($out)>0 || $force == TRUE) $out = $start.$out.$end;
  return $out;
}

/*
 * Helper for radio and checkboxes
 */
function for_choice($field_array, $db_value_if_selected)
{
  $model = $field_array['model'];
  $field = $field_array['field'];

  if(empty($field)) throw new Exception('field not in array in for_choice');
  if(empty($model)) throw new Exception('field not in array in for_choice');
  if(empty($db_value_if_selected)) throw new Exception( 'db_value_if_selected should not be empty for_choice');

  $out = array();
  $out['name'] = $field_array['name'];
  $out['class'] = $field_array['class'];
  $out['value'] = $db_value_if_selected;
  $out['checked'] = ($model->$field == $db_value_if_selected);
  if(!empty($field_array['disabled']) && $field_array['disabled'])
    $out['disabled'] = TRUE;
  return $out;
}


