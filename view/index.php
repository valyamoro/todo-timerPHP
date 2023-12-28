<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<form>
    <button type="button" id="myButton">Нажми меня</button>
    <button type="button" id="mySecondButton">Обнулить localStorage</button>
</form>

<script>
   document.getElementById('myButton').addEventListener('click', function () {
       let script = document.createElement('script');
       script.src = 'script/script.js?' + Date.now();
       script.type = 'module';
       document.head.appendChild(script);
   });
</script>
<script>
    document.getElementById('mySecondButton').addEventListener('click', function () {
        localStorage.clear();
    });
</script>
</body>
</html>
