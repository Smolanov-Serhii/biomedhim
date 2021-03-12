<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package biomedhim
 */

?>

	<footer id="footer" class="footer">
        <div class="footer__container bio-container">
            <div class="footer__logo">
                <a href="<?php echo get_home_url(); ?>">
                    <svg width="150" height="54" viewBox="0 0 150 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.0602 13.7004C23.3441 13.7004 26.6199 14.8136 28.9718 17.2111C31.3237 19.5231 32.4997 22.4344 32.4997 25.8595C32.4997 29.6271 31.2397 32.7097 28.5518 35.2785C25.948 37.7617 22.2521 39.0462 17.8003 39.0462H0.833008V0H24.016L28.3838 9.93279H11.8365V13.786H19.0602V13.7004ZM11.8365 22.8625V29.3702H18.0523C20.3202 29.3702 21.5801 28.0002 21.5801 26.202C21.5801 24.2326 20.2362 22.8625 17.9683 22.8625H11.8365Z" fill="#0E5A9E"/>
                        <path d="M27.5 0H39.3195L47.6183 20.1225L55.8333 0H70V39.0462H59.6055V17.0399L50.3846 39.0462H44.6006L27.5 0Z" fill="#0E5A9E"/>
                        <path d="M133.242 4.16025C137.947 4.16025 141.827 5.65794 145.13 8.57011C148.349 11.4823 150 15.1433 150 19.47C150 23.7966 148.349 27.4576 145.13 30.3698C141.91 33.282 137.947 34.7797 133.242 34.7797V39.0231H122.427V34.7797C117.722 34.7797 113.842 33.3652 110.54 30.3698C107.32 27.4576 105.669 23.7966 105.669 19.3867C105.669 15.0601 107.32 11.3991 110.54 8.4869C113.759 5.57473 117.722 4.07704 122.427 4.07704V0H133.242V4.16025ZM122.427 13.9784C118.712 13.9784 116.236 16.3914 116.236 19.5532C116.236 22.8814 118.63 25.1279 122.427 25.1279V13.9784ZM133.242 25.0447C136.957 25.0447 139.433 22.6317 139.433 19.47C139.433 16.1418 137.039 13.8952 133.242 13.8952V25.0447Z" fill="#0E5A9E"/>
                        <path d="M0 45.5131H5.36599V46.5948H1.2383V48.2589H3.30215C4.12768 48.2589 4.78811 48.4253 5.20088 48.7581C5.61365 49.0909 5.86131 49.5902 5.86131 50.2558C5.86131 50.9214 5.61365 51.5039 5.11833 51.8367C4.623 52.2527 3.96258 52.4191 3.05449 52.4191H0V45.5131ZM3.05449 51.5039C3.54981 51.5039 3.96258 51.4207 4.21024 51.2543C4.4579 51.0879 4.623 50.755 4.623 50.4222C4.623 49.6734 4.12768 49.3405 3.13704 49.3405H1.2383V51.5871H3.05449V51.5039Z" fill="white"/>
                        <path d="M9.24609 45.5131H10.4844V50.5054L14.1993 45.5131H15.4376V52.5023H14.1993V47.51L10.4844 52.5023H9.24609V45.5131Z" fill="white"/>
                        <path d="M20.6384 52.0863C20.0606 51.7534 19.6478 51.3374 19.3176 50.8382C18.9874 50.2558 18.8223 49.6733 18.8223 49.0077C18.8223 48.342 18.9874 47.6764 19.3176 47.1772C19.6478 46.6779 20.0606 46.1787 20.6384 45.9291C21.2163 45.6795 21.8768 45.4299 22.5372 45.4299C23.1976 45.4299 23.858 45.5963 24.4359 45.9291C25.0138 46.2619 25.4266 46.6779 25.7568 47.1772C26.087 47.6764 26.2521 48.342 26.2521 49.0077C26.2521 49.6733 26.087 50.339 25.7568 50.8382C25.4266 51.4206 25.0138 51.8367 24.4359 52.0863C23.858 52.3359 23.1976 52.5855 22.5372 52.5855C21.8768 52.5855 21.2163 52.4191 20.6384 52.0863ZM23.858 51.0878C24.1883 50.8382 24.5185 50.5886 24.7661 50.1726C25.0138 49.7565 25.0963 49.3405 25.0963 48.9245C25.0963 48.4252 25.0138 48.0092 24.7661 47.6764C24.5185 47.2604 24.2708 47.0108 23.858 46.7612C23.5278 46.5115 23.0325 46.4283 22.6197 46.4283C22.207 46.4283 21.7116 46.5115 21.3814 46.7612C21.0512 47.0108 20.721 47.2604 20.4733 47.6764C20.2257 48.0924 20.1431 48.5085 20.1431 48.9245C20.1431 49.4237 20.2257 49.8397 20.4733 50.1726C20.721 50.5886 20.9687 50.8382 21.3814 51.0878C21.7116 51.3374 22.207 51.4206 22.6197 51.4206C23.0325 51.4206 23.4453 51.3374 23.858 51.0878Z" fill="white"/>
                        <path d="M36.0764 52.5023V47.8429L33.8474 51.6703H33.2695L30.958 47.9261V52.5023H29.7197V45.5131H30.7929L33.5172 50.1726L36.2415 45.5131H37.3147V52.5023H36.0764Z" fill="white"/>
                        <path d="M46.4772 51.4207V52.5023H41.2764V45.5131H46.3121V46.5948H42.5147V48.4253H45.8994V49.507H42.5147V51.4207H46.4772Z" fill="white"/>
                        <path d="M56.0538 45.5131V52.5023H54.733V49.507H51.1832V52.5023H49.8623V45.5131H51.1832V48.4253H54.733V45.5131H56.0538Z" fill="white"/>
                        <path d="M66.7854 51.3374V53.9168H65.6297V52.4191H60.2637V53.9168H59.0254V51.3374H59.3556C59.7684 51.3374 60.0986 51.0046 60.2637 50.339C60.4288 49.6733 60.5114 48.8413 60.5939 47.6764L60.6765 45.4299H65.7948V51.3374H66.7854ZM61.502 50.0893C61.4194 50.6718 61.1718 51.0878 61.0067 51.4206H64.5565V46.5947H61.8322L61.7497 47.8428C61.6671 48.7581 61.5846 49.5069 61.502 50.0893Z" fill="white"/>
                        <path d="M70.7487 45.5131L72.3998 47.8429L74.0509 45.5131H75.5369L73.2253 48.8413L75.702 52.5023H74.216L72.3998 49.923L70.5836 52.5023H69.0977L71.5743 48.9245L69.2628 45.5131H70.7487Z" fill="white"/>
                        <path d="M78.5908 45.5131H79.8291V50.5054L83.544 45.5131H84.7823V52.5023H83.544V47.51L79.8291 52.5023H78.5908V45.5131Z" fill="white"/>
                        <path d="M95.0193 52.5023V47.8429L92.7078 51.6703H92.1299L89.8184 47.9261V52.5023H88.5801V45.5131H89.6533L92.3775 50.1726L95.1018 45.5131H96.175V52.5023H95.0193Z" fill="white"/>
                        <path d="M100.22 48.342H102.201V50.1726H100.22V48.342Z" fill="#4BC3E8"/>
                        <path d="M113.181 51.171C112.521 51.6702 111.613 52.003 110.457 52.003V52.7519H109.301V52.003C108.146 51.9198 107.237 51.6702 106.577 51.0878C105.917 50.5054 105.669 49.9229 105.669 49.0077C105.669 48.0924 105.999 47.3436 106.66 46.8443C107.32 46.3451 108.228 46.0123 109.384 45.9291V45.1802H110.54V45.9291C111.695 46.0123 112.603 46.2619 113.264 46.8443C113.924 47.3436 114.255 48.0924 114.255 49.0077C114.255 49.9229 113.842 50.5886 113.181 51.171ZM107.568 50.4221C107.98 50.755 108.558 51.0046 109.384 51.0046V46.9275C107.815 47.0107 106.99 47.7596 106.99 48.9245C106.907 49.5901 107.155 50.0061 107.568 50.4221ZM112.356 50.4221C112.769 50.0893 112.934 49.5901 112.934 49.0077C112.934 48.4252 112.686 47.926 112.273 47.5932C111.86 47.2604 111.283 47.094 110.457 47.0107V51.0878C111.283 50.9214 111.943 50.755 112.356 50.4221Z" fill="white"/>
                        <path d="M122.014 50.8382H118.547L117.886 52.4191H116.565L119.702 45.4299H120.941L124.078 52.4191H122.757L122.014 50.8382ZM121.601 49.8397L120.28 46.7612L118.959 49.8397H121.601Z" fill="white"/>
                        <path d="M131.508 45.7627C131.92 45.9291 132.333 46.2619 132.498 46.5947C132.746 46.9276 132.829 47.4268 132.829 47.926C132.829 48.4252 132.746 48.8413 132.498 49.2573C132.251 49.6733 131.92 49.9229 131.508 50.0893C131.095 50.2558 130.517 50.4222 129.939 50.4222H128.371V52.4191H127.05V45.4299H129.939C130.517 45.5131 131.095 45.5963 131.508 45.7627ZM131.177 49.0077C131.508 48.7581 131.59 48.4252 131.59 48.0092C131.59 47.5932 131.425 47.2604 131.177 47.0108C130.93 46.7612 130.435 46.5947 129.857 46.5947H128.371V49.3405H129.857C130.435 49.3405 130.847 49.2573 131.177 49.0077Z" fill="white"/>
                        <path d="M142.488 52.5023V47.8429L140.177 51.6703H139.599L137.287 47.9261V52.5023H136.049V45.5131H137.122L139.846 50.1726L142.571 45.5131H143.644V52.5023H142.488Z" fill="white"/>
                        <path d="M97.1948 18.8795L90.9584 10.2121L84.6388 0H72.1659L84.4725 19.1369L71.667 39.0462H83.8904L90.7089 27.9759L97.6106 39.0462H110L97.1948 18.8795Z" fill="#0E5A9E"/>
                        <path d="M109.166 0H96.9989L90.833 9.96923H102.589L109.166 0Z" fill="#4BC3E8"/>
                    </svg>
                </a>
            </div>
            <div class="footer__nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'menu_id'        => 'footer-menu',
                    )
                );
                ?>
            </div>
            <div class="footer__contacts">
                <div class="header__search">
                    <form action="<?php bloginfo( 'url' ); ?>" method="get">
                        <input  type="text" name="s" placeholder="Поиск по сайту" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>"/>
                        <label for="batton-submit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.71 19.29L17.31 15.9C18.407 14.5025 19.0022 12.7767 19 11C19 9.41775 18.5308 7.87103 17.6518 6.55544C16.7727 5.23985 15.5233 4.21447 14.0615 3.60897C12.5997 3.00347 10.9911 2.84504 9.43928 3.15372C7.88743 3.4624 6.46197 4.22433 5.34315 5.34315C4.22433 6.46197 3.4624 7.88743 3.15372 9.43928C2.84504 10.9911 3.00347 12.5997 3.60897 14.0615C4.21447 15.5233 5.23985 16.7727 6.55544 17.6518C7.87103 18.5308 9.41775 19 11 19C12.7767 19.0022 14.5025 18.407 15.9 17.31L19.29 20.71C19.383 20.8037 19.4936 20.8781 19.6154 20.9289C19.7373 20.9797 19.868 21.0058 20 21.0058C20.132 21.0058 20.2627 20.9797 20.3846 20.9289C20.5064 20.8781 20.617 20.8037 20.71 20.71C20.8037 20.617 20.8781 20.5064 20.9289 20.3846C20.9797 20.2627 21.0058 20.132 21.0058 20C21.0058 19.868 20.9797 19.7373 20.9289 19.6154C20.8781 19.4936 20.8037 19.383 20.71 19.29ZM5 11C5 9.81332 5.3519 8.65328 6.01119 7.66658C6.67047 6.67989 7.60755 5.91085 8.7039 5.45673C9.80026 5.0026 11.0067 4.88378 12.1705 5.11529C13.3344 5.3468 14.4035 5.91825 15.2426 6.75736C16.0818 7.59648 16.6532 8.66558 16.8847 9.82946C17.1162 10.9933 16.9974 12.1997 16.5433 13.2961C16.0892 14.3925 15.3201 15.3295 14.3334 15.9888C13.3467 16.6481 12.1867 17 11 17C9.4087 17 7.88258 16.3679 6.75736 15.2426C5.63214 14.1174 5 12.5913 5 11Z" fill="white"/>
                            </svg>
                            <input id="batton-submit" type="submit" value="Найти"/>
                        </label>
                    </form>
                </div>
                <div class="footer__contacts-items">
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
                </div>
            </div>
            <div class="footer__copyright">
                © 2017 Биомедхим. Все права защищены. Использование материалов сайта разрешено только с указанием ссылки на источник.
                <span class="design-author">
                    <img src="<?php echo get_template_directory_uri()?>/images/author-logo.svg" alt="">
                </span>
            </div>
        </div>
	</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=&lang=ru_RU" type="text/javascript" defer></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/dist/js/fresco.min.js" defer></script>
<script src="<?php echo get_template_directory_uri() ?>/dist/js/common.js" defer></script>
<?php wp_footer(); ?>

</body>
</html>
