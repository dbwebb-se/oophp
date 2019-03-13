<?php

namespace Mos\Content;

use Anax\Commons\AppInjectableInterface;
use Anax\Commons\AppInjectableTrait;

class ContentController implements AppInjectableInterface
{
    use AppInjectableTrait;

    // public function injectApp($app)
    // {
    //     $this->app = $app;
    // }

    private $title = " | oophp";
    private $db;

    public function initialize() : void
    {
        $this->db = $this->app->db->connect();
    }

    public function indexActionGet()
    {
        $title = "Content database {$this->title}";

        // $this->app->db->connect();
        $sql = "SELECT * FROM content;";
        $res = $this->app->db->executeFetchAll($sql);

        $this->app->page->add("content/index", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    public function editActionGet($id)
    {
        $title = "Edit content {$this->title}";

        // $this->app->db->connect();
        $sql = "SELECT * FROM content WHERE id=?;";
        $res = $this->app->db->executeFetch($sql, [$id]);

        $this->app->page->add("content/edit-form", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    public function saveActionPost()
    {
        $title = "Save content {$this->title}";

        $id = $this->app->request->getPost("id");
        $title = $this->app->request->getPost("title");
        $data = $this->app->request->getPost("data");
        $params = [$title, $data, $id];

        // $this->app->db->connect();
        $sql = "UPDATE content SET title=?, data=? WHERE id=?;";
        $this->app->db->execute($sql, $params);

        return $this->app->response->redirect("content/edit/$id");
    }
}
