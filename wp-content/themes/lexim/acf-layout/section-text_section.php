<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    $bgColor = 'color_' . $args['section_background'];
    $sectionClass = $args['title_is_h1'] ? 'title_is_h1' : '';
    ?>

    <div class="text_section one_col <?= $bgColor ?>">
        <?php if ($args['title']) { ?>
            <?php if ($args['title_is_h1']) { ?>
                <h1 class="dfHeading "><?= $args['title'] ?></h1>
            <?php } else { ?>
                <h2 class="dfHeading "><?= $args['title'] ?></h2>
            <?php } ?>
        <?php } ?>


        <?php if ($args['description']) { ?>
            <div class="_description"><?= $args['description'] ?></div>
        <?php } ?>

        <?php if ($args['free_consultation']) { ?>
            <div class="button_contact">
                <a class="" href="javascript:void(0)"><span>Free Consultation</span></a>
            </div>
        <?php } ?>

    </div>

<?php } ?>