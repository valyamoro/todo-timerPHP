<?php
$idPost = $_GET['id_post'];
$post = getPostById($idPost);

if ($post['user_id'] !== $_SESSION['user']['id']) {
    header('Location: /');
}
$metaTitle = 'Изменить пост';

$editedPost = $_POST;

if ($_POST['edit_post']) {
    $dataImage = $_FILES;

    $filePath = uploadImage($dataImage);
    $editedPost['image'] = $filePath;
    dump($editedPost);

    editPost($editedPost, $idPost);
}




$content = render($currentAction['view']);

