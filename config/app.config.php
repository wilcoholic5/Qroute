<?php
$config = [
    "publicRoot" => __DIR__ . "/views",
    "routes" => [
        "/" => [
            "controller" => Portfolio\Portfolio::class,
            "method" => "index"
        ]
    ]
];