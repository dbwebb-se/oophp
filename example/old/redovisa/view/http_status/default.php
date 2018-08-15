<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare incoming variables
$class   = $class   ?? null;
$title   = $title   ?? "Title not set";
$message = $message ?? "Message not set";

?><article class="article $class">
<h1><?= $title ?></h1>
<p><?= $message ?></p>
</article>
