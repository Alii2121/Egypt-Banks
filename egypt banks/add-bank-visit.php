<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
	

    $msg = '';
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_id = $user_data['id'];
        $bank_name = $_POST['bank_name'];
        $client_phone = $_POST['client_phone'];
        $visit_date = $_POST['visit_date'];
        $visit_time = $_POST['visit_time'];
        $visit_details = $_POST['visit_details'];
		
		$user_id = $user_data['id'];

    $bank_visit_query = "select count(*)  from bank_visits where visit_time = '09 AM - 10 AM'";
    $bank_visit = mysqli_query($con, $bank_visit_query);
	$b = mysqli_fetch_row($bank_visit);
	//print_r($b[0]);die;
	
	 if($b[0] < '5') {

        $query = "insert into bank_visits (user_id,bank_name,client_phone,visit_date,visit_time,visit_details) values ('$user_id','$bank_name','$client_phone','$visit_date','$visit_time','$visit_details')";
        $result = mysqli_query($con, $query);

        if($result) {
            $msg = "Successfully added your Visit!";
        } else {
            $msg = "Error adding your Visit!";
        }
    }
	else{
		$msg = "Time is fully reserved!";
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
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Compare Banks
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="compare-certificates.php">Compare Bank
                                                    Certificates</a>
                                                <a class="dropdown-item" href="compare-cards.php">Compare Bank
                                                    Cards</a>
                                                <a class="dropdown-item" href="compare-accounts.php">Compare Bank
                                                    Accounts</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Client:
                                                <?php echo $user_data['user_name'] ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="logout.php">Logout</a>
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

    <section class="container">
        <h1>Add New Bank Visit</h1>
        <form method="post">
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
                    <label>Phone Number</label>
                    <input type="number" class="form-control" placeholder="Client Phone" name="client_phone" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>Visit Date</label>
                    <input type="date" placeholder="dd/mm/yy" class="form-control" name="visit_date" required>
                </div>
                <div class="col">
                    <label>Visit Time</label>
                    <select class="form-control mb-3" name="visit_time" required>
                        <option disabled selected value>Visit Time</option>
                        <option>09 AM - 10 AM</option>
                        <option>10 AM - 11 AM</option>
                        <option>11 AM - 12 PM</option>
                        <option>12 PM - 01 PM</option>
                        <option>01 PM - 02 PM</option>
                    </select>
                </div>
            </div>

            <textarea class="form-control mb-3" rows="5" name="visit_details" placeholder="Visit Details.."
                required></textarea>


            <button type="submit" class="btn btn-primary">Add Bank Visit</button>
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