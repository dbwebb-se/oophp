<?php
/**
 * Routes to ease development and debugging.
 */
return [
    "routes" => [
        [
            "info" => "View details on loaded Anax resources.",
            "requestMethod" => "GET",
            "path" => "info",
            "callable" => ["debugController", "info"],
        ],
        [
            "info" => "Debug and information.",
            "requestMethod" => "GET",
            "path" => "view",
            "callable" => ["debugController", "view"],
        ],
    ]
];
