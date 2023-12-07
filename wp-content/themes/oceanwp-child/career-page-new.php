<?php
/**
 * Template Name: Careers Page
 * The custom career page template file
 */
?>
<?php get_header(); ?>
<div class="banner-container">
  <div class="career-left-container">
    <?php echo get_field("banner_text"); ?>
  </div>
  <?php $bimage = get_field('banner_image'); ?>
  <div class="career-right-container">
    <img class="image2" src="<?php echo esc_url($bimage['url']); ?>" alt="">
  </div>
</div>
<div class="container-fluid" id="careers-container" style="padding-top:100px;">

  <?php
  $custom_args = array(
    'post_type' => 'job',
    'posts_per_page' => '-1'
  );
  $custom_query = new WP_Query($custom_args); ?>
  <?php if ($custom_query->have_posts()): ?>
    <?php
    $i = 1;
    $j = 1;
    ?>
    <div class="job-list-container">
      <div class="job-list-left">
        <?php echo get_field("current_opening"); ?>
        <ul class="art-vmenu">

          <?php
          // Change the category query from here.
          $args = array(
            'taxonomy' => 'job-category',
            'orderby' => 'name',
            'order' => 'ASC',
            "post_type"=>'job'
          );

          $cats = get_categories($args);
          ?>


          <?php foreach ($cats as $cat) { ?>
            <li><span class="l"></span><span class="r"></span>
              <span class="t" data-id= <?php echo $cat->name ?>>
                <?php echo $cat->name ?>
              </span>
            </li>
          <?php } ?>


        </ul>
      </div>
      <div class="job-list-right" id="JobList">
        <!-- the loop -->
        <?php while ($custom_query->have_posts()):
          $custom_query->the_post(); ?>
          <article class="news-post-list">
            <p>
              <storng>
                <?php the_title();
                echo $i . $j ?>
              </storng>
            </p>
            <div class="job-location">
              <?php echo get_field("job_location") ?>
            </div>
            <button class="learnmore" data-open="modal<?php echo $i ?>">Learn More</button>
            <div class="reveal" id="modal<?php echo $i ?>" data-reveal>
              <h2>
                <?php the_title(); ?>
              </h2>
              <div class="job-location">
                <?php echo get_field("job_location") ?>
              </div>
              <?php the_content(); ?>
              <h4>Are you Match?</h4>
              <button class="applybtn" data-open="secondmodal<?php echo $j ?>">Apply Now</button>
              <button class="close-button" data-close type="button"><span aria-hidden="true">×</span></button>
            </div>

            <div class="reveal" id="secondmodal<?php echo $j ?>" data-reveal>
              <h3>
                <?php the_title(); ?>
              </h3>
              <div class="job-location">
                <?php echo get_field("job_location") ?>
              </div>
              <div id="job-ninja-form">
                <?php echo do_shortcode('[ninja_form id=5]'); ?>
              </div>
              <button class="close-button" data-close type="button"><span aria-hidden="true">×</span></button>
            </div>
          </article>
          <?php
          $i++;
          $j++;
          ?>
        <?php endwhile; ?>
        <!-- end of the loop -->

        <?php wp_reset_postdata(); ?>
      </div>
    </div>

  <?php else: ?>
    <p>
      <?php _e('Sorry, no posts matched your criteria.'); ?>
    </p>
  <?php endif; ?>
</div>

<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  jQuery(document).ready(function (jQuery) {
    jQuery('ul.art-vmenu li').click(function (e) {
      const value = jQuery(this).find("span.t").text();
      var trim = jQuery.trim(value);
      gettingJobList(trim)
    });

    // gettingJobList()

  });
  function gettingJobList(categoryValue) {
    $("#overlay").fadeIn(300);　
    jQuery.ajax({
      type: "post",
      dataType: "json",
      url: '<?php echo admin_url('admin-ajax.php') ?>', //this is wordpress ajax file which is already avaiable in wordpress
      data: {
        action: 'get_job_data', //this value is first parameter of add_action
        category: categoryValue
      }
          ,
      success: function (data) {
        jQuery("#overlay").fadeOut(300);
        // alert(JSON.stringify(data));
      },
      error: function (errorThrown) {
        jQuery("#overlay").fadeOut(300);
        jQuery('#JobList').html(errorThrown.responseText)
      }
    
    });
  }
</script>
<style>
  #overlay{	
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
  </style>
<?php get_footer(); ?>