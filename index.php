<?php
 
// server side validation

    $error = ""; $successMessage="";

  if ($_POST){

    if(!$_POST["email"]) {
      $error .= "An email address is required. <br>";    
    }
    if(!$_POST["subject"]) {
      $error .= "The subject field is required. <br>";    
    }
    if(!$_POST["content"]) {
      $error .= "The content field is required. <br>";    
    }
    if ( $_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
    $error .= "The email address is invalid. <br>";  
    }

    if ($error !="") {
      $error = '<div class="alert alert-danger" role="alert"><p>'.$error.'</p>';
    } else {
      $emailTo = "subas.basnet18@gmail.com";
      $subject = $_POST['subject'];
      $content = $_POST['content'];
      $headers = "From: ".$_POST['email'];

      if (mail($emailTo, $subject, $content, $headers)){
        $successMessage = '<div class="alert alert-success" role="alert">
  <strong>Your message has been sent!</strong> <p>We will get back to you very soon.
</p></div>';
      } else {
        $error = '<div class="alert alert-danger" role="alert"><strong>Your message couldn\'t be sent. Please try again.</strong></div>';
      }
    }

    
  };

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
        <h1>Contact Form</h1>

        <div id="error"><?php echo $error.$successMessage ?></div>

        <form method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
        
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="subject">
          </div>
        
          <div class="form-group">
            <label for="exampleTextarea">Please write your message here.</label>
            <textarea class="form-control" name="content" id="content" rows="4"></textarea>
          </div>

          <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script type="text/javascript">

    // client side validation
        $("form").submit(function(e){

        var error = "";

         if ($("#email").val() == "") {
          error+= "<p> The email field is required.</p>"
        }

        if ($("#subject").val() == "") {
          error+= "<p> The subject field is required.</p>"
        }

        if ($("#content").val() == "") {
          error+= "<p> The message field is required.</p>"
        }

        if (error != "") {
          $('#error').html('<div class="alert alert-danger" role="alert"><strong><p>' + error+'</p></strong></div>');
          return false;
        } else {
          return true;
        }

    }); 

      
  </script>

  
  </body>
</html>