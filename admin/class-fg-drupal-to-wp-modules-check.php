<?php

/**
 * Module to check the modules that are needed
 *
 * @link       https://wordpress.org/plugins/fg-drupal-to-wp/
 * @since      1.2.0
 *
 * @package    FG_Drupal_to_WordPress
 * @subpackage FG_Drupal_to_WordPress/admin
 */

if ( !class_exists('FG_Drupal_to_WordPress_Modules_Check', false) ) {

	/**
	 * Class to check the modules that are needed
	 *
	 * @package    FG_Drupal_to_WordPress
	 * @subpackage FG_Drupal_to_WordPress/admin
	 * @author     Frédéric GILLES
	 */
	class FG_Drupal_to_WordPress_Modules_Check {

		/**
		 * Initialize the class and set its properties.
		 *
		 * @param    object    $plugin       Admin plugin
		 */
		public function __construct( $plugin ) {

			$this->plugin = $plugin;

		}

		/**
		 * Check if some modules are needed
		 *
		 */
		public function check_modules() {
			$premium_url = 'https://www.fredericgilles.net/fg-drupal-to-wordpress/';
			$message_premium = __('Your Drupal database contains %s. You need the <a href="%s" target="_blank">Premium version</a> to import them.', 'fg-drupal-to-wp');
			if ( defined('FGD2WPP_LOADED') ) {
				// Message for the Premium version
				$message_addon = __('Your Drupal database contains %1$s. You need the <a href="%3$s" target="_blank">%4$s</a> to import them.', 'fg-drupal-to-wp');
			} else {
				// Message for the free version
				$message_addon = __('Your Drupal database contains %1$s. You need the <a href="%2$s" target="_blank">Premium version</a> and the <a href="%3$s" target="_blank">%4$s</a> to import them.', 'fg-drupal-to-wp');
			}
			$modules = array(
				// Check if we need the Premium version: check the number of users
				array(array($this, 'count'),
					array('users', 1),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('users', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of comments (Drupal 6)
				array(array($this, 'count'),
					array('comments', 2),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('comments', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of comments (Drupal 7 & 8)
				array(array($this, 'count'),
					array('comment', 2),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('comments', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of custom nodes
				array(array($this, 'count_custom_nodes'),
					array('node', 0),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('custom nodes', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of custom taxonomies (Drupal 6)
				array(array($this, 'count_custom_taxonomies'),
					array('term_data', 'vocabulary', 0),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('custom taxonomies', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of custom taxonomies (Drupal 7)
				array(array($this, 'count_custom_taxonomies'),
					array('taxonomy_term_data', 'taxonomy_vocabulary', 0),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('custom taxonomies', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of custom taxonomies (Drupal 8)
				array(array($this, 'count_drupal8_custom_taxonomies'),
					array(0),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('custom taxonomies', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the Premium version: check the number of URL alias
				array(array($this, 'count'),
					array('url_alias', 0),
					'fg-drupal-to-wp-premium/fg-drupal-to-wp-premium.php',
					sprintf($message_premium, __('URL alias', 'fg-drupal-to-wp'), $premium_url)
				),
				
				// Check if we need the CCK add-on (Drupal 6)
				array(array($this, 'count'),
					array('content_node_field', 0),
					'fg-drupal-to-wp-premium-cck-module/fg-drupal-to-wp-cck.php',
					sprintf($message_addon, __('CCK data', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'cck/', __('CCK add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the CCK add-on (Drupal 5)
				array(array($this, 'count'),
					array('node_field', 0),
					'fg-drupal-to-wp-premium-cck-module/fg-drupal-to-wp-cck.php',
					sprintf($message_addon, __('CCK data', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'cck/', __('CCK add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the Location add-on
				array(array($this, 'count'),
					array('location', 0),
					'fg-drupal-to-wp-premium-location-module/fg-drupal-to-wp-location.php',
					sprintf($message_addon, __('Location custom fields', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'location/', __('Location add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the Metatag add-on
				array(array($this, 'count'),
					array('metatag', 0),
					'fg-drupal-to-wp-premium-metatag-module/fg-drupal-to-wp-metatag.php',
					sprintf($message_addon, __('meta tags', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'metatag/', __('Metatag add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the Name add-on
				array(array($this, 'check_drupal7_module'),
					array('name'),
					'fg-drupal-to-wp-premium-name-module/fg-drupal-to-wp-name.php',
					sprintf($message_addon, __('Name custom fields', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'name/', __('Name add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the Address add-on
				array(array($this, 'check_drupal7_module'),
					array('addressfield'),
					'fg-drupal-to-wp-premium-address-module/fg-drupal-to-wp-address.php',
					sprintf($message_addon, __('Addressfield custom fields', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'address/', __('Address add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the Ubercart add-on
				array(array($this, 'count'),
					array('uc_products', 0),
					'fg-drupal-to-wp-premium-ubercart-module/fg-drupal-to-wp-ubercart.php',
					sprintf($message_addon, __('Ubercart products', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'ubercart/', __('Ubercart add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the Internationalization add-on
				array(array($this, 'count'),
					array('languages', 1),
					'fg-drupal-to-wp-premium-internationalization-module/fgd2wp-internationalization.php',
					sprintf($message_addon, __('translations', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'internationalization/', __('Internationalization add-on', 'fg-drupal-to-wp'))
				),
				
				// Check if we need the NodeBlock add-on
				array(array($this, 'count'),
					array('field_collection_item', 0),
					'fg-drupal-to-wp-premium-nodeblock-module/fg-drupal-to-wp-nodeblock.php',
					sprintf($message_addon, __('node blocks', 'fg-drupal-to-wp'), $premium_url, $premium_url . 'nodeblock/', __('NodeBlock add-on', 'fg-drupal-to-wp'))
				),
				
			);
			foreach ( $modules as $module ) {
				list($callback, $params, $plugin, $message) = $module;
				if ( !is_plugin_active($plugin) ) {
					if ( call_user_func_array($callback, $params) ) {
						$this->plugin->display_admin_warning($message);
					}
				}
			}
		}

		/**
		 * Count the number of rows in the table
		 *
		 * @param string $table Table
		 * @param int $min_value Minimum value to trigger the warning message
		 * @return bool Trigger the warning or not
		 */
		private function count($table, $min_value) {
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "SELECT COUNT(*) AS nb FROM ${prefix}${table}";
			return ($this->count_sql($sql) > $min_value);
		}

		/**
		 * Count the number of custom nodes
		 *
		 * @since 1.3.0
		 * 
		 * @param string $table Table
		 * @param int $min_value Minimum value to trigger the warning message
		 * @return bool Trigger the warning or not
		 */
		private function count_custom_nodes($table, $min_value) {
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT COUNT(*) AS nb FROM ${prefix}${table}
				WHERE type NOT IN('article', 'page')
			";
			return ($this->count_sql($sql) > $min_value);
		}

		/**
		 * Count the number of custom taxonomies
		 *
		 * @since 1.3.0
		 * 
		 * @param string $term_table Terms table
		 * @param string $vocabulary_table Vocabulary table
		 * @param int $min_value Minimum value to trigger the warning message
		 * @return bool Trigger the warning or not
		 */
		private function count_custom_taxonomies($term_table, $vocabulary_table, $min_value) {
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT COUNT(*) AS nb FROM ${prefix}${term_table} t
				INNER JOIN ${prefix}${vocabulary_table} tv ON tv.vid = t.vid
				WHERE tv.name NOT IN('categories', 'tags')
			";
			return ($this->count_sql($sql) > $min_value);
		}

		/**
		 * Count the number of Drupal 8 custom taxonomies
		 *
		 * @since 1.3.0
		 * 
		 * @param int $min_value Minimum value to trigger the warning message
		 * @return bool Trigger the warning or not
		 */
		private function count_drupal8_custom_taxonomies($min_value) {
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT COUNT(*) AS nb FROM ${prefix}taxonomy_term_field_data
				WHERE vid NOT IN('categories', 'tags')
			";
			return ($this->count_sql($sql) > $min_value);
		}

		/**
		 * Check if a Drupal 7 module is installed
		 *
		 * @since 1.14.0
		 * 
		 * @param string $module Module
		 * @return bool Trigger the warning or not
		 */
		private function check_drupal7_module($module) {
			$prefix = $this->plugin->plugin_options['prefix'];
			$sql = "
				SELECT COUNT(*) AS nb FROM ${prefix}field_config
				WHERE module = '$module'
			";
			return ($this->count_sql($sql) > 0);
		}

		/**
		 * Execute the SQL request and return the nb value
		 *
		 * @param string $sql SQL request
		 * @return int Count
		 */
		private function count_sql($sql) {
			$count = 0;
			$result = $this->plugin->drupal_query($sql, false);
			if ( isset($result[0]['nb']) ) {
				$count = $result[0]['nb'];
			}
			return $count;
		}

	}
}
