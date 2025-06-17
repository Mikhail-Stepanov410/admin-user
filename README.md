# Admin & User Authentication Panel / Панель авторизации администратора и пользователя

## 📌 Описание / Description

Данный проект — это система авторизации на PHP с разделением прав доступа между **пользователем** и **администратором**. После входа в систему, в зависимости от введённых данных, пользователь будет перенаправлен на соответствующую панель:

- Если вошёл **администратор** — происходит перенаправление на `php_admin.php` (или аналогичную админ-панель).
- Если вошёл **обычный пользователь** — на `user_panel.php`.

Регистрация, авторизация и выход реализованы через стандартные PHP-скрипты. Используется подключение к базе данных MySQL, а для интерфейса — простая HTML+CSS вёрстка.

This project is a PHP-based login system with role-based access: **admin** and **user**. Depending on the login credentials, the user is redirected to the appropriate panel:

- If logged in as **admin** — redirected to `php_admin.php`.
- If logged in as **user** — redirected to `user_panel.php`.

Includes full login, registration, logout functionality, MySQL database connection, and a simple styled interface.

---

## 🔐 Особенности / Features

- Разделение ролей: админ / пользователь
- Редирект в зависимости от уровня доступа
- Регистрация нового пользователя
- Авторизация по email и паролю
- Выход из системы (logout)
- Защита от доступа без логина
- Хранение данных в MySQL
- Простая и понятная структура проекта

- Role-based redirection: admin vs user
- Registration form with DB storage
- Login with email and password
- Logout functionality
- Access protection for panels
- MySQL backend
- Clean, understandable structure

---

## 📂 Структура проекта / Project Structure

admin-user/
│
├── config/
│ └── dataBase.php # Подключение к базе данных
│
├── style/
│ ├── style.css # Основной CSS
│ └── style_user.css # CSS для пользовательской панели
│
├── login.php # Страница входа
├── logout.php # Скрипт выхода
├── process_register.php # Обработка регистрации
├── registr.php # Форма регистрации
├── user_panel.php # Панель обычного пользователя
└── README.md # Документация
