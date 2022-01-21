<?php

function custom_post_type_init()
{
    $labels_video = array(
        'name'                => __('Videos'),
        'singular_name'       => __('Video'),
        'menu_name'           => __('Videos'),
        'parent_item_colon'   => __('Parent Video'),
        'all_items'           => __('All Videos'),
        'view_item'           => __('View Video'),
        'add_new_item'        => __('Add New Video'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Video'),
        'update_item'         => __('Update Video'),
        'search_items'        => __('Search Video'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash'),
    );

    $args_video = array(
        'label'               => __('Videos'),
        'description'         => __('Video news and reviews'),
        'labels'              => $labels_video,
        'supports'            => array('title',   'revisions', 'custom-fields'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => true,
        'taxonomies'          => array('video-category'),
    );


    register_post_type('video', $args_video);

    register_taxonomy('video-category', 'video', array('hierarchical' => true, 'label' => 'Video category', 'query_var' => true, 'rewrite' => true));
}

add_action('init', 'custom_post_type_init');

