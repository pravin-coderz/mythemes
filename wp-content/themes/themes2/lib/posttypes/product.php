<?php 
//partner post type
add_action('init', 'create_products', 0);

function create_products() {
    $labels = array(
        'name' => _x('Product', 'post type general name'),
        'singular_name' => _x('Product', 'post type singular name'),
        'add_new' => _x('Add Product', 'Event'),
        'add_new_item' => __('Add Product'),
        'edit_item' => __('Edit Product'),
        'new_item' => __('New Product'),
        'view_item' => __('View Product'),
        'search_items' => __('Search Product'),
        'not_found' => __('No Product found'),
        'not_found_in_trash' => __('No Product found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
    );

    //Register the product post type.
    register_post_type('product', $args);
        register_taxonomy("product_cat", "product", array("hierarchical" => true,
        "label" => "Product Categories",
        "singular_label" => "Product",
        'rewrite' => array('slug' => 'product','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );

}