<?php
/*
* Template Name: Jobs List
* description: >-
Page template without sidebar
*/

get_header(); ?>


    <!-- Left jobs category design display -->
    <div>
      <ul class="art-vmenu">

        <?php
        // Change the category query from here.
        $categories = get_categories(
          array(
            'orderby' => 'name',
            'order' => 'ASC'
          )
        ); ?>

        <?php foreach ($categories as $category) { ?>
          <li><span class="l"></span><span class="r"></span>
            <span class="t">
              <?php echo $category->name ?>
            </span>
          </li>
          <li><span class="l"></span><span class="r"></span>
            <span class="t">Create User</span>
          </li>
          <li><span class="l"></span><span class="r"></span>
            <span class="t">List Users</span>
          </li>
          <li><span class="l"></span><span class="r"></span>
            <span class="t">Admin</span>
          </li>

        <?php } ?>


      </ul>
    </div>
    <!-- Right content jobs list design display -->
    <div>
      <!-- Ajax response content loading -->
      <div id="JobList"></div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      jQuery(document).ready(function (jQuery) {
        jQuery('ul.art-vmenu li').click(function (e) {
          alert(jQuery(this).find("span.t").text());
          const value = jQuery(this).find("span.t").text()
          gettingJobList(value)
        });

        gettingJobList()

      });
      function gettingJobList(category) {
        jQuery.ajax({
          type: "post",
          dataType: "json",
          url: '<?php echo admin_url('admin-ajax.php') ?>', //this is wordpress ajax file which is already avaiable in wordpress
          data: {
            action: 'get_job_data', //this value is first parameter of add_action
            category: category
          },
          success: function (msg) {
            jQuery("#JobList").html(msg)
          }
        });
      }
    </script>
<?php get_footer(); ?>