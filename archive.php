<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nounowstarter
 */

get_header();
?>
		<?php if ( have_posts() ) : ?>

<header class="page-header underlined">
	<?php

	if (is_category()) {
	$categories = get_the_category();
foreach ( $categories as $category ) { 
echo '<h1 class="category-header">' . $category->name . '</h1>';
echo '<div>' . $category->description . '</div>';
}
} else if (is_tag()) {
	echo '<h1 class="category-header">태그: ';
	echo single_tag_title();
	echo '</h1>';
}
else {}





	?>
</header><!-- .page-header -->
<div class="main-layout">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">


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
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			if (is_category()) {
				$term = get_queried_object();			
				$category = $term->slug;
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '6',
					'category' => $category,
					'button_label' => "<i class='fas fa-caret-down'></i>",
					'button_loading_label' => 'Loading...',
					'scroll' => 'false',
					'offset' => '30',
					'no_results_text' => 'No more posts.',
					'pause' => 'true',
					'images_loaded' => 'true',
					'css_classes' => 'load-more-btn'
				);	
				if(function_exists('alm_render')){
					alm_render($args);
				}
				
			} else if (is_tag()) {
				$tag = get_queried_object()->term_id;
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '6',
					'tag__and' => $tag,
					'button_label' => "<i class='fas fa-caret-down'></i>",
					'button_loading_label' => 'Loading...',
					'offset' => '30',
					'no_results_text' => 'No more posts.',
					'scroll' => 'false',
					'pause' => 'true',
					'images_loaded' => 'true',
					'css_classes' => 'load-more-btn'
				);	
				if(function_exists('alm_render')){
					alm_render($args);
				}
			}
			else {}
			

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</div><!-- post-list-->

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="sidebar">
                <div class="weekly-best-news first">
                    <h6 class="w-title"><i class="fas fa-fire"></i> 베스트 포스트</h6>
					<span class="line"></span>
					<div class="best-grid">
<?php
$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID; ?>

<?php if (wp_is_mobile()) { ?>

<?php if ( function_exists('wpp_get_mostpopular') ) {
    /* Get up to the top 5 commented posts from the last 7 days */
    wpp_get_mostpopular(array(
        'limit' => 9,
        'range' => 'last30days',
		'cat' => $cat_id,
		'stats_views' => '0',
		'stats_date' => 1,
		'stats_date_format' => 'Y-m-d',
		'thumbnail_width' => 1920,
		'thumbnail_height' => 1080,
		'excerpt_by_words' => 1,
		'excerpt_length' => 55,
		"wpp_start" => "<div class='test'>",
        "wpp_end" => "</div>",
		'post_html' => '		
							<div class="archive-post">
							<div class="ranking-nr"><span class="number">{item_position}</span></div>
							<article id="post">
							<a href="{url}" rel="bookmark" title="링크">
							{thumb}   
							</a>
							<div class="news-text-position">
							<a href="{url}" rel="bookmark" title="링크">
							<h5 class="post-title">{title}</h5> 
							<p class="subtitle">{summary}</p>    
							</a>
							</div><div class="date-position credit"><p>{date}</p></div>
							</article>
							</div>',
		


    ));
}
?> <?php } else { ?>

<?php if ( function_exists('wpp_get_mostpopular') ) {
    /* Get up to the top 5 commented posts from the last 7 days */
    wpp_get_mostpopular(array(
        'limit' => 9,
        'range' => 'last30days',
		'stats_views' => '0',
		'stats_date' => 1,
		'stats_date_format' => 'Y-m-d',
		'thumbnail_width' => 1920,
		'thumbnail_height' => 1080,
		'excerpt_by_words' => 1,
		'excerpt_length' => 55,
		"wpp_start" => "<div class='test'>",
        "wpp_end" => "</div>",
		'post_html' => '		
							<div class="archive-post">
							<div class="ranking-nr"><span class="number">{item_position}</span></div>
							<article id="post">
							<a href="{url}" rel="bookmark" title="링크">
							{thumb}   
							</a>
							<div class="news-text-position">
							<a href="{url}" rel="bookmark" title="링크">
							<h5 class="post-title">{title}</h5> 
							<p class="subtitle">{summary}</p>    
							</a>
							</div><div class="date-position credit"><p>{date}</p></div>
							</article>
							</div>',
		


    ));
}
?> 

<?php } ?></div><!-- end of best grid -->
                    <div class="dot-container">
                        <button class="dot fst" onclick="showFirst()"></button>
                        <button class="dot scnd" onclick="showSecond()"></button>
                    <button class="dot trd" onclick="showThird()"></button>
                    </div>

				</div><!--Latest news end-->

                <div class="recommended-news">
                    <h6 class="w-title"><i class="fas fa-sort-amount-up"></i> 인기 포스트</h6>
					<span class="line"></span>
					<?php if (wp_is_mobile()) { ?>
						<?php
if ( function_exists('wpp_get_mostpopular') ) {
    /* Get up to the top 5 commented posts from the last 7 days */
    wpp_get_mostpopular(array(
        'limit' => 9,
        'range' => 'last7days',
		'cat' => $cat_id,
		'stats_views' => '0',
		'stats_date' => 1, 
		'excerpt_by_words' => 1,
		'excerpt_length' => 55,
		'stats_date_format' => 'Y-m-d',
		'thumbnail_width' => 1920,
		'thumbnail_height' => 1080,
		'post_html' => '<div class="archive-post">
		<article id="post">
		<a href="{url}" rel="bookmark" title="링크">
		{thumb}   
		</a>
		<div class="news-text-position">
		<a href="{url}" rel="bookmark" title="링크">
		<h5 class="post-title">{title}</h5> 
		<p class="subtitle">{summary}</p>    
		</a>
		</div><div class="date-position credit"><p>{date}</p></div>
		</article>
		</div>',
		


    ));
}
?>
				<?php	} else { ?>
					<?php
if ( function_exists('wpp_get_mostpopular') ) {
    /* Get up to the top 5 commented posts from the last 7 days */
    wpp_get_mostpopular(array(
        'limit' => 9,
        'range' => 'last7days',
		'stats_views' => '0',
		'stats_date' => 1, 
		'excerpt_by_words' => 1,
		'excerpt_length' => 55,
		'stats_date_format' => 'Y-m-d',
		'thumbnail_width' => 1920,
		'thumbnail_height' => 1080,
		'post_html' => '<div class="archive-post">
		<article id="post">
		<a href="{url}" rel="bookmark" title="링크">
		{thumb}   
		</a>
		<div class="news-text-position">
		<a href="{url}" rel="bookmark" title="링크">
		<h5 class="post-title">{title}</h5> 
		<p class="subtitle">{summary}</p>    
		</a>
		</div><div class="date-position credit"><p>{date}</p></div>
		</article>
		</div>',
		


    ));
}
?>
			<?php	} ?>
				</div>
	</div>
</div>
</div>
<?php
get_footer();
