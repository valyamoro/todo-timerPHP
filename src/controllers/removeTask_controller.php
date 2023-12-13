<?php

$idPost = $_POST['slug'];
echo $idPost;
$postData = getPostBySlug($idPost);

$wayToImage = __DIR__ . '\..' . $postData['image'];
removeImagePost($wayToImage);
removePost($idPost);
$_SESSION['action'] = 'Пост удален!';
header('Location: /');

