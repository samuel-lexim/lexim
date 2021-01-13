<?php
get_header();
?>

    <main id="main" class="site-main post-detail-page <?= get_post_type() . '-type' ?> ">

        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', get_post_type() );
        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->

<?php
get_footer();
