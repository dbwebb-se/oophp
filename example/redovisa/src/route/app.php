<?php
/**
 * App specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing message Hello World.
 */
$app->router->get("lek/hello-world", function () use ($app) {
    echo "Hello World";
    return true;
});



/**
* Showing message Hello World, rendered within the page layout.
 */
$app->router->get("lek/hello-world-wrap", function () use ($app) {
    $data = [
        "title" => "Show hello world within page layout | oophp",
        "class" => "hello-world",
        "content" => "Hello World",
    ];

    $app->view->add("content/oophp/default", $data);

    $app->page->render($data);
});
