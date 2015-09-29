<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require_once(FUEL_PATH . 'models/base_module_model.php');

class Social_icons_model extends Base_module_model {

    public $required = array('url');
    private $set = 'fa';

    function __construct() {
        parent::__construct('social_icons', SOCIAL_FOLDER); // table name
    }

    // used for the FUEL admin
    function list_items($limit = NULL, $offset = NULL, $col = 'name', $order = 'asc', $just_count = FALSE) {
        $this->db->select('id, name, url, published');
        $data = parent::list_items($limit, $offset, $col, $order, $just_count);
        return $data;
    }

    function form_fields() {
        $fields = parent::form_fields();
        $fields['url']['label'] = 'URL';
        $fields['icon'] = array('type' => 'select', 'options' => $this->get_icons(), 'first_option' => 'Select an icon...', 'required' => TRUE, 'after_html' => '<i id="icon-preview" class=""></i>');
        $fields['color'] = array('type' => 'colorpicker');
        return $fields;
    }

    function _common_query() {
        
    }
    
    function get_iconsets() {
        $sets = array();
        $sets['glyphicons'] = array();
        $sets['glyphicons']['url'] = 'https://raw.githubusercontent.com/twbs/bootstrap/master/less/glyphicons.less';
        $sets['glyphicons']['pattern'] = '/.glyphicon-([^,\s"]+)/is';
        $sets['fa']['url'] = 'https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/scss/_icons.scss';
        $sets['fa']['pattern'] = '/\.#\{\$fa-css-prefix\}-([^,\s"]+):before/is';
        return $sets;
    }
    
    function get_icons ($iconset = false) {
        if (!$iconset) {
            $iconset = $this->set;
        }
        $sets = $this->get_iconsets();
        if (!$sets[$iconset]) {
            $iconset = $this->set;
        }
        $url = $sets[$iconset]['url'];
        $pattern = $sets[$iconset]['pattern'];
        $filename = basename($url);
        $file = cache_path($filename);
        if (!is_writable(dirname($file))) {
            $file = sys_get_temp_dir() . '/' . $filename;
        }
        if (!file_exists($file)) {
            copy($url, $file);
        }
        $content = file_get_contents($file);
        $match = array();
        preg_match_all($pattern, $content, $match);
        if (!empty($match)) {
            array_shift($match);
            $list = array_shift($match);
            sort($list);
            return array_combine($list, $list);
        }
    }

}

class Social_icon_model extends Base_module_record {

    function get_link() {
        $url = $this->url;
        if (!is_http_path($url)) {
            $url = 'http://' . $url;
        }
        $label = (!empty($this->name)) ? $this->name : $this->url;
        $attrs = array();
        $attrs[] = (!empty($this->target)) ? 'target="_' . $this->target . '"' : '';
        $attrs[] = (!empty($this->icon)) ? 'class="' . $this->set . ' ' . $this->set . '-' . $this->icon . '"' : '';
        $attrs[] = (!empty($this->color)) ? 'style="color: #' . $this->color . '"' : '';
        return anchor($url, $label, implode(' ', $attrs));
    }

}

//eof