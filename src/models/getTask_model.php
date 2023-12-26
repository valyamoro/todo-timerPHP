<?php

function getCurrentTask($id)
{
    $query = 'SELECT * FROM task where id=?';

    $sth = connectionDB()->prepare($query);
    $sth->execute([$id]);

    return $sth->fetch();
}

function changeHas($id)
{
    $query = 'UPDATE task SET has = 1 WHERE id=?';

    $sth = connectionDB()->prepare($query);
    $sth->execute([$id]);

    return $sth->fetch();
}












