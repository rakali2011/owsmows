
<!-- Footer -->
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-4">
                    <div id="address-box">
                        <a href="<?php echo site_url('home'); ?>"><img src="<?php echo base_url()?>assets/images/fanzy_logo.png" alt="" /></a>
                        <div id="address-list">
                            <div class="tit-name">Address:</div>
                            <div class="tit-contain">Kashmir Plaza, Motti bazar Nawabaabad, Wah Cantt, Pakistan.</div>
                            <div class="tit-name">Phone:</div>
                            <div class="tit-contain">+923035189225</div>
                            <div class="tit-name">Email:</div>
                            <div class="tit-contain">support@fanzy.pk</div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="introduce-title">Company</div>
                            <ul id="introduce-company"  class="introduce-list">
                                <li><a target="_blank" href="<?php echo site_url('content/about'); ?>">About Us</a></li>
                                <!--<li><a target="_blank" href="<?php echo site_url('content/delivery-information'); ?>">Delivery Information</a></li>-->
                                <li><a target="_blank" href="<?php echo site_url('content/privacy-policy'); ?>">Privacy Policy</a></li>
                                <li><a target="_blank" href="<?php echo site_url('content/terms-conditions'); ?>">Terms & Conditions</a></li>
                                <li><a target="_blank" href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
                            </ul>
                        </div>
<!--                        <div class="col-sm-6">
                            <div class="introduce-title">My Account</div>
                            <ul id = "introduce-Account" class="introduce-list">
                                <li><a href="favourites.html">My Order</a></li>
                                <li><a href="favourites.html">My Favourites</a></li>
                                <li><a href="login.html">My Personal In</a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="contact-box">
                        <div class="introduce-title">Newsletter</div>
                        <div class="input-group" id="mail-box">
                          <input type="text" placeholder="Your Email Address"/>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">OK</button>
                          </span>
                        </div><!-- /input-group -->
                        <div class="introduce-title">Let's Socialize</div>
                        <div class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    
                </div>
            </div><!-- /#introduce-box -->
        
            <!-- #trademark-box -->
<!--            <div id="trademark-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-list">
                        <li id="payment-methods">Accepted Payment Methods</li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-ups.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-qiwi.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-wu.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-cn.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-visa.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-mc.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-ems.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-dhl.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-fe.jpg"  alt="ups"/></a>
                        </li>
                        <li>
                            <a href="#"><img src="<?php echo base_url()?>assets/data/trademark-wm.jpg"  alt="ups"/></a>
                        </li>
                    </ul> 
                </div>
            </div>  /#trademark-box -->
            
            <!-- #trademark-text-box -->
            <!-- /#trademark-text-box -->
            <div id="footer-menu-box">
<!--                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Company Info - Partnerships</a></li>
                    </ul>
                </div>
                <div class="col-sm-12">
                    <ul class="footer-menu-list">
                        <li><a href="#" >Terms & Conditions</a></li>
                        <li><a href="#" >Policy</a></li>
                        <li><a href="#" >Shipping</a></li>
                        <li><a href="#" >Payments</a></li>
                        <li><a href="#" >Returns</a></li>
                        <li><a href="#" >Refunds</a></li>
                        <li><a href="#" >Warrantee</a></li>
                        <li><a href="#" >FAQ</a></li>
                        <li><a href="#" >Contact</a></li>
                    </ul>
                </div>-->
                <p class="text-center">Copyrights &#169; 2017 Fanzy. All Rights Reserved</p>
            </div><!-- /#footer-menu-box -->
        </div> 
</footer>

<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<!-- Script-->
<?php foreach($js_includes as $js_include) {?>
<script type="text/javascript" src="<?php echo base_url().$js_include; ?>"></script>
<?php }?>

</body>
</html>