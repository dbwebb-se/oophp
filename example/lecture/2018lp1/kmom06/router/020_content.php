<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



// /**
//  * Show all content.
//  */
// $app->router->get("content", function () use ($app) {
//     $title = "Content database | oophp";
// 
//     $app->db->connect();
//     $sql = "SELECT * FROM content;";
//     $res = $app->db->executeFetchAll($sql);
// 
//     $app->page->add("content/index", [
//         "res" => $res,
//     ]);
// 
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });
// 
// 
// 
// /**
//  * Edit specific content.
//  */
// $app->router->get("content/edit/{id:digit}", function (int $id) use ($app) {
//     $title = "Edit content | oophp";
// 
//     $app->db->connect();
//     $sql = "SELECT * FROM content WHERE id=?;";
//     $res = $app->db->executeFetch($sql, [$id]);
// 
//     $app->page->add("content/edit-form", [
//         "res" => $res,
//     ]);
// 
//     return $app->page->render([
//         "title" => $title,
//     ]);
// });
// 
// 
// 
// /**
//  * Save specifric content.
//  */
// $app->router->post("content/save", function () use ($app) {
//     $title = "Save content | oophp";
// 
//     $id = $app->request->getPost("id");
//     $title = $app->request->getPost("title");
//     $data = $app->request->getPost("data");
// 
//     $params = [$title, $data, $id];
// 
//     $app->db->connect();
//     $sql = "UPDATE content SET title=?, data=? WHERE id=?;";
//     $res = $app->db->execute($sql, $params);
// 
//     return $app->response->redirect("content/edit/$id");
// });
// 


// /**
//  * Show all content.
//  */
// $app->router->get("content", function () use ($app) {
//     $obj = new \Mos\Content\Content();
//     $obj->injectApp($app);
//     return $obj->index();
// 
//     // $title = "Content database | oophp";
//     // 
//     // $app->db->connect();
//     // $sql = "SELECT * FROM content;";
//     // $res = $app->db->executeFetchAll($sql);
//     // 
//     // $app->page->add("content/index", [
//     //     "res" => $res,
//     // ]);
//     // 
//     // return $app->page->render([
//     //     "title" => $title,
//     // ]);
// });
// 
// 
// 
// /**
//  * Edit specific content.
//  */
// $app->router->get("content/edit/{id:digit}", function (int $id) use ($app) {
//     $obj = new \Mos\Content\Content();
//     $obj->injectApp($app);
//     return $obj->edit($id);
// 
//     // $title = "Edit content | oophp";
//     // 
//     // $app->db->connect();
//     // $sql = "SELECT * FROM content WHERE id=?;";
//     // $res = $app->db->executeFetch($sql, [$id]);
//     // 
//     // $app->page->add("content/edit-form", [
//     //     "res" => $res,
//     // ]);
//     // 
//     // return $app->page->render([
//     //     "title" => $title,
//     // ]);
// });
// 
// 
// 
// /**
//  * Save specifric content.
//  */
// $app->router->post("content/save", function () use ($app) {
//     $obj = new \Mos\Content\Content();
//     $obj->injectApp($app);
//     return $obj->save();
// 
//     // $title = "Save content | oophp";
//     // 
//     // $id = $app->request->getPost("id");
//     // $title = $app->request->getPost("title");
//     // $data = $app->request->getPost("data");
//     // 
//     // $params = [$title, $data, $id];
//     // 
//     // $app->db->connect();
//     // $sql = "UPDATE content SET title=?, data=? WHERE id=?;";
//     // $res = $app->db->execute($sql, $params);
//     // 
//     // return $app->response->redirect("content/edit/$id");
// });



/**
 * Mount a controller on a specific mount point.
 */
$app->router->addController("content", "Mos\Content\ContentController");
