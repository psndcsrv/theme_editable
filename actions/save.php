<?php
  global $CONFIG;
  include_once($CONFIG->pluginspath . 'theme_editable/helpers.php');

	/**
	 * save action for theme_editable
	 * 
	 * @package theme_editable
	 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 2
	 * @author Aaron Unger
	 * @copyright (C) The Concord Consortium 2010
	 */

	action_gatekeeper();

	$custom_css = get_input('custom_css', "", false);

  write_css_file($custom_css);
	
	system_message(elgg_echo("theme_editable:save:success"));
	
	// invalidate the cache so our changes show up
	datalist_set('simplecache_lastupdate',0);
	elgg_filepath_cache_reset();
		
	forward($_SERVER['HTTP_REFERER']);

?>
