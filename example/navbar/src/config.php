<?php
ini_set('display_errors', 1);

$menu = array(
  'index'  => array('text'=>'Home',  'url'=>'index.php'),
  'reports'  => array('text'=>'Reports',  'url'=>'reports.php'),
  'about' => array('text'=>'About', 'url'=>'about.php'),
);


class CNavigation {
    public static function GenerateMenu($items, $class) {
        $html = "<nav class='$class'>\n";
        foreach($items as $key => $item) {
            $basename = str_replace(".php","",basename($_SERVER['REQUEST_URI']));
            $selected = ($basename == $key) ? 'selected' : null;
            $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
        }
        $html .= "</nav>\n";
        return $html;
    }
};
