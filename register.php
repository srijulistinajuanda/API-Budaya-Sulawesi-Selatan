<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>API BUDAYA</title>
    
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
<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <h3 class="mb-5">Register</h3>
              <form action="aksi_register.php" method="POST" enctype="multipart/form-data">
              <div class="form-outline mb-4">
                <input type="text" name="uname" class="form-control form-control-lg" />
                <label class="form-label" for="loginName">Username</label>
              </div>
  
              <div class="form-outline mb-4">
                <input type="password" id="loginPassword" name="pwd" class="form-control form-control-lg" />
                <label class="form-label" for="loginPassword">Password</label>
              </div>
  
              <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Register</button>
              <div class="text-center">
                </br>
                <p>Punya akun? <a style="text-decoration:none" href="login.php">Login</a></p>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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