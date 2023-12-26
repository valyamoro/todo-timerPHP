<?php
// ДОБАВИТЬ ВЕЗДЕ \
function validatePost(array $data): array
{
    $msg = [];
    if (empty($data['slug'])) {
        $msg[] = 'Заполните поле slug' . PHP_EOL;
    }

    if (empty($data['title'])) {
        $msg[] = 'Заполните поле title' . PHP_EOL;
    } elseif (mb_strlen($data['title']) > 255) {
        $msg[] = 'Поле title не должно превышать 255 символов';
    }

    return $msg;
}

function validatePostImage(array $data): array
{
    $msg = [];

    $maxFileSize = 1 * 1024 * 1024;
    $allowedExtensions = ['jpeg', 'png', 'gif', 'webp', 'jpg'];

    $extension = pathinfo($data['image_post']['name'], PATHINFO_EXTENSION);

    if (empty($data['image_post']['name'])) {
        $msg[] = 'Аватар обязателен.';
    } elseif (!in_array($extension, $allowedExtensions)) {
        $msg[] = 'Недопустимый тип файла.';
    } elseif ($data['image_post']['size'] > $maxFileSize) {
        $msg[] = 'Размер файла превышает допустимый.';
    }

    return $msg;
}
function addPost(array $data): int
{
    $query = 'INSERT INTO task 
    (name, description, time, created_at, updated_at, priority, has)
    VALUES(:name, :description, :time, :created_at, :updated_at, :priority, :has)';

    $sth = connectionDB()->prepare($query);

    $sth->execute([
        ':name' => $data['name'],
        ':description' => $data['description'],
        ':time' => $data['time'],
        ':created_at' => date('Y-m-d H:i:s'),
        ':updated_at' => date('Y-m-d H:i:s'),
        ':priority' => $data['priority'],
        ':has' => 0,
    ]);

    return (int) connectionDB()->lastInsertId();
}
