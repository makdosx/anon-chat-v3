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
-   $username = trim($username);
   $password = trim($password);
   $username = stripslashes($username);
  $password = stripslashes($password);
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password); 



 $sql1="SELECT * FROM login WHERE username='$username'";

 $result1=$conn->query($sql1);
 

  if (($result1->num_rows)>0)
     {
    echo '<script type="text/javascript">alert("This name exists. Please choose an another name");
         </script>';
     echo ("<script>location.href='index.php'</script>");
       }





   else
    {

      $rand_qr = 5;
      $qrcode  = substr(str_shuffle("0123456789"),0, $rand_qr);
             
      session_start();
      $_SESSION['qrcode'] = $qrcode;


   $sql3 = "INSERT INTO login (username,password, is_inside, verification_code, verified) 
            VALUES ('$username','$password','no','$qrcode','no')";
   $result3=$conn->query($sql3);



if (($result3) === TRUE) 
      {

     $sql4="INSERT INTO backup_login (username,password,is_inside) VALUES ('$username','$password','no')";
     $result4=$conn->query($sql4);


         $ip_addr = $_SERVER['REMOTE_ADDR'];
         $path = $_SERVER['REQUEST_URI'];

      $sql5="insert log_file (username,ip_addr,path,connect) values('$username','$ip_addr','$path',NOW())";
      $result5=$conn->query($sql5);  
  
  

      //set users online for desktop

       $sql6 ="INSERT INTO users_online (username, instant, is_inside)
                VALUES ('$username', NOW(), 'no')";
       $result6=$conn->query($sql6); 
     


    //set default avatar for messenger
     
     $main_dir =  dirname(__FILE__);

     $file = "$main_dir/photos/anon.png";
     $newfile = "$main_dir/avatars/$username.png";

     copy($file, $newfile);

     chmod("$main_dir/avatars/$username.png",0777);
     

    echo '<script type="text/javascript">alert("Please Verify your account");
         </script>';
     echo ("<script>location.href='verify.php'</script>");
      }


    else 
     {
      echo '<script type="text/javascript">alert("Something was error. please try again");
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
