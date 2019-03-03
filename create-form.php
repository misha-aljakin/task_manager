<?php
session_start();
include 'auth.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Create Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>

    <div class="container">
        <div class="col-md-6 offset-md-3">
    <form action="/store.php" method="post" enctype="multipart/form-data">
        <div class="text-center">
            <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
        </div>
        <div class="form-group">
            <input type="text" name="title" class="form-control" id="inputName" placeholder="Название">
            </div>
        <div class="form-group">
            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание"></textarea>
        </div>
        <div class="form-group form-check">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="access" id="exampleRadios1" value="1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Публичный
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="access" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                    Черновик
                </label>
            </div>
        </div>
        <input type="hidden" name="user_id" value="<?=$_SESSION['user_id'];?>">
        <div class="form-group">
            <input name="img" type="file">
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Отправить</button>
    </form>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
        </div>
    </div>
  
  </body>
</html>
