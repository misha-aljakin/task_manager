<?php
session_start();
include 'config.php';
include "auth.php";
if(!empty($_GET['id'])){
    $post_id = $_GET['id'];
}
$statement = $pdo->prepare("SELECT * FROM tasks WHERE id = :post_id");
$statement->execute(['post_id' => $post_id]);
$task = $statement->fetch(2);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title><?=$task['title'];?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <img src="<?=($task['image']) ? IMAGES_PATH . $task['image'] : "assets/img/no-image.jpg" ; ?>" alt="" width="400">
      <h2><?=$task['title'];?></h2>
      <p>
        <?=$task['description'];?>
      </p>
        <a href="list.php">Назад к списку</a>
    </div>

  </body>
</html>
