<?php
session_start();
session_destroy();
setcookie('user_id', '', 0);
setcookie('user_email', '', 0);
header("Location: index.php");
