
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <link rel="stylesheet" href="style/style.css">
</head>
<body>

  <div class="container">
    <div class="form_r register-form">
      <form action="process_register.php" method="post">
        <h2>Register</h2>

        <div class="input-group">
          <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <input type="submit" name="register" value="Register">
      </form>
    </div>

    <a href="login.php">&larr; Back to login</a>
  </div>

</body>
</html>