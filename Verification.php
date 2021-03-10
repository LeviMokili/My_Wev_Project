<?php  include("config/db.php") ?>
<?php include("Server_Side.php") ?>
<?php    
   if (isset($_SESSION['username']) != null) {
    header("location:Home.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

   <div class="wrapper">
   <?php include('errors.php'); ?>
            <form action="Verification.php" method="POST">
                 <h3 style="text-align: center;">Confirmer le si c'est votre compte</h3>
                    <div class="field">
                        <input type="text" name="email" >
                        <label>Entrer votre adress email</label>
                    </div><br><br>

                    <div class="content">
                       <!--<div class="checkbox">
                           <input type="checkbox" id="remember-me">
                           <label for="remember-me">Remember me</label>
                       </div>-->
                       
                       <div class="field">
                    <input type="submit" value="Confirmer" name="Confirm_Email">
                    </div>

            
            </form>
</div>


    
</body>
</html>
