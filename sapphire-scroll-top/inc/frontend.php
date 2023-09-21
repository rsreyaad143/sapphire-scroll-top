<?php
/**
 * Frontend file
 *
 * @package sapphire-scroll-top
 */

/**
 * JS script file include for frontend.
 *
 * @return void
 */
function sapphire_plugin_custom_js() {
	wp_enqueue_script( 'plugin_custom_js', SSTOP_ASSETS . 'js/plugin-option.js', array( 'jquery' ), SSTOP_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'sapphire_plugin_custom_js' );



if ( ! function_exists( 'sapphire_sstop_output' ) ) {
	/**
	 * Method sapphire_sstop_output
	 *
	 * @return void
	 */
	function sapphire_sstop_output() {

		?>
		<div class="sapphire-scroll-to-top">
			<a href="#"><span class="dashicons dashicons-arrow-up-alt2"></span></a>
		</div>

		<style>
			.sapphire-scroll-to-top {
				display: none;
				position: fixed;
				right: 30px;
				bottom: 30px;
				z-index: 9999;
				background-color: <?php echo esc_attr( get_option( 'sphr_st_icon_bg_color', '#000' ) ); ?>;
				padding-top: 8px;
				padding-right: 10px;
				padding-bottom: 8px;
				padding-left: 10px;
				border-radius: 4px;
				cursor: pointer;
			}

			.sapphire-scroll-to-top a {
				text-decoration: none;
				color: <?php echo esc_attr( get_option( 'sphr_st_icon_color', '#fff' ) ); ?>;
			}
		</style>
		<?php
	}
}

add_action( 'wp_footer', 'sapphire_sstop_output', 99 );
