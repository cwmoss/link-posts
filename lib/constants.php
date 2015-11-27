<?php
/**
 * Constants used by this plugin
 * 
 * @package AuthorRecommendedPosts
 * 
 * @author digital-telepathy
 * @version 1.0.0
 * @since 1.0.0
 */

// The current version of this plugin
if( !defined( 'AUTHOR_RECOMMENDED_POSTS_VERSION' ) ) define( 'AUTHOR_RECOMMENDED_POSTS_VERSION', '1.0.2' );

// The directory the plugin resides in
if( !defined( 'AUTHOR_RECOMMENDED_POSTS_DIRNAME' ) ) define( 'AUTHOR_RECOMMENDED_POSTS_DIRNAME', dirname( dirname( __FILE__ ) ) );

// The URL path of this plugin
if( !defined( 'AUTHOR_RECOMMENDED_POSTS_URLPATH' ) ) define( 'AUTHOR_RECOMMENDED_POSTS_URLPATH', WP_PLUGIN_URL . "/" . plugin_basename( AUTHOR_RECOMMENDED_POSTS_DIRNAME ) );

if( !defined( 'IS_AJAX_REQUEST' ) ) define( 'IS_AJAX_REQUEST', ( !empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) );