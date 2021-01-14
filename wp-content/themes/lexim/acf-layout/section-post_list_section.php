<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    ?>

    <div class="post_list_section one_col">
        <?php if ($args['heading']) { ?>
            <h2 class="hncHeading "><?= $args['heading'] ?></h2>
        <?php } ?>


        <?php if ($args['post_items']) {
            if (is_array($args['post_items'])) {
                $type = $args['post_items'][0]->post_type;
                ?>
                <div class="post_list_items <?= $type ?>">

                    <?php foreach ($args['post_items'] as $item) {
                        $postId = $item->ID;
                        if ($item->post_type === 'team') {
                            $position = get_field('position', $postId);
                            $fb = get_field('sl_fb', $postId);
                            $twitter = get_field('sl_tt', $postId);
                            $google = get_field('sl_goo', $postId);
                            $instagram = get_field('sl_ins', $postId);

                            ?>
                            <div class="post_list_item <?= $type ?>">
                                <div class="_inner">
                                    <?= get_the_post_thumbnail($item, 'full'); ?>
                                    <p class="_name"><?= $item->post_title ?></p>
                                    <p class="_position"><?= $position ?></p>
                                    <div class="_socials">
                                        <?php if ($fb) { ?>
                                            <a href="<?= $fb ?>">
                                                <img class="svg" src="<?= get_stylesheet_directory_uri() . '/assets/socials/ico-fb.svg' ?>" alt=""/>
                                            </a>
                                        <?php } ?>
                                        <?php if ($twitter) { ?>
                                            <a href="<?= $twitter ?>">
                                                <img class="svg" src="<?= get_stylesheet_directory_uri() . '/assets/socials/ico-tt.svg' ?>" alt=""/>
                                            </a>
                                        <?php } ?>
                                        <?php if ($google) { ?>
                                            <a href="<?= $google ?>">
                                                <img class="svg" src="<?= get_stylesheet_directory_uri() . '/assets/socials/ico-gg.svg' ?>" alt=""/>
                                            </a>
                                        <?php } ?>
                                        <?php if ($instagram) { ?>
                                            <a href="<?= $instagram ?>">
                                                <img class="svg" src="<?= get_stylesheet_directory_uri() . '/assets/socials/ico-in.svg' ?>" alt=""/>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <p class="_content"><?= $item->post_content ?></p>
                                </div>
                            </div>
                        <?php } else { // Clients ?>
                            <div class="post_list_item <?= $type ?>">
                                <div class="_inner">
                                    <?= get_the_post_thumbnail($item, 'full'); ?>
                                </div>
                            </div>
                        <?php } ?>

                    <?php } ?>
                </div>
            <?php } ?>
        <?php } ?>

    </div>

<?php } ?>