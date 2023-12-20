<?php

function getCurrentTask($id)
{
    $query = 'SELECT * FROM task where id=?';

    $sth = connectionDB()->prepare($query);
    $sth->execute([$id]);

    return $sth->fetch();
}














