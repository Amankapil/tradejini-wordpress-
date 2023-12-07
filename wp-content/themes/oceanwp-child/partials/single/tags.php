<?php
/**
 * Blog single tags
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Display tags. ?>
<div class="post-tags clr">
	<div class="tag-title">Tags</div>
	<span class="rela-tags"><?php the_tags( '', ' '); ?></span>	
</div>
