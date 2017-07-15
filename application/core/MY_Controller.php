<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $user_id;

    function __construct() {

        parent::__construct();
//        $this->load->model('common/Common_model');
    }

    function get_menu_categories() {
        $categories = array();
//        fetches category information
        $this->load->model('category/category_model');
        $main_categories = $this->category_model->get_main_category();
        foreach ($main_categories as $main_category) {
            $param = array("category_id" => $main_category->category_id);
            $sub_categories = $this->category_model->get_sub_category($param);
            $categories[$main_category->category_name."_@_".$main_category->uri] = $sub_categories;
        }
        return $categories;
    }


//    Fetches fields from database
    function get_fields($fields, $table, $condition="", $group_by="") {
        $this->load->model('general/general_model');
        $records = $this->general_model->get_fields($fields, $table, $condition, $group_by);
        
        return $records;
    }

    function convert_date($date) {
        return date("Y-m-d H:i:s", strtotime($date));
    }

    function valid_date($date) {
        $pattern = '/^(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})(\+|-)\d{2}(:?\d{2})?$/';

        if (preg_match($pattern, $date)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_date', 'The %s is not valid it should match this yyyy-mm-ddThh:mm:ss+dddd format');
            return false;
        }
    }

}
