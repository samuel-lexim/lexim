<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    ?>

    <div class="post_list_section one_col" id="<?= $args['sectionId'] ?>">
        <?php if (isset($args['heading']) && $args['heading']) { ?>
            <h2 class="hncHeading "><?= $args['heading'] ?></h2>
        <?php } ?>

        <?php if (isset($args['post_type'])) {
            $type = is_array($args['post_type']) ? $args['post_type']['value'] : $args['post_type'];

            // Filter Bar
            if (isset($args['filter_bar_exists']) && $args['filter_bar_exists']) {
                $cats = get_categories([
                    'taxonomy' => $type . '_cat',
                    'post_type' => $type
                ]);

                if ($cats && count($cats) > 0) {
                    $options = '<option value=""' .
                        ' data-id="' . $args['sectionId'] . '"' .
                        ' data-type="' . $type . '"' .
                        ' data-slug=""' .
                        ' data-taxonomy="">All</option>';
                    ?>

                    <div class="taxonomy-filter-bar">
                        <div class="filter-item selected" data-id="<?= $args['sectionId'] ?>" data-type="<?= $type ?>"
                             data-slug="" data-taxonomy="">
                            <span>All</span>
                        </div>
                        <?php foreach ($cats as $cat) {
                            if (is_object($cat) && get_class($cat) === 'WP_Term') {
                                $options .= '<option value="' . $cat->slug .
                                    ' data-id="' . $args['sectionId'] . '"' .
                                    ' data-slug="' . $cat->slug . '"' .
                                    ' data-taxonomy="' . $cat->taxonomy . '" >' .
                                    $cat->name . '</option>';
                                ?>
                                <div class="filter-item" data-id="<?= $args['sectionId'] ?>" data-type="<?= $type ?>"
                                     data-slug="<?= $cat->slug ?>" data-taxonomy="<?= $cat->taxonomy ?>">
                                    <span><?= $cat->name . ' (' . $cat->category_count . ')' ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <select class="taxonomy-filter-bar-select"><?= $options ?></select>
                <?php } ?>

            <?php } ?>


            <?php
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