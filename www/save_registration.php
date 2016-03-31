<?php
echo 'start saveReg';
 

include_once('../config.php');
echo 'a';
//echo DB_DATABASE;
$username = $_POST['username'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$timestamp = date('Y-m-d HH:mm:ss');
echo 'TS:  '.date('Y-m-d HH:mm:ss');
echo $pass1;
echo $pass2;

if ($pass1 == $pass2){
    //need host / user / passwd / DB
    echo 'sql  ';
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    echo DB_HOST, DB_USER, DB_PASS, DB_DATABASE;
    echo "salt  ";
    $encrypted_password = sha1($pass1.PW_SALT);
    echo 'salt2  ';
    echo $encrypted_password;
    $sql = "SELECT * FROM `users` WHERE `email` = $email";
    echo `email`; echo $email;
    echo $sql;
    $link->query($sql);
            if ( $email != 'email') {
            $sql = "INSERT INTO users (username, password, email, created, FK_gid) VALUES ('".$username."', '".$encrypted_password."', '".$email."', now(), '1')";
            echo $sql;
            $link->query($sql);
            echo ' sql2 ';
            $newid = mysqli_insert_id($link);
            echo ' sql3   ';
            echo $newid;        
            echo "Congratulations! You've registered.";   
            ////fwd to main login page
        header('Location: index.php');
            }else{
        header('Location: index.php?msg=cheat');
            echo "Cheat.";
            exit;
 }
}
?>