<?php  include("config/db.php") ?>
<?php include("Server_Side.php") ?>
<?php    
   if (isset($_SESSION['username']) != null) {
    header("location:profile_gallery.php");
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

   
            <form action="Login.php" method="POST">
            <input type="hidden" name="email" >
                 <h3 style="text-align: center;">Se Connecter</h3>
                    <div class="field">
                        <input type="text" required name="email">
                        <label>Email Address</label>
                    </div>

                    <div class="field">
                        <input type="password" required name="password">
                        <label>Password</label>
                    </div>

                    <div class="content">
                       <!--<div class="checkbox">
                           <input type="checkbox" id="remember-me">
                           <label for="remember-me">Remember me</label>
                       </div>-->

            <div class="pass-link">
            <a href="Verification.php">Mot de passe oublier?</a></div>
            </div>
            <div class="field">
                    <input type="submit" value="Se connecter" name="Login">
                    </div>
            <div class="signup-link">
            pas encore membre? <a href="Singup.php">Creer un compte</a></div>
            </form>
</div>


    
</body>
</html>
