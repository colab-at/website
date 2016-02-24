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

//
function makeMenu( $parent_title ) {
    $parent = get_page_by_title( $parent_title );
    if ( !empty($parent) ) :
        print '<ol class="menu">';

            $parent_id = $parent->ID;
            $args = array(
                'parent'      => $parent_id,
                'post_type'     => 'page',
                'post_status'   => 'publish'
            ); 
            $pages = get_pages($args);
            //var_dump($pages);
            foreach ( $pages as $page ) :

                print '<li>';
                print '<a href="#">' . $page->post_title . '</a>';

                    $args = array(
                        'post_parent' => $page->ID,
                        'post_type' => 'page',
                    );
                    $children = get_children( $args );

                    if ( !empty($children) ) :

                        print '<ol>';

                        foreach ( $children as $child ) :
                            print '<li><a href="#">' . $child->post_title . '</a></li>';
                        endforeach;

                        print '</ol>';

                    endif;

                print '</li>';

            endforeach;

        print '</ol>';
    endif;
}

//
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