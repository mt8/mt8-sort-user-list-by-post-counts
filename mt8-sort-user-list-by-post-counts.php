<?php

/*
	Plugin Name: Mt8 Sort User List By Post Counts
	Plugin URI: https://github.com/mt8/mt8-sort-user-list-by-post-counts
	Description: Sort user-list by post counts.
	Author: mt8.biz
	Version: 1.0
	Author URI: http://mt8.biz
	Domain Path: /languages
	Text Domain: mt8-sort-user-list-by-post-counts
*/	
	$mt8_sulbpc = new Mt8_Sort_User_List_By_Post_Counts();
	$mt8_sulbpc->register_hooks();

	class Mt8_Sort_User_List_By_Post_Counts {

		const TEXT_DOMAIN = 'mt8-sort-user-list-by-post-counts';
		
		public function __construct() {
			
		}
		
		public function register_hooks() {
			
			add_action( 'plugins_loaded', array( &$this, 'plugins_loaded' ) );
			add_filter( 'manage_users_sortable_columns', array( &$this, 'manage_users_sortable_columns') );
			
		}

		public function plugins_loaded() {
			
			load_plugin_textdomain( self::TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ).'/languages' );
			
		}
		
		public function manage_users_sortable_columns( $sortable_columns ) {

			if ( ! array_key_exists( 'posts', $sortable_columns ) ) {
				$sortable_columns['posts'] = 'post_count';
			}
			return $sortable_columns;

		}
		
	}