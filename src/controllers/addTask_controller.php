<?php

$metaTitle = 'Добавить пост';

$dataPost = $_POST;

//$msg = validatePost($dataPost);

if (!empty($dataPost['add_post'])) {
    if (!empty($msg)) {
        $msg = implode(' ', $msg);
        $_SESSION['msg'] = $msg;
    } else {
        $dataPost['user_id'] = $_SESSION['user']['id'];
        $now = \date('Y-m-d H:i:s');
        $dataPost['created_at'] = $now;
        $dataPost['updated_at'] = $now;
        addPost($dataPost);
    }
}

$content = render($currentAction['view']);
