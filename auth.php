<?php


if($_COOKIE['user_id'] && $_COOKIE['user_email']){
    $statement = $pdo->prepare("SELECT * FROM user WHERE id = :user_id AND email = :user_email");
    $statement->execute([
        'user_id' => $_COOKIE['user_id'],
        'user_email' => $_COOKIE['user_email']
    ]);
    if($user = $statement->fetch(2)){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
    }
}elseif ($_SESSION['user_id'] && $_SESSION['email']){

}else{
    header("Location: login-form.php");
}