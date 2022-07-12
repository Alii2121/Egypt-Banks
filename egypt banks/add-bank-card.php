<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    $msg = '';

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $bank_name = $_POST['bank_name'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $grace_period = $_POST['grace_period'];
        $expenses = $_POST['expenses'];

        $query = "insert into cards (bank_name,name,type,grace_period,expenses) values ('$bank_name','$name','$type','$grace_period','$expenses')";
        $result = mysqli_query($con, $query);

        if($result) {
            $msg = "Successfully added the Card!";
        } else {
            $msg = "Error adding the Card!";
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
        <h1>Add New Bank Card</h1>

        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col">
                    <label>Bank Name</label>
                    <select class="form-control mb-3" name="bank_name" required>
                        <option disabled selected value>Bank Name</option>
                        <option>NBE</option>
                        <option>QNB</option>
                        <option>CIB</option>
                        <option>BDC</option>
                        <option>Alex Bank</option>
                    </select>
                </div>
                <div class="col">
                    <label>Card Name</label>
                    <input type="text" class="form-control" placeholder="Card Name" name="name" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>Card Type</label>
                    <select class="form-control mb-3" name="type" required>
                        <option disabled selected value>Card Type</option>
                        <option>Credit Card</option>
                        <option>Debit Card</option>
                        <option>Charge Card</option>
                    </select>
                </div>
                <div class="col">
                    <label>Grace Period</label>
                    <select class="form-control mb-3" name="grace_period" required>
                        <option disabled selected value>Grace Period</option>
                        <option>1 Week</option>
                        <option>2 Weeks</option>
                        <option>1 Month</option>
                        <option>2 Months</option>
                    </select>
                </div>
            </div>

            <label>Card Expenses (in L.E)</label>
            <input type="number" class="form-control mb-3" placeholder="Card Expenses" name="expenses" required>

            <button type="submit" class="btn btn-primary">Add Bank Card</button>
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