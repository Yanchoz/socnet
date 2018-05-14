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
                <form method="post" class="signup">
                   <h1>Registration Form</h1>
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control"  name="name">
                    </div>

                <!--
                    <div class="form-group">
                        <label>Maiden name</label>
                        <input type="text" class="form-control" name="s_name">
                    </div>
                -->

                    <div class="form-group">
                        <label for="name">Last name</label>
                        <input type="text" class="form-control"  name="l_name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"><a name="alert"></a>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="pass">
                    </div>

                    <input type="submit" class="btn btn-default" name="submit" value="Submit">
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
        $name = filter_var($_POST['name'],FILTER_SANITIZE_SPECIAL_CHARS);
//        $s_name = filter_var($_POST['s_name'],FILTER_SANITIZE_SPECIAL_CHARS);
        $l_name = filter_var($_POST['l_name'],FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'],FILTER_SANITIZE_SPECIAL_CHARS);

        $pass_unhashed = filter_var($_POST['pass'],FILTER_SANITIZE_SPECIAL_CHARS);
        
       
        
        if(empty($name) or empty($l_name) or empty($email) or empty($pass_unhashed))
        {
             echo $message = "Not all necesery fields are field.";

        }else
        {
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass_unhashed))
            {
               echo $message = "Password: May contain letter and numbers. Must contain at least 1 number and 1 letter.
    May contain any of these characters: !@#$% ";

            }
            else
            {
                $pass = secured_hash($pass_unhashed);

                $user_exist_ver = getUserIdByEmail($email); // get user id
                if($user_exist_ver > 0){
                  $message = "User with this email already exists.";
                }
                else
                {
                        $signUp_statement = "INSERT INTO users (name, surname, email, password ) VALUES (:name, :l_name, :email, :pass)";
                        $result = $pdo->prepare($signUp_statement);
                        $result->bindParam(':name',$name,PDO::PARAM_STR);
                        $result->bindParam(':l_name',$l_name,PDO::PARAM_STR);
                        $result->bindParam(':email',$email,PDO::PARAM_STR);
                        $result->bindParam(':pass',$pass,PDO::PARAM_STR);

                        if($result->execute() == TRUE){
                           echo $message = "Registered!";
                        }else{
                           echo $message = "Data error";
                        }
//                    }
                }
            }
        }
    }
?>
