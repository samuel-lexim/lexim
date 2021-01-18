<?php
$postId = get_the_ID();

if (isset($args) && $args) { ?>

    <div class="text_logo_slider_section one_col">
        <?php if (isset($args['heading']) && $args['heading']) { ?>
            <h2 class="hncHeading "><?= $args['heading'] ?></h2>
        <?php } ?>

        <?php if (isset($args['items'])) {
            if (is_array($args['items']) && count($args['items']) > 0) { ?>
                <div class="three_items_slick">
                    <?php foreach ($args['items'] as $item) { ?>
                        <div class="three_items_slick_item">
                            <div class="_inner">
                                <div class="_leftTxt">
                                    <?php if ($item["heading"]) { ?>
                                        <p class="_heading"><?= $item["heading"] ?></p>
                                    <?php } ?>
                                    <?php if ($item["content"]) { ?>
                                        <div class="_content"><?= $item["content"] ?></div>
                                    <?php } ?>
                                </div>
                                <div class="_rightLogo">
                                    <?php if ($item["logo"]) {
                                        $logo = $item["logo"];
                                        $logoAlt = isset($item['heading']) ? $item['heading'] : "";
                                        if (is_array($logo)) {
                                            $logo = isset($item["logo"]["url"]) ? $item["logo"]["url"] : $logo;
                                            $logoAlt = isset($item["logo"]["alt"]) && $item["logo"]["alt"] !== "" ? $item["logo"]["alt"] : $logoAlt;
                                        }
                                        ?>
                                        <img class="svg" src="<?= $logo ?>" alt="<?= $logoAlt ?>"/>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
        } ?>

    </div>

<?php }