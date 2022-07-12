<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    $msg = '';
    $image = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $bank_name = $_POST['bank_name'];
        $treasury_num = $_POST['treasury_num'];
        $treasury_price = $_POST['treasury_price'];
        $type = $_POST['type'];
        $treasury_details = $_POST['treasury_details'];

        $target_dir = "uploads/";
        $target_file = $target_dir . time() . basename($_FILES["fileToUpload"]["name"]);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $image = time() . basename($_FILES["fileToUpload"]["name"]);
        $error_msg = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            $error_msg = "Sorry, there was an error uploading your file.";
        }

        $query = "insert into treasuries (bank_name,treasury_num,treasury_price,type,treasury_details,image,user_id) values ('$bank_name','$treasury_num','$treasury_price','$type','$treasury_details','$image',0)";
        $result = mysqli_query($con, $query);

        if($result) {
            $msg = "Successfully added the Treasury!";
        } else {
            $msg = "Error adding the Treasury!";
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
                                        <?php if($user_data && $user_data['user_role'] == 'client') { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php"> Home </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Add New Booking
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="add-bank-visit.php">Bank Visit</a>
                                                <a class="dropdown-item" href="book-bank-treasury.php">Bank Treasury</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="my-bookings.php"> My Bookings </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Banks Details
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="bank-nbe.php">National Bank Of Egypt</a>
                                                <a class="dropdown-item" href="bank-qnb.php">QNB</a>
                                                <a class="dropdown-item" href="bank-cib.php">CIB</a>
                                                <a class="dropdown-item" href="bank-bdc.php">BDC</a>
                                                <a class="dropdown-item" href="bank-alex.php">Bank of Alexandria</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Client:
                                                <?php echo $user_data['user_name'] ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php">Logout</a>
                                        </li>
                                        <?php } else if($user_data && $user_data['user_role'] == 'admin') { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php"> Home </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Add Bank Info
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="add-bank-treasury.php">Bank Treasury</a>
                                                <a class="dropdown-item" href="add-bank-certificate.php">Bank
                                                    Certificates</a>
                                                <a class="dropdown-item" href="add-bank-card.php">Bank Cards</a>
                                                <a class="dropdown-item" href="add-bank-account.php">Bank Accounts</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="all-bookings.php">All Bookings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Welcome Admin</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php">Logout</a>
                                        </li>
                                        <?php } else { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php"> Home </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="login.php">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="signup.php">Sign up</a>
                                        </li>
                                        <?php } ?>
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

    <section class="container">
        <h1>Add New Bank Treasury</h1>

        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label>Bank Name</label><br>
                <input type="text" class="form-control" placeholder="Bank Name" name="bank_name" required>
                <!-- <select class="form-control mb-3" name="required_talent" required>
                    <option disabled selected value>Required Talented</option>
                    <option>Photographer</option>
                    <option>Videographer</option>
                    <option>Actor</option>
                    <option>Actress</option>
                    <option>Scriptwriter</option>
                </select> -->
                <div class="col">
                    <label>Treasury Number</label>
                    <input type="number" class="form-control" placeholder="Treasury Number" name="treasury_num"
                        required>
                </div>
                <div class="col">
                    <label>Treasury Price</label>
                    <input type="number" class="form-control" placeholder="Treasury Price" name="treasury_price"
                        required>
                </div>
            </div>

            <textarea class="form-control mb-3" rows="5" name="treasury_details" placeholder="Treasury Details.."
                required></textarea>

            <label for="fileToUpload">Treasury Image (Required): </label>
            <input type="file" name="fileToUpload" class="mb-3" id="fileToUpload" required><br>

            <div class="form-check mb-1">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="type" value="For Rent">For Rent
                </label>
            </div>
            <div class="form-check mb-3 mb-5">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="type" value="For Sale">For Sale
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Add Bank Treasury</button>
            <?php echo $msg ?>
        </form>
    </section>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>