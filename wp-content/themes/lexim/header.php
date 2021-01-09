<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lexim
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="57x57" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_57x57--2015_07_29__01_11_55.png">
    <!-- iPhone iOS ≤ 6 favicon -->

    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_114x114--2015_07_29__01_11_55.png">
    <!-- iPhone iOS ≤ 6 Retina favicon -->

    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_72x72--2015_07_29__01_11_55.png">
    <!-- iPad iOS ≤ 6 favicon -->

    <link rel="apple-touch-icon" sizes="144x144" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_144x144--2015_07_29__01_11_55.png">
    <!-- iPad iOS ≤ 6 Retina favicon -->

    <link rel="apple-touch-icon" sizes="60x60" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_60x60--2015_07_29__01_11_55.png">
    <!-- iPhone iOS ≥ 7 favicon -->

    <link rel="apple-touch-icon" sizes="120x120" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_120x120--2015_07_29__01_11_55.png">
    <!-- iPhone iOS ≥ 7 Retina favicon -->

    <link rel="apple-touch-icon" sizes="76x76" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_76x76--2015_07_29__01_11_55.png">
    <!-- iPad iOS ≥ 7 favicon -->

    <link rel="apple-touch-icon" sizes="152x152" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_152x152--2015_07_29__01_11_55.png">
    <!-- iPad iOS ≥ 7 Retina favicon -->

    <link rel="icon" type="image/png" sizes="196x196" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_196x196--2015_07_29__01_11_55.png">
    <!-- Android Chrome M31+ favicon -->

    <link rel="icon" type="image/png" sizes="160x160" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_160x160--2015_07_29__01_11_55.png">
    <!-- Opera Speed Dial ≤ 12 favicon -->

    <link rel="icon" type="image/png" sizes="96x96" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_96x96--2015_07_29__01_11_55.png">
    <!-- Google TV favicon -->

    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_32x32--2015_07_29__01_11_55.png">
    <!-- Default medium favicon -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/favicon_16x16--2015_07_29__01_11_55.png">
    <!-- Default small favicon -->

    <link rel="shortcut icon" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon/icon2015_07_29__01_11_55.ico">
    <!-- Default favicons (16, 32, 48) in .ico format -->

    <!--/Favicon -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lexim' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$lexim_description = get_bloginfo( 'description', 'display' );
			if ( $lexim_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $lexim_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'lexim' ); ?></button>
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
