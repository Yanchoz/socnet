<?php
    
    include 'functions.php';
    $success = false;
    $email = $_REQUEST['email'];
    $code = $_REQUEST['code'];
    $pass = getPasswordByEmail($email);
    if($pass !== $code){
        header ("Location: http://localhost/socialNetwork/index.php");
        exit();
    }else{

        if(isset($_POST['submit'])){
            $user_id = getUserIdByEmail($email);        
            $repass = $_POST['repass'];
            $pass = $_POST['pass'];
            if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass))
            {
                if($pass == $repass)
                {
                    $pass = secured_hash($pass);
                    echo updatePassword($user_id,$pass);
                    $success = true;
                    
                }else{
                    echo "Passwords are not the same!";
                }
            }else{
                echo "To short password!";
            }
        }
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
                    <h1> Change password</h1>
                    <?php
                        if($success) echo "<p class ='not_mess'>Passwored changed.</p>";
                        $success = false;
                    ?>
                   <div class="form-group">
                        <label for="pwd">New password:</label>
                        <input type="password" class="form-control" id="pwd" name="pass">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Reenter new password:</label>
                        <input type="password" class="form-control" id="pwd" name="repass">
                    </div>
                    
                    <input type="hidden" name="email" value="<?php echo $email;?>" >
                    <input type="hidden" name="code" value="<?php echo $code;?>" >

                    <input type="hidden" >
                    <input type="submit" class="btn btn-default" name="submit">
                    <input type="submit" class="btn btn-default" name="back" value="Back">
                </form>
                </div><div class="col-sm-4"></div>
            </div>
        </div>
    </section>
</body>
</html>
