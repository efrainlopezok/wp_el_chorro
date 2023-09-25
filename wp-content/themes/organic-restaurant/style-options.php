<style type="text/css" media="screen">
	<?php
		$nav_color = get_theme_mod('nav_color', '#ffffff');
		$header_color = get_theme_mod('header_color', '#ffffff');
		$link_color = get_theme_mod('link_color', '#999900');
		$heading_link_color = get_theme_mod('heading_link_color', '#333333');
		$link_hover_color = get_theme_mod('link_hover_color', '#999900');
		$heading_link_hover_color = get_theme_mod('heading_link_hover_color', '#999900');
		$highlight_color = get_theme_mod('highlight_color', '#999900');
	?>
	
	.container .menu ul.children, .container .menu ul.sub-menu {
	<?php 
		if ($nav_color) {
		    echo 'background-color: ' .$nav_color. ';';
	    }; 
	?>
	}
	
	.container .menu .nav-arrow {
	<?php 
		if ($nav_color) {
		    echo 'border-bottom-color: ' .$nav_color. ';';
	    }; 
	?>
	}
	
	#header .content {
		<?php
			if ($header_color) {
				echo 'background-color: ' .$header_color. ';';
			};
		?>
	}
	
	.container a, .container a:link, .container a:visited, #wrap .widget ul.menu li a {
		<?php
			if ($link_color) {
				echo 'color: ' .$link_color. ';';
			};
		?>
	}
	
	.container a:hover, .container a:focus, .container a:active,
	#wrap .widget ul.menu li a:hover, #wrap .widget ul.menu li ul.sub-menu li a:hover,
	#wrap .widget ul.menu .current_page_item a, #wrap .widget ul.menu .current-menu-item a {
		<?php
			if ($link_hover_color) {
				echo 'color: ' .$link_hover_color. ';';
			};
		?>
	}
	
	.container h1 a, .container h2 a, .container h3 a, .container h4 a, .container h5 a, .container h6 a,
	.container h1 a:link, .container h2 a:link, .container h3 a:link, .container h4 a:link, .container h5 a:link, .container h6 a:link,
	.container h1 a:visited, .container h2 a:visited, .container h3 a:visited, .container h4 a:visited, .container h5 a:visited, .container h6 a:visited {
		<?php
			if ($heading_link_color) {
				echo 'color: ' .$heading_link_color. ';';
			};
		?>
	}
	
	.container h1 a:hover, .container h2 a:hover, .container h3 a:hover, .container h4 a:hover, .container h5 a:hover, .container h6 a:hover,
	.container h1 a:focus, .container h2 a:focus, .container h3 a:focus, .container h4 a:focus, .container h5 a:focus, .container h6 a:focus,
	.container h1 a:active, .container h2 a:active, .container h3 a:active, .container h4 a:active, .container h5 a:active, .container h6 a:active,
	.slideshow .headline a:hover, .slideshow .headline a:focus, .slideshow .headline a:active {
		<?php
			if ($heading_link_hover_color) {
				echo 'color: ' .$heading_link_hover_color. ';';
			};
		?>
	}
	
	#submit:hover, #searchsubmit:hover, .reply a:hover, .gallery a:hover, a.button:hover, .more-link:hover,
	#comments #respond input#submit:hover, .container .gform_wrapper input.button:hover, .flex-direction-nav li a:hover {
		<?php
			if ($highlight_color) {
				echo 'background-color: ' .$highlight_color. ' !important;';
			};
		?>
	}
</style>