<?php

$config['modules']['social_icons'] = array(
	'module_name' => 'Icons',
	'module_uri' => 'social/icons',
	'model_name' => 'social_icons_model',
	'model_location' => 'social',
	'display_field' => 'url',
	'default_col' => 'name',
	'preview_path' => '',
	'permission' => 'social_icons',
	'instructions' => lang('module_instructions_default', 'social icons'),
	'archivable' => TRUE,
	'configuration' => array('social' => 'social'),
	'nav_selected' => 'social/icons',
        'js_controller' => 'SocialController',
        'js_controller_path' => js_path('', SOCIAL_FOLDER),
);

//EOF