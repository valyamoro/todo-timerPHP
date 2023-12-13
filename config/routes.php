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
    '#^add_post?#' => [
        'controller' => 'addPost',
        'model' => 'addPost',
        'view' => '',
    ],
    '#^blog/add_post?#' => [
        'controller' => 'addPost',
        'model' => 'addPost',
        'view' => 'blog/add_post',
    ],
    '#^edit_post?#' => [
        'controller' => 'editPost',
        'model' => 'editPost',
        'view' => '',
    ],
    '#^blog/edit_post?#' => [
        'controller' => 'editPost',
        'model' => 'editPost',
        'view' => 'blog/edit_post',
    ],
    '#^show_post?#' => [
        'controller' => 'showPost',
        'model' => 'showPost',
        'view' => '',
    ],
    '#^blog/show_post?#' => [
        'controller' => 'showPost',
        'model' => 'showPost',
        'view' => 'blog/show_post',
    ],
    '#^category_post?#' => [
        'controller' => 'categoryPost',
        'model' => 'categoryPost',
        'view' => '',
    ],
    '#^blog/category_post?#' => [
        'controller' => 'categoryPost',
        'model' => 'categoryPost',
        'view' => 'blog/category_post',
    ],
    '#^remove_post?#' => [
        'controller' => 'removePost',
        'model' => 'removePost',
        'view' => '',
    ],
    '#^#' => [
        'controller' => 'index',
        'model' => 'index',
        'view' => '/index',
    ],
];
