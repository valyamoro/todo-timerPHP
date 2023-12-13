<?php

$sessionUser =& $_SESSION['user'];

logout($sessionUser);
header('Location: /');