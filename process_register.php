

<?php
// Подключаем файл с настройками и подключением к базе данных
include("config/dataBase.php");

// Переменная для хранения сообщения (если потребуется)
$message = "";

// Проверяем, была ли отправлена форма методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Получаем и обрезаем пробелы у введённых данных
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email    = trim($_POST['email']);

    // Проверяем, что ни одно из полей не пустое
    if (empty($username) || empty($password) || empty($email)) {
        echo "fill in all fields"; // Сообщение, если что-то не заполнено
    } else {
        // Защищаем данные от SQL-инъекций
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $email    = mysqli_real_escape_string($conn, $email);

        // Проверяем, есть ли уже пользователь с таким именем в базе
        $checkQuery = "SELECT * FROM users WHERE user = '$username'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // Если пользователь уже есть — выводим сообщение
            $message = "User is already registered";
            echo $message;
        } else {
            // Если такого пользователя нет — хэшируем пароль
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Создаём SQL-запрос для вставки нового пользователя в таблицу
            $sql = "INSERT INTO users (user, password, email) VALUES('$username', '$hashed_password', '$email')";

            // Выполняем запрос к базе данных
            mysqli_query($conn, $sql);

            // Перенаправляем пользователя на страницу входа (но тут есть опечатка!)
            header("Location: login.php");
            exit(); // ❗ Ошибка в слове "Location" — надо исправить
        }
    }
}
?>