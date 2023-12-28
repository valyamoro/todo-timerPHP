<?php
// если не указан приоритет, то будет как у айди.
$metaTitle = 'hello';

$input = json_decode(file_get_contents("php://input"), true);


if ($input['id']) {
    changeHas($input['id']);
}

$numberFromJS = $input['number'];

$task = \getCurrentTask($numberFromJS);

if (isset($numberFromJS)) {
    echo '@@' . $task['name'] . '|' . $task['time'] . '|' . $task['has'] . '@@';
} else {
    echo "Переменная 'number' не найдена в данных JS.";
}

$content = render($currentAction['view'], [
    'task' => $task,
]);




