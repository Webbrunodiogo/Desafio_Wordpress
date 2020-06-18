<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! isset( $content_width ) ) $content_width = 1280;

function skelementor_init() {

    add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'custom-logo', array(
		'width' => 260,
		'height' => 100,
		'flex-height' => true,
		'flex-width' => true,
	) );
	add_theme_support( 'custom-header' );
	add_theme_support( 'woocommerce' );
	add_post_type_support( 'page', 'excerpt' );
	
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'skelementor' ) )
	);

	load_theme_textdomain( 'skelementor', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'skelementor_init' );

function skelementor_comment_reply() {
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'comment_form_before', 'skelementor_comment_reply' );

function skelementor_scripts_styles() {
	wp_enqueue_style( 'skelementor-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'skelementor_scripts_styles' );

function skelementor_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
};
add_action( 'elementor/theme/register_locations', 'skelementor_register_elementor_locations' );

/**
* Plugin: skelementor
* Descrição: Custom Post Type Personalizado.
* desenvolvedor: Bruno Diogo Fernandes Ferreira da Silva
* Version: 1.0
*/

// Cria a função Post Type

function new_post_type_() {
  
	// setando os labels do menu Beneficios
	
	$labels = array(
	  'name' => _x( 'Beneficios', 'Post Type General Name', 'skelementor' ),
	  'singular_name' => _x( 'Beneficio', 'Post Type Singular Name', 'skelementor' ),
	  'menu_name' => __( 'Beneficios', 'skelementor' ),
	  'all_items' => __( 'Todos os Beneficios', 'skelementor' ),
	  'view_item' => __( 'Ver Beneficios', 'skelementor' ),
	  'add_new_item' => __( 'Adicionar novo Beneficio', 'skelementor' ),
	  'add_new' => __( 'Adicionar Beneficio', 'skelementor' ), 
	  'edit_item' => __( 'Editar Beneficios', 'skelementor' ),
	  'update_item' => __( 'Atualizar Beneficios', 'skelementor' ),
	  'search_items' => __( 'Pesquisar Beneficios', 'skelementor' ),
	  'not_found' => __( 'Não Encontrado', 'skelementor' ),
	  'not_found_in_trash' => __( 'Não encontrado na lixeira', 'skelementor' ),
	);
	
	// Configurando os parâmetros
	
	$args = array(
	  'label' => __( 'beneficios', 'skelementor' ),
	  'description' => __( 'Cadastro de Beneficios.', 'skelementor' ),
	  'labels' => $labels,
	  'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
	  'taxonomies' => array( 'Categorias', 'Local' ),
	  'hierarchical' => false, 'public' => true,
	  'show_ui' => true, 'show_in_menu' => true, 'show_in_nav_menus' => true,
	  'show_in_admin_bar' => true, 'menu_position' => 6, 'menu_icon' => 'dashicons-clipboard',
	  'can_export' => true,
	  'has_archive' => true,
	  'exclude_from_search' => false,
	  'publicly_queryable' => true,
	  'capability_type' => 'post',
	  'rewrite' => array('slug' => 'beneficios'),
	);
	
	function namespace_add_custom_types( $query ) { 
	  if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) { 
		$query->set( 'post_type', array( 'post', 'beneficios' ))
	  ; } return $query;
	}
	
	add_filter( 'pre_get_posts', 'namespace_add_custom_types' );
	
	// Faz o registro
	
	register_post_type( 'beneficios', $args ); }
  

	//Incia o menu beneficios
	add_action( 'init', 'new_post_type_', 0 );

	

	function campos_beneficios() {
		
	//Campos Personalizados
	if( function_exists( "register_field_group" ) ):

		register_field_group(array(
			'key' => 'grupo_beneficios',
			'title' => 'Beneficios',
			'fields' => array(
				array(
					'key' => 'campo1',
					'label' => 'URL',
					'name' => 'url',
					'type' => 'url',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'campo2',
					'label' => 'logo',
					'name' => 'logo',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'campo3',
					'label' => 'Imagem',
					'name' => 'imagem',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'campo4',
					'label' => 'Nome Empresa',
					'name' => 'nome_empresa',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'campo5',
					'label' => 'Porcentagem de Desconto',
					'name' => 'porcentagem_de_desconto',
					'type' => 'number',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'beneficios',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		endif;
	}
		
	add_action( 'acf/register_fields', 'campos_beneficios' );