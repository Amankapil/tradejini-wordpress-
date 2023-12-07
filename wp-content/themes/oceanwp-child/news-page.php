<?php
    /**
     * Template Name: News Page
     * The custom news page template file
     */
 ?>
<?php get_header(); ?>
<div id="news-banner">
<h1>At your nearest tea stall</h1>
</div>
<div class="container" id="news-container">
    <?php 
 
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

      $custom_args = array(
          'post_type' => 'news',
          'posts_per_page' => 12,
          'paged' => $paged
        );

      $custom_query = new WP_Query( $custom_args ); ?>

      <?php if ( $custom_query->have_posts() ) : ?>
      
        <!-- the loop -->
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
          <article class="news-post-list">
              <div class="row">
              <div class="col-md-6">
            <div class="news-post-img">
            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');  
                echo '<img src="'.esc_url($featured_img_url).'">';         
            ?>
            </div>
            </div>
            <div class="col-md-6">
            <div class="news-content">
                <h2><?php the_title(); ?></h2>
                <div class="post-meta"><span class="meta-author"<?php oceanwp_schema_markup( 'author_name' ); ?>><span class="screen-reader-text"><?php esc_html_e( 'Post author:', 'oceanwp' ); ?></span><span class="gray-circle"></span><?php echo esc_html( the_author_posts_link() ); ?></span>
                <span class="meta-date"<?php oceanwp_schema_markup( 'publish_date' ); ?>><span class="screen-reader-text"><?php esc_html_e( 'Post published:', 'oceanwp' ); ?></span><?php echo get_the_date(); ?></span>
                </div>
                <div class="content">
                <?php the_excerpt(); ?>
                </div>
            </div>
            </div>
            </div>
            <div class="read-more">Read More:<a target="_blank" href="<?php echo get_field('news-link'); ?>"><?php the_title(); ?></a></div>
          </article>
        <?php endwhile; ?>
        <!-- end of the loop -->

        <!-- pagination here -->
        <?php
          if (function_exists('custom_pagination')) {
            custom_pagination($custom_query->max_num_pages,"",$paged);
          }
        ?>

      <?php wp_reset_postdata(); ?>

      <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
      </div>
    <?php get_footer(); ?>