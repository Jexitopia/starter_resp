<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nounowstarter
 */

?>
<article id="post-<?php the_ID(); ?>" class="news-box">             
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="링크: <?php the_title(); ?>" class="link-box">
                        <?php echo the_post_thumbnail( 'full', array( 'style' => 'width=100%')); ?>
                        <div class="dark-overlay"></div>                   
                            <div class="news-text-position">
                            <h5 class="post-title"><?php the_title(); ?></h5>  
                            <p class="subtitle"> <?php the_excerpt(); ?></p>
                            </a>
                            <div class="credit-position">
                                <div class="credit">
								
								<span class="cat-link"><?php the_category('slug') ?></span>
                     <p> &centerdot; <?php the_time(); ?></p></div> 
                            </div>
                        </div> <!-- End of news-text-position -->              
</article><!-- #post-<?php the_ID(); ?> -->