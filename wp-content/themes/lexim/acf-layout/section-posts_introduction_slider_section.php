<?php
$postId = get_the_ID();

if (isset($args) && $args) {

    $slideBg = isset($args['section_background']) && is_array($args['section_background']) ?
        $args['section_background']['value'] : $args['section_background'];

    ?>

    <div class="post_introduction_slider_section <?= $slideBg ?>">
        <?php if ($args['heading']) { ?>
            <h2 class="hncHeading "><?= $args['heading'] ?></h2>
        <?php } ?>


        <?php if ($args['slide_items']) { ?>
            <div class="introduction_slick">

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
                            $excerpt = $item['excerpt'] ?? '';
                            $introduction = $item['introduction'] ?? '';
                            ?>
                        <?php } ?>

                        <div class="introduction_slick_item">

                        </div>

                    <?php } ?>
                <?php } ?>

            </div>
        <?php } ?>

    </div>

<?php } ?>