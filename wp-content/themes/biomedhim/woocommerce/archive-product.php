<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
$term = get_queried_object();
$image = get_field('kartinka_v_shapku_kategorii', $term);
$content = get_field('opisanie_kategorii', $term);
if ($image){
    ?>
    <div class="categoby-banner bio-container">
        <div class="categoby-banner__wrapper">
            <img src="<?php echo $image; ?>" alt="<?php woocommerce_page_title(); ?>">
        </div>
    </div>
    <?php
}
?>

<div class="page-market bio-container">

<?php

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<header class="products-page">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?>
            <span>
                        <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                        </svg>
                    </span>
        </h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
    <div class="product-container">
        <div class="product-container__nav">
            <ul class="main-cat-menu">
                <?php
                //Вывод рубрик товаров Woocommerce
                $args               = array(
                    'number' => $number,
                    'orderby' => 'term_id',
                    'order' => 'ASC',
                    'hide_empty' => $hide_empty,
                    'include' => $ids,
                    'parent' => '0'
                );
                $product_categories = get_terms('product_cat', $args);
                $count              = count($product_categories);
                if ($count > 0) {
                    foreach ($product_categories as $product_category) {
                        $args          = array(
                            'hierarchical' => 1,
                            'show_option_none' => '',
                            'hide_empty' => 0,
                            'parent' => $product_category->term_id,
                            'taxonomy' => 'product_cat'
                        );
                        $numberOflinks = $numberOflinks + 1;
                        $subcats       = get_categories($args);
                        if (empty($subcats)) {
                            $arrow = 'no-arrow';
                        } else {
                            $arrow = '';
                        }
                        echo '<li class="' . $product_category->slug . ' ' . $arrow . '">
              <a href="' . get_term_link($product_category) . '">
                           
                ' . $product_category->name . '
              </a>
              ';
                        if (!empty($subcats)) {
                            echo '<ul>';
                        }
                        foreach ($subcats as $sc) {
                            $link = get_term_link($sc->slug, $sc->taxonomy);
                            echo '<li><a href="' . $link . '">' . $sc->name . '</a></li>';
                        }
                        if (!empty($subcats)) {
                            echo '</ul>';
                        }
                        echo '
                        </li>';
                    }
                }
                ?>
            </ul>
            <div class="product-container__sidebar">
                <?php get_sidebar('category')?>
            </div>
        </div>
        <div class="product-container__list">
            <?php
            if ( woocommerce_product_loop() ) {

                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */


                do_action( 'woocommerce_before_shop_loop' );

                woocommerce_product_loop_start();
                if ( wc_get_loop_prop( 'total' ) ) {
                    while ( have_posts() ) {
                        the_post();
                        /**
                         * Hook: woocommerce_shop_loop.
                         */
                        do_action( 'woocommerce_shop_loop' );

                        wc_get_template_part( 'content', 'product' );
                    }
                }

                woocommerce_product_loop_end();

                /**
                 * Hook: woocommerce_after_shop_loop.
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action( 'woocommerce_after_shop_loop' );
            } else {
                /**
                 * Hook: woocommerce_no_products_found.
                 *
                 * @hooked wc_no_products_found - 10
                 */
                do_action( 'woocommerce_no_products_found' );
            }
            /**
             * Hook: woocommerce_after_main_content.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );

            /**
             * Hook: woocommerce_sidebar.
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            //do_action( 'woocommerce_sidebar' );
            ?>
        </div>
    </div>
    <div class="recomender-products bio-container">
        <h2 class="bio-map__title section-title">
            Ремомендуемые товары
            <span>
                        <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                        </svg>
                    </span>
        </h2>
        <?php echo do_shortcode( '[featured_products per_page="5" columns="5" orderby="date" order="desc"]' ); ?>
    </div>
    <div class="category-bottom bio-container">
        <div class="category-bottom__description">
            <?php echo $content;?>
        </div>
        <div class="product-cat__form">
            <h2 class="bio-map__title section-title">
                <?php the_field('zagolovok_dlya_formy_obrpatnoj_svyazi', 2);?>
                <span>
                        <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                        </svg>
                    </span>
            </h2>
            <?php echo do_shortcode( '[contact-form-7 id="5" title="Форма в футер"]' ); ?>
        </div>
    </div>
</div>

    <div>

<?php
get_footer();
