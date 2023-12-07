<?php
/*
* Template Name: Category Filter
* description: >-
Page template without sidebar
*/

get_header(); ?>

<div class="container container_filter" style="padding-top: 120px;">

          <div class="filters filter-button-group">
          		  <ul><h4>
          		    <li class="active" data-filter="*">All</li>

                  <?php
                    $terms = get_terms('job-category');
                    foreach ($terms as  $term) { ?>
                      <li data-filter=".<?php  echo $term->slug; ?>"><?php echo $term->name; ?></li>
                <?php  }

                  ?>
          		  </h4></ul>
          		</div>

          		<div class="content grid">
                <?php
                    $args = array(
                      'post_type' => 'job',
                      'posts_per_page' => 8
                    );

                    $query = new WP_Query($args);

                    while ($query->have_posts()) {
                      $query->the_post();

                      $termsArray = get_the_terms($post->ID, 'job-category');

                      $termsSLug = "";
                      foreach ($termsArray as $term) {
                        $termsSLug .= $term->slug . ' ';
                      }

                      ?>

                      <div class="single-content <?php echo  $termsSLug; ?>  grid-item">
                        <?php the_title() ?>
                      </div>

                <?php  }
				  wp_reset_postdata();

                  ?>
                </div>  





            
</div>            
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<script>
$(document).ready( function() {
$('.grid').isotope({
 itemSelector: '.grid-item',
});

// filter items on button click
$('.filter-button-group').on( 'click', 'li', function() {
 var filterValue = $(this).attr('data-filter');
 $('.grid').isotope({ filter: filterValue });
 $('.filter-button-group li').removeClass('active');
 $(this).addClass('active');
});
   })     
</script>
<?php get_footer(); ?>