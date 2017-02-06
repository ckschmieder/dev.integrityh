<?php
global $integrity_house;
$theme_uri = get_stylesheet_directory_uri();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <title>
        <?php wp_title('//', true, 'left'); ?>
    </title>

    <!-- Favicons & Touch Device Icons -->
    <?php if (!empty($integrity_house['favicon_ico']['url'])): ?>
        <link rel="shortcut" href="<?php echo $integrity_house['favicon_ico']['url']; ?>" type="image/x-icon">
    <?php endif; ?>
    <?php if (!empty($integrity_house['favicon_png']['url'])): ?>
        <link rel="icon" href="<?php echo $integrity_house['favicon_png']['url']; ?>" type="image/png" sizes="32x32">
    <?php endif; ?>
    <?php if (!empty($integrity_house['apple_touch_icon']['url'])): ?>
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $integrity_house['apple_touch_icon']['url']; ?>">
    <?php endif; ?>

    <!--[if lt IE 9]>
        <script src="<?php echo $theme_uri; ?>/javascripts/ie8_fixes.js"></script>
        <script src="<?php echo $theme_uri; ?>/vendor/html5shiv/dist/html5shiv.js"></script>
        <script src="<?php echo $theme_uri; ?>/vendor/respond/dest/respond.min.js"></script>
    <![endif]-->

    <?php
    // Stylesheets and Modernizr get included via wp_enqueue_script in wp_head
    // hook.
    // See theme/includes/functions/styles.php
    wp_head();
    ?>
    <script
        data-main="<?php echo $theme_uri; ?>/javascripts/main.bundle.min"
        src="<?php echo $theme_uri; ?>/vendor/requirejs/require.js"></script>
</head>
<body <?php body_class(); ?>>
    <div class="container content-container">
		<div class="header clearfix">
            <h1 class="logo">
                <a href="<?php echo site_url('/'); ?>">Integrity House</a>
            </h1>
            <div id="rightside">
                <div class="rightside-mob">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="donate-form">
                        <input type="hidden" name="cmd" value="_donations">
                        <input type="hidden" name="business" value="msmith@integrityhouse.org">
                        <input type="hidden" name="lc" value="US">
                        <input type="hidden" name="item_name" value="INTEGRITY HOUSE">
                        <input type="hidden" name="no_note" value="0">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
                        <button id="donate-btn" class="button" type="submit"><div id="donate">Donate</div></button>
                    </form>
                    <a href="<?php echo $integrity_house['cta_ask_for_help']; ?>" class="button" id="ask-for-help-btn">
                        <div id="ask">Ask<br />For</div>
                        <div id="help">HELP</div>
                    </a>

                </div>
            </div><!-- End rightside -->


		
    		<div class="container clearfix" id="main-navigation">

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main_nav',
                    'fallback_cb'    => false,
                    'menu_class'     => 'main-nav',
                    'container'      => 'nav',
                    'link_after'     => '<div class="fwd-arrow">&raquo;</div>',
                ));
                ?>
                <div id="indicator"></div>
                <div id="search" class="clearfix">
                <?php get_search_form(); ?>
                 <div class="social-mob">
                    <?php
                    $is_email       = strpos($integrity_house['contact_email'], '@');
                    $contact_href   = $is_email ? 'mailto:' : '';
                    $contact_href  .= $integrity_house['contact_email'];
                    ?>
                    
                    
                        <a href="<?php echo $integrity_house['facebook']; ?>"><img src="<?php echo $theme_uri; ?>/images/facebook-icon.png"><span>Facebook</span></a>
                    
                    
                        <a href="<?php echo $integrity_house['twitter']; ?>"><img src="<?php echo $theme_uri; ?>/images/twitter-icon.png"><span>Twitter</span></a>
                    
                    
                </div>
            
            </div>
                
    		</div> <!-- End  -->
        </div>
    </div> <!-- End container -->








<?php // vim: set ts=4 sw=4 expandtab : ?>
