<?php
/**
 * Poral B2B functions and definitions
 *
 *
 * @package CoDigitalWP
 * @subpackage Poral_B2B
 * @since 1.0
 */

/**
 * Enqueue scripts and styles.
 */
function poral_scripts() {
    // Add custom fonts, used in the main stylesheet.
    //wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

    wp_enqueue_style( 'poralb2b-uikit-style', get_theme_file_uri( '/assets/css/uikit.min.css' ) );
    // Theme stylesheet.
    wp_enqueue_style( 'poralb2b-style', get_stylesheet_uri() );


    wp_enqueue_script( 'poralb2b-uikit-script', get_theme_file_uri( '/assets/js/uikit.min.js' ), array(), '3.0.0-rc.22', true );
    wp_enqueue_script( 'poralb2b-uikit-script', get_theme_file_uri( '/assets/js/uikit-icons.min.js' ), array(), '3.0.0-rc.22', true );

}
add_action( 'wp_enqueue_scripts', 'poral_scripts' );

function get_logo_url(){
    return get_theme_file_uri( '/assets/images/PoralLogo.png' );
}