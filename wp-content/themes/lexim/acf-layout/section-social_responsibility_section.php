<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    if ($args['items'] && is_array($args['items'])) { ?>
        <div class="social-section ">

            <?php foreach ($args['items'] as $grid) { ?>
                <div class="social-section-item">
                    <?php if ($grid['logo']) { ?>
                        <img src="<?= $grid['logo']['url'] ?>" alt="<?= $grid['logo']['alt'] ?>"/>
                    <?php } ?>
                    <?php if ($grid['heading']) { ?>
                        <h2 class="dfHeading"><?= $grid['heading'] ?></h2>
                    <?php } ?>
                    <?php if ($grid['description']) { ?>
                        <p class="dfTxt"><?= $grid['description'] ?></p>
                    <?php } ?>
                </div>
                <?php
            } ?>

        </div>
    <?php } ?>

<?php } ?>