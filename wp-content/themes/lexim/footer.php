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
?>

<footer class="site-footer" id="footer">
    <div class="site-info">
        <div class="left-footer">
            <div class="_inner">
                <?php if ($social_links && is_array($social_links)) { ?>
                    <div class="footer_socials">
                        <?php foreach ($social_links as $social) { ?>
                            <a href="<?= $social['link'] ?>">
                                <img class="svg" src="<?= $social['logo'] ?>" alt="<?= $social['link'] ?>" />
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="site-info bottom">
        <div class="left-footer">
            <?php if ($copy_rights) { ?>
                <p class="copy-rights"><?= $copy_rights ?></p>
            <?php } ?>
        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
