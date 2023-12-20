<?php

return [
    '#^registry?#' => [
        'controller' => 'registry',
        'model' => 'registry',
        'view' => '',
    ],
    '#^auth/registry?#' => [
        'controller' => 'registry',
        'model' => 'registry',
        'view' => 'auth/registry',
    ],
    '#^login?#' => [
        'controller' => 'login',
        'model' => 'login',
        'view' => '',
    ],
    '#^auth/login?#' => [
        'controller' => 'login',
        'model' => 'login',
        'view' => 'auth/login',
    ],
    '#^logout?#' => [
        'controller' => 'logout',
        'model' => 'logout',
        'view' => '',
    ],
    '#^auth/logout?#' => [
        'controller' => 'logout',
        'model' => 'logout',
        'view' => 'auth/logout',
    ],
    '#^profile?#' => [
        'controller' => 'profile',
        'model' => 'profile',
        'view' => '',
    ],
    '#^auth/profile?#' => [
        'controller' => 'profile',
        'model' => 'profile',
        'view' => 'auth/profile',
    ],
    '#^auth/notification?#' => [
        'controller' => 'notification',
        'model' => 'notification',
        'view' => 'auth/notification',
    ],
    '#^add_task?#' => [
        'controller' => 'addTask',
        'model' => 'addTask',
        'view' => '',
    ],
    '#^task/add_task?#' => [
        'controller' => 'addTask',
        'model' => 'addTask',
        'view' => 'task/add_task',
    ],
    '#^edit_task?#' => [
        'controller' => 'editTask',
        'model' => 'editTask',
        'view' => '',
    ],
    '#^task/edit_task?#' => [
        'controller' => 'editTask',
        'model' => 'editTask',
        'view' => 'blog/edit_task',
    ],
    '#^show_task?#' => [
        'controller' => 'showTask',
        'model' => 'showTask',
        'view' => '',
    ],
    '#^task/show_task?#' => [
        'controller' => 'showTask',
        'model' => 'showTask',
        'view' => 'blog/show_task',
    ],
    '#^category_post?#' => [
        'controller' => 'categoryPost',
        'model' => 'categoryPost',
        'view' => '',
    ],
    '#^task/category_post?#' => [
        'controller' => 'categoryPost',
        'model' => 'categoryPost',
        'view' => 'blog/category_post',
    ],
    '#^remove_task?#' => [
        'controller' => 'removeTask',
        'model' => 'removeTask',
        'view' => '',
    ],
    '#^#' => [
        'controller' => 'getTask',
        'model' => 'getTask',
        'view' => '/index',
    ],
    '#^get_task?#' => [
        'controller' => 'getTask',
        'model' => 'getTask',
        'view' => '/admin/task',
    ],
//    '#^' => [
//        'controller' => 'task',
//        'model' => 'task',
//        'view' => 'admin/task',
//    ],
//    '#^#' => [
//        'controller' => 'index',
//        'model' => 'index',
//        'view' => '/index',
//    ],
];
