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

?>


<html>
<head>

  <meta http-equiv="refresh" content="1"> 


   <title> anon-forum </title>

  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


 <link rel="stylesheet" type="text/css" href="css/chat.css">



<style>



#table4
{
border-style:;
border-width:; 
border-color:;
border-collapse:separate; 
border-spacing:1em;
height:;
width:;
position: absolute;
left:0;
top:3%;
width:100%;
text-align: center;
font-size: 18px;
}




#td_mess
{
background-color:#4080FF;
border-style:solid;
border-width:0.3em; 
border-color:#4080FF;
border-radius: 25px;
}






#td_mess2
{
background-color:#F1F0F0;
border-style:solid;
border-width:0.3em; 
border-color:#F1F0F0;
border-radius: 25px;
}



</style>






</head>



<body style="background:transparent" oncontextmenu="return false;">


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
        


   // prwto meros emfanish onomatos


  $scheme = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];

  $theme = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);




     // deutero meros emfanish munhmatwn

   $sql="select * from forum where theme='$theme' and message!='request_theme' order by id desc";
   $result=$conn->query($sql);

        
           if(!$result)
             {
             echo "Dont files" ."<br>";
              }
   




           else
              {

        echo '<table id=table4>';
 
     
  //$sql2="select photo_data from profile 
    //     inner join chat on profile.username = chat._from
      //   where chat._from='".$_SESSION['login']."'";



           while ($row=$result->fetch_assoc())
                {
 
                  $date1=substr($row['created'],-11,3);
                  $date2=substr($row['created'],-14,2);
                  $paula="/";
                  $date=$date1.$paula.$date2;
               

                  $time = substr($row['created'], -8, 5);
                  
                  $from = $row['_from'];
                  
                  $message = wordwrap($row['message'], 50, "<br>", true);



               // for inside avatar in messages
               // <img src='/photos/favicon.ico' height='25'  width='25'>


             if ($row['_from'] == $_SESSION['login'])
                {
                $mes = "<td id='td_mess'>
         <font color='white'> you &nbsp; $date $time <hr>  $message <br> </b> </font> 
              </td>";
                 }
      

 
              if ($row['_from'] != $_SESSION['login'])
                {
                $mes = "<td id='td_mess2'> 
              <font color='black'> $from &nbsp; $date $time <hr> $message <br> </b> </font> 
              </td>";
                 }




        echo "<tr> $mes </tr>";


            } // end of while forum
         

    echo '</table>';
          
         } // end of else echo
  










   } // end of else data


  $conn->close();
   

  } // end of else connect


?>
