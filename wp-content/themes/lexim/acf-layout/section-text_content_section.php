<?php
$postId = get_the_ID();

if (isset($args) && $args) {
    $layout = '';
    if ($args['layout']) {
        $layout = is_array($args['layout']) ?  $args['layout']['value'] : $args['layout'];
    }
    ?>

    <div class="text_content_section <?= $layout ?>">

        <?php if ($args['text_repeater'] && is_array($args['text_repeater'])) {
            foreach ($args['text_repeater'] as $p) {
                $type = is_array($p['type']) ? $p['type']['value'] : $p['type'];
                switch ($type) {
                    case 'h1' :
                        echo "<h1 class='bold-font'>" . $p['text'] . "</h1>";
                        break;
                    case 'h2' :
                        echo "<h2>" . $p['text'] . "</h2>";
                        break;
                    case 'h3' :
                        echo "<h3>" . $p['text'] . "</h3>";
                        break;
                    case 'h4' :
                        echo "<h4>" . $p['text'] . "</h4>";
                        break;
                    case 'p' :
                        echo "<p>" . $p['text'] . "</p>";
                        break;
                    default :
                        echo $p['text'];
                        break;

                }

            } ?>
        <?php } ?>

    </div>

<?php } ?>