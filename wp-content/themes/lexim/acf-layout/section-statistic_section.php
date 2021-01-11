<?php
$postId = get_the_ID();

if (isset($args) && $args) {

    if ($args['items'] && is_array($args['items']) && count($args['items']) > 0) {
        ?>

        <div class="statistic_section one_col">
            <div class="statistic-items">
                <?php foreach ($args['items'] as $item) { ?>
                    <div class="statistic-item">
                        <?php if ($item['logo']) { ?>
                            <img class="svg" src="<?= $item['logo']['url'] ?>" alt="<?= $item['logo']['alt'] ?>" />
                        <?php } ?>

                        <?php if ($item['counter']) { ?>
                            <p class="_counter "><?= $args['counter'] ?></p>
                        <?php } ?>

                        <?php if ($item['name']) { ?>
                            <h3 class="_name"><?= $args['name'] ?></h3>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>


        </div>
    <?php } ?>

<?php } ?>