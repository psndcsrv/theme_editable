<?php

	echo elgg_view_title(elgg_echo('theme_editable:settings'));

?>

	<div class="contentWrapper">
		<p>
			<?php echo elgg_echo('theme_editable:explanation'); ?>
		</p>

<?php

	echo elgg_view('input/form',
		array(
			'action' => $vars['url'] . 'action/theme_editable/save',
			'method' => 'post',
			'body' => elgg_view('theme_editable/settingsform',$vars)
		)
	);

?>

</div>
