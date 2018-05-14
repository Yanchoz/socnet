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
        <div class="jumbotron text-center">
          <h1>Home Page</h1> 
        </div>
        <div class="container">
            <div class="row">
                <div class="jumbotron text-center col-sm-5" style="background:#e5f7ff;">
                    <?php
//                        include 'LogInSignUp/login.php';
                    ?>
                    <h3><a href="http://localhost/socialNetwork/LogInSignUp/login.php">Log in</a></h3>
                </div> <div class="col-sm-2"></div>
                <div class="jumbotron text-center col-sm-5"  style="background:#ffe5f7">
                    <?php
//                       include 'LogInSignUp/signup.php';
                    ?>
                    <h3><a href="http://localhost/socialNetwork/LogInSignUp/signup.php">Sign Up</a></h3>
                </div>
            </div>
        </div>
    </section>
</body>
</html>