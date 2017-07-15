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
 *  resourcePath="/order",
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

class Order extends REST_Controller {

    function __construct() {
        
        // Construct the parent class
        parent::__construct();
        $this->load->library('form_validation');
    }

    /**
     *
     * @SWG\Api(
     *   path="order/place",
     *   description="Place new order",
     *   @SWG\Operations(
     *     @SWG\Operation(
     *       method="POST",
     *       summary="Saves new order",
     *       notes="Saves customer information and order details",
     *       nickname="placeOrder",
     *       consumes="['text/plain','application/json']",
     *       @SWG\Parameters(
     *         @SWG\Parameter(
     *           name="body",
     *           description="order information",
     *           paramType="body",
     *           required=true,
     *           type="order"
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
    public function place_post() {
        $order = $this->post();
        $order = json_decode($order[0]);
        $order_detail = $order->order_detail;

        $response = array("status" => NULL, "message" => NULL, "data" => NULL);

        $input_data["name"] = isset($order->name)?$order->name:"";
        $input_data["email"] = isset($order->email)?$order->email:"";
        $input_data["phone"] = isset($order->phone)?$order->phone:"";
        $input_data["city"] = isset($order->city)?$order->city:"";
        $input_data["address"] = isset($order->address)?$order->address:"";
        $input_data["device_lat"] = isset($order->device_lat)?$order->device_lat:"";
        $input_data["device_long"] = isset($order->device_long)?$order->device_long:"";
        $input_data["user_timezone"] = isset($order->user_timezone)?$order->user_timezone:"";
        $input_data["device_token"] = isset($order->device_token)?$order->device_token:"";
        $input_data["payment_method_id"] = isset($order->payment_method_id)?$order->payment_method_id:"";
        $input_data["comments"] = isset($order->comments)?$order->comments:"";
        $input_data["delivery_cost_amount"] = isset($order->delivery_cost_amount)?$order->delivery_cost_amount:"";
        $input_data["product_id"] = isset($order_detail[0]->product_id)?$order_detail[0]->product_id:"";
        $input_data["product_quantity"] = isset($order_detail[0]->product_quantity)?$order_detail[0]->product_quantity:"";
        $input_data["discount_percent"] = isset($order_detail[0]->discount_percent)?$order_detail[0]->discount_percent:"";
        $input_data["color_id"] = isset($order_detail[0]->color_id)?$order_detail[0]->color_id:"";
        $input_data["size_id"] = isset($order_detail[0]->size_id)?$order_detail[0]->size_id:"";
        
        $this->form_validation->set_data($input_data);

        $this->form_validation->set_rules('name', 'Your Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|max_length[100]|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('device_lat', 'Device Latitude', 'trim|required');
        $this->form_validation->set_rules('device_long', 'Device Longitude', 'trim|required');
        $this->form_validation->set_rules('user_timezone', 'User Timezone', 'trim|required');
        $this->form_validation->set_rules('device_token', 'Device Token', 'trim|required');
        $this->form_validation->set_rules('payment_method_id', 'Selected Payment Id', 'trim|required|integer');
        $this->form_validation->set_rules('comments', 'Comments', 'trim');
        $this->form_validation->set_rules('delivery_cost_amount', 'Delivery Cost Amount', 'trim|required|integer');
        $this->form_validation->set_rules('product_id', 'Product Id', 'trim|required|integer');
        $this->form_validation->set_rules('product_quantity', 'product Quantity', 'trim|required|integer');
        $this->form_validation->set_rules('discount_percent', 'Discount Percent', 'trim|required|integer');
        $this->form_validation->set_rules('color_id', 'Color Id', 'trim|required|integer');
        $this->form_validation->set_rules('size_id', 'Size Id', 'trim|required|integer');

        if ($this->form_validation->run() == FALSE) {
            $response["status"] = FALSE;
            $response["message"] = validation_errors();
            $response["data"] = array();
            $this->set_response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        } else {

            $this->load->model('order/order_model');
            $customer = array(
                'name' => $input_data["name"],
                'email' => $input_data["email"],
                'phone' => $input_data["phone"],
                'city' => $input_data["city"],
                'address' => $input_data["address"],
                'device_lat' => $input_data["device_lat"],
                'device_long' => $input_data["device_long"],
                'user_timezone' => $input_data["user_timezone"],
                'created_date' => date("Y-m-d H:i:s"),
                'updated_date' => date("Y-m-d H:i:s"),
                'device_token' => $input_data["device_token"]);
            $order = array(
                'payment_method_id' => $input_data["payment_method_id"],
                'created_date' => date("Y-m-d H:i:s"),
                'updated_date' => date("Y-m-d H:i:s"),
                'comments' => $input_data["comments"],
                'delivery_cost_amount' => $input_data["delivery_cost_amount"]);

            $param = array(
                "device" => $customer,
                "order" => $order,
                "order_detail" => $order_detail
            );
            $verified = $this->verify_order_detail($order_detail);
            if ($verified) {
                $save_order = $this->order_model->save_order($param);
                if ($save_order) {
                    $response["status"] = TRUE;
                    $response["message"] = "Your order saved";
                    $response["data"] = array();
                    // Set the response and exit
                    $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                } else {
                    $response["status"] = FALSE;
                    $response["message"] = "Could not save your order";
                    $response["data"] = array();
                    $this->response($response, REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // Internal Server Error (500) being the HTTP response code
                }
            }
        }
    }

    protected function verify_order_detail($order_detail) {
        $response = array("status" => NULL, "message" => NULL, "data" => NULL);
        $this->load->model('verify/verify_model');
        foreach ($order_detail as $detail) {
            $variation_flag = FALSE;
            $product_detail = $this->verify_model->get_product_detail($detail);

            if ($product_detail) {
//                color/size verification
                if (isset($product_detail["product_variation"])) {
                    foreach ($product_detail["product_variation"] as $variation) {
                        if ($variation->color_id == $detail->color_id && $variation->size_id == $detail->size_id && $variation->product_quantity >= $detail->product_quantity) {
                            $variation_flag = TRUE;
                            break;
                        }
                    }
                }
//                product discount verification
                if (isset($product_detail["product_discount"][0])) {
                    if ($product_detail["product_discount"][0]->discount_percent != $detail->discount_percent) {
                        $response["status"] = FALSE;
                        $response["message"] = "Sorry! invalid value for discount percentage";
                        $response["data"] = array();
                        // Set the response and exit
                        $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                        return 0;
                    }
                } elseif ($detail->discount_percent > 0) {
                    $response["status"] = FALSE;
                    $response["message"] = "Sorry! invalid value for discount percentage";
                    $response["data"] = array();
                    // Set the response and exit
                    $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code                    
                    return 0;
                }
            } else {
                $response["status"] = FALSE;
                $response["message"] = "Sorry! this item is no longer available";
                $response["data"] = array("test");
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                return 0;
            }
            if (!$variation_flag) {
                $response["status"] = FALSE;
                $response["message"] = "Sorry! this item is no longer available in this color & size";
                $response["data"] = array();
                // Set the response and exit
                $this->response($response, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
                return 0;
            }
        }
        return 1;
    }

}
