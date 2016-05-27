<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}

// Register Custom Post Type
function bp_boxes() {

    $labels = array(
        'name'                  => _x( 'Boxes', 'Post Type General Name', 'boxpop' ),
        'singular_name'         => _x( 'Box', 'Post Type Singular Name', 'boxpop' ),
        'menu_name'             => __( 'Boxes', 'boxpop' ),
        'name_admin_bar'        => __( 'Box', 'boxpop' ),
        'archives'              => __( 'Box archives', 'boxpop' ),
        'parent_item_colon'     => __( 'Box parente:', 'boxpop' ),
        'all_items'             => __( 'Toutes les box', 'boxpop' ),
        'add_new_item'          => __( 'Ajouter nouvelle box', 'boxpop' ),
        'add_new'               => __( 'Ajouter', 'boxpop' ),
        'new_item'              => __( 'Créer', 'boxpop' ),
        'edit_item'             => __( 'Editer', 'boxpop' ),
        'update_item'           => __( 'Mettre à jour', 'boxpop' ),
        'view_item'             => __( 'Voir la box', 'boxpop' ),
        'search_items'          => __( 'Rechercher une box', 'boxpop' ),
        'not_found'             => __( 'Non trouvée', 'boxpop' ),
        'not_found_in_trash'    => __( 'Non trouvée dans la corbeille', 'boxpop' ),
        'featured_image'        => __( 'Image principale', 'boxpop' ),
        'set_featured_image'    => __( 'Sélectionner image principale', 'boxpop' ),
        'remove_featured_image' => __( 'Supprimer image principale', 'boxpop' ),
        'use_featured_image'    => __( 'Utiliser comme image principale', 'boxpop' ),
        'insert_into_item'      => __( 'Insérer dans la box', 'boxpop' ),
        'uploaded_to_this_item' => __( 'Téléverser vers la box', 'boxpop' ),
        'items_list'            => __( 'Liste de boxes', 'boxpop' ),
        'items_list_navigation' => __( 'Navigation de boxes', 'boxpop' ),
        'filter_items_list'     => __( 'Filtrer les boxes', 'boxpop' ),
    );
    $args = array(
        'label'                 => __( 'Box', 'boxpop' ),
        'description'           => __( 'Boxes', 'boxpop' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-upload',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'box', $args );

}
add_action( 'init', 'bp_boxes', 0 );

// Register Custom Post Type
function bp_shops() {

    $labels = array(
        'name'                  => _x( 'Boutiques', 'Post Type General Name', 'boxpop' ),
        'singular_name'         => _x( 'Boutique', 'Post Type Singular Name', 'boxpop' ),
        'menu_name'             => __( 'Boutiques', 'boxpop' ),
        'name_admin_bar'        => __( 'Boutique', 'boxpop' ),
        'archives'              => __( 'Archives des boutiques', 'boxpop' ),
        'parent_item_colon'     => __( 'Boutique parente:', 'boxpop' ),
        'all_items'             => __( 'Toutes les boutiques', 'boxpop' ),
        'add_new_item'          => __( 'Ajouter nouvelle boutique', 'boxpop' ),
        'add_new'               => __( 'Ajouter', 'boxpop' ),
        'new_item'              => __( 'Créer', 'boxpop' ),
        'edit_item'             => __( 'Editer', 'boxpop' ),
        'update_item'           => __( 'Mettre à jour', 'boxpop' ),
        'view_item'             => __( 'Voir la boutique', 'boxpop' ),
        'search_items'          => __( 'Rechercher une boutique', 'boxpop' ),
        'not_found'             => __( 'Non trouvée', 'boxpop' ),
        'not_found_in_trash'    => __( 'Non trouvée dans la corbeille', 'boxpop' ),
        'featured_image'        => __( 'Image principale', 'boxpop' ),
        'set_featured_image'    => __( 'Sélectionner image principale', 'boxpop' ),
        'remove_featured_image' => __( 'Supprimer image principale', 'boxpop' ),
        'use_featured_image'    => __( 'Utiliser comme image principale', 'boxpop' ),
        'insert_into_item'      => __( 'Insérer dans la boutique', 'boxpop' ),
        'uploaded_to_this_item' => __( 'Téléverser vers la boutique', 'boxpop' ),
        'items_list'            => __( 'Liste de boutiques', 'boxpop' ),
        'items_list_navigation' => __( 'Navigation de boutiques', 'boxpop' ),
        'filter_items_list'     => __( 'Filtrer les boutiques', 'boxpop' ),
    );
    $args = array(
        'label'                 => __( 'Boutique', 'boxpop' ),
        'description'           => __( 'Boutique en ligne', 'boxpop' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', ),
        'taxonomies'            => array( 'category', 'post_tag', 'cb_review_checkbox' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-store',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'boutique', $args );

}
add_action( 'init', 'bp_shops', 0 );

?>