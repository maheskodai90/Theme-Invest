<?php
/**
 *  Jigoshop Functions for Capital theme
 */

function northarc_capital_open_jigoshop_content_wrappers() {
	echo '<div id="primary" class="content-area col-sm-12 col-md-8"><main id="main" class="site-main" role="main">';
}

function northarc_capital_close_jigoshop_content_wrappers() {
	echo '</main></div>';
}

function northarc_capital_close_jigoshop_sidebar() {
	echo '</div>';
}

function northarc_capital_prepare_jigoshop_wrappers() {
  remove_action( 'jigoshop_before_main_content', 'jigoshop_output_content_wrapper', 10 );
  remove_action( 'jigoshop_after_main_content', 'jigoshop_output_content_wrapper_end', 10);

  add_action( 'jigoshop_before_main_content', 'northarc_capital_open_jigoshop_content_wrappers', 10 );
  add_action( 'jigoshop_after_main_content', 'northarc_capital_close_jigoshop_content_wrappers', 10 );

  remove_action('jigoshop_after_sidebar', 'jigoshop_get_sidebar_end', 10);
  add_action( 'jigoshop_after_sidebar', 'northarc_capital_close_jigoshop_sidebar', 10 );
}

add_action( 'wp_head', 'northarc_capital_prepare_jigoshop_wrappers' );

?>