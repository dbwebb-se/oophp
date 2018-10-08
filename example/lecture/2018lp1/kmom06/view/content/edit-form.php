<?php

namespace Anax\View;

/**
 * Render the resultset from a database request.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


//var_dump($res);
?><form method="post" action="<?= url("content/save") ?>">
    <p>
        <input type="text" name="id" value="<?= $res->id ?>" readonly>
    </p>
    <p>
        <input type="text" name="title" value="<?= $res->title ?>">
    </p>
    <p>
        <textarea name="data"><?= $res->data ?></textarea>
    </p>
    <p>
        <input type="submit" value="Save">
    </p>
</form>

<p><a href="<?= url("content") ?>">View all content</a></p>
