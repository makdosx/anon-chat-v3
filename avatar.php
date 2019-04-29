<?php


/*
 * Copyright (c) 2016-2017 Barchampas Gerasimos <http://anon-chat.co.nf/>
 * Anon-chat is a program that allows anonymous conversations.
 *
 * Anon-chat is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * Anon-chat is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */


session_start();

?>


<html>
<head>
 
  <title> anon-chat </title>

  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


 <link rel="stylesheet" type="text/css" href="css/chat.css">



<head>


<body id="body">

    <br><br><br><br>



</body>
</html>





<?php


if(isset($_POST["submit_image"]))
{



 require('class_connect.php');

 $obj = new in;
 
 $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

// dhmiourgia ths sundeshs
$conn = new mysqli($host, $user, $pass, $db);

 $conn->set_charset("utf8");


   if ($conn->connect_error) 
   {
   die("Connection failed: " .$conn->connect_error);
    }


       else 
         {

        $photo_name = $conn->real_escape_string($_FILES['photo']['name']);
        $photo_type = $conn->real_escape_string($_FILES['photo']['type']);
        $photo_size = $_FILES['photo']['size'];
        $photo_data = $conn->real_escape_string(file_get_contents($_FILES ['photo']['tmp_name']));


$sql="select username from profile where username='".$_SESSION['login']."'";
$result=$conn->query($sql);

 $allowed_images = array( "image/pjpeg","image/jpeg","image/jpg","image/png","image/x-png","image/gif");


   if (empty($_FILES['photo']['tmp_name']))
     {
    echo '<script type="text/javascript">alert("This field is required");
         </script>';
     echo ("<script>location.href='forum.php'</script>"); 
      }


    if($result)
         {

    
 if (!in_array($photo_type, $allowed_images)) 
     {
      echo '<script type="text/javascript">alert("This file not image");
         </script>';
     echo ("<script>location.href='forum.php'</script>"); 
        exit;
    }



   else
     {

 $ip_addr = $_SERVER['REMOTE_ADDR'];

 $sql2 = "update profile set ip_from='$ip_addr' , photo_name='$photo_name' , photo_type='$photo_type' , photo_size ='$photo_size', photo_data='$photo_data'
    where username='".$_SESSION['login']."'";
     $result2=$conn->query($sql2);


       if($result2)
         {
        
       $ip_addr2 = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

       $sql3="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr2','$path',NOW())";
       $result3=$conn->query($sql3);  

          echo '<script type="text/javascript">alert("Profile image option was set successfully");
         </script>';
     echo ("<script>location.href='chat.php'</script>");
          }

     else 
      {
       echo '<script type="text/javascript">alert("Profile image selection failed");
         </script>';
     echo ("<script>location.href='chat.php'</script>");
         }
     
        } // kleisimo ths else gia ton elenxo ths eikonas

      } // kleisimo ths meaglsh if



     } //kleisimo ths else gia ta dedomena

   $conn->close();



 }// kleisimo ths isset

?>






