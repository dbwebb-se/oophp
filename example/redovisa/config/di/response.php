<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "response" => [
            "shared" => true,
            "callback" => "\Anax\Response\ResponseUtility",
        ],
    ],
];
