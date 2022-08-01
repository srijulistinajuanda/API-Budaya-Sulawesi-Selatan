<?php

    session_start();

    if(!$_SESSION['uname']){
        header('Location: login.php');
    }
        // mengecek user pada database
        // koneksi database
        $servename = "localhost";
        $username = "root";
        $pwd = "";
        $dbname = "budayakita";

        // buat koneksi 
        $conn = new mysqli($servename, $username, $pwd, $dbname);
        // buat query
        $sql = "SELECT * FROM user";
        // eksekusi query
        $result = $conn->query($sql);
        $data = $result->fetch_array(MYSQLI_ASSOC);
        
?>
<html lang="en"> 
<head>
    <title>API Budaya</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootstrap Documentation Template For Software Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.svg"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="assets/fontawesome/js/all.min.js"></script>

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">

</head> 

<body>    
    <div class="page-header theme-bg-dark py-5 text-center position-relative">
      <div class="container">
        <h2 style="margin-top: 50px;" class="page-heading single-col-max mx-auto">Selamat Datang</h2>
        <h1><div class="page-intro single-col-max mx-auto"><?php echo $_SESSION['uname']; ?></div></h1><br/>
        <h1><div class="page-intro single-col-max mx-auto">Key Token anda : <?php echo json_encode($data["key_token"]); ?></div></h1>
        <h4><div class="page-intro single-col-max mx-auto"><a href="indexlog.html" style="text-decoration:none; color:white;">Click here to view documentation</a></div></h4>
      </div>
    </div><!--//page-header-->
       
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/plugins/smoothscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
    <script src="assets/js/highlight-custom.js"></script> 
    <script src="assets/plugins/simplelightbox/simple-lightbox.min.js"></script>      
    <script src="assets/plugins/gumshoe/gumshoe.polyfills.min.js"></script> 
    <script src="assets/js/docs.js"></script> 

</body>
</html>

