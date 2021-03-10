<?php  

 include("config/db.php");
 include("Server_Side.php");

 

?>

<?php  if($_SESSION['id'] == 1) :?>

   <?php  include("index.html") ?>

<?php else :?>
    <?php include("Home.php")?>
<?php endif ?>