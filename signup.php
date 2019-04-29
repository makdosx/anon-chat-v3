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



 if (isset($_POST['submit']))
  {


  // require ('auto_logout.php'); // session expire and auto logout
 
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


  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];


       $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
   $email = htmlspecialchars($email);
   $username = trim($username);
   $password = trim($password);
   $email = trim($email);
   $username = stripslashes($username);
  $password = stripslashes($password);
  $email = stripslashes($email);
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password); 
  $email = $conn->real_escape_string($email);



 $sql1="SELECT * FROM login WHERE username='$username'";
 $sql2="SELECT * FROM login WHERE email='$email'";

 $result1=$conn->query($sql1);
 $result2=$conn->query($sql2);

 


  if (($result1->num_rows)>0)
     {
    echo '<script type="text/javascript">alert("This name exists. Please choose an another name");
         </script>';
     echo ("<script>location.href='index.php'</script>");
       }



    else if (($result2->num_rows)>0)
     {
    echo '<script type="text/javascript">alert("This email exists. Please isnert an another email");
         </script>';
     echo ("<script>location.href='index.php'</script>");
       }




   else
    {
$sql3 = "INSERT INTO login (username,password,email,is_inside) VALUES ('$username','$password','$email','no')";
$result3=$conn->query($sql3);



if (($result3) === TRUE) 
      {

     $sql4="INSERT INTO backup_login (username,password,email,is_inside) VALUES ('$username','$password','$email','no')";
     $result4=$conn->query($sql4);


         $ip_addr = $_SERVER['REMOTE_ADDR'];
         $path = $_SERVER['REQUEST_URI'];

      $sql5="insert log_file (username,ip_addr,path,connect) values('$username','$ip_addr','$path',NOW())";
      $result5=$conn->query($sql5);  
  
  
      //set default avatar 

 

      $sql6 ="INSERT INTO avatar (username, instant, photo_name, photo_type, photo_size, photo_data)
             SELECT  '$username', NOW(), 'favicon.png', 'image/png' ,'31897', photo_data
             FROM avatar WHERE id = 1";
     $result6=$conn->query($sql6); 
     
     
     

    echo '<script type="text/javascript">alert("Sign up sucessfuly");
         </script>';
     echo ("<script>location.href='index.php'</script>");
      }


    else 
     {
      echo '<script type="text/javascript">alert("Sign up error. please try again");
         </script>';
     echo ("<script>location.href='index.php'</script>");
     }


   } // end of else sign up
  

   }//  end of else connect
 

  $conn->close();
 

 } // end of isset submit





  else
   {
   header('Location:index.php');
    }
 


?>
