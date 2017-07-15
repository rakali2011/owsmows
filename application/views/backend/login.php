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
        <link rel="stylesheet/less" href="../assets/less/admin/module.admin.page.login.less" />
        -->

        <!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets_admin/assets/css/admin/module.admin.page.login.min.css" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets_admin/assets/components/library/jquery/jquery.min.js?v=v1.2.3"></script>
        <script src="<?php echo base_url(); ?>assets_admin/assets/components/library/jquery/jquery-migrate.min.js?v=v1.2.3"></script>
        <script src="<?php echo base_url(); ?>assets_admin/assets/components/library/modernizr/modernizr.js?v=v1.2.3"></script>
        <script src="<?php echo base_url(); ?>assets_admin/assets/components/plugins/less-js/less.min.js?v=v1.2.3"></script>
        <script src="<?php echo base_url(); ?>assets_admin/assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.2.3"></script>
        <script src="<?php echo base_url(); ?>assets_admin/assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.2.3"></script>
    </head>
    <body class=" loginWrapper">

        <div id="content"><h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Login to your Account</h4>

            <div class="login spacing-x2">
                <div class="placeholder text-center"><i class="fa fa-lock"></i></div>
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body innerAll">
                            <?php
                            if (!empty($this->session->userdata('message'))):
                                ?>
                                <div class="alert alert-dismissable alert-error">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?php
                                    echo $this->session->userdata('message');
                                    echo $this->session->unset_userdata('message');
                                    ?>
                                </div>
                                <?php
                            endif;
                            ?>
                            <form role="form" method="POST" action="<?php echo base_url(); ?>admin/verifylogin">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                <!--		  			<div class="checkbox">
                                                                        <label>
                                                                                <input type="checkbox"> Remember my details
                                                                        </label>
                                                                        </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>





            <!-- Global -->
            <script>
                var basePath = '',
                        commonPath = '../assets/',
                        rootPath = '../',
                        DEV = false,
                        componentsPath = '../assets/components/';

                var primaryColor = '#cb4040',
                        dangerColor = '#b55151',
                        infoColor = '#466baf',
                        successColor = '#8baf46',
                        warningColor = '#ab7a4b',
                        inverseColor = '#45484d';

                var themerPrimaryColor = primaryColor;
            </script>

            <script src="../assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.2.3"></script>
            <script src="../assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3"></script>
            <script src="../assets/components/plugins/breakpoints/breakpoints.js?v=v1.2.3"></script>
            <script src="../assets/components/core/js/animations.init.js?v=v1.2.3"></script>
            <script src="../assets/components/helpers/themer/assets/plugins/cookie/jquery.cookie.js?v=v1.2.3"></script>
            <script src="../assets/components/core/js/core.init.js?v=v1.2.3"></script>	
    </body>
</html>