<?php
/**
 * Create and register a taxonomy
 */
class BIMGExampleTaxonomy
{
    public function __construct()
    {
        add_action( 'init', array( $this, 'create_example_taxonomy' ) );
    }

    /*
     * Define the taxonomy.
     *
     * Reference: http://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    public function create_example_taxonomy() {
        $labels = array(
            'name' => 'Taxonomy Examples',
            'singular_name' => 'Taxonomy Example',
            // 'menu_name' => '', // Defaults to the value of 'name'
            'all_items' => 'All Taxonomy Examples', // Default: 'All Tags/Categories'
            'edit_item' => 'Edit Taxonomy Example', // Default: 'Edit Tag/Category'
            'view_item' => 'View Taxonomy Example', // Default: 'View Tag/Category'
            'update_item' => 'Update Taxonomy Example', // Default: 'Update Tag/Category'
            'add_new_item' => 'Add New Taxonomy Example', // Default: 'Add New Tag/Category'
            'new_item_name' => 'New Taxonomy Example Name', // Default: 'New Tag/Category Name'
            // 'parent_item' => '', // Only for Hierarchical taxonomies! Default: 'Parent Category'
            // 'parent_item_colon' => '', // Only for Hierarchical taxonomies! Default: 'Parent Category:'
            'search_items' => 'Search Taxonomy Examples', // Default: 'Search Tags/Categories'
            'popular_items' => 'Popular Taxonomy Examples', // Not used on heirarchies. Default: 'Popular Tags'
            'separate_items_with_commas' => 'Separate taxonomy examples with commas', // Not used on hierarchies
            'add_or_remove_items' => 'Add or remove taxonomy examples', // Not used on hierarchies
            'choose_from_most_used' => 'Choose from the most used taxonomy examples', // Not used on hierarchies
            'not_found' => 'No taxonomy examples found', // Not used on hierarchies, Default: 'No tags found'
        );

        $rewrite = array(
            'slug' => 'example-taxonomies', // Defaults to $post_type
            // 'with_front' => true, // Default: true
            // 'feeds' => false, // Defaults to 'has_archive' value
            // 'pages' => true, // Default: true
            // 'ep_mask' => const, // See documentation
        );

        $args = array(
            'hierarchical' => false, // true behaves like Categories, false behaves like Tags, Default: false
            'labels' => $labels,
            'public' => true, // boolean, Default: true
            // 'show_ui' => true, // Default: value of 'public'
            // 'show_in_nav_menus => true, // Default: value of 'public'
            // 'show_tagcloud' => true, // Default: value of 'show_ui'
            // 'menu_position' => null, // Integer 5-10, Pass decimal value as string to get more control (ex. "5.1"). Default: null
            // 'menu_icon' => null, // Use dashicons (ex. 'dashicons-video-alt')
            // 'show_admin_column' => false, // Default: false
            // 'query_var' => false, // boolean or string, Default: true set to $post_type
            'rewrite' => $rewrite, // set to false to prevent rewrites
            // 'capabilities' => array(), // Restrict post type access; see documentation
            // 'sort' => false,
        );

        register_taxonomy( 'example_taxonomy', array( 'example', ), $args );
    }
}

