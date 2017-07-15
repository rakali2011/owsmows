<?php // echo print_r($product_images);?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- row -->
        <div class="row right-sidebar">
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-6">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                        <?php foreach($product_images as $product_image){
                                            if($product_image->is_featured == 1){?>
                                        <img id="product-zoom" src="<?php echo $product_image->product_image; ?>" data-zoom-image="<?php echo $product_image->product_zoom_image; ?>"/>
                                        <input type="hidden" id="featured_image" value="<?php echo $product_image->product_gallery_image; ?>"
                                        <?php }}?>
                                        
                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="true">
                                            <?php foreach($product_images as $product_image){?>
                                            <li>
                                                <a href="#" data-image="<?php echo $product_image->product_image; ?>" data-zoom-image="<?php echo $product_image->product_zoom_image; ?>">
                                                    <img id="product-zoom"  src="<?php echo $product_image->product_gallery_image; ?>" /> 
                                                </a>
                                            </li>
                                            <?php }?>                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- product-imge-->
                            </div>
                        </div>
                            <div class="pb-right-column col-xs-12 col-sm-6">
                                <h1 class="product-name"><?php echo $product_info[0]->product_title; ?></h1>
                                <div class="product-comments">
                                    <div class="product-star">
                                            <?php $rating = explode(".", $product_info[0]->rating); ?>
                                            <?php if(isset($rating[1])){?>
                                            <?php for ($i = 1; $i <= $rating[0]; $i++) { ?>
                                                <i class="fa fa-star"></i>
                                            <?php } ?>
                                            <?php if ($rating[1] > 0) { ?>
                                                <i class="fa fa-star-half-o"></i>
                                            <?php } ?>
                                            <?php for ($j = 5; $j > $i; $j--) { ?>
                                                <i class="fa fa-star-o"></i>
                                            <?php
                                            } 

                                            }else{                                                                
                                            ?>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            <?php }?>
                                        </div>
                                    <div class="comments-advices">
                                        <a href="#">Based  on <?php echo $product_info[0]->total_rating; ?> ratings</a>
                                        <a href="#"><i class="fa fa-pencil"></i> write a review</a>
                                    </div>
                                </div>
                                <div class="product-price-group">
                                    <span class="price">PKR <?php echo $product_info[0]->sale_price; ?></span>
                                    <!--<span class="old-price">PKR 52.00</span>-->
                                    <?php if(!empty($product_discount[0]->discount_percent)){?>
                                    <span class="discount">-<?php echo $product_discount[0]->discount_percent; ?>%</span>
                                    <?php }?>
                                </div>
                                <div class="info-orther">
                                    <p>Item Code: <?php echo $product_info[0]->product_code; ?></p>
                                    <input type="hidden" value="<?php echo $product_info[0]->product_code; ?>" id="product_code"/>
                                    <p>Availability: <span class="in-stock"><?php echo $product_info[0]->product_quantity; ?> (In stock)</span></p>
                                    <p>Payment: Cash on delivery</p>
                                    <p>Delivery Cost: <span class="price">FREE</span></p>
                                </div>
                                <div class="product-desc">
                                    <?php echo $product_info[0]->product_description; ?>
                                </div>
                                <div class="form-option">
<!--                                    <p class="form-option-title">Available Options:</p>
                                    <div class="attributes">
                                        <div class="attribute-label">Color:</div>
                                        <div class="attribute-list">
                                            <ul class="list-color">
                                                <?php foreach($product_colors as $color){  ?>
                                                <li class="available_colors" color_id="<?php echo $color->color_id; ?>" color_name="<?php echo $color->color_name; ?>" style="background:<?php echo $color->color_code; ?>;"><a href="javascript:void(0);"><?php echo $color->color_name; ?></a></li>
                                                <?php }?>
                                                <input type="hidden" value="" id="selected_color"/>
                                                <input type="hidden" value="" id="selected_color_name"/>
                                                <input type="hidden" value="<?php echo $product_info[0]->product_code; ?>" id="product_code"/>
                                            </ul>
                                        </div>
                                    </div>-->
                                    <div class="attributes">
                                        <div class="attribute-label">Qty:</div>
                                        <div class="attribute-list product-qty">
                                            <div class="qty">
                                                <input class="<?php echo $product_info[0]->product_id; ?>" id="option-product-qty" type="text" value="1" name="quantity">
                                            </div>
                                            <div class="btn-plus">
                                                <a href="#" class="btn-plus-up">
                                                    <i class="fa fa-caret-up"></i>
                                                </a>
                                                <a href="#" class="btn-plus-down">
                                                    <i class="fa fa-caret-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div class="attributes">
                                        <div class="attribute-label">Size:</div>
                                        <div class="attribute-list">
                                            <select id="product_size">
                                                <?php foreach($product_sizes as $size){?>
                                                <option value="<?php echo $size->size_id; ?>"><?php echo $size->size_code; ?></option>
                                                <?php }?>
                                            </select>
                                            <a id="size_chart" class="fancybox" href="<?php echo base_url()?>assets/data/size-chart.jpg">Size Chart</a>
                                        </div>
                                        
                                    </div>-->
                                </div>
                                <div class="form-action">
                                    <div class="button-group">
                                        <a  class="btn-add-cart" href="javascript:void(0);" data-productname="<?php echo $product_info[0]->product_title; ?>" data-price="<?php echo $product_info[0]->sale_price; ?>" data-productid="<?php echo $product_info[0]->product_id; ?>" data-uri="<?php echo $product_info[0]->uri; ?>">Add to cart</a>
                                        <!--<a  class="get_location " href="javascript:void(0);" data-productname="<?php echo $product_info[0]->product_title; ?>" data-price="<?php echo $product_info[0]->sale_price; ?>" data-productid="<?php echo $product_info[0]->product_id; ?>" data-uri="<?php echo $product_info[0]->uri; ?>">get location</a>-->
                                        <input type="hidden" value="<?php echo base_url(); ?>" id="base_url"/>
                                    </div>
<!--                                    <div class="button-group">
                                        <a class="wishlist" href="#"><i class="fa fa-heart-o"></i> Add To Favourites</a>
                                    </div>-->
                                </div>
                                <!-- <div class="form-share">
                                    <div class="sendtofriend-print">
                                        <a href="javascript:print();"><i class="fa fa-print"></i> Print</a>
                                        <a href="#"><i class="fa fa-envelope-o fa-fw"></i>Send to a friend</a>
                                    </div>
                                    <div class="network-share">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- tab product -->
                        <div class="product-tab">
                            <ul class="nav-tab">
                                <li class="active">
                                    <a aria-expanded="false" data-toggle="tab" href="#product-detail">Details</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews">reviews</a>
                                </li>
<!--                                <li>
                                    <a data-toggle="tab" href="#return-tabs">Return Policy</a>
                                </li>-->
                                
                            </ul>
                            <div class="tab-container">
                                <div id="product-detail" class="tab-panel active">
                                    <?php echo $product_info[0]->product_detail; ?>
                                </div>
                                <div id="reviews" class="tab-panel">
                                    <div class="product-comments-block-tab">
                                        <?php foreach($product_reviews as $review){?>
                                        <div class="comment row">
                                            <div class="col-sm-3 author">
                                                <div class="grade">
                                                    <span>Grade</span>
                                                    <span class="reviewRating">
                                                        <?php $rating = explode(".", $review->product_rank); ?>
                                                        <?php if(isset($rating[1])){?>
                                                        <?php for ($i = 1; $i <= $rating[0]; $i++) { ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                        <?php if ($rating[1] > 0) { ?>
                                                            <i class="fa fa-star-half-o"></i>
                                                        <?php } ?>
                                                        <?php for ($j = 5; $j > $i; $j--) { ?>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php
                                                        } 

                                                        }else{                                                                
                                                        ?>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        <?php }?>
<!--                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>-->
                                                    </span>
                                                </div>
                                                <div class="info-author">
                                                    <span><strong><?php echo $review->review_by; ?></strong></span>
                                                    <em><?php echo date("d-m-y",strtotime($review->review_date)); ?></em>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 commnet-dettail">
                                                <?php echo $review->product_review; ?>
                                            </div>
                                        </div>
                                        <?php }?>
                                        
                                        
                                        <p>
                                            <a class="btn-comment" href="#">Write your review !</a>
                                        </p>
                                    </div>
                                    
                                </div>
                                <div id="return-tabs" class="tab-panel">
                                    <?php echo $return_policy; ?>
                                    </div>
                                
                            </div>
                        </div>
                        <!-- ./tab product -->
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading">Related Products</h3>
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php foreach($related_products as $related_product){?>
                                <li>
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="<?php echo site_url("detail/$related_product->uri");?>">
                                                <img class="img-responsive" alt="product" src="<?php echo $related_product->product_image; ?>" />
                                            </a>
<!--                                            <div class="quick-view">
                                                    <a title="Add to my favourites" class="heart" href="#"></a>
                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                    <a title="Quick view" class="search" href="#"></a>
                                            </div>-->
                                            <div class="add-to-cart">
                                                <a title="View" href="<?php echo site_url("detail/$related_product->uri");?>">View Detail</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="<?php echo site_url("detail/$related_product->uri");?>"><?php echo $related_product->product_title; ?></a></h5>
                                            <div class="product-star">
                                                    <?php $rating = explode(".", $related_product->rating); ?>
                                                    <?php if (isset($rating[1])) { ?>
                                                        <?php for ($i = 1; $i <= $rating[0]; $i++) { ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                        <?php if ($rating[1] > 0) { ?>
                                                            <i class="fa fa-star-half-o"></i>
                                                        <?php } ?>
                                                        <?php for ($j = 5; $j > $i; $j--) { ?>
                                                            <i class="fa fa-star-o"></i>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    <?php } ?>
                                                </div>
                                            
                                            <div class="content_price">
                                                <span class="price product-price">PKR <?php echo $related_product->sale_price; ?></span>
                                                <!--<span class="price old-price">PKR 52,00</span>-->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php }?>
                                
                            </ul>
                        </div>
                        <!-- ./box product -->
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
<!--                <div class="box-authentication">
                        <h3>Already registered?</h3>
                        <label for="emmail_login">Email address</label>
                        <input id="emmail_login" type="text" class="form-control">
                        <label for="password_login">Password</label>
                        <input id="password_login" type="password" class="form-control">
                        <p class="forgot-pass"><a href="#">Forgot your password?</a></p>
                        <button class="button"><i class="fa fa-lock"></i> Sign in</button>
                    </div>-->
                <!-- block best sellers -->
                <div class="block left-module">
                    <p class="title_block">ON SALE</p>
                    <div class="block_content">
                        <ul class="products-block best-sell">
                            <?php foreach($sale_products as $sale_product){?>
                            <li>
                                    <div class="products-block-left">
                                        <a href="<?php echo site_url("detail/$sale_product->uri");?>">
                                            <img src="<?php echo $sale_product->product_image; ?>" alt="SPECIAL PRODUCTS">
                                        </a>
                                    </div>
                                    <div class="products-block-right">
                                        <p class="product-name">
                                            <a href="<?php echo site_url("detail/$sale_product->uri");?>"><?php echo $sale_product->product_title; ?></a>
                                        </p>
                                        <p class="product-price">PKR <?php echo $sale_product->sale_price; ?></p>
                                        <div class="product-star">
                                            <?php $rating = explode(".", $sale_product->rating); ?>
                                            <?php if(isset($rating[1])){?>
                                            <?php for ($i = 1; $i <= $rating[0]; $i++) { ?>
                                                <i class="fa fa-star"></i>
                                            <?php } ?>
                                            <?php if ($rating[1] > 0) { ?>
                                                <i class="fa fa-star-half-o"></i>
                                            <?php } ?>
                                            <?php for ($j = 5; $j > $i; $j--) { ?>
                                                <i class="fa fa-star-o"></i>
                                            <?php
                                            } 

                                            }else{                                                                
                                            ?>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            <?php }?>
                                        </div>
                                    </div>
                                </li>
                            <?php }?>
                            </ul>
                    </div>
                </div>
                <div class="block left-module">
                    <p class="title_block">NEW PRODUCTS</p>
                    <div class="block_content">
                        <ul class="products-block best-sell">
                            <?php foreach($new_products as $new_product){?>
                            <li>
                                    <div class="products-block-left">
                                        <a href="<?php echo site_url("detail/$new_product->uri");?>">
                                            <img src="<?php echo $new_product->product_image; ?>" alt="SPECIAL PRODUCTS">
                                        </a>
                                    </div>
                                    <div class="products-block-right">
                                        <p class="product-name">
                                            <a href="<?php echo site_url("detail/$new_product->uri");?>"><?php echo $new_product->product_title; ?></a>
                                        </p>
                                        <p class="product-price">PKR <?php echo $new_product->sale_price; ?></p>
                                        <div class="product-star">
                                            <?php $rating = explode(".", $new_product->rating); ?>
                                            <?php if(isset($rating[1])){?>
                                            <?php for ($i = 1; $i <= $rating[0]; $i++) { ?>
                                                <i class="fa fa-star"></i>
                                            <?php } ?>
                                            <?php if ($rating[1] > 0) { ?>
                                                <i class="fa fa-star-half-o"></i>
                                            <?php } ?>
                                            <?php for ($j = 5; $j > $i; $j--) { ?>
                                                <i class="fa fa-star-o"></i>
                                            <?php
                                            } 

                                            }else{                                                                
                                            ?>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            <?php }?>
                                        </div>
                                    </div>
                                </li>
                            <?php }?>
                            </ul>
                    </div>
                </div>
                <!-- ./block best sellers  -->
                <!-- block category -->
            </div>
            <!-- ./left colunm -->
            
            
        </div>
        <!-- ./row-->
    </div>
</div>

