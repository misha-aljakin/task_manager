<?php
session_start();
include 'config.php';
include 'auth.php';

$task_id = $_GET['id'];

if(empty($_GET['id']) || !is_numeric($_GET['id'])){
    header("Location: list.php");
}
$statement = $pdo->prepare("DELETE FROM tasks WHERE id = :task_id");
$statement->execute(['task_id' => $task_id]);

header('Location: list.php');