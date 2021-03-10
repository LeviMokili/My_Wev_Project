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



<?php $email = $_GET['email'];
       echo $email;

?>


   <div class="wrapper">
   <?php include('errors.php'); ?>
   
            <form action="ResetPassword.php" method="POST">
                  <input type="hidden" name="email" value=<?php  echo $email ?>>
                 <h3 style="text-align: center;">Confirmer le si c'est votre compte</h3>
                    <div class="field">
                        <input type="password"  name="New_Password">
                        <label>Nouveau mot de passe</label>
                    </div><br><br>
                    <div class="field">
                        <input type="password"  name="ConfirmPassword">
                        <label>Confirmer le mot de passe</label>
                    </div><br><br>

                    
                    <a href="Verification.php">Retour</a>
                    <div class="content">
                       <!--<div class="checkbox">
                           <input type="checkbox" id="remember-me">
                           <label for="remember-me">Remember me</label>
                       </div>-->
                      
                       <div class="field">
                       
                      
                    <input type="submit" value="Confirmer" name="Reset_Password">
                    </div>

            
            </form>
</div>


    
</body>
</html>
