<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Don
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" style="background-image:url('<?php header_image(); ?>');">

			<div class="navbar">
				<div class="row">
					<div class="site-branding">	
						<div class="logo">
						<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );						
						if (!$image[0]):?>
							<h1 class="site-title"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else :?>
							<h1><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $image[0] ); ?>"></a></h1>
						<?php endif;?>						</div>
						<?php 
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div>
					
					<a class="toggle" gumby-trigger="#nav" href="#"><i class="icon-menu"></i></a>
					<nav class="nav-panel" id="nav">
						<div class="logo">
							<p><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
						</div>
						<?php 

						if( has_nav_menu('primary') ){
							wp_nav_menu( array( 'theme_location' => 'primary', 'container'=>'', 'fallback_cb' =>'', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'walker' => new don_walker) );
						}
						else{
							if (current_user_can( 'administrator' )){
								echo '<ul class="no-menu"><li><a href="' . esc_url( admin_url('/') ) . 'nav-menus.php">' . esc_html__('Go to "Appearance - Menus" to set-up menu', 'don') . '</a></li></ul>';	
							}
						}?>
					</nav>
				</div>
			</div>

	</header><!-- #masthead -->