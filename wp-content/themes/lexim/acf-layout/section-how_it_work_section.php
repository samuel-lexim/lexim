<?php
$postId = get_the_ID();

if (isset($args) && $args) { ?>

    <div class="how_it_work_section one_col">
        <?php if ($args['heading']) { ?>
            <h2 class="hncHeading "><?= $args['heading'] ?></h2>
        <?php } ?>

        <?php if ($args['items']) { ?>
            <div class="how_it_work_items">
                <?php if (is_array($args['items'])) {
                    foreach ($args['items'] as $item) { ?>

                        <div class="how_it_work_item">
                            <div class="_inner">
                                <?php if ($item['logo'] && is_array($item['logo'])) { ?>
                                    <img class="_logo" src="<?= $item['logo']["url"] ?>" alt="<?= $item['logo']["alt"] ?>"/>
                                <?php } ?>
                                <p class="_name"><?= $item["title"] ?></p>
                            </div>
                        </div>

                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

<?php } ?>