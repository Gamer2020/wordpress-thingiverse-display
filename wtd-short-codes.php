<?php

function wtd_shortcode_thing($attr, $content = null)
{
	if (!empty($content)) {
		$wtd_Thingiverse_API_key = get_option('wtd_Thingiverse_API_key');

		$json = file_get_contents("https://api.thingiverse.com/things/" . $content . "/?access_token=" . $wtd_Thingiverse_API_key);

		$thing_data = json_decode($json);


		//<div class="ThingPage__galleryHeader--2CF9f">
		//<a class="ThingPage__authorAvatarBody--x0j-o Avatar__avatarBody--2U7bI" href="https://www.thingiverse.com/Gamer2020">
		//<img class="ThingPage__authorAvatar--1iYfa Avatar__avatar--Fmfci" src="https://cdn.thingiverse.com/assets/b7/5a/cd/23/3b/Avatar.jpg" alt="Thing ico">
		//</a>
		//<div class="ThingPage__madeBy--2gx85">
		//<div class="ThingPage__modelName--3CMsV">3DS Game Display Stand</div>
		//<div class="ThingPage__createdBy--1fVAy">by <a href="https://www.thingiverse.com/Gamer2020">Gamer2020</a> January 26, 2020</div></div></div>

		return
			'<table><tr><td>' .
			'<a href="' . $thing_data->creator->public_url . '">' .
			'<img src="' . $thing_data->creator->thumbnail . '" alt="' . $thing_data->creator->name . '" width="50" height="50">' .
			'</a>' .
			'</td><td>' .
			$thing_data->name . '<br> by <a href="' . $thing_data->creator->public_url  . '">' . $thing_data->creator->name . '</a>' .
			'</td></tr>' .
			'</table>' .
			'<img src="' . $thing_data->default_image->url . '">' .
			$thing_data->description_html .
			'<p><a href="https://www.thingiverse.com/thing:' . $content . '/zip">Download</a></p>';
	}
}
