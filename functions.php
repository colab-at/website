<?php

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

?>