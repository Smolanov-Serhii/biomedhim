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
//add_theme_support( 'wc-product-gallery-lightbox' );
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

add_image_size( 'sert-thumb', 208, 294, false );

//add_filter( 'woocommerce_product_tabs', 'devise_woo_rename_reviews_tab', 98);
//function devise_woo_rename_reviews_tab($tabs) {
//
//    $tabs['additional_information']['title'] = 'Характеристики';
//
//    return $tabs;
//}

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated) {
    $translated = str_ireplace('Подытог', 'Сумма', $translated);
    return $translated;
}

//add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
//function jk_related_products_args( $args ) {
//    $args['posts_per_page'] = 6; // количество "Похожих товаров"
//    $args['columns'] = 6; // количество колонок
//    return $args;
//}

add_filter( 'wc_city_select_cities', 'my_cities' );
/**
 * Replace XX with the country code. Instead of YYY, ZZZ use actual  state codes.
 */

add_filter( 'woocommerce_states', 'new_rus_woocommerce_states' );
function new_rus_woocommerce_states( $states ) {
    $states['RU'] = array(
        'MSK' => 'Москва',
        'SPB' => 'Санкт-Петербург',
        'NOV' => 'Новосибирск',
        'EKB' => 'Екатеринбург',
        'NN' => 'Нижний Новгород',
        'KZN' => 'Казань',
        'CHL' => 'Челябинск',
        'OMSK' => 'Омск',
        'SMR' => 'Самара',
        'RND' => 'Ростов-на-Дону',
        'UFA' => 'Уфа',
        'PRM' => 'Пермь',
        'KRN' => 'Красноярск',
        'VRZH' => 'Воронеж',
        'VLG' => 'Волгоград',
        'SIMF' => 'Симферополь',
        'ABAO' => 'Агинский Бурятский авт.окр.',
        'AR' => 'Адыгея Республика',
        'ALR' => 'Алтай Республика',
        'AK' => 'Алтайский край',
        'AMO' => 'Амурская область',
        'ARO' => 'Архангельская область',
        'ACO' => 'Астраханская область',
        'BR' => 'Башкортостан республика',
        'BEO' => 'Белгородская область',
        'BRO' => 'Брянская область',
        'BUR' => 'Бурятия республика',
        'VLO' => 'Владимирская область',
        'VOO' => 'Волгоградская область',
        'VOLGO' => 'Вологодская область',
        'VORO' => 'Воронежская область',
        'DR' => 'Дагестан республика',
        'EVRAO' => 'Еврейская авт. область',
        'IO' => 'Ивановская область',
        'IR' => 'Ингушетия республика',
        'IRO' => 'Иркутская область',
        'KBR' => 'Кабардино-Балкарская республика',
        'KNO' => 'Калининградская область',
        'KMR' => 'Калмыкия республика',
        'KLO' => 'Калужская область',
        'KMO' => 'Камчатская область',
        'KCHR' => 'Карачаево-Черкесская республика',
        'KR' => 'Карелия республика',
        'KEMO' => 'Кемеровская область',
        'KIRO' => 'Кировская область',
        'KOMI' => 'Коми республика',
        'KPAO' => 'Коми-Пермяцкий авт. окр.',
        'KRAO' => 'Корякский авт.окр.',
        'KOSO' => 'Костромская область',
        'KRSO' => 'Краснодарский край',
        'KRNO' => 'Красноярский край',
        'KRYM' => 'Крым Республика',
        'KURGO' => 'Курганская область',
        'KURO' => 'Курская область',
        'LENO' => 'Ленинградская область',
        'LPO' => 'Липецкая область',
        'MAGO' => 'Магаданская область',
        'MER' => 'Марий Эл республика',
        'MOR' => 'Мордовия республика',
        'MSKO' => 'Московская область',
        'MURO' => 'Мурманская область',
        'NAO' => 'Ненецкий авт.окр.',
        'NZHO' => 'Нижегородская область',
        'NVGO' => 'Новгородская область',
        'NVO' => 'Новосибирская область',
        'OMO' => 'Омская область',
        'OPENO' => 'Оренбургская область',
        'OPLO' => 'Орловская область',
        'PENO' => 'Пензенская область',
        'PERO' => 'Пермский край',
        'PRO' => 'Приморский край',
        'PSO' => 'Псковская область',
        'RSO' => 'Ростовская область',
        'RZO' => 'Рязанская область',
        'SMRO' => 'Самарская область',
        'SRP' => 'Саратовская область',
        'SYAR' => 'Саха(Якутия) республика',
        'SKHO' => 'Сахалинская область',
        'SVO' => 'Свердловская область',
        'SOAR' => 'Северная Осетия - Алания республика',
        'SMO' => 'Смоленская область',
        'STK' => 'Ставропольский край',
        'TRAO' => 'Таймырский (Долгано-Ненецкий) авт. окр.',
        'TMBO' => 'Тамбовская область',
        'TTR' => 'Татарстан республика',
        'TVO' => 'Тверская область',
        'TMO' => 'Томская область',
        'TVR' => 'Тыва республика',
        'TULO' => 'Тульская область',
        'TUMO' => 'Тюменская область',
        'UDO' => 'Удмуртская республика',
        'ULO' => 'Ульяновская область',
        'UOBAO' => 'Усть-Ордынский Бурятский авт.окр.',
        'KHBK' => 'Хабаровский край',
        'KHKR' => 'Хакасия республика',
        'KHMAO' => 'Ханты-Мансийский авт.окр.',
        'CHLO' => 'Челябинская область',
        'CHCHR' => 'Чеченская республика',
        'CHTO' => 'Читинская область',
        'CHVR' => 'Чувашская республика',
        'CHKAO' => 'Чукотский авт.окр.',
        'EVAO' => 'Эвенкийский авт.окр.',
        'YANO' => 'Ямало-Ненецкий авт.окр.',
        'YAO' => 'Ярославская область'

    );

    return $states;
}

/**
 * @snippet       Основные города России по регионам через плагин WC City Select
 * @sourcecode    https://wpruse.ru/my-plugins/dobavit-regiony-dostavki-v-woocommerce/
 * @testedwith    WooCommerce 3.8
 * @author        Artem Abramovich
 * @see           https://ru.wordpress.org/plugins/wc-city-select/
 */
add_filter( 'wc_city_select_cities', 'my_cities');
function my_cities( $cities ) {

    $cities['RU'] = array(
        '01' => array(
            'г. Майкоп',
            'пгт Яблоновский',
            'пгт Энем',
            'ст-ца Гиагинская',
            'г. Адыгейск',
            'ст-ца Ханская',
        ),
        '02' => array(
            'г. Уфа',
            'г. Стерлитамак',
            'г. Салават',
            'г. Нефтекамск',
            'г. Октябрьский',
            'г. Белорецк',
            'г. Туймазы',
            'г. Ишимбай',
            'г. Кумертау',
            'г. Сибай',
            'г. Мелеуз',
            'г. Белебей',
            'г. Бирск',
            'г. Учалы',
            'г. Благовещенск',
            'г. Дюртюли',
            'г. Янаул',
            'г. Давлеканово',
            'пгт Чишмы',
            'пгт Приютово',
        ),
        '03' => array(
            'г. Улан-Удэ',
            'г. Северобайкальск',
            'г. Гусиноозёрск',
            'г. Кяхта',
            'пгт Селенгинск',
            'г. Закаменск',
            'п. Онохой',
            'г. Бабушкин',
        ),
        '04' => array(
            'г. Горно-Алтайск',
            'с. Майма',
        ),
        '05' => array(
            'г. Махачкала',
            'г. Хасавюрт',
            'г. Дербент',
            'г. Каспийск',
            'г. Буйнакск',
            'г. Избербаш',
            'г. Кизляр',
            'г. Кизилюрт',
            'г. Дагестанские Огни',
            'с. Карабудахкент',
            'пгт Ленинкент',
            'с. Бабаюрт',
            'пгт Тарки',
            'пгт Семендер',
            'с. Нижнее Казанище',
            'с. Ахты',
            'с. Касумкент',
            'пгт Альбурикент',
            'с. Ботлих',
            'пгт Шамхал',
        ),
        '06' => array(
            'г. Назрань',
            'г. Сунжа',
            'г. Карабулак',
            'г. Малгобек',
            'ст-ца Нестеровская',
            'с. Экажево',
            'ст-ца Троицкая',
            'с. Кантышево',
            'с. Плиево',
            'с. Сурхахи',
            'с. Сагопши',
            'с. Барсуки',
            'г. Магас',
        ),
        '07' => array(
            'г. Нальчик',
            'г. Прохладный',
            'г. Баксан',
            'г. Нарткала',
            'г. Майский',
            'г. Тырныауз',
            'с. Дыгулыбгей',
            'г. Терек',
            'г. Чегем',
            'с. Нартан',
            'с. Исламей',
            'с. Заюково',
            'с. Чегем Второй',
            'с. Шалушка',
            'с. Хасанья',
        ),
        '08' => array(
            'г. Элиста',
            'г. Лагань',
            'с. Троицкое',
            'г. Городовиковск',
        ),
        '09' => array(
            'г. Черкесск',
            'г. Усть-Джегута',
            'г. Карачаевск',
            'ст-ца Зеленчукская',
            'с. Учкекен',
            'г. Теберда',
        ),
        '10' => array(
            'г. Петрозаводск',
            'г. Кондопога',
            'г. Сегежа',
            'г. Костомукша',
            'г. Сортавала',
            'г. Медвежьегорск',
            'г. Кемь',
            'г. Питкяранта',
            'г. Беломорск',
            'г. Суоярви',
            'г. Пудож',
            'г. Олонец',
            'г. Лахденпохья',
        ),
        '11' => array(
            'г. Сыктывкар',
            'г. Ухта',
            'г. Воркута',
            'г. Печора',
            'г. Усинск',
            'г. Инта',
            'г. Сосногорск',
            'г. Емва',
            'г. Вуктыл',
            'с. Выльгорт',
            'г. Микунь',
            'пгт Воргашор',
        ),
        '12' => array(
            'г. Йошкар-Ола',
            'г. Волжск',
            'г. Козьмодемьянск',
            'пгт Медведево',
            'г. Звенигово',
            'пгт Советский',
        ),
        '13' => array(
            'г. Саранск',
            'г. Рузаевка',
            'г. Ковылкино',
            'пгт Комсомольский',
            'г. Краснослободск',
            'пгт Зубова Поляна',
            'г. Ардатов',
            'г. Инсар',
            'г. Темников',
        ),
        '14' => array(
            'г. Якутск',
            'г. Нерюнгри',
            'г. Мирный',
            'г. Ленск',
            'г. Алдан',
            'пгт Айхал',
            'г. Удачный',
            'г. Вилюйск',
            'г. Нюрба',
            'г. Покровск',
            'г. Олёкминск',
            'г. Томмот',
            'г. Среднеколымск',
            'г. Верхоянск',
        ),
        '15' => array(
            'г. Владикавказ',
            'г. Моздок',
            'г. Беслан',
            'г. Алагир',
            'г. Ардон',
            'пгт Заводской',
            'с. Эльхотово',
            'с. Сунжа',
            'с. Ногир',
            'с. Кизляр',
            'г. Дигора',
            'с. Октябрьское',
        ),
        '16' => array(
            'г. Казань',
            'г. Набережные Челны',
            'г. Нижнекамск',
            'г. Альметьевск',
            'г. Зеленодольск',
            'г. Бугульма',
            'г. Елабуга',
            'г. Лениногорск',
            'г. Чистополь',
            'г. Заинск',
            'г. Азнакаево',
            'г. Нурлат',
            'г. Бавлы',
            'г. Менделеевск',
            'г. Буинск',
            'г. Агрыз',
            'г. Арск',
            'г. Кукмор',
            'пгт Васильево',
            'г. Мензелинск',
        ),
        '17' => array(
            'г. Кызыл',
            'пгт Каа-Хем',
            'г. Ак-Довурак',
            'г. Шагонар',
            'г. Чадан',
            'г. Туран',
        ),
        '18' => array(
            'г. Ижевск',
            'г. Сарапул',
            'г. Воткинск',
            'г. Глазов',
            'г. Можга',
            'п. Игра',
            'п. Ува',
            'п. Балезино',
            'г. Камбарка',
            'п. Кез',
        ),
        '19' => array(
            'г. Абакан',
            'г. Черногорск',
            'г. Саяногорск',
            'г. Абаза',
            'пгт Усть-Абакан',
            'г. Сорск',
            'с. Белый Яр',
        ),
        '20' => array(
            'г. Грозный',
            'г. Урус-Мартан',
            'г. Шали',
            'г. Гудермес',
            'г. Аргун',
            'г. Курчалой',
            'с. Ачхой-Мартан',
            'с. Цоци-Юрт',
            'с. Бачи-Юрт',
            'с. Гойты',
            'с. Автуры',
            'с. Катыр-Юрт',
            'с. Гехи',
            'с. Гелдагана',
            'с. Майртуп',
            'ст-ца Шелковская',
            'с. Аллерой',
            'с. Самашки',
            'с. Герменчук',
            'с. Алхан-Кала',
        ),
        '21' => array(
            'г. Чебоксары',
            'г. Новочебоксарск',
            'г. Канаш',
            'г. Алатырь',
            'г. Шумерля',
            'г. Цивильск',
            'п. Кугеси',
            'г. Козловка',
            'г. Мариинский Посад',
            'г. Ядрин',
        ),
        '22' => array(
            'г. Барнаул',
            'г. Бийск',
            'г. Рубцовск',
            'г. Новоалтайск',
            'г. Заринск',
            'г. Камень-на-Оби',
            'г. Славгород',
            'г. Алейск',
            'пгт Южный',
            'пгт Тальменка',
            'г. Яровое',
            'г. Белокуриха',
            'с. Павловск',
            'с. Кулунда',
            'с. Алтайское',
            'г. Горняк',
            'с. Шипуново',
            'с. Поспелиха',
            'п. Сибирский',
            'пгт Благовещенка',

        ),
        '23' => array(
            'г. Краснодар',
            'г. Сочи',
            'г. Новороссийск',
            'г. Армавир',
            'г. Ейск',
            'г. Кропоткин',
            'г. Славянск-на-Кубани',
            'г. Туапсе',
            'г. Лабинск',
            'г. Тихорецк',
            'г. Анапа',
            'г. Крымск',
            'г. Геленджик',
            'г. Тимашёвск',
            'г. Белореченск',
            'г. Курганинск',
            'ст-ца Каневская',
            'г. Усть-Лабинск',
            'г. Кореновск',
            'г. Апшеронск',
        ),
        '24' => array(
            'г. Красноярск',
            'г. Норильск',
            'г. Ачинск',
            'г. Канск',
            'г. Железногорск',
            'г. Минусинск',
            'г. Зеленогорск',
            'г. Лесосибирск',
            'г. Назарово',
            'г. Шарыпово',
            'г. Сосновоборск',
            'г. Дивногорск',
            'г. Дудинка',
            'г. Боготол',
            'пгт Берёзовка',
            'г. Енисейск',
            'г. Бородино',
            'пгт Шушенское',
            'г. Иланский',
            'г. Ужур',
        ),
        '25' => array(
            'г. Владивосток',
            'г. Находка',
            'г. Уссурийск',
            'г. Артём',
            'г. Арсеньев',
            'г. Спасск-Дальний',
            'г. Большой Камень',
            'г. Партизанск',
            'г. Дальнегорск',
            'г. Лесозаводск',
            'г. Дальнереченск',
            'г. Фокино',
            'пгт Лучегорск',
            'п. Трудовое',
            'с. Черниговка',
            'пгт Славянка',
            'с. Чугуевка',
            'с. Камень-Рыболов',
            'с. Хороль',
        ),
        '26' => array(
            'г. Ставрополь',
            'г. Пятигорск',
            'г. Кисловодск',
            'г. Невинномысск',
            'г. Ессентуки',
            'г. Минеральные Воды',
            'г. Георгиевск',
            'г. Михайловск',
            'г. Будённовск',
            'г. Изобильный',
            'г. Светлоград',
            'пгт Горячеводский',
            'г. Зеленокумск',
            'г. Благодарный',
            'г. Нефтекумск',
            'пгт Иноземцево',
            'с. Александровское',
            'г. Новоалександровск',
            'г. Новопавловск',
            'г. Ипатово',
        ),
        '27' => array(
            'г. Хабаровск',
            'г. Комсомольск-на-Амуре',
            'г. Амурск',
            'г. Советская Гавань',
            'г. Николаевск-на-Амуре',
            'г. Бикин',
            'пгт Ванино',
            'г. Вяземский',
            'пгт Чегдомын',
            'пгт Солнечный',
            'пгт Эльбан',
        ),
        '28' => array(
            'г. Благовещенск',
            'г. Белогорск',
            'г. Свободный',
            'г. Тында',
            'г. Зея',
            'г. Райчихинск',
            'г. Шимановск',
            'г. Завитинск',
            'пгт Прогресс',
            'пгт Магдагачи',
            'г. Сковородино',
            'г. Циолковский',
        ),
        '29' => array(
            'г. Архангельск',
            'г. Северодвинск',
            'г. Котлас',
            'г. Новодвинск',
            'г. Коряжма',
            'г. Мирный',
            'г. Вельск',
            'г. Няндома',
            'г. Онега',
            'пгт Вычегодский',
            'пгт Коноша',
            'пгт Плесецк',
            'г. Каргополь',
            'г. Шенкурск',
            'г. Мезень',
        ),
        '30' => array(
            'г. Астрахань',
            'г. Ахтубинск',
            'г. Знаменск',
            'г. Харабали',
            'г. Камызяк',
            'с. Красный Яр',
            'г. Нариманов',
            'п. Володарский',
            'с. Икряное',
        ),
        '31' => array(
            'г. Белгород',
            'г. Старый Оскол',
            'г. Губкин',
            'г. Шебекино',
            'г. Алексеевка',
            'г. Валуйки',
            'г. Строитель',
            'г. Новый Оскол',
            'пгт Разумное',
            'пгт Чернянка',
            'пгт Борисовка',
            'пгт Ровеньки',
            'пгт Волоконовка',
            'пгт Северный',
            'пгт Ракитное',
            'г. Бирюч',
            'г. Грайворон',
            'г. Короча',
        ),
        '32' => array(
            'г. Брянск',
            'г. Клинцы',
            'г. Новозыбков',
            'г. Дятьково',
            'г. Унеча',
            'г. Карачев',
            'г. Стародуб',
            'г. Жуковка',
            'г. Сельцо',
            'г. Почеп',
            'г. Трубчевск',
            'пгт Навля',
            'г. Фокино',
            'п. Климово',
            'пгт Климово',
            'пгт Клетня',
            'г. Сураж',
            'г. Мглин',
            'г. Севск',
            'г. Злынка',
        ),
        '33' => array(
            'г. Владимир',
            'г. Ковров',
            'г. Муром',
            'г. Александров',
            'г. Гусь-Хрустальный',
            'г. Кольчугино',
            'г. Вязники',
            'г. Киржач',
            'г. Юрьев-Польский',
            'г. Собинка',
            'г. Радужный',
            'г. Покров',
            'г. Лакинск',
            'г. Меленки',
            'г. Петушки',
            'г. Карабаново',
            'г. Струнино',
            'г. Гороховец',
            'г. Камешково',
            'г. Судогда',
        ),
        '34' => array(
            'г. Волгоград',
            'г. Волжский',
            'г. Камышин',
            'г. Михайловка',
            'г. Урюпинск',
            'г. Фролово',
            'г. Калач-на-Дону',
            'г. Котово',
            'пгт Городище',
            'г. Суровикино',
            'г. Котельниково',
            'г. Новоаннинский',
            'г. Жирновск',
            'г. Краснослободск',
            'г. Палласовка',
            'г. Ленинск',
            'г. Николаевск',
            'пгт Средняя Ахтуба',
            'г. Дубовка',
            'пгт Елань',
        ),
        '35' => array(
            'г. Вологда',
            'г. Череповец',
            'г. Сокол',
            'г. Великий Устюг',
            'пгт Шексна',
            'г. Грязовец',
            'г. Бабаево',
            'пгт Кадуй',
            'г. Вытегра',
            'г. Харовск',
            'г. Тотьма',
            'г. Белозерск',
            'г. Устюжна',
            'г. Никольск',
            'г. Кириллов',
            'г. Красавино',
            'г. Кадников',
        ),
        '36' => array(
            'г. Воронеж',
            'г. Борисоглебск',
            'г. Россошь',
            'г. Лиски',
            'г. Острогожск',
            'г. Нововоронеж',
            'с. Новая Усмань',
            'г. Бутурлиновка',
            'г. Семилуки',
            'г. Павловск',
            'г. Калач',
            'г. Бобров',
            'г. Поворино',
            'пгт Анна',
            'пгт Грибановский',
            'г. Богучар',
            'пгт Таловая',
            'г. Эртиль',
            'пгт Кантемировка',
            'г. Новохопёрск',
        ),
        '37' => array(
            'г. Иваново',
            'г. Кинешма',
            'г. Шуя',
            'г. Вичуга',
            'г. Фурманов',
            'г. Тейково',
            'г. Кохма',
            'г. Родники',
            'г. Приволжск',
            'г. Южа',
            'г. Заволжск',
            'г. Наволоки',
            'г. Юрьевец',
            'г. Комсомольск',
            'г. Пучеж',
            'г. Гаврилов Посад',
            'г. Плёс',
        ),
        '38' => array(
            'г. Иркутск',
            'г. Братск',
            'г. Ангарск',
            'г. Усть-Илимск',
            'г. Усолье-Сибирское',
            'г. Черемхово',
            'г. Шелехов',
            'г. Усть-Кут',
            'г. Тулун',
            'г. Саянск',
            'г. Нижнеудинск',
            'г. Тайшет',
            'г. Зима',
            'г. Железногорск-Илимский',
            'пгт Маркова',
            'г. Вихоревка',
            'г. Слюдянка',
            'г. Бодайбо',
            'п. Усть-Ордынский',
            'пгт Чунский',
        ),
        '39' => array(
            'г. Калининград',
            'г. Советск',
            'г. Черняховск',
            'г. Балтийск',
            'г. Гусев',
            'г. Светлый',
            'г. Гвардейск',
            'г. Зеленоградск',
            'г. Гурьевск',
            'г. Неман',
            'г. Пионерский',
            'г. Светлогорск',
            'г. Мамоново',
            'г. Полесск',
            'г. Багратионовск',
            'г. Озёрск',
            'г. Славск',
            'г. Нестеров',
            'г. Правдинск',
            'г. Ладушкин',
        ),
        '40' => array(
            'г. Калуга',
            'г. Обнинск',
            'г. Людиново',
            'г. Киров',
            'г. Малоярославец',
            'г. Балабаново',
            'г. Козельск',
            'г. Кондрово',
            'г. Сухиничи',
            'пгт Товарково',
            'г. Сосенский',
            'г. Боровск',
            'г. Жуков',
            'г. Кремёнки',
            'п. Воротынск',
            'г. Ермолино',
            'г. Таруса',
            'г. Белоусово',
            'г. Медынь',
            'г. Юхнов',
        ),
        '41' => array(
            'г. Петропавловск-Камчатский',
            'г. Елизово',
            'г. Вилючинск',
        ),
        '42' => array(
            'г. Новокузнецк',
            'г. Кемерово',
            'г. Прокопьевск',
            'г. Междуреченск',
            'г. Ленинск-Кузнецкий',
            'г. Киселёвск',
            'г. Юрга',
            'г. Белово',
            'г. Анжеро-Судженск',
            'г. Берёзовский',
            'г. Осинники',
            'г. Мыски',
            'г. Мариинск',
            'г. Топки',
            'г. Полысаево',
            'г. Тайга',
            'г. Гурьевск',
            'г. Таштагол',
            'г. Калтан',
            'пгт Промышленная',
        ),
        '43' => array(
            'г. Киров',
            'г. Кирово-Чепецк',
            'г. Вятские Поляны',
            'г. Слободской',
            'г. Котельнич',
            'г. Омутнинск',
            'г. Яранск',
            'г. Советск',
            'г. Сосновка',
            'г. Луза',
            'г. Белая Холуница',
            'г. Зуевка',
            'г. Кирс',
            'г. Уржум',
            'г. Нолинск',
            'г. Малмыж',
            'г. Орлов',
            'г. Мураши',
        ),
        '44' => array(
            'г. Кострома',
            'г. Буй',
            'г. Шарья',
            'г. Нерехта',
            'г. Мантурово',
            'г. Галич',
            'г. Волгореченск',
            'пгт Ветлужский',
            'г. Нея',
            'г. Макарьев',
            'г. Солигалич',
            'г. Чухлома',
            'г. Кологрив',
        ),
        '45' => array(
            'г. Курган',
            'г. Шадринск',
            'г. Шумиха',
            'г. Куртамыш',
            'г. Катайск',
            'г. Далматово',
            'г. Петухово',
            'г. Щучье',
            'г. Макушино',
        ),
        '46' => array(
            'г. Курск',
            'г. Железногорск',
            'г. Курчатов',
            'г. Льгов',
            'г. Щигры',
            'г. Рыльск',
            'г. Обоянь',
            'г. Дмитриев',
            'г. Суджа',
            'г. Фатеж',
        ),
        '47' => array(
            'г. Гатчина',
            'г. Выборг',
            'г. Сосновый Бор',
            'г. Всеволожск',
            'г. Тихвин',
            'г. Кириши',
            'г. Кингисепп',
            'г. Сертолово',
            'г. Волхов',
            'г. Тосно',
            'г. Луга',
            'г. Сланцы',
            'г. Кировск',
            'г. Кудрово',
            'г. Отрадное',
            'г. Пикалёво',
            'г. Лодейное Поле',
            'г. Коммунар',
            'г. Мурино',
            'г. Никольское',
        ),
        '48' => array(
            'г. Липецк',
            'г. Елец',
            'г. Грязи',
            'г. Данков',
            'г. Лебедянь',
            'г. Усмань',
            'г. Чаплыгин',
            'г. Задонск',
        ),
        '49' => array(
            'г. Магадан',
            'г. Сусуман',
        ),
        '50' => array(
            'г. Балашиха',
            'г. Подольск',
            'г. Химки',
            'г. Королёв',
            'г. Мытищи',
            'г. Люберцы',
            'г. Электросталь',
            'г. Коломна',
            'г. Одинцово',
            'г. Серпухов',
            'г. Орехово-Зуево',
            'г. Красногорск',
            'г. Сергиев Посад',
            'г. Щёлково',
            'г. Пушкино',
            'г. Жуковский',
            'г. Ногинск',
            'г. Раменское',
            'г. Домодедово',
            'г. Воскресенск',
        ),
        '51' => array(
            'г. Мурманск',
            'г. Апатиты',
            'г. Североморск',
            'г. Мончегорск',
            'г. Кандалакша',
            'г. Кировск',
            'г. Оленегорск',
            'г. Ковдор',
            'г. Полярный',
            'г. Заполярный',
            'г. Полярные Зори',
            'пгт Мурмаши',
            'г. Снежногорск',
            'пгт Никель',
            'г. Заозёрск',
            'г. Гаджиево',
            'г. Кола',
            'г. Островной',
        ),
        '52' => array(
            'г. Нижний Новгород',
            'г. Дзержинск',
            'г. Арзамас',
            'г. Саров',
            'г. Бор',
            'г. Кстово',
            'г. Павлово',
            'г. Выкса',
            'г. Балахна',
            'г. Заволжье',
            'г. Кулебаки',
            'г. Городец',
            'г. Богородск',
            'г. Семёнов',
            'г. Лысково',
            'г. Сергач',
            'г. Шахунья',
            'г. Навашино',
            'г. Лукоянов',
            'г. Первомайск',
        ),
        '53' => array(
            'г. Великий Новгород',
            'г. Боровичи',
            'г. Старая Русса',
            'г. Чудово',
            'г. Валдай',
            'г. Пестово',
            'г. Окуловка',
            'г. Малая Вишера',
            'г. Сольцы',
            'г. Холм',
        ),
        '54' => array(
            'г. Новосибирск',
            'г. Бердск',
            'г. Искитим',
            'г. Куйбышев',
            'г. Барабинск',
            'г. Карасук',
            'г. Обь',
            'г. Татарск',
            'пгт Краснообск',
            'г. Тогучин',
            'г. Черепаново',
            'пгт Линёво',
            'г. Болотное',
            'пгт Коченёво',
            'пгт Кольцово',
            'пгт Сузун',
            'г. Купино',
            'пгт Маслянино',
            'пгт Колывань',
            'г. Чулым',
        ),
        '55' => array(
            'г. Омск',
            'г. Тара',
            'г. Исилькуль',
            'г. Калачинск',
            'пгт Таврическое',
            'г. Называевск',
            'г. Тюкалинск',
            'пгт Черлак',
            'пгт Любинский',
            'пгт Большеречье',
            'пгт Муромцево',
        ),
        '56' => array(
            'г. Оренбург',
            'г. Орск',
            'г. Новотроицк',
            'г. Бузулук',
            'г. Бугуруслан',
            'г. Гай',
            'г. Сорочинск',
            'г. Медногорск',
            'г. Соль-Илецк',
            'г. Кувандык',
            'г. Абдулино',
            'п. Саракташ',
            'г. Ясный',
            'п. Акбулак',
            'п. Новосергиевка',
            'с. Тоцкое Второе',
            'п. Новоорск',
        ),
        '57' => array(
            'г. Орёл',
            'г. Ливны',
            'г. Мценск',
            'пгт Знаменка',
            'г. Болхов',
            'пгт Нарышкино',
            'г. Дмитровск',
            'г. Малоархангельск',
            'г. Новосиль',
        ),
        '58' => array(
            'г. Пенза',
            'г. Кузнецк',
            'г. Заречный',
            'г. Каменка',
            'г. Сердобск',
            'г. Нижний Ломов',
            'г. Никольск',
            'пгт Мокшан',
            'с. Бессоновка',
            'пгт Башмаково',
            'г. Белинский',
            'г. Городище',
            'г. Спасск',
            'г. Сурск',
        ),
        '59' => array(
            'г. Пермь',
            'г. Березники',
            'г. Соликамск',
            'г. Чайковский',
            'г. Кунгур',
            'г. Лысьва',
            'г. Краснокамск',
            'г. Чусовой',
            'г. Добрянка',
            'г. Чернушка',
            'г. Кудымкар',
            'г. Губаха',
            'г. Верещагино',
            'г. Оса',
            'г. Кизел',
            'г. Нытва',
            'г. Красновишерск',
            'г. Александровск',
            'г. Очёр',
            'пгт Полазна',
        ),
        '60' => array(
            'г. Псков',
            'г. Великие Луки',
            'г. Остров',
            'г. Невель',
            'г. Печоры',
            'г. Опочка',
            'г. Порхов',
            'г. Дно',
            'г. Новосокольники',
            'г. Себеж',
            'г. Пыталово',
            'г. Пустошка',
            'г. Гдов',
            'г. Новоржев',
        ),
        '61' => array(
            'г. Ростов-на-Дону',
            'г. Таганрог',
            'г. Шахты',
            'г. Волгодонск',
            'г. Новочеркасск',
            'г. Батайск',
            'г. Новошахтинск',
            'г. Каменск-Шахтинский',
            'г. Азов',
            'г. Гуково',
            'г. Сальск',
            'г. Донецк',
            'г. Белая Калитва',
            'г. Аксай',
            'г. Красный Сулин',
            'г. Миллерово',
            'г. Морозовск',
            'г. Зерноград',
            'г. Семикаракорск',
            'г. Зверев',
        ),
        '62' => array(
            'г. Рязань',
            'г. Касимов',
            'г. Скопин',
            'г. Сасово',
            'г. Ряжск',
            'г. Новомичуринск',
            'г. Рыбное',
            'пгт Шилово',
            'г. Кораблино',
            'г. Михайлов',
            'г. Спасск-Рязанский',
            'г. Шацк',
            'г. Спас-Клепики',
        ),
        '63' => array(
            'г. Самара',
            'г. Тольятти',
            'г. Сызрань',
            'г. Новокуйбышевск',
            'г. Чапаевск',
            'г. Жигулёвск',
            'г. Отрадный',
            'г. Кинель',
            'г. Похвистнево',
            'г. Октябрьск',
            'пгт Безенчук',
            'г. Нефтегорск',
            'с. Кинель-Черкассы',
            'пгт Суходол	',
            'пгт Усть-Кинельский',
            'пгт Алексеевка',
            'пгт Рощинский',
        ),
        '64' => array(
            'г. Саратов',
            'г. Энгельс',
            'г. Балаково',
            'г. Балашов',
            'г. Вольск',
            'г. Пугачёв',
            'г. Ртищево',
            'пгт Приволжский',
            'г. Маркс',
            'г. Петровск',
            'г. Аткарск',
            'г. Красноармейск',
            'г. Ершов',
            'г. Новоузенск',
            'г. Калининск',
            'г. Красный Кут',
            'г. Хвалынск',
            'г. Аркадак',
            'пгт Светлый',
            'пгт Степное',
        ),
        '65' => array(
            'г. Южно-Сахалинск',
            'г. Корсаков',
            'г. Холмск',
            'г. Оха',
            'г. Поронайск',
            'г. Долинск',
            'г. Углегорск',
            'г. Невельск',
            'г. Александровск-Сахалинский',
            'пгт Ноглики',
            'г. Анива',
            'г. Шахтёрск',
            'г. Макаров',
            'г. Томари',
            'г. Северо-Курильск',
            'г. Курильск',
        ),
        '66' => array(
            'г. Екатеринбург',
            'г. Нижний Тагил',
            'г. Каменск-Уральский',
            'г. Первоуральск',
            'г. Серов',
            'г. Новоуральск',
            'г. Асбест',
            'г. Полевской',
            'г. Ревда',
            'г. Краснотурьинск',
            'г. Верхняя Пышма',
            'г. Лесной',
            'г. Берёзовский',
            'г. Верхняя Салда',
            'г. Качканар',
            'г. Красноуфимск',
            'г. Реж',
            'г. Ирбит',
            'г. Алапаевск',
            'г. Тавда',
        ),
        '67' => array(
            'г. Смоленск',
            'г. Вязьма',
            'г. Рославль',
            'г. Ярцево',
            'г. Сафоново',
            'г. Гагарин',
            'г. Десногорск',
            'пгт Верхнеднепровский',
            'г. Дорогобуж',
            'г. Ельня',
            'г. Рудня',
            'г. Починок',
            'г. Сычёвка',
            'г. Велиж',
            'г. Демидов',
            'г. Духовщина',
        ),
        '68' => array(
            'г. Тамбов',
            'г. Мичуринск',
            'г. Рассказово',
            'г. Моршанск',
            'г. Котовск',
            'г. Уварово',
            'п. Строитель',
            'г. Кирсанов',
            'г. Жердевка',
            'пгт Первомайский',
        ),
        '69' => array(
            'г. Тверь',
            'г. Ржев',
            'г. Вышний Волочёк',
            'г. Кимры',
            'г. Торжок',
            'г. Конаково',
            'г. Удомля',
            'г. Бежецк',
            'г. Бологое',
            'г. Нелидово',
            'г. Осташков',
            'г. Кашин',
            'г. Калязин',
            'г. Торопец',
            'г. Лихославль',
            'пгт Редкино',
            'пгт Озёрный',
            'г. Кувшиново',
            'г. Западная Двина',
            'г. Старица',
        ),
        '70' => array(
            'г. Томск',
            'г. Северск',
            'г. Стрежевой',
            'г. Асино',
            'г. Колпашево',
            'г. Кедровый',
        ),
        '71' => array(
            'г. Тула',
            'г. Новомосковск',
            'г. Донской',
            'г. Алексин',
            'г. Щёкино',
            'г. Узловая',
            'г. Ефремов',
            'г. Богородицк',
            'г. Кимовск',
            'г. Киреевск',
            'г. Суворов',
            'г. Ясногорск',
            'г. Плавск',
            'г. Венёв',
            'г. Белёв',
            'г. Болохово',
            'г. Липки',
            'г. Советск',
            'г. Чекалин',
        ),
        '72' => array(
            'г. Тюмень',
            'г. Тобольск',
            'г. Ишим',
            'г. Ялуторовск',
            'г. Заводоуковск',
            'п. Нижнесортымский',
            'п. Солнечный',
        ),
        '73' => array(
            'г. Ульяновск',
            'г. Димитровград',
            'г. Инза',
            'г. Барыш',
            'г. Новоульяновск',
            'пгт Чердаклы',
            'пгт Ишеевка',
            'пгт Новоспасское',
            'г. Сенгилей',
        ),
        '74' => array(
            'г. Челябинск',
            'г. Магнитогорск',
            'г. Златоуст',
            'г. Миасс',
            'г. Копейск',
            'г. Озёрск',
            'г. Троицк',
            'г. Снежинск',
            'г. Сатка',
            'г. Чебаркуль',
            'г. Кыштым',
            'г. Коркино',
            'г. Южноуральск',
            'г. Трёхгорный',
            'г. Аша',
            'г. Верхний Уфалей',
            'г. Еманжелинск',
            'г. Карталы',
            'г. Усть-Катав',
            'г. Бакал',
        ),
        '75' => array(
            'г. Чита',
            'г. Краснокаменск',
            'г. Борзя',
            'г. Петровск-Забайкальский',
            'пгт Агинское',
            'г. Нерчинск',
            'г. Шилка',
            'г. Могоча',
            'пгт Забайкальск',
            'пгт Чернышевск',
            'пгт Карымское',
            'г. Балей',
            'пгт Шерловая Гора',
            'г. Хилок',
            'пгт Горный',
            'пгт Первомайский',
            'пгт Могойтуй',
            'пгт Атамановка',
            'пгт Новокручининск',
            'г. Сретенск',
        ),
        '76' => array(
            'г. Ярославль',
            'г. Рыбинск',
            'г. Переславль-Залесский',
            'г. Тутаев',
            'г. Углич',
            'г. Ростов',
            'г. Гаврилов-Ям',
            'г. Данилов',
            'г. Пошехонье',
            'г. Мышкин',
            'г. Любим',
        ),
        '77' => array(
            'г. Москва',
            'г. Троицк',
            'г. Щербинка',
            'г. Московский',
            'пгт Кокошкино',
            'пгт Киевский',
        ),
        '78' => array(
            'г. Санкт-Петербург',
            'г. Колпино',
            'г. Пушкин',
            'г. Петергоф',
            'г. Красное Село',
            'г. Ломоносов',
            'г. Кронштадт',
            'г. Сестрорецк',
            'г. Павловск',
            'г. Зеленогорск',
        ),
        '79' => array(
            'г. Биробиджан',
            'г. Облучье',
        ),
        '82' => array(
            'г. Симферополь',
            'г. Керчь',
            'г. Евпатория',
            'г. Ялта',
            'г. Феодосия',
            'г. Джанкой',
            'г. Алушта',
            'г. Красноперекопск',
            'г. Саки',
            'г. Бахчисарай',
            'г. Армянск',
            'г. Белогорск',
            'г. Судак',
            'г. Щелкино',
            'пгт Черноморское',
            'пгт Октябрьское',
            'пгт Советский',
            'г. Старый Крым',
            'г. Алупка',
        ),
        '83' => array(
            'г. Нарьян-Мар',
        ),
        '86' => array(
            'г. Сургут',
            'г. Нижневартовск',
            'г. Нефтеюганск',
            'г. Ханты-Мансийск',
            'г. Когалым',
            'г. Нягань',
            'г. Мегион',
            'г. Радужный',
            'г. Лангепас',
            'г. Пыть-Ях',
            'г. Урай',
            'г. Лянтор',
            'г. Югорск',
            'пгт Пойковский',
            'г. Советский',
            'пгт Фёдоровский',
            'г. Белоярский',
            'пгт Излучинск',
            'пгт Белый Яр',
            'г. Покачи',
        ),
        '87' => array(
            'г. Анадырь',
            'г. Билибино',
            'г. Певек',
        ),
        '89' => array(
            'г. Ноябрьск',
            'г. Новый Уренгой',
            'г. Надым',
            'г. Салехард',
            'г. Муравленко',
            'г. Лабытнанги',
            'г. Губкинский',
            'г. Тарко-Сале',
            'пгт Пангоды',
            'пгт Уренгой',
        ),
        '92' => array(
            'г. Севастополь',
            'нп Балаклава',
            'г. Инкерман',
        ),
    );

    return $cities;
}


//add_action( 'woocommerce_cart_calculate_fees', 'progressive_discount_based_on_cart_total', 10, 1 );
function progressive_discount_based_on_cart_total( $cart_object ) {

    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    $cart_total = $cart_object->cart_contents_total; // Cart total

    if ( $cart_total > 150.00 )
        $percent = 15; // 15%
    elseif ( $cart_total >= 100.00 && $cart_total < 150.00 )
        $percent = 10; // 10%
    elseif ( $cart_total >= 50.00 && $cart_total < 100.00 )
        $percent =  5; // 5%
    else
        $percent = 0;

    if ( $percent != 0 ) {
        $discount =  $cart_total * $percent / 100;
        $cart_object->add_fee( "Скидка ($percent%)", -$discount, true );
    }
}