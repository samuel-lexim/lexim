<?php
$postId = get_the_ID();

if (isset($args) && $args) { ?>

    <div class="banner_section">

        <?php if ($args['banners']) { ?>
            <div class="banner_slick_wrap leftDot">
                <?php if (is_array($args['banners'])) {
                    foreach ($args['banners'] as $banner) { ?>

                        <div class="banner_item">
                            <div class="_inner one_col">
                                <div class="banner_text">
                                    <?php if ($banner['heading']) { ?>
                                        <?php if ($banner['is_h1_tag']) { ?>
                                            <h1 class="_heading bold-font"><?= $banner['heading'] ?></h1>
                                        <?php } else { ?>
                                            <h2 class="_heading bold-font"><?= $banner['heading'] ?></h2>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if ($banner['summary']) { ?>
                                        <p class="_summary"><?= $banner['summary'] ?></p>
                                    <?php } ?>

                                    <?php if ($banner['button_link'] && $banner['button_text']) { ?>
                                        <a class="_button" href="<?= $banner['button_link'] ?>">
                                            <span><?= $banner['button_text'] ?></span>
                                        </a>
                                    <?php } ?>
                                </div>

                                <div class="banner_img">
                                    <?php if ($banner['right_image'] && is_array($banner['right_image'])) { ?>
                                        <img src="<?= $banner['right_image']['url'] ?>" alt="<?= $banner['right_image']['alt'] ?>" />
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

<?php } ?>