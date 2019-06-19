<?php

/*
 * Copyright (c) 2016-2019 Barchampas Gerasimos <http://chat.openloadlinks.com>
 * anon-chat-v2 is a program that allows anonymous conversations.
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


else
{

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

     $scheme = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];

     $both = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);




    // prwto meros emfanish onomatos kai avatar


    $sql0 = "select _from,_to from chat where request_both = '$both'
                     and message='request_conversation'";
    $result0 = $conn->query($sql0);

     
        while ($row0 =  $result0->fetch_assoc())
         {
          $_from = $row0['_from'];
          $_to   = $row0['_to'];

          $request_both1 = $_from ."_" .$_to;
          $request_both2 = $_to ."_" .$_from;    

          }
   
        $request_both1 = explode("_", $request_both1, 2);
        $request_both1 = $request_both1[0];

        $request_both2 = explode("_", $request_both2, 2);
        $request_both2 = $request_both2[0];

        //echo $request_both1 ."<br>" .$request_both2;

   
          if ($request_both1 == $_SESSION['login'] or $request_both2 == $_SESSION['login'])            
               {

           $both = $request_both1 ."_" .$request_both2;

        /// echo "<script>location.href='chat2.php?both=$both'</script>";

                }

          else
           {
            exit;
            }
 

     } // end of else connect 



  } // end of else session login

?>
