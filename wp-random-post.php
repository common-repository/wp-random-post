<?php
/*

**************************************************************************

Plugin Name:  WP Random Post
Plugin URI:   http://www.arefly.com/wp-random-post/
Description:  Redirect you to the Random post of your blog from a post or a page.
Version:      1.0.3
Author:       Arefly
Author URI:   http://www.arefly.com/
Text Domain:  wp-random-post
Domain Path:  /lang/

**************************************************************************

	Copyright 2014  Arefly  (email : eflyjason@gmail.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

**************************************************************************/

define("WP_RANDOM_POST_PLUGIN_URL", plugin_dir_url( __FILE__ ));
define("WP_RANDOM_POST_FULL_DIR", plugin_dir_path( __FILE__ ));
define("WP_RANDOM_POST_TEXT_DOMAIN", "wp-random-post");

function wp_random_post() {
	global $post;
	$random_meta = get_post_meta($post->ID, "random", true);
	if(!empty($random_meta)){
		$my_random_post = get_posts(array('numberposts' => 1, 'orderby' =>'rand'));
		foreach ($my_random_post as $post) {
			wp_redirect(get_permalink($post->ID));
			exit;
		}
	}
}
add_action('template_redirect', 'wp_random_post');
