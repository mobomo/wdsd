<?php if(isset($content['field_em_visible']) && $content['field_em_visible'][0]['#markup'] == 1):?>

	<div id="emergency-message">

		<h3><?php print $title; ?></h3>
		<?php if(isset($content['field_emergency_message'])):?>
			<?php print render($content['field_emergency_message']);?>
		<?php endif;?>
		<span id="em-close">&nbsp;</span>

	</div>

	<?php
		drupal_add_js(path_to_theme() . '/js/libs/js.cookie.js');
		drupal_add_js(path_to_theme() . '/js/drubath.emmsg.js');
	?>
	
<?php else:?>

<?php endif;?>