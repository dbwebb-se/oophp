<?php

namespace Mos\Content;

class Content
{
    public function injectApp($app)
    {
        $this->app = $app;
    }

    public function index()
    {
        $title = "Content database | oophp";

        $this->app->db->connect();
        $sql = "SELECT * FROM content;";
        $res = $this->app->db->executeFetchAll($sql);

        $this->app->page->add("content/index", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    public function edit($id)
    {
        $title = "Edit content | oophp";

        $this->app->db->connect();
        $sql = "SELECT * FROM content WHERE id=?;";
        $res = $this->app->db->executeFetch($sql, [$id]);

        $this->app->page->add("content/edit-form", [
            "res" => $res,
        ]);

        return $this->app->page->render([
            "title" => $title,
        ]);
    }

    public function save()
    {
        $title = "Save content | oophp";

        $id = $this->app->request->getPost("id");
        $title = $this->app->request->getPost("title");
        $data = $this->app->request->getPost("data");

        $params = [$title, $data, $id];

        $this->app->db->connect();
        $sql = "UPDATE content SET title=?, data=? WHERE id=?;";
        $this->app->db->execute($sql, $params);

        return $this->app->response->redirect("content/edit/$id");
    }
}
