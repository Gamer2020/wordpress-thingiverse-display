<?php

/** Options Page.*/
function wtd_plugin_options()
{
	if (!current_user_can('administrator')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	echo '<div class="wrap">';
	echo '<form method="post" action="options.php">';
	settings_fields('wtd_options_group');
	$wtd_Thingiverse_API_key = get_option('wtd_Thingiverse_API_key');

	echo '<h2>Thingiverse Display Settings</h2>';

	echo '<tr valign="top"><th scope="row">Thingiverse API Key:</th>';
	echo '<td>';
	echo '<input type="text" name="wtd_Thingiverse_API_key" value="' . sanitize_text_field(get_option('wtd_Thingiverse_API_key')) . '">';
	echo '</td>';
	echo '</tr>';

	echo '</table>';
	echo '<p class="submit">';
	echo '<input type="submit" class="button-primary" value="Save Changes" />';
	echo '</p>';
	echo '</form>';
	echo '</div>';
}
