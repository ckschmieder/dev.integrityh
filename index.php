<?php
/**
 * Template Name: Page - Index
 */
get_header(); ?>

<div class="wrapper">
  	<div class="container">
    	<div id="main-content">
      		<h1 class="page-title"><?php the_title(); ?></h1> 
            
			<?php if( have_posts() ) : ?>

			<?php while( have_posts() ) : the_post(); ?>
            <?php $args = array(
                'posts_per_page'   => 5,
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish',
                );
            ?>
				<?php get_template_part( 'post-meta-page' ); ?>

                <ul>
                    <?php
                    $theposts = get_posts( $args );
                    foreach ( $theposts as $post ) : setup_postdata( $post );
                    ?>
                    <li>
                        <?php if( has_post_thumbnail('blog-thumbnail') ) : 
                            the_post_thumbnail( 'blog-thumbnail' );
                        ?>
                        <?php endif; ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                    </li>
                    
                    <?php endforeach; 
                    wp_reset_postdata();?>

                </ul>

                <!-- This code was here when I moved in -->
				<!-- <div class="post-entry">
					<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_title(); ?>
						</a>
					<?php endif; ?>
					<?php the_content( __( 'Read more &#8250;', '' ) ); ?>
					<?php wp_link_pages( array(
					'before' => '<div class="pagination">' . __( 'Pages:' ),
					'after'  => '</div>' ) ); ?>
				</div> -->
				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>

				<?php
				endwhile; else :

				get_template_part( 'loop-no-posts' );

				endif;
				?>

    	</div> <!-- End main-content -->
    	<?php get_sidebar(); ?>
  	</div> <!-- End container -->
</div> <!-- End wrapper -->


<?php get_footer(); ?>


<?php // vim: set ts=4 sw=4 expandtab : ?>

