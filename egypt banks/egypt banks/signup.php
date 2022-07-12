<?php
session_start();

    include("connection.php");
    include("functions.php");

    $error_msg = '';

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //something was posted
        $user_name = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        if($password !== $repassword) {
            $error_msg =  "Passwords didn't match, please try again.";
        } else {
            if(!empty($password) && !empty($user_name)) {
                //save to database
                $query = "insert into users (user_name,email,password,phone,user_role) values ('$user_name','$email','$password','$phone','client')";
                $result = mysqli_query($con, $query);
    
                if($result) {
                    $_SESSION['user_id'] = $user_name;
                    header('Location: index.php');
                } else {
                    $error_msg =  "username or email is already taken!";
                }
            } else {
                    $error_msg =  "Please enter some valid information";
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Egypt Banks</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>


    <header>
        <!-- header inner -->
        <div class="head_top">
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="index.php">
                                            <h1 class="logo-text">Egypt Banks</h1>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php"> Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="login.php">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="signup.php">Sign up</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
        </div>
    </header>

    <section style="margin-top: 100px;">
        <div class="container mt-3" style="max-width: 700px;">
            <h3>SIGN UP</h3>
            <form method="post">
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="User name" name="username" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Phone Number" name="phone" required>
                    </div>
                </div>

                <input type="email" class="form-control mb-3" placeholder="Email" name="email" required>

                <div class="row mb-3">
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="repassword"
                            required>
                    </div>
                </div>




                <button type="submit" class="btn btn-primary">Register</button>
                already have an account? <a href="login.php">login</a><br>
                <?php echo $error_msg ?>
            </form>
        </div>
    </section>

    <script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>

</html>