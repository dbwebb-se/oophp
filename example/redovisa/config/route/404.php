<?php
/**
 * Default route to create a 404, use if no else route matched.
 */
return [
    "routes" => [
        [
            "info" => "Catch all and send 404.",
            "requestMethod" => null,
            "path" => null,
            "callable" => ["errorController", "page404"],
        ],
    ]
];
