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


  if(!isset($_SESSION['login']))
    {
     header('Location:index.php');
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

    
  if(isset($_GET['id2']))
    {

     $id2 = intval($_GET['id2']);


     if($id2 <= 0) 
       {
        die('The ID is invalid!');
       }


    else
       {

       
   $sql="DELETE FROM chat where id2='$id2'";
   $result=$conn->query($sql);


   if ($result)
     {

      echo '<script type="text/javascript">alert("Delete request sucessfuly");
         </script>';
       header('Location: chat.php');
      }



  else
   {
   echo '<script type="text/javascript">alert("Error! Can not delete request");
         </script>';
     header('Location: chat.php');
      }


         }
  

      }



      }// end of else connect




   } // end of else session

  
?>



