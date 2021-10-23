<?php
include '../config/dbcon.php';
if(isset($_GET['delid'])){
    $deleteid = (int) $_GET['delid'];
    $sql = "SELECT * FROM `code_threads` WHERE `code_thread_id` = $deleteid";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);
    $id = $row['code_category_id'];

    $sql = "DELETE FROM `code_threads` WHERE `code_thread_id`= $deleteid";
    $query = mysqli_query($connect, $sql);
    header('Location: ../threads.php?categryid='.$id);
    exit();
}
if(isset($_GET['comdelid'])){
    $deletecomment_id = (int) $_GET['comdelid'];
    $sql = "SELECT * FROM `ocde_comments` WHERE `ocde_comment_id`= $deletecomment_id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($query);
    $idcom = $row['code_thread_id'];

    $sql = "DELETE FROM `code_comments` WHERE `code_comment_id`= $deletecomment_id";
    $query = mysqli_query($connect, $sql);
    header('Location: ../thread-detail.php?threadid='.$idcom);
    exit();
    
}    