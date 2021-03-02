<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package biomedhim
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="header" class="header">
    <div class="header__undernav">
        <div class="bio-container">
            <div class="header__contacts">
                <span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.3904 16.857C20.3503 16.6093 20.1951 16.3977 19.9625 16.2719L16.5221 14.2449L16.4938 14.229C16.3495 14.1568 16.1902 14.1198 16.0289 14.121C15.7407 14.121 15.4654 14.2302 15.2743 14.4217L14.2589 15.4377C14.2155 15.4789 14.0739 15.5387 14.0309 15.5409C14.0191 15.5399 12.8494 15.4557 10.6959 13.3019C8.54618 11.1527 8.45498 9.97934 8.45426 9.97934C8.45546 9.91934 8.5145 9.77822 8.5565 9.73454L9.42242 8.86886C9.72746 8.5631 9.8189 8.05622 9.63794 7.66358L7.72562 4.06526C7.58666 3.77918 7.31666 3.60254 7.01714 3.60254C6.80522 3.60254 6.60074 3.69038 6.4409 3.84998L4.0805 6.2051C3.85418 6.43022 3.6593 6.82382 3.61682 7.14062C3.59618 7.29206 3.17738 10.9069 8.13338 15.8637C12.3408 20.0706 15.6216 20.3975 16.5276 20.3975C16.6379 20.3989 16.7483 20.3932 16.8579 20.3805C17.1737 20.3382 17.5668 20.1438 17.7917 19.9185L20.1502 17.5602C20.3427 17.3668 20.4305 17.1112 20.3904 16.857Z"
                              fill="white"/>
                    </svg>
                </span>
                <a href="tel:<?php the_field('telefon_1', 'option'); ?>"><?php the_field('telefon_1', 'option'); ?></a>;&nbsp
                <a href="tel:<?php the_field('telefon_2', 'option'); ?>"><?php the_field('telefon_2', 'option'); ?></a>
            </div>
            <div class="header__adress">
                <span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                    <path d="M11.8816 4.6145C13.5132 4.6145 14.9079 5.16832 16.0658 6.27596C17.2237 7.3836 17.8026 8.72677 17.8026 10.3055C17.8026 11.0948 17.5987 12.0051 17.1908 13.0364C16.7829 14.0676 16.2895 15.0225 15.7105 15.901C15.1316 16.7794 14.5526 17.607 13.9737 18.3836C13.3947 19.1602 12.9079 19.7777 12.5132 20.236L11.8816 20.8853C11.7237 20.7326 11.5132 20.5034 11.25 20.1978C10.9868 19.8923 10.5197 19.3003 9.84868 18.4218C9.17763 17.5433 8.57895 16.6903 8.05263 15.8628C7.52632 15.0352 7.05263 14.0995 6.63158 13.0555C6.21053 12.0115 6 11.0948 6 10.3055C6 8.72677 6.57237 7.3836 7.71711 6.27596C8.86184 5.16832 10.25 4.6145 11.8816 4.6145ZM11.8816 12.3298C12.4605 12.3298 12.9605 12.1324 13.3816 11.7378C13.8026 11.3431 14.0132 10.8657 14.0132 10.3055C14.0132 9.74529 13.8026 9.26786 13.3816 8.87318C12.9605 8.47851 12.4605 8.28117 11.8816 8.28117C11.3026 8.28117 10.8092 8.47851 10.4013 8.87318C9.99342 9.26786 9.78947 9.74529 9.78947 10.3055C9.78947 10.8657 9.99342 11.3431 10.4013 11.7378C10.8092 12.1324 11.3026 12.3298 11.8816 12.3298Z"
                          fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0">
                    <rect width="12" height="16.5" fill="white" transform="translate(6 4.5)"/>
                    </clipPath>
                    </defs>
                    </svg>
                </span>
                <?php the_field('adress', 'option'); ?>
            </div>
            <div class="header__mail">
                <span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 4.5C5.20435 4.5 4.44129 4.81607 3.87868 5.37868C3.31607 5.94129 3 6.70435 3 7.5V7.8015L12 12.648L21 7.803V7.5C21 6.70435 20.6839 5.94129 20.1213 5.37868C19.5587 4.81607 18.7956 4.5 18 4.5H6Z"
                          fill="white"/>
                    <path d="M21 9.50537L12.3555 14.1599C12.2462 14.2187 12.1241 14.2495 12 14.2495C11.8759 14.2495 11.7538 14.2187 11.6445 14.1599L3 9.50537V16.4999C3 17.2955 3.31607 18.0586 3.87868 18.6212C4.44129 19.1838 5.20435 19.4999 6 19.4999H18C18.7956 19.4999 19.5587 19.1838 20.1213 18.6212C20.6839 18.0586 21 17.2955 21 16.4999V9.50537Z"
                          fill="white"/>
                    </svg>
                </span>
                <a href="mailto:<?php the_field('e-mail', 'option'); ?>"><?php the_field('e-mail', 'option'); ?></a>
            </div>
            <div class="header__accnav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'top-menu',
                        'menu_id' => 'top-menu',
                    )
                );
                ?>
            </div>
        </div>
    </div>
    <div class="header__main bio-container">
        <?php
        the_custom_logo();
        ?>
        <nav id="main-navigation" class="main-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'page-menu',
                    'menu_id' => 'page-menu',
                )
            );
            ?>
        </nav>
        <div class="header__search">
            <form action="<?php bloginfo('url'); ?>" method="get">
                <input type="text" name="s" placeholder="Поиск по сайту" value="<?php if (!empty($_GET['s'])) {
                    echo $_GET['s'];
                } ?>"/>
                <label for="batton-submit">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.71 19.29L17.31 15.9C18.407 14.5025 19.0022 12.7767 19 11C19 9.41775 18.5308 7.87103 17.6518 6.55544C16.7727 5.23985 15.5233 4.21447 14.0615 3.60897C12.5997 3.00347 10.9911 2.84504 9.43928 3.15372C7.88743 3.4624 6.46197 4.22433 5.34315 5.34315C4.22433 6.46197 3.4624 7.88743 3.15372 9.43928C2.84504 10.9911 3.00347 12.5997 3.60897 14.0615C4.21447 15.5233 5.23985 16.7727 6.55544 17.6518C7.87103 18.5308 9.41775 19 11 19C12.7767 19.0022 14.5025 18.407 15.9 17.31L19.29 20.71C19.383 20.8037 19.4936 20.8781 19.6154 20.9289C19.7373 20.9797 19.868 21.0058 20 21.0058C20.132 21.0058 20.2627 20.9797 20.3846 20.9289C20.5064 20.8781 20.617 20.8037 20.71 20.71C20.8037 20.617 20.8781 20.5064 20.9289 20.3846C20.9797 20.2627 21.0058 20.132 21.0058 20C21.0058 19.868 20.9797 19.7373 20.9289 19.6154C20.8781 19.4936 20.8037 19.383 20.71 19.29ZM5 11C5 9.81332 5.3519 8.65328 6.01119 7.66658C6.67047 6.67989 7.60755 5.91085 8.7039 5.45673C9.80026 5.0026 11.0067 4.88378 12.1705 5.11529C13.3344 5.3468 14.4035 5.91825 15.2426 6.75736C16.0818 7.59648 16.6532 8.66558 16.8847 9.82946C17.1162 10.9933 16.9974 12.1997 16.5433 13.2961C16.0892 14.3925 15.3201 15.3295 14.3334 15.9888C13.3467 16.6481 12.1867 17 11 17C9.4087 17 7.88258 16.3679 6.75736 15.2426C5.63214 14.1174 5 12.5913 5 11Z"
                              fill="white"/>
                    </svg>
                    <input id="batton-submit" type="submit" value="Найти"/>
                </label>
            </form>
        </div>
        <div class="header__woo">
            <?php
            if (class_exists('WooCommerce')) {
                global $woocommerce; ?>
                <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="fix_cart_btn fz_an">
                        <span class="basket-btn__label">
                            <svg width="30" height="28" viewBox="0 0 30 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M29.733 7.14651C29.595 6.94711 29.4108 6.78414 29.196 6.67154C28.9813 6.55895 28.7425 6.50009 28.5 6.50001H7.9995L6.2685 2.34501C6.04153 1.79784 5.6572 1.33039 5.16424 1.00192C4.67127 0.673457 4.09187 0.498768 3.4995 0.500007H0V3.50001H3.4995L10.6155 20.5775C10.7295 20.8507 10.9218 21.0841 11.1681 21.2483C11.4145 21.4124 11.7039 21.5 12 21.5H24C24.6255 21.5 25.185 21.1115 25.4055 20.528L29.9055 8.52801C29.9905 8.30094 30.0193 8.05664 29.9892 7.81603C29.9592 7.57543 29.8713 7.34569 29.733 7.14651Z"
                                      fill="#4BC3E8"/>
                                <path d="M12.75 27.5C13.9926 27.5 15 26.4926 15 25.25C15 24.0074 13.9926 23 12.75 23C11.5074 23 10.5 24.0074 10.5 25.25C10.5 26.4926 11.5074 27.5 12.75 27.5Z"
                                      fill="#4BC3E8"/>
                                <path d="M23.25 27.5C24.4926 27.5 25.5 26.4926 25.5 25.25C25.5 24.0074 24.4926 23 23.25 23C22.0074 23 21 24.0074 21 25.25C21 26.4926 22.0074 27.5 23.25 27.5Z"
                                      fill="#4BC3E8"/>
                            </svg>
                            <span class="fix_cart_count"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                        </span>
                    <?php
                    $currency_symbol = html_entity_decode(get_woocommerce_currency_symbol());
                    ?>
                    <span class="fix_cart_total"><?php echo sprintf($woocommerce->cart->cart_contents_total);
                        echo $currency_symbol; ?></span>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="header__cat-nav">
        <div class="bio-container">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'category-menu',
                    'menu_id' => 'category-menu',
                )
            );
            ?>
        </div>
    </div>
</header>
