<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?><navbar class="navbar">
<?php foreach ($navbar ?? [] as $item) : ?>
    <a href="<?= url($item["url"]) ?>" title="<?= $item["title"] ?>"><?= $item["text"] ?></a>
<?php endforeach; ?>
</navbar>
