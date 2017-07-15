<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function register_user($data) {
        if ($this->db->insert('user', $data)) {
            $insert_id = $this->db->insert_id();
            $this->db->where('user_id', $insert_id);
            $this->db->select('user_id, first_name, last_name, user, email, phone, image');
            $query = $this->db->get('user');
            if ($query->num_rows() > 0)
                return $query->row();
            else
                return FALSE;
        } else {
            return false;
        }
    }

    public function does_user_exist($login) {

        $login_data = array('u.user' => $login['user'],
            'u.password' => $login['password'],
            'u.is_deleted' => '0'
        );
        $this->db->select('user_id, first_name, last_name, user, email, phone, image');
        $this->db->from("user u");
        $this->db->where($login_data);
        
        $query = $this->db->get();
//                echo $this->db->last_query();exit;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row;
        } else {
            return FALSE;
        }
    }

// does_user_exist
    // Get Cancer type List

    function get_cancer_type() {

        $query = $this->db->get('cancer_type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End of Get Medication Log
    //Get Image Path
    function get_image_path($data, $table) {
        $this->db->where($data);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

//End get contact notes
    //Get Col
    function get_col($field, $condition, $table, $order_by = "", $limit = "") {
        $this->db->where($condition, null);
        $this->db->select($field, false);
        if ($order_by != "") {
            $this->db->order_by($order_by);
        }
        if ($limit != "") {
            $this->db->limit($limit);
        }
        $query = $this->db->get($table);
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

//End Get Col
    //Updates entry
    function common_update($cond, $data, $table) {
        $this->db->where($cond);
        $query = $this->db->update($table, $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End updates entry
    //Deletes entry from table
    function common_delete($cond, $table) {
        $this->db->where($cond);
        $query = $this->db->delete($table);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End deletes entry
    // Get user contact list

    function get_contact_all($data) {

        $this->db->where('user_id', $data["user_id"]);
        $this->db->select('contact_id, title, name, contact_type, image');
        $query = $this->db->get('contact');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End user contact list
// Save Contact
    function save_contact($data) {

        $query = $this->db->insert('contact', $data);
        $insert_id = $this->db->insert_id();
        if ($query) {
            return $insert_id;
        } else {
            return false;
        }
    }

//End Save Contact
// Update Contact
    function update_contact($data) {
        $this->db->where('user_id', $data["user_id"]);
        $this->db->where('contact_id', $data["contact_id"]);

        $query = $this->db->update('contact', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End update Contact
// Delete Contact
    function delete_contact($data) {

        $this->db->where('user_id', $data["user_id"]);
        $this->db->where('contact_id', $data["contact_id"]);
        $query = $this->db->delete('contact');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Delete Contact
// Delete Note
    function contact_delete_note($data) {

        $this->db->where('contact_id', $data["contact_id"]);
        $query = $this->db->delete('contact_note');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Delete note
// Delete phone
    function delete_phone($data) {

        $this->db->where('contact_id', $data["contact_id"]);
        $query = $this->db->delete('contact_phone');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Delete Phone
// Save Note
    function save_note($data) {

        $query = $this->db->insert('contact_note', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Save Note
// Update Note
    function contact_update_note($data) {
        $this->db->where('contact_id', $data["contact_id"]);
        $this->db->where('contact_note_id', $data["contact_note_id"]);
        $query = $this->db->update('contact_note', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Update Note
// Save Phone
    function save_phone($data) {

        $query = $this->db->insert('contact_phone', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Save Phone
// update Phone
    function update_phone($data) {

        $this->db->where('contact_id', $data["contact_id"]);

        $query = $this->db->insert('contact_phone', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End update Phone
// Get user contact detail
    function get_contact_detail($data) {

        $output = array();
        $this->db->where('contact_id', $data["contact_id"]);
        $this->db->select('contact_id, title, name, address, email, image, contact_type');
        $query = $this->db->get('contact');
        if ($query->num_rows() > 0) {
            $row = $query->row();
//                $phone = $this->get_contact_phone($data);
            $output["contact_id"] = $row->contact_id;
            $output["title"] = $row->title;
            $output["name"] = $row->name;
            $output["address"] = $row->address;
            $output["email"] = $row->email;
            $output["image"] = ($row->image != "") ? base_url() . CONTACT_IMAGE_PATH . $row->image : "";
            $output["contact_type"] = $row->contact_type;
            $output["phone"] = $this->get_contact_phone($data);
            $output["note"] = $this->get_contact_note($data);

            return $output;
//                return $query->result();
        } else {
            return false;
        }
    }

//End user contact detail
    //get contact phone
    function get_contact_phone($data) {
        $phone = array();
        $this->db->where('contact_id', $data["contact_id"]);
        $this->db->select('contact_phone_id,type,phone');
        $query = $this->db->get('contact_phone');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
            return $phone;
        }
    }

//End get contact phone
    //get contact notes
    function get_contact_note($data) {
        $note = array();
        $this->db->where('contact_id', $data["contact_id"]);
        $this->db->select('contact_note_id,title,note');
        $query = $this->db->get('contact_note');
        if ($query->num_rows() > 0) {

            return $query->result();
        } else {
            return $note;
        }
    }

//End get contact notes
    // Get terms and conditions

    function get_term() {

        $this->db->where('term_id', '1');
        $this->db->select('terms_conditions');
        $query = $this->db->get('terms_conditions');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End get terms and conditions
// Get privacy policy

    function get_privacy() {

        $this->db->where('privacy_id', '1');
        $this->db->select('privacy_policy');
        $query = $this->db->get('privacy_policy');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End get privacy policy
// Get About us data

    function get_about() {

        $this->db->where('about_id', '1');
        $this->db->select('about');
        $query = $this->db->get('about');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End get about us data
// Get Faq

    function get_faq() {

        $this->db->select('faq');
        $this->db->where(array("faq_id" => "1"));
        $query = $this->db->get('faq');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End Faq
    // Logs Activity

    function log_activity($data) {

        $query = $this->db->insert('activity_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Activity
// Update Logged Activity

    function update_activity($data) {
        $condition = array("activity_id" => $data["activity_id"]);
        $this->db->where($condition);
        unset($data["activity_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('activity_log', $data);
//            echo $this->db->last_query();exit;
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Update Logged Activity
// Get Activity Logs
    function get_activity_log($data, $date_range) {

        $condition = array("al.user_id" => $data["user_id"]);

        $this->db->select("al.*");
        $this->db->where($condition);
        $this->db->where("al.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("activity_log al");
        $this->db->join("user u", "u.user_id = al.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Activity Logs
// Get Activity Log detail
    function get_activity_detail($data) {

        $condition = array("activity_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("activity_id, category_name, event_name, start, end, intensity, social, mood, note,photo");
        $this->db->where($condition);
        $query = $this->db->get('activity_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Activity Log detail
//  Get Activity Logs for insight graphs
    function get_activity_insight_log($data, $date_range) {
        $time_offset = $data["time_offset"];
        $condition = array("al.user_id" => $data["user_id"]);

        $this->db->select("al.category_name, al.intensity,"
                . " al.start, al.end,  CONVERT_TZ(al.start,'+00:00','$time_offset') as local_time , "
                . " SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND,`al`.`start`,`al`.`end`))) as diff,"
                . " SUM(TIMESTAMPDIFF(SECOND,`al`.`start`,`al`.`end`)) as seconds,"
                . " SUM(IF(al.intensity = 'Low', TIMESTAMPDIFF(SECOND,`al`.`start`,`al`.`end`),0)) AS low, "
                . " SUM(IF(al.intensity = 'Medium', TIMESTAMPDIFF(SECOND,`al`.`start`,`al`.`end`),0)) AS medium, "
                . " SUM(IF(al.intensity = 'High', TIMESTAMPDIFF(SECOND,`al`.`start`,`al`.`end`),0)) AS high ", false);
        $this->db->where($condition);
        $this->db->where("al.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("activity_log al");
        $this->db->join("user u", "u.user_id = al.user_id AND u.is_deleted <> 1 ", "INNER");
//        $this->db->group_by("al.category_name, date(local_time)");
        $this->db->group_by("al.category_name, local_time, al.start,al.end, al.intensity");
        $this->db->order_by("al.start ASC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Activity Logs for insight graphs
    // Delete Activity Log
    function delete_activity_log($data) {

        $this->db->where($data);
        $query = $this->db->delete('activity_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }
    }

//End Delete Activity
    //  Get Calculation for Mood Logs for logging activity
    function activity_get_mood_log_calculation($data, $date_range) {

        $condition = array("al.user_id" => $data["user_id"]);

        $this->db->select("al.mood,"
                . " COUNT(al.mood) as total_entries ", false);
        $this->db->where($condition);
        $this->db->where("al.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("activity_log al");
        $this->db->join("user u", "u.user_id = al.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->group_by("al.mood ");
        $this->db->order_by("total_entries DESC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Calculation for Mood Logs for logging activity
// Logs Appointment

    function log_appointment($data) {

        $query = $this->db->insert('appointment_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Appointment
// Updates Logged Appointment

    function update_appointment($data) {
        $condition = array("appointment_id" => $data["appointment_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["appointment_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('appointment_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of updates Logged Appointment
// Updates Logged Appointment Experience

    function update_appointment_experience($data) {
        $condition = array("appointment_id" => $data["appointment_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["appointment_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('appointment_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of updates Logged Appointment Experience
// Updates Logged Appointment Status

    function update_appointment_status($data) {
        $condition = array("appointment_id" => $data["appointment_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["appointment_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('appointment_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of updates Logged Appointment Status
// Deletes Logged Appointment
    function delete_appointment_log($data) {
        $condition = array("appointment_id" => $data["appointment_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        $query = $this->db->delete('appointment_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Deletes Logged Appointment
    // Get Appointment Logs
    function get_appointment_log($data, $date_range) {

        $condition = array("al.user_id" => $data["user_id"]);
        $this->db->select("al.*");
        $this->db->where($condition);
        $this->db->where("al.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("appointment_log al");
        $this->db->join("user u", "u.user_id = al.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Appointment Logs
    // Get Appointment Log Detail
    function get_appointment_detail($data) {

        $condition = array("appointment_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("appointment_id, start, end, appointment_type, social, note, photo, appointment_reminder, reminder_time, how_was_it, appointment_status");
        $this->db->where($condition);
        $query = $this->db->get('appointment_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Appointment Log Detail
// Get token list for users having due appointments after their reminder time.

    function appointment_get_token_list($data) {
        $date = $data["current_time"];
//        echo $date;exit;
        $query = $this->db->query("SELECT apl.appointment_id, apl.appointment_type, apl.start, u.user_id, u.device_id, u.device_type FROM appointment_log apl "
                . " INNER JOIN user as u ON (apl.user_id = u.user_id AND u.device_id<>'' AND u.device_id<>'simulator' ) "
                . " WHERE DATE_FORMAT(apl.start, '%Y-%m-%d %H:%i') = DATE_FORMAT(DATE_ADD('$date', INTERVAL apl.reminder_time MINUTE), '%Y-%m-%d %H:%i') AND apl.appointment_reminder='1' AND apl.appointment_status='1' ");
//                . " WHERE DATE_FORMAT(apl.start, '%Y-%m-%d %H:%i')  AND apl.appointment_reminder='1' ");
//        echo $this->db->last_query();exit;
        if ($query) {

            return $query->result();
        } else {
            return FALSE;
        }
    }

//End Get token list
// Get token list for users having due appointments after their reminder time.
    function get_token_list_review_appointment($data) {
        $date = $data["current_time"];
//      echo $date;exit;
        $query = $this->db->query("SELECT apl.appointment_id, apl.appointment_type, apl.start, u.user_id, u.device_id, u.device_type FROM appointment_log apl "
                . " INNER JOIN user as u ON (apl.user_id = u.user_id AND u.device_id<>'' AND u.device_id<>'simulator' ) "
                . " WHERE DATE_FORMAT(apl.end, '%Y-%m-%d %H:%i') = '$date' AND apl.appointment_reminder='1' AND apl.appointment_status='1' ");
//                . " WHERE DATE_FORMAT(apl.start, '%Y-%m-%d %H:%i')  AND apl.appointment_reminder='1' ");
//        echo $this->db->last_query();exit;
        if ($query) {

            return $query->result();
        } else {
            return FALSE;
        }
    }

//End Get token list
// Logs Condition

    function log_condition($data) {

        $query = $this->db->insert('condition_log', $data);
        $insert_id = $this->db->insert_id();
        $this->db->where(array("condition_id" => $insert_id));
        $query = $this->db->select("condition_id, start, note, percent, title, created_date, updated_date");
        $query = $this->db->get('condition_log');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//End of Logs Condition
// updates Logged Condition

    function update_condition($data) {

        $condition = array("condition_id" => $data["condition_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["condition_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('condition_log', $data);
        $this->db->where($condition);
        $this->db->select("condition_id, start, note, percent, created_date, updated_date");
        $query = $this->db->get('condition_log');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//End of updates Logged Condition
    // Get Condition Log Detail
    function get_condition_detail($data) {

        $condition = array("cl1.condition_id" => $data["event_id"], "user_id" => $data["user_id"]);

//        $this->db->select( "cl1.*,IFNULL((select percent from condition_log cl2 where cl2.user_id = cl1.user_id and cl2.condition_id < cl1.condition_id and updated_date < (select max(updated_date) from condition_log) order by updated_date DESC limit 1),'') as percent_previous",false );
//        $this->db->select( "cl1.*,IFNULL((select percent from condition_log cl2 where cl2.user_id = cl1.user_id  and cl2.condition_id <> cl1.condition_id and cl2.start < (select max(start) from condition_log where user_id=cl1.user_id) order by updated_date DESC limit 1),'') as percent_previous",false );
        $this->db->select("cl1.condition_id, cl1.start, cl1.duration, cl1.note, cl1.percent, cl1.title, cl1.created_date, cl1.updated_date,IFNULL((select percent from condition_log cl2 where cl2.user_id = cl1.user_id  and cl2.condition_id <> cl1.condition_id and cl2.start < cl1.start order by start DESC limit 1),'') as percent_previous", false);
        $this->db->from('condition_log cl1');
        $this->db->where($condition);
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Condition Log Detail
// GET Condition

    function get_condition($data) {
        $this->db->select("percent, title, created_date, updated_date");
        $this->db->where($data);
        $this->db->order_by('updated_date', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('condition_log');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//End of Get Condition
// Get Condition Logs for given time frame.
    function get_condition_log($data, $date_range) {

        $condition = array("cl.user_id" => $data["user_id"]);
        $this->db->select("cl.*");
        $this->db->where($condition);
        $this->db->where("cl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('condition_log cl');
        $this->db->join("user u", "u.user_id = cl.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Condition Logs
// Get Condition Logs latest two conditions from given time frame.
    function get_condition_log_latest($data, $date_range) {

        $condition = array("cl.user_id" => $data["user_id"]);
        $this->db->select("cl.*");
        $this->db->where($condition);
        $this->db->where("cl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('condition_log cl');
        $this->db->join("user u", "u.user_id = cl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->order_by("cl.updated_date DESC");
        $this->db->limit("2");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Condition Logs
// Get Condition Logs latest to carry forward in condition line formula for insight graphs.
    function get_condition_percent($data, $date_range) {
        $min_date = $date_range["mindate"];
        $condition = array("cl.user_id" => $data["user_id"]);
        $this->db->select(" cl.percent ");
        $this->db->where($condition);
        $this->db->where("cl.start < '$min_date' ", NULL, FALSE);
        $query = $this->db->from('condition_log cl');
        $this->db->join("user u", "u.user_id = cl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->order_by("cl.start desc");
        $this->db->limit("1");
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
//            return $query->row();
            $percent = $query->row();
            return $percent->percent;
        } else {
            return FALSE;
        }
    }

//Get Condition Logs
// Get average(day) Condition Logs for insights
    function get_avg_condition_log($data, $date_range) {
        $time_offset = $data["time_offset"];
        $condition = array("cl.user_id" => $data["user_id"]);
        $this->db->select("cl.start as date, cl.percent, CONVERT_TZ(cl.start,'+00:00','$time_offset') as local_time", false);
        $this->db->where($condition);
        $this->db->where("cl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('condition_log cl');
        $this->db->join("user u", "u.user_id = cl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->order_by("cl.start ASC");
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

// End Get average(day) Condition Logs for insights
//    
//// Get average(day) Condition Logs for insights
//    function get_avg_condition_log($data, $date_range) {
//        
//        $condition = array("cl.user_id"=>$data["user_id"]);
//        $this->db->select( "cl.start as date, ROUND(avg(cl.percent),2) as average_percent",false );
//        $this->db->where( $condition );
//        $this->db->where( "cl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE );
//        $query = $this->db->from('condition_log cl');
//        $this->db->join( "user u","u.user_id = cl.user_id AND u.is_deleted <> 1 ","INNER" );
//        $this->db->group_by("YEAR(cl.start), MONTH(cl.start), DAY(cl.start)");
//        $this->db->order_by("cl.start ASC");
//        $query = $this->db->get();
////        echo $this->db->last_query();exit;
//        if ($query->num_rows() > 0 ){
//            return $query->result();
//        }
//        else{
//            return FALSE;
//        }
//    }// End Get average(day) Condition Logs for insights
// Get Condition Average Logs to show dots on calender dates
    function get_average_condition($data) {

        $condition = array("cl.user_id" => $data["user_id"]);

        $this->db->select("cl.start as date, ROUND(avg(cl.percent),2) as average_percent", false);
        $this->db->where($condition);
        $query = $this->db->from('condition_log cl');
        $this->db->join("user u", "u.user_id = cl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->group_by("YEAR(cl.start), MONTH(cl.start), DAY(cl.start)");
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Condition average Logs
    // Deletes Logged Condition
    function delete_condition_log($data) {
        $condition = array("condition_id" => $data["condition_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        $query = $this->db->delete('condition_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Deletes Logged Condition
// Logs Meal

    function log_meal($data) {

        $query = $this->db->insert('meal_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Meal
// Delete Meal

    function delete_meal_log($data) {

        $this->db->where($data);
        $query = $this->db->delete('meal_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }
    }

//End Delete Meal
// Get Meal Logs
    function get_meal_log($data, $date_range) {

        $condition = array("ml.user_id" => $data["user_id"]);
        $this->db->select("ml.*");
        $this->db->where($condition);
        $this->db->where("ml.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('meal_log ml');
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Meal Logs
    // Get Meal Log Detail
    function get_meal_detail($data) {

        $condition = array("meal_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("meal_id, start, duration, enjoyment_level, type, social, mood, note, photo");
        $this->db->where($condition);
        $query = $this->db->get('meal_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Meal Log Detail

    public function update_meal_log($data) {

        $condition = array('meal_id' => $data['meal_id'], 'user_id' => $data['user_id']);

        $this->db->where($condition);
        $query = $this->db->update('meal_log', $data);

        if ($this->db->affected_rows() == '1') {

            return TRUE;
        } else {
            return FALSE;
        }
    }

    //  Get Meal Logs for insight graphs 
    function get_meal_insight_log($data, $date_range) {

        $condition = array("ml.user_id" => $data["user_id"]);

        $this->db->select("ml.start, ml.enjoyment_level");
//                . " SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND,`ml`.`start`,`ml`.`end`))) as diff,"
//                . " SUM(TIMESTAMPDIFF(SECOND,`ml`.`start`,`ml`.`end`)) as seconds,"
//                . " SUM(IF(ml.enjoyment_level = 'Low', 1,0)) AS low, "
//                . " SUM(IF(ml.enjoyment_level = 'Medium', 1,0)) AS medium, "
//                . " SUM(IF(ml.enjoyment_level = 'High', 1,0)) AS high,'' as value ",false);
        $this->db->where($condition);
        $this->db->where("ml.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("meal_log ml");
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
//        $this->db->group_by("YEAR(ml.start), MONTH(ml.start), DAY(ml.start)");
        $this->db->order_by("ml.start ASC");
        $query = $this->db->get();
        return $query->result();
////      echo $this->db->last_query();exit;
//        if ($query->num_rows() > 0 ){
//            foreach($query->result() as $key=>$value){
//                $this->db->select("ml.start, ml.enjoyment_level",false);
//        $this->db->where($condition);
//        $this->db->where("DATE(ml.start)", date("Y-m-d",strtotime($value->start)));
//        $this->db->from("meal_log ml");
//        $this->db->order_by("ml.start ASC");
//        $value->value = $this->db->get()->result();
//        
//            }
//            return $query->result();
//        }
//        else{
//            return FALSE;
//        }
    }

//Get Meal Logs for insight graphs
    //  Get Calculation for Mood Logs for logging meal

    function meal_get_mood_log_calculation($data, $date_range) {

        $condition = array("ml.user_id" => $data["user_id"]);

        $this->db->select("ml.mood,"
                . " COUNT(ml.mood) as total_entries ", false);
        $this->db->where($condition);
        $this->db->where("ml.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("meal_log ml");
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->group_by("ml.mood ");
        $this->db->order_by("total_entries DESC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Calculation for Mood Logs for logging meal
    // Logs Medication

    function log_medication($data) {

        $query = $this->db->insert('medication_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Medication
// Updates Logged Medication

    function edit_medication($data) {
        $condition = array("medication_log_id" => $data["medication_log_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["medication_log_id"]);
        unset($data["user_id"]);

        $query = $this->db->update('medication_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of updates Logged Medication
// Add Medication

    function add_medication($data) {

        $query = $this->db->insert('medication', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Add Medication
// Update Medication

    function update_medication($data) {
        $condition = array("medication_id" => $data["medication_id"]);
        unset($data["medication_id"]);
        $query = $this->db->where($condition);
        $query = $this->db->update('medication', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Update Medication
// Get Medication List

    function get_medication_list($data) {
        $date = $data["date"];
        $condition = array("user_id" => $data["user_id"]);
        $this->db->where($condition);
        $this->db->where("'$date' BETWEEN start AND end", NULL, FALSE);
        $query = $this->db->select("medication_id,name,dose_amount,dose_unit,start, end, frequency, instruction, medication_reminder, medication_reminder_time, photo");
        $query = $this->db->get('medication');
//            echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End of Get Medication List
    // Get Medication List

    function get_medication_list_forinsight($data, $date_range) {
        $date = $data["date"];

        $min_date = $date_range["mindate"];
        $max_date = $date_range["maxdate"];

        $condition = array("user_id" => $data["user_id"]);
        $this->db->select('medication_id, name, dose_amount, dose_unit, start, end, frequency, user_id');
        $this->db->from('medication');
        $this->db->where($condition);
        $this->db->where("((start BETWEEN '$min_date' AND '$max_date' OR end BETWEEN '$min_date' AND '$max_date' ) OR (start <= '$min_date' AND end >= '$min_date') )", NULL, FALSE);
        $this->db->order_by("start ASC");
//            $this->db->or_where("'$max_date' BETWEEN start AND end",NULL,FALSE);
        $query = $this->db->get();
//            echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End of Get Medication List
// Get User's Medication List
// Get Medication List for calendar

    function get_medication_list_for_calendar($data, $date_range) {
        $date = $data["date"];
        $min_date = $date_range["mindate"];
        $max_date = $date_range["maxdate"];
        $condition = array("m.user_id" => $data["user_id"]);
        $this->db->select("m.medication_id,m.name,m.start,m.end,m.frequency,IFNULL(max(ml.taken_time),'') as taken_time", false);
        $this->db->from("medication m");
        $this->db->where($condition);
        $this->db->where("((start BETWEEN '$min_date' AND '$max_date' OR end BETWEEN '$min_date' AND '$max_date' ) OR (start <= '$min_date' AND end >= '$min_date') )", NULL, FALSE);
        $this->db->join("medication_log ml", "ml.medication_id = m.medication_id AND ml.user_id = m.user_id", "LEFT");
        $this->db->group_by("m.medication_id");
        $query = $this->db->get();
//            echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End of Get Medication List
// Get User's Medication List for calendar

    function get_user_medication_list($data) {

        $this->db->select("name,frequency");
        $this->db->where($data);
        $query = $this->db->get('medication');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

//End of Get User's Medication List
// Get Medication detail

    function get_medication_detail($data) {

        $this->db->select("medication_id, name, dose_amount, dose_unit, start, end, frequency, instruction, medication_reminder, medication_reminder_time, photo");
        $this->db->where($data);
        $query = $this->db->get('medication');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End of Get Medication detail
// Get Medication Log detail

    function medication_log_detail($data) {

        $condition = array("ml.medication_log_id" => $data["medication_log_id"], "ml.user_id" => $data["user_id"]);
        $this->db->select('ml.medication_log_id,ml.medication_id,ml.taken_time,ml.dose_amount,ml.dose_unit,ml.note,ml.photo,m.name');
        $this->db->from('medication_log ml');
        $this->db->where($condition);
        $this->db->join('medication m', 'ml.medication_id = m.medication_id', 'INNER');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End of Get Medication detail
// Delete Medication

    function delete_medication($data) {

        $this->db->where($data);
        $query = $this->db->delete('medication');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }
    }

//End Delete Medication
// Delete Medication Log

    function delete_medication_log($data) {

        $this->db->where($data);
        $query = $this->db->delete('medication_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }
    }

//End Delete Medication log
//// Get Medication Log
//
//    function get_medication_log($data) {
//            $condition = array("m.user_id"=>$data["user_id"]);
//            $this->db->where($condition);
//            $this->db->select("IFNULL(`ml`.`medication_log_id`,'') as medication_log_id", FALSE);
//            $this->db->select("IFNULL(`ml`.`taken_time`,'') as taken_time", FALSE);
//            $this->db->select("IFNULL(`m`.`user_id`,'') as user_id", FALSE);
//            $this->db->select("IFNULL(`m`.`medication_id`,'') as medication_id", FALSE);
//            $this->db->select("IFNULL(`m`.`name`,'') as name", FALSE);
//            $this->db->select("IFNULL(`m`.`dose_amount`,'') as dose_amount", FALSE);
//            $this->db->select("IFNULL(`m`.`dose_unit`,'') as dose_unit", FALSE);
//            $this->db->select("IFNULL(`m`.start,'') as start", FALSE);
//            $this->db->select("IFNULL(`m`.end,'') as end", FALSE);
//            $this->db->select("IFNULL(`m`.frequency,'') as frequency", FALSE);
//            $this->db->select("IFNULL(`m`.instruction,'') as instruction", FALSE);
//            $this->db->select("IFNULL(`m`.medication_reminder,'') as medication_reminder", FALSE);
//            $this->db->select("IFNULL(`m`.medication_reminder_time,'') as medication_reminder_time", FALSE);
//            $this->db->select("IFNULL(`m`.photo,'') as photo", FALSE);
//            $this->db->select("IFNULL(`ml`.`dose_amount`,'') as log_dose_amount", FALSE);
//            $this->db->select("IFNULL(`ml`.`dose_unit`,'') as log_dose_unit", FALSE);
//            $this->db->from('medication as m');
//            $this->db->join('medication_log as ml', 'm.medication_id = ml.medication_id','left');
//            $query = $this->db->get();
////            echo $this->db->last_query();exit;
//            if ($query->num_rows() > 0){
//                return $query->result();
//            }
//            else{
//                return false;
//            }
//
//    }//End of Get Medication Log
// Get Medication Logs

    function get_medication_log($data, $date_range) {

        $condition = array("ml.user_id" => $data["user_id"]);
        $this->db->select("ml.*,m.name");
        $this->db->where($condition);
        $this->db->where("ml.taken_time BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('medication_log ml');
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->join("medication m", "m.medication_id = ml.medication_id ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Medication Logs
    // Get Medication Log Detail
    function get_medication_log_detail($data) {

        $condition = array("medication_log_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("medication_log_id, medication_id, taken_time, dose_amount, dose_unit, note, photo");
        $this->db->where($condition);
        $query = $this->db->get('medication_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Medication Log Detail
    //  Get Medication Logs for insight graphs 
    function get_medication_insight_log($data, $date_range) {

        $condition = array("ml.user_id" => $data["user_id"]);

        $this->db->select("ml.taken_time as taken_date, ml.medication_id ", false);
        $this->db->where($condition);
        $this->db->where("ml.taken_time BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("medication_log ml");
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
//        $this->db->group_by(" YEAR(ml.taken_time), MONTH(ml.taken_time), DAY(ml.taken_time)");
        $this->db->order_by("ml.taken_time ASC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
//            foreach($query->result() as $key=>$value){
//                $this->db->select("TIME(ml.taken_time) as taken_time, m.name as medication_name, m.frequency",false);
//                $this->db->where($condition);
//                $this->db->where("DATE(ml.taken_time)", date("Y-m-d",strtotime($value->taken_date)));
//                $this->db->from("medication_log ml");
//                $this->db->join("medication m","m.medication_id = ml.medication_id ","INNER");
//                $this->db->order_by("ml.taken_time ASC");
//                $value->detail = $this->db->get()->result();
//            }
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Medication Logs for insight graphs
    // Get token list for users having due medication after their reminder time.
    function medication_get_token_list($data) {
        $date = $data["current_time"];
//        $status = $data["status"];
//        echo $date;exit;
        $query = $this->db->query("SELECT m.name, m.dose_amount, m.dose_unit, m.medication_reminder, m.frequency, medication_reminder_time, "
                . " u.user_id, u.device_id, u.device_type FROM medication m "
                . " INNER JOIN user as u ON (m.user_id = u.user_id AND u.device_id <> '' AND u.device_id <> 'simulator' ) "
                . " WHERE m.medication_reminder='1' "
//                . " AND DATE_FORMAT(m.start, '%Y-%m-%d %H:%i') = DATE_FORMAT(DATE_ADD('$date', INTERVAL m.medication_reminder MINUTE), '%Y-%m-%d %H:%i') "
                . " AND DATE('$date') BETWEEN m.start AND m.end ");
//        echo $this->db->last_query();exit;
        if ($query) {

            return $query->result();
        } else {
            return FALSE;
        }
    }

//End Get token list
    // Logs Mood

    function log_mood($data) {

        $query = $this->db->insert('mood_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Mood
// updates Logged Mood

    function update_mood($data) {
        $condition = array("mood_id" => $data["mood_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["mood_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('mood_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of updates Logged Mood
// Get Mood Logs
    function get_mood_log($data, $date_range) {

        $condition = array("ml.user_id" => $data["user_id"]);
        $this->db->select("ml.*");
        $this->db->where($condition);
        $this->db->where("ml.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('mood_log ml');
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Mood Logs
// Get Lastest Mood Log entry
    function get_mood_latest_log($data) {
        $current = date("Y-m-d H:i:s");
        $condition = array("ml.user_id" => $data["user_id"], "ml.start <" => $current);
        $this->db->select("ml.mood");
        $this->db->where($condition);
        $query = $this->db->from('mood_log ml');
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->order_by('ml.start', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

//Get Mood Logs
    // End Get Lastest Mood Log entry
    function get_mood_detail($data) {

        $condition = array("mood_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("mood_id, start, duration, mood, note, photo");
        $this->db->where($condition);
        $query = $this->db->get('mood_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Mood Log Detail
    // Deletes Logged Mood
    function delete_mood_log($data) {
        $condition = array("mood_id" => $data["mood_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        $query = $this->db->delete('mood_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Deletes Logged Mood
//  Get Mood Logs for insight graphs
    function get_mood_insight_log($data, $date_range) {
        $time_offset = $data["time_offset"];
        $condition = array("ml.user_id" => $data["user_id"]);

        $this->db->select("ml.mood, ml.start", false);
//        $this->db->select("ml.mood, ml.start, CONVERT_TZ(ml.start,'+00:00','$time_offset') as local_time",false);
        $this->db->where($condition);
        $this->db->where("ml.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("mood_log ml");
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
//        $this->db->group_by("ml.mood, YEAR(ml.start), MONTH(ml.start), DAY(ml.start)");
        $this->db->order_by("ml.start ASC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Mood Logs for insight graphs
    // Get Mood Logs latest to carry forward in mood formula for insight graphs.
    function get_mood($data, $date_range) {
        $min_date = $date_range["mindate"];
        $condition = array("ml.user_id" => $data["user_id"]);
        $this->db->select(" ml.mood ");
        $this->db->where($condition);
        $this->db->where("ml.start < '$min_date' ", NULL, FALSE);
        $query = $this->db->from('mood_log ml');
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->order_by("ml.start desc");
        $this->db->limit("1");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
//           return $query->row();
            $percent = $query->row();
            return $percent->mood;
        } else {
            return FALSE;
        }
    }

//Get Mood Logs
//  Get Calculation for Mood Logs for insight graphs
    function get_mood_insight_log_calculation($data, $date_range) {

        $condition = array("ml.user_id" => $data["user_id"]);

        $this->db->select("ml.mood,"
                . " COUNT(ml.mood) as total_entries ", false);
        $this->db->where($condition);
        $this->db->where("ml.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("mood_log ml");
        $this->db->join("user u", "u.user_id = ml.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->group_by("ml.mood ");
        $this->db->order_by("total_entries DESC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Calculation for Mood Logs for insight graphs
    // Adds Note

    function add_note($data) {

        $query = $this->db->insert('note', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Adds Note
// Delete Note

    function note_delete_note($data) {
        $this->db->where($data);
        $query = $this->db->delete('note');
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Adds Note
// Update Note

    function note_update_note($data) {
        $this->db->where('note_id', $data['note_id']);
        $query = $this->db->update('note', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Update Note
// List Note

    function list_note($data) {
        $condition = array("user_id" => $data["user_id"]);
        $this->db->select("note_id, date_added, note");
        $this->db->where($condition);
        $this->db->order_by("date_added", "DESC");
        $query = $this->db->get('note');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//End of List Note
// Get Note Logs
    function get_note_log($data, $date_range) {

        $condition = array("n.user_id" => $data["user_id"]);
        $this->db->select("n.*");
        $this->db->where($condition);
        $this->db->where("n.date_added BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('note n');
        $this->db->join("user u", "u.user_id = n.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->order_by("date_added", "DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Note Logs
    // Get Note Log Detail
    function get_note_detail($data) {

        $condition = array("note_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("note_id, date_added, note");
        $this->db->where($condition);
        $query = $this->db->get('note');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Note Log Detail
    // Logs Pain

    function log_pain($data) {

        $query = $this->db->insert('pain_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Pain
// Update Logged Pain

    function update_pain($data) {
        $condition = array("pain_id" => $data["pain_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["pain_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('pain_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of update Logged Pain
// Get Pain Logs
    function get_pain_log($data, $date_range) {

        $condition = array("pl.user_id" => $data["user_id"]);
        $this->db->select("pl.*");
        $this->db->where($condition);
        $this->db->where("pl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('pain_log pl');
        $this->db->join("user u", "u.user_id = pl.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Pain Logs
    // Delete Pain Log
    function delete_pain_log($data) {

        $this->db->where($data);
        $query = $this->db->delete('pain_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }
    }

//End Delete Painx
    // Get Pain Log Detail
    function get_pain_detail($data) {

        $condition = array("pain_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("pain_id, start, duration, location, severity, note, photo");
        $this->db->where($condition);
        $query = $this->db->get('pain_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Pain Log Detail
    //  Get Pain Logs for insight graphs
    function get_pain_insight_log($data, $date_range) {
        $time_offset = $data["time_offset"];
        $condition = array("pl.user_id" => $data["user_id"]);

        $this->db->select("pl.location, ROUND(AVG(pl.severity),2) as severity,"
                . " pl.start, CONVERT_TZ(pl.start,'+00:00','$time_offset') as local_time  ", false);
//                . " SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND,`pl`.`start`,`pl`.`end`))) as diff,"
//                . " SUM(TIMESTAMPDIFF(SECOND,`pl`.`start`,`pl`.`end`)) as seconds ",false);
//                . " (`pl`.`start`)*60 as seconds ",false);
        $this->db->where($condition);
        $this->db->where("pl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("pain_log pl");
        $this->db->join("user u", "u.user_id = pl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->group_by("pl.location, date(local_time), pl.start, pl.severity");
//        $this->db->group_by("pl.location, YEAR(pl.start), MONTH(pl.start), DAY(pl.start)");
        $this->db->order_by("pl.start ASC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Pain Logs for insight graphs
    // Logs Rest

    function log_rest($data) {

        $query = $this->db->insert('rest_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Rest
// Updates Logged Rest

    function update_rest($data) {
        $condition = array("rest_id" => $data["rest_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["rest_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('rest_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of updates Logged Rest
// Get Rest Logs
    function get_rest_log($data, $date_range) {

        $condition = array("rl.user_id" => $data["user_id"]);
        $this->db->select("rl.*");
        $this->db->where($condition);
        $this->db->where("rl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('rest_log rl');
        $this->db->join("user u", "u.user_id = rl.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Rest Logs
    // Get Rest Log Detail
    function get_rest_detail($data) {

        $condition = array("rest_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("rest_id, start, end, quantity, social, mood, note, photo");
        $this->db->where($condition);
        $query = $this->db->get('rest_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Rest Log Detail
    // Deletes Logged Rest
    function delete_rest_log($data) {
        $condition = array("rest_id" => $data["rest_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        $query = $this->db->delete('rest_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Deletes Logged Rest
    //  Get Rest Logs for insight graphs
    function get_rest_insight_log($data, $date_range) {
        $time_offset = $data["time_offset"];
        $condition = array("rl.user_id" => $data["user_id"]);

        $this->db->select("rl.start, rl.end,  CONVERT_TZ(rl.start,'+00:00','$time_offset') as local_time , "
                . " SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND,`rl`.`start`,`rl`.`end`))) as diff,"
                . " SUM(TIMESTAMPDIFF(SECOND,`rl`.`start`,`rl`.`end`)) as seconds,"
                . " SUM(IF(rl.quantity = 'Low', TIMESTAMPDIFF(SECOND,`rl`.`start`,`rl`.`end`),0)) AS low, "
                . " SUM(IF(rl.quantity = 'Medium', TIMESTAMPDIFF(SECOND,`rl`.`start`,`rl`.`end`),0)) AS medium, "
                . " SUM(IF(rl.quantity = 'High', TIMESTAMPDIFF(SECOND,`rl`.`start`,`rl`.`end`),0)) AS high ", false);
        $this->db->where($condition);
        $this->db->where("rl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("rest_log rl");
        $this->db->join("user u", "u.user_id = rl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->group_by("date(local_time), rl.quantity, rl.start, rl.end");
        $this->db->order_by("rl.start ASC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Rest Logs for insight graphs
    //  Get Calculation for Mood Logs for logging rest
    function get_mood_log_calculation($data, $date_range) {

        $condition = array("rl.user_id" => $data["user_id"]);

        $this->db->select("rl.mood,"
                . " COUNT(rl.mood) as total_entries ", false);
        $this->db->where($condition);
        $this->db->where("rl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("rest_log rl");
        $this->db->join("user u", "u.user_id = rl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->group_by("rl.mood ");
        $this->db->order_by("total_entries DESC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Calculation for Mood Logs for logging rest
    // Logs Symptom

    function log_symptom($data) {
//print_r($data);exit;
        $query = $this->db->insert('symptom_log', $data);
//          echo $this->db->last_query();exit;
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Symptom
// Add Symptom

    function add_symptom($data) {

        $query = $this->db->insert('symptom_list', $data);
        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return FALSE;
        }
    }

//End of Add Symptom
//// Get Symptom List
//
//    function get_symptom_log($data) {
//        $this->db->select("IFNULL(sl.symptom_log_id,'') as symptom_log_id", FALSE);
//        $this->db->select("IFNULL(sl.symptom_value,'') as symptom_value", FALSE);
//        $this->db->select("IFNULL(sl.date_added,'') as date_added", FALSE);
//        $this->db->select("IFNULL(sl.date_updated,'') as date_updated", FALSE);
//        $this->db->select("IFNULL(slst.symptom_id,'') as symptom_id", FALSE);
//        $this->db->select("IFNULL(slst.name,'') as name", FALSE);
//        $this->db->select("IFNULL(slst.type,'') as type", FALSE);
//        $this->db->from('symptom_list slst');
//        $this->db->where("(slst.type='general' OR slst.user_id='{$data['user_id']}')", NULL, FALSE);
//        $this->db->join('symptom_log as sl', 'slst.symptom_id = sl.symptom_id','left');
//            $query = $this->db->get();
////            echo $this->db->last_query();exit;
//            if ($query->num_rows() > 0){
//                return $query->result();
//            }
//            else{
//                return false;
//            }
//    }//End of GET Symptom list
//    
//// Get Symptom List

    function get_symptom_list($data) {
        $user_id = $data["user_id"];
        $max_date = $data["max_date"];
        $this->db->select("sl.symptom_id,sl.name,sl.type,"
                . "IFNULL(slog.symptom_value,'') as symptom_value,"
                . "IFNULL(slog.symptom_log_id,'') as symptom_log_id ", FALSE);
        $this->db->where("(sl.type='general' OR sl.user_id='$user_id') ", NULL, FALSE);
        $this->db->join("symptom_log slog", "sl.symptom_id = slog.symptom_id AND "
                . " slog.user_id = '$user_id' AND slog.date_updated = '$max_date' ", "LEFT");
        $query = $this->db->from('symptom_list sl');
//        $this->db->group_by("sl.symptom_id ");
//        $this->db->having("slog.date_updated = max(slog.date_updated)");
        $this->db->order_by("slog.symptom_value DESC, sl.name ASC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;

        if ($query !== FALSE && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//End of GET Symptom list
// Get Symptom Logs
    function get_symptom_log($data, $date_range) {

        $condition = array("sl.user_id" => $data["user_id"], "sl.is_new" => '1');
        $this->db->select("sl.*,s.name");
        $this->db->where($condition);
        $this->db->where("sl.date_updated BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('symptom_log sl');
        $this->db->join("user u", "u.user_id = sl.user_id AND u.is_deleted <> 1 ", "INNER");
        $this->db->join("symptom_list s", "s.symptom_id = sl.symptom_id ", "INNER");
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Symptom Logs
// Get latest Symptom Logs for insight
    function get_latest_symptom_log($data) {

//        SELECT sl.*,s.name FROM `symptom_log` sl 
//INNER JOIN ( SELECT symptom_id, MAX(date_updated) AS date_updated FROM `symptom_log` GROUP BY symptom_id) AS max USING (symptom_id, date_updated) 
//INNER JOIN symptom_list as s ON (s.symptom_id = sl.symptom_id)
//where sl.user_id=60
        // 
        $this->db->select(" MAX(date_updated) as max_date");
        $query = $this->db->from('symptom_log');
        $query = $this->db->where('user_id', $data["user_id"]);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output = $query->row();
//            print_r($query->row());exit;
            $condition = array(
                "sl.user_id" => $data["user_id"],
                "sl.date_updated" => $output->max_date
            );
            $this->db->select("s.name, sl.symptom_value,sl.symptom_log_id,sl.date_updated");
            $this->db->where($condition);
            $query = $this->db->from('symptom_log sl');
            $this->db->join("user u", "u.user_id = sl.user_id AND u.is_deleted <> 1 AND sl.symptom_value <> 1 ", "INNER");
            $this->db->join("symptom_list s", "s.symptom_id = sl.symptom_id ", "LEFT");
            $query = $this->db->order_by('sl.symptom_value DESC, s.name ASC');
            $query = $this->db->get();
//            echo $this->db->last_query();exit;
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

//End Get lates Symptom Logs for insight
    // Get Rest Log Detail
    function get_symptom_detail($data) {

        $condition = array("sl.symptom_log_id" => $data["event_id"], "sl.user_id" => $data["user_id"]);

        $this->db->select("sl.symptom_log_id, sl.symptom_id, sl.symptom_value, sl.date_added, sl.date_updated, sl.is_new,syl.name, '' as pre_value, '' as pre_entry, '' as next_entry", false);
        $this->db->where($condition);
        $this->db->join("symptom_list syl", "syl.symptom_id = sl.symptom_id ", "INNER");
        $this->db->from('symptom_log sl');
        $this->db->group_by('sl.symptom_log_id');
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Rest Log Detail
    // Deletes Logged Symptom
    function delete_symptom_log($data) {
        $condition = array("symptom_log_id" => $data["symptom_log_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        $query = $this->db->delete('symptom_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Deletes Logged Symptom
    //  Get Symptom Logs for insight graphs 
    function get_symptom_insight_log($data, $date_range) {

        $condition = array("sl.user_id" => $data["user_id"]);

        $this->db->select("sl.symptom_id, syl.name as symptom_name, sl.symptom_value ,"
                . " sl.date_added ", false);
        $this->db->where($condition);
        $this->db->where("sl.date_added BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $this->db->from("symptom_log sl");
        $this->db->join("symptom_list syl", "syl.symptom_id = sl.symptom_id ", "INNER");
        $this->db->join("user u", "u.user_id = sl.user_id AND u.is_deleted <> 1 ", "INNER");
//        $this->db->group_by("sl.symptom_id, YEAR(sl.date_updated), MONTH(sl.date_updated), DAY(sl.date_updated)");
        $this->db->order_by("sl.date_added ASC");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Symptom Logs for insight graphs
    //  Get Symptom Logs pre for insight graphs 

    function get_symptom_insight_log_pre($data, $date_range) {
        $symptom_id = $data["symptom_id"];
        $condition = array("sl.user_id" => $data["user_id"]);

        $this->db->select("sl.symptom_id, syl.name as symptom_name, sl.symptom_value ,"
                . " sl.date_added ", false);
        $this->db->where($condition);
        $this->db->where("sl.date_added < '{$date_range["mindate"]}' AND sl.symptom_id='$symptom_id' ", NULL, FALSE);
        $this->db->from("symptom_log sl");
        $this->db->join("symptom_list syl", "syl.symptom_id = sl.symptom_id ", "INNER");
        $this->db->join("user u", "u.user_id = sl.user_id AND u.is_deleted <> 1 ", "INNER");
//        $this->db->group_by("sl.symptom_id, YEAR(sl.date_updated), MONTH(sl.date_updated), DAY(sl.date_updated)");
        $this->db->order_by("sl.date_added DESC");
        $this->db->limit("1");
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Symptom Logs pre for insight graphs
    // Updates Logged Rest

    function update_symptom_log($data) {
        $condition = array("symptom_log_id" => $data["symptom_log_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["symptom_log_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('symptom_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of updates Logged Rest
    // Logs Water

    function log_water($data) {

        $query = $this->db->insert('water_log', $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of Logs Water
    // Get Water Logs
    function get_water_log($data, $date_range) {

        $condition = array("wl.user_id" => $data["user_id"]);
        $this->db->select("wl.*");
        $this->db->where($condition);
        $this->db->where("wl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
        $query = $this->db->from('water_log wl');
        $this->db->join("user u", "u.user_id = wl.user_id AND u.is_deleted <> 1 ", "INNER");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Water Logs
    // Get Water Log Detail
    function get_water_detail($data) {

        $condition = array("water_id" => $data["event_id"], "user_id" => $data["user_id"]);

        $this->db->select("water_id, start, duration, amount, unit, note, photo");
        $this->db->where($condition);
        $query = $this->db->get('water_log');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Water Log Detail
    // Delete Water Log
    function delete_water_log($data) {

        $this->db->where($data);
        $query = $this->db->delete('water_log');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return false;
        }
    }

//End Delete Water
    // Update Logged Water

    function update_water_log($data) {
        $condition = array("water_id" => $data["water_id"], "user_id" => $data["user_id"]);
        $this->db->where($condition);
        unset($data["water_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('water_log', $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//End of update Logged Water
    //  Get Water Logs for insight graphs
    function get_water_insight_log($data, $date_range) {
        $time_offset = $data["time_offset"];
        $condition = array("wl.user_id" => $data["user_id"]);
        $user_id = $data["user_id"];
//        $this->db->select("wl.start, "
//                . " SUM(Case 
//            When wl.unit = 'Liters' Then round(wl.amount*4.22675,2) 
//            When wl.unit = 'Cups' Then round(wl.amount,2) 
//            When wl.unit = 'Ounces' Then round(wl.amount/8,2) 
//            End) as amount",false);
////                . " SUM(IF(wl.unit = 'Liters', wl.amount*4.22675,0)) as amount",false);
//        $this->db->where($condition);
//        $this->db->where("wl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}' ", NULL, FALSE);
//        $this->db->from("water_log wl");
//        $this->db->join("user u","u.user_id = wl.user_id AND u.is_deleted <> 1 ","INNER");
//        $this->db->group_by("date(CONVERT_TZ(wl.start,+00:00,+05:00))",null,false);
        $query = $this->db->query("SELECT wl.start, SUM(Case             
                When wl.unit = 'Liters' Then round(wl.amount*4.22675,2)
                When wl.unit = 'Cups' Then round(wl.amount,2)
                When wl.unit = 'Ounces' Then round(wl.amount/8,2)
                End) as amount 
                FROM water_log wl
                INNER JOIN user u ON u.user_id = wl.user_id AND u.is_deleted <> 1
                WHERE `wl`.`user_id` =  '$user_id'
                AND wl.start BETWEEN '{$date_range["mindate"]}' AND '{$date_range["maxdate"]}'
                group by date(CONVERT_TZ(wl.start,'+00:00','$time_offset')), wl.start, wl.unit
                ORDER BY wl.start ASC ");
//        $this->db->group_by("YEAR(wl.start), MONTH(wl.start), DAY(wl.start)");
//        $this->db->order_by("wl.start ASC");
//        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Water Logs for insight graphs
    // Get Survey List

    function get_survey_list($data) {

//        $condition = array("user_id"=>$data["user_id"]);
        $user_id = $data["user_id"];

        $this->db->select("s.survey_id,s.survey_name,s.survey_date_created,s.survey_date_edited,"
                . " COUNT(sq.question_id) as total_question, "
                . " '' as total_answered,'' as answer_date ", false);
        $this->db->from("survey s");

        $this->db->join("survey_question sq", "sq.survey_id = s.survey_id AND s.survey_status='1' ", "INNER");
        $this->db->group_by("s.survey_id");

        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $value) {
                $condition = array("survey_id" => $value->survey_id, "user_id" => $data["user_id"]);

//              gets count of answerd question for a survey.
                $this->db->select("COUNT(DISTINCT question_id) as total_answerd, IFNULL(max(answer_date),'') as answer_date", false);
                $this->db->where($condition);
                $this->db->from("survey_user_answer");
//              $this->db->group_by("question_id");
                $result = $this->db->get();
                $row = $result->row();
                $value->total_answered = $row->total_answerd;
                $value->answer_date = $row->answer_date;
            }

            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Survey List
// Save survey answer
    function save_answer($data) {
        $option_ids = explode(",", $data["option_id"]);
        foreach ($option_ids as $option_id) {
            $data["option_id"] = $option_id;
            $query = $this->db->insert('survey_user_answer', $data);
        }

        $insert_id = $this->db->insert_id();
        if ($insert_id) {
            return $insert_id;
        } else {
            return FALSE;
        }
    }

//Get Survey List
// Get Survey detail
    function get_survey_detail($data) {

        $condition = array("sq.survey_id" => $data["survey_id"]);
        $user_id = $data["user_id"];
        $survey_id = $data["survey_id"];

        $this->db->select("sq.question_id, sq.survey_id, sq.answer_type, sq.question, sq.survey_question_insight,'' as answers ,'' as user_answers ", false);
        $this->db->join("survey s", "s.survey_id = sq.survey_id AND s.survey_status = '1'", "INNER");
        $this->db->where($condition);
        $query = $this->db->get('survey_question sq');
//        echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $key => $value) {
                $condition = array("sao.survey_id" => $data["survey_id"], "sao.question_id" => $value->question_id);
//              $condition["question_id"] = $value->question_id;
//              gets list of answers for a question with their percentage.
                $this->db->select("sao.option_id, sao.option_text, round(IFNULL((SUM(sua.option_id = sao.option_id)/COUNT(DISTINCT sua.question_id, sua.user_id))*100,0)) as percent", false);
//                $this->db->select("sao.option_id, sao.option_text, round(IFNULL((SUM(sua.option_id = sao.option_id)/COUNT(sua.option_id))*100,0)) as percent",false);
                $this->db->join("survey_user_answer as sua", "sua.question_id = sao.question_id AND sua.survey_id = sao.survey_id", "LEFT");
                $this->db->where($condition);
                $this->db->from("survey_answer_option as sao");
                $this->db->group_by("sao.option_id");

                $value->answers = $this->db->get()->result();
//                $this->db->select("option_id, option_text",false);
//                $this->db->where($condition);
//                $this->db->from("survey_answer_option");
//                $value->answers = $this->db->get()->result();
                //gets list of user's answers for a question.
                $this->db->select("option_id", false);
                $this->db->where(array("user_id" => $data["user_id"], "question_id" => $value->question_id, "survey_id" => $data["survey_id"]));
                $this->db->from("survey_user_answer ");
                $value->user_answers = $this->db->get()->result();
            }
            return $query->result();
        } else {
            return FALSE;
        }
    }

//Get Survey detail
    // Get user profile data

    function get_profile($data) {

        $this->db->select('ct.cancer_type, u.cancer_type_id,'
                . ' u.created_date, u.modified_date, u.first_name,'
                . ' u.email, u.gender, u.age, u.height, u.weight,'
                . ' u.zip, u.push_notification, u.cancer_stage,'
                . ' u.diagnose_date, u.diagnose_type, u.avatar, u.registration_process ');
        $this->db->from('user u');
        $this->db->where('u.user_id', $data["user_id"]);
        $this->db->join("cancer_type ct", "ct.cancer_type_id = u.cancer_type_id", "LEFT");
        $query = $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

//Updates user profile to complete registration steps
    function update_profile($data) {

        $this->db->where('user_id', $data["user_id"]);
        $query = $this->db->update('user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Update user profile
//Updates user profile to complete registration steps
    function delete_user($data) {
        $this->db->where('user_id', $data["user_id"]);
        $query = $this->db->update('user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Update user profile
// Change user password
    function change_password($data) {

        $this->db->where('user_id', $data["user_id"]);
        $query = $this->db->update('user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Change user password
// Change forgot password
    function change_forgot_password($data) {

        $this->db->where('token', $data["token"]);
        $data["token"] = "";
        $query = $this->db->update('user', $data);

        if ($this->db->affected_rows() == '1') {
            return true;
        } else {
            return false;
        }
    }

//End Change forgot password
// Change forgot pin
    function change_forgot_pin($data) {

        $this->db->where('token', $data["token"]);
        $data["token"] = "";
        $query = $this->db->update('user', $data);

        if ($this->db->affected_rows() == '1') {
            return true;
        } else {
            return false;
        }
    }

//End Change forgot pin
// Change user pin
    function change_pin($data) {

        $this->db->where('user_id', $data["user_id"]);
        $query = $this->db->update('user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End Change user password
// update notification setting
    function change_notify_setting($data) {
        $this->db->where('user_id', $data["user_id"]);
        unset($data["user_id"]);
        $query = $this->db->update('user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//End update notification setting
    //Checks old password
    public function check_old_password($data) {
//        $this->db->where('user_id', $data["user_id"]);
        $condition = array("user_id" => $data["user_id"],
            "password" => $data["password"]
        );
        $this->db->where($condition);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0)
            return true;
        else
            return false;
    }

//End check old password
    //Checks old pin
    public function check_old_pin($data) {
        $condition = array("user_id" => $data["user_id"],
            "pin" => $data["pin"]
        );
        $this->db->where($condition);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0)
            return true;
        else
            return false;
    }

//End check old password
    //Checks email exist
    public function is_exist_email($data) {
        $condition = array("email" => $data["email"]
        );
        $this->db->where($condition);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            $token = array("token" => time());
            $this->db->where('email', $data["email"]);
            $query_update = $this->db->update('user', $token);
            $output["token"] = $token["token"];
            $result = $query->row();
            $output["user_id"] = $result->user_id;
            $output["first_name"] = $result->first_name;
            $output["email"] = $result->email;
            $output["reset_link"] = base_url();
            return $output;
        } else {
            return false;
        }
    }

//End check email exist
    public function get_version_info($data) {
        $condition = array("version_number" => $data["version_number"]);
        $this->db->select("*");
        $this->db->from("app_version");
        $this->db->where($condition);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $flag = "normal";
            $output = array();
            $info = $query->row();
            $version_id = $info->version_id;
            $condition = array("version_id >" => $version_id);
            $this->db->select("*");
            $this->db->from("app_version");
            $this->db->where($condition);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $info = $query->result();
                foreach ($info as $key => $value) {
                    if ($value->version_flag == "critical") {
                        $flag = "critical";
                    }
                    $output["message"] = $value;
                }
                $output["flag"] = $flag;
                return $output;
            }
        } else {
            return FALSE;
        }
    }

    public function is_valid_api_key($key) {
        $this->db->where('api_key', $key);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0)
            return $query->row();
        else
            return FALSE;
    }


    //******Admin functions strats*******
//Signin
    public function does_admin_exist($login) {

        $login_data = array('a.admin_email' => $login['email'],
            'a.admin_password' => $login['password'],
            'a.admin_is_deleted' => '0'
        );
        $this->db->select("a.admin_id, a.admin_name");
        $this->db->from("admin a");
        $this->db->where($login_data);
        $this->db->limit("1");

        $query = $this->db->get();
//                echo $this->db->last_query();exit;
        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row;
        } else {
            return FALSE;
        }
    }

//    Ends Signin
//     Admin log
    public function admin_log($input_array) {
        $query = $this->db->insert('admin_log', $input_array);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

//    Ends Admin log
//    Create new notification
    function create_notification($input_array) {
        $query = $this->db->insert('push_notification', $input_array);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

//    Ends Create new notification
//    Update notification
    function update_notification($input_array) {
        $this->db->where('push_notification_id', $input_array["push_notification_id"]);
        unset($input_array["push_notification_id"]);
        $query = $this->db->update('push_notification', $input_array);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
//    Ends Update notification
//    Get notification list
    function get_notifications($input_array) {
        $this->db->where('push_notification_id', $input_array["push_notification_id"]);
        unset($input_array["push_notification_id"]);
        $query = $this->db->update('push_notification', $input_array);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
//    Ends Get notification list

//    delete notification
    function delete_notification($input_array) {
        $this->db->where('push_notification_id', $input_array["push_notification_id"]);
        unset($input_array["push_notification_id"]);
        $query = $this->db->delete('push_notification', $input_array);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
//    Ends Update notification

//    Fetches all surveys list for home page
    public function getAllSurveys() {
        $html = "";
        $this->db->select("*");
        $this->db->from("survey");
        $query = $this->db->get();

        $html .='<table class="table table-hover table-striped">
				<thead>
					<th>Export</th>
					<th>Status</th>
					<th>Name</th>
					<th>Recent Activity</th>
					<th>Action</th>
				</thead>
				<tbody>';
//        $result = $query->result();
        foreach ($query->result() as $result) {
            $html .='<tr>
                     <td><label class="checkbox ">
                     <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span><input value="' . $result->survey_id . '" data-toggle="checkbox"  type="checkbox" name="id[]" >
                      </label></td>
					  <td><a href="survey_detail.php?survey_id=' . $result->survey_id . '">';
            if ($result->survey_status == 1) {
                $html .= '<div class="onoffswitch">
								   <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch-' . $result->survey_id . '" checked onChange="changeStatus(\'' . $result->survey_id . '\')">
									<label class="onoffswitch-label" for="myonoffswitch-' . $result->survey_id . '">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div><div id="status_id-' . $result->survey_id . '">Active</div>';
            } else {
                $html .= '<div class="onoffswitch">
									<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch-' . $result->survey_id . '" onChange="changeStatus(\'' . $result->survey_id . '\')">
									<label class="onoffswitch-label" for="myonoffswitch-' . $result->survey_id . '">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div><div id="status_id-' . $result->survey_id . '">Inactive</div>';
            }
            $count = 0;
            $condition = array("survey_id" => $result->survey_id);
            $this->db->select("count(question_id) as query_question_count");
            $this->db->from("survey_question");
            $this->db->where($condition);
            $query_qcount = $this->db->get()->row();
            $total_questions = $query_qcount->query_question_count;

            $condition = array("q.survey_id" => $result->survey_id);
            $this->db->select("u.user_id,q.*");
            $this->db->from("survey_user_answer as u");
            $this->db->join("survey_question AS q", "u.question_id=q.question_id", "INNER");
            $this->db->where($condition);
            $this->db->group_by("u.user_id");
            $query_reply = $this->db->get();
//            $query24 = mysql_query("SELECT u.user_id,q.* FROM `survey_user_answer` AS u INNER JOIN survey_question AS q on(u.question_id=q.question_id)  WHERE q.`survey_id`='{$result->survey_id}' group by u.user_id");
//            $total_replies = mysql_num_rows($query24);
            $total_replies = $query_reply->num_rows();

            foreach ($query_reply->result() as $completes) {
                $condition = array("q.survey_id" => $result->survey_id, "u.user_id" => $completes->user_id);
                $this->db->select("u.user_id,q.*");
                $this->db->from("survey_user_answer as u");
                $this->db->join("survey_question AS q", "u.question_id=q.question_id", "INNER");
                $this->db->where($condition);
                $this->db->group_by("u.question_id");
                $query_count = $this->db->get();
                $user_count = $query_count->num_rows();
                //echo $total_replies;
                if ($user_count == $total_questions) {
                    $count++;
                }
            }

            $html .='</a></td>
			<td><a href="survey_detail.php?survey_id=' . $result->survey_id . '">Name: <strong>' . $result->survey_name . '</strong><br>Survey ID: ' . $result->survey_identifier . '<br>Completes: ' . $count;
            $html .='</a>
					  </td>
					  <td>';
            if ($result->survey_date_created == $result->survey_date_edited) {
                //$date = date('m/d/Y',$row['survey_date_edited']);
                $date = new DateTime($result->survey_date_edited);
                // echo $date->format('Y-m-d');
                $html .= '<a href="survey_detail.php?survey_id=' . $result->survey_id . '">Created On: ' . $date->format('m/d/Y') . '</a>';
            } else {
                $date = new DateTime($result->survey_date_edited);
                $html .= '<a href="survey_detail.php?survey_id=' . $result->survey_id . '">Edited On: ' . $date->format('m/d/Y') . '</a>';
            }
            $html .= '</td>
                      <td  style="display:flex;">
                      <a href="delete_survey/' . $result->survey_id . '" onclick="if (!confirm(\'Are you sure want to delete this survey?\')) return false;"><button type="button" rel="tooltip" title="" class="btn  btn-simple btn-xs" data-original-title="Remove" style="font-size:30px;" >
                      <i class="fa pe-7s-trash"></i>
                      </button></a>&nbsp;&nbsp;&nbsp; <a href="edit_survey.php?survey_id=' . $result->survey_id . '" onClick="if(document.getElementById(\'myonoffswitch-' . $result->survey_id . '\').checked){ alert(\'Survey must be IN-Active. \');  return false;}" ><button type="button" rel="tooltip" title="" class="btn  btn-simple btn-xs" data-original-title="Edit Task"  style="font-size:30px;">
                      <i class="fa fa-edit"></i>
                      </button></a></td>
                      </tr>';
        }

        $html .='</tbody>
                 </table>';
        return $html;
    }

    //Ends//
//    Changes status for survey to make active/inactive

    public function changeStatus($id) {
        $query = $this->db->set('survey_status', "IF(survey_status='1','0','1')", false)
                ->where(array('survey_id' => $id))
                ->update('survey');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

//    Deletes survey from database

    public function delete_survey($id) {
        $condition = array("survey_id" => $id);
        $this->db->where($condition);
        $this->db->delete('survey');
        if ($this->db->affected_rows()) {
            $data = array("tab_name" => "Survey", "activity" => "Survey Deleted");
            $query = $this->db->insert('admin_log', $data);
        }

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
