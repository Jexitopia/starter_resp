<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nounowstarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id'        => 'secondary-menu',
				'menu_class'	 => 'link',
			) );
			?>
		<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>
		<?php if($_COOKIE[$cookie_name] == 'night-mode') {
    echo "/public/images/logowhite.png";
} else {
    echo "/public/images/logo.png";
} ?>" id="footer-logo" alt="main logo"></a>
			<span class="sep">  </span>
			<p class="copyright">© nounow.net 2020, All rights reserved</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
