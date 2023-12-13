<?php

$metaTitle = 'Главная страница';
$items = [];

$html = null;

$allItems = 0;

$limit = 10;

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;

$posts = getAllPosts($start, $limit);
$allItems = getCountPosts();
$pageCount = ceil( $allItems / $limit);

$content = render($currentAction['view'], [
    'posts' => $posts,
    'html' => $html,
    'allItems' => $allItems,
    'limit' => $limit,
    'pageCount' => $pageCount,
]);

