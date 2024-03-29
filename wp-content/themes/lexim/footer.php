<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cherokee-brazil
 */

$copy_rights = get_field('copy_rights', 'option');
$social_links = get_field('social_links', 'option');

$rightImg = get_field('contact_section_right_image', 'option');

?>

<div class="contact_section text_section one_col color_SeaGreen">
    <?php if (isset($rightImg) && $rightImg) { ?>
    <div class="absImg" style="background-image: url('<?= $rightImg['url'] ?>')"></div>
    <?php } ?>
    <h2 class="dfHeading ">Tell us about your project.</h2>
    <div class="_description"></div>
    <div class="button_contact">
        <a class="_button" href="javascript:void(0)"><span>Free Consultation</span></a>
    </div>
</div>

<footer class="site-footer" id="footer">

    <?php if ($social_links && is_array($social_links)) { ?>
        <div class="footer_socials">
            <?php foreach ($social_links as $social) { ?>
                <a href="<?= $social['link'] ?>">
                    <img class="svg" src="<?= $social['logo'] ?>" alt="<?= $social['link'] ?>"/>
                </a>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if ($copy_rights) { ?>
        <p class="copy-rights"><?= $copy_rights ?></p>
    <?php } ?>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<style id="customCSS"></style>

</body>
</html>
