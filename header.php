<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nounowstarter
 */

?>
<!doctype html>
<?php 

$cookie_name = "themeStyle";

?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"> 
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/e5686db9bc.js" crossorigin="anonymous" SameSite=None Secure></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800&display=swap&subset=korean" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gothic+A1:900&display=swap" rel="stylesheet">
	<meta name="google-site-verification" content="bMUIaS8JAApWosPoBEYJ9IaLfDrmQCQRhnyHwBCzzVE" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157270639-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157270639-1');
</script>

	<?php wp_head(); ?>
</head>

<body class="<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "";
} else {
    echo $_COOKIE[$cookie_name];
}
?>" onload="document.body.style.opacity='1'">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'nounowstarter' ); ?></a>

	<header id="masthead" class="site-header">
	<div class="header-container">
		<div class="menu-left">
        <button id="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></button>
		<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?><?php 
		if($_COOKIE[$cookie_name] == 'night-mode') {
    echo "/public/images/logowhite.png";
} else {
    echo "/public/images/logo.png";
} ?>
		" id="mainlogo" alt="Nounow logo"></a>

</div>
        <nav id="site-navigation" class="main-navigation">
	
		<?php
			wp_nav_menu( array(
				'theme_location' => 'main-nav',
				'menu_id'        => 'primary-menu',
				'menu_class'	 => 'link',
			) );
			?>
        </nav> <!-- #site-navigation -->

        <div class="socials">
			<?php get_search_form() ?>

			<button id="swapButton" onclick="swapStyle()"><i class="fas fa-moon"></i></button>
                 
        </div>
    
    </div>


		<!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content page-container
	<?php if (is_home()) {
				if (wp_is_mobile()) {
					echo "index-page";
				} else {} 
	} 
	?>">
<?php if (is_singular()) {

} elseif (is_search()) {

} else { ?>
	<?php if (is_home()) {
		if (wp_is_mobile()) {
		?><div class='featured-container'>
		<?php if ( function_exists('wpp_get_mostpopular') ) {
			/* Get up to the top 5 commented posts from the last 7 days */
			wpp_get_mostpopular(array(
				'limit' => 3,
				'range' => 'custom',
				'time_unit' => 'HOUR',
				'time_quantity' => '36',
				'cat' => $cat_id,
				'stats_views' => '0',
				'thumbnail_width' => 1920,
				'thumbnail_height' => 1080,
				'excerpt_by_words' => 1,
				'excerpt_length' => 55,
				'post_html' => '<div class="featured-wrapper">                      
				<a href="{url}">{thumb}</a>
				<div class="news-text-position">
				
				<p class="title-link">{title} </p> 
			
				</div>
				</div>',
				
			));
		}
	?>   <div class="dot-container first">
	<button class="dot fst" onclick="firstPoint()"></button>
	<button class="dot scnd" onclick="secondPoint()"></button>
	<button class="dot trd" onclick="thirdPoint()"></button>
</div>
		</div> <?php
	} else {} 
	} 
	?>
	<div class="switch-container">
			<button class="latest-switch current-switch" onclick="changeNews(latestnewslist)">최신</button>
			<button class="weekly-switch" onclick="changeNews(weeklybest)">인기</button>
			<button class="recommended-switch" onclick="changeNews(recommendednews)">급상승</button>
		</div>

		<script> 
		function changeNews(x) {
			var latestnewslist = document.querySelector('.post-list');
var weeklybest = document.querySelector('.weekly-best-news');
var recommendednews = document.querySelector('.recommended-news');

latestnewslist.classList.remove('show');
weeklybest.classList.remove('show');
recommendednews.classList.remove('show');

x.classList.add('show');

if (pageContainer.classList.contains('index-page')) {
	window.scrollTo({ top: imgheight + 5, behavior: 'smooth' });
} else {
window.scrollTo({ top: 0, behavior: 'smooth' });
}
if(latestnewslist.classList.contains('show')){
	latestSwitch.classList.add('current-switch');
} else {
	latestSwitch.classList.remove('current-switch');
}
if(weeklybest.classList.contains('show')){
	weeklySwitch.classList.add('current-switch');
} else {
	weeklySwitch.classList.remove('current-switch');
}
if(recommendednews.classList.contains('show')){
	recommendedSwitch.classList.add('current-switch');
} else {
	recommendedSwitch.classList.remove('current-switch');
}
}
</script>
 <?php } ?>
