
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
            <span class="page-heading-title2">Place your order</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
<!--            <ul class="step">
                <li><span>01. Summary</span></li>
                <li><span>02. Sign in</span></li>
                <li class="current-step"><span>03. Shipping</span></li>
                <li><span>04. Payment</span></li>
                <li><span>05. Thank You</span></li>
            </ul>-->
			<div class="page-content">
				<div class="row">
					<div class="col-sm-6 ">
                                            <div class="box-authentication">
                                                <form method="POST" action="">
                                                    <label for="">Your Full Name</label>
                                                    <input id="" type="text" name="name" required="true" class="form-control">
                                                    <label for="" >Email <div style="color: red;"><?php echo validation_errors(); ?></div></label>
                                                    <input id="" type="text" required="true" name = "email" class="form-control">
                                                    <label for="">Phone</label>
                                                    <input id="" type="number" min="0" required="true" name = "phone" class="form-control">
                                                    <label for="">City</label>
                                                    <select id="" name="city" class="form-control">
                                                        <option value="Attock">Attock</option>
                                                        <option value="Islamabad">Islamabad</option>
                                                        <option value="Rawalpindi">Rawalpindi</option>
                                                        <option value="wah">Wah Cantt</option>
                                                    </select>
                                                    <label for="">Address</label>
                                                    <input id="" name = "address" required="true" type="text" class="form-control">
                                                    <label for="">Comments</label>
                                                    <input id="" name = "comments" type="text" class="form-control">
                                                    <input id="" name="payment_method_id" value="1" type="hidden" class="form-control">
                                                    <button type="submit" class="button">Proceed</button>
                                                </form>
                                            </div>
					</div>
				</div>
			</div>
			
			<div class="cart_navigation">
				<a class="prev-btn" href="order_signin.html">Back</a>
			</div>
        </div>
    </div>
</div>
<!-- ./page wapper-->

