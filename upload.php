<?php

/*
 * Copyright (c) 2016-2020 Barchampas Gerasimos 
 * anon-chat-v3 is a program that allows anonymous conversations.
 *
 * anon-chat-v2 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * anon-chat-v2 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */


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
