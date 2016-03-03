<?php
         if($_POST){
             // CHANGE THE TWO LINES BELOW
              $email_to = "cassie.ristovski@gmail.com";
              $email_subject = "Email Inquiry from DuBuis Family Reunions";
              $name = $_POST[name];
              $email = $_POST[email];
              $comments = $_POST[comments];
              $email_message = "Contact details below.\n\n";

      function clean_string($string) {
            $bad = array("content-type","bcc:","to:","cc:","href");
            return str_replace($bad,"",$string);
          }

          $email_message .= "Name: ".clean_string($name)."\n";
          $email_message .= "Email: ".clean_string($email)."\n";
          $email_message .= "Comments: ".clean_string($comments)."\n";

          // create email headers
          $headers = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();

        @mail($email_to, $email_subject, $email_message, $headers);
        echo "Sent"; die;

         }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <link rel="stylesheet" href="css/stylesheet.css" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="css/contact.css" type="text/css" charset="utf-8">
</head>
<body>
<header class="sticky">

    <div class="row">
        <div class="logo" href="#"></div>

        <div class="mobile-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="tree.html">Family Tree</a></li>
                <li><a href="photos.html">Photos</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>

    </div> <!-- / row -->

</header>

<div id="container">
  <form role="form" method="post" id="contact-form">
                <div class="wrap">
                    <div class="mat-div">
                      <label for="name" class="mat-label">Name</label>
                      <input type="text" class="mat-input" id="name" name="name">
                    </div>

                      <div class="mat-div">
                      <label for="email" class="mat-label">Email</label>
                      <input type="email" class="mat-input" id="email" name="email">
                    </div>

                      <div class="mat-div">
                      <label for="comments" class="mat-label">Comments</label>
                      <input type="text" class="mat-input" id="comments" name="comments">
                    </div>
                      <button type="submit" name="submit" value="Submit" id="submit"><i class="fa fa-paper-plane"></i> Submit</button>
                  </div>
              </form>

             <div class='alert alert-success coverDIV' id='message'>Thank you! We will be in touch with you shortly.</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script src="js/menu.js"></script>
<script src="js/main.js"></script>
  <script>
$(document).ready(function() {
  $("#contact-form").validate({
    submitHandler: function() {
      //submit the form
      $.post("<?php echo $_SERVER[PHP_SELF]; ?>", //post
        $("#contact-form").serialize(),
        function(data){
          //if message is sent
          if (data == 'Sent') {
            $("#message").fadeIn();
            $("#contact-form")[0].reset(); //reset fields
            $('.mat-div').removeClass('is-completed');
        }
        //
      });
      return false; //don't let the page refresh on submit.
    }
  }); //validate the form
});
</script>
</body>
</html>
