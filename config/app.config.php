<?php
$config = [
    "viewDirectory" => "../views",
    "routes" => [
        "/" => [
            "controller" => Portfolio\Portfolio::class,
            "method" => "index"
        ]
    ]
];