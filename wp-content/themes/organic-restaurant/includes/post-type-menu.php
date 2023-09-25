<?php
// Adding Custom Post Type : Menu
add_action('init', 'menu_register');
function menu_register() {
	$labels = array(
		'name'				=> _x( 'Food Menu', 'Food Menu', 'organic-restaurant' ),
		'singular_name'		=> _x( 'Menu Item', 'Menu Item', 'organic-restaurant' ),
		'add_new'			=> _x( 'Add Menu Item', 'Menu Listing', 'organic-restaurant' ),
		'add_new_item'		=> esc_html__( 'Add Menu Item', 'organic-restaurant' ),
		'edit_item'			=> esc_html__( 'Edit Menu Item', 'organic-restaurant' ),
		'new_item'			=> esc_html__( 'New Menu Item', 'organic-restaurant' ),
		'view_item'			=> esc_html__( 'View Menu Item', 'organic-restaurant' ),
		'search_items'		=> esc_html__( 'Search Menu Items', 'organic-restaurant' ),
		'not_found'			=> esc_html__( 'Nothing found', 'organic-restaurant' ),
		'not_found_in_trash'=> esc_html__( 'Nothing found in Trash', 'organic-restaurant' ),
		'parent_item_colon'	=> ''
	);

	$args = array(
		'labels'			=> $labels,
		'public'			=> true,
		'menu_position' 	=> 5,
		'menu_icon' 		=> '',
		'exclude_from_search'=> true,
		'show_ui'			=> true,
		'capability_type'	=> 'post',
		'show_in_nav_menus' => false,
		'hierarchical'		=> false,
		'rewrite'			=> array( 'with_front' => false ),
		'query_var'			=> true,
		'supports'			=> array('title', 'excerpt', 'thumbnail'),
		'has_archive' 		=> true,
	);
	register_post_type( 'menu' , $args );

	// Initialize New Taxonomy Labels
	$labels = array(
		'name' 				=> _x( 'Categories', 'Categories', 'organic-restaurant' ),
		'singular_name' 	=> _x( 'Category', 'Category', 'organic-restaurant' ),
		'search_items' 		=> esc_html__( 'Search Categories', 'organic-restaurant' ),
		'all_items' 		=> esc_html__( 'All Categories', 'organic-restaurant' ),
		'parent_item' 		=> esc_html__( 'Parent Category', 'organic-restaurant' ),
		'parent_item_colon' => esc_html__( 'Parent Category:', 'organic-restaurant' ),
		'edit_item' 		=> esc_html__( 'Edit Categories', 'organic-restaurant' ),
		'update_item' 		=> esc_html__( 'Update Category', 'organic-restaurant' ),
		'add_new_item' 		=> esc_html__( 'Add New Category', 'organic-restaurant' ),
		'new_item_name' 	=> esc_html__( 'New Category Name', 'organic-restaurant' ),
	);
	// Custom taxonomy for menu categories
	register_taxonomy('category-menu', array('menu'), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'category-menu' ),
	));
}

// Custom dashboard icon
function menu_font_admin_init() {
   wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/organic-shortcodes/css/font-awesome.css', array(), '1.0' );
}
add_action('admin_init', 'menu_font_admin_init');

function add_menu_icons_styles(){
	?>

	<style>
		#adminmenu .menu-icon-menu div.wp-menu-image:before {
			font-family: 'FontAwesome';
			content: '\f0f5';
		}
	</style>

	<?php
	}
add_action( 'admin_head', 'add_menu_icons_styles' );

// Default title text
function menu_title( $title ){
    $screen = get_current_screen();
    if ( 'menu' == $screen->post_type ) {
        $title = 'Menu Item Title';
    }
    return $title;
}
add_filter( 'enter_title_here', 'menu_title' );

// Adding Custom Meta Information
add_action('add_meta_boxes', 'menu_add_custom_box');
function menu_add_custom_box() {
    add_meta_box('menu_info', 'Menu Item Information', 'menu_box', 'menu', 'normal', 'high');
}

function menu_box() {
	$menu_price = '';
    if ( isset($_REQUEST['post']) ) {
        $menu_price = get_post_meta((int)$_REQUEST['post'],'menu_price',true);
    }
?>

<style>
	#menu_info div {
		margin-bottom: 10px;
		}
	#menu_info label {
		padding-bottom: 4px;
		}
</style>

<div id="menu_info">

<div>
<label for="menu_price"><?php esc_html_e("Menu Item Price", 'organic-restaurant'); ?></label>
<input id="menu_price" class="widefat" name="menu_price" value="<?php echo $menu_price; ?>" type="text">
</div>

</div>

<?php
}
add_action('save_post','menu_save_meta');
function menu_save_meta($postID) {
    if ( is_admin() ) {
        if ( isset($_POST['menu_price']) ) {
            update_post_meta($postID,'menu_price',
                                $_POST['menu_price']);
        }
    }
}
?>
