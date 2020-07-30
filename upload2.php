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

session_start();

 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }



  require ('class_connect.php'); 

    $obj = new in();


 $host = $obj->connect[0];
 $user = $obj->connect[1];
 $pass = $obj->connect[2];
 $db   = $obj->connect[3];

  
 $conn = new mysqli ($host,$user,$pass,$db);


 if ($conn->connect_error) 
    {
    die("Connect error " .$conn->connect_error);
     } 
 


   else
     {


 $multimedia_name = "audio";
 $multimedia_type = "audio/mp3";
 $multimedia_size = "100";
 $multimedia_data = $conn->real_escape_string(file_get_contents($_FILES ['multimedia']['tmp_name']));


//$scheme = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];

 // $both = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);

 $finger = $_SESSION['fingerprint'];
 $both = $_SESSION['both'];


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

  $session_login = $_SESSION['login'];

  $sql8="update chat set id2 = '$id4',  _from = '$session_login', ip_from = '$ip_from3', _to = 'chat',
                         multimedia_name = '$multimedia_name', multimedia_type = '$multimedia_type',
                         multimedia_size = '$multimedia_size',
                         created = NOW(), request = 'request$i3', request_both = '$both',
                         request_time = 'request$i3', fingerprint = '$finger'
        where id2='0'";
                          
                
  $result8=$conn->query($sql8);

 echo ("<script>location.href='chat2.php?both=$both'</script>"); 


}

}



?>
