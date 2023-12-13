<?php

$metaTitle = 'Регистрация';

$continueScript = true;

$data = $_POST;

$msg = validateUserData($data);

if ($_POST['registry'] == 1) {
    if (!empty($msg)) {
        $msg = implode(' ', $msg);
        $_SESSION['msg'] = $msg;
    } else {
        $data = quoteData($data);

        $confirmPassword = confirmPassword($data['password'], $data['confirm_password']);

        if ($confirmPassword) {
            $_SESSION['msg'] = 'Пароли не совпадают';
        } else {
            $emailExist = checkUserEmail($data['email']);
            (!$emailExist) ? addUser($data) : $_SESSION['msg'] = 'Эта почта уже есть в базе данных';
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
        }
        if (!$emailExist) {
            header("Location: /");
        }
    }
}

$content = render($currentAction['view']);
