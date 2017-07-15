<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('security');
//        $this->lang->load('en_admin', 'english');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('encrypt');

//        $this->load->database();
        $this->load->model('user_model');
    }

    public function index() {
        //$this->load->view('welcome_message');
        $response = array();
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('user', 'User Name', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[100]|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $response["error"] = "true";
            $response["status_code"] = "406";
            $response["message"] = validation_errors();
            $this->EchoResponse("406", $response);
        } else {
            //checks already exist email
            $this->form_validation->set_rules('email', 'Email', 'is_unique[user.email]');
            if ($this->form_validation->run() == FALSE) {
                $response["error"] = "true";
                $response["status_code"] = "208";
                $response["message"] = "EMAIL ALREADY EXISTS";
                $this->EchoResponse("200", $response);
                return;
            }//End email check
            //checks already exist username
            $this->form_validation->set_rules('user', 'User', 'is_unique[user.user]');
            if ($this->form_validation->run() == FALSE) {
                $response["error"] = "true";
                $response["status_code"] = "208";
                $response["message"] = "USER ALREADY EXISTS";
                $this->EchoResponse("200", $response);
                return;
            }//End email check
            $data = array('first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'user' => $this->input->post('user'),
                'password' => sha1($this->input->post('password')),
                'email' => $this->input->post('email'),
                'phone' => date('phone')
            );
            $user = $this->user_model->register_user($data);
            $jwt = $this->generate_token($user->user_id);
            $user->api_key = $jwt;
            if ($user) {
                $response["error"] = "false";
                $response["status_code"] = "200";
                $result = array();
                $response["message"] = 'Registration Successful';
                $response["data"] = $user;
                $this->EchoResponse("200", $response);
            } else {
                $response["error"] = "true";
                $response["status_code"] = "500";
                $response["message"] = 'Unable to register. Please try again';
                $this->EchoResponse("200", $response);
            } // else
        } // else
    }

// index
    
    public function generate_token($user_id) {
        $this->load->library("JWT");

        $CONSUMER_TTL = 1;
        
        return $this->jwt->encode(array(                    
                    'userId' => $user_id,
                    'issuedAt' => date("Y-d-m H:i:s"),
                    'ttl' => $CONSUMER_TTL
                        ), SECRET_KEY);
    }

    private function EchoResponse($status_code, $response) {
        $this->output->set_status_header($status_code);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
    }


    private function genRandomString() {
        $length = 20;
        $characters = "O123456789ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz~*^";
        $string = '';
        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[rand(0, strlen($characters))];
        }
        return $string;
    }

    private function GenerateApiKey() {
        do {
            $private_key = $this->genRandomString(); // random_string('unique'); 
            $this->db->where('api_key', $private_key);
            $this->db->from('user');
            $num = $this->db->count_all_results();
        } while ($num >= 1);
        return $private_key;
    }

// GenerateApiKey
}
