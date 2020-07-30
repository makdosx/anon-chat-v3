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
 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 session_start();

 if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }



?>


<html>
<head>

   <meta http-equiv="refresh" content="30"> 

   <title> anon-chat </title>

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





#avatar
{
height: 2em;
width: 2em;
border-radius: 50%;
}



</style>



<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">



<script type="text/javascript">

 setInterval(function()
    {
    $("#reload1").load(location.href + " #reload1");
    },200);

</script>


</head>



<body style="background:transparent" oncontextmenu="return false;">




</html>
</html>





<?php




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
 

   $sql="select distinct id2,_from,_to,created,request_time,fingerprint
         from chat 
         where _to='".$_SESSION['login']."' or _from='".$_SESSION['login']."' and message='request_conversation' and request_time='1' 
         group by fingerprint order by created desc";
   $result=$conn->query($sql);



           if(!$result)
             {
             echo "Dont find requests" ."<br>" .$conn->error;
              }
   


           else
              {
          

        echo '<div id="reload">
              <div id="reload1">
               <table id="table3">
                <tr>
                    <td id="td_created"> <font color="grey"> <b> Sent </b> </font> </td>
                     <td id="td_from"> <font color="grey"> <b> Avatar </b> </font> </td>
                    <td id="td_from"> <font color="grey"> <b> User </b> </font> </td>
                    <td id="td_from"> <font color="grey"> <b> Delete </b> </font> </td>
                    <td id="td_from"> <font color="grey"> <b> Start </b> </font> </td>
                </tr>
                 <tr> <td><hr></td>  <td><hr></td>  <td><hr></td>  <td><hr></td>  </tr>';
 
    



           while ($row=$result->fetch_assoc())
                {
 
                 $_from = $row['_from'];
                 $_to   = $row['_to'];
                 
                  $finger = $row['fingerprint']; 
 
                  $date1=substr($row['created'],-11,3);
                  $date2=substr($row['created'],-14,2);
                  $paula="/";
                  $date=$date1.$paula.$date2;


                 $time = substr($row['created'], -8, 5);
  

              if ($_from == $_SESSION['login'])
                {

             $sql001 = "select _to from chat where fingerprint='$finger' and message='request_conversation'";
             $result001 = $conn->query($sql001);

           while ($row001 = $result001->fetch_assoc())
              {   
                $avatar_data_to = $_to ."." ."png";
                $avatar_to = "<img id='avatar' src='/avatars/$avatar_data_to'>";
              }
                 

              $res = "<tr>
             <td> <font color='grey'> <b> $date $time </b> </font> </td>

              <td id='conv_user'>  
               $avatar_to
             </td>
 

             <td> <font color='grey'> <b> {$row['_to']} </b> </font> </td>

             <td> 
          
            <form action='' method='post'>
          <button type='submit' value='".$row['id2']."' name='delete_btn1' 
                  class='btn btn-sm btn-danger btn_delete'>
               <i class='glyphicon glyphicon-trash'></i> 
                  DELETE 
               </button> 
            </form>    

             </td>
             
  
              <td>
                <form>
              <button type='button' onclick=openInNewTab_start('chat2.php?fingerprint={$row["fingerprint"]}'); name='btn_add' id='btn_add' 
                      class='btn btn-sm btn-success'>
                   START
                    <i class='glyphicon glyphicon-open'></i> 
                   </button>   
                    </form>

             </td>
                </tr>";

                 }




   //onclick=location.href='request_delete.php?id2={$row[id2]}';



          else  if ($_from != $_SESSION['login'])
                {
                
                $sql002 = "select _from from chat where fingerprint='$finger' and message='request_conversation'";
                $result002 = $conn->query($sql002);

           while ($row002 = $result002->fetch_assoc())
              {   
                $avatar_data_from = $_from."."."png"; 
                $avatar_from = "<img id='avatar' src='/avatars/$avatar_data_from'>";
              }

                    
              $res = "<tr>
             <td> <font color='grey'> <b> $date $time </b> </font> </td>

              <td id='con_user'>  
              $avatar_from
           </td>

             <td> <font color='grey'> <b> {$row['_from']} </b> </font> </td>

             <td> 

               <form action='' method='post'>
               <button type='button' value='".$row['id2']."' name='delete_btn' name='delete_btn2' 
                  class='btn btn-sm btn-danger btn_delete'>
               <i class='glyphicon glyphicon-trash'></i> 
                  DELETE 
               </button> 
               </form>
                 </td>

                
                <td>
                 <form>
             <button type='button' onclick=openInNewTab_start('chat2.php?fingerprint={$row["fingerprint"]}'); name='btn_add' id='btn_add' 
                      class='btn btn-sm btn-success'>
                   START
                    <i class='glyphicon glyphicon-open'></i> 
                   </button>      
                  </form>

             </td>
                </tr>";
                  }




        echo "$res";


            } // end of while forum
         

    echo '</table> </div> </div>';
          
         } // end of else echo
     

  echo'<script>
    function close_window() 
      {
   
    close();

     }
 </script>';




  if(isset($_POST['delete_btn1']))
    {

    $id2 = $_POST['delete_btn1'];
       
   $sql="DELETE FROM chat where id2='$id2'";
   $result=$conn->query($sql);

    }
         
         
         
  if(isset($_POST['delete_btn2']))
    {
     $id2 = $_POST['delete_btn2'];

   $sql="DELETE FROM chat where id2='$id2'";
   $result=$conn->query($sql);

         }
  









   } // end of else data


  $conn->close();
   



?>
