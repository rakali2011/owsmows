

<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <!--        <div class="breadcrumb clearfix">
                    <a class="home" href="#" title="Return to Home">Home</a>
                    <span class="navigation-pipe">&nbsp;</span>
                    <span class="navigation_page">Contact</span>
                </div>-->
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Contact Us</span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-sm-6">
                                        <?php if($this->session->flashdata('flashSuccess')):?>
                    <p class='flashMsg flashSuccess'> <?= $this->session->flashdata('flashSuccess') ?> </p>
                    <?php $this->session->set_flashdata('flashSuccess', ''); endif?>
                    <h3 class="page-subheading">CONTACT FORM</h3>

                    <div class="contact-form-box">
                        <form method="POST">
                            <div class="form-selector">
                                <label>Name</label>
                                <input name="name" type="text" required="true" class="form-control input-sm" id="name" />
                            </div>
                            <div class="form-selector">
                                <label>Subject</label>
                                <input name="subject" type="text" required="true" class="form-control input-sm" id="subject" />
                            </div>
                            <div class="form-selector">
                                <label>Email address<div style="color: red;"><?php echo validation_errors(); ?></div></label>
                                <input name="email" required="true" type="text" class="form-control input-sm" id="email" />
                            </div>
                            <div class="form-selector">
                                <label>Message</label>
                                <textarea name="message" required="true" class="form-control input-sm" rows="10" id="message"></textarea>
                            </div>
                            <div class="form-selector">
                                <button type="submit" id="btn-send-contact" class="btn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6" id="contact_form_map">
                    <h3 class="page-subheading">Information</h3>

                    <ul class="store_info">
                        <li><i class="fa fa-home"></i><strong>Our business address is:</strong></li>
                        <li>Kashmir Plaza, Motti Bazar Nawabaabad, Wah Cantt, Pakistan.</li>
                        <li><i class="fa fa-phone"></i><span>+ 0312-9636439</span></li>
                        <li><i class="fa fa-phone"></i><span>+ 0303-5189225</span></li>
                        <li><i class="fa fa-envelope"></i>Email: <span><a href="javascript:void(0);">customer@fanzy.pk</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->

