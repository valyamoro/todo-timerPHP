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

    if (empty($data['user_name'])) {
        $msg[] = 'Заполните поле имя' . PHP_EOL;
    } elseif (\preg_match('#[^а-яa-z]#ui', $data['user_name'])) {
        $msg[] = 'Имя содержит недопустимые символы' . PHP_EOL;
    } elseif (\mb_strlen($data['user_name'], 'utf8') > 15) {
        $msg[] = 'Имя содержит больше 15 символов' . PHP_EOL;
    } elseif (\mb_strlen($data['user_name'], 'utf8') <= 3) {
        $msg[] = 'Имя содержит менее 4 символов' . PHP_EOL;
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

function checkUserEmail(string $email): bool
{
    $query = 'SELECT * FROM user WHERE email=? LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$email]);

    return (bool) $sth->fetch();
}

function addUser(array $data): int
{
    $query = 'INSERT INTO user (name, email, password, created_at, updated_at)
    VALUES(:name, :email, :password, :created_at, :updated_at)';
    $sth = connectionDB()->prepare($query);

    $sth->execute([
        ':name' => $data['user_name'],
        ':email' => $data['email'],
        ':password' => $data['password'],
        ':created_at' => date('Y-m-d H:i:s'),
        ':updated_at' => date('Y-m-d H:i:s'),
    ]);

    return (int) connectionDB()->lastInsertId();
}

function confirmPassword(string $password, string $passwordFromForm): bool
{
    return $password !== $passwordFromForm;
}