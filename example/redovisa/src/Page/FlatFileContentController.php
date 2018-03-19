<?php

namespace Anax\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A default page rendering class.
 */
class FlatFileContentController implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * Render a page using flat file content.
     *
     * @return void
     */
    public function render()
    {
        // Get the current route and see if it matches a content/file
        $path = $this->di->get("request")->getRoute();
        $file1 = ANAX_INSTALL_PATH . "/content/" . $path . ".md";
        $file2 = ANAX_INSTALL_PATH . "/content/" . $path . "/index.md";

        $file = is_file($file1) ? $file1 : null;
        $file = is_file($file2) ? $file2 : $file;

        if (!$file) {
            return;
        }

        // Check that file is really in the right place
        $real = realpath($file);
        $base = realpath(ANAX_INSTALL_PATH . "/content/");
        if (strncmp($base, $real, strlen($base))) {
            return;
        }

        // Get content from markdown file
        $content = file_get_contents($file);
        $content = $this->di->get("textfilter")->parse(
            $content,
            ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"]
        );

        // Render a standard page using layout
        $this->di->get("view")->add("default1/article", [
            "content" => $content->text,
            "frontmatter" => $content->frontmatter,
        ]);
        $this->di->get("page")->render($content->frontmatter);
    }
}
