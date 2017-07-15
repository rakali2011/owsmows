<?php // echo "<pre>"; print_r($products); echo "</pre><br/>"; ?>
<?php //echo "<pre>"; print_r($links);echo "</pre>";    ?>

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
<!--        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Fashion</span>
        </div>-->
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">

                <!-- block filter -->
                <div class="block left-module">
                    <p class="title_block">Filter selection</p>
                    <div class="block_content">
                        <!-- layered -->
                        <form method="GET" id="category_filter_form" action="<?php echo site_url("category/search"); ?>">
                            <div class="layered layered-filter-price">
                                <!-- filter categgory -->
                                <div class="layered_subtitle">CATEGORIES</div>
                                <div class="layered-content">
                                    <ul class="check-box-list">
                                        <li>
                                            <input type="checkbox" value="all" <?php if(isset($_GET["cc"])&& $_GET["cc"]=="all"){ echo "checked class='allChecked'"; }?> id="selectAll" name="cc" />
                                            <label for="selectAll">
                                                <span class="button"></span>
                                                All<span class="count"></span>
                                            </label>
                                        </li>
                                        <?php
                                        $id = 0;
                                        foreach ($sub_categories as $sub_category) {
                                            $id++;
                                            ?>

                                            <li>
                                                <input type="checkbox" value="<?php echo $sub_category->uri;?>" <?php if(isset($_GET["c$id"])&& $_GET["c$id"]=="$sub_category->uri"){ echo "checked"; }?> id="c<?php echo $id; ?>" name="c<?php echo $id; ?>" />
                                                <label for="c<?php echo $id; ?>">
                                                    <span class="button"></span>
                                                    <?php echo $sub_category->category_name; ?><span class="count">(<?php echo $sub_category->product_count; ?>)</span>
                                                </label>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div> 
                                <!-- ./filter categgory -->
                                <!-- filter price -->
                                <div class="layered_subtitle">price</div>
                                <div class="layered-content slider-range">
                                    <?php $price_range = isset($_GET["price"]) ? explode("-", $_GET["price"]): 0;
                                    $data_value_min = isset($price_range[0]) & is_numeric($price_range[0]) ? $price_range[0] : 0;
                                    $data_value_max = isset($price_range[1]) & is_numeric($price_range[1]) ? $price_range[1] : 10000;;
                                    ?>
                                    <div data-label-reasult="Range:" data-min="0" data-max="10000" data-unit="PKR " class="slider-range-price" data-value-min="<?php echo $data_value_min; ?>" data-value-max="<?php echo $data_value_max; ?>"></div>
                                    <div class="amount-range-price">Range: PKR <?php echo $data_value_min; ?> - PKR <?php echo $data_value_max; ?></div>
                                    <input id="price_range_filter_box" name="price" type="text" value="<?php echo $data_value_min."-".$data_value_max; ?>" width="70" />

                                    <div class="products-block">
                                        <div class="products-block-bottom">
                                            
                                            <input class="link-all" type="submit" value ="Apply Filters" />
                                            <!--<a class="link-all" href="category.html">Apply Filters</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- ./layered -->

                    </div>
                </div>
                <!-- ./block filter  -->

                <!-- left silide -->
<!--                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        <li><a href="#"><img src="<?php echo base_url() ?>assets/data/slide-left.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="<?php echo base_url() ?>assets/data/slide-left2.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="<?php echo base_url() ?>assets/data/slide-left3.png" alt="slide-left"></a></li>
                    </ul>

                </div>-->
                <!--./left silde-->
                <!-- SPECIAL -->
<!--                <div class="block left-module">
                    <p class="title_block">SPECIAL PRODUCTS</p>
                    <div class="block_content">
                        <ul class="products-block">
                            <li>
                                <div class="products-block-left">
                                    <a href="detail3.html">
                                        <img src="<?php echo base_url() ?>assets/data/product-100x122.jpg" alt="SPECIAL PRODUCTS">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="detail3.html">Woman Within Plus Size Flared</a>
                                    </p>
                                    <p class="product-price">PKR 38,95</p>
                                    <p class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <div class="products-block">
                            <div class="products-block-bottom">
                                <a class="link-all" href="category.html">All Products</a>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- ./SPECIAL -->
                <!-- TAGS -->
<!--                <div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level1">good</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                        </div>
                    </div>
                </div>-->
                <!-- ./TAGS -->
                <!-- Testimonials -->
<!--                <div class="block left-module">
                    <p class="title_block">Testimonials</p>
                    <div class="block_content">
                        <ul class="testimonials owl-carousel" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="<?php echo base_url() ?>assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="<?php echo base_url() ?>assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                            <li>
                                <div class="client-mane">Roverto & Maria</div>
                                <div class="client-avarta">
                                    <img src="<?php echo base_url() ?>assets/data/testimonial.jpg" alt="client-avarta">
                                </div>
                                <div class="testimonial">
                                    "Your product needs to improve more. To suit the needs and update your image up"
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>-->
                <!-- ./Testimonials -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- category-slider -->
                <!--                <div class="category-slider">
                                    <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                                        <li>
                                            <img src="<?php echo base_url() ?>assets/data/category-slide.jpg" alt="category-slider">
                                        </li>
                                        <li>
                                            <img src="<?php echo base_url() ?>assets/data/slide-cart2.jpg" alt="category-slider">
                                        </li>
                                    </ul>
                                </div>-->
                <!-- ./category-slider -->
                <!-- subcategories -->
                <!--                <div class="subcategories">
                                    <ul>
                                        <li class="current-categorie">
                                            <a href="category.html">Women's Fashion</a>
                                        </li>
                                        <li>
                                            <a href="category.html">Tops</a>
                                        </li>
                                        <li>
                                            <a href="category.html">Dresses</a>
                                        </li>
                                        <li>
                                            <a href="category.html">Bags & Shoes</a>
                                        </li>
                                        <li>
                                            <a href="category.html">Pants</a>
                                        </li>
                                        <li>
                                            <a href="category.html">Blouses</a>
                                        </li>
                                    </ul>
                                </div>-->
                <!-- ./subcategories -->
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title"><?php echo $category_name; ?></span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        <?php foreach ($products as $product) { ?>
                            <li class="col-sx-12 col-sm-4">
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="<?php echo site_url("detail/$product->uri"); ?>"><img class="img-responsive" alt="product" src="<?php echo $product->product_image; ?>" />
                                        </a>
<!--                                        <div class="quick-view">
                                            <a title="Add to my favourites" class="heart" href="#"></a>
                                        </div>-->
                                        <div class="add-to-cart">
                                            <a title="View" href="<?php echo site_url("detail/$product->uri"); ?>">View Detail</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="<?php echo site_url("detail/$product->uri"); ?>"><?php echo $product->product_title ?></a></h5>
                                        <div class="product-star">
                                            <?php $rating = explode(".", $product->rating); ?>
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
                                            <span class="price product-price">PKR <?php echo $product->sale_price; ?></span>
                                            <!--<span class="price old-price">PKR 52,00</span>-->
                                        </div>
                                        <div class="info-orther">
                                            <p>Product Code: <?php echo $product->product_code; ?></p>
                                            <p class="availability">Availability: <span><?php echo $product->product_quantity; ?> (In stock)</span></p>
                                            <div class="product-desc">
                                                <?php echo $product->product_description; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                            <?php echo $links; ?>
                            <!--<ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                              </a>
                            </li>
                          </ul>-->
                        </nav>
                    </div>
                    <!--<div class="show-product-item">
                        <select name="">
                            <option value="">Show 18</option>
                            <option value="">Show 20</option>
                            <option value="">Show 50</option>
                            <option value="">Show 100</option>
                        </select>
                    </div>
                    <div class="sort-product">
                        <select>
                            <option value="">Product Name</option>
                            <option value="">Price</option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-asc"></i>
                        </div>
                    </div>-->
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>

