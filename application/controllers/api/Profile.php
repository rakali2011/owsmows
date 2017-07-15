<?php

use Swagger\Annotations as SWG;

/**
 * @package
 * @category
 * @subpackage
 *
 * @SWG\Resource(
 *  apiVersion="0.2",
 *  swaggerVersion="1.2",
 *  resourcePath="/category",
 *  basePath="http://localhost/owsmows/api/",
 *  produces="['application/json']"
 * )
 */
//http://localhost/owsmows/api/
//http://s5technology.com/demo/owsmows/api/
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Profile extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);
    }

    /**
     *
     * @SWG\Api(
     *   path="profile/info",
     *   description="Profile",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Profile info",
     *       notes="Returns user profile",
     *       nickname="profile",
     *       @SWG\ResponseMessages(
     *          @SWG\ResponseMessage(
     *            code=200,
     *            message="HTTP_OK"
     *          ),
     *          @SWG\ResponseMessage(
     *            code=204,
     *            message="HTTP_NO_CONTENT"
     *          )
     *       )
     *     )
     *   )
     * )
     */
    public function info_get() {

        $this->load->model('profile/profile_model');
        $profile_info = $this->profile_model->get_profile_info($this->user_id);

        if ($profile_info) {
            $response["status"] = TRUE;
            $response["message"] = "Profile Info";
            $response["data"] = $profile_info;
            // Set the response and exit
            $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $response["status"] = TRUE;
            $response["message"] = "Profile Info";
            $response["data"] = array();

            $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
        }
    }

    /**
     *
     * @SWG\Api(
     *   path="category/sub",
     *   description="Sub Categories",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Sub Categories",
     *       notes="Returns a list of sub categories",
     *       nickname="subCategory",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="category_id",
     *           description="Parent/Main Category ID",
     *           paramType="query",
     *           required=true,
     *           type="integer"
     *         )
     *       ), 
     *       @SWG\ResponseMessages(
     *          @SWG\ResponseMessage(
     *            code=200,
     *            message="HTTP_OK"
     *          ),
     *          @SWG\ResponseMessage(
     *            code=204,
     *            message="HTTP_NO_CONTENT"
     *          )
     *       )
     *     )
     *   )
     * )
     */
    public function sub_get() {
        $data = $this->input->get();
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('category_id', 'Main Category Id', 'trim|required|integer');
        if ($this->form_validation->run() == FALSE) {
            $response["status"] = FALSE;
            $response["message"] = validation_errors();
            $response["data"] = array();
            $this->set_response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        } else {
            $this->load->model('category/category_model');
            $param = array(
                'category_id' => $this->input->get('category_id')
            );
            $sub_category_list = $this->category_model->get_sub_category($param);
            if ($sub_category_list) {
                $response["status"] = TRUE;
                $response["message"] = "Sub category list";
                $response["data"] = $sub_category_list;
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $response["status"] = TRUE;
                $response["message"] = "Sub category list";
                $response["data"] = array();

                $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
            }
        }
    }
    /**
     *
     * @SWG\Api(
     *   path="category/navcategories",
     *   description="Nav Categories",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Main Categories",
     *       notes="Returns a list of main categories",
     *       nickname="navcategories",
     *       @SWG\ResponseMessages(
     *          @SWG\ResponseMessage(
     *            code=200,
     *            message="HTTP_OK"
     *          ),
     *          @SWG\ResponseMessage(
     *            code=204,
     *            message="HTTP_NO_CONTENT"
     *          )
     *       )
     *     )
     *   )
     * )
     */
        function navcategories_get() {
        $categories = array();
        $output = array();
        $output1 = array();
//        fetches category information
        $this->load->model('category/category_model');
        $main_categories = $this->category_model->get_main_category();
        foreach ($main_categories as $main_category) {
            $param = array("category_id" => $main_category->category_id);
            $sub_categories = $this->category_model->get_sub_category($param);
            $categories[$main_category->category_name] = $sub_categories;
            $output["main"] = $main_category->category_name;
            $output["main_category_id"] = $main_category->category_id;
            $output["sub"] = $sub_categories;
            $output1[] = $output;
            
        }
        if ($categories) {
                $response["status"] = TRUE;
                $response["message"] = "Navigation category list";
                $response["data"] = $output1;
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $response["status"] = TRUE;
                $response["message"] = "Navigation category list";
                $response["data"] = array();
                $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
            }
    }

}
