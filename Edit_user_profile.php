<?php  include("config/db.php")?>
<?php include("Server_Side.php");?>

<?php  $user_id = $_SESSION['id'];
       $usernameS = $_SESSION['username'];
       
       
      
 ?>
<?php 
	if (isset($_GET['Edit_Profile'])) {
        $user_id = $_SESSION['id'];
		$record = mysqli_query($db, "SELECT * FROM userprofile WHERE  user_id = '$user_id'");

		if (count(array($record)) == 1 ) {
			           $P = mysqli_fetch_array($record);
                       $user_id = $P['user_id'];
                        $username = $P['username'];
                        $avatar = $P['avatar'];
                        $profession = $P['profession'];
                        $birthday = $P['birthday'];
                        $phone_number = $P['phone_number'];
                        $province = $P['province'];
                        $Etat_Civil = $P['Etat_Civil'];
                        $Bio = $P['Bio'];
		}
	}

?>



<?php  if(!$_SESSION['username']) :?>

<?php header("location:Login.php") ?>

<?php else :?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="cards-gallery.css">
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
</head>
<body>
    
<form action="profile_gallery.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="user_id" value=<?=  $user_id ?>>
<div class="container rounded bg-white mt-5" >
    <div class="row">
        <div class="col-md-4 border-right" style="margin-top:-76px">
        
        <!-- this code allows us to view the profile picture before to upload into the database-->
        <div class="text-center img-placeholder"  onClick="triggerClick()">
                
        </div>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="<?php echo $avatar ?>" width="90" onClick="triggerClick()" id="profileDisplay" name="avatar">
            <span class="font-weight-bold">
            
              
            </span>
            <input type="hidden" name="OldAvatarImage" value=<?php echo  $avatar ?>>
            <input type="file" name="avatar" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <span><label><i class="fa fa-camera"></i></label></span>
            <?php echo $username  ?></span><span class="text-black-50"><?php echo $email  ?></span><span>United States</span></div>
            
        </div>
        <div class="col-md-8" style="margin-top:-76px">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <a href="Profile_gallery.php"><h6>Retoure</h6></a>
                    </div>
                    
                </div>
                <div class="row mt-2">

                <div class="col-md-6">
                        <label for=""><b> Username</b></label>
                        <input type="text" class="form-control" placeholder="Username" name="username" value=<?= $username  ?>></div>
                    <div class="col-md-6">
                        <label for=""><b>  Profession</b></label>
                        <input type="text" class="form-control" placeholder="profession" name="profession" value=<?= $profession  ?>></div>
                    <div class="col-md-6">
                    <label for=""><b> phone_number </b></label>
                        <input type="tel" class="form-control"  placeholder="votre numero de telephone" name="phone_number" value=<?= $phone_number ?>></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                    <label for=""><b>province d'origine </b></label>
                        <input type="text" class="form-control" placeholder="province d'origine" name="province"  value=<?= $province ?>></div><br>
                    <div class="col-md-6">
                    <label for=""><b>date de naissance </b></label>
                        <input class="form-control" id="date" name="birthday" placeholder="date de naissance" type="text" name="birthday" value=<?php echo $birthday ?>></div><br>
                    
                    
                </div>
                
                <div class="row mt-3">
                <div class="col-md-6">
                <label for=""><b>Etat_Civil</b></label>
                    <input type="text" class="form-control"  placeholder="Etat civil" name="Etat_Civil" value=<?=  $Etat_Civil ?>></div>
                    <div class="col-md-6">
                    <label for=""><b>Ecrire</b></label>
                        <Textarea type="text" class="form-control" placeholder="Ecrire ce que vous aimez faire quand votre" name="Bio" ><?=  $Bio ?></Textarea></div>
                    
                   
                </div><br>
                <button class="btn btn-primary profile-button" type="submit" name="Update_Profile">Sauvergarder vos informations</button>
            </div>
        </div>
    </div>
</div>

</form>
</body>
</html>
<script>
            function triggerClick(e) {
        document.querySelector('#profileImage').click();
        }
        function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
        }
    </script>

<?php endif ?>