<?php
    $success = false;
    include 'functions.php';
    if(isset($_POST['back'])){
        header ("Location: http://localhost/socialNetwork/index.php");
        exit();
    }
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $code = getPasswordByEmail($email);
        $link = "http://localhost/SocialNetwork/LogInSignUp/change_pass.php?email=$email&code=$code";
        $message = "Dear User, if you want to change your password follow link: $link . If not, ignore this message.";
        $from = "yanazinka@gmail.com";
        $subject = "Change your password";
        $subject = '=?windows-1251?B?'.base64_encode($subject).'?=';
        $headers = "From: $from\r\nReply-To: $from\r\nContent-type: text-plain charset=UTF-8\r\n";
    
        mail($email, $subject, $message, $headers);
        if(mail($email, $subject, $message, $headers))
        {$success = true;}
       
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/socialNetwork/CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <section id="container" class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div><div class="col-sm-4">
                <form method="post" >
                    <h1>Forgot your password?</h1>
                    
                    <?php
                    if($success) 
                    {
                        echo "<details>
                                  <summary>Check the message</summary>
                                  <p>$email  <br> $subject  <br>  $message   <br>   $headers <br>  $code <br> </p>
                                </details> ";
                        echo "<p class ='not_mess'>Message with instructions send to your e-mail.</p>";
                        $success = false;
                    }
                    ?>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"><a name="alert"></a>
                    </div>
                    <input type="submit" class="btn btn-default" name="submit">
                    <input type="submit" class="btn btn-default" name="back" value="Back">
                </form>
                </div><div class="col-sm-4"></div>
            </div>
        </div>
    </section>
</body>
</html>
