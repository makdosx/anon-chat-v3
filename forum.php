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

error_reporting(0);

 session_start();

 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }


?>

<html>
<head>

 <title> anon-forum </title>

  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


 <link rel="stylesheet" type="text/css" href="css/chat.css">



 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<style>

body
{
background: url(/photos/1.jpg) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}





#table2
{
border-style:;
border-width:; 
border-color:;
border-collapse:separate; 
border-spacing:0em;
height:;
width:100%;
position: absolute;
left:0;
top:1%;
width:100%;
text-align: center;
font-size: 15px;
margin:0;
padding:0;
overflow: auto;
table-layout:fixed; /* gia an exoun ola ta kelia to idio megethos */
}






#footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
#center {
    width: 400px;
    margin: 0 auto;
}



#user_req
{
height:2.5em;
width:10em;
border-style:solid;
border-width:0.1em;
border-color:#D3514D;
}




#butt_req
{
height:2.5em;
border-style:solid;
border-width:0.1em;
border-color:grey;
}



#butt_req:hover
{
color:red;
border-style:solid;
border-width:0.1em;
border-color:grey;
}





form input[type="file"] 
{
display: none;
}




#right_frame
{
position:absolute;
right:0%;
top:22%;
background-color:transparent;
}



#view_users
{
height:2.5em;
width:8em;
background-color:#313a4f;
color:white;
}
 



#img_mes
{
position: absolute;
left: 35%;
top: 4.6%;
}




#img 
{
height:50px;
width: 80px; 
}



#img:hover 
{
height: 60px;
width: 90px; 
}




a:link 
{
text-decoration: none;
}


/*
a:hover
{
background-color:#313a4f;
}
*/




#container {
width: 100%;
height: 100%;
position: absolute;
top:10%;
left:-120%;
visibility:hidden;
display:none;
background-color:/* rgba(22,22,22,0.5); */
}

#container:target {
    visibility: visible;
    display: block;
}
.reveal-modal {
    background:white; 
    margin: 0 auto;
    height: 580px;
    width:140%; 
    position:relative; 
    z-index:41;
    top: 25%;
    padding:30px; 
    -webkit-box-shadow:0 0 10px rgba(0,0,0,0.4);
    -moz-box-shadow:0 0 10px rgba(0,0,0,0.4); 
    box-shadow:0 0 10px rgba(0,0,0,0.4);
}




.vertical-center {
  min-height: 10%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 10vh; /* These two lines are counted as one :-)       */
  display: flex;
  align-items: center;
}



#login img{
margin: 10px 0;
}
#login .center {
text-align: center;
}

#login .login {
max-width: 400px;
margin: 35px auto;
}

#login .login-form{
 padding:0px 25px;
}




.form-control::-webkit-input-placeholder {color: black; text-align:center; } /* WebKit, Blink, Edge */
.form-control:-moz-placeholder { color: black; text-align:center; }  /* Mozilla Firefox 4 to 18 */
.form-control::-moz-placeholder { color: black; text-align:center; }  /* Mozilla Firefox 19+ */
.form-control:-ms-input-placeholder { color: black; text-align:center; }  /* Internet Explorer 10-11 */
.form-control::-ms-input-placeholder { color: black; text-align:center; }  /* Microsoft Edge */





</style>




</head>



<body oncontextmenu="return false;">


   <div class="btn-group btn-group-justified">
   
    
   <div class="btn-group">
    <button type="button" onclick="location.href='logout.php';" class="btn btn-default btn-lg">
       <span class="glyphicon glyphicon-log-out"></span>
      <font size="5">  Log out </font>
    </button>
   </div>
   


   <div class="btn-group">

<div class="dropdown">
    
  <button class="btn btn-default btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
   	<span class="glyphicon glyphicon-triangle-bottom"></span>
   	    &nbsp;
     <font color="grey" size="5"> <b> Anon Chat </b> </font> 
         &nbsp;
	<span class="glyphicon glyphicon-triangle-bottom"></span>
  </button>
  
  
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  
   
    <button type="button" onclick="location.href='chat.php';" class="btn btn-default btn-lg dropdown-item"> 
     	<span class="glyphicon glyphicon-comment"></span>
     	   &nbsp;
     <font color="grey" size="5"> <b> Anonymous chat </b> </font> 
          &nbsp;
    	<span class="glyphicon glyphicon-comment"></span>
     </button>
   

 <button type="button" onclick="location.href='forum.php';" class="btn btn-default btn-lg dropdown-item"> 
     	<span class="glyphicon glyphicon-comment"></span>
     	   &nbsp;
     <font color="grey" size="5"> <b> Anonymous forum </b> </font> 
           &nbsp;
    	<span class="glyphicon glyphicon-comment"></span>
     </button>

   </div>
   </div>
  </div> 



 
   <div class="btn-group">

   <a class="btn btn-default btn-lg" href="#container" data-reveal-id="exampleModal">
         <span class="glyphicon glyphicon-align-justify"></span> 
         <font size="5">  Choose password </font>
        </a>
    
      
   <div id="container">
    <div id="exampleModal" class="reveal-modal">

    <div align="right"> <a href="#" class="close-reveal-modal">Close</a> </div>

    
<div class="jumbotron vertical-center"> 
<div id="login" class="container">
  <div class="row-fluid">
    <div class="span12">
      <div class="login well well-small">

        <div class="center">
          <img src="photos/redhat.png" alt=""> 
        </div>


        <form action="" class="login-form" id="UserLoginForm" method="post" accept-charset="utf-8">


          <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="old_password" placeholder="Old password" required>
         </div>

            <br>

            <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="new_password" placeholder="New password" minlenght="6" required>
         </div>

           <br>


            <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="password" type="password" class="form-control" name="repeat_password" placeholder="Repeat password" minlenght="6" required>
         </div>

           <br>


          <div class="control-group">
            <button class="btn btn-success btn-large btn-block" type="submit" name="submit_pass"> 
              Choose password
                <i class="glyphicon glyphicon-ok"></i>
             </button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
</div>


</div>
</div>


</div>
</div>
 

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <br>

     <div align="center">
     <font color="grey" size="4"> 
        <b> Anonymous Forum </b> <br>
       Welcome <i> <?php echo  $_SESSION["login"]; ?> ! </i>
      </font> 
      </div>

     <hr>


   





  <div id="footer">
 <div id="center">

  <form action="" method="POST">

        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input id="text" type="text" class="form-control" name="theme" 
               maxlength="16" autofocus="autofocus"  placeholder="Theme for conversation" 
               style="width: 180px;" required>
               
                    <button class="btn btn-primary btn-large btn-block" type="submit" name="submit_theme"
                    style="width: 140px;"> 
                    Add theme
                <i class="glyphicon glyphicon-plus"></i>
             </button>
               
         </div>


  </form>

  </div>
 </div>

 
 
  




</body>
</html>




<?php


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
       


    // first place view users online and themes


     echo '<div align="center">
      <iframe src="forum_theme.php" width="55%" height="300"
       style="opacity:1; box-shadow:none;" frameBorder="0"  scrolling="yes">
      </iframe>
       </div>';





 echo '<div id="right_frame">
      <iframe src="users_online_forum.php" width="200" height="400" 
        style="opacity:1; box-shadow:none;" frameBorder="0">
      </iframe>
       </div>';

   







// second place send theme

  if(isset($_POST['submit_theme']))   
    {
  

    $theme   = $_POST['theme'];

    $theme  = htmlspecialchars($theme);
    $theme  = trim($theme);
    $theme  = stripslashes($theme);
    $theme  = $conn->real_escape_string($theme); 
  


        $sql1 = "select theme from forum"; 
        $result1 = $conn->query($sql1);

           
        $creator = $_SESSION['login'];   

       $ip_from = $_SERVER['REMOTE_ADDR'];



  $sql3 ="INSERT INTO forum (creator, theme, created, _from, ip_from, _to, message) 
       VALUES('$creator', '$theme', NOW(), '$creator', '$ip_from', 'forum', 'request_theme');";


  //$sql3 .="INSERT INTO backup_forum (creator, theme, created, _from, ip_from, _to, message) 
   //    VALUES('$creator', '$theme', NOW(), '$creator', '$ip_from','forum', 'request_theme')";


    $result3=$conn->multi_query($sql3);

 

   

       if ($result3)
              {    

             $_SESSION['theme'] = $theme;
              

 
            $ip_from = $_SERVER['REMOTE_ADDR'];



         echo "<script type='text/javascript'>alert('Success! Insert theme $theme');
             </script>";
               echo ("<script>location.href='forum.php'</script>"); 
                }
                     


                  else
                    {  
               echo '<script type="text/javascript">alert("Error! Can not be sent theme");
              </script>';
               echo ("<script>location.href='forum.php'</script>"); 
                          }  
                       
        

              


        }  // end of isset submit_theme














   // third place choose password


      if(isset($_POST['submit_pass']))   
       {

     $old_password=md5($_POST['old_password']);
     $new_password=md5($_POST['new_password']);
     $repeat_password=md5($_POST['repeat_password']);


   $old_password = htmlspecialchars($old_password);
   $old_password = trim($old_password);
   $old_password = stripslashes($old_password);
   $old_password = $conn->real_escape_string($old_password);

   $new_password = htmlspecialchars($new_password);
   $new_password = trim($new_password);
   $new_password = stripslashes($new_password);
   $new_password = $conn->real_escape_string($new_password);

   $repeat_password = htmlspecialchars($repeat_password);
   $repeat_password = trim($repeat_password);
   $repeat_password = stripslashes($repeat_password);
   $repeat_password = $conn->real_escape_string($repeat_password);

  
       if (empty($_POST['old_password'] || $_POST['new_password'] || $_POST['repeat_password']))
             {
          $message = "<div align='center'> <font color='red'> This fields are required <font> </div>";
             }
   
  else
   {

 
       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql0="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result0=$conn->query($sql0);  

  
  $sql="SELECT password FROM login WHERE username='" .$_SESSION['login'] ."'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();
   

  $sql2="UPDATE login SET created=NOW() , password='$new_password' WHERE username='" .$_SESSION['login'] ."'";

 $sql4="update backup_login t1 inner join login t2 
       on t1.username=t2.username 
       set t1.created=t2.created , t1.username=t2.username, t1.password=t2.password, t1.email=t2.email";


      if ($old_password==$row['password'])
           {
         if  ($new_password==$repeat_password && $new_password!=$row['password'] && $repeat_password!=$row['password']) 
          {

          $result2=$conn->query($sql2);
          $result4=$conn->query($sql4);

          $message= "<div align='center'> <i class='glyphicon glyphicon glyphicon-saved'></i> &nbsp; <font color='black'> <b> Your password updates sucesfuly <br> </font>".
            "<a href='chat.php'  id='a'> <font color='black'> <b> I want to stay connected </b> </font> <br> </a>".
            "<a href='logout.php' id='a'> <font color='black'> <b> I want to disconnect </b> </font> <a/> </div>";
             }

     if ($new_password==$repeat_password && $new_password==$row['password'] && $repeat_password==$row['password'])
          {
         $message ="<div align='center'> <i class='glyphicon glyphicon-exclamation-sign'></i> &nbsp; <font color='red'> <b> The new password must differ from the previous </b>
</font> </div>";
          }
   
        
        
       else if ($new_password==$row['password'])
             {
          $message = "<div align='center'> <i class='glyphicon glyphicon-exclamation-sign'></i> &nbsp; <font color='red'> The new password must differ from the previous <font> </div>";
             }

        else if ($repeat_password==$row['password'])
             {
          $message = "<div align='center'> <i class='glyphicon glyphicon-exclamation-sign'></i> &nbsp; <font color='red'> <b> The new password must differ from the previous </b> </font> </div>";
             }


          else if ($new_password!=$repeat_password)
           {
       $message = "<div align='center'> <i class='glyphicon glyphicon-exclamation-sign'></i> &nbsp; <font color='red'> <b> New password and repeat password dont match </b> <font> </div>";
        }
    

       } // end of big if


       


    else
    {
     $message = "<div align='center'> <i class='glyphicon glyphicon-exclamation-sign'></i> &nbsp; <font color='red'> <b> Old password do not match </b> <font> </div>";
     }
 

    } // end else of data



     } // enf if of submit for choose password






if (isset($message)) {echo $message;} 







      } // end of else data


 
  $conn->close();


  require ('auto_logout.php'); // session expire and auto logout


 } // end of else connect



?>




