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
 *  resourcePath="/delivery",
 *  basePath="http://s5technology.com/demo/apparel/api/",
 *  produces="['text/html']"
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

class Delivery extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);
    }

    /**
     *
     * @SWG\Api(
     *   path="delivery/cost",
     *   description="Delivery Cost Policy",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Delivery Cost List",
     *       notes="Returns a list of delivery rates on the basis of distance in KMs",
     *       nickname="deliveryCost",
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
    public function cost_get() {

            $this->load->model('delivery/delivery_model');

            $delivery_cost_list = $this->delivery_model->get_delivery_cost_list();
            if ($delivery_cost_list) {
                $response["status"] = TRUE;
                $response["message"] = "Delivery cost list";
                $response["data"] = $delivery_cost_list;
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $response["status"] = TRUE;
                $response["message"] = "Delivery cost list";
                $response["data"] = array();

                $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
            }
    }


}
