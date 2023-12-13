<?php

$metaTitle = 'Авторизация';

$userPost = $_POST;


if ($_POST['login'] == 1) {
    $msg = validateUserData($userPost);

    if (!empty($msg)) {
        $msg = implode(' ', $msg);
        $_SESSION['msg'] = $msg;
    } else {
        $userPost = quoteData($userPost);

        $userData = getUser($userPost['email']);
        !$userData ? $_SESSION['msg'] = 'Вы ввели неверные данные.' : '';
        if ($userData['password'] === $userPost['password']) {
            $_SESSION['user'] = [
                'name' => $userData['username'],
                'email' => $userData['email'],
                'id' => $userData['id'],
            ];
            header('Location: /auth/profile');
        }
    }
}

$content = render($currentAction['view']);