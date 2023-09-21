<?php
/**
 * Sapphire Scroll Top - inc.
 *
 * @package sapphire-scroll-top
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * This funciton to add plugin menu in settings page.
 *
 * @return void
 */
function sapphire_scroll_top_callback() {
	add_submenu_page( 'options-general.php', 'Sapphire Scroll To Top', 'Sapphire Scroll Top', 'manage_options', 'sapphire_scroll_top', 'sapphire_admin_scroll_top', 99 );
}

add_action( 'admin_menu', 'sapphire_scroll_top_callback' );


/**
 * This function to enqueue asset in plugin admin page.
 *
 * @param mixed $hook page slug.
 *
 * @return void
 */
function sapphire_load_scripts_callback( $hook ) {
	if ( 'settings_page_sapphire_scroll_top' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'wp-color-picker' );

	wp_enqueue_script( 'sp-admin-js', SSTOP_ASSETS . 'js/admin-option.js', array( 'jquery', 'wp-color-picker' ), SSTOP_VERSION, true );
}

add_action( 'admin_enqueue_scripts', 'sapphire_load_scripts_callback' );

/**
 * Show plugin page html.
 *
 * @return void
 */
function sapphire_admin_scroll_top() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Sapphire Scroll To Top Option', 'sstop' ); ?></h1>
		<form action="options.php" method="post">
			
			<?php settings_fields( 'sapphire_scroll_top' ); ?>

			<?php do_settings_sections( 'sapphire_scroll_top' ); ?>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Register section and fields to plugin page.
 *
 * @return void
 */
function sapphire_scroll_top_init() {
	// register a new section in the "sapphire_scroll_top" page.
	add_settings_section( 'sphr_section_settings', 'Icon Settings', 'sphr_st_settings_callback', 'sapphire_scroll_top' );

	// register a new field in the "sphr_section_settings" section, inside the "sapphire_scroll_top" page.
	add_settings_field( 'sphr_st_icon_color', 'Icon Color', 'sphr_icon_color_callback', 'sapphire_scroll_top', 'sphr_section_settings' );

	// Register a new settings for sapphire_scroll_top page.
	register_setting( 'sapphire_scroll_top', 'sphr_st_icon_color' );

	// register a new field in the "sphr_section_settings" section, inside the "sapphire_scroll_top" page.
	add_settings_field( 'sphr_st_icon_bg_color', 'Icon Background Color', 'sphr_icon_bg_color_callback', 'sapphire_scroll_top', 'sphr_section_settings' );

	// Register a new settings for Sapphire scroll top settings page.
	register_setting( 'sapphire_scroll_top', 'sphr_st_icon_bg_color' );
}
add_action( 'admin_init', 'sapphire_scroll_top_init' );

/**
 * The sphr_st_settings_callback function.
 *
 * @return void
 */
function sphr_st_settings_callback() {
	echo '<p>Set the icon settings as your wish.</p>';
}



/**
 * The sphr_icon_color_callback function.
 *
 * @return void
 */
function sphr_icon_color_callback() {
	$sphr_st_icon_color = get_option( 'sphr_st_icon_color', '#000000' );
	?>
	<input type="text" name="sphr_st_icon_color" id="sphr_st_icon_color" value="<?php echo esc_attr( $sphr_st_icon_color ); ?>"  class="small-text" />
	<?php
}

/**
 * The sphr_icon_bg_color_callback funtion.
 *
 * @return void
 */
function sphr_icon_bg_color_callback() {
	$sphr_st_icon_bg_color = get_option( 'sphr_st_icon_bg_color', '#ffffff' );
	?>
	<input type="text" name="sphr_st_icon_bg_color" id="sphr_st_icon_bg_color" value="<?php echo esc_attr( $sphr_st_icon_bg_color ); ?>"  class="small-text" />
	<?php
}


