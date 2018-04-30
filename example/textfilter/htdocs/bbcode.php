<?php

// Include essentials
require __DIR__ . "/../src/config.php";



/**
 * Helper, BBCode formatting converting to HTML.
 *
 * @param string text The text to be converted.
 *
 * @returns string the formatted text.
 */
function bbcode2html($text)
{
    $search = [
        '/\[b\](.*?)\[\/b\]/is',
        '/\[i\](.*?)\[\/i\]/is',
        '/\[u\](.*?)\[\/u\]/is',
        '/\[img\](https?.*?)\[\/img\]/is',
        '/\[url\](https?.*?)\[\/url\]/is',
        '/\[url=(https?.*?)\](.*?)\[\/url\]/is'
    ];

    $replace = [
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<u>$1</u>',
        '<img src="$1" />',
        '<a href="$1">$1</a>',
        '<a href="$1">$2</a>'
    ];

    return preg_replace($search, $replace, $text);
}

$text = file_get_contents(__DIR__ . "/../text/bbcode.txt");
$html = bbcode2html($text);


?><!doctype html>
<html>
<meta charset="utf-8">
<style>body {width: 700px;}</style>
<title>Show off BBCode</title>

<h1>Showing off BBCode</h1>

<h2>Source in bbcode.txt</h2>
<pre><?= wordwrap(htmlentities($text)) ?></pre>

<h2>Filter BBCode applied, source</h2>
<pre><?= wordwrap(htmlentities($html)) ?></pre>

<h2>Filter BBCode applied, HTML (including nl2br())</h2>
<?= nl2br($html) ?>
