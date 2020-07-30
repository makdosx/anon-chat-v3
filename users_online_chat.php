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

?>


<html>
<head>
 
<title> Mak cloud </title>
 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" /> 


 <link rel="stylesheet" type="text/css" href="css/users_online.css">
                     
  <!--                                                   
 <meta http-equiv="refresh" content="">
   -->


<style>

div
{
border-collapse:separate; 
border-spacing:7px;; 
}

table
{
background-color:;
opacity:1;
border-collapse:separate; 
border-spacing:7px;; 
}




td
{
width:2em;
color:yellow;
text-align:center;
}



td:hover 
{
color:white;
}


a
{
text-decoration: none;
color:black;
}




#hide_users
{
height:2em;
width:10em;
background-color:#313a4f;
color:white;
}

.btn-link {
    border: none;
    outline: none;
    background: none;
    cursor: pointer;
    color: #0000EE;
    padding: 0;
    text-decoration: underline;
    font-family: inherit;
    font-size: inherit;
}



#avatar
{
height: 2em;
width: 2em;
border-radius: 50%;
}




</style>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">



<script type="text/javascript">

 setInterval(function()
    {
    $("#reload").load(location.href + " #reload1");
    },5000);

</script>



<style>

.butt 
{
background:none!important;
border:none; 
padding:0!important;
    
font-family:arial,sans-serif; /*input has OS specific font-family*/
text-decoration:none;
cursor:pointer;
}


.butt:hover 
{
background:none!important;
border:none; 
padding:0!important;
    
font-family:arial,sans-serif; /*input has OS specific font-family*/
text-decoration:underline;
cursor:pointer;
}




</style>


</head>



<body style="background:transparent" oncontextmenu="return false;">
 

</body>
</html>




<?php


 require('class_connect.php');

 $obj = new in;
 
 $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

   $conn = new mysqli($host,$user,$pass,$db);


     if ($conn->connect_error)
         {
         die ("Error connect" .$conn->connect_error);
         }
 

 else
  {
      
  
    $sql="select username, is_inside from users_online where username != 'default' and username!='".$_SESSION['login']."' order by username asc";
    $result=$conn->query($sql);


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  


     echo '<font color="black" size="4"> <i> Chat users </i> </font>';
     echo '<hr>';


     echo "<div id='reload'>
           <div id='reload1'>";


     while ($row=$result->fetch_assoc())
      {
          
       $username = $row['username'];
       
       $is_inside = $row['is_inside'];    
      
      $avatar_user = $username."."."png"; 
      $avatar = "<img id='avatar' src='/avatars/$avatar_user'>";
    
      
    if($is_inside == 'yes')
      {
          
   echo "<table>
         <tr>

       <td> 
         $avatar
        </td>

        <td>  
        <font size='3' color='black'> 
         <form action='' method='post'> <br>
          <input type='submit' name='user_online' class='butt' value='$username'> 
         </form>
        </font>
         </td>
           
        <td>
       <img src=/photos/online.png height=10 width=12>
        </td>

         </tr>
         
         <tr> <td> &nbsp; </td> </tr>
         
     </table>";

    } // end of if yes
//exit;

 




 if($is_inside == 'no')
      {
          
    echo "<table>
         <tr>

        <td> 
         $avatar
        </td>

       <td>  
        <font size='3' color='black'> 
         <form action='' method='post'> <br>
          <input type='submit' name='user_offline' class='butt' value='$username'> 
         </form>
        </font>
         </td>
           
        <td>
       <img src=/photos/ofline.png height=10 width=12>
        </td>

         </tr>
         
         <tr> <td> &nbsp; </td> </tr>
         
        </table>";



     } // enf of if no

 
} // end of while


  echo "</div> </div>";

/*
echo " <a href='#' onclick='this.parentNode.parentNode.removeChild(this.parentNode)'>
      <img src=/photos/hide.png height=70 width=110 title='Hide online user'> 
     </a>";
*/





// second place send request users online

  if(isset($_POST['user_online']))   
    {
  

    $user_request  = $_POST['user_online'];

    $user_request = htmlspecialchars($user_request);
    $user_request = trim($user_request);
    $user_request = stripslashes($user_request);
    $user_request = $conn->real_escape_string($user_request); 



        $sql1 = "select username from login"; 
        $result1 = $conn->query($sql1);


        while ($row1 = $result1->fetch_assoc())       
           {


               
     if ($user_request == $_SESSION['login'])
     {
    echo '<script type="text/javascript">alert("Cannot sent request to yourself!");
         </script>';
     echo ("<script>location.href='chat.php'</script>");
       }




 
     else if ($row1['username'] == $user_request)
       {

        $sql2 = "select request_both from chat"; 
        $result2 = $conn->query($sql2);

      
           $request_both_0 = $_SESSION['login'] ."_" .$user_request; 
           $request_both_1 = $user_request ."_" .$_SESSION['login'];


    $fingerprint = substr(str_shuffle(str_repeat("0123456789ABCDEF", 32)), 0, 32);

    $id2 = substr(str_shuffle(str_repeat("0123456789", 4)), 0, 4);

    $ip_from = $_SERVER['REMOTE_ADDR'];

    $request_both = $_SESSION['login'] ."_" .$user_request; 


     $default_message = "* anon-chat-v2 is a program that allows anonymous
conversations . Use anon-chat-v2 from here:
http://chat.openloadlinks.com *";
  

 $sql3 ="INSERT INTO chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint) 
       VALUES('$id2','{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_0','1','$fingerprint');";


$sql3.="INSERT INTO chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint,avatar) 
         SELECT '$id2', '{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_1','0','$fingerprint', photo_data 
         FROM avatar WHERE username = '{$_SESSION['login']}' ;";


$sql3.="INSERT INTO backup_chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint,avatar) 
         SELECT '$id2', '{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_1','0','$fingerprint', photo_data 
         FROM avatar WHERE username = '{$_SESSION['login']}' ;";

$sql3 .="INSERT INTO backup_chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint) 
          VALUES('$id2','{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_1','0','$fingerprint')";

    $result3=$conn->multi_query($sql3);

 

   

       if ($result3)
              {    

             $_SESSION['fingerprint'] = $fingerprint;
              

 
            $ip_from = $_SERVER['REMOTE_ADDR'];



         // echo "<script type='text/javascript'>alert('Success! Request sent to user $user_request');
             // </script>";
              // echo ("<script>location.href='users_online_chat.php'</script>"); 

            // $_SESSION['both'] = $request_both_0;

 //echo "<script>window.open('chat2.php?both=$request_both_0','_blank')</script>";

         echo "<script>window.open('chat2.php?both=$request_both_0','_blank')</script>";

                }
                     


                  else
                    {  
               echo '<script type="text/javascript">alert("Error! Can not be sent request");
              </script>';
               echo ("<script>location.href='users_online_chat.php'</script>"); 
                          }  
                       
         


                  }// end of else if check username exists
 



                } // end of while 

              


        }  // end of isset submit_request users online
        
        
        
        
        
        
        
        
        
  // second place send request users offline

  if(isset($_POST['user_offline']))   
    {
  

    $user_request  = $_POST['user_offline'];

    $user_request = htmlspecialchars($user_request);
    $user_request = trim($user_request);
    $user_request = stripslashes($user_request);
    $user_request = $conn->real_escape_string($user_request); 



        $sql1 = "select username from login"; 
        $result1 = $conn->query($sql1);


        while ($row1 = $result1->fetch_assoc())       
           {


               
     if ($user_request == $_SESSION['login'])
     {
    echo '<script type="text/javascript">alert("Cannot sent request to yourself!");
         </script>';
     echo ("<script>location.href='chat.php'</script>");
       }




 
     else if ($row1['username'] == $user_request)
       {

        $sql2 = "select request_both from chat"; 
        $result2 = $conn->query($sql2);

      
           $request_both_0 = $_SESSION['login'] ."_" .$user_request; 
           $request_both_1 = $user_request ."_" .$_SESSION['login'];


    $fingerprint = substr(str_shuffle(str_repeat("0123456789ABCDEF", 32)), 0, 32);

    $id2 = substr(str_shuffle(str_repeat("0123456789", 4)), 0, 4);

    $ip_from = $_SERVER['REMOTE_ADDR'];

    $request_both = $_SESSION['login'] ."_" .$user_request; 


     $default_message = "* anon-chat-v2 is a program that allows anonymous
conversations . Use anon-chat-v2 from here:
http://chat.openloadlinks.com *";
  

 $sql3 ="INSERT INTO chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint) 
       VALUES('$id2','{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_0','1','$fingerprint');";


$sql3.="INSERT INTO chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint,avatar) 
         SELECT '$id2', '{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_1','0','$fingerprint', photo_data 
         FROM avatar WHERE username = '{$_SESSION['login']}' ;";


$sql3.="INSERT INTO backup_chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint,avatar) 
         SELECT '$id2', '{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_1','0','$fingerprint', photo_data 
         FROM avatar WHERE username = '{$_SESSION['login']}' ;";

$sql3 .="INSERT INTO backup_chat (id2,_from,ip_from,_to,message,created,request,request_both,request_time,fingerprint) 
          VALUES('$id2','{$_SESSION['login']}','$ip_from','$user_request','request_conversation',NOW(),'$user_request','$request_both_1','0','$fingerprint')";

    $result3=$conn->multi_query($sql3);

 

   

       if ($result3)
              {    

             $_SESSION['fingerprint'] = $fingerprint;
              

 
            $ip_from = $_SERVER['REMOTE_ADDR'];



         // echo "<script type='text/javascript'>alert('Success! Request sent to user $user_request');
             // </script>";
              // echo ("<script>location.href='chat2.php?fingerprint=$fingerprint'</script>"); 

                     //  $_SESSION['both'] = $request_both_0;

        // echo "<script>window.open('chat2.php?both=$request_both_0','_blank')</script>";

         echo "<script>window.open('chat2.php?both=$request_both_0','_blank')</script>";

                }
                     


                  else
                    {  
               echo '<script type="text/javascript">alert("Error! Can not be sent request");
              </script>';
               echo ("<script>location.href='users_online_chat.php'</script>"); 
                          }  
                       
         


                  }// end of else if check username exists
 



                } // end of while 

              


        }  // end of isset submit_request users offline    
        






    $conn->close();



}// kleisimo ths else gia ta dedomena


?>




