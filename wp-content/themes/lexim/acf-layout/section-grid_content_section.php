<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    $i = 1;
    if ($args['grid_list'] && is_array($args['grid_list'])) {
        foreach ($args['grid_list'] as $grid) {
            $isWhiteColor = $grid['is_white_text'] ? ' whiteText' : '';
            $even = $i % 2 === 0 ? 'even' : '';
            $bg = $grid['content_background'] ? $grid['content_background'] : '';
            $style = '';
            if ($bg) {
                $style = 'background: ' . $bg;
            }
            ?>
            <div class="content-img_flex-section <?= $even . $isWhiteColor ?>">
                <div class="_content_div" style="<?= $style ?>">
                    <div class="_inner">
                        <?php if ($grid['content'] && is_array($grid['content'])) {
                            foreach ($grid['content'] as $contentItem) { ?>
                                <h2 class="dfHeading"><?= $contentItem['heading'] ?></h2>
                                <p class="dfTxt"><?= $contentItem['description'] ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="_img_div">
                    <img src="<?= $grid['image']['url'] ?>" class="_img" alt="<?= $grid['image']['alt'] ?>"/>
                </div>
            </div>
            <?php
            $i++;
        }
    } ?>

<?php } ?>