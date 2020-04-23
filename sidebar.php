<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nounowstarter
 */


?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<div class="sidebar">
                <div class="weekly-best-news first">
                    <h6 class="w-title"><i class="fas fa-fire"></i> 베스트 포스트</h6>
                    <span class="line"></span>
                    <div class="best-grid">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Best-Posts") ) : ?>
<?php endif;?>
                    </div>



                    <div class="dot-container">
                        <button class="dot fst" onclick="showFirst()"></button>
                        <button class="dot scnd" onclick="showSecond()"></button>
                        <button class="dot trd" onclick="showThird()"></button>
                    </div>

                </div><!--Latest news end-->

                <div class="ad-section">                   
                </div>  

                <div class="recommended-news">
                    <h6 class="w-title"><i class="fas fa-sort-amount-up"></i> 인기 포스트</h6>
                    <span class="line"></span>





					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("side-w") ) : ?>
<?php endif;?>
										
					
					

                </div><!--Recommended news end-->
                </div> <!--sidebar ends -->
</aside><!-- #secondary -->
