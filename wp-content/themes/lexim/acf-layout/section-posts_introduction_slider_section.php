<?php
$postId = get_the_ID();

if (isset($args) && $args) {

    $slideBg = isset($args['section_background']) && is_array($args['section_background']) ?
        $args['section_background']['value'] : $args['section_background'];

    ?>

    <div class="post_introduction_slider_section <?= $slideBg ?>">
        <?php if ($args['heading']) { ?>
            <h2 class="hncHeading one_pad"><?= $args['heading'] ?></h2>
        <?php } ?>


        <?php if ($args['slide_items']) { ?>
            <div class="introduction_slick default_slick_slider rightDot">
                <?php if (is_array($args['slide_items'])) {
                    foreach ($args['slide_items'] as $item) {

                        if (isset($item['post_item']) && is_object($item['post_item'])) {
                            $_post = $item['post_item'];
                            $featuredImg = false;
                            $featuredImgAlt = '';
                            if (isset($item['featured_image'])) {
                                if (is_array($item['featured_image'])) {
                                    $featuredImg = $item['featured_image']['url'];
                                    $featuredImgAlt = trim($item['featured_image']['alt']);
                                } else {
                                    $featuredImg = $item['featured_image'];
                                }
                                $featuredImgAlt = $featuredImgAlt === '' ? $_post->post_title : $featuredImgAlt;
                            }
                            $excerpt = isset($item['excerpt']) && trim($item['excerpt']) !== '' ? $item['excerpt'] : $_post->post_excerpt;
                            $introduction = isset($item['introduction']) && $item['introduction'] !== '' ? $item['introduction'] : $_post->post_title;
                            ?>

                            <div class="introduction_slick_item">
                                <div class="_inner one_col">
                                    <div class="img_sum">
                                        <?php if (!$featuredImg) {
                                            echo get_the_post_thumbnail($_post, 'full');
                                            ?>
                                        <?php } else { ?>
                                            <img class="attachment-full size-full wp-post-image" src="<?= $featuredImg ?>" alt="<?= $featuredImgAlt ?>"/>
                                        <?php } ?>
                                        <p class="_intro"><?= $introduction ?></p>
                                    </div>

                                    <div class="tit_link">
                                        <p class="_excerpt"><?= $excerpt ?></p>

                                        <a class="_button transparent" href="<?= get_permalink($_post) ?>">
                                            <span>View Project</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

<?php } ?>