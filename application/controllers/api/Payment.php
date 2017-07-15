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
 *  resourcePath="/payment",
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

class Payment extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);
    }

    /**
     *
     * @SWG\Api(
     *   path="payment/method",
     *   description="Payment Methods",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Payment Method List",
     *       notes="Returns a list of available payment methods/options",
     *       nickname="paymentMethod",
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
    public function method_get() {

            $this->load->model('payment/payment_model');

            $payment_method_list = $this->payment_model->get_payment_method_list();
            if ($payment_method_list) {
                $response["status"] = TRUE;
                $response["message"] = "Payment method list";
                $response["data"] = $payment_method_list;
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $response["status"] = TRUE;
                $response["message"] = "Payment method list";
                $response["data"] = array();

                $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
            }
    }

}
