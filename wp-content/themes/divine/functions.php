<?php
/**
 * Nu Themes functions and definitions
 *
 * @package Nu Themes
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since nuThemes 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 605; /* pixels */

if ( ! function_exists( 'nuthemes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since nuThemes 1.0
 */
function nuthemes_setup() {

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1280, 720, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nuthemes' ),
	) );

}
endif;
add_action( 'after_setup_theme', 'nuthemes_setup' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since nuThemes 1.0
 */
function nuthemes_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'nuthemes_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @since nuThemes 1.0
 */
function nuthemes_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'nuthemes' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'nuthemes_wp_title', 10, 2 );
function nuthemes_scripts() {
	// Load Bootstrap stylesheet.
	wp_enqueue_style( 'nu-bootstrap', get_template_directory_uri() . '/css/all.min.css', array() );

	// Load Bootstrap JavaScript.
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/scripts-min.js', array( 'jquery' ) );

	// Adds JavaScript to support threaded comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nuthemes_scripts' );

//add our works
add_action( 'init', 'register_post_types' );
//add services
add_action( 'init', 'register_services' );
//add features
add_action( 'init', 'register_features' );
//add steps
add_action( 'init', 'register_steps' );

function register_post_types(){
	register_post_type('ourworks', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Наши работы', // основное название для типа записи
			'singular_name'      => 'Работа', // название для одной записи этого типа
			'add_new'            => 'Добавить работу', // для добавления новой записи
			'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование работы', // для редактирования типа записи
			'new_item'           => 'Новая работа', // текст новой записи
			'view_item'          => 'Смотреть работу', // для просмотра записи этого типа.
			'search_items'       => 'Искать работу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Наши работы', // название меню
		),
		'description'         => 'Работы сделанные нами',
		'public'              => true,
		'publicly_queryable'  => false, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-schedule', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor', 'thumbnail', 'custom-fields'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );


}
function register_services(){
	register_post_type('services', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Наши услуги', // основное название для типа записи
			'singular_name'      => 'Услуга', // название для одной записи этого типа
			'add_new'            => 'Добавить услугу', // для добавления новой записи
			'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
			'new_item'           => 'Новая услуга', // текст новой записи
			'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
			'search_items'       => 'Искать услугу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Наши услуги', // название меню
		),
		'description'         => 'Услуги, предоставляемые нами',
		'public'              => true,
		'publicly_queryable'  => false, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-businessman', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','excerpt', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );


}
function register_features(){
	register_post_type('features', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Наши функции', // основное название для типа записи
			'singular_name'      => 'Функция', // название для одной записи этого типа
			'add_new'            => 'Добавить фукнцию', // для добавления новой записи
			'add_new_item'       => 'Добавление функции', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование функции', // для редактирования типа записи
			'new_item'           => 'Новая функция', // текст новой записи
			'view_item'          => 'Смотреть функцию', // для просмотра записи этого типа.
			'search_items'       => 'Искать функцию', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Наши функции', // название меню
		),
		'description'         => 'Наши функции',
		'public'              => true,
		'publicly_queryable'  => false, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-admin-settings', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','excerpt', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );


}
function register_steps(){
	register_post_type('steps', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Этапы работы', // основное название для типа записи
			'singular_name'      => 'Этап', // название для одной записи этого типа
			'add_new'            => 'Добавить этап', // для добавления новой записи
			'add_new_item'       => 'Добавление этапа', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование этапа', // для редактирования типа записи
			'new_item'           => 'Новый этап', // текст новой записи
			'view_item'          => 'Смотреть этап', // для просмотра записи этого типа.
			'search_items'       => 'Искать этап', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Этапа работы', // название меню
		),
		'description'         => 'Этапа работы',
		'public'              => true,
		'publicly_queryable'  => false, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-controls-play', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );


}


define('NUTHEMES_PATH', get_template_directory() );

/**
 * Customizer additions.
 *
 * @since nuThemes 1.0
 */
require NUTHEMES_PATH . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 *
 * @since nuThemes 1.0
 */
require NUTHEMES_PATH . '/inc/template-tags.php';

/**
 * Custom nav walker to match Bootstrap structure.
 *
 * @since nuThemes 1.0
 */
require NUTHEMES_PATH . '/inc/wp-bootstrap-navwalker.php';

/**
 * Custom gallery using Bootstrap layout.
 *
 * @since nuThemes 1.0
 */
require NUTHEMES_PATH . '/inc/wp-bootstrap-gallery.php';