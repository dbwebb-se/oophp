<?php

namespace Anax\View;

/**
 * Render the resultset from a database request.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


//var_dump($res);
?><ul>
    <?php foreach ($res as $row) : ?>
        <li><a href="<?= url("content/edit/{$row->id}") ?>"><?= $row->title ?></li>
    <?php endforeach; ?>
</ul>
