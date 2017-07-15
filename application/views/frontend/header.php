<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php foreach ($css_includes as $css_include) { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().$css_include; ?>" />
        <?php } ?>

        <title><?php echo $title; ?></title>
    </head>
    <body class="home">
        <!-- TOP BANNER -->
        <!--<div id="top-banner" class="top-banner">
            <div class="bg-overlay"></div>
            <div class="container">
                <h1>Special Offer!</h1>
                <h2>Additional 40% OFF For Men & Women Clothings</h2>
                <span>This offer is for online only 7PM to middnight ends in 30th July 2015</span>
                <span class="btn-close"></span>
            </div>
        </div>-->
        <!-- HEADER -->
        <div id="header" class="header">
            <div class="top-header">
                <div class="container">
                    <div class="nav-top-links">
                        <a class="first-item" href="javascript:void(0);"><img alt="phone" src="<?php echo base_url()?>assets/images/phone.png" />+923035189225</a>
                        <a target="_blank" href="<?php echo site_url('contact'); ?>"><img alt="email" src="<?php echo base_url()?>assets/images/email.png" />Contact us today!</a>
                    </div>
                    <!-- <div class="currency ">
                        <div class="dropdown">
                              <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                              </ul>
                        </div>
                    </div>
                    <div class="language ">
                        <div class="dropdown">
                              <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                              <img alt="email" src="assets/images/fr.jpg" />French
                              
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><img alt="email" src="assets/images/en.jpg" />English</a></li>
                                <li><a href="#"><img alt="email" src="assets/images/fr.jpg" />French</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- 
                    <div class="support-link">
                        <a href="#">Services</a>
                        <a href="#">Support</a>
                    </div>
                    -->
<!--                    <div id="user-info-top" class="user-info pull-right">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                            <ul class="dropdown-menu mega_dropdown" role="menu">
                                <li><a href="login.html">Login</a></li>
                                <li><a href="myorders.html">My Orders</a></li>
                                <li><a href="edit_account.html">Edit Your Info</a></li>
                                <li><a href="favourites.html">Favourites</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
            </div>
            <!--/.top-header -->
            <!-- MAIN HEADER -->
            <div class="container main-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 logo">
                        <a href="<?php echo site_url('home'); ?>"><img alt="Fanzy" src="<?php echo base_url()?>assets/images/fanzy_logo.png" /></a>
                    </div>
                    <div class="col-xs-7 col-sm-7 header-search-box">
<!--                        <form class="form-inline">
                            <div class="form-group form-category">
                                <select class="select-category">
                                    <option value="0">All Categories</option>
                                    <?php foreach ($categories as $key=>$value) { ?>
                                    <?php $main_category = explode("_@_",$key); ?>
                                    <option value="<?php echo $main_category[1];?>"><?php echo $main_category[0];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group input-serach">
                                <input type="text"  placeholder="Keyword here...">
                            </div>
                            <button type="submit" class="pull-right btn-search"></button>
                        </form>-->
                    </div>
                    <div id="cart-block" class="col-xs-5 col-sm-2 shopping-cart-box">
                        <a class="cart-link" href="<?php echo site_url('cart'); ?>">
                            <span class="title">Shopping cart</span>
                            <span id="cart_icon_heading" class="total"><?php echo $this->cart->total_items()?> items - PKR <?php echo $this->cart->total();?> </span>
                            <span id="cart_icon_flag" class="notify notify-left"><?php echo $this->cart->total_items()?> </span>
                        </a>
                        <div class="cart-block">
                            <?php if($this->cart->total_items() > 0 ){?>
                            <div class="cart-block-content">
                                <div class="cart-buttons">
                                    <a href="<?php echo site_url('cart'); ?>" class="btn-check-out">Checkout</a>
                                </div>
                            </div>
                            <?php }?>
                            
                        </div>
                    </div>
                </div>

            </div>
            <!-- END MANIN HEADER -->
