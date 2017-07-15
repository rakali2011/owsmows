
<div id="nav-top-menu" class="nav-top-menu">
    <div class="container">
        <div class="row">
            <div id="main-menu" class="col-sm-9 main-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class=" <?php if($selected_menu_category == "home") {echo 'active';}  ?>"><a href="<?php echo site_url('home') ?>">Home</a></li>
                                <?php foreach ($categories as $key => $value) { ?>
                                <?php $main_category = explode("_@_",$key); ?>
                                    <li class="dropdown <?php if($selected_menu_category == $main_category[0]) {echo 'active';}  ?> ">
                                        <a href="<?php echo site_url("category/$main_category[1]"); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $main_category[0]; ?></a>
                                        <ul class="mega_dropdown dropdown-menu" style="width: 100%;">
                                            <?php foreach ($value as $sub_cat) { ?>
                                                <li class="block-container col-sm-4">
                                                    <ul class="block">
                                                        <li class="link_container"><a href="<?php echo site_url("category/$sub_cat->uri"); ?>"><?php echo $sub_cat->category_name; ?></a>
                                                        </li>
                                                    </ul>
                                                </li>

                                            <?php } ?>

                                        </ul>
                                    </li>
                                <?php } ?>
                                    <li class=" <?php if($selected_menu_category == "ABOUT US") {echo 'active';}  ?> "><a href="<?php echo site_url('content/about'); ?>">About Us</a></li>
                                <li class=" <?php if($selected_menu_category == "contact") {echo 'active';}  ?> " ><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
        <!-- userinfo on top-->
        <div id="user-info-opntop">
        </div>
        <!-- CART ICON ON MMENU -->
        <div id="shopping-cart-box-ontop">
            <a href="<?php echo site_url('cart'); ?>"><i class="fa fa-shopping-cart"></i></a>
            <div class="shopping-cart-box-ontop-content"></div>
        </div>
    </div>
</div>
</div>
<!-- end header -->