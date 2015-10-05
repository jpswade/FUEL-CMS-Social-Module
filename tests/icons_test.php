<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class icons_test extends Tester_base {

    public function __construct() {
        parent::__construct();
        $this->CI->load->model('social/social_icons_model', 'social');
    }
    
    public function test_create() {
        $name = 'YouTube';
        $found = $this->CI->social->find_one(array('name' => $name));
        $test = (bool) $found;
        if (!$test) {
            $record = $this->CI->social->create();
            $record->name = $name;
            $record->url = 'http://www.youtube.com/user';
            $record->target = 'blank';
            $record->icon = 'youtube';
            $test = (bool) $record->save();
        }
        $expected = TRUE;
        $this->run($test, $expected, __FUNCTION__ . "() Test for create");
    }
    
    public function test_link() {
        $name = 'YouTube';
        $icon = $this->CI->social->find_one(array('name' => $name));
        $test = $icon->link;
        $expected = '<a href="http://www.youtube.com/user" target="_blank" class="fa fa-youtube" >YouTube</a>';
        $this->run($test, $expected, __FUNCTION__ . '() Test for link');
    }

}

//EOF