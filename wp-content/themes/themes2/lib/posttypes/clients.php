<?php add_action('init', 'create_clients', 0);

function create_clients() {
    $labels = array(
        'name' => _x('Clients', 'post type general name'),
        'singular_name' => _x('Clients', 'post type singular name'),
        'add_new' => _x('Add Clients', 'Clients'),
        'add_new_item' => __('Add Clients'),
        'edit_item' => __('Edit Clients'),
        'new_item' => __('New Clients'),
        'view_item' => __('View Clients'),
        'search_items' => __('Search Clients'),
        'not_found' => __('No Clients found'),
        'not_found_in_trash' => __('No Clients found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'clients','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
    );

    register_post_type('clients', $args);
    register_taxonomy("clients_cat", "clients", array("hierarchical" => true,
        "label" => "Clients Categories",
        "singular_label" => "Clients",
        'rewrite' => array('slug' => 'clients','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );

}
?>