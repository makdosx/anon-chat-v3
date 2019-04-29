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

    
  if(isset($_GET['theme']))
    {

     $theme = $_GET['theme'];

     $creator = $_SESSION['login'];  
     
     
     $sql = "select theme, creator from forum where theme = '$theme' and creator = '$creator'";
     $result = $conn->query($sql);
       
     $count = $result -> num_rows;
     
       
   if ($count > 0 ) 
      {
     
   $sql2="DELETE FROM forum where theme = '$theme' and creator = '$creator'";
   $result2=$conn->query($sql2);
   $rows2 = $result2->num_rows;
   

      echo '<script type="text/javascript">alert("Delete theme sucessfuly");
         </script>';
          echo ("<script>location.href='forum.php'</script>");

        } // end of if true


   else 
     {
   echo '<script type="text/javascript">alert("You can not delete this theme because you are not the creator");
         </script>';
        echo ("<script>location.href='forum.php'</script>");
      }





   
   
      } // end if theme



     }// end of else connect




   } // end of else session

  
?>



