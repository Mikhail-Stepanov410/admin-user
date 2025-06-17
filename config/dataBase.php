<?php

    $db_server = "localhost" ;
    $db_user = "root";
    $db_pass = "";
    $db_name = "login_register_db";

    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

    if(!$conn){
        die("Ошибка подключения". mysqli_connect_error());
    }
  
?>


