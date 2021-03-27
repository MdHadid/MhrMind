<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MhrMind
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body class="main-layout" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- loader  -->
<div class="loader_bg">
<div class="loader"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/loading.gif" alt="#" /></div>
</div>
<!-- end loader -->
<div id="page" class="site">
	<header id="masthead" class="site-header">
	    <!-- header inner -->
	    <div class="header-top">
	      <div class="header">
	        <div class="container-fluid">
	          <div class="row">
	            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
	              <div class="full">
	                <div class="center-desk">
	                  <div class="logo">
	                  	<!-- end header inner -->
						<div class="site-branding">
							<?php
							if( ! the_custom_logo() ) : 
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$mhrmind_description = get_bloginfo( 'description', 'display' );
								if ( $mhrmind_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $mhrmind_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif;
							else: the_custom_logo();
						    endif; ?>
						</div><!-- .site-branding -->
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
	              <div class="header_information">
	               <div class="menu-area">
	                <div class="limit-box">
	                  <nav class="main-menu ">
	                    <ul class="menu-area-main">
	                      <li class="active"> <a href="index.html">Home</a> </li>
	                      <li> <a href="#courses">My Courses </a> </li>
	                      <li> <a href="#about">About</a> </li>
	                      <li> <a href="#learn">My Profile</a> </li>
	                      <li> <a href="#important">Become an Instructor</a> </li>
	                      <li> <a href="#contact">Contact</a> </li>
	                     </ul>
	                   </nav>
	                 </div>
	               </div> 
	               <div class="mean-last">
                       <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/search_icon.png" alt="#" /></a> <a href="#">login/sing up</a></div>              
	             </div>
	           </div>
	         </div>
	       </div>
	     </div>
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'mhrmind' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
