<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('encrypt');
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index() {
        $response = array();
        $this->form_validation->set_rules('user', 'User', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $response["error"] = "true";
            $response["status_code"] = "406";
            $response["message"] = validation_errors();
            $this->EchoResponse("406", $response);
        } else {
            $data = array('user' => $this->input->post('user'),
                'password' => sha1($this->input->post('password'))
            );
            $user = $this->user_model->does_user_exist($data);
            if ($user) {
                
                $jwt = $this->generate_token($user->user_id);
                $user->api_key = $jwt;
                $response["error"] = "false";
                $response["status_code"] = "200";
                $response["message"] = "You are successfully logged in";

                $response["data"] = $user;
                $this->EchoResponse("200", $response);
            } else {
                $response["error"] = "true";
                $response["status_code"] = "203";
                $response["message"] = "INVALID CREDENTIALS";
                $this->EchoResponse("203", $response);
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

    private function EchoResponse($status_code, $response,$key ="") {
        $this->output->set_status_header($status_code);
//        $this->output->set_header('api_key: '.$key);
        $this->output->set_content_type('application/json')
                ->set_output(json_encode($response));
    }

// EchoResponse
}
