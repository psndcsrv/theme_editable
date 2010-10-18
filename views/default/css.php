<?php
	global $CONFIG;
	include_once($CONFIG->pluginspath . "theme_editable/helpers.php");
	$file_path = get_css_file_path();
	        // If it is not a file or we can't read it throw an exception
        if(!is_file($file_path) || !is_readable($file_path)) {
            include(get_default_css_file_path());
        } else {
        // Sort out the formatting of the filename
        $fileName = realpath($file_path);
       
        // Get the shell output from the syntax check command
        $output = shell_exec('php -l "'.$fileName.'"');
       
        // Try to find the parse error text and chop it off
        $count = 0;
        $syntaxError = preg_replace("/Errors parsing.*$/", "", $output, -1, $count);
       
        // If the error text above was matched, throw an exception containing the syntax error
        if($count > 0) {
            include(get_default_css_file_path());
	} else {
	    include(get_css_file_path());
	}
	}
?>
