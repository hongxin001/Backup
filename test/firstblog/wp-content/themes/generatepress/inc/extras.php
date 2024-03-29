<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Generate
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function generate_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'generate_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 * @since 0.1
 */
add_filter( 'body_class', 'generate_body_classes' );
function generate_body_classes( $classes ) {
	
	// Get theme options
	global $post;
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$stored_meta = '';
	$page_header_image = '';
	$page_header_slideshow = '';
	
	if ( isset( $post ) ) :
		$stored_meta = get_post_meta( $post->ID, '_generate-sidebar-layout-meta', true );
		$page_header_image = get_post_meta( get_the_ID(), '_meta-generate-page-header-image', true );
		$page_header_slideshow = get_post_meta( get_the_ID(), '_meta-generate-page-header-slideshow', true );
	endif;
	
	// If we're on the single post page, use appropriate setting
	if ( is_single() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['single_layout_setting'];
	endif;
	
	// If a layout is set on the page, replace value with the metabox value
	if ( '' !== $stored_meta && false !== $stored_meta ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $stored_meta;
	endif;
	
	// If we're on the blog etc.. replace value with the blog layout setting
	if ( is_home() ||  
		is_category() || 
		is_tag() || 
		is_archive() || 
		is_tax() || 
		is_author() || 
		is_date() || 
		is_search() || 
		is_attachment() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['blog_layout_setting'];
	endif;
	
	// Let us know if a page header is being used
	if ( '' !== $page_header_image || '' !== $page_header_slideshow ) :
		$classes[] = 'page-header-active';
	endif;
	
	$classes[] = ( $generate_settings['layout_setting'] ) ? $generate_settings['layout_setting'] : 'right-sidebar';
	$classes[] = ( $generate_settings['nav_position_setting'] ) ? $generate_settings['nav_position_setting'] : 'nav-below-header';
	$classes[] = ( $generate_settings['header_layout_setting'] ) ? $generate_settings['header_layout_setting'] : 'fluid-header';
	$classes[] = ( $generate_settings['content_layout_setting'] ) ? $generate_settings['content_layout_setting'] : 'separate-containers';
	
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}

/**
 * Adds custom classes to the right sidebar
 * @since 0.1
 */
add_filter( 'generate_right_sidebar_class', 'generate_right_sidebar_classes');
function generate_right_sidebar_classes( $classes )
{

	$right_sidebar_width = apply_filters( 'generate_right_sidebar_width', '25' );
	$left_sidebar_width = apply_filters( 'generate_left_sidebar_width', '25' );

	$classes[] = 'widget-area';
	$classes[] = 'grid-' . $right_sidebar_width;
	$classes[] = 'grid-parent';
	$classes[] = 'sidebar';

	// Get theme options
	global $post;
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$layout = $generate_settings['layout_setting'];
	$stored_meta = '';
	
	if ( isset( $post ) ) :
		$stored_meta = get_post_meta( $post->ID, '_generate-sidebar-layout-meta', true );
	endif;
	
	// If we're on the single post page, use appropriate setting
	if ( is_single() ) :
		$layout = null;
		$layout = $generate_settings['single_layout_setting'];
	endif;
	
	if ( '' !== $stored_meta && false !== $stored_meta ) :
		$layout = $stored_meta;
	endif;
	
	// If we're on the blog, single post etc.. replace value with the blog layout setting
	if ( is_home() || 
		is_category() || 
		is_tag() || 
		is_archive() || 
		is_tax() || 
		is_author() || 
		is_date() || 
		is_search() || 
		is_attachment() ) :
		$layout = null;
		$layout = $generate_settings['blog_layout_setting'];
	endif;
	
	
	
	if ( $layout != '' ) {
		switch ( $layout ) {
			case 'both-sidebars' :
				$classes[] = 'push-' . $left_sidebar_width;
			break;
			
			case 'both-left' :
				$total_sidebar_width = $left_sidebar_width + $right_sidebar_width;
				$left_sidebar_pull = 100 - $left_sidebar_width;
				$total_pull = $left_sidebar_pull - $total_sidebar_width;
				if ( $total_pull > 0 ) {
					$classes[] = 'pull-' . $total_pull;
				} else {
					$classes[] = 'push' . $total_pull;
				}
			break;
			
			case 'both-right' :
				$classes[] = 'push-' . $left_sidebar_width;
			break;
		}
	}

	return $classes;
	
}

/**
 * Adds custom classes to the left sidebar
 * @since 0.1
 */
add_filter( 'generate_left_sidebar_class', 'generate_left_sidebar_classes');
function generate_left_sidebar_classes( $classes )
{
	$right_sidebar_width = apply_filters( 'generate_right_sidebar_width', '25' );
	$left_sidebar_width = apply_filters( 'generate_left_sidebar_width', '25' );
	
	$classes[] = 'widget-area';
	$classes[] = 'grid-' . $left_sidebar_width;
	$classes[] = 'grid-parent';
	$classes[] = 'sidebar';

	// Get theme options
	global $post;
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$stored_meta = '';
	if ( isset( $post ) ) :
		$stored_meta = get_post_meta( $post->ID, '_generate-sidebar-layout-meta', true );
	endif;
	
	// If we're on the single post page, use appropriate setting
	if ( is_single() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['single_layout_setting'];
	endif;
	
	if ( '' !== $stored_meta && false !== $stored_meta ) :
		$generate_settings['layout_setting'] = $stored_meta;
	endif;
	
	// If we're on the blog, single post etc.. replace value with the blog layout setting
	if ( is_home() || 
		is_category() || 
		is_tag() || 
		is_archive() || 
		is_tax() || 
		is_author() || 
		is_date() || 
		is_search() || 
		is_attachment() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['blog_layout_setting'];
	endif;
	
	// Left sidebar
	
	if ( $generate_settings['layout_setting'] == 'left-sidebar' || 
		 $generate_settings['layout_setting'] == 'both-sidebars' || 
		 $generate_settings['layout_setting'] == 'both-left' ) :
			$classes[] = 'pull-' . ( 100 - $left_sidebar_width );
			//$classes[] = 'pull-75';
	endif;
	
	if ( $generate_settings['layout_setting'] == 'both-right' ) :
		$classes[] = 'pull-' . $right_sidebar_width;
	endif;

	return $classes;
	
}

/**
 * Adds custom classes to the content container
 * @since 0.1
 */
add_filter( 'generate_content_class', 'generate_content_classes');
function generate_content_classes( $classes )
{
	$right_sidebar_width = apply_filters( 'generate_right_sidebar_width', '25' );
	$left_sidebar_width = apply_filters( 'generate_left_sidebar_width', '25' );
	
	$classes[] = 'content-area';
	$classes[] = 'grid-parent';

	// Get theme options
	global $post;
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$stored_meta = '';
	
	if ( isset( $post ) ) :
		$stored_meta = get_post_meta( $post->ID, '_generate-sidebar-layout-meta', true );
	endif;
	
	// If we're on the single post page, use appropriate setting
	if ( is_single() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['single_layout_setting'];
	endif;
	
	if ( '' !== $stored_meta && false !== $stored_meta ) :
		$generate_settings['layout_setting'] = $stored_meta;
	endif;
	
	// If we're on the blog, single post etc.. replace value with the blog layout setting
	if ( is_home() || 
		is_category() || 
		is_tag() || 
		is_archive() || 
		is_tax() || 
		is_author() || 
		is_date() || 
		is_search() || 
		is_attachment() ) :
		$generate_settings['layout_setting'] = null;
		$generate_settings['layout_setting'] = $generate_settings['blog_layout_setting'];
	endif;
	
	// If only the right sidebar is set:
	// width: 75%
	if ( $generate_settings['layout_setting'] == 'right-sidebar' ) :
		//$classes[] = 'grid-75';
		$classes[] = 'grid-' . ( 100 - $right_sidebar_width );
	endif;
	
	// If only the left sidebar is set:
	// width: 75%
	// push to the right 25%
	if ( $generate_settings['layout_setting'] == 'left-sidebar' ) :
		//$classes[] = 'push-25';
		//$classes[] = 'grid-75';
		$classes[] = 'push-' . $left_sidebar_width;
		$classes[] = 'grid-' . ( 100 - $left_sidebar_width );
	endif;
	
	// If no sidebars are set:
	// width: 100%
	if ( $generate_settings['layout_setting'] == 'no-sidebar' ) :
		$classes[] = 'grid-100';
	endif;
	
	if ( $generate_settings['layout_setting'] == 'both-sidebars' ) :
		//$classes[] = 'push-25';
		//$classes[] = 'grid-50';
		$total_sidebar_width = $left_sidebar_width + $right_sidebar_width;
		$classes[] = 'push-' . $left_sidebar_width;
		$classes[] = 'grid-' . ( 100 - $total_sidebar_width );
	endif;
	
	if ( $generate_settings['layout_setting'] == 'both-left' || $generate_settings['layout_setting'] == 'both-right' ) :
		//$classes[] = 'grid-50';
		$total_sidebar_width = $left_sidebar_width + $right_sidebar_width;
		$classes[] = 'grid-' . ( 100 - $total_sidebar_width );
	endif;
	
	if ( $generate_settings['layout_setting'] == 'both-left' ) :
		//$classes[] = 'push-50';
		$total_sidebar_width = $left_sidebar_width + $right_sidebar_width;
		$classes[] = 'push-' . $total_sidebar_width;
	endif;

	return $classes;
	
}
  
/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
add_filter( 'attachment_link', 'generate_enhanced_image_navigation', 10, 2 );
function generate_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function generate_wp_title( $title, $sep ) {
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
		$title .= " $sep " . sprintf( __( 'Page %s', 'generate' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'generate_wp_title', 10, 2 );

/**
 * Adds custom classes to the header
 * @since 0.1
 */
add_filter( 'generate_header_class', 'generate_header_classes');
function generate_header_classes( $classes )
{
	
	$classes[] = 'site-header';

	// Get theme options
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$header_layout = $generate_settings['header_layout_setting'];
	
	if ( $header_layout == 'contained-header' ) :
		$classes[] = 'grid-container';
		$classes[] = 'grid-parent';
	endif;

	return $classes;
	
}

/**
 * Adds custom classes to inside the header
 * @since 0.1
 */
add_filter( 'generate_inside_header_class', 'generate_inside_header_classes');
function generate_inside_header_classes( $classes )
{
	
	$classes[] = 'inside-header';

	// Get theme options
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$header_layout = $generate_settings['header_layout_setting'];
	
	if ( $header_layout == 'fluid-header' || $header_layout == '' ) :
		$classes[] = 'grid-container';
		$classes[] = 'grid-parent';
	endif;

	return $classes;
	
}

/**
 * Adds custom classes to the navigation
 * @since 0.1
 */
add_filter( 'generate_navigation_class', 'generate_navigation_classes');
function generate_navigation_classes( $classes )
{
	
	$classes[] = 'main-navigation';

	// Get theme options
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$nav_layout = $generate_settings['nav_layout_setting'];
	
	if ( $nav_layout == 'contained-nav' ) :
		$classes[] = 'grid-container';
		$classes[] = 'grid-parent';
	endif;

	return $classes;
	
}

/**
 * Adds custom classes to the menu
 * @since 0.1
 */
add_filter( 'generate_menu_class', 'generate_menu_classes');
function generate_menu_classes( $classes )
{
	
	$classes[] = 'menu';
	$classes[] = 'sf-menu';

	// Get theme options
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);

	return $classes;
	
}

/**
 * Adds custom classes to the footer
 * @since 0.1
 */
add_filter( 'generate_footer_class', 'generate_footer_classes');
function generate_footer_classes( $classes )
{
	$classes[] = 'site-footer';

	// Get theme options
	$generate_settings = wp_parse_args( 
		get_option( 'generate_settings', array() ), 
		generate_get_defaults() 
	);
	$footer_layout = $generate_settings['footer_layout_setting'];
	
	if ( $footer_layout == 'contained-footer' ) :
		$classes[] = 'grid-container';
		$classes[] = 'grid-parent';
	endif;

	return $classes;
	
}

/**
 * Adds custom classes to the <main> element
 * @since 1.1.0
 */
add_filter( 'generate_main_class', 'generate_main_classes');
function generate_main_classes( $classes )
{
	$classes[] = 'site-main';

	// Get theme options
	// $generate_settings = wp_parse_args( 
		// get_option( 'generate_settings', array() ), 
		// generate_get_defaults() 
	// );
	// $footer_layout = $generate_settings['footer_layout_setting'];
	
	// if ( $footer_layout == 'contained-footer' ) :
		// $classes[] = 'grid-container';
		// $classes[] = 'grid-parent';
	// endif;

	return $classes;
	
}