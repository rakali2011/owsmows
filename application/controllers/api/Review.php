<?php

use Swagger\Annotations as SWG;

/**
 * @package
 * @product
 * @subpackage
 *
 * @SWG\Resource(
 *  apiVersion="0.2",
 *  swaggerVersion="1.2",
 *  resourcePath="/review",
 *  basePath="http://s5technology.com/demo/apparel/api/",
 *  produces="['application/json']"
 * )
 */
//http://localhost/apparel/api/
//http://s5technology.com/demo/apparel/api/
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Review extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);
    }

    /**
     *
     * @SWG\Api(
     *   path="review/detail",
     *   description="Reviews",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Review Detail",
     *       notes="Returns product reviews",
     *       nickname="productReview",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="page",
     *           description="Page number",
     *           paramType="query",
     *           required=true,
     *           type="integer"
     *         ),
     *         @SWG\Parameter(
     *           name="product_id",
     *           description="Product Id ",
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
    public function detail_get() {
        $data = $this->input->get();
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('page', 'Page Number', 'trim|required|integer');
        $this->form_validation->set_rules('product_id', 'Product Id', 'trim|required|integer');
        if ($this->form_validation->run() == FALSE) {
            $response["status"] = FALSE;
            $response["message"] = validation_errors();
            $response["data"] = array();
            $this->set_response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        } else {

            $this->load->model('review/review_model');
            $param = array(
                'page' => $this->input->get('page'),
                'product_id' => $this->input->get('product_id')
            );

            $review_list = $this->review_model->get_review_detail($param);
            if ($review_list) {
                $response["status"] = TRUE;
                $response["message"] = "Review detail";
                $response["data"] = $review_list;
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {                
                $response["status"] = TRUE;
                $response["message"] = "Review detail";
                $response["data"] = array();

                $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
            }
        }
    }
    /**
     *
     * @SWG\Api(
     *   path="review/save",
     *   description="Write new review",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="Saves new review",
     *       notes="Saves customer's review for an item",
     *       nickname="reviewProduct",
     *       consumes="['text/plain','application/json']",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="body",
     *           description="review information",
     *           paramType="body",
     *           required=true,
     *           type="review"
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
    public function save_post() {
        $review = $this->post();
        $review = json_decode($review[0]);
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);

        $input_data["product_id"] = isset($review->product_id)?$review->product_id:"";
        $input_data["product_review"] = isset($review->product_review)?$review->product_review:"";
        $input_data["product_rank"] = isset($review->product_rank)?$review->product_rank:"";
        $input_data["device_id"] = isset($review->device_id)?$review->device_id:"";
        $input_data["review_date"] = date("Y-m-d H:i:s");
        
        $this->form_validation->set_data($input_data);

        $this->form_validation->set_rules('product_id', 'Product Id', 'trim|required|integer');
        $this->form_validation->set_rules('product_review', 'Product Review', 'trim');
        $this->form_validation->set_rules('product_rank', 'Product Rank', 'trim|required');
        $this->form_validation->set_rules('device_id', 'Device Id', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $response["status"] = FALSE;
            $response["message"] = validation_errors();
            $response["data"] = array();
            $this->set_response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        } else {

            $this->load->model('review/review_model');
            $review = array(
                'product_id' => $input_data["product_id"],
                'product_review' => $input_data["product_review"],
                'product_rank' => $input_data["product_rank"],
                'device_id' => $input_data["device_id"],
                'review_date' => $input_data["review_date"]);

            $verified = $this->verify_review_permission($review);
            if ($verified) {
                $save_review = $this->review_model->save_review($review);
                if ($save_review) {
                    $response["status"] = TRUE;
                    $response["message"] = "Review saved";
                    $response["data"] = array();
                    // Set the response and exit
                    $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                } else {
                    $response["status"] = FALSE;
                    $response["message"] = "Could not save review";
                    $response["data"] = array();
                    $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // Internal Server Error (500) being the HTTP response code
                }
            }
        }
    }
    // Verfies customer's elligibility to write review
    protected function verify_review_permission($review) {
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);
        $this->load->model('verify/verify_model');
        $review_permission = $this->verify_model->verify_review_permission($review);
        if($review_permission){
            return 1;
        }else{
            $response["status"] = FALSE;
            $response["message"] = "Sorry! You can write reviews for purchased products only";
            $response["data"] = array();
            // Set the response and exit
            $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            return 0;
        }
    }


}
