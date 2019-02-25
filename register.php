<?php
session_start();
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);


$errors = [];

foreach($_POST as $key => $value){
    if ($key == "name" && empty($value)) {
        $errors[] = "Заполните Имя";
    }elseif ($key == "email" && empty($value)){
        $errors[] = "Заполните емаил";
    }elseif ($key == "password" && empty($value)){
        $errors[] = "Заполните пароль";
    }
}

if (!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: errors.php");
}

$pdo = new PDO('mysql:dbname=task_manager;host=localhost', 'root', 'root');
$statement = $pdo->prepare("SELECT * FROM user WHERE email = '$email'");
$statement->execute();
$result = $statement->fetch(2);

if ($result) {
    $errors[] = "Такой пользователь уже существует";
    $_SESSION['errors'] = $errors;
    header("Location: errors.php");
}else{
    $statement = $pdo->prepare("INSERT INTO user (name,email,password) VALUES (:name, :email, :password)");
    $statement->execute(["name" => $name, "email" => "$email", "password" => md5($password)]);
    header("Location: login-form.php");
}
