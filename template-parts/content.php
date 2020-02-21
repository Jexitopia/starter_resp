<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nounowstarter
 */

?>
		<?php
		if ( is_singular() ) :
			?> 
            <article id="post-<?php the_ID(); ?>" class="single-wrapper">      
            <div class="single-meta"><p>    
  <?php the_category('slug') ?></p>
                                      </div>   
                           <div class="single-post-article">
                            <h1><?php the_title(); ?></h1>  
                            <div class="subheading"> <?php the_excerpt() ?></div>
                            <p class="single-date">Published on <?php the_date('Y-m-d l'); ?></p>
                             <?php the_content(); ?>    
                             <?php // GET TAGS BY POST_ID
 $tags = get_the_tags($post->ID);  ?>
 
 <ul class="cloudTags">
 
      <?php foreach($tags as $tag) :  ?>
 
     <li>
        <a class="tag"
            href="<?php bloginfo('url');?>/tag/<?php print_r($tag->slug);?>">
                  <?php print_r($tag->name); ?>
         </a>   
      </li>
      <?php endforeach; ?>
</ul>              
                            </div>
</article><!-- #post-<?php the_ID(); ?> -->
			
	<?php elseif ( is_home() ) :
			?><article id="post-<?php the_ID(); ?>" class="news-box newest">             
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="링크:<?php the_title(); ?>" class="link-box">
                        <?php echo the_post_thumbnail( 'full', array( 'style' => 'width=100%')); ?>
                        <div class="dark-overlay"></div>                   
                            <div class="news-text-position">
                            <h5 class="post-title"><?php the_title(); ?></h5>  
                            <p class="subtitle"> <?php echo get_the_excerpt(); ?></p>
                            </a>
                            <div class="credit-position">
                                <div class="credit">							
								<span class="cat-link"><?php the_category('slug') ?></span>
                     <p> &centerdot; <?php the_time(); ?></p></div> 
                            </div>
                        </div> <!-- End of news-text-position -->              
</article><!-- #post-<?php the_ID(); ?> -->
<?php else :
    ?>
    <div class="archive-post">
    <article id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink() ?>" rel="bookmark" title="링크: <?php the_title(); ?>">
    <?php echo the_post_thumbnail( 'full', array( 'style' => 'width=100%')); ?>   
    </a>
    <div class="news-text-position">
    <a href="<?php the_permalink() ?>" rel="bookmark" title="링크: <?php the_title(); ?>">
    <h5 class="post-title"><?php the_title(); ?></h5> 
    <p class="subtitle"><?php echo get_the_excerpt(); ?></p>    
    </a>

    </div>    <div class="date-position credit"><p><?php the_time(); ?></p></div>

    </article>
    </div>
 
<?php     endif; ?>


