<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexim
 */

$postId = get_the_ID();
?>

<article id="post-<?= $postId ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <div class="text_section one_col">
            <?php the_title('<h1 class="dfHeading">', '</h1>'); ?>
            <?php if ($topDescription = get_field('top_description', $postId)) { ?>
                <div class="_description"><?= $topDescription ?></div>
            <?php } ?>
            <div class="paddingForSlider"></div>
        </div>
    </header>


    <div class="entry-content">
        <?php
        $gallery = get_field('gallery', $postId);
        if (!is_array($gallery)) {
            $gallery = [];
        }

        $featuredImgId = get_post_thumbnail_id($postId);
        if ($featuredImgId) {
            $featuredImg['url'] = get_the_post_thumbnail_url($postId, 'full');
            $featuredImg['id'] = $featuredImgId;
            $featuredImg['alt'] = get_post_meta($featuredImgId, '_wp_attachment_image_alt', true);
            array_unshift($gallery, $featuredImg);
        }

        if (is_array($gallery) && count($gallery) > 0) {
            ?>
            <div class="banner_slick_wrap dots_outer">
                <?php foreach ($gallery as $imgItem) { ?>
                    <div class="gallery-item">
                        <img src="<?= $imgItem['url'] ?>" alt="<?= $imgItem['alt'] ?>"/>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php the_content(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?= $postId; ?> -->
