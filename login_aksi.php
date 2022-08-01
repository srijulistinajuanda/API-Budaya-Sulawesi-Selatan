<?php

    session_start();
        
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "budayakita";

    //connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Connection Check
    if ($conn->connect_error){
        die("Koneksi Gagal : " . $conn->connect_error);
    }

    //query
    $sql = "SELECT * FROM user where username = '$uname' and password = '$pwd'";
    //eksekusi query
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['uname'] = $uname;
        $_SESSION['pwd'] = $pass;
    
        header("Location: user_home.php");
    }else{
        echo "Username atau Password Salah!<br/>";
        echo "<a href='login.php'> Silahkan Ulangi Lagi</a>";
    }

    //echo $username;
    //echo $password;

?>