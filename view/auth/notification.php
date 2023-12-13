<?php

echo 'Вы зарегистрировались!';
echo "Ваша почта {$_SESSION['email']}<br>";
echo "Ваш пароль {$_SESSION['password']}<br>";
echo '<a href="/auth/profile">Ваш личный кабинет</a>';
