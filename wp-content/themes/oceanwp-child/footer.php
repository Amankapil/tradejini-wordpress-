<?php
/**
 * The template for displaying the footer.
 *
 * @package OceanWP WordPress theme
 */

?>
<section class="invest container-fluid">       
        <div class="invest-bg">
                <div class="invest-content">
                	<h2>Start investing now!</h2>
                    <p class="relative">
                        Account opening in less than
                        <span style="font-weight:600;">
                            5
                        </span>
                        <span id="word1"
                            style="position: absolute; top: 48%; left: 84%; transform: translate(-50%, -50%); opacity: 0;font-weight:600;">minutes</span>
                        <span id="word2"
                            style="position: absolute; top: 48%; left: 81%; transform: translate(-50%, -50%); opacity: 0; font-weight:600;">steps</span>
                    </p>
                </div>

                <div class="button_signup">
                    <a href="https://pre-prod.tradejini.com/open-account/"><button class="signupp text-black">
                        <span> Sign up </span>
                    </button></a>
                </div>       
        </div>
</section>
	</main><!-- #main -->
    
	<?php do_action( 'ocean_after_main' ); ?>
	<div class="container" id="top-footer">
		<?php dynamic_sidebar( 'top_footer_one' ); ?>
		<?php dynamic_sidebar( 'top_footer_two' ); ?>
		<?php dynamic_sidebar( 'top_footer_three' ); ?>
		<?php dynamic_sidebar( 'top_footer_four' ); ?>
	</div>
	<?php do_action( 'ocean_before_footer' ); ?>

	<?php
	// Elementor `footer` location.
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		?>

		<?php do_action( 'ocean_footer' ); ?>

	<?php } ?>

	<?php do_action( 'ocean_after_footer' ); ?>
	

</div><!-- #wrap -->

<?php do_action( 'ocean_after_wrap' ); ?>

</div><!-- #outer-wrap -->

<?php do_action( 'ocean_after_outer_wrap' ); ?>

<?php
// If is not sticky footer.
if ( ! class_exists( 'Ocean_Sticky_Footer' ) ) {
	get_template_part( 'partials/scroll-top' );
}
?>

<?php
// Search overlay style.
if ( 'overlay' === oceanwp_menu_search_style() ) {
	get_template_part( 'partials/header/search-overlay' );
}
?>

<?php
// If sidebar mobile menu style.
if ( 'sidebar' === oceanwp_mobile_menu_style() ) {

	// Mobile panel close button.
	if ( get_theme_mod( 'ocean_mobile_menu_close_btn', true ) ) {
		get_template_part( 'partials/mobile/mobile-sidr-close' );
	}
	?>

	<?php
	// Mobile Menu (if defined).
	get_template_part( 'partials/mobile/mobile-nav' );
	?>

	<?php
	// Mobile search form.
	if ( get_theme_mod( 'ocean_mobile_menu_search', true ) ) {
		ob_start();
		get_template_part( 'partials/mobile/mobile-search' );
		echo ob_get_clean();
	}
}
?>

<?php
// If full screen mobile menu style.
if ( 'fullscreen' === oceanwp_mobile_menu_style() ) {
	get_template_part( 'partials/mobile/mobile-fullscreen' );
}
?>
<div class="sticked">
        <img src="https://codelinear.com/tradejini/wp-content/uploads/2023/07/add-user-1.svg" alt="">
        <div class="funkhide flex">
            <button class="loginfixed  mx-4">
                <a target="_blank" href="https://cubeplus.tradejini.com/auth/login">Login</a>
            </button>
            <button>
                <a href="https://pre-prod.tradejini.com/open-account/">Sign up now</a>
            </button>
        </div>
</div>
<?php wp_footer(); ?>

<script>
  $(document).ready(function () {
    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();
    
    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth <= 767) {
            //alert("Mobile")
			$('#slick1').slick({
                rows: 2,
            dots: false,
            autoplay: true,
                arrows: false,
                infinite: true,
                speed: 100,
                slidesToShow: 1,
                slidesToScroll: 1,
                loop:true
        });
        }
        else
        {
            //alert("desktop")
			$('#slick1').slick({
                rows: 2,
               dots: false,
                autoplay: true,
                arrows: false,
                infinite: true,
                speed: 100,
                slidesToShow: 3,
                slidesToScroll: 1,
                loop:true
        });
        
        
        // Add event handlers for mouseenter and mouseleave
$('#slick1').on('mouseenter', function() {
    $(this).slick('slickPause'); // Pause the autoplay when mouse enters the carousel
}).on('mouseleave', function() {
    $(this).slick('slickPlay'); // Resume the autoplay when mouse leaves the carousel
});
        }
    }
});
</script>
<script>
		$(document).ready(function () {
			$(document).foundation();
		});

$(document).ready(function(){
  $(".div-hide-show").hide();
  $("#charge-list").click(function(){
    $(".cal-show-hide").hide();
	$("#charge-list").hide();
	$(".div-hide-show").show();
  });
});

$(document).ready(function () {
$('.asr-filter-div li:first').addClass('active');
const bulletContainer1 = document.querySelector(".bullet-container");
const bulletEffect1 = document.querySelector(".bullet-effect");
const bulletItems1 = bulletEffect1.querySelectorAll("li");
const bulletContainerWidth1 = bulletContainer1.offsetWidth;

let totalWidth1 = 0;
bulletItems1.forEach((item) => {
  totalWidth1 += item.offsetWidth + parseInt(getComputedStyle(item).marginRight);
});

if (totalWidth1 > bulletContainerWidth1) {
  const cloneItems1 = bulletEffect1.innerHTML;
  bulletEffect1.innerHTML += cloneItems1;
}

gsap.to(".bullet-effect", {
  x: `-=${totalWidth1}px`,
  duration: 35,
  ease: "linear",
  repeat: -1,
});
});
</script>
  
</body>
</html>
