<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $woocommerce;
global $product;
$currency_code = get_woocommerce_currency_symbol( $currency = '' );
$current_price = $price = get_post_meta( get_the_ID(), '_regular_price', true);
$value = get_field('edinicza_izmereniya');
if ($value){

} else {
    $value = 'шт.';
}
?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
    <div class="custom-price">
    <strong>Цена:</strong>
        <?php
            if ($current_price){
                echo $product->get_price_html() . ' / ' . $value;
            } else {
                echo "по запросу";
            }
        ?>

    </div>
</p>
