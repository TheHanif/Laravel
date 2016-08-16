<?php
return [
    "layout" => "backend.app",
    "route-prefix" => "admin",
    "pagination" => [
        "users" => 5,
        "roles" => 5,
        "permissions" => 5,
    ],
    "middleware" => ['web', 'custom:admin', 'entrust-gui'],
    "permission" => 'create-users',
    "unauthorized-url" => '/login',
    "middleware-role" => 'admin',
    "confirmable" => true,
];
