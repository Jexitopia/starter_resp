<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nounowstarter
 */

get_header();
?>
<div class="main-layout">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header underlined">				
			<h1 class="search-header">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( '검색: "%s', 'nounowstarter' ), '<span>' . get_search_query() . '"  </span>' );
						global $wp_query;
echo $wp_query->found_posts.'건 검색되었습니다.';
						?>
						</h1>		
		
			</header><!-- .page-header -->
<div class="archive post-list show">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );



			endwhile;

			the_posts_navigation();				?>

			</div><!-- post-list-->
		</main><!-- #main -->
	</div><!-- #primary -->

				<?php

		else :

			get_template_part( 'template-parts/content', 'none' ); ?>

			</div><!-- post-list-->
		</main><!-- #main -->


			<?php

		endif;
		?>


	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
