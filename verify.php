<?php
/*
 * Copyright (c) 2017-2018 Barchampas Gerasimos <makindosx@gmail.com>
 * QR-sms is a sms getaway with qrcode for verification (etc).
 *
 * QR-sms is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * QR-sms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
 session_start();
    if (!isset($_SESSION['qrcode']))
    {
    header('Location:index.php');
     }
?>


<html>


<head>

 <meta charset="UTF-8">

  <title> anon-chat </title>


  <link rel="SHORTCUT ICON" href="photos/favicon.ico" />


 <link rel="stylesheet" type="text/css" href="css/verify.css">



<style>

div.centre
{
  width: 400px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}




#but
{
height:2.5em;
width:6em;
}



#but:hover
{
height:2.5em;
width:6em;
color:red;
}




#qr
{
border: 0;
outline: 0;
background: transparent;
border-bottom: 1px solid black;
height:20px;
width:70px;
text-align:center;
}





::-webkit-input-placeholder {
    color: black;
    font-weight: bold;
}


::-moz-placeholder {
    color: black;
    font-weight: bold;
}


::-ms-input-placeholder {
    color: black;
    font-weight: bold;
} 

:-o-input-placeholder {
    color: black;
    font-weight: bold;
} 




.form-btn {
   
    background: #87D05F  url("/photos/verify.png") no-repeat scroll 200px 8px;
    border: medium none;
    border-radius: 100px;
    color: black;
    font-weight: 600;
    height: 50px;
    max-width: 350px;
    padding: 10px 0;
    position: relative;
    width: 100%;
    margin-bottom: 10px;
    box-shadow: 0 2px 8px #d2d2d2;
    -moz-box-shadow: 0 2px 8px #d2d2d2;
    -webkit-box-shadow: 0 2px 8px #d2d2d2;
}

.form-btn::before {
    content: "";
    font-family: FontAwesome;
    position: absolute;
    right: 17px;
    top: 9px;
}




.form-btn:hover
 {
    background: #379182 url("/photos/verify.png") no-repeat scroll 200px 8px;
    border: medium none;
    border-radius: 100px;
    color: black;
    font-weight: 600;
    height: 50px;
    max-width: 350px;
    padding: 10px 0;
    position: relative;
    width: 100%;
    margin-bottom: 10px;
    box-shadow: 0 2px 8px #d2d2d2;
    -moz-box-shadow: 0 2px 8px #d2d2d2;
    -webkit-box-shadow: 0 2px 8px #d2d2d2;
}




</style>


<script language="JavaScript">
 history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>



<script src="/qrcode/easy.qrcode.js" type="text/javascript" charset="utf-8"></script>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <Script>
        $(document).ready(function(){
            $(".inputs").keyup(function () {
                $this=$(this);
                if ($this.val().length >=$this.data("maxlength")) {
                  if($this.val().length>$this.data("maxlength")){
                    $this.val($this.val().substring(0,1));
                  }
                  $this.next(".inputs").focus();
                }
             });
        });
    </Script>

</script>



</head>

 <body>


 <div class="centre">


<div align="center">
<div id="qrcode"></div>
</div>

<script type="text/javascript">

			function showQr() {
				new QRCode(document.getElementById("qrcode"), {
					text: "<?php echo $_SESSION['qrcode']; ?>",
					width: 250, 
					height: 200, 
					colorDark: "#000000", 
					colorLight: "#ffffff", 
					correctLevel: QRCode.CorrectLevel.H 
				});
			}
			
		
			showQr();
		</script>



   &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 
   <img src="/photos/code1.png" height="140" width="250">

      <br><br>



   <form action="" method="post">

  <input type="text" name="qr1" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required autofocus >   
  <input type="text" name="qr2" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required> 
  <input type="text" name="qr3" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required> 
  <input type="text" name="qr4" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required> 
  <input type="text" name="qr5" class="inputs" id="qr" pattern="[0-9]{1}" data-maxlength="1" required>

    <br><br>

     <button type="submit" name="submit" class="form-btn">Verify</button>

   </form>



</div>
 </div>


</body>
</html>




<?php
 if (isset($_POST['submit']))
   {
  require 'classes.php';
  
  $obj_con =  new security;
  $host = $obj_con->connect[0];
  $user = $obj_con->connect[1];
  $pass = $obj_con->connect[2];
  $db   = $obj_con->connect[3]; 
    $conn = new mysqli($host,$user,$pass,$db);
      if($conn->connect_error)
         {
          die ("Cannto connect to server " .$conn->connect_error);
           }
 
    else
     { 
     $qrv1 = $_POST['qr1'];
     $qrv2 = $_POST['qr2'];
     $qrv3 = $_POST['qr3'];
     $qrv4 = $_POST['qr4'];
     $qrv5 = $_POST['qr5'];
    
     $qrcode_v = $qrv1.$qrv2.$qrv3.$qrv4.$qrv5;
      
         $sql = "select verification_code from login where verification_code='".$_SESSION['qrcode']."'";
         $result = $conn->query($sql);
 
         while ($row = $result->fetch_assoc())
               {
              
                
            if ($row['verification_code'] == $qrcode_v)
                  {
                 $sql2 = "update login set verified='yes' ,verification_code='ok' 
                          where verification_code='$qrcode_v'";
                 $result2 = $conn->query($sql2);
                   session_destroy();             
 
           echo '<script type="text/javascript">alert("Your registration has been successfully completed");
           </script>';
           echo ("<script>location.href='index.php'</script>");
 
                   } // end for verication code is same
               else if ($row['verification_code'] != $qrcode_v)
                  {
                echo '<script type="text/javascript">alert("Your registration failed: Please re-enter the verification code");
                 </script>';
                echo ("<script>location.href='verify.php'</script>");
                   } 
                 } // end fo while
      } // end of else connect
   } // end of isset
 
?>
