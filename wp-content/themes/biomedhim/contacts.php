<?php
/**
 * Template Name: Контакты
 *
 */

get_header();
?>

    <section class="contacts bio-container">
        <h1 class="contacts__title section-title">
            <?php the_title(); ?>
            <span>
                <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                </svg>
            </span>
        </h1>
        <div class="contacts__content">
            <?php the_content(); ?>
        </div>
    </section>
    <section class="employees">
        <div class="employees__container bio-container">
            <h2 class="employees__title section-title">
                <?php the_field('zagolovok_dlya_bloka_sotrudniki'); ?>
                <span>
                <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                </svg>
            </span>
            </h2>
            <div class="employees__list">
                <?php
                if (have_rows('stisok_sotrudnikov')):
                    while (have_rows('stisok_sotrudnikov')) : the_row();
                        $sub_name = get_sub_field('imya_sotrudnika');
                        $sub_work = get_sub_field('dolzhnost_sotrudnika');
                        $sub_photo = get_sub_field('fotografiya_sotrudnika');
                        $sub_email = get_sub_field('email_sotrudnika');
                        $sub_phone = get_sub_field('telefon_sotrudnika');
                        ?>
                        <div class="employees__item">
                            <div class="employees__image">
                                <img src="
                                <?php
                                if (!$sub_photo) {
                                    echo get_template_directory_uri() . '/images/pers-photo-holder.png';
                                } else echo $sub_photo;
                                ?>
                                " alt="<?php echo $sub_name . ',' . $sub_work; ?>">
                            </div>
                            <div class="employees__person">
                                <div class="employees__name">
                                    <?php echo $sub_name ?>
                                </div>
                                <div class="employees__work">
                                    <?php echo $sub_work ?>
                                </div>
                                <div class="employees__data">
                                    <a href="mailto:<?php echo $sub_email ?>"><?php echo $sub_email ?></a>
                                    <a href="tel:<?php echo $sub_phone ?>"><?php echo $sub_phone ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
        <div id="map-contacts">

        </div>
    </section>


<?php
get_footer();