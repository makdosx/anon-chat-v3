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


if(isset($_POST['delete_submit']))
      {
          
      $theme = $_GET['theme'];
        
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
   
       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];


    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  



        $sql="DELETE FROM forum WHERE _from='".$_SESSION['login']."' and theme='$theme' and message !='request_theme'";
        $result=$conn->query($sql);



     echo ("<script>location.href='javascript:close_window();'</script>");

   // header("Location: javascript:close_window();");



 echo'<script>
    function close_window() 
      {
    close();
     }
 </script>';



   } // end of else connect
 

   $conn->close();
   

  } // end of isset submit

 

  }// end of else session



?>
