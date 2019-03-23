<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Nu Themes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php wp_title( '-', true, 'right' ); ?></title>

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

	<body id="body">

	<div class="wrapper">
        <section id="navigation" class="mainPageNav navStart navFixed">
            <nav class="navbar navbar-expand-lg navbar-light scrollStart">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="<?=get_template_directory_uri()?>/img/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'primary',
							'depth'				=> 2,
							'menu_class'		=> 'navbar-nav ml-auto',
							'container_class'	=> 'collapse navbar-collapse',
							'fallback_cb'		=> 'nuthemes_bootstrap_navwalker::fallback',
							'walker'			=> new nuthemes_bootstrap_navwalker()
						) );
					?>
                </div>
              </nav>
        </section>
