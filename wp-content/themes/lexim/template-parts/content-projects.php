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

            <div class="button_contact">
                <a class="_button" href="javascript:void(0)"><span>Free Consultation</span></a>
            </div>
        </div>
    </header>


    <div class="entry-content">
        <?php lexim_post_thumbnail('full'); ?>
        <?php the_content(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?= $postId; ?> -->
