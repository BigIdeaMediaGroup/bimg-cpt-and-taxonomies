<?php
/**
 * Create and register a custom post type
 */
class KOCHTestimonial {
    public function __construct()
    {
        add_action( 'init', array( $this, 'create_testimonial_post_type' ) );
    }

    /*
     * Define the post type.
     *
     * Reference: http://codex.wordpress.org/Function_Reference/register_post_type
     */
    public function create_testimonial_post_type() {
        $labels = array(
            'name' => 'Testimonial',
            'singular_name' => 'Testimonial',
            // 'menu_name' => '', // Defaults to the value of 'name'
            // 'name_admin_bar => '', // Defaults to the value of 'singular_name'
            'all_items' => 'All Testimonials', // Defaults to the value of 'name'
            // 'add_new' => '', // Default: 'Add New'
            'add_new_item' => 'Add New Testimonial', // Default: 'Add New Post/Page'
            'edit_item' => 'Edit Testimonial', // Default: 'Edit Post/Page'
            'new_item' => 'New Testimonial', // Default: 'New Post/Page'
            'view_item' => 'View Testimonial', // Default: 'View Post/Page'
            'search_items' => 'Search Testimonial', // Default: 'Search Posts/Pages'
            'not_found' => 'No testimonial found', // Default: 'No posts/pages found'
            'not_found_in_trash' => 'No testimonial found in Trash', // Default: 'No posts/pages found in Trash.'
            // 'parent_item_colon' => '', // Only for Hierarchical post types! Default: 'Parent Page'
        );

        $supports = array(
            'title',
            //'editor',
            //'author',
            //'thumbnail',
            //'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'comments',
            //'revisions',
            //'page-attributes',
            //'post-formats',
        );

        $rewrite = array(
            'slug' => 'testimonials', // Defaults to $post_type
            // 'with_front' => true, // Default: true
            // 'feeds' => false, // Defaults to 'has_archive' value
            // 'pages' => true, // Default: true
            // 'ep_mask' => const, // See documentation
        );

        $args = array(
            'hierarchical' => false, // If true, you must add 'page-attributes' to the 'supports' array.
            'labels' => $labels,
            'description' => 'For adding new testimonials.', // string
            'public' => true, // boolean
            // 'exclude_from_search' => false, // Default: value opposite of 'public'
            // 'publicly_queryable' => true, // Default: value of 'public'
            // 'show_ui' => true, // Default: value of 'public'
            // 'show_in_nav_menus => true, // Default: value of 'public'
            // 'show_in_menu => true, // Default: value of 'show_ui'
            // 'show_in_admin_bar => true, // Default: value of 'show_in_menu'
            // 'menu_position' => null, // Integer 5-10, Pass decimal value as string to get more control (ex. "5.1"). Default: null
            // 'menu_icon' => null, // Use dashicons (ex. 'dashicons-video-alt')
            // 'capabilities' => array(), // Restrict post type access to users with certain capabilites. See reference.
            // 'hierarchical' => false, // If true, you must add 'page-attributes' to the 'supports' array.
            'supports' => $supports, // Can also be set to false to turn off default (title and editor) behavior
            // 'taxonomies' => array(), // Default: null
            // 'has_archive' => false, // boolean, Default: false
            'rewrite' => $rewrite, // Set to false to prevent rewrites
            // 'query_var' => false, // boolean or string, Default: true set to $post_type
            // 'can_export' => true, // boolean, Default: true
        );

        register_post_type( 'koch_testimonial', $args );
    }
}

