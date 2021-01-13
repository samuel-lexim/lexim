<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    ?>

    <div class="post_list_section one_col">
        <?php if (isset($args['heading']) && $args['heading']) { ?>
            <h2 class="hncHeading "><?= $args['heading'] ?></h2>
        <?php } ?>

        <?php if (isset($args['post_type'])) {
            $type = is_array($args['post_type']) ? $args['post_type']['value'] : $args['post_type'];

            $postArgs = array(
                'numberposts' => -1,
                'post_type' => $type,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            );

            $_posts = get_posts($postArgs);
            if (count($_posts) > 0) { ?>
                <div class="six_items_slick type-<?= $type ?>">
                    <?php foreach ($_posts as $project) {
                        ?>
                        <div class="post_type_slick_item">
                            <div class="_inner">
                                <?php echo get_the_post_thumbnail($project, 'projects-thumb') ?>
                                <div class="_overlay">
                                    <p><?= $project->post_title ?></p>
                                    <a class="_view_link" href="<?= get_permalink($project) ?>"><span>View <?= $type ?></span></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
            wp_reset_query();
        } ?>

    </div>

<?php } ?>