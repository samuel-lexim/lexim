<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    $style = $args['text_color'] ? 'color:' . $args['text_color'] : '';
    ?>

    <div class="hero_section" style="<?= $style ?>">
        <?php if ($args['image']) { ?>
            <img class="_logo desktop" src="<?= $args['image']['url'] ?>"
                 alt="<?= $args['image']['alt'] ? $args['image']['alt'] : $args['slogan'] ?>"/>
        <?php } ?>

        <?php if ($args['mobile_image']) { ?>
            <img class="_logo mobile" src="<?= $args['mobile_image']['url'] ?>"
                 alt="<?= $args['mobile_image']['alt'] ? $args['mobile_image']['alt'] : $args['slogan'] ?>"/>
        <?php } ?>

        <?php if ($args['slogan']) { ?>
            <?php if ($args['is_h1']) { ?>
                <h1 class="dfHeading"><?= $args['slogan'] ?></h1>
            <?php } else { ?>
                <h2 class="dfHeading"><?= $args['slogan'] ?></h2>
            <?php } ?>

        <?php } ?>
    </div>

<?php } ?>