<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
        <title>ONLINE DUKAAN ADMIN PANEL</title>

        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

        <!-- 
        **********************************************************
        In development, use the LESS files and the less.js compiler
        instead of the minified CSS loaded by default.
        **********************************************************
        <link rel="stylesheet/less" href="<?php // echo base_url(); ?>assets_admin/assets/less/admin/module.admin.page.index.less" />
        -->

        <!--[if lt IE 9]><link rel="stylesheet" href="<?php // echo base_url(); ?>assets_admin/assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
        <?php foreach ($css_includes as $css_include) { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url() . $css_include; ?>" />
        <?php } ?>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?php foreach ($header_js_includes as $js_include) { ?>
            <script type="text/javascript" src="<?php echo base_url() . $js_include; ?>"></script>
        <?php } ?>

    </head>
    <body class="">

        <div class="navbar navbar-fixed-top navbar-primary main" role="navigation">

            <div class="navbar-header pull-left">
                <div class="navbar-brand">
                    <div class="pull-left">
                        <a href="" class="toggle-button toggle-sidebar btn-navbar"><i class="fa fa-bars"></i></a>
                    </div>
                    <a href="<?php echo site_url("admin/home"); ?>" class="appbrand innerL">Online Dukaan</a>
                </div>
            </div>

            <ul class="nav navbar-nav navbar-left">
                <li class=" hidden-xs">
                    <form class="navbar-form navbar-left " role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type in here..."/>
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-inverse"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
<!--                <li class="dropdown">
                    <a href="" class="dropdown-toggle user" data-toggle="dropdown"> <img src="<?php echo base_url(); ?>assets_admin/assets/images/people/35/8.jpg" alt="" class="img-circle"/><span class="hidden-xs hidden-sm"> &nbsp; Adrian Demian </span> <span class="caret"></span></a>
                    <ul class="dropdown-menu list pull-right ">
                        <li><a href="my_account.html">Change Password <i class="fa fa-pencil pull-right"></i></a></li>
                        <li><a href="#">Log out <i class="fa fa-sign-out pull-right"></i></a></li>
                    </ul>
                </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-xs">

                <li class="dropdown">
                    <a href="" class="dropdown-toggle user" data-toggle="dropdown"> <img src="<?php echo base_url(); ?>assets_admin/assets/images/people/35/8.jpg" alt="" class="img-circle"/><span class="hidden-xs hidden-sm"> &nbsp; Adrian Demian </span> <span class="caret"></span></a>
                    <ul class="dropdown-menu list pull-right ">
                        <li><a href="my_account.html">Change Password <i class="fa fa-pencil pull-right"></i></a></li>
                        <li><a href="<?php echo site_url('admin/home/logout') ?>">Log out <i class="fa fa-sign-out pull-right"></i></a></li>
                    </ul>
                </li>

                <li><a href="" class="menu-icon"><i class="fa fa-sign-out"></i></a></li>
            </ul>
        </div>