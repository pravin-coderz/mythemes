<?php add_action('init', 'create_service', 0);

function create_service() {
    $labels = array(
        'name' => _x('Service', 'post type general name'),
        'singular_name' => _x('Service', 'post type singular name'),
        'add_new' => _x('Add Service', 'Service'),
        'add_new_item' => __('Add Service'),
        'edit_item' => __('Edit Service'),
        'new_item' => __('New Service'),
        'view_item' => __('View Service'),
        'search_items' => __('Search Service'),
        'not_found' => __('No Service found'),
        'not_found_in_trash' => __('No Service found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service','with_front' => FALSE,),
        'capability_type' => 'post',
        'hierarchical' => true,
        'menu_position' => 7,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
    );

    register_post_type('service', $args);
    register_taxonomy("service_cat", "service", array("hierarchical" => true,
        "label" => "service Categories",
        "singular_label" => "service",
        'rewrite' => array('slug' => 'service','with_front' => FALSE,),
        "query_var" => true,
        "show_ui" => true
            )
    );
    add_filter('post_link', 'service_permalink', 1, 3);
    add_filter('post_type_link', 'service_permalink', 1, 3);

   function service_permalink($permalink, $post_id, $leavename)
   {
       //con %brand% catturo il rewrite del Custom Post Type
       if (strpos($permalink, '%service_cat%') === FALSE) return $permalink;
       // Get post
       $post = get_post($post_id);
       if (!$post) return $permalink;
       $args_proj_cate = array('orderby' => 'term_order', 'order' => 'ASC', 'fields' => 'all');
       // Get taxonomy terms
       $terms = wp_get_object_terms($post->ID, 'service_cat',$args_proj_cate);
       $par_id = $post->post_parent;
       $terms_par = wp_get_object_terms($par_id, 'service_cat',$args_proj_cate);
       if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
           $taxonomy_slug = $terms[0]->slug;
       else $taxonomy_slug = $terms_par[0]->slug;

       return str_replace('%service_cat%', $taxonomy_slug, $permalink);
   }

}
?>