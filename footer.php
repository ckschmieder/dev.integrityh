<?php
global $integrity_house;
?>

    <div class="clearfix"></div>
    
    <footer>
        <div id="bg-middle">
            <div id="footer-middle">

                <div class="contact contact-top footer-third">
                    <div class="footer-title"><a href="/locations/">Contact Us</a></div>
                    <div class="inner-contact" id="contact-newark">
                        <strong>Integrity House Headquarters</strong>

                        <div itemscope itemtype="http://schema.org/Organization">
                            <!-- <span itemprop="name">Integrity House, Inc.</span> -->
                            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                <span itemprop="streetAddress">103 Lincoln Park</span>
                                <br>
                                <span itemprop="postOfficeBoxNumber">PO Box 510</span>
                                <br>
                                <span itemprop="addressLocality">Newark</span>,
                                <span itemprop="addressRegion">NJ</span>
                                <span itemprop="postalCode">07102</span>
                            </div>
                            <br>
                            Tel: <span itemprop="telephone">973-623-0600</span>  
                            <br>
                            <a href="/locations/">Other Locations &raquo;</a>                          
                        </div>
                    </div>
                    <div class="inner-contact" id="contact-secaucus">
                        <strong>Secaucus Campus</strong>

                        <div itemscope itemtype="http://schema.org/Organization">
                            <meta itemprop="name" content="Integrity House, Inc. (Secaucus Campus)">
                            <div itemprop="address" itemscope itemtype="http://schema.org/Address">
                                <span itemprop="streetAddress">595 County Avenue</span>
                                <br>
                                <span itemprop="postOfficeBoxNumber">PO Box 2505</span>
                                <br>
                                <span itemprop="addressLocality">Secaucus</span>,
                                <span itemprop="addressRegion">NJ</span>
                                <span itemprop="postalCode">07096</span>
                                <br>
                            </div>
                            <br>
                            Tel: <span itemprop="telephone">201-583-7100</span>
                            <br>
                            Fax: <span itemprop="faxNumber">201-583-7114</span>                            
                        </div>
                    </div>
                </div>

                <div class="help help-middle footer-third">
                    <div class="footer-title"><a href="/get-help/admissions/">Get Help</a></div>
                    <h4 class="inner-help" id="hotlines">
                        <div itemscope itemtype="http://schema.org/Organization">
                            <meta itemprop="name" content="Narcotics Anonymous">
                            NA Hotline
                            &ndash;
                            <a itemprop="telephone" href="tel://<?php echo $integrity_house['na_hotline']; ?>"><?php echo $integrity_house['na_hotline']; ?></a>
                        </div>

                        <div itemscope itemtype="http://schema.org/Organization">
                            <meta itemprop="name" content="Alcoholics Anonymous">
                            AA Hotline
                            &ndash;
                            <a itemprop="telephone" href="tel://<?php echo $integrity_house['aa_hotline']; ?>"><?php echo $integrity_house['aa_hotline']; ?></a>
                        </div>
                    </h4>
                </div>

                <div class="connect connect-middle footer-third" id="connect-links">
                    <div class="footer-title"><a href="/locations/">Connect</a></div>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'careers_menu',
                        'fallback_cb'    => false,
                        'menu_class'     => 'footer-menu',
                    ));
                    ?>

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'login_menu',
                        'fallback_cb'    => false,
                        'menu_class'     => 'footer-menu',
                    ));
                    ?>

                </div>
            </div>
        </div> <!-- End bg-middle -->
        <div class="clearfix"></div>

        <div class="container created">
            <span>Created By</span>
            <a href="http://www.randjsc.com" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/rjsc-logo.png'; ?>">
            </a>
            <span class="copyright">Copyright &copy; <?php echo date('Y'); ?> Integrity House, All Rights Reserved.</span>
        </div>
        <div class="clearfix"></div>
           
    </footer>

    <div id="footer-mob">
        <div id="accordion-one">
            <h4 class="footer-headline">Contact Us</h4>
                <div class="contact-top">
                    <div class="inner-contact" data-bind-content="#contact-newark"></div>
                    <div class="inner-contact" data-bind-content="#contact-secaucus"></div>
                </div>
            <h4 class="footer-headline">Get Help</h4>
                <div class="help-middle">
                    <h4 class="inner-help" data-bind-content="#hotlines">
                    </h4>
                </div>
        </div> <!-- End accordion-one -->
        <div class="login-middle">
            <div id="mobile-footer-button">
                <a href="#" target="_blank" class="button">Staff Login</a>
                <a href="#" target="_blank" class="button">Trustee Login</a>
            </div>
        </div>
        <div id="accordion-two">
            <h4 class="footer-headline clearfix">Careers</h4>
            <div class="careers-middle" data-bind-content="#careers-menu">
            </div>

            <h4 class="footer-headline clearfix">Connect</h4>
            <div class="connect-middle" data-bind-content="#connect-links">
            </div>
        </div> <!-- End accordion-two -->
    </div> <!-- End footer-mob -->



        <?php
        // JavaScripts get included via wp_enqueue_script in wp_footer hook
        // See theme/includes/functions/scripts.php
        wp_footer();
        ?>
</body>
</html>

<?php // vim: set ts=4 sw=4 expandtab : ?>