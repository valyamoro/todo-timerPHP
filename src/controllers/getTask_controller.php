<?php
// если не указан приоритет, то будет как у айди.
$metaTitle = 'hello';

$input = json_decode(file_get_contents("php://input"), true);


if ($input['number']) {
    changeHas($input['number']);
}

$numberFromJS = $input['number'];
//var_dump($input, 'www');

$task = \getCurrentTask($numberFromJS);

if (isset($numberFromJS)) {
    echo '@@' . $task['name'] . '|' . $task['time'] . '|' . $task['has'] . '@@';
} else {
    echo "Переменная 'number' не найдена в данных JS.";
}


$content = render($currentAction['view'], [
    'task' => $task,
]);




