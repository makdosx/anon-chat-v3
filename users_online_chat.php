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




</head>



<body style="background:transparent">
 

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
  
    $sql="select username, photo_data, is_inside from avatar where username != 'default'";
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
      
     $avatar_data = $row['photo_data'];
     $avatar = '<img id="avatar" src="data:image/jpeg;base64,'. base64_encode($avatar_data) .'"/>';  
    
      
    if($is_inside == 'yes')
      {
          
   echo "<table>
         <tr>

       <td> 
         $avatar
        </td>

        <td>  
        <font size='3' color='black'> $username </font>
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
        <font size='3' color='black'> $username </font>
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



    $conn->close();



}// kleisimo ths else gia ta dedomena


?>



