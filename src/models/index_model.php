<?php

function getAllPosts($start, $limit)
{
    $query = 'SELECT ' .
        '  * ' .
        'FROM ' .
        '  `task` ' .
        'LIMIT ' .
        $start . ', ' . $limit;

    $sth = connectionDB()->prepare($query);
    $sth->execute();

    return (array) $sth->fetchAll();
}

function getCountPosts()
{
    $query = 'SELECT         ' .
        '  COUNT(*) AS `count` ' .
        'FROM           ' .
        '  `task` ';

    $sth = connectionDB()->query($query);
    $allItems = $sth->fetch(PDO::FETCH_OBJ)->count;
    return $allItems;
}

function getUserById($userId)
{
    $query = 'SELECT username FROM users WHERE id=? LIMIT 1';

    $sth = connectionDB()->prepare($query);
    $sth->execute([$userId]);

    return (array) $sth->fetch();
}