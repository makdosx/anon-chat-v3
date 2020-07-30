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
  $scheme = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];

  $both = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);

 $finger = $_SESSION['fingerprint'];



     $sql0 = "select _from,_to from chat where request_both = '$both'
                     and message='request_conversation'";
    $result0 = $conn->query($sql0);

     
        while ($row0 =  $result0->fetch_assoc())
         {
          $_from = $row0['_from'];
          $_to   = $row0['_to'];

          $request_both1 = $_from ."_" .$_to;
          $request_both2 = $_to ."_" .$_from;    

          $both_to = $_to;

          }
   

        $request_both1_1 = explode("_", $request_both1, 2);
        $request_both1_1 = $request_both1_1[0];

        $request_both2_2 = explode("_", $request_both2, 2);
        $request_both2_2 = $request_both2_2[0];

        //echo $request_both1 ."<br>" .$request_both2;


     
         // authentication for conversations
          if ($request_both1_1 == $_SESSION['login'] or $request_both2_2 == $_SESSION['login'])            
               {

 $sql7="select id2 from chat where fingerprint='$finger'";
         $result7=$conn->query($sql7);

 
     while ($row7 = $result7->fetch_assoc())
       {


      $id4 = $row7['id2'];
       

     } // end of while for id2



  $ip_from3 = $_SERVER['REMOTE_ADDR'];
  $i3 = substr(str_shuffle(str_repeat("0123456789", 10)), 0, 10);
  
  $both_from = $_SESSION['login'];
  $both = $both_from."_".$both_to;

  $sql8="INSERT INTO chat (id2,_from,ip_from,_to,multimedia_name,multimedia_type,multimedia_size,multimedia_data,created,request,request_both,request_time,fingerprint) VALUES('$id4','{$_SESSION['login']}','$ip_from3','chat','$multimedia_name','$multimedia_type','$multimedia_size','$multimedia_data',NOW(),'request$i3','$both','request$i3','$finger')";
  $result8=$conn->query($sql8);
*/



    if(isset($_FILES['file']))
    {

$dbh = new PDO("mysql:dbname=anon-chat;host=localhost;port=3306", "anon-chat", "anon-chat");

  $audio = file_get_contents($_FILES['file']['tmp_name']);

  $sql = $dbh->prepare("INSERT INTO `chat` (`multimedia_data`) VALUES(?)");
  $sql->execute(array($audio));
  
  $sql = $dbh->query("SELECT `id` FROM `chat` ORDER BY `id` DESC LIMIT 1");
  $id = $sql->fetchColumn();
  
  echo "play.php?id=$id";        



} 


?>
