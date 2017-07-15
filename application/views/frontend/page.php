<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
<!--        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">About Us</span>
        </div>-->
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Infomations</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <li <?php if($content->title=="ABOUT US"){ echo 'class="active"';}?> ><span></span><a href="about.html">About Us</a></li>
                                    <!--<li <?php if($content->title=="about us"){ echo 'class="active"';}?>><span></span><a href="<?php echo site_url('content/delivery-information') ;?>">Delivery Information</a></li>-->
                                    <li <?php if($content->title=="PRIVACY POLICY"){ echo 'class="active"';}?>><span></span><a href="<?php echo site_url('content/privacy-policy'); ?>">Privacy Policy</a></li>
                                    <li <?php if($content->title=="TERMS AND CONDITIONS"){ echo 'class="active"';}?>><span></span><a href="<?php echo site_url('content/terms-conditions'); ?>">Terms &amp; Conditions</a></li>
                                    <li <?php if($content->title=="CONTACT US"){ echo 'class="active"';}?>><span></span><a href="<?php echo site_url('contact') ;?>">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- Banner silebar -->
                <div class="block left-module">
                    <div class="banner-opacity">
                        <!--<a href="category.html"><img src="assets/data/slide-left.jpg" alt="ads-banner"></a>-->
                    </div>
                </div>
                <!-- ./Banner silebar -->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- page heading-->
                <h2 class="page-heading">
                    <span class="page-heading-title2"><?php echo $content->title; ?></span>
                </h2>
                <!-- Content page -->
                <div class="content-text clearfix">

                    <!--<img src="assets/data/about-us.jpg" class="alignleft" width="310" alt="">-->
                    <?php echo $content->page_text; ?>
                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->


