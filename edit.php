<?php
session_start();
include 'config.php';
include 'auth.php';

$task_id = $_POST['task_id'];

if(empty($_POST['id']) || !is_numeric($_POST['id'])){
    header("Location: list.php");
}



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

$statement = $pdo->prepare( "UPDATE tasks SET title = :title, description = :description,
                                          access = :access, image = :image WHERE id = :id");
$result = $statement->execute([
    'title' => $title,
    'description' => $description,
    'access' => $access,
    'image' => $img,
    'id' => $task_id
]);
move_uploaded_file($_FILES['img']['tmp_name'], "images/$img");


header("Location: index.php");