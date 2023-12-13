<?php

$metaTitle = 'Добавить пост';

$dataPost = $_POST;
$dataImage = $_FILES;
dump($dataImage);

$msg = validatePost($dataPost);
$msg = validatePostImage($dataImage);

if ($dataPost['add_post'] == 1) {
    if (!empty($msg)) {
        $msg = implode(' ', $msg);
        $_SESSION['msg'] = $msg;
    } else {
        // Приходящее имя категории должно преобразовываться в айди этой категории.
        $dataPost['user_id'] = $_SESSION['user']['id'];
        $filePath = uploadImage($dataImage);
        $dataPost['image'] = $filePath;
        addPost($dataPost);
    }
}

$content = render($currentAction['view']);
