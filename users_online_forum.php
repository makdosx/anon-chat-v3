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

                                                                                                                                                                                                                                                                                                                                
                                                    
<meta http-equiv="refresh" content="">







<style>

table
{
background-color:;
opacity:0.7;
border-spacing:7px; 
}




td
{
width:2em;
height:2em;
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
  
    $sql="select username,is_inside from login";
    $result=$conn->query($sql);


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  


     echo '<font color="black" size="4"> <i> Forum users </i> </font>';
     echo '<hr>';




     while ($row=$result->fetch_assoc())
      {
 
  if($row['is_inside']=='yes')
      {


   echo "<table>
         <tr>

   <td> 
   <img src='photos/anon.png' height='40'  width='50'/>
        </td>

  <td> <font size=3 color=black> {$row['username']} </font> </td>
           
        <td>
       <img src=/photos/online.png height=10 width=12>
        </td>

         </tr>
     </table>";


//exit;

  } // end of if yes



 if($row['is_inside']=='no')
      {


    echo "<table>
         <tr>

   <td> 
   <img src='photos/anon.png' height='40'  width='50'/>
        </td>

       <td>
 <font size=3 color=black> {$row['username']} <font>    
     </td>
           
        <td>
       <img src=/photos/ofline.png height=10 width=12>
        </td>

         </tr>
        </table>";



     } // enf of if no

 
    } // end of  while



/*
echo " <a href='#' onclick='this.parentNode.parentNode.removeChild(this.parentNode)'>
      <img src=/photos/hide.png height=70 width=110 title='Hide online user'> 
     </a>";
*/



    $conn->close();



}// kleisimo ths else gia ta dedomena


?>



