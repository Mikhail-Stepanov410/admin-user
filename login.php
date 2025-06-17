<?php
// Подключаем файл с подключением к базе данных
include("config/dataBase.php");

// Проверяем, что форма отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Получаем и очищаем данные из формы
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Проверяем, что оба поля не пустые
    if (!empty($username) && !empty($password)) {

        // Экранируем спецсимволы
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Запрос к базе: найти пользователя
        $query = "SELECT * FROM users WHERE user = '$username'";
        $result = mysqli_query($conn, $query);

        // Проверяем, найден ли пользователь
        if (mysqli_num_rows($result) === 1) {

            // Получаем данные пользователя
            $user = mysqli_fetch_assoc($result);
            $stored_hashed_password = $user['password'];

            // Проверяем пароль
            if (password_verify($password, $stored_hashed_password)) {

                // Стартуем сессию
                session_start();
                $_SESSION['username'] = $user['user'];
                $_SESSION['role'] = $user['role'];

                // Перенаправление по роли
                if ($user['role'] === 'admin') {
                    header("Location: http://localhost/phpmyadmin/index.php?route=/");
                    exit;
                } else {
                    header("Location: user_panel.php");
                    exit;
                }

            } else {
                // Неправильный пароль
                echo 'Wrong password';
            }

        } else {
            // Пользователь не найден
            echo 'User not found';
        }

    } else {
        // Одно или оба поля пустые
        echo 'Fill in all fields';
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Подключение внешнего стиля -->
  <link rel="stylesheet" href="style/style.css">
</head>
<body>

  <div class="container">
    <div class="form_r register-form">
      <form action="login.php" method="post">
        <h2>Log in</h2>

        <div class="input-group">
          <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <input type="submit" name="login" value="Log in">
      </form>
    </div>

    <a href="registr.php">&larr; Registration</a>
  </div>

</body>
</html>