<?php
/**
 * Template Name: Page - 404 Page
 */
get_header(); ?>

<div class="wrapper">
    <div class="container">
        <div id="main-content">
            <h1 class="page-title"><?php the_title(); ?></h1> 

            <div class="error-page">
                <div class="sorry clearfix">
                    Sorry!
                </div>
                <div class="error-message">
                    <h3>The Page you were looking for could not be found</h3>
                    <div class="search clearfix">search</div>
                </div>
            </div>

        </div> <!-- End main-content -->
        <?php get_sidebar(); ?>
    </div> <!-- End container -->
</div> <!-- End wrapper -->


<?php get_footer(); ?>


<?php // vim: set ts=4 sw=4 expandtab : ?>