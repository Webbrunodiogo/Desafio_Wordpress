<?php

/**
* Plugin: Beneficios
* Descrição: Custom Post Type Personalizado.
* desenvolvedor: Bruno Diogo Fernandes Ferreira da Silva
* Version: 1.0
*/

// Cria a função Post Type

function new_post_type_() {
  
  // seta os labels CPT
  
  $labels = array(
    'name' => _x( 'Case Studies', 'Post Type General Name', 'Beneficios' ),
    'singular_name' => _x( 'Case Study', 'Post Type Singular Name', 'Beneficios' ),
    'menu_name' => __( 'Case Studies', 'Beneficios' ),
    'parent_item_colon' => __( 'Parent Case Study', 'Beneficios' ),
    'all_items' => __( 'All Case Studies', 'Beneficios' ),
    'view_item' => __( 'View Case Study', 'Beneficios' ),
    'add_new_item' => __( 'Add New Case Study', 'Beneficios' ),
    'add_new' => __( 'Add New', 'Beneficios' ), 'edit_item' => __( 'Edit Case Study', 'Beneficios' ),
    'update_item' => __( 'Update Case Study', 'Beneficios' ),
    'search_items' => __( 'Search Case Study', 'Beneficios' ),
    'not_found' => __( 'Not Found', 'Beneficios' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'Beneficios' ),
  );
  
  // Set other options for Case Study CPT
  
  $args = array(
    'label' => __( 'case-studies', 'Beneficios' ),
    'description' => __( 'Human-centered creative solutions.', 'Beneficios' ),
    'labels' => $labels,
    'supports' => array( 'title', /*'editor', 'excerpt',*/ 'author', 'thumbnail', 'revisions', /*'custom-fields',*/ 'categories', ),
    'taxonomies' => array( 'category' ),
    'hierarchical' => false, 'public' => true,
    'show_ui' => true, 'show_in_menu' => true, 'show_in_nav_menus' => true,
    'show_in_admin_bar' => true, 'menu_position' => 6, 'menu_icon' => 'dashicons-analytics',
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'case-studies'),
  );
  
  function namespace_add_custom_types( $query ) { 
    if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) { 
      $query->set( 'post_type', array( 'post', 'case-studies' ))
    ; } return $query;
  }
  
  add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
  
  // Registering my Case Study CPT
  
  register_post_type( 'case-studies', $args ); }

  /*
  * Hook into the 'init' action so that the function
  * Containing our post type registration is not
  * unnecessarily executed.
  */

  add_action( 'init', 'new_post_type_', 0 );
?>