<?php 
    session_start();
    $secretPassword = '12345';
    if ($_POST['password'] == $secretPassword && $_POST['login'] == $secretPassword) {
        $_SESSION['login'] = 'on';
        header('Location: admin.php');
    }
    else{
        header('Location: login.php');
    }
?>