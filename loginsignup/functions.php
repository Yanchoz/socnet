<?php
    function getPasswordByEmail($email){
        include 'conect.php';
        $statement_user_id = "SELECT password FROM users WHERE email = :email";
        $result = $pdo->prepare($statement_user_id);

        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $pass = $row['password'];
            return $pass;
        }
    }

    function getUserIdByEmail($email){
        include 'conect.php';
        $statement_user_id = "SELECT user_id FROM users WHERE email = :email";
        $result = $pdo->prepare($statement_user_id);

        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();

        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $user_id = $row['user_id'];
            return $user_id;
        }
    }

    function updatePassword($user_id,$pass)
    {
        include 'conect.php';
        $statement_user_id = "UPDATE users SET password = :pass WHERE user_id = :user_id";
        $result = $pdo->prepare($statement_user_id);
        
        $result->bindParam(':user_id',$user_id,PDO::PARAM_INT);
        $result->bindParam(':pass',$pass,PDO::PARAM_STR);
        $result->execute();
        
    }
    
    function secured_hash($input){
        $output = password_hash($input, PASSWORD_DEFAULT);
        return $output;
    }

    function check_coincidence($hashed,$not){
        return password_verify($not, $hashed);
    }
?>