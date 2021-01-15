<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    if ($args["timeline_items"] && is_array($args["timeline_items"]) && count($args["timeline_items"]) > 0) {
        $leftCol = $args["timeline_items"];
        $rightCol = [];
        if (count($leftCol) > 1) {
            list($leftCol, $rightCol) = array_chunk($leftCol, ceil(count($leftCol) / 2));
        }
    }
    ?>

    <?php if (isset($leftCol) && isset($rightCol)) { ?>
        <div class="timeline_section one_col22" ">
<!--        <img class="imgBg" src="--><!--" alt=""/>-->
        <div class="_inner">
            <div class="leftCol">
                <?php if (is_array($leftCol) && count($leftCol) > 0) {
                    foreach ($leftCol as $item) { ?>
                        <div class="timeline_item">
                            <div class="_img">
                                <img src="<?= $item["logo"]["url"] ?>" alt="<?= $item["logo"]["alt"] ?>"/>
                            </div>
                            <div class="_txtGroup">
                                <?php if ($item['year']) { ?>
                                    <p class="_year"><?= $item['year'] ?></p>
                                <?php } ?>
                                <?php if ($item['title']) { ?>
                                    <p class="_tit"><?= $item['title'] ?></p>
                                <?php } ?>
                                <?php if ($item['content']) { ?>
                                    <div class="_content"><?= $item['content'] ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="rightCol">
                <?php if (is_array($rightCol) && count($rightCol) > 0) {
                    foreach ($rightCol as $item) { ?>
                        <div class="timeline_item">
                            <div class="_img">
                                <img src="<?= $item["logo"]["url"] ?>" alt="<?= $item["logo"]["alt"] ?>"/>
                            </div>
                            <div class="_txtGroup">
                                <?php if ($item['year']) { ?>
                                    <p class="_year"><?= $item['year'] ?></p>
                                <?php } ?>
                                <?php if ($item['title']) { ?>
                                    <p class="_tit"><?= $item['title'] ?></p>
                                <?php } ?>
                                <?php if ($item['content']) { ?>
                                    <div class="_content"><?= $item['content'] ?></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
<?php }

