<?php
/**
* Google Fonts Implementation
*
* @package Restaurant
* @since Restaurant 4.0
*
*/

/**
* Register Google Fonts
*
* @since Restaurant 4.0
*/

function restaurant_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $oswald = _x( 'on', 'Oswald font: on or off', 'organic-restaurant' );
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'organic-restaurant' );
    $merriweather = _x( 'on', 'Merriweather font: on or off', 'organic-restaurant' );
    $playfair = _x( 'on', 'Playfair font: on or off', 'organic-restaurant' );
    $montserrat = _x( 'on', 'Montserrat font: on or off', 'organic-restaurant' );
    $raleway = _x( 'on', 'Raleway font: on or off', 'organic-restaurant' );

    if ( 'off' !== $oswald || 'off' !== $open_sans || 'off' !== $merriweather || 'off' !== $playfair || 'off' !== $montserrat ) {
        $font_families = array();

        if ( 'off' !== $oswald ) {
            $font_families[] = 'Oswald:400,700,300';
        }

        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,300,600,700,800,800italic,700italic,600italic,400italic,300italic';
        }

        if ( 'off' !== $merriweather ) {
            $font_families[] = 'Merriweather:400,700,300,900';
        }

        if ( 'off' !== $playfair ) {
            $font_families[] = 'Playfair Display:400,400italic,700,700italic,900,900italic';
        }

        if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }

        if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:400,100,200,300,500,600,700,800,900';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}

/**
* Enqueue Google Fonts on Front End
*
* @since Restaurant 4.0
*/

function restaurant_scripts_styles() {
    wp_enqueue_style( 'restaurant-fonts', restaurant_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'restaurant_scripts_styles' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since Restaurant 4.0
*/
function restaurant_custom_header_fonts() {
    wp_enqueue_style( 'restaurant-fonts', restaurant_fonts_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'restaurant_scripts_styles' );

/**
* Add Google Scripts for use with the editor
*
* @since Restaurant 4.0
*/
function restaurant_editor_styles() {
    add_editor_style( array( 'css/style-editor.css', restaurant_fonts_url() ) );
}
add_action( 'after_setup_theme', 'restaurant_editor_styles' );
