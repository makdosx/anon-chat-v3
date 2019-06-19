<?php

/*
session_start();

 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }
*/

if(isset($_FILES['file'])){
  $audio = file_get_contents($_FILES['file']['tmp_name']);
  
  require_once "upload_db.php";
  $sql = $dbh->prepare("INSERT INTO `chat` (`multimedia_data`) VALUES(?)");
  $sql->execute(array($audio));
  
  $sql = $dbh->query("SELECT `id` FROM `chat` ORDER BY `id` DESC LIMIT 1");
  $id = $sql->fetchColumn();

  
}
