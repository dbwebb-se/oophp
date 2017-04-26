<?php
/**
 * Try out escaper class from Zend.
 */
function escapeHtml($data)
{
    return htmlspecialchars($data);
}

function escapeHtmlAll($data)
{
    return htmlentities($data, ENT_HTML5 | ENT_QUOTES);
}

function escapeUrl($part)
{
    return rawurlencode($part);
}

require "vendor/autoload.php";

use Zend\Escaper\Escaper;

$escaper = new Escaper('utf-8');

$str = "Hello<script>alert('hej')</script>";

echo "Original string:     : " . $str . "\n\n";
echo "escapeHtml     (zend): " . $escaper->escapeHtml($str) . "\n";
echo "escapeHtmlAttr (zend): " . $escaper->escapeHtmlAttr($str) . "\n";
echo "escapeAllHtml   (php): " . escapeHtmlAll($str) . "\n";
echo "escapeHtml      (php): " . escapeHtml($str) . "\n";
echo "escapeUrl      (zend): " . $escaper->escapeUrl($str) . "\n";
echo "escapeUrl       (php): " . escapeUrl($str) . "\n";

$str = "sales and marketing/Miami";

echo "\n";
echo "Original string:     : " . $str . "\n\n";
echo "escapeHtml     (zend): " . $escaper->escapeHtml($str) . "\n";
echo "escapeHtmlAttr (zend): " . $escaper->escapeHtmlAttr($str) . "\n";
echo "escapeAllHtml   (php): " . escapeHtmlAll($str) . "\n";
echo "escapeHtml      (php): " . escapeHtml($str) . "\n";
echo "escapeUrl      (zend): " . $escaper->escapeUrl($str) . "\n";
echo "escapeUrl       (php): " . escapeUrl($str) . "\n";
