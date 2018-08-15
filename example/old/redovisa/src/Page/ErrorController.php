<?php

namespace Anax\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A sample class for routes dealing with error situations.
 */
class ErrorController implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Render an error page with a message and a status code.
     *
     * @param integer $status   code to use for response.
     * @param string  $title    to use for the page.
     * @param string  $message  to display in the view.
     * @param string  $template the template file to use.
     *
     * @return void
     */
    public function errorPage($status, $title, $message, $template = null)
    {
        $template = $template ?? "http_status/default";
        $this->di->get("view")->add($template, [
            "title" => $title,
            "message" => $message,
        ]);
        $this->di->get("page")->render(["title" => $title], $status);
    }



    /**
     * Render a 403 forbidden page using the default page renderer.
     *
     * @return void
     */
    public function page403()
    {
        $this->errorPage(
            403,
            "403 Forbidden",
            "You are not permitted to do this.",
            "http_status/403"
        );
    }



    /**
     * Render a 404 Page not found using the default page renderer.
     *
     * @return void
     */
    public function page404()
    {
        $this->errorPage(
            404,
            "404 Page not found",
            "The page you are looking for is not here.",
            "http_status/404"
        );
    }



    /**
     * Render a 500 Page not found using the default page renderer.
     *
     * @return void
     */
    public function page500()
    {
        $this->errorPage(
            500,
            "500 Internal Server Error",
            "An unexpected condition was encountered.",
            "http_status/500"
        );
    }
}
