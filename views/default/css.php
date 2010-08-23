<?php
	global $CONFIG;
	include_once($CONFIG->pluginspath . "theme_editable/helpers.php");
	$css_file_contents = read_css_file();

	eval("?>" . $css_file_contents);
?>
