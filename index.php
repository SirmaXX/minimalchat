


<?php 
 session_start();


if(isset($_SESSION["name"]))  
 {  
   echo '';
 }  
 else  
 {  
      header("location:login.php");  
 }  

include('db.php');

?>



<!DOCTYPE html>
<html>
<head>
  <title>talking</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
   
  <script>
function ajax(){

var req=new XMLHttpRequest();
req.onreadystatechange=function(){

if(req.readyState == 4 && req.status == 200){
document.getElementById('chat').innerHTML=req.responseText;



}


}
req.open('GET','chat.php',true);
req.send();

}

setInterval(function(){ajax();},1000);




  </script>
</head>
<body>

  <div class="chatbox">
    <div class="chatlogs">



<div id="chat"></div>


         
      
    </div>


<hr>
    <div class="chat-form">
          <form class="form-signin" action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <textarea id="msg" name="msg"></textarea>
     <p id="demo"></p>
      <button name="sendmsg">Send</button> <button><a href="logout.php" style="color:white; ">Çıkış</a></button>

    </form>

       
    </div>

     <script>
var mesaj = document.getElementById("msg");
var uyarı = document.getElementById("demo");
var maxLength = 10000;

var check=function (){

if(mesaj.value.length  < maxLength){

uyarı.innerHTML= (maxLength-mesaj.value.length) +"karakteriniz var";

}else if(mesaj.value.length= maxLength){
uyarı.innerHTML="karakter limiti dolmuştur";
mesaj.disabled=true;
}


}
setInterval(check,100);


     </script>
  </div>
<?php
if(isset($_POST['sendmsg']))
{
$name=clean($_SESSION["name"]);
$msg=clean($_POST['msg']);

 $query="INSERT INTO chat(user,msg)values ('$name','$msg')";
 $run= $conn->query($query);
}
?>
  

</body>
</html>
