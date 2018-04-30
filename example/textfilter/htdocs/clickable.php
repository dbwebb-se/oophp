<?php

// Include essentials
require __DIR__ . "/../src/config.php";



/**
 * Make clickable links from URLs in text.
 *
 * @param string $text the text that should be formatted.
 *
 * @return string the formatted text.
 */
function makeClickable($text)
{
    return preg_replace_callback(
        '#\b(?<![href|src]=[\'"])https?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
        function ($matches) {
            return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";
        },
        $text
    );
}

$text = file_get_contents(__DIR__ . "/../text/clickable.txt");
$html = makeClickable($text);


?><!doctype html>
<html>
<meta charset="utf-8">
<style>body {width: 700px;}</style>
<title>Show off Clickable</title>

<h1>Showing off Clickable</h1>

<h2>Source in clickable.txt</h2>
<pre><?= wordwrap(htmlentities($text)) ?></pre>

<h2>Source formatted as HTML</h2>
<?= $text ?>

<h2>Filter Clickable applied, source</h2>
<pre><?= wordwrap(htmlentities($html)) ?></pre>

<h2>Filter Clickable applied, HTML</h2>
<?= $html ?>
