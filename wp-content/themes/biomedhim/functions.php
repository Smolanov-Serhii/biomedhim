<?php
/**
 * biomedhim functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package biomedhim
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'biomedhim_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function biomedhim_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on biomedhim, use a find and replace
		 * to change 'biomedhim' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'biomedhim', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top-menu' => esc_html__( 'Верхнее меню', 'biomedhim' ),
				'page-menu' => esc_html__( 'Меню страниц', 'biomedhim' ),
				'footer-menu' => esc_html__( 'Меню футер', 'biomedhim' ),
				'category-menu' => esc_html__( 'Меню магазина', 'biomedhim' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'biomedhim_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
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
endif;
add_action( 'after_setup_theme', 'biomedhim_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function biomedhim_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'biomedhim_content_width', 640 );
}
add_action( 'after_setup_theme', 'biomedhim_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function biomedhim_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'biomedhim' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'biomedhim' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
    register_sidebar(
        array(
            'name'          => esc_html__( 'Сайдбар категории', 'biomedhim' ),
            'id'            => 'sidebar-category',
            'description'   => esc_html__( 'Добавте виджет', 'biomedhim' ),
            'before_widget' => '<section id="%1$s" class="widget sidebar-category %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        )
    );
}
add_action( 'widgets_init', 'biomedhim_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function biomedhim_scripts() {
    wp_enqueue_style( 'biomedhim-style', get_template_directory_uri() . '/dist/css/style.css?v=2', array(), _S_VERSION );
	wp_style_add_data( 'biomedhim-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'biomedhim_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function mytheme_add_woocommerce_support(){
    add_theme_support('woocommerce');
}
add_action('after_setup_theme','mytheme_add_woocommerce_support');
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Параметры',
        'menu_title'	=> 'Параметры темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Header',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Footer',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры общие',
        'menu_title'	=> 'Общие',
        'parent_slug'	=> 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Контакты',
        'menu_title'	=> 'Контакты',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

add_action( 'init', 'register_post_types' );
function register_post_types(){

    register_post_type( 'main-slider', [
        'label'  => null,
        'labels' => [
            'name'               => 'Слайдер', // основное название для типа записи
            'singular_name'      => 'Слайдер', // название для одной записи этого типа
            'add_new'            => 'Добавить слайд', // для добавления новой записи
            'add_new_item'       => 'Добавление слайда', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование слайда', // для редактирования типа записи
            'new_item'           => 'Новый слайд', // текст новой записи
            'view_item'          => 'Смотреть слайд', // для просмотра записи этого типа.
            'search_items'       => 'Искать слайд', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Слайдер', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'clients', [
        'label'  => null,
        'labels' => [
            'name'               => 'Наши клиенты', // основное название для типа записи
            'singular_name'      => 'Наши клиенты', // название для одной записи этого типа
            'add_new'            => 'Добавить клиента', // для добавления новой записи
            'add_new_item'       => 'Добавление клиента', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование клиента', // для редактирования типа записи
            'new_item'           => 'Новый клиент', // текст новой записи
            'view_item'          => 'Смотреть клиента', // для просмотра записи этого типа.
            'search_items'       => 'Искать клиента', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Наши клиенты', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'clients', [
        'label'  => null,
        'labels' => [
            'name'               => 'Наши клиенты', // основное название для типа записи
            'singular_name'      => 'Наши клиенты', // название для одной записи этого типа
            'add_new'            => 'Добавить клиента', // для добавления новой записи
            'add_new_item'       => 'Добавление клиента', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование клиента', // для редактирования типа записи
            'new_item'           => 'Новый клиент', // текст новой записи
            'view_item'          => 'Смотреть клиента', // для просмотра записи этого типа.
            'search_items'       => 'Искать клиента', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Наши клиенты', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'RUB': $currency_symbol = ' ₽'; break;
    }
    return $currency_symbol;
}

remove_action('woocommerce_single_product_summary','woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary','add_custom_article', 10);
add_action('woocommerce_single_product_summary','woocommerce_template_single_price', 21);
add_action( 'action_name', 'your_function_name' );

function add_custom_article() {
    $article_num = get_field( 'kod_tovara', $product_id);
    echo '<span class="product-code"><strong>Код товара:</strong> ' . $article_num . '</span>';
};



add_filter('woocommerce_product_description_heading', 'devise_product_description_heading');
function devise_product_description_heading() {
    echo '<div class="desc-title">Краткое описание</div>'; //Вкладка Описание. Оставьте пустым что бы удалить текст
}

//Добавляем слово «Цена»
//add_filter( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );
//function custom_price_html( $price, $product ){
//    if ( !empty ( $price ) ) {
//        return 'Цена: '.$price;
//    }
//}

// Adding and displaying additional product quantity custom fields
add_action( 'woocommerce_product_options_pricing', 'additional_product_pricing_option_fields', 50 );
function additional_product_pricing_option_fields() {
    $domain = "woocommerce";
    global $post;

    echo '</div><div class="options_group pricing">';

    woocommerce_wp_text_input( array(
        'id'            => '_input_qty',
        'label'         => __("Количество в упаковке", $domain ),
        'placeholder'   => '',
        'description'   => __("Количество единиц товара в упаковке", $domain ),
        'desc_tip'      => true,
    ) );


    woocommerce_wp_text_input( array(
        'id'            => '_step_qty',
        'label'         => __("Шаг", $domain ),
        'placeholder'   => '',
        'description'   => __("Шаг единиц упаковок при заказе", $domain ),
        'desc_tip'      => true,
    ) );

}

// Saving product custom quantity values
add_action( 'woocommerce_admin_process_product_object', 'save_product_custom_meta_data', 100, 1 );
function save_product_custom_meta_data( $product ){
    if ( isset( $_POST['_input_qty'] ) )
        $product->update_meta_data( '_input_qty', sanitize_text_field($_POST['_input_qty']) );

    if ( isset( $_POST['_step_qty'] ) )
        $product->update_meta_data( '_step_qty', sanitize_text_field($_POST['_step_qty']) );
}

// Set product quantity field by product
add_filter( 'woocommerce_quantity_input_args', 'custom_quantity_input_args', 10, 2 );
function custom_quantity_input_args( $args, $product ) {
    if( $product->get_meta('_input_qty') ){
        $args['input_value'] = is_cart() ? $args['input_value'] : $product->get_meta('_input_qty');
        $args['min_value']   = $product->get_meta('_input_qty');
    }

    if( $product->get_meta('_step_qty') ){
        $args['step'] = $product->get_meta('_step_qty');
    }

    return $args;
}

add_filter('woocommerce_get_image_size_thumbnail','add_thumbnail_size',1,10);
function add_thumbnail_size($size){

    $size['width'] = 180;
    $size['height'] = 185;
    $size['crop']   = 1; //0 - не обрезаем, 1 - обрезка
    return $size;
}


