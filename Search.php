<?php include("config/db.php")?>
<?php include("Server_Side.php");?>

<?php  $user_id = $_SESSION['id'];
       $username = $_SESSION['username'];
?>

<?php 
               
                if (isset($_POST['Search'])) {
                  $Search = $_POST['Search'];
                  $sql_search = "SELECT * FROM  userprofile WHERE username LIKE '%$Search%' " ;
                  $query_search_sql = mysqli_query($db, $sql_search) or trigger_error("QUERY FAILED: $sql_search  - ERROR :".mysqli_error($db), E_USER_ERROR);
                  $count_search = mysqli_num_rows($query_search_sql);
                 
                  if ($count_search == 0) {
                    echo "No users";
                  }
                 


                  
               

               }

              ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.3/jquery.timeago.js"></script>

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <title>Document</title>
</head>
<style>


</style>
<body style="background:#3D4142">
<div class="container" style="margin-top:40px">
<?php  while ($row = mysqli_fetch_array($query_search_sql)) {?>
  <div class="container">

<div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <div class="row search-body">
                        <div class="col-lg-12">
                            <div class="search-result">
                                
                                <div class="result-body">
                                    <div class="table-responsive">
                                        <table class="table widget-26">
                                            <tbody>
                                               
                                               
                                                <tr>
                                                    <td>
                                                        <div class="widget-26-job-emp-img">
                                                            <img src=<?php echo $row['avatar']  ?> alt="Company" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                       
                                                            <a href="Single_User_Profile.php?U_ID=<?php  echo $row['user_id'] ?>"><?php echo $row['username']  ?></a>
                                                           
                                                       
                                                    </td>
                                                    
                                                </tr>
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

 <?php  }?>
</div>



</body>
</html>