<?php
  include_once(dirname(__FILE__) . '/helpers.php');
	/**
	 * Admin editable css theme support
	 * 
	 * @package theme_editable
	 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 2
	 * @author Aaron Unger
	 * @copyright (C) The Concord Consortium 2010
	 */

	// Load engine and restrict to admins 
	require_once(dirname(dirname(dirname(__FILE__))) . '/engine/start.php');
	admin_gatekeeper();

	// Set context
	set_context('admin');

	// Load form view
	$contents = read_css_file();

	$body = elgg_view('theme_editable/settings',array('contents' => $contents));

	// Layout
	$body = elgg_view_layout('two_column_left_sidebar','', $body);

	// View page
	echo page_draw(elgg_echo('theme_editable:settings'),$body);

?>
