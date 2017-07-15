<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
<!--        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Your shopping cart</span>
        </div>-->
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Shopping Cart Summary</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
<!--            <ul class="step">
                <li class="current-step"><span>01. Summary</span></li>
                <li><span>02. Sign in</span></li>
                <li><span>03. Shipping</span></li>
                <li><span>04. Payment</span></li>
                <li><span>05. Thank You</span></li>
            </ul>-->
            <div class="heading-counter warning">Your shopping cart contains:
                <span><?php echo count($cart_contents); ?> Product(s)</span>
            </div>
            <div class="order-detail-content">
                <table class="table table-bordered table-responsive cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Avail.</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th  class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cart_contents as $items){?>
                        <tr id="row_<?php echo $items["rowid"]; ?>">
                            <td class="cart_product">
                                <a href="<?php echo site_url("detail/{$items["options"]["product_uri"]}"); ?>"><img src="<?php echo $items["options"]["product_image"]; ?>" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="<?php echo site_url("detail/{$items["options"]["product_uri"]}"); ?>"><?php echo $items["name"]; ?> </a></p>
                                <small class="cart_ref">Item Code : <?php echo $items["options"]["product_code"]; ?></small><br>
<!--                                <small><a href="<?php echo site_url("detail/{$items["options"]["product_uri"]}"); ?>">Color : <?php echo $items["options"]["product_color_name"];?></a></small><br>
                                <small><a href="<?php echo site_url("detail/{$items["options"]["product_uri"]}"); ?>">Size : <?php echo $items["options"]["product_size_code"];?></a></small>-->
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price"><span>PKR <?php echo $items["price"]; ?></span></td>
                            <td class="qty">
                                <input id="qty_<?php echo $items["id"]; ?>" class="form-control input-sm" type="text" value="<?php echo $items["qty"]; ?>">
                                <a data="<?php echo $items["id"]; ?>" data-rowid="<?php echo $items["rowid"]; ?>" class="qty_up" href="javascript:void(0);"><i class="fa fa-caret-up"></i></a>
                                <a data="<?php echo $items["id"]; ?>" data-rowid="<?php echo $items["rowid"]; ?>" class="qty_down" href="javascript:void(0);"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td class="price">
                                <span>PKR <?php echo $items["subtotal"]; ?></span>
                            </td>
                            <td class="action">
                                <a href="javascript:void(0);" class="remove_inventory" data-rowid="<?php echo $items["rowid"]; ?>">Delete item</a>
                                <input type="hidden" value="<?php echo base_url(); ?>" id="base_url"/>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Total products </td>
                            <td id="product_total" colspan="2">PKR <?php echo $this->cart->total();?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td id="grand_total" colspan="2"><strong>PKR <?php echo $this->cart->total();?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="cart_navigation">
                    <a class="prev-btn" href="index.html">Continue shopping</a>
                    <?php if($this->cart->total() > 0) {?>
                    <a class="next-btn" href="<?php echo site_url('order'); ?>">Proceed to checkout</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->

