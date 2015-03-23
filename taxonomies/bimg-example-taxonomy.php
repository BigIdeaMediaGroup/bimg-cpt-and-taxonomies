<?php
/**
 * Create and register a taxonomy
 *
 * To create a new taxonomy, copy and rename this file. Edit the SINGULAR and
 * PLURAL constants, and the $labels, $rewrite, $args, and $object_types arrays
 * as needed.
 */
class BIMGExampleTaxonomy
{
    const SINGULAR = 'Taxonomy Item';
    const PLURAL = 'Taxonomy Items';

    public function __construct()
    {
        add_action( 'init', array( $this, 'create_example_taxonomy' ) );
    }

    /*
     * Define the taxonomy.
     *
     * Reference: http://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    public function create_example_taxonomy()
    {
        $labels = array(
            'name' => self::PLURAL,
            'singular_name' => self::SINGULAR,
            // 'menu_name' => '', // Defaults to the value of 'name'
            'all_items' => 'All ' . self::PLURAL,
            'edit_item' => 'Edit ' . self::SINGULAR,
            'view_item' => 'View ' . self::SINGULAR,
            'update_item' => 'Update ' . self::SINGULAR,
            'add_new_item' => 'Add New ' . self::SINGULAR,
            'new_item_name' => 'New ' . self::SINGULAR . ' Name',
            // 'parent_item' => '', // Only for Hierarchical taxonomies! Default: 'Parent Category'
            // 'parent_item_colon' => '', // Only for Hierarchical taxonomies! Default: 'Parent Category:'
            'search_items' => 'Search ' . self::PLURAL,
            'popular_items' => 'Popular ' . self::PLURAL, // Not used on heirarchies.
            'separate_items_with_commas' => 'Separate ' . strtolower( self::PLURAL ) . ' with commas', // Not used on hierarchies
            'add_or_remove_items' => 'Add or remove ' . strtolower( self::PLURAL ), // Not used on hierarchies
            'choose_from_most_used' => 'Choose from the most used ' . strtolower( self::PLURAL ), // Not used on hierarchies
            'not_found' => 'No ' . strtolower( self::PLURAL ) . ' found', // Not used on hierarchies
        );

        $rewrite = array(
            'slug' => str_replace( ' ', '-', strtolower( self::PLURAL ) ), // Defaults to $post_type
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

        // Array of post types that the taxonomy applies to.
        $object_types = array(
            'koch_example',
        );

        register_taxonomy( 'koch_' . str_replace( ' ', '_', strtolower( self::SINGULAR ) ), $object_types, $args );

        // Register each object manually for extra security
        foreach ( $object_types as $object_type ) {
            register_taxonomy_for_object_type( 'koch_' . str_replace( ' ', '_', strtolower( self::SINGULAR ) ), $object_type );
        }
    }
}
