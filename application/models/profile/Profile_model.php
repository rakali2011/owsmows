<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_profile_info($user_id) {
        $condition = array("user_id"=> $user_id);
        $this->db->select('user_id, first_name, last_name, user, email, phone, image');
        $this->db->where($condition);
        $query = $this->db->get("user");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_sub_category($param) {
        $condition = array("parent_category_id" => $param["category_id"], "is_deleted" => 0);
        $this->db->select("category_id, category_name, uri, image");
        $this->db->where($condition);
        $query = $this->db->order_by("sort_order","ASC");
        $query = $this->db->get("category");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_sub_category_left_menu($param) {
        $condition = array("parent_category_id" => $param["category_id"], "is_deleted" => 0);
        $this->db->select("c.category_id, c.category_name, c.uri, count(product_category_id) as product_count ");
        $this->db->join("product_category pc","pc.category_id = c.category_id","LEFT");
        $this->db->where($condition);
        $this->db->from("category c");
        $this->db->group_by("c.category_id");
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

}
