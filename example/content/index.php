<?php
// Get essentials
require "src/autoload.php";
require "src/config.php";
require "src/function.php";

// Get incoming
$route = getGet("route", "");

// General variabels (available to the views)
$titleExtended = " | My Content Database";
$view = [];
$db = new Database();
$db->connect($databaseConfig);
$sql = null;
$resultset = null;

// Simple router
switch ($route) {
    case "":
        $title = "Show all content";
        $view[] = "view/show-all.php";
        $sql = "SELECT * FROM content;";
        $resultset = $db->executeFetchAll($sql);
        break;

    case "reset":
        $title = "Resetting the database";
        $view[] = "view/reset.php";
        break;

    case "admin":
        $title = "Admin content";
        $view[] = "view/admin.php";
        $sql = "SELECT * FROM content;";
        $resultset = $db->executeFetchAll($sql);
        break;

    case "edit":
        $title = "Edit content";
        $view[] = "view/edit.php";
        $contentId = getPost("contentId") ?: getGet("id");
        if (!is_numeric($contentId)) {
            die("Not valid for content id.");
        }

        if (hasKeyPost("doDelete")) {
            header("Location: ?route=delete&id=$contentId");
            exit;
        } elseif (hasKeyPost("doSave")) {
            $params = getPost([
                "contentTitle",
                "contentPath",
                "contentSlug",
                "contentData",
                "contentType",
                "contentFilter",
                "contentPublish",
                "contentId"
            ]);

            if (!$params["contentSlug"]) {
                $params["contentSlug"] = slugify($params["contentTitle"]);
            }

            if (!$params["contentPath"]) {
                $params["contentPath"] = null;
            }

            $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
            $db->execute($sql, array_values($params));
            header("Location: ?route=edit&id=$contentId");
            exit;
        }

        $sql = "SELECT * FROM content WHERE id = ?;";
        $content = $db->executeFetch($sql, [$contentId]);
        break;

    case "create":
        $title = "Create content";
        $view[] = "view/create.php";

        if (hasKeyPost("doCreate")) {
            $title = getPost("contentTitle");

            $sql = "INSERT INTO content (title) VALUES (?);";
            $db->execute($sql, [$title]);
            $id = $db->lastInsertId();
            header("Location: ?route=edit&id=$id");
            exit;
        }
        break;

    case "delete":
        $title = "Delete content";
        $view[] = "view/delete.php";
        $contentId = getPost("contentId") ?: getGet("id");
        if (!is_numeric($contentId)) {
            die("Not valid for content id.");
        }

        if (hasKeyPost("doDelete")) {
            $contentId = getPost("contentId");
            $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
            $db->execute($sql, [$contentId]);
            header("Location: ?route=admin");
            exit;
        }

        $sql = "SELECT id, title FROM content WHERE id = ?;";
        $content = $db->executeFetch($sql, [$contentId]);
        break;

    case "pages":
        $title = "View pages";
        $view[] = "view/pages.php";

        $sql = <<<EOD
SELECT
    *,
    CASE 
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE type=?
;
EOD;
        $resultset = $db->executeFetchAll($sql, ["page"]);
        break;

    case "blog":
        $title = "View blog";
        $view[] = "view/blog.php";

        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
        $resultset = $db->executeFetchAll($sql, ["post"]);
        break;

    default:
        if (substr($route, 0, 5) === "blog/") {
            //  Matches blog/slug, display content by slug and type post
            $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE 
    slug = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
ORDER BY published DESC
;
EOD;
            $slug = substr($route, 5);
            $content = $db->executeFetch($sql, [$slug, "post"]);
            if (!$content) {
                header("HTTP/1.0 404 Not Found");
                $title = "404";
                $view[] = "view/404.php";
                break;
            }
            $title = $content->title;
            $view[] = "view/blogpost.php";
        } else {
            // Try matching content for type page and its path
            $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    path = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;
            $content = $db->executeFetch($sql, [$route, "page"]);
            if (!$content) {
                header("HTTP/1.0 404 Not Found");
                $title = "404";
                $view[] = "view/404.php";
                break;
            }
            $title = $content->title;
            $view[] = "view/page.php";
        }
};

// Render the page
require "view/header.php";
foreach ($view as $value) {
    require $value;
}
require "view/footer.php";
