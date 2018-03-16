<?php

namespace Anax\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A default page rendering class.
 */
class Page implements /* PageRenderInterface, */ InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Render a standard web page using a specific layout.
     *
     * @param array   $data   variables to expose to layout view.
     * @param integer $status code to use when delivering the result.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.ExitExpression)
     */
    public function render($data, $status = 200)
    {
        // Get the view container, holding all views
        $view = $this->di->get("view");

        // Add static assets
        $data["favicon"] = "favicon.ico";
        $data["stylesheets"] = ["css/style.css"];
        $data["javascripts"] = ["js/main.js"];

        // Add views for common header, navbar and footer
        $view->add("header/oophp/default", $data, "header");
        $view->add("navbar/oophp/default", $data, "navbar");
        $view->add("footer/oophp/default", $data, "footer");

        // Add view for the overall layout, use region "layout"
        $view->add("layout/oophp/default", $data, "layout");

        // Render all views, using the region "layout",
        // add to response and send.
        $body = $view->renderBuffered("layout");
        $this->di->get("response")->setBody($body)->send($status);
        exit;
    }
}
