<?php

/*-----------------------------------------------------------------------------------------------------//
/*	Theme Setup
/*-----------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'restaurant_setup' ) ) :

function restaurant_setup() {

	// Make theme available for translation
	load_theme_textdomain( 'organic-restaurant', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'restaurant-featured-large', 2400, 1800 ); // Large Featured Image
	add_image_size( 'restaurant-featured-medium', 1800, 1200 ); // Medium Featured Image
	add_image_size( 'restaurant-featured-small', 640, 640 ); // Small Featured Image

	// Create Menus
	register_nav_menus( array(
		'header-menu' => esc_html__( 'Header Menu', 'organic-restaurant' ),
		'social-menu' => esc_html__( 'Social Menu', 'organic-restaurant' ),
	));

	// Custom Header
	$defaults = array(
		'width'                 => 1800,
		'height'                => 600,
		'flex-height'           => true,
		'flex-width'            => true,
		'default-text-color'    => '333333',
		'header-text'           => false,
		'uploads'               => true,
	);
	add_theme_support( 'custom-header', $defaults );

	// Custom Background
	$defaults = array(
		'default-color'          => 'edead6',
		'default-image'          => get_template_directory_uri() . '/images/background.png',
	);
	add_theme_support( 'custom-background', $defaults );
}
endif; // restaurant_setup
add_action( 'after_setup_theme', 'restaurant_setup' );

/*-----------------------------------------------------------------------------------------------------//
	Theme Updater
-------------------------------------------------------------------------------------------------------*/

function restaurant_theme_updater() {
	require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'restaurant_theme_updater' );

/*-----------------------------------------------------------------------------------------------------//
	Category ID to Name
-------------------------------------------------------------------------------------------------------*/

function restaurant_tax_id_to_name( $id ) {
	$term = get_term( $id, 'category-menu' );
	if ( is_wp_error( $term ) )
		return false;
	return $name = $term->name;
}

/*-----------------------------------------------------------------------------------------------------//
	Register Scripts
-------------------------------------------------------------------------------------------------------*/

if( !function_exists('restaurant_enqueue_scripts') ) {
	function restaurant_enqueue_scripts() {

		// Enqueue Styles
		wp_enqueue_style( 'restaurant-style', get_stylesheet_uri() );
		wp_enqueue_style( 'restaurant-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'restaurant-style' ), '1.0' );

		// Resgister Scripts
		wp_register_script( 'restaurant-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '20130729' );
		wp_register_script( 'restaurant-hover', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '20130729' );
		wp_register_script( 'restaurant-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'restaurant-hover' ), '20130729' );
		wp_register_script( 'restaurant-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array( 'jquery' ), '20130729' );

		// Enqueue Scripts
		wp_enqueue_script( 'restaurant-html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
		wp_enqueue_script( 'restaurant-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130729', true );
		wp_enqueue_script( 'restaurant-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'restaurant-superfish', 'restaurant-fitvids', 'restaurant-isotope', 'jquery-masonry' ), '20130729', true );

		// IE Conditional Scripts
		global $wp_scripts;
		$wp_scripts->add_data( 'restaurant-html5shiv', 'conditional', 'lt IE 9' );

		// Load Flexslider on front page and slideshow page template
		if ( is_home() || is_front_page() || is_single() || is_page_template('template-slideshow.php') || is_page_template('template-blog.php') ) {
			wp_enqueue_script( 'restaurant-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '20130729' );
		}

		// Load single scripts only on single pages
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    	wp_enqueue_script( 'comment-reply' );
	    }
	}
}
add_action('wp_enqueue_scripts', 'restaurant_enqueue_scripts');

/*-----------------------------------------------------------------------------------------------------//
	Register Sidebars
-------------------------------------------------------------------------------------------------------*/

function organic_widgets_init() {
	register_sidebar(array(
		'name'=> esc_html__( "Page Sidebar", 'organic-restaurant' ),
		'id' => 'page-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> esc_html__( "Blog Sidebar", 'organic-restaurant' ),
		'id' => 'blog-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> esc_html__( "Post Sidebar", 'organic-restaurant' ),
		'id' => 'post-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> esc_html__( "Left Sidebar", 'organic-restaurant' ),
		'id' => 'left-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> esc_html__( "Footer Widgets", 'organic-restaurant' ),
		'id' => 'footer',
		'before_widget'=>'<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
}
add_action( 'widgets_init', 'organic_widgets_init' );

/*-----------------------------------------------------------------------------------------------------//
	Add Stylesheet To Visual Editor
-------------------------------------------------------------------------------------------------------*/

add_action( 'init', 'restaurant_add_editor_styles' );
/**
* Apply theme's stylesheet to the visual editor.
*
* @uses add_editor_style() Links a stylesheet to visual editor
* @uses get_stylesheet_uri() Returns URI of theme stylesheet
*/
function restaurant_add_editor_styles() {
	add_editor_style( 'css/style-editor.css' );
}

/*----------------------------------------------------------------------------------------------------//
/*	Content Width
/*----------------------------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Adjust content_width value based on the presence of widgets
 */
function restaurant_content_width() {
	if ( ! is_active_sidebar( 'post-sidebar' ) || is_active_sidebar( 'page-sidebar' ) || is_active_sidebar( 'blog-sidebar' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'restaurant_content_width' );

/*-----------------------------------------------------------------------------------------------------//
	Comments Function
-------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'restaurant_comment' ) ) :
function restaurant_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'organic-restaurant' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'organic-restaurant' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default :
	?>
	<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 48;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'organic-restaurant' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s', 'organic-restaurant' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
				</div><!-- .comment-author .vcard -->
			</footer>

			<div class="comment-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'organic-restaurant' ); ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'organic-restaurant' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
				<?php edit_comment_link( esc_html__( 'Edit', 'organic-restaurant' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		</article><!-- #comment-## -->

	<?php
	break;
	endswitch;
}
endif; // ends check for restaurant_comment()

/*-----------------------------------------------------------------------------------------------------//
	Comments Disabled On Pages By Default
-------------------------------------------------------------------------------------------------------*/

function restaurant_default_comments_off( $data ) {
    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'restaurant_default_comments_off' );

/*-----------------------------------------------------------------------------------------------------//
	Custom Excerpt Length
-------------------------------------------------------------------------------------------------------*/

function restaurant_excerpt_length( $length ) {
	return 38;
}
add_filter( 'excerpt_length', 'restaurant_excerpt_length', 999 );

function restaurant_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. esc_html__('Read More', 'organic-restaurant') .'</a>';
}
add_filter('excerpt_more', 'restaurant_excerpt_more');

/*-----------------------------------------------------------------------------------------------------//
	Add Excerpt To Pages
-------------------------------------------------------------------------------------------------------*/

add_action( 'init', 'restaurant_add_excerpts_to_pages' );
function restaurant_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/*-----------------------------------------------------------------------------------------------------//
/*	Pagination Function
/*-----------------------------------------------------------------------------------------------------*/

function restaurant_get_pagination_links() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'prev_text' => esc_html__('&laquo;', 'organic-restaurant'),
		'next_text' => esc_html__('&raquo;', 'organic-restaurant'),
		'total' => $wp_query->max_num_pages
	) );
}

/*-----------------------------------------------------------------------------------------------------//
/*	Custom Page Links
/*-----------------------------------------------------------------------------------------------------*/

function restaurant_wp_link_pages_args_prevnext_add($args) {
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number')
        return $args;

    $args['next_or_number'] = 'number'; // Keep numbering for the main part
    if (!$more)
        return $args;

    if($page-1) // There is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';

    if ($page<$numpages) // There is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after'];

    return $args;
}

add_filter('wp_link_pages_args', 'restaurant_wp_link_pages_args_prevnext_add');

/*-----------------------------------------------------------------------------------------------------//
	Featured Video Meta Box
-------------------------------------------------------------------------------------------------------*/

add_action("admin_init", "admin_init_featurevid");
add_action('save_post', 'save_featurevid');

function admin_init_featurevid(){
	add_meta_box("featurevid-meta", esc_html__("Featured Video Embed Code", 'organic-restaurant'), "meta_options_featurevid", "post", "normal", "high");
}

function meta_options_featurevid(){
	global $post;
	$custom = get_post_custom($post->ID);
	$featurevid = isset( $custom["featurevid"] ) ? esc_attr( $custom["featurevid"][0] ) : '';

	echo '<textarea name="featurevid" cols="60" rows="4" style="width:97.6%" />'.$featurevid.'</textarea>';
}

function save_featurevid($post_id){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if ( isset($_POST["featurevid"]) ) {
		update_post_meta($post->ID, "featurevid", $_POST["featurevid"]);
	}
}

/*-----------------------------------------------------------------------------------------------------//
	Remove First Gallery
-------------------------------------------------------------------------------------------------------*/

function restaurant_remove_gallery($content) {

    if ( is_page_template('template-slideshow.php') ) {
        $content = preg_replace('/\[gallery(.*?)ids=[^\]]+\]/', '', $content, 1);
        }
    return $content;
}
add_filter( 'the_content', 'restaurant_remove_gallery');

/*-----------------------------------------------------------------------------------------------------//
	Add Home Link To Custom Menu
-------------------------------------------------------------------------------------------------------*/

function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter('wp_page_menu_args', 'home_page_menu_args');

/*-----------------------------------------------------------------------------------------------------//
	Strip inline width and height attributes from WP generated images
-------------------------------------------------------------------------------------------------------*/

function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
	}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

/*-----------------------------------------------------------------------------------------------------//
	Body Class
-------------------------------------------------------------------------------------------------------*/

function restaurant_body_class( $classes ) {
	if ( is_singular() )
		$classes[] = 'restaurant-singular';

	if ( is_active_sidebar( 'right-sidebar' ) )
		$classes[] = 'restaurant-right-sidebar';

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'restaurant-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ) ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'restaurant-relative-text';
	}

	return $classes;
}
add_action( 'body_class', 'restaurant_body_class' );

/*---------------------------------------------------------------------------------------------//
	Retrieve email value from Customizer and add mailto protocol
/*---------------------------------------------------------------------------------------------*/

function restaurant_get_email_link() {
	$email = get_theme_mod( 'restaurant_link_email' );

	if ( ! $email )
		return false;

	return 'mailto:' . sanitize_email( $email );
}

/*-----------------------------------------------------------------------------------------------------//
	Filters wp_title to print a neat <title> tag based on what is being viewed.
-------------------------------------------------------------------------------------------------------*/

function restaurant_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'organic-restaurant' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'restaurant_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------------------------//
	Includes
-------------------------------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/includes/customizer.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );
require_once( get_template_directory() . '/includes/post-type-menu.php');
require_once( get_template_directory() . '/includes/woocommerce-setup.php' );
include_once( get_template_directory() . '/organic-shortcodes/organic-shortcodes.php' );
