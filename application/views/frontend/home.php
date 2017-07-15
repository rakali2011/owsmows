
<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 header-top-right">
                <div class="homeslider">
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                            <?php foreach ($slider_images as $slider_image) { ?>
                                <li><img alt="Fanzy" src="<?php echo base_url()?>assets/images/slider/<?php echo $slider_image->image ?>" title="Fanzy" /></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="header-banner banner-opacity">
                    <a href="#"><img alt="Fanzy" src="<?php echo base_url()?>assets/data/ads1.jpg" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<!-- servives -->
<div class="container">
    <div class="service ">
        <div class="col-xs-6 col-sm-4 service-item">
            <div class="icon">
                <img alt="services" src="<?php echo base_url()?>assets/data/s1.png" />
            </div>
            <div class="info">
                <a href="javascript:void(0);"><h3>Free Home Delivery</h3></a>
                <span>No hidden charges</span>
            </div>
        </div>
<!--        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="<?php echo base_url()?>assets/data/s2.png" />
            </div>
            <div class="info">
                <a href="about.html"><h3>7-day return</h3></a>
                <span>Moneyback guarantee</span>
            </div>
        </div>-->
        <div class="col-xs-6 col-sm-4 service-item">
            <div class="icon">
                <img alt="services" src="<?php echo base_url()?>assets/data/s3.png" />
            </div>

            <div class="info" >
                <a href="javascript:void(0);"><h3>24/7 support</h3></a>
                <span>Online consultations</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 service-item">
            <div class="icon">
                <img alt="services" src="<?php echo base_url()?>assets/data/s4.png" />
            </div>
            <div class="info">
                <a href="javascript:void(0);"><h3>SAFE SHOPPING</h3></a>
                <span>Safe Shopping Guarantee</span>
            </div>
        </div>
    </div>
</div>
<!-- end services -->

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 page-top-left">
                <div class="popular-tabs">
                    <ul class="nav-tab">
                        <li class="active"><a data-toggle="tab" href="#tab-1">New Products</a></li>
                        <li><a data-toggle="tab" href="#tab-2">ON Sale</a></li>
                    </ul>
                    <div class="tab-container">
                        
                        <div id="tab-1" class="tab-panel active">
                            <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "30"  data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php foreach($new_products as $new_product){?>
                                <li>
                                    <div class="left-block">
                                        <a href="<?php echo site_url("detail/$new_product->uri");?>" >
                                            <img class="img-responsive" alt="product" src="<?php echo $new_product->product_image; ?>" /></a>
<!--                                        <div class="quick-view">
                                            <a title="Add to my favourites" class="heart" href="#"></a>  
                                        </div>-->
                                        <div class="add-to-cart">
                                            <a title="View" href="<?php echo site_url("detail/$new_product->uri");?>">View Detail</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="<?php echo site_url("detail/$new_product->uri");?>"><?php echo $new_product->product_title; ?></a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">PKR <?php echo $new_product->sale_price; ?></span>
                                            <!--<span class="price old-price">PKR 52,00</span>-->
                                        </div>
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
                        <div id="tab-2" class="tab-panel">
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                <?php if(count($sale_products)==0){?>
                                <li></li>
                                <li></li>
                                <?php }?>
                                <?php foreach($sale_products as $sale_product){?>
                                <li>
                                    <div class="left-block">
                                        <a href="<?php echo site_url("detail/$sale_product->uri"); ?>">
                                            <img class="img-responsive" alt="product" src="<?php echo $sale_product->product_image;?>" />
                                        </a>
<!--                                        <div class="quick-view">
                                            <a title="Add to my favourites" class="heart" href="#"></a>  
                                        </div>-->
                                        <div class="add-to-cart">
                                            <a title="View" href="<?php echo site_url("detail/$sale_product->uri"); ?>">View Detail</a>
                                        </div>
                                        <div class="group-price">
                                            <span class="product-new">NEW</span>
                                            <span class="product-sale">Sale</span>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="<?php echo site_url("detail/$sale_product->uri");?>"><?php echo $sale_product->product_title;?></a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">PKR <?php echo $sale_product->sale_price;?></span>
                                            <!--<span class="price old-price">PKR 52,00</span>-->
                                        </div>
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
                                <li></li>
                                <?php }?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---->
<div class="content-page">
    <div class="container">
        <?php $elevator = 0;?>
        <?php foreach ($products as $key => $value) { $elevator++ ?>
        <?php if (empty($value)){ continue;}?>
        <?php $main_categroy = explode("_@_",$key); ?>
            <!-- featured category Men -->
            <div class="category-featured">
                <nav class="navbar nav-menu nav-menu-red show-brand">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-brand">
                            <a href="javascript:void(0);">
                                <!--<img alt="fashion" src="<?php echo base_url()?>assets/data/man.png" />-->
                                    <?php echo $main_categroy[0]; ?>
                            </a>
                        </div>
                        <span class="toggle-menu"></span>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li ><a href="<?php echo site_url("category/$main_categroy[1]");?>"><strong>BROWSE ALL IN THIS CATEGORY</strong></a></li>
                                <!--<li ><a data-toggle="tab" href="category.html">Men Clothing</a></li>-->
<!--                                <li><a href="category.html">Men Shoes</a></li>
                                <li><a href="category.html">Men Casual Wear</a></li>
                                <li><a href="category.html">Men Ties</a></li>-->
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                    <div id="elevator-<?php echo $elevator; ?>" class="floor-elevator">
                        <a href="#elevator-<?php echo $elevator-1; ?>" class="btn-elevator up disabled fa fa-angle-up"></a>
                        <a href="#elevator-<?php echo $elevator+1; ?>" class="btn-elevator down fa fa-angle-down"></a>
                    </div>
                </nav>
<!--                <div class="category-banner">
                    <div class="col-sm-6 banner">
                        <a href="category.html"><img alt="ads2" class="img-responsive" src="<?php echo base_url()?>assets/data/ads2.jpg" /></a>
                    </div>
                    <div class="col-sm-6 banner">
                        <a href="category.html"><img alt="ads2" class="img-responsive" src="<?php echo base_url()?>assets/data/ads3.jpg" /></a>
                    </div>
                </div>-->
                <div class="product-featured clearfix">
<!--                    <div class="banner-featured">
                        <div class="featured-text"><span>featured</span></div>
                        <div class="banner-img">
                            <a href="detail3.html"><img alt="Featurered 1" src="<?php echo base_url()?>assets/data/f1.jpg" /></a>
                        </div>
                    </div>-->
                    <div class="product-featured-content">
                        <div class="product-featured-list">
                            <div class="tab-container">
                                <!-- tab product -->
                                <div class="tab-panel active" id="tab-4">
                                    <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                        <?php if (!empty($value)) { ?>
                                            <?php foreach ($value as $product) { ?>
                                                <li>
                                                    <div class="left-block">
                                                        <a href="<?php echo site_url("detail/$product->uri");?>">
                                                            <img class="img-responsive" alt="product" src="<?php echo $product->product_image; ?>" /></a>
<!--                                                        <div class="quick-view">
                                                            <a title="Add to my favourites" class="heart" href="#"></a>  
                                                        </div>-->
                                                        <div class="add-to-cart">
                                                            <a title="View" href="#">View Detail</a>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <h5 class="product-name"><a href="<?php echo site_url("detail/$product->uri");?>"><?php echo $product->product_title; ?></a></h5>
                                                        <div class="content_price">
                                                            <span class="price product-price">PKR <?php echo $product->sale_price; ?></span>
                                                            <!--<span class="price old-price">PKR 52,00</span>-->
                                                        </div>
                                                        <div class="product-star">
                                                            <?php $rating = explode(".", $product->rating); ?>
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
                                            <?php } ?>
                                        <?php } ?>

                                    </ul>
                                </div>
                                <!-- tab product -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end featured category Men -->
        <?php } ?>

        <!-- Baner bottom -->
        <!--<div class="row banner-bottom">
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="<?php echo base_url()?>assets/data/ads17.jpg" /></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="<?php echo base_url()?>assets/data/ads18.jpg" /></a>
                </div>
            </div>
        </div>-->
        <!-- end banner bottom -->
    </div>
</div>