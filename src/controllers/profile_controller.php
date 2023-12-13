<?php

$metaTitle = 'Личный кабинет';

$posts = getUserPost($_SESSION['user']['id']);

$content = render($currentAction['view'], [
    'userPosts' => $posts,
]);