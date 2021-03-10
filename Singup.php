<?php  include("Server_Side.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div class="wrapper">

<form action="Singup.php" method="POST">
<?php include('errors.php'); ?>
  <h3 style="text-align: center;">Creer un Compte</h3>
        <div class="field">
          <input type="text" required name="username">
          <label>Username </label>
        </div>

        <div class="field">
          <input type="email" required name="email">
          <label>email</label>
        </div>
<div class="field">
          <input type="password" required name="password">
          <label>Mot de Pass</label>
        </div>

        <div class="field">
          <input type="password" required name="cpassword">
          <label>Confirmer le Mot de Pass</label>
        </div>
<div class="content">
          
<div class="pass-link">
<a href="#"></a></div>
</div>
<div class="field">
          <input type="submit" value="Signup" name="Register">
        </div>
<div class="signup-link">
Not a member? <a href="Login.php">Signin now</a></div>
</form>
</div>
    
</body>
</html>
