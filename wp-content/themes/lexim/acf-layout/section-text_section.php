<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    $style = $args['section_background'] ? 'background:' . $args['section_background'] : '';
    $style .= $args['text_color'] ? ';color:' . $args['text_color'] : '';

    $sectionClass = $args['title_is_h1'] ? 'title_is_h1' : '';
    $titClass = $args['is_big_title'] ? 'is_big_title' : '';
    $desClass = $args['is_big_description'] ? 'is_big_description' : '';
    ?>

    <div class="text_section one_col <?= $sectionClass ?>" style="<?= $style ?>">
        <?php if ($args['title']) { ?>
            <?php if ($args['title_is_h1']) { ?>
                <h1 class="dfHeading <?= $titClass ?>"><?= $args['title'] ?></h1>
            <?php } else { ?>
                <h2 class="dfHeading <?= $titClass ?>"><?= $args['title'] ?></h2>
            <?php } ?>

        <?php } ?>

        <?php if ($args['logo']) { ?>
            <img class="_logo" src="<?= $args['logo']['url'] ?>" alt="<?= $args['title'] ? $args['title'] : $args['logo']['alt'] ?>"/>
        <?php } ?>

        <?php if ($args['description']) { ?>
            <div class="dfTxt <?= $desClass ?>">
                <p class="<?= $desClass ?>"><?= $args['description'] ?></p>
            </div>
        <?php } ?>

    </div>

<?php } ?>