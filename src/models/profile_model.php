<?php

function getUserPost(int $id): array
{
    $query = 'SELECT * FROM posts WHERE user_id=?';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$id]);

    return (array) $sth->fetchAll();
}