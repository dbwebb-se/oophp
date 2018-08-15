<?php
/**
 * Internal routes for error handling.
 */
 return [
     "routes" => [
         [
             "info" => "403 Forbidden.",
             "internal" => true,
             //"requestMethod" => null,
             "path" => "403",
             "callable" => ["errorController", "page403"],
         ],
         [
             "info" => "404 Page not found.",
             "internal" => true,
             //"requestMethod" => null,
             "path" => "404",
             "callable" => ["errorController", "page404"],
         ],
         [
             "info" => "500 Internal Server Error.",
             "internal" => true,
             //"requestMethod" => null,
             "path" => "500",
             "callable" => ["errorController", "page500"],
         ],
     ]
 ];
