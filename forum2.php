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


   <title> anon-forum </title>

  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />

 <link rel="stylesheet" type="text/css" href="css/chat.css">



       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">



<style>

body{
background: url(/photos/1.jpg) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}




#form1
{
position:fixed;
bottom:0;
left:0;
margin: auto;
padding: 10px;
width: 100%;
}



.chat
{
height:90px;
width:100%;
position: absolute;
left: 0%;
top: 40%;
text-align:center;
font-size:17px;
word-wrap: break-word;
word-break: break-word;
background:#DBD8F8;
color:black;
border-style:solid;
border-width:0.2em;
border-color:silver;
}



#button
{
height:2.5em;
width:17em;
}




#del
{
position:fixed;
bottom:11%;
right:40%;
width:20%;
text-decoration:none;
display:inline-block;
line-height:50px;
background:#737373 url('/photos/delete.png') no-repeat 90% center;  /* orizei to megethos ths einonas kai xrwma mazi*/
text-align:center;
color:white;
border-style:solid;
border-width:0.1em; 
border-radius: 10px;
border-color:silver;
font-size:13px;
}



#del:hover
{
position:fixed;
bottom:11%;
right:40%;
width:20%;
text-decoration:none;
background-color:white;
display:inline-block;
line-height:50px;
background:#ff4d4d url('/photos/delete.png') no-repeat 90% center;  /* orizei to megethos ths einonas kai xrwma mazi*/
text-align:center;
color:white;
border-style:solid;
border-width:0.1em; 
border-radius: 10px;
border-color:silver;
font-size:13px;
}


#conv_user
{
position: fixed;
top:0%;
left:5%;
width:90%;
font-size:30px;
background-color:;
color:black;
text-align:center;
}



#conv_user:hover
{
position:fixed;
top:0%;
left:5%;
width:90%;
font-size:30px;
background-color:;
color:black;
text-align:center;
}




#img_close
{
position:fixed;
top:0%;
right:0%;
height:40px;
width:50px;
}




#img_close:hover
{
position:fixed;
top:0%;
right:0%;
height:45px;
width:55px;
}






.table4
{
position: fixed;
top: 20%;
left: 40%;
margin-top: -50px;
margin-left: -100px;

border-style:;
border-width:; 
border-color:;
border-collapse:separate; 
border-spacing:1em;
display: block;
height: 60%;
overflow-y: auto;
width: 100%;
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


#avatar2
{
object-fit: cover;
height: 25px;
width: 25px;
border-radius: 50%;
}


#td_default_mess
{
width: 100%; 
}


#hr
{
color: #f00;
background-color: #f00;
height: 5px;
width: 500px;
}


</style>



<script type="text/javascript">
        document.getElementById("txt_1").value = getSavedValue("txt_1");    // set the value to this input
        //document.getElementById("txt_2").value = getSavedValue("txt_2");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>




<script type="text/javascript">

/*
 setInterval(function()
    {
    $("#reload").load(location.href + " #reload1");
    },2000);
*/



var time = new Date().getTime();

var refreshTime =  100;

$(document).bind("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error hover change", function (e) {
    time = new Date().getTime();
});

function refresh() {
    if (new Date().getTime() - time >= refreshTime) {
        $('#reload').load("#reload1");

    } else {
        setTimeout(refresh, refreshTime);
    }
}

setTimeout(refresh, refreshTime);
    
</script>




</head>




<body>

<br><br>

   
  <a href="javascript:close_window();" id="close_tab"><img src="/photos/close.png" id="img_close" title="close conversation"></a>



  <script>
    function close_window() 
      {
     if (confirm("Do you want to close conversation for this theme?"))
        {
    close();
       }
     }
 </script>




</body>
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

    $scheme = $_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];

    $theme = substr($scheme, (strpos($scheme, '=') ?: -1) + 1);



    // prwto meros emfanish onomatos


    $sql0 = "select _from, _to, theme from forum where theme='$theme' and message='request_theme'";
    $result0 = $conn->query($sql0);

     
        while ($row0 =  $result0->fetch_assoc())
         {


          if ($row0['_from'] == $_SESSION['login'])
             {
           echo "<div id='conv_user'> 
                   <span class='glyphicon glyphicon-pencil'></span>
                   Creator: {$row0['_from']} - 
                   <span class='glyphicon glyphicon-tag'></span>
                   Theme: {$row0['theme']} 
                   <hr> 
                 </div>";
           
                }

 
        else if ($row0['_from'] != $_SESSION['login'])
             {
           echo "<div id='conv_user'> 
                   <span class='glyphicon glyphicon-pencil'></span>
                   Creator: {$row0['_from']} - 
                   <span class='glyphicon glyphicon-tag'></span>
                   Theme: {$row0['theme']}
                   <hr> 
                 </div>";
                }


           }



     // prwto meros emfanish munhmatwn



   /*
    echo "<div align='center'>
      <iframe src='forum_messages.php?theme=$theme' width='60%' height='65%'
       style='opacity:1; box-shadow:none; filter: chroma(color=#FFFFFF)' framespacing=0 frameBorder='0' scrolling='auto' allowTransparency='true'>
      </iframe>
       </div>";
*/






$sql="select * from forum where theme='$theme' and message!='request_theme' order by id desc";
$result=$conn->query($sql);
echo $conn->error;
        
           if(!$result)
             {
             echo "Dont files" ."<br>";
              }
   


           else
              {

        echo '<div id="reload">
              <div id="reload1">
              <table class="table4">';
 
     
  //$sql2="select photo_data from profile 
    //     inner join chat on profile.username = chat._from
      //   where chat._from='".$_SESSION['login']."'";


             echo "<td id='td_default_mess'>
                    <font color='white'> <hr id='hr'> </font> 
              </td>";



           while ($row=$result->fetch_assoc())
                {
 
                 $date1=substr($row['created'],-11,3);
                  $date2=substr($row['created'],-14,2);
                  $paula="/";
                  $date=$date1.$paula.$date2;
               

                  $time = substr($row['created'], -8, 5);
                  
                   $avatar_user = $_SESSION['login']."."."png"; 
                   $avatar = "<img id='avatar2' src='/avatars/$avatar_user'>";    
                   
                  $from = $row['_from'];
                  
                  $message = wordwrap($row['message'], 50, "<br>", true);



               // for inside avatar in messages
               // <img src='/photos/favicon.ico' height='25'  width='25'>


             if ($row['_from'] == $_SESSION['login'])
                {
                $mes = "<td id='td_mess'>
         <font color='white'> $avatar $date $time <br> $message </b> </font> 
              </td>";
                 }
      

 
              if ($row['_from'] != $_SESSION['login'])
                {
                $mes = "<td id='td_mess2'> 
              <font color='black'> $avatar $date $time <br> $message </b> </font> 
              </td>";
                 }




        echo "<tr> $mes </tr>";


            } // end of while forum
         

    echo '</table> </div> </div>';
          
         } // end of else echo
  


 echo  "<div align='center'>
         <form action='delete_forum_messages.php?theme=$theme' method='post'/>
                <input type='submit'  name='delete_submit' value='Delete Your Messages &nbsp; &nbsp;' id='del'/> 
        </form>
         </div>";
 

 
 echo'<div align="center">
  <form action="" method="POST" id="form1">
      <br><br>
   <input type="text"  class="chat" name="forum_text" maxlength="512" id="txt_1" autofocus="autofocus" required>
    <br><br>
  <input type="hidden" name="forum_submit" value="Send" id="button">
  </form>
  </div>';






// deutero meros apostolh mhnumatos

  if(isset($_POST['forum_submit']))   
    {
  
   $sql01="select creator, theme from forum where theme='$theme'";
   $result01=$conn->query($sql01);

 
     while ($row01 = $result01->fetch_assoc())
       {

     $creator =$row01['creator'];
     $theme = $row01['theme'];
       

     } // end of while for theme



   $forum_text=$_POST['forum_text'];
 
   $forum_text = htmlspecialchars($forum_text);
   $forum_text = trim($forum_text);
   $forum_text = stripslashes($forum_text);
   $forum_text = $conn->real_escape_string($forum_text); 

  $ip_from = $_SERVER['REMOTE_ADDR'];
  $_from = $_SESSION['login'];
  
  //$sql2="INSERT INTO forum (creator, theme, created, _from, ip_from, _to, message) 
    //    VALUES('$creator', '$theme', NOW(), '$_from', '$ip_from', 'forum', '$forum_text')";

 
   $session_login = $_SESSION['login'];

  $sql2="INSERT INTO forum (creator, theme, created, _from, ip_from, _to, message) 
         VALUES ('$creator', '$theme', NOW(), '$_from', '$ip_from', 'forum', '$forum_text')";
  $result2=$conn->query($sql2);


       if ($result2)
              {    

        // $sql3="INSERT INTO backup_forum (creator, theme, created, _from, ip_from, _to, message) 
              //   VALUES('$creator','$theme', NOW(), '$creator', '$ip_from', 'forum','$forum_text')";
        
         $sql3="INSERT INTO backup_forum (creator, theme, created, _from, ip_from, _to, message) 
                VALUES('$creator', '$theme', NOW(),'$_from', '$ip_from' ,'forum' ,'$forum_text')";
         $result3=$conn->query($sql3);
 

                // echo ("<script>location.href='forum.php'</script>"); 
                          }
                     

                  else
                    {  
               echo '<script type="text/javascript">alert("Error! Can not be sent message");
              </script>';
                          }  
                       
              
                     
     }  // end of if send message to forum






   } // end of else data


  $conn->close();
   


?>
