<?php
    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        
        $apikey = md5($uname.$pwd);
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "budayakita";
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        $useraddquery = "INSERT INTO user(username, password, key_token) VALUES ('$uname', '$pwd', '$apikey')";
        $conn->query($useraddquery);
        
        header("Location: user_home.php");
    }else{
        echo '<script>alert("FATAL ERROR! You are not supposed to be here. Go anywhere else!")</script>';
        echo "<script>location.href = 'http://localhost/project';</script>";
    }
?>