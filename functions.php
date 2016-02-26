<?php

add_theme_support( 'post-thumbnails' ); 

// Clean wp_head
remove_action(	'wp_head',			'rsd_link' );
remove_action(	'wp_head',			'wlwmanifest_link' );
remove_action(	'wp_head',			'index_rel_link' );
remove_action(	'wp_head',			'wp_generator' );
remove_action(	'wp_head',			'start_post_rel_link' );
remove_action(	'wp_head',			'adjacent_posts_rel_link' );
remove_action(	'wp_head',			'wp_shortlink_wp_head' );
remove_action(	'wp_head',			'print_emoji_detection_script', 7 );
remove_action(	'wp_head',			'rest_output_link_wp_head', 10 );
remove_action(	'wp_head',			'wp_oembed_add_discovery_links', 10 );
remove_action(	'wp_print_styles',	'print_emoji_styles' ); 


// Get pages by parent
function getPages( $parent_title ) {
	$parent = get_page_by_title( $parent_title );						// get info from parent page
	$parent_id = $parent->ID;											// get parent ID
	$args = array(
        'parent'      => $parent_id,
        'post_type'     => 'page',
        'post_status'   => 'publish'
    ); 
    $pages = get_pages($args);											// get children 
    $page_list = array();												// create pages list array
    
    foreach ( $pages as $page ) :										// for each child
    	$page_list[ $page->post_title ] = array();						// create new [page] array
    	$args = array(
            'post_parent' => $page->ID,
            'post_type' => 'page',
        );
        $children = get_children( $args );								// get grand-children
        foreach ( $children as $child ) :								// for each grand-child
        	$page_list[ $page->post_title ][] = $child->post_title ;	// add value to correspondent [parent]
        endforeach;

    endforeach;

    return $page_list;
}

//

/*	Get pages from a parent 
//	and the posts with the category name same as the page title 
*/
function getPagePosts( $parent_title ) {
	$parent = get_page_by_title( $parent_title );				// get info from parent page
	$parent_id = $parent->ID;									// get parent ID
	$args_pages = array(
		'sort_order'	=> 'asc',
		'sort_column'	=> 'menu_order',
        'parent'		=> $parent_id,
        'post_type'		=> 'page',
        'post_status'	=> 'publish'
    ); 
    $pages_array = get_pages($args_pages);						// get children 
    $list = array();											// create list array
    
    foreach ( $pages_array as $page ) :							// for each child
    	$list[$page->ID]['id'] = $page->ID;
    	$list[$page->ID]['title'] = $page->post_title;
    	$list[$page->ID]['name'] = $page->post_name;
    	$list[$page->ID]['url'] = get_permalink( $page->ID );

    	$args_posts = array(
			'category_name'		=> $page->post_title,
			'meta_key'			=> 'menu_order',
			'orderby'			=> 'meta_value_num',
            'order'				=> 'asc',	
			'post_type'			=> 'post',
			'post_status'		=> 'publish'
		);
		$posts_array = get_posts( $args_posts );
		
		foreach ( $posts_array as $post ) :	
			$list[$page->ID]['posts'][$post->ID]['id'] = $post->ID;
			$list[$page->ID]['posts'][$post->ID]['title'] = $post->post_title;
			$list[$page->ID]['posts'][$post->ID]['name'] = $post->post_name;
			$list[$page->ID]['posts'][$post->ID]['url'] = get_permalink( $post->ID );
        endforeach;
		
    endforeach;

    return $list;
    wp_reset_postdata();
}

// Check if class is active in ol.menu
function checkActive ( $a_active ) {
	if ( $a_active === true ) :
		return ' class="active" ';
	endif;
}



// Get posts by category
function getPostsByCat( $category ) {
	$posts = array();

	$args = array(
		'category_name'		=> $category,
		'meta_key'			=> 'menu_order',
		'orderby'			=> 'meta_value_num',
        'order'				=> 'asc',	
		'post_type'			=> 'post',
		'post_status'		=> 'publish'
	);
	$posts_query = get_posts( $args );

	foreach ( $posts_query as $post ) :

		$posts[$post->ID]['id'] = $post->ID;
		$posts[$post->ID]['title'] = $post->post_title;
		$posts[$post->ID]['name'] = $post->post_name;
		$posts[$post->ID]['url'] = get_permalink( $post->ID );
		$posts[$post->ID]['image'] = getFeaturedImage( get_post_thumbnail_id( $post->ID ) );

	endforeach;
	
	return $posts;
	wp_reset_postdata();
}


// Get highlights
function getHighlights(){
	$highlights_list = array();
	$args = array(
		'category_name'       => 'highlights',
		'posts_per_page'      => -1,
		'orderby'             => 'menu_order',
		'order'               => 'ASC',
		'post_status'         => 'publish'
	);

	$highlights = new WP_Query( $args );
	foreach ( $highlights->posts as $highlight){
		$highlights_list[$highlight->ID]['id'] = $highlight->ID;
		$highlights_list[$highlight->ID]['title'] = $highlight->post_title;
		$highlights_list[$highlight->ID]['content'] = $highlight->post_content; 
		$highlights_list[$highlight->ID]['size'] = get_post_meta( $highlight->ID, 'size', true );
		$tags = wp_get_post_tags( $highlight->ID, array( 'fields' => 'slugs' ) );
		$highlights_list[$highlight->ID]['tag'] = $tags[0];
		$highlights_list[$highlight->ID]['icon'] = get_post_meta( $highlight->ID, 'icon', true );
		$highlights_list[$highlight->ID]['link_site'] = get_post_meta( $highlight->ID, 'link_site', true );
		$highlights_list[$highlight->ID]['link_out'] = get_post_meta( $highlight->ID, 'link_out', true );

		//$highlights_list[$highlight->ID]['permalink'] = get_permalink($highlight->ID);
		//$highlights_list[$highlight->ID]['image'] = getFeaturedImage( get_post_thumbnail_id( $highlight->ID ) );

	}
	return $highlights_list;

}

/**
 * Fetch the thumbnail and full image url from featured post/page/custom_post via de image ID
 *
 * @author João Moleiro <jf.moleiro@gmail.com>
 */
function getFeaturedImage($image_id) {
	$media_array = array();
	$media = wp_get_attachment_image_src( $image_id, 'full' );
	$media_array['full'] = $media[0];
	$media = wp_get_attachment_image_src( $image_id, 'thumbnail' );
	$media_array['thumbnail'] = $media[0];

	return $media_array;
}


?>