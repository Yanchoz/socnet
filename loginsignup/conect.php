<?php
    $server = 'localhost';
    $database = 'getmesocial_database';
    $username = 'root';
    $password = '';

    try{
        $pdo = new PDO("mysql:host=$server;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //echo "Connected successfully!";
    }catch(PDOException $e)
    {
        echo "Connection failed: ".$e->getMessage(); 
    }
    
?>