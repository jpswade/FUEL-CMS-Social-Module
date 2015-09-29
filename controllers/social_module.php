<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Social_module extends Fuel_base_controller {
	
	public $nav_selected = 'social|social/:any';

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$vars['page_title'] = $this->fuel->admin->page_title(array(lang('module_social')), FALSE);
		$crumbs = array('tools' => lang('section_tools'), lang('module_social'));

		$this->fuel->admin->set_titlebar($crumbs, 'ico_social');
		$this->fuel->admin->render('_admin/social', $vars, '', SOCIAL_FOLDER);
	}
}