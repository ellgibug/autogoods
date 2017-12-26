<footer id="footer">
    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <!-- Footer Logo -->
                <img class="footer-logo footer-2" src="{{url('smarty/images/_smarty/logo-footer.png')}}" alt="" />

                <!-- Small Description -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque.</p>

                <hr />

                <div class="row">
                    <div class="col-md-6 col-sm-6">

                        <!-- Newsletter Form -->
                        <p class="mb-10">Subscribe to Our <strong>Newsletter</strong></p>

                        <form id="newsletterForm" action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email" required="required">
                                <span class="input-group-btn">
												<button class="btn btn-info mdl-js-button mdl-js-ripple-effect" type="submit">Subscribe</button>
											</span>
                            </div>
                        </form>
                        <!-- /Newsletter Form -->
                    </div>

                    <div class="col-md-6 col-sm-6 hidden-xs-down">

                        <!-- Social Icons -->
                        <div class="ml-50 clearfix">

                            <p class="mb-10">Follow Us</p>
                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook float-left" data-toggle="tooltip" data-placement="top" title="Facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter float-left" data-toggle="tooltip" data-placement="top" title="Twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-gplus float-left" data-toggle="tooltip" data-placement="top" title="Google plus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="Linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>

                            <a href="#" class="social-icon social-icon-sm social-icon-transparent social-rss float-left" data-toggle="tooltip" data-placement="top" title="Rss">
                                <i class="icon-rss"></i>
                                <i class="icon-rss"></i>
                            </a>

                        </div>
                        <!-- /Social Icons -->

                    </div>

                </div>



            </div>

            <div class="col-md-4">

                <h4 class="letter-spacing-1">CONTACT US</h4>

                <!-- CONTACT MESSAGES -->
                <p id="alert_success" class="alert alert-success alert-mini">Message sent! Thank You!</p>
                <p id="alert_failed" class="alert alert-danger alert-mini">Message not sent!</p>
                <p id="alert_mandatory" class="alert alert-danger alert-mini">Please, complete all mandatory fields</p>

                <!-- CONTACT FORM -->
                <form class="validate" method="post" action="">

                    <input type="text" value="" placeholder="Name*" maxlength="100" class="form-control required" name="contact[name]" />
                    <input type="email" value="" placeholder="Email*" data-msg-email="Please enter a valid email address." class="form-control required" name="contact[email]" />
                    <textarea maxlength="5000" placeholder="Message*" rows="5" class="form-control required" name="contact[message]" style="resize: none; height: 100px"></textarea>
                    <input type="submit" value="SUBMIT MESSAGE" class="btn btn-info mdl-js-button mdl-js-ripple-effect" />

                </form>
                <!-- /CONTACT FORM -->

            </div>

        </div>

    </div>

    <div class="copyright">
        <div class="container">
            <ul class="list-inline inline-links mobile-block float-right m-0">
                <a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                </a>

                <a href="#" class="social-icon social-icon-sm social-icon-transparent social-instagram" data-toggle="tooltip" data-placement="top" title="Instagram">
                    <i class="icon-instagram"></i>
                    <i class="icon-instagram"></i>
                </a>

                <a href="#" class="social-icon social-icon-sm social-icon-transparent social-vk" data-toggle="tooltip" data-placement="top" title="Vk">
                    <i class="icon-vk"></i>
                    <i class="icon-vk"></i>
                </a>

                <a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                </a>
            </ul>

            &copy; Все права защищены, AutoCompany
        </div>
    </div>
</footer>