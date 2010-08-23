<?php
	global $CONFIG;
	include_once($CONFIG->pluginspath . 'theme_editable/helpers.php');

	$css_file_contents = read_css_file();
?>
  <label>Css: <?php echo elgg_view('input/plaintext', array('value' => $css_file_contents,'internalname' => 'custom_css')); ?> </label>
	<input type="submit" value="<?php echo elgg_echo('save'); ?>" />
