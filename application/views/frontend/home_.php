<?php print_r($sale_products);?>
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
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="assets/data/s1.png" />
            </div>
            <div class="info">
                <a href="about.html"><h3>Free Shipping</h3></a>
                <span>On order over PKR 200</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="assets/data/s2.png" />
            </div>
            <div class="info">
                <a href="about.html"><h3>30-day return</h3></a>
                <span>Moneyback guarantee</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="assets/data/s3.png" />
            </div>
            
            <div class="info" >
                <a href="about.html"><h3>24/7 support</h3></a>
                <span>Online consultations</span>
            </div>
        </div>
        <div class="col-xs-6 col-sm-3 service-item">
            <div class="icon">
                <img alt="services" src="assets/data/s4.png" />
            </div>
            <div class="info">
                <a href="about.html"><h3>SAFE SHOPPING</h3></a>
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
                        <li class="active"><a data-toggle="tab" href="#tab-1">New Arrival</a></li>
                        <li><a data-toggle="tab" href="#tab-3">On Sale</a></li>
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
                                            <a title="View" href="#">View Detail</a>
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
                                <ul class="product-list owl-carousel"  data-dots="false" data-loop="true" data-nav = "true" data-margin = "30"  data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                            <img class="img-responsive" alt="product" src="assets/data/p48.jpg" /></a>
                                            <div class="quick-view">
                                                    <a title="Add to my favourites" class="heart" href="#"></a>  
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">PKR 38,95</span>
                                                <span class="price old-price">PKR 52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="#">
                                            <img class="img-responsive" alt="product" src="assets/data/p49.jpg" /></a>
                                            <div class="quick-view">
                                                    <a title="Add to my favourites" class="heart" href="#"></a>  
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">PKR 38,95</span>
                                                <span class="price old-price">PKR 52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail3.html"><img class="img-responsive" alt="product" src="assets/data/p50.jpg" /></a>
                                            <div class="quick-view">
                                                    <a title="Add to my favourites" class="heart" href="#"></a>  
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">PKR 38,95</span>
                                                <span class="price old-price">PKR 52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left-block">
                                            <a href="detail3.html"><img class="img-responsive" alt="product" src="assets/data/p51.jpg" /></a>
                                            <div class="quick-view">
                                                    <a title="Add to my favourites" class="heart" href="#"></a>  
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">PKR 38,95</span>
                                                <span class="price old-price">PKR 52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab-3" class="tab-panel">
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
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
                                            <a title="View" href="">View Detail</a>
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
                                    <li>
                                        <div class="left-block">
                                            <a href="detail3.html"><img class="img-responsive" alt="product" src="assets/data/p61.jpg" /></a>
                                            <div class="quick-view">
                                                    <a title="Add to my favourites" class="heart" href="#"></a>  
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">PKR 38,95</span>
                                                <span class="price old-price">PKR 52,00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </li>
                                    <?php }?>
                                    
                                    
                                </ul>
                            </div>
                      </div>
                </div>
            </div>
<!--            <div class="col-xs-12 col-sm-3 page-top-right">
                <div class="latest-deals">
                    <h2 class="latest-deal-title">latest deals</h2>
                    <div class="latest-deal-content">
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":1}}'>
                            <li>
                                <div class="count-down-time" data-countdown="2015/06/27"></div>
                                <div class="left-block">
                                    <a href="detail3.html"><img class="img-responsive" alt="product" src="assets/data/ld1.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my favourites" class="heart" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">PKR 38,95</span>
                                        <span class="price old-price">PKR 52,00</span>
                                        <span class="colreduce-percentage">(-10%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2015/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="detail3.html"><img class="img-responsive" alt="product" src="assets/data/ld2.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my favourites" class="heart" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">PKR 38,95</span>
                                        <span class="price old-price">PKR 52,00</span>
                                        <span class="colreduce-percentage">(-90%)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="count-down-time" data-countdown="2015/06/27 9:20:00"></div>
                                <div class="left-block">
                                    <a href="detail3.html"><img class="img-responsive" alt="product" src="assets/data/ld3.jpg" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my favourites" class="heart" href="#"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="detail3.html">Maecenas consequat mauris</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">PKR 38,95</span>
                                        <span class="price old-price">PKR 52,00</span>
                                        <span class="colreduce-percentage">(-20%)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
<!---->
<div class="content-page">
    <div class="container">
	<?php $elevator = 0;?>
        <?php foreach ($products as $key => $value) { $elevator++ ?>
        <?php if (empty($value)){ continue;}?>
		<!-- featured category Women -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-green show-brand">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-brand"><a href="javascript:void(0);">
                              <?php echo $key; ?>
                      </a></div>
                  <span class="toggle-menu"></span>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">           
                  <ul class="nav navbar-nav">
                    <!--<li class="active"><a data-toggle="tab" href="category.html">Women Clothing</a></li>-->
<!--                    <li><a href="category.html">Women Shoes</a></li>
                    <li><a href="category.html">Women Casual Wear</a></li>
                    <li><a href="category.html">Women Jeans</a></li>-->
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
              <div id="elevator-2" class="floor-elevator">
                    <a href="#elevator-1" class="btn-elevator up  fa fa-angle-up"></a>
                    <a href="#elevator-3" class="btn-elevator down fa fa-angle-down"></a>
              </div>
            </nav>
            
           <div class="product-featured clearfix">
                
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
                        <?php }?>

        <!-- end featured category Women -->
        
	
    </div>
</div>

