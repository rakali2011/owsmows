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
 *  resourcePath="/product",
 *  basePath="http://localhost/apparel/api/",
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

class Product extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);
    }

    /**
     *
     * @SWG\Api(
     *   path="product/list",
     *   description="Products",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Product List",
     *       notes="Returns a list of products",
     *       nickname="product",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="page",
     *           description="Page number",
     *           paramType="query",
     *           required=true,
     *           type="integer"
     *         ),
     *         @SWG\Parameter(
     *           name="category_id",
     *           description="Main/Sub Category Id ",
     *           paramType="query",
     *           required=false,
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
    public function list_get() {
        $data = $this->input->get();
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('page', 'Page Number', 'trim|required|integer');
        if ($this->form_validation->run() == FALSE) {
            $response["status"] = FALSE;
            $response["message"] = validation_errors();
            $response["data"] = array();
            $this->set_response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        } else {

            $this->load->model('product/product_model');
            $category_id = isset($data["category_id"]) ? $data["category_id"] : "";
            $param = array(
                'page' => $this->input->get('page'),
                'category_id' => $category_id
            );

            $product_list = $this->product_model->get_product_list($param);
            $param["category_id"] = "";
            if($param['page'] == 1){
                $product_sale = $this->product_model->get_sale_product($param);
            }else{
                $product_sale = array();
            }
            
            if ($product_list) {
                $response["status"] = TRUE;
                $response["message"] = "Product list";
                $response["data"] = $product_list;
                $response["sale"] = $product_sale;
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $response["status"] = TRUE;
                $response["message"] = "Product list";
                $response["data"] = array();

                $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
            }
        }
    }

    /**
     *
     * @SWG\Api(
     *   path="product/detail",
     *   description="Products",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="GET",
     *       summary="Product Detail",
     *       notes="Returns product full detail",
     *       nickname="productDetail",
     *       @SWG\Parameters(
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
        $this->form_validation->set_rules('product_id', 'Product Id', 'trim|required|integer');
        if ($this->form_validation->run() == FALSE) {
            $response["status"] = FALSE;
            $response["message"] = validation_errors();
            $response["data"] = array();
            $this->set_response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        } else {

            $this->load->model('product/product_model');
            $param = array(
                'product_id' => $this->input->get('product_id')
            );

            $product_list = $this->product_model->get_product_detail($param);
            $output = $product_list["product_info"][0];
            $output->product_colors = $product_list["product_colors"];
            $output->product_sizes = $product_list["product_sizes"];
            $output->product_images = $product_list["product_images"];
            $output->product_discount = $product_list["product_discount"];
            $output->product_reviews = $product_list["product_reviews"];
            
            if ($product_list) {
                $response["status"] = TRUE;
                $response["message"] = "Product detail";
                $response["product"] = $output;
//                $response["data"] = $product_list;
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $response["status"] = TRUE;
                $response["message"] = "Product detail";
                $response["data"] = array();

                $this->response($response, REST_Controller::HTTP_NO_CONTENT); // NOT_FOUND (204) being the HTTP response code
            }
        }
    }

}
