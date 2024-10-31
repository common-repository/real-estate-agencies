<?php
/**
 * This class is responsible for the agent post type
 * and related stuff. E.g: agent taxonomies, metadata
 *
 * @since      1.0.0
 * @package    Real_Estate_Agents
 * @subpackage Real_Estate_Agents/admin
 * @author     PearlThemes <hello@pearlthemes.com>
 */

class Pearl_Agent_Post_Type {

	// Register Agent Post Type
	function register_agent_post_type() {

		$labels = array(
			'name'                  => esc_html_x( 'Agents', 'Post Type General Name', 'real-estate-agencies' ),
			'singular_name'         => esc_html_x( 'Agent', 'Post Type Singular Name', 'real-estate-agencies' ),
			'menu_name'             => esc_html__( 'Agents', 'real-estate-agencies' ),
			'name_admin_bar'        => esc_html__( 'Agent', 'real-estate-agencies' ),
			'archives'              => esc_html__( 'Agent Archives', 'real-estate-agencies' ),
			'attributes'            => esc_html__( 'Agent Attributes', 'real-estate-agencies' ),
			'parent_item_colon'     => esc_html__( 'Parent Agent:', 'real-estate-agencies' ),
			'all_items'             => esc_html__( 'All Agents', 'real-estate-agencies' ),
			'add_new_item'          => esc_html__( 'Add New Agent', 'real-estate-agencies' ),
			'add_new'               => esc_html__( 'Add New', 'real-estate-agencies' ),
			'new_item'              => esc_html__( 'New Agent', 'real-estate-agencies' ),
			'edit_item'             => esc_html__( 'Edit Agent', 'real-estate-agencies' ),
			'update_item'           => esc_html__( 'Update Agent', 'real-estate-agencies' ),
			'view_item'             => esc_html__( 'View Agent', 'real-estate-agencies' ),
			'view_items'            => esc_html__( 'View Agents', 'real-estate-agencies' ),
			'search_items'          => esc_html__( 'Search Agent', 'real-estate-agencies' ),
			'not_found'             => esc_html__( 'No Agent found', 'real-estate-agencies' ),
			'not_found_in_trash'    => esc_html__( 'No Agent found in Trash', 'real-estate-agencies' ),
			'insert_into_item'      => esc_html__( 'Insert into Agent', 'real-estate-agencies' ),
			'uploaded_to_this_item' => esc_html__( 'Uploaded to this Agent', 'real-estate-agencies' ),
			'items_list'            => esc_html__( 'Agents list', 'real-estate-agencies' ),
			'items_list_navigation' => esc_html__( 'Agents list navigation', 'real-estate-agencies' ),
			'filter_items_list'     => esc_html__( 'Filter agents list', 'real-estate-agencies' ),
		);
		$args   = array(
			'label'               => esc_html__( 'Agent', 'real-estate-agencies' ),
			'description'         => esc_html__( 'A real estate listing that allows users to publish their Agents.', 'real-estate-agencies' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 7,
			'menu_icon'           => 'dashicons-businessman',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		);
		$args = apply_filters('pearl_agent_post_type_args', $args);
		register_post_type( 'agent', $args );
	}

	/**
	 * Register meta boxes related to agent post type
	 *
	 * @param   array $meta_boxes
	 *
	 * @since   1.0.0
	 * @return  array   $meta_boxes
	 */
	public function register_meta_boxes( $meta_boxes ) {

		$prefix = 'pearl_';

		$meta_boxes[] = array(
			'id'     => 'agent-meta-box',
			'title'  => esc_html__( 'Agent Details', 'real-estate-agencies' ),
			'pages'  => array( 'agent' ),
			'fields' => array(
				array(
					'id'   => "{$prefix}agent_email",
					'name' => esc_html__( 'Email', 'real-estate-agencies' ),
					'desc' => esc_html__( 'Agent email address for contact.', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}designation",
					'name' => esc_html__( 'Designation', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}mobile_number",
					'name' => esc_html__( 'Mobile Number', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => 'social_profiles_divider',
					'type' => 'divider',
				),
				array(
					'id'   => "{$prefix}facebook_profile",
					'name' => esc_html__( 'Facebook Profile Link', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}twitter_profile",
					'name' => esc_html__( 'Twitter Profile Link', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}google_plus_profile",
					'name' => esc_html__( 'Google Plus Profile Link', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}linkedin_profile",
					'name' => esc_html__( 'Linkedin Profile Link', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}instagram_profile",
					'name' => esc_html__( 'Instagram Profile Link', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}pinterest_profile",
					'name' => esc_html__( 'Pinterest Profile Link', 'real-estate-agencies' ),
					'type' => 'text',
				),
				array(
					'id'   => "{$prefix}youtube_profile",
					'name' => esc_html__( 'YouTube Profile Link', 'real-estate-agencies' ),
					'type' => 'text',
				),
			)
		);

		// apply a filter before returning meta boxes
		$meta_boxes = apply_filters( 'real_estate_agent_meta_boxes', $meta_boxes );

		return $meta_boxes;
	}


	/**
	 * Edit Agent Custom Post Type Columns
	 *
	 * @param   array $columns
	 *
	 * @since   1.0.0
	 * @return  array $columns
	 */
	public function edit_agent_columns( $columns ) {

		$custom_columns = array(
			'cb'          => '<input type="checkbox" />',
			'title'       => __( 'Name', 'real-estate-properties' ),
			'agent-photo' => __( 'Photo', 'real-estate-properties' ),
			'agent-email' => __( 'Email', 'real-estate-properties' ),
			'agent-phone' => __( 'Phone', 'real-estate-properties' ),
			'agent-desi'  => 'Designation',
			'date'        => 'Date',
		);

		return $custom_columns;
	}

	/**
	 * Modify Column Values
	 *
	 * @param   array $column
	 *
	 * @since   1.0.0
	 */
	public function agent_custom_columns( $column ) {

		$post_id = get_the_ID();

		switch ( $column ) {
			case 'agent-photo' :
				echo get_the_post_thumbnail( $post_id, 'thumbnail' );
				break;

			case 'agent-email' :
				echo get_post_meta( $post_id, 'pearl_agent_email', true );
				break;

			case 'agent-phone' :
				echo get_post_meta( $post_id, 'pearl_mobile_number', true );
				break;

			case 'agent-desi' :
				echo get_post_meta( $post_id, 'pearl_designation', true );
				break;
		}
	}
}