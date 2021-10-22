<?php
include '../config/dbcon.php';
$deleteid = (int) $_GET['delid'];
$sql = "SELECT * FROM `code_threads` WHERE `code_thread_id` = $deleteid";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($query);
$id = $row['code_category_id'];

$sql = "DELETE FROM `code_threads` WHERE `code_thread_id`= $deleteid";
$query = mysqli_query($connect, $sql);
header('Location: ../threads.php?categryid='.$id);
exit();