<?php

namespace Anax\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A default page rendering class.
 */
class DebugController implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Render a page displaying information on items loaded in framework.
     *
     * @return void
     */
    public function info()
    {
        $this->di->get("view")->add("debug/oophp/info");
        $this->di->get("page")->render([
            "title" => "Details on loaded items",
        ]);
    }



    /**
     * Render a page displaying details on how to debug a view.
     *
     * @return void
     */
    public function view()
    {
        $this->di->get("view")->add("debug/oophp/view");
        $this->di->get("page")->render([
            "title" => "Info",
        ]);
    }
}
