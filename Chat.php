<?php  include("config/db.php")?>
<?php include("Server_Side.php");?>

<?php  $user_id = $_SESSION['id'];
       $username = $_SESSION['username'];
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" href="less/inbox.less" type="text/css" />
    <link rel="stylesheet/less" href="less/jquery.mCustomScrollbar.less" type="text/css" />
    <link rel="stylesheet/less" href="font/font-awesome.less" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php  
       // User sender id 
       $user_id = $_SESSION['id'];

       //Sender username
       $sender_username = $_SESSION['username'];

       //User receiver id
       $U_ID = $_GET['U_ID'];

       //Username receiver
       $reveiver_username = $_GET['reveiver_username'];

       

       
      

      
      
    ?>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    (function($){
        $(window).on("load",function(){
            $(".message-list, .chatter, .comment-section, .storyline").mCustomScrollbar({
                theme:"dark-3"
            });
        });
    })(jQuery);
</script>
</body>
</html>