<?php 
//team post type
add_action('init', 'create_team', 0);

function create_team() {
    $labels = array(
        'name' => _x('Team', 'post type general name'),
        'singular_name' => _x('Team', 'post type singular name'),
        'add_new' => _x('Add Team', 'Event'),
        'add_new_item' => __('Add Team'),
        'edit_item' => __('Edit Team'),
        'new_item' => __('New Team'),
        'view_item' => __('View Team'),
        'search_items' => __('Search Team'),
        'not_found' => __('No Team found'),
        'not_found_in_trash' => __('No Team found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
    );

    //Register the team post type.
    register_post_type('team', $args);
        register_taxonomy("team_cat", "team", array("hierarchical" => true,
        "label" => "Team Categories",
        "singular_label" => "Team",
        'rewrite' => array('slug' => 'team','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );

}