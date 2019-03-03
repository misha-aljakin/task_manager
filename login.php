<?php
include "config.php";

if(!empty($_POST['email'])){
    $email = trim($_POST['email']);
}else{
    $errors[] = "Введите email";
}

if (!empty($_POST['password'])){
    $password = md5($_POST['password']);
}else{
    $errors[] = "Введите пароль";
}

if (!empty($_POST['remember'])){
    $remember = $_POST['remember'];
}

if($errors){
    include 'errors.php';
    exit;
}


$statement = $pdo->prepare("SELECT * FROM user WHERE email = :email and password = :password");
$statement->execute(
    ['email' => $email,
     'password' => $password]
);
if($user = $statement->fetch( 2)){
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];
    if ($remember){
        setcookie("user_id", $user['id']);
        setcookie("user_email", $user['email']);
    }
    header("Location: index.php");
}else{
    $errors[] = 'Не верный логин или пароль';
    include "errors.php";
    exit;
}




