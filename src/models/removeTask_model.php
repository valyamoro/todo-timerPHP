<?php

function removePost(string $idPost): bool
{
    $query = 'DELETE FROM posts WHERE slug=? LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $result = $sth->execute([$idPost]);

    return (bool) $result;
}

function getPostBySlug($slugPost)
{
    $query = 'SELECT * FROM posts WHERE slug=? LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$slugPost]);

    return (array) $sth->fetch();
}

function removeImagePost(string $wayToImage): void
{
    unlink($wayToImage);
}

