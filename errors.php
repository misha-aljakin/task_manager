<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Errors</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="container text-center mt-5">
      <?php foreach ($errors as $error):?>
        <p><?=$error;?></p>
        <?php endforeach;?>
      <a href="/register-form.php">Назад</a>
    </div>
  </body>
</html>
<?php
    exit;
?>