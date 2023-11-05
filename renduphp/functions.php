<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function renduphp_setup() {
	load_theme_textdomain( 'renduphp', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'renduphp' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'renduphp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

add_action( 'after_setup_theme', 'renduphp_setup' );

function renduphp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'renduphp_content_width', 640 );
}

add_action( 'after_setup_theme', 'renduphp_content_width', 0 );

function renduphp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'renduphp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'renduphp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'renduphp_widgets_init' );

function renduphp_scripts() {
	wp_enqueue_style( 'renduphp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'renduphp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'renduphp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'renduphp_scripts' );


function fonction_post_type_revêtements() {
	register_post_type('revetements', array(
		'labels' => array(
			'name' => 'Revêtements',
			'singular_name' => 'Revêtement',
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ), 
	));

	
	register_taxonomy('type_revêtements', 'revetements', array(
		'labels' => array(
			'name' => 'Types de Revêtements',
			'singular_name' => 'Type de Revêtement',
		),
		'hierarchical' => true,
	));
}

add_action('init', 'fonction_post_type_revêtements');


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
