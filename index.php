<html>
<head>
<link href="vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
<link href="styleEmoji.css" rel="stylesheet"><link rel="stylesheet" href="styles.css">
        <link href="styleEmoji.css" rel="stylesheet">

         <!--Link that will allow us to use imoji -->
     
  

        <link href="vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
        <link href="styleEmoji.css" rel="stylesheet">

        <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

<title>How to Insert Emoji using PHP in Comments</title>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/emoji-picker/lib/js/config.js"></script>
<script src="vendor/emoji-picker/lib/js/util.js"></script>
<script src="vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
<script src="vendor/emoji-picker/lib/js/emoji-picker.js"></script>
</head>

<body>
	<div class="output-container">
		<h2>How to Insert Emoji using PHP in Comments</h2>

		<div class="comment-form-container">
			<form id="frm-comment">
				<div class="input-row">
					<input type="hidden" name="comment_id" id="commentId"
						placeholder="Name" /> <input class="input-field" type="text"
						name="name" id="name" placeholder="Name" />
				</div>

				<div class="input-row">
					<p class="emoji-picker-container">
						<textarea class="input-field" data-emojiable="true"
							data-emoji-input="unicode" type="text" name="comment"
							id="comment" placeholder="Add a Message">  </textarea>
					</p>
				</div>

				<div>
					<input type="button" class="btn-submit" id="submitButton"
						value="Add a Comment" />
					<div id="comment-message">Comment Added Successfully!</div>
				</div>


			</form>
		</div><div id="output"></div>

        <div class="container">
                 <small><a href="Home.php" style="margin-top:-4px;color:white"> <i class="fa fa-home" style="font-size:20px"></i> retourner a la page d'accuille</a></small>>
                 <li class="write-new" style="margin-top:-4px">
                 
                  
                       
                            <form action="#" method="post">
                            <input type="hidden" name="post_id" >>
                                
                                <textarea placeholder="Ecrivez un commentaire ici" name="comment" required ></textarea>
                            <div>
                        <button type="submit" name="Add_Comment" class="btn btn-primary"><i class="fa fa-pencil"></i> Commenter</button> <br><br>
                            </div>
		
	</div>
	<script>
           
            function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

            $("#submitButton").click(function () {
                $("#comment-message").css('display', 'none');
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "comment-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        $("#comment-message").css('display', 'inline-block');
                        $("#name").val("");
                        $("#comment").val("");
                        $("#commentId").val("");
                        listComment();
                    }
                });
            });

            $(document).ready(function () {
                listComment();
            });

            $(function () {
                // Initializes and creates emoji set from sprite sheet
                window.emojiPicker = new EmojiPicker({
                    emojiable_selector: '[data-emojiable=true]',
                    assetsPath: 'vendor/emoji-picker/lib/img/',
                    popupButtonClasses: 'icon-smile'
                });

                window.emojiPicker.discover();
            });


            
         

        </script>

</body>

</html>