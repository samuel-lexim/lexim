<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    $sectionClass = $args['title_is_h1'] ? 'title_is_h1' : '';
    ?>

    <div class="imageText_section one_col">
        <div class="left-flex40">
            <?php if ($args['left_image'] && is_array($args['left_image'])) { ?>
                <img src="<?= $args['left_image']['url'] ?>" alt="<?= $args['left_image']['alt'] ?>" />
            <?php } ?>
        </div>
        <div class="right-flex60">
            <?php if ($args['title']) { ?>
                <?php if ($args['title_is_h1']) { ?>
                    <h1 class="hncHeading "><?= $args['title'] ?></h1>
                <?php } else { ?>
                    <h2 class="hncHeading "><?= $args['title'] ?></h2>
                <?php } ?>
            <?php } ?>

            <?php if ($args['description']) { ?>
                <div class="_description"><?= $args['description'] ?></div>
            <?php } ?>
        </div>


    </div>

<?php } ?>