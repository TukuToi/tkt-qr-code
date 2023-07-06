<?php
/**
 * Plugin Name: TKT QR Code
 * Plugin URI: https://www.tukutoi.com
 * Description: This plugin generates QR codes
 * Version: 1.0
 * Author: TukuToi Co Ltd
 * Author URI: https://www.tukutoi.com
 * License: GPL3
 */

require_once plugin_dir_path( __FILE__ ) . 'phpqrcode/qrlib.php';

/**
 * Generates a QR code image based on the given shortcode attributes.
 *
 * Takes in an array $atts of attributes as a parameter, which can include the size and post ID.
 * If no size or post ID is provided, default values are used.
 * Extracts the post ID and size from the attributes array and sanitizes them to ensure they are valid integers.
 * Constructs the URL for the QR code by appending the post ID to the current site URL.
 * The URL is sanitized to remove any potentially harmful characters.
 * Defines the directory where the QR code images will be stored.
 * Constructs the filename for the specific QR code image based on the post ID.
 * If the QR code image file does not already exist, it generates it and saves it to the specified file location.
 * Constructs the URL for the QR code image file and returns an HTML image tag with the specified height and width.
 *
 * @since First implemented 2023-07-06 10:48
 * @author Beda Schmid <beda@tukutoi.com>
 * @param  array $atts The ShortCode attributes.
 * @return mixed The Image HTML tag
 */
function qr_code_func( $atts ) {
	// Extract shortcode attributes.
	$atts = shortcode_atts(
		array(
			'size'    => '150', // Default size.
			'post_id' => get_the_ID(), // Default post ID.
		),
		$atts,
		'qr_code' // Shortcode tag.
	);

	$post_id = absint( $atts['post_id'] );
	$size    = absint( $atts['size'] );

	$url = esc_url_raw( trailingslashit( get_site_url() ) . '?p=' . $post_id );

	$qr_dir   = plugin_dir_path( __FILE__ ) . '/qrcodes/';
	$filename = $qr_dir . 'post_' . $post_id . '.png';

	// Check if the file exists.
	if ( ! file_exists( $filename ) ) {
		// Create the QR code.
		QRcode::png( $url, $filename, 'L', 10, 2 );
	}

	// Return the image tag.
	$qr_url = esc_url_raw( plugin_dir_url( __FILE__ ) . '/qrcodes/post_' . $post_id . '.png' );
	return '<img src="' . $qr_url . '" height="' . $size . '" width="' . $size . '">';
}
add_shortcode( 'qr_code', 'qr_code_func' );
