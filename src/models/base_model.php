<?php

function dump(mixed $data): void
{
    echo '<pre>';
    \print_r($data);
    echo '</pre>';
}

/**
 * Подключаем вид
 *
 * @param string $view
 * @param array $data
 * @return string
 */
function render(string $view, array $data = []): string
{
    \extract($data);

    $viewPath = __DIR__ . "/../../view/{$view}.php";
    if (!\file_exists($viewPath)) {
        $code = 404;
        \http_response_code($code);
        require __DIR__ . "/../../view/errors/{$code}.php";
        die;
    }

    \ob_start();
    include $viewPath;

    return \ob_get_clean();
}

/**
 * Редирект на указанную страницу
 *
 * @param string $http
 * @return never
 */
function redirect(string $http = ''): never
{
    $redirect = $http ?? $_SERVER['HTTP_REFERER'] ?? '/';

    \header("Location: {$redirect}");
    die;
}

/**
 * Подключение к бд
 *
 * @return PDO|null
 */
function connectionDB(): ?\PDO
{
    static $dbh = null;

    if (!\is_null($dbh)) {
        return $dbh;
    }

    $dbh = new \PDO(
        'mysql:host=localhost;dbname=todo_timer.loc;charset=utf8mb4',
        'root',
        '', [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
    ],
    );

    return $dbh;
}
