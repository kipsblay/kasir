<?php
    @ob_start();
    session_start();
    if(isset($_POST['proses'])){
        require 'config.php';

        $user = strip_tags($_POST['user']);
        $pass = Strip_tags($_POST['pass']);

        $sql = 'select member.*, login.user, login.pass
                from member inner join login on member.id_member = login.id_member
                where user =? and pass = md5(?)';
        $row = $config->prepare($sql);
        $row -> execute(array($user,$pass));
        $jum = $row -> rowCount();
        if($jum > 0){
            $hasil = $row -> fetch();
            $_SESSION['admin'] = $hasil;
            echo '<script>alert("Login Sukses")<;window.location="index.php"/script>';
        }else{
            echo '<script>alert("Login Gagal");history.go(-1);</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Kasirku</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>
<body>
    
</body>
</html>