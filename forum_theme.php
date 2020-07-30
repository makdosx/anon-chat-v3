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

   <meta http-equiv="refresh" content="10"> 

   <title> anon-forum </title>

  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


 <link rel="stylesheet" type="text/css" href="css/chat.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>







<script>
function openInNewTab_delete(url) {
  var win = window.open(url, '_top');
  win.focus();
}
</script>



<script>
function openInNewTab_start(url) {
  var win = window.open(url, '_blank');
  win.focus();
}
</script>



<style>


#table3
{
border-style:;
border-width:; 
border-color:;
border-collapse:separate; 
border-spacing:0.2em;
height:;
width:;
position: absolute;
left:0;
top:0%;
width:90%;
text-align: center;
font-size: 18px;
}




#td_created
{
width:1em;
}




#td_from
{
width:1em;
}




#td_avatar
{
width:1em;
}









</style>




</head>



<body style="background:transparent">




</html>
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
 

   $sql="select distinct created,theme,creator from forum where _to='forum' and message = 'request_theme' group by theme order by created desc";
   $result=$conn->query($sql);

        
           if(!$result)
             {
             echo "Dont find requests" ."<br>";
              }
   


           else
              {
        

        echo '<table id=table3>
                <tr>
                    <td id="td_created"> <font color="grey"> <b> Sent </b> </font> </td>
                     <td id="td_from"> <font color="grey"> <b> Avatar </b> </font> </td>
                    <td id="td_from"> <font color="grey"> <b>  User </b> </font> </td>
                    <td id="td_from"> <font color="grey"> <b> Theme </b> </font> </td>
                    <td id="td_from"> <font color="grey"> <b> Conversation </b> </font> </td>
                </tr>
                 <tr> <td><hr></td>  <td><hr></td>  <td><hr></td>  <td><hr></td>  </tr>';
 
    



           while ($row=$result->fetch_assoc())
                {
 
                  $date1=substr($row['created'],-11,3);
                  $date2=substr($row['created'],-14,2);
                  $paula="/";
                  $date=$date1.$paula.$date2;


                 $time = substr($row['created'], -8, 5);
  



              if ($row['creator'] == $_SESSION['login'])
                {

              $res = "<tr>
             <td> <font color='#4476B4'> <b> $date $time </b> </font> </td>

              <td id='td_avatar'>  
              <img src='/photos/favicon.ico' height='40'  width='50'/> 
           </td>
 

             <td> <font color='#4476B4'> <b> You </b> </font> </td>

            <td> <font color='#4476B4'> <b> {$row['theme']} </b> </font> </td>

             <td> 

     
          <button type='button' onclick=openInNewTab_delete('forum_theme_delete.php?theme={$row["theme"]}'); name='delete_btn' 
                  class='btn btn-sm btn-danger btn_delete'>
               <i class='glyphicon glyphicon-trash'></i> 
                  DELETE 
               </button> 

                &nbsp; 
             
              <button type='button' onclick=openInNewTab_start('forum2.php?theme={$row["theme"]}'); name='btn_add' id='btn_add' 
                      class='btn btn-sm btn-success'>
                   START
                    <i class='glyphicon glyphicon-open'></i> 
                   </button>   

             </td>
                </tr>";

                 }



   //onclick=location.href='theme_delete.php?theme={$row[theme]}';



          else  if ($row['creator'] != $_SESSION['login'])
                {
              $res = "<tr>
             <td> <font color='grey'> <b> $date $time </b> </font> </td>

              <td id='td_avatar'>  
              <img src='/photos/favicon.ico' height='40'  width='50'/> 
           </td>

             <td> <font color='grey'> <b> {$row['creator']} </b> </font> </td>
             
             
             <td> <font color='grey'> <b> {$row['theme']} </b> </font> </td>

             <td> 

               <button type='button' onclick=openInNewTab_delete('forum_theme_delete.php?theme={$row["theme"]}'); name='delete_btn' 
                  class='btn btn-sm btn-danger btn_delete'>
               <i class='glyphicon glyphicon-trash'></i> 
                  DELETE 
               </button> 

                &nbsp;
              
             <button type='button' onclick=openInNewTab_start('forum2.php?theme={$row["theme"]}'); name='btn_add' id='btn_add' 
                      class='btn btn-sm btn-success'>
                   START
                    <i class='glyphicon glyphicon-open'></i> 
                   </button>      

             </td>
                </tr>";
                  }




        echo "$res";


            } // end of while forum
         

    echo '</table>';
          
         } // end of else echo
     

  echo'<script>
    function close_window() 
      {
   
    close();

     }
 </script>';






   } // end of else data


  $conn->close();
   

  } // end of else connect


?>
