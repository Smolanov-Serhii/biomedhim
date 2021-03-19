<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package biomedhim
 */

get_header();
?>

	<main id="search" class="site-main bio-container search">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title section-title">
                    Результаты поиска для:
                    <span>
                        <svg width="38" height="40" viewBox="0 0 38 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 0.75H38L11 39.25H0L27 0.75Z" fill="#86C9DE"/>
                        </svg>
                    </span>
                    &nbsp
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( '  %s', 'biomedhim' ), '<span>&nbsp ' . get_search_query() . '</span>' );
					?>

				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content-search', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
