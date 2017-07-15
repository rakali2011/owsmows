
<div id="content"><h1 class="bg-white content-heading border-bottom">Latest Orders</h1>

    <div class="innerLR">


        <div class="widget widget-inverse">
            <div class="widget-head">
                <h3 class="heading">Total Latest Orders: <strong>2</strong></h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">

                        <?php foreach ($latest_orders as $order) { ?>
                            <!-- Collapsible Widget -->
                            <div class="widget" data-toggle="collapse-widget" data-collapse-closed="true">
                                <div class="widget-head drop_head">
                                    <h4 class="heading">
                                        <ul>
                                            <li>Order 1</li>
                                            <li>Invoice #: <span>21458</span></li>
                                            <li>Waqar Ahmed</li>
                                            <li>Delivery</li>

                                        </ul>
                                        <button class="green_btn" type="submit">Accept</button>
                                        <button class="red_btn"  type="submit">Reject</button>

                                    </h4>
                                </div>
                                <div class="widget-body acc_body">
                                    <div class="col-md-6"><h5>Order By: <strong><?php echo $order->name; ?></strong></h5></div>
                                    <div class="col-md-6"style="text-align:right;"><h5>City: <strong><?php echo $order->city; ?></strong></h5></div>
                                    <div class="col-md-12" ><h5>Delivery Address: <strong><?php echo $order->address; ?></strong></h5></div>
                                </div>
                                <?php foreach($order->products as $product) {?>
                                <hr class="line_mine"/>
                                <div class="widget-body acc_body">
                                    <div class="col-md-1"><img src="<?php echo base_url(); ?>assets_admin/assets/images/orders_img.png" class="img-responsive"/></div>
                                    <div class="col-md-4">
                                        <h4><?php echo $product->product_title?></h4>
                                        <img src="<?php echo base_url(); ?>assets_admin/assets/images/star_yellow.png" />
                                        <img src="<?php echo base_url(); ?>assets_admin/assets/images/star_yellow.png" />
                                        <img src="<?php echo base_url(); ?>assets_admin/assets/images/star_yellow.png" />
                                        <img src="<?php echo base_url(); ?>assets_admin/assets/images/star_yellow.png" />
                                        <img src="<?php echo base_url(); ?>assets_admin/assets/images/star_yellow.png" />
                                    </div>
                                    <div class="col-md-1">
                                        <h4>QTY: <span><?php echo $product->product_quantity; ?></span></h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4><b>PKR <?php echo $product->sale_price; ?></b></h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Color: <div style="background-color: #CCC; " class="red_color"></div></h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Size: <p class="size_mine">S</p></h4>
                                    </div>
                                </div>
                        <?php }?>
                                
                                <hr class="line_mine"/>
                                <div class="widget-body acc_body">
                                    <div class="col-md-6 col-md-offset-6"style="text-align:right;"><h5>Payment Method: <strong><?php echo $order->payment_method_title; ?></strong></h5></div>
                                    <div class="col-md-6 col-md-offset-6"style="text-align:right;"><h5>Item Total: <strong>PKR 3000</strong></h5></div>
                                    <div class="col-md-6 col-md-offset-6"style="text-align:right;"><h5>Shipping Method: <strong>PKR 150</strong></h5></div>
                                    <div class="col-md-6 col-md-offset-6"style="text-align:right;"><h5>Offer: <strong>N/A</strong></h5></div>
                                    <div class="col-md-6 col-md-offset-6"style="text-align:right;"><h5>Grand Total: <strong style="color:#479c10;">PKR 3,150</strong></h5></div>
                                </div>
                            </div>
                            <!-- // Collapsible Widget END -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Collapsible Widgets END -->
    </div>

</div>
<!-- // Content END -->

<div class="clearfix"></div>
<!-- // Sidebar menu & content wrapper END -->

<div id="footer" class="hidden-print">

    <!--  Copyright Line -->
    <div class="copy">&copy; 2017 - <a href="http://www.onlinedukaan.com">Online Dukaan</a> - All Rights Reserved. </div>
    <!--  End Copyright Line -->

</div>
<!-- // Footer END -->

</div>
<!-- // Main Container Fluid END -->




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
</body>
</html>