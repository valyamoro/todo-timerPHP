<?php

function editPost(array $data, string $idPost): array
{
    $query =
        'UPDATE posts 
    SET category_id = :category_id, 
        slug = :new_slug, 
        title = :title, 
        content = :content, 
        image = :image, 
        is_active = :is_active
    WHERE id_post = :id_post LIMIT 1';

    $sth = connectionDB()->prepare($query);
    // Тут должен обновляться updated_at
    $sth->execute([
        ':category_id' => $data['category_id'],
        ':new_slug' => $data['new_slug'],
        ':title' => $data['title'],
        ':content' => $data['content'],
        ':image' => $data['image'],
        ':is_active' => $data['is_active'],
        ':id_post' => $idPost,
    ]);

    return $data;
}

function uploadImage(array $dataImage): string
{
    $filePath =  __DIR__ . '\..\..\uploads\\' . uniqid() . $dataImage['image_post']['name'];

    move_uploaded_file($dataImage['image_post']['tmp_name'], $filePath);

    return $filePath = '/uploads' . $filePath;
}

function getIdTaskById($idTask)
{
    $query = 'SELECT * FROM user_task WHERE id_task = ?';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$idPost]);

    return (array) $sth->fetch();
}