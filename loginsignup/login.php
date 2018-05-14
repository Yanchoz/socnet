                <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <section id="container" class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div><div class="col-sm-4">    
                <h1>Log In</h1>
                <form method='post' class='logIn' >
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"><a name="alert"></a>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="pass">
                    </div>
                    <input type="submit" class="btn btn-default" name="submit" value="Log in">
                    <a href="forgot_pass.php">Forgot your password?</a>
                    <input type="submit" class="btn btn-default" name="back" value="Back">
                </form>
                </div><div class="col-sm-4"></div>
            </div>
        </div>
    </section>
</body>
</html>


<?php
    if(isset($_POST['back'])){
        header ("Location: http://localhost/socialNetwork/index.php");
        exit();
    }
    if(isset($_POST['submit'])){
        include 'functions.php';
        include 'conect.php';
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];
       // $pass = secured_hash($pass_unhashed);
        
        if(empty($email)||empty($pass)){

            $message = "Not all necesery fields are field.";
            echo "Error - ".$message;

        }else{
            $email_pass = getPasswordByEmail($email);
            if(!($email_pass)){
                $message = "No user with such email are registered. Check your email or sign up <a href='http://localhost/socialNetwork/LogInSignUp/signup.php'>here</a>";
                echo "Error - ".$message;
            }else{
                
                if(!check_coincidence($email_pass,$pass)){
                    $message = "Your password is wrong.";
                    echo "Error - ".$message;
                }else{
                    $user_id = getUserIdByEmail($email);
                    if($user_id == 1){
                    // $_SESSION['user_id'] = $user_id;
                        header('location: http://localhost/socialNetwork/admin.php');
                    }else{
                     // $_SESSION['user_id'] = $user_id;
                        header('location: http://localhost/socialNetwork/logined.php');
                    }
                }   
            }
        }
    }
?>