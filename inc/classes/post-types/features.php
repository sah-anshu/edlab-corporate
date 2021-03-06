<?php
/**
 * Registers the "Features" custom post type
 *
 * @package     Corporate WordPress theme
 * @subpackage  Post Types
 * @author      WPExplorer.com
 * @link        https://www.wpexplorer.com
 * @since       2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WPEX_Features_Post_Type' ) ) {

	class WPEX_Features_Post_Type {

		/**
		 * Class Constructor
		 *
		 * @since   2.0.0
		 * @access  public
		 */
		public function __construct() {

			// Adds the features post type and taxonomies
			add_action( 'init', array( $this, 'register' ), 0 );

			// Thumbnail support for features posts
			add_theme_support( 'post-thumbnails', array( 'features' ) );

			// Adds columns in the admin view for thumbnail and taxonomies
			add_filter( 'manage_edit-features_columns', array( $this, 'edit_cols' ) );
			add_action( 'manage_posts_custom_column', array( $this, 'cols_display' ), 10, 2 );
			
		}
		

		/**
		 * Register the post type
		 *
		 * @since   2.0.0
		 * @access  public
		 *
		 * @link	http://codex.wordpress.org/Function_Reference/register_post_type
		 */
		public function register() {

			// Declare post type labels
			$labels = array(
				'name'					=> esc_html__( 'Features', 'wpex-corporate' ),
				'menu_name'				=> esc_html__( 'Home Features', 'wpex-corporate' ),
				'singular_name'			=> esc_html__( 'Features Item', 'wpex-corporate' ),
				'add_new'				=> esc_html__( 'Add New Item', 'wpex-corporate' ),
				'add_new_item'			=> esc_html__( 'Add New Features Item', 'wpex-corporate' ),
				'edit_item'				=> esc_html__( 'Edit Features Item', 'wpex-corporate' ),
				'new_item'				=> esc_html__( 'Add New Features Item', 'wpex-corporate' ),
				'view_item'				=> esc_html__( 'View Item', 'wpex-corporate' ),
				'search_items'			=> esc_html__( 'Search Features', 'wpex-corporate' ),
				'not_found'				=> esc_html__( 'No features items found', 'wpex-corporate' ),
				'not_found_in_trash'	=> esc_html__( 'No features items found in trash', 'wpex-corporate' )
			);
			
			// Declare post type args
			$args = array(
				'labels'				=> $labels,
				'public'				=> true,
				'publicly_queryable'    => false,
				'supports'				=> array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
				'capability_type'		=> 'post',
				'rewrite'				=> array( 'slug' => 'features' ),
				'has_archive'			=> false,
				'menu_icon'				=> 'dashicons-star-filled',
				'exclude_from_search'	=> true,
			); 
			
			// Apply filters for child theming
			$args = apply_filters( 'wpex_features_args', $args );
			
			// Register the features post type
			register_post_type( 'features', $args );
		}

		/**
		 * Adds columns in the admin view for thumbnail and taxonomies
		 *
		 * @since   2.0.0
		 * @access  public
		 */
		public function edit_cols( $features_columns ) {
			$features_columns = array(
				"cb"					=> "<input type=\"checkbox\" />",
				"title"					=> esc_html__('Title', 'wpex-corporate'),
				"features_thumbnail"	=> esc_html__('Thumbnail', 'wpex-corporate')
			);
			return $features_columns;
		}

		/**
		 * Adds columns in the admin view for thumbnail and taxonomies
		 *
		 * @since   2.0.0
		 * @access  public
		 */
		public function cols_display( $features_columns, $post_id ) {

			switch ( $features_columns ) {

				// Display the thumbnail in the column view
				case "features_thumbnail":

					// Get post thumbnail ID
					$thumbnail_id = get_post_thumbnail_id();

					// Display the featured image in the column view if possible
					if ( $thumbnail_id ) {
						$thumb = wp_get_attachment_image( $thumbnail_id, array( '80', '80' ), true );
					}

					if ( isset( $thumb ) ) {
						echo wp_kses_post( $thumb );
					} else {
						echo '&mdash;';
					}

				break;
			
			}
		}

	}

}
$wpex_features_post_type = new WPEX_Features_Post_Type;