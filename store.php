<?php
include 'config.php';

$errors = [];

$user_id = $_POST['user_id'];

if(empty($_POST['title'])) {
    $errors[] = 'Напишите название';
}
else{
    $title = trim(strip_tags($_POST['title']));
}


if(empty($_POST['description'])){
    $errors[] = 'Напишите описание';
}else{
    $description = trim(strip_tags($_POST['description']));
}

$access = $_POST['access'];

$img = ($_FILES['img']['name']) ? $_FILES['img']['name'] : "";

if($img) {
    $dir_name = "images/";
    if (file_exists($dir_name . $img)) {
        $img = substr($img, 0, strpos($img, '.')) . '_' . date('His') . strchr($img, '.');;

    }
}



if($errors){
    include "errors.php";
    exit;
}

$statement = $pdo->prepare("INSERT INTO tasks (user_id, title, description, access, image) VALUES (:user_id, :title, :description, :access, :image)");

$result = $statement->execute([
    'user_id' => $user_id,
    'title' => $title,
    'description' => $description,
    'access' => $access,
    'image' => $img ]);


move_uploaded_file($_FILES['img']['tmp_name'], "images/$img");


header("Location: index.php");