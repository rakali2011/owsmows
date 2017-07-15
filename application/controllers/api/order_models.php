<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* @SWG\Model(id="orderDetail", required="product_id, product_quantity, discount_percent, color_id, size_id",
*     @SWG\Property(name="product_id",type="integer"),
*     @SWG\Property(name="product_quantity",type="integer"),
*     @SWG\Property(name="discount_percent",type="integer"),
*     @SWG\Property(name="color_id",type="integer"),
*     @SWG\Property(name="size_id",type="integer"),
* )
*/

    
/**
* @SWG\Items(partial="order_detail", type="orderDetail")
*/

/**
* @SWG\Model(id="order", required="name, phone, city, address, device_lat, device_long, user_timezone, device_token, payment_method_id, delivery_cost_amount, order_detail",
*     @SWG\Property(name="name",type="string"),
*     @SWG\Property(name="email",type="string"),
*     @SWG\Property(name="phone",type="string"),
*     @SWG\Property(name="city",type="string"),
*     @SWG\Property(name="address",type="string"),
*     @SWG\Property(name="device_lat",type="string"),
*     @SWG\Property(name="device_long",type="string"),
*     @SWG\Property(name="user_timezone",type="string"),
*     @SWG\Property(name="device_token",type="string"),
*     @SWG\Property(name="payment_method_id",type="integer"),
*     @SWG\Property(name="comments",type="string"),
*     @SWG\Property(name="delivery_cost_amount",type="integer"),
*     @SWG\Property(name="order_detail", type="array", @SWG\Partial("order_detail"))
* )
*/

/**
* @SWG\Model(id="review", required="product_id, product_rank, device_id",
*     @SWG\Property(name="product_id",type="integer"),
*     @SWG\Property(name="product_review",type="string"),
*     @SWG\Property(name="product_rank",type="integer"),
*     @SWG\Property(name="device_id",type="string")
* )
*/
