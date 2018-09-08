
<?php
include ('db.php');

 session_start();


if(isset($_POST['login'])){
$nickname=clean($_POST['nickname']);
$password=clean($_POST['password']);

$stmt = $conn->prepare('SELECT * FROM users WHERE name=:name AND password=:password');
$stmt->execute(array(':name' => $nickname,':password'=>$password));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0){


  $_SESSION["name"] = $row['name'];

  
     echo '<script>window.location.href="index.php"</script>';
}
else{
    $message = 'Şifreniz eşleşmiyor';
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>login system</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?=$_SERVER['PHP_SELF']?>" method="post">
     <!-- <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
      <h1 class="h3 mb-3 font-weight-normal">Yasaklı bölge buraya giriş yapamazsınız</h1>
       <?php if(!empty($message)): ?>
    <p class="text-danger"><?= $message ?></p>
  <?php endif; ?>
      <label for="inputEmail" class="sr-only">nickname</label>
      <input name="nickname" type="text" id="inputEmail"  class="form-control" placeholder="nickname" required autofocus>
      <label for="inputPassword" class="sr-only">parola</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
 
    <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>

    </form>
  </body>
</html>
