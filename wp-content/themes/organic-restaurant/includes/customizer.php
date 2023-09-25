<?php
/**
* Theme customizer with real-time update
*
* Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
*
* @package Restaurant
* @since Restaurant 4.0
*/
function restaurant_theme_customizer( $wp_customize ) {

	// Category Dropdown Control
	class Restaurant_Category_Dropdown_Control extends WP_Customize_Control {
	public $type = 'dropdown-categories';

	public function render_content() {
		$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'organic-restaurant' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}

	// Custom Taxonomy Dropdown Control
	class Restaurant_Taxonomy_Dropdown_Control extends WP_Customize_Control {
	public $type = 'dropdown-taxonomy';

	public function render_content() {
		$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'organic-restaurant' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
					'taxonomy' 			=> 'category-menu',
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}


	// Numerical Control
	class Restaurant_Customizer_Number_Control extends WP_Customize_Control {

		public $type = 'number';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
			<?php
		}

	}

	function restaurant_sanitize_categories( $input ) {
		$categories = get_terms( 'category', array('fields' => 'ids', 'get' => 'all') );

	    if ( in_array( $input, $categories ) ) {
	        return $input;
	    } else {
	    	return '';
	    }
	}

	// Sanitize Taxonomies
	function restaurant_sanitize_taxonomies( $input ) {

		$taxonomies = get_terms( 'category-menu', array('fields' => 'ids', 'get' => 'all' ) );

		if ( in_array( $input, $taxonomies ) ) {
			return $input;
		} else {
			return '';
		}
	}

	function restaurant_sanitize_pages( $input ) {
		$pages = get_all_page_ids();

	    if ( in_array( $input, $pages ) ) {
	        return $input;
	    } else {
	    	return '';
	    }
	}

	function restaurant_sanitize_transition_interval( $input ) {
	    $valid = array(
	        '2000' 		=> esc_html__( '2 Seconds', 'organic-restaurant' ),
	        '4000' 		=> esc_html__( '4 Seconds', 'organic-restaurant' ),
	        '6000' 		=> esc_html__( '6 Seconds', 'organic-restaurant' ),
	        '8000' 		=> esc_html__( '8 Seconds', 'organic-restaurant' ),
	        '10000' 	=> esc_html__( '10 Seconds', 'organic-restaurant' ),
	        '12000' 	=> esc_html__( '12 Seconds', 'organic-restaurant' ),
	        '20000' 	=> esc_html__( '20 Seconds', 'organic-restaurant' ),
	        '30000' 	=> esc_html__( '30 Seconds', 'organic-restaurant' ),
	        '60000' 	=> esc_html__( '1 Minute', 'organic-restaurant' ),
	        '999999999'	=> esc_html__( 'Hold Frame', 'organic-restaurant' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	function restaurant_sanitize_transition_style( $input ) {
	    $valid = array(
	        'fade' 		=> esc_html__( 'Fade', 'organic-restaurant' ),
	        'slide' 	=> esc_html__( 'Slide', 'organic-restaurant' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	function restaurant_sanitize_columns( $input ) {
	    $valid = array(
	        'one' 		=> esc_html__( 'One Column', 'organic-restaurant' ),
	        'two' 		=> esc_html__( 'Two Columns', 'organic-restaurant' ),
	        'three' 	=> esc_html__( 'Three Columns', 'organic-restaurant' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	function restaurant_sanitize_align( $input ) {
	    $valid = array(
	        'left' 		=> esc_html__( 'Left Align', 'organic-restaurant' ),
	        'center' 		=> esc_html__( 'Center Align', 'organic-restaurant' ),
	        'right' 	=> esc_html__( 'Right Align', 'organic-restaurant' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	function restaurant_sanitize_title_color( $input ) {
	    $valid = array(
	        'black' 	=> esc_html__( 'Black', 'organic-restaurant' ),
	        'white' 	=> esc_html__( 'White', 'organic-restaurant' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	function restaurant_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	function restaurant_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}

	// Set site name and description text to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';

	// Set site title color to be previewed in real-time
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//-------------------------------------------------------------------------------------------------------------------//
	// Logo Section
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'restaurant_logo_section' , array(
		'title' 	=> esc_html__( 'Logo', 'organic-restaurant' ),
		'description' => esc_html__( 'Logo images have a max-height of 140px.', 'organic-restaurant' ),
		'priority' 	=> 10,
	) );

		// Logo uploader
		$wp_customize->add_setting( 'restaurant_logo', array(
			'default' 	=> get_template_directory_uri() . '/images/logo.png',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'restaurant_logo', array(
			'label' 	=> esc_html__( 'Logo', 'organic-restaurant' ),
			'section' 	=> 'restaurant_logo_section',
			'settings'	=> 'restaurant_logo',
			'priority'	=> 20,
		) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Colors Section
	//-------------------------------------------------------------------------------------------------------------------//

		// Header Color
		$wp_customize->add_setting( 'header_color', array(
		    'default' => '#ffffff',
		    'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
		    'label' => 'Header Background Color',
		    'section' => 'colors',
		    'settings' => 'header_color',
		    'priority'    => 30,
		) ) );

		// Menu Background Color
		$wp_customize->add_setting( 'nav_color', array(
		    'default' => '#ffffff',
		    'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_color', array(
		    'label' => 'Menu Background Color',
		    'section' => 'colors',
		    'settings' => 'nav_color',
		    'priority'    => 40,
		) ) );

		// Link Color
		$wp_customize->add_setting( 'link_color', array(
	        'default' => '#999900',
	        'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	        'label' => 'Link Color',
	        'section' => 'colors',
	        'settings' => 'link_color',
	        'priority'    => 50,
	    ) ) );

	    // Link Hover Color
	    $wp_customize->add_setting( 'link_hover_color', array(
	        'default' => '#999900',
	        'sanitize_callback' => 'sanitize_hex_color',
	    ) );
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
	        'label' => 'Link Hover Color',
	        'section' => 'colors',
	        'settings' => 'link_hover_color',
	        'priority'    => 60,
	    ) ) );

	    // Heading Link Color
	    $wp_customize->add_setting( 'heading_link_color', array(
	        'default' => '#333333',
	        'sanitize_callback' => 'sanitize_hex_color',
	    ) );
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_link_color', array(
	        'label' => 'Heading Link Color',
	        'section' => 'colors',
	        'settings' => 'heading_link_color',
	        'priority'    => 70,
	    ) ) );

	    // Heading Link Hover Color
	    $wp_customize->add_setting( 'heading_link_hover_color', array(
	        'default' => '#999900',
	        'sanitize_callback' => 'sanitize_hex_color',
	    ) );
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_link_hover_color', array(
	        'label' => 'Heading Link Hover Color',
	        'section' => 'colors',
	        'settings' => 'heading_link_hover_color',
	        'priority'    => 80,
	    ) ) );

	    // Highlight Color
	    $wp_customize->add_setting( 'highlight_color', array(
	        'default' => '#999900',
	        'sanitize_callback' => 'sanitize_hex_color',
	    ) );
	    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'highlight_color', array(
	        'label' => 'Highlight & Button Color',
	        'section' => 'colors',
	        'settings' => 'highlight_color',
	        'priority'    => 90,
	    ) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Theme Options Panel
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_panel( 'restaurant_theme_options', array(
	    'priority' 			=> 1,
	    'capability' 		=> 'edit_theme_options',
	    'theme_supports'	=> '',
	    'title' 			=> esc_html__( 'Theme Options', 'organic-restaurant' ),
	    'description' 		=> esc_html__( 'This panel allows you to customize specific areas of the Restaurant Theme.', 'organic-restaurant' ),
	) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Contact Section
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'restaurant_contact_section' , array(
		'title'     => esc_html__( 'Contact Info', 'organic-restaurant' ),
		'priority'  => 100,
		'panel' 	=> 'restaurant_theme_options',
	) );

		// Contact Address
		$wp_customize->add_setting( 'restaurant_contact_address', array(
			'default' => '231 Front Street, Lahaina, HI 96761',
			'sanitize_callback' => 'restaurant_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'restaurant_contact_address', array(
			'label'		=> esc_html__( 'Business Address', 'organic-restaurant' ),
			'section'	=> 'restaurant_contact_section',
			'settings'	=> 'restaurant_contact_address',
			'type'		=> 'text',
			'priority' => 20,
		) ) );

		// Contact Email
		$wp_customize->add_setting( 'restaurant_contact_email', array(
			'default' => 'reservations@myrestaurant.com',
			'sanitize_callback' => 'sanitize_email',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'restaurant_contact_email', array(
			'label'		=> esc_html__( 'Business Email Address', 'organic-restaurant' ),
			'section'	=> 'restaurant_contact_section',
			'settings'	=> 'restaurant_contact_email',
			'type'		=> 'text',
			'priority' => 40,
		) ) );

		// Contact Phone
		$wp_customize->add_setting( 'restaurant_contact_phone', array(
			'default' => '808.123.4567',
			'sanitize_callback' => 'restaurant_sanitize_text',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'restaurant_contact_phone', array(
			'label'		=> esc_html__( 'Business Phone Number', 'organic-restaurant' ),
			'section'	=> 'restaurant_contact_section',
			'settings'	=> 'restaurant_contact_phone',
			'type'		=> 'text',
			'priority' => 60,
		) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Home Page Section
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'restaurant_home_section' , array(
		'title'     => esc_html__( 'Home Page', 'organic-restaurant' ),
		'priority'  => 101,
		'panel' 	=> 'restaurant_theme_options',
	) );

		// Featured Slideshow Category
		$wp_customize->add_setting( 'category_slideshow_home' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_categories',
		) );
		$wp_customize->add_control( new Restaurant_Category_Dropdown_Control( $wp_customize, 'category_slideshow_home', array(
			'label'		=> esc_html__( 'Featured Slideshow Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_home_section',
			'settings'	=> 'category_slideshow_home',
			'type'		=> 'dropdown-categories',
			'priority' => 20,
		) ) );

		// Featured Page Left
		$wp_customize->add_setting( 'page_left', array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_pages',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_left', array(
			'label'		=> esc_html__( 'Featured Page Left', 'organic-restaurant' ),
			'section'	=> 'restaurant_home_section',
			'settings'	=> 'page_left',
			'type'		=> 'dropdown-pages',
			'priority' => 40,
		) ) );

		// Featured Page Middle
		$wp_customize->add_setting( 'page_mid', array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_pages',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_mid', array(
			'label'		=> esc_html__( 'Featured Page Middle', 'organic-restaurant' ),
			'section'	=> 'restaurant_home_section',
			'settings'	=> 'page_mid',
			'type'		=> 'dropdown-pages',
			'priority' => 60,
		) ) );

		// Featured Page Right
		$wp_customize->add_setting( 'page_right', array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_pages',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_right', array(
			'label'		=> esc_html__( 'Featured Page Right', 'organic-restaurant' ),
			'section'	=> 'restaurant_home_section',
			'settings'	=> 'page_right',
			'type'		=> 'dropdown-pages',
			'priority' => 80,
		) ) );

		// Featured Page Bottom
		$wp_customize->add_setting( 'page_bottom', array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_pages',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_bottom', array(
			'label'		=> esc_html__( 'Featured Page Bottom', 'organic-restaurant' ),
			'section'	=> 'restaurant_home_section',
			'settings'	=> 'page_bottom',
			'type'		=> 'dropdown-pages',
			'priority' => 100,
		) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Slideshow Section
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'restaurant_slider_section' , array(
		'title'     => esc_html__( 'Slideshow Settings', 'organic-restaurant' ),
		'priority'  => 102,
		'panel' 	=> 'restaurant_theme_options',
	) );

		// Slider Transition Interval
		$wp_customize->add_setting( 'transition_interval', array(
	        'default' => '8000',
	        'sanitize_callback' => 'restaurant_sanitize_transition_interval',
	    ) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'transition_interval', array(
	        'type' => 'select',
	        'label' => esc_html__( 'Transition Interval', 'organic-restaurant' ),
	        'section' => 'restaurant_slider_section',
	        'choices' => array(
	            '2000' 		=> esc_html__( '2 Seconds', 'organic-restaurant' ),
	            '4000' 		=> esc_html__( '4 Seconds', 'organic-restaurant' ),
	            '6000' 		=> esc_html__( '6 Seconds', 'organic-restaurant' ),
	            '8000' 		=> esc_html__( '8 Seconds', 'organic-restaurant' ),
	            '10000' 	=> esc_html__( '10 Seconds', 'organic-restaurant' ),
	            '12000' 	=> esc_html__( '12 Seconds', 'organic-restaurant' ),
	            '20000' 	=> esc_html__( '20 Seconds', 'organic-restaurant' ),
	            '30000' 	=> esc_html__( '30 Seconds', 'organic-restaurant' ),
	            '60000' 	=> esc_html__( '1 Minute', 'organic-restaurant' ),
	            '999999999'	=> esc_html__( 'Hold Frame', 'organic-restaurant' ),
	        ),
	        'priority' => 10,
		) ) );

		// Slideshow Transition Style
		$wp_customize->add_setting( 'transition_style', array(
		    'default' => 'fade',
		    'sanitize_callback' => 'restaurant_sanitize_transition_style',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'transition_style', array(
		    'type' => 'select',
		    'label' => esc_html__( 'Transition Style', 'organic-restaurant' ),
		    'section' => 'restaurant_slider_section',
		    'choices' => array(
		        'fade' 		=> esc_html__( 'Fade', 'organic-restaurant' ),
		        'slide' 	=> esc_html__( 'Slide', 'organic-restaurant' ),
		    ),
		    'priority' => 20,
		) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Food Menu Options
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'restaurant_menu_section' , array(
		'title'     => esc_html__( 'Food & Drink Menu', 'organic-restaurant' ),
		'priority'  => 103,
		'panel' 	=> 'restaurant_theme_options',
	) );

		// Breakfast Menu Category
		$wp_customize->add_setting( 'category_breakfast' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_breakfast', array(
			'label'		=> esc_html__( 'Breakfast Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_breakfast',
			'type'		=> 'dropdown-categories',
			'priority' => 20,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

		// Brunch Menu Category
		$wp_customize->add_setting( 'category_brunchside' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_brunchside', array(
			'label'		=> esc_html__( 'Brunch Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_brunchside',
			'type'		=> 'dropdown-categories',
			'priority' => 20,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

		// Drink Menu Category
		$wp_customize->add_setting( 'category_drinks' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_drinks', array(
			'label'		=> esc_html__( 'Bar Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_drinks',
			'type'		=> 'dropdown-categories',
			'priority' => 20,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

		// Appetizer Menu Category
		$wp_customize->add_setting( 'category_pupus' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_pupus', array(
			'label'		=> esc_html__( 'Appetizer Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_pupus',
			'type'		=> 'dropdown-categories',
			'priority' => 40,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

		// Lunch Menu Category
		$wp_customize->add_setting( 'category_lunch' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_lunch', array(
			'label'		=> esc_html__( 'Lunch Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_lunch',
			'type'		=> 'dropdown-categories',
			'priority' => 60,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

		// Dinner Menu Category
		$wp_customize->add_setting( 'category_dinner' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_dinner', array(
			'label'		=> esc_html__( 'Dinner Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_dinner',
			'type'		=> 'dropdown-categories',
			'priority' => 80,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

		// Dessert Menu Category
		$wp_customize->add_setting( 'category_dessert' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_dessert', array(
			'label'		=> esc_html__( 'Dessert Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_dessert',
			'type'		=> 'dropdown-categories',
			'priority' => 100,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

		// Beverages Menu Category
		$wp_customize->add_setting( 'category_beverages' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_taxonomies',
		) );
		$wp_customize->add_control( new Restaurant_Taxonomy_Dropdown_Control( $wp_customize, 'category_beverages', array(
			'label'		=> esc_html__( 'Beverages Menu Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_menu_section',
			'settings'	=> 'category_beverages',
			'type'		=> 'dropdown-categories',
			'priority' => 120,
			'args' => array(
				'taxonomy' => 'category-menu',
			),
		) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Page Templates
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'restaurant_templates_section' , array(
		'title'     => esc_html__( 'Page Templates', 'organic-restaurant' ),
		'priority'  => 104,
		'panel' 	=> 'restaurant_theme_options',
	) );

		// Blog Template Category
		$wp_customize->add_setting( 'category_blog' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_categories',
		) );
		$wp_customize->add_control( new Restaurant_Category_Dropdown_Control( $wp_customize, 'category_blog', array(
			'label'		=> esc_html__( 'Blog Template Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_templates_section',
			'settings'	=> 'category_blog',
			'type'		=> 'dropdown-categories',
			'priority' => 40,
		) ) );

		// Blog Posts Displayed
		$wp_customize->add_setting( 'postnumber_blog', array(
			'default' => '10',
			'sanitize_callback' => 'restaurant_sanitize_text',
		) );
		$wp_customize->add_control( new Restaurant_Customizer_Number_Control( $wp_customize, 'postnumber_blog', array(
			'label'		=> esc_html__( 'Blog Posts Displayed', 'organic-restaurant' ),
			'section'	=> 'restaurant_templates_section',
			'settings'	=> 'postnumber_blog',
			'type'		=> 'number',
			'priority' => 60,
		) ) );

		// Portfolio Column Layout
		$wp_customize->add_setting( 'portfolio_columns', array(
		    'default' => 'three',
		    'sanitize_callback' => 'restaurant_sanitize_columns',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_columns', array(
		    'type' => 'radio',
		    'label' => esc_html__( 'Portfolio Column Layout', 'organic-restaurant' ),
		    'section' => 'restaurant_templates_section',
		    'choices' => array(
		        'one' 		=> esc_html__( 'One Column', 'organic-restaurant' ),
		        'two' 		=> esc_html__( 'Two Columns', 'organic-restaurant' ),
		        'three' 	=> esc_html__( 'Three Columns', 'organic-restaurant' ),
		    ),
		    'priority' => 80,
		) ) );

		// Portfolio Template Category
		$wp_customize->add_setting( 'category_portfolio' , array(
			'default' => '0',
			'sanitize_callback' => 'restaurant_sanitize_categories',
		) );
		$wp_customize->add_control( new Restaurant_Category_Dropdown_Control( $wp_customize, 'category_portfolio', array(
			'label'		=> esc_html__( 'Portfolio Template Category', 'organic-restaurant' ),
			'section'	=> 'restaurant_templates_section',
			'settings'	=> 'category_portfolio',
			'type'		=> 'dropdown-categories',
			'priority' => 100,
		) ) );

		// Display Portfolio Info
		$wp_customize->add_setting( 'display_portfolio_info', array(
			'default'	=> true,
			'sanitize_callback' => 'restaurant_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_portfolio_info', array(
			'label'		=> esc_html__( 'Show Portfolio Title & Excerpt?', 'organic-restaurant' ),
			'section'	=> 'restaurant_templates_section',
			'settings'	=> 'display_portfolio_info',
			'type'		=> 'checkbox',
			'priority' => 120,
		) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Misc Settings
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'restaurant_layout_section' , array(
		'title'     => esc_html__( 'Misc Settings', 'organic-restaurant' ),
		'priority'  => 105,
		'panel' 	=> 'restaurant_theme_options',
	) );

		// Display Post Author
		$wp_customize->add_setting( 'display_author_post', array(
			'default'	=> true,
			'sanitize_callback' => 'restaurant_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_author_post', array(
			'label'		=> esc_html__( 'Show Post Author & Comment Link?', 'organic-restaurant' ),
			'section'	=> 'restaurant_layout_section',
			'settings'	=> 'display_author_post',
			'type'		=> 'checkbox',
			'priority' => 40,
		) ) );

		// Display Blog Author
		$wp_customize->add_setting( 'display_author_blog', array(
			'default'	=> true,
			'sanitize_callback' => 'restaurant_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_author_blog', array(
			'label'		=> esc_html__( 'Show Blog Author & Comment Link?', 'organic-restaurant' ),
			'section'	=> 'restaurant_layout_section',
			'settings'	=> 'display_author_blog',
			'type'		=> 'checkbox',
			'priority' => 60,
		) ) );

		// Display Post Featured Image or Video
		$wp_customize->add_setting( 'display_feature_post', array(
			'default'	=> true,
			'sanitize_callback' => 'restaurant_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_feature_post', array(
			'label'		=> esc_html__( 'Show Post Featured Images?', 'organic-restaurant' ),
			'section'	=> 'restaurant_layout_section',
			'settings'	=> 'display_feature_post',
			'type'		=> 'checkbox',
			'priority' => 80,
		) ) );

}
add_action('customize_register', 'restaurant_theme_customizer');

/**
* Binds JavaScript handlers to make Customizer preview reload changes
* asynchronously.
*/
function restaurant_customize_preview_js() {
	wp_enqueue_script( 'restaurant-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'restaurant_customize_preview_js' );
