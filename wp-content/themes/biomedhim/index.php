<?php
/**
 * Template Name: Главная
 *
 */

get_header();
?>

    <section class="bio-slider bio-container">
        <div class="swiper-container">
            <ul class="bio-slider__items swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'main-slider',
                    'showposts' => "-1", //сколько показать статей
                    'orderby' => "data", //сортировка по дате
                    'caller_get_posts' => 1);
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        $post_id = get_the_ID();
                        $bigimage = get_field('kartinka_dlya_pk', $post_id);
                        $smallimage = get_field('kartinka_dlya_mobajla', $post_id);
                        ?>
                        <li class="bio-slider__item swiper-slide">
                            <picture>
                                <source media="(max-width: 500px)"
                                        srcset="<?php echo $smallimage;?>">
                                <img src="<?php echo $bigimage;?>" alt="<?php the_title();?>">
                            </picture>
                            <div class="bio-slider__content">
                                <div class="bio-slider__item-title">
                                    <?php the_title();?>
                                </div>
                                <div class="bio-slider__item-desc">
                                    <?php the_content();?>
                                </div>
                            </div>

                        </li>
                    <?php }
                }
                wp_reset_query(); ?>
            </ul>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="bio-about bio-container">
        <h2 class="bio-about__title section-title">
            <?php the_field('zagolovok_sekczii_o_kompanii');?>
            <span>
                <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                </svg>
            </span>
        </h2>
        <div class="bio-about__content">
            <div class="bio-about__description">
                <?php the_field('opisanie_bloka_o_kompanii');?>
            </div>
        </div>
        <div class="bio-about__counters">
            <div class="bio-about__counter">
                <div class="bio-about__counter-digit">
                    <?php the_field('pervyj_blok_znachenie');?>
                </div>
                <div class="bio-about__counter-tit">
                    <?php the_field('pervoe_znachenie_opisanie');?>
                </div>
            </div>
            <div class="bio-about__counter">
                <div class="bio-about__counter-digit">
                    <?php the_field('vtoroe_blok_znachenie');?>
                </div>
                <div class="bio-about__counter-tit">
                    <?php the_field('vtoroe_znachenie_opisanie');?>
                </div>
            </div>
            <div class="bio-about__counter">
                <div class="bio-about__counter-digit">
                    <?php the_field('tretij_blok_znachenie');?><span>%</span>
                </div>
                <div class="bio-about__counter-tit">
                    <?php the_field('trete_znachenie_opisanie');?>
                </div>
            </div>
        </div>
    </section>
    <section class="bio-categories bio-container">
        <h2 class="bio-categories__title section-title">
            <?php the_field('zagolovok_nasha_produkcziya');?>
            <span>
                <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                </svg>
            </span>
        </h2>
        <div class="bio-categories__list">
            <?php
                if( have_rows('ssylki_na_kategorii') ):
                    while( have_rows('ssylki_na_kategorii') ) : the_row();
                        $subtitle = get_sub_field('zagolovok_dlya_ssilki');
                        $subimage = get_sub_field('kartinka_dlya_kategorii');
                        $sublink = get_sub_field('ssilka_na_kategoriyu');
                        echo '<a href="' . $sublink . '" class="bio-categories__item">';
                        echo '<div class="bio-categories__img">';
                        echo '<img src="' . $subimage . '" alt="">';
                        echo '</div>';
                        echo '<h2 class="bio-categories__item-title">';
                        echo $subtitle;
                        echo '</h2>';
                        echo '</a>';
                    endwhile;
                endif;
            ?>
            <a href="<?php echo get_home_url(); ?>/shop" class="bio-categories__item item-more">
                <span class="circle"></span>
                <span class="circle"></span>
                <span class="circle"></span>
            </a>
        </div>
    </section>
    <section class="bio-pluses">
        <div class="bio-pluses__container bio-container">
            <h2 class="bio-pluses__title section-title">
                <?php the_field('zagolovok_dlya_nashi_preimushhestva');?>
                <span>
                <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                </svg>
            </span>
            </h2>
        </div>
        <div class="bio-pluses__list bio-container">
            <div class="bio-pluses__list-cont">
                <?php
                if( have_rows('preimushhestva_spisok') ):
                    while( have_rows('preimushhestva_spisok') ) : the_row();
                        $sub_image = get_sub_field('kartinka_dlya_preimushhestva');
                        $sub_title = get_sub_field('zagolovok_dlya_preimushhestva');
                        $sub_content = get_sub_field('opisanie_dlya_preimushhestva');
                        ?>

                        <div class="bio-pluses__item">
                            <div class="bio-pluses__item-image">
                                <img src="<?php echo $sub_image?>" alt="<?php echo $sub_title?>">
                            </div>
                            <div class="bio-pluses__item-title">
                                <?php echo $sub_title?>
                            </div>
                            <div class="bio-pluses__item-cont">
                                <?php echo $sub_content?>
                            </div>
                        </div>

                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
    <section class="bio-clients bio-container">
        <h2 class="bio-clients__title section-title">
            <?php the_field('zagolovok_nashi_klienty');?>
            <span>
                <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                </svg>
            </span>
        </h2>
        <div class="bio-clients__container">
            <div class="swiper-container">
                <div class="bio-clients__wrapper swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'clients',
                        'showposts' => "-1", //сколько показать статей
                        'orderby' => "data", //сортировка по дате
                        'caller_get_posts' => 1);
                    $my_query = new wp_query($args);
                    if ($my_query->have_posts()) {
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            $post_id = get_the_ID();
                            ?>
                            <div class="bio-clients__item swiper-slide">
                                <img src="<?php echo the_field('kartinka_dlya_klienty');?>" alt="<?php the_title();?>">
                            </div>
                        <?php }
                    }
                    wp_reset_query(); ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="bio-map" data-icon="<?php echo the_field('ikonka_dlya_markera_kkarty');?>">
        <div class="bio-map__container">
            <div class="bio-map__form">
                <h2 class="bio-map__title section-title">
                    <?php the_field('zagolovok_dlya_formy_obrpatnoj_svyazi');?>
                    <span>
                        <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                        </svg>
                    </span>
                </h2>
                <?php echo do_shortcode( '[contact-form-7 id="5" title="Форма в футер"]' ); ?>
            </div>
        </div>
        <div class="bio-map__map" id="map"></div>
    </section>
<?php
get_footer();