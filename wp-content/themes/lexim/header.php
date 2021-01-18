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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
<?php wp_body_open();
$social_links = get_field('social_links', 'option');
?>
<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="_mobile one_pad">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
                <div class="nav-icon menu-button" id="ClickToOpenMenu"><span></span></div>
            </div>
        </div>

        <div class="_desktop one_pad">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
                <div class="nav-icon menu-close-button" id="ClickToCloseMenu"><span></span></div>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php /*
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <?php esc_html_e( 'Primary Menu', 'lexim' ); ?></button> */ ?>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'header-menu'
                    )
                );
                ?>
            </nav>

            <?php if (isset($social_links) && is_array($social_links)) { ?>
                <div class="header_socials">
                    <?php foreach ($social_links as $social) { ?>
                        <a href="<?= $social['link'] ?>">
                            <img class="svg" src="<?= $social['logo'] ?>" alt="<?= $social['link'] ?>"/>
                        </a>
                    <?php } ?>
                </div>
            <?php } ?>

        </div>
    </header>
