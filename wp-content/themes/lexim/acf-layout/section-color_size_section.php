<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    ?>

    <div class="color_size_section one_col">
        <?php if ($args['heading']) { ?>
            <h2 class="dfHeading"><?= $args['heading'] ?></h2>
        <?php } ?>

        <?php if ($args['description']) { ?>
            <p class="dfTxt"><?= $args['description'] ?></p>
        <?php } ?>

        <?php if ($args['size_list'] && is_array($args['size_list'])) { ?>
            <div class="size_group dfTxt">
                <?php foreach ($args['size_list'] as $row) { ?>
                    <div class="_row">
                        <div class="_type"><?= $row['name'] ?></div>
                        <?php if ($row['sizes'] && is_array($row['sizes'])) { ?>
                            <div class="_sizes">
                                <?php foreach ($row['sizes'] as $size) { ?>
                                    <span><?= $size['label'] ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($args['color_list'] && is_array($args['color_list'])) { ?>
            <div class="color_group">
                <?php foreach ($args['color_list'] as $color) {
                    $style = 'background: ';
                    $style .= $color['color_code'] ? $color['color_code'] : '#000'; ?>
                    <span style="<?= $style ?>"></span>
                <?php } ?>
            </div>
        <?php } ?>


    </div>

<?php } ?>