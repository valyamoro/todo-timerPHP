<?php

function validateUserData(array $data): array
{
    $msg = [];

    if (empty($data['email'])) {
        $msg[] = 'Заполните поле почты' . PHP_EOL;
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $msg[] = 'Некорректная почта!' . PHP_EOL;
    }

    if (empty($data['password'])) {
        $msg[] = 'Заполните поле пароль' . PHP_EOL;
    } elseif (\is_numeric($data['password'])) {
        $msg[] = 'Пароль не должен содержать только цифры' . PHP_EOL;
    } elseif (!\preg_match('/[A-Z]/', $data['password'])) {
        $msg[] = 'Пароль должен содержать минимум одну заглавную букву' . PHP_EOL;
    } elseif (\mb_strlen($data['password'], 'utf8') <= 5) {
        $msg[] = 'Пароль содержит меньше 5 символов' . PHP_EOL;
    } elseif (\mb_strlen($data['password'], 'utf8') > 15) {
        $msg[] = 'Пароль больше 15 символов' . PHP_EOL;
    }

    return $msg;
}

function quoteData(array $data): array
{
    $quoteData = [];

    foreach ($data as $key => $value) {
        $quoteData[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

    return $quoteData;
}

function getUser(string $email)
{
    $query = 'SELECT * FROM user WHERE email=? LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$email]);

    return $sth->fetch();
}
