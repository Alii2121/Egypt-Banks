<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
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
    <section class="container bank-description">
	 <h1>شركاء</h1>
	 <div class="">
	 <img src="images/alex part/WhatsApp Image 2022-06-27 at 9.16.32 PM (1).JPEG" class="rounded-circle part-imag">
	
		 <img src="images/alex part/WhatsApp Image 2022-06-27 at 9.16.32 PM.JPEG" class="rounded-circle part-imag">
		 <img src="images/alex part/WhatsApp Image 2022-06-27 at 9.16.33 PM (1).JPEG" class="rounded-circle part-imag">
		<img src="images/alex part/WhatsApp Image 2022-06-27 at 9.16.33 PM.JPEG" class="rounded-circle part-imag">
		
		
	</div>
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

    <section class="container bank-description">
        <h1>بنك الاسكندرية</h1>

        <h3>بطاقة ليفربول بلاتينيوم للخصم المباشر</h3>
        <img src="./images/alex/liver.PNG" alt="platinum card"><br><br>
        <p>حد المشتريات اليومي داخل / خارج مصر١٠٠,٠٠٠ جم</p>
        <p>حد المشتريات الشهري داخل / خارج مصر٥٠٠,٠٠٠ جم</p>
        <p>الحد اليومي للسحب داخل مصر٢٠,٠٠٠ جم</p>
        <p>الحد الشهري للسحب خارج مصر١٠٠,٠٠٠ جم</p><br><br><br><br>
        <img src="./images/alex/hand.PNG" alt="platinum card"><br><br>

        <h2>حساب اليكس جو</h2>
        <h3>جوائز نقدية</h3>
        <p>احصل على ٥,٠٠٠ جم جائزة نقدية ربع سنوية بالإضافة الي ٥٠٠,٠٠٠ جم جائزة نقدية كبري سنوية</p>
        <p>أكثر من ٢٤٠ فائز طوال العام</p>

        <h3>باقة الحسابات والمنتجات البنكية</h3>
        <p>تتيح لك الباقة الحصول علي العديد من المنتجات البنكية بتكلفة موحدة تدفع مرة واحدة عند الاشتراك في الباقة</p>

        <h3>الخدمات و المنتجات المتاحة</h3>
        <p>بطاقة انسباير للخصم المباشر</p>
        <p>تطبيق الموبايل والإنترنت البنكي</p>
        <p>تطبيق محفظتي</p>

        <h3>خصائص الحساب</h3>
        <p>الحد الأدنى لفتح الحساب٥٠٠ جم</p>
        <img src="./images/alex/hand.PNG" alt="platinum card"><br><br>




        <h2>حساب بريميوم</h2>
        <h3>حساب جاري ذو عائد</h3>
        <p>حساب جاري ذو عائد شرائح يحتسب يوميا ويصرف شهريا لحساب العميل بدء من رصيد ١٠٠,٠٠٠ جم</p>
        <p>نقاط اليكس بوينت الترحيبية عند فتح الحساب</p>
        <p>على متوسط رصيد الحساب، تضاف ٥ نقاط اليكس بوينت شهرياً على كل ١,٠٠٠ جم</p>
        <p>بطاقة ائتمان إضافية مجانا</p>

        <h3>باقة الحسابات والمنتجات البنكية</h3>
        <p>تتيح لك الباقة الحصول على العديد من المنتجات البنكية بتكلفة موحدة تدفع مرة واحدة عند الاشتراك في الباقة</p>

        <h3>الخدمات والمنتجات المتاحة</h3>
        <p>بطاقة ليفربول البلاتينية للخصم المباشر</p>
        <p>تطبيق الموبايل والإنترنت البنكي</p>
        <p>تطبيق محفظتي</p>

        <h3>خصائص الحساب</h3>
        <p>الحد الأدني لفتح الحساب١٬٠٠٠ جم</p>
        <p>الحد الأدني لاحتساب العائد١٠٠٬٠٠٠ جم</p>
        <img src="./images/alex/hand.PNG" alt="platinum card"><br><br>




        <h2>حساب توفير بلس</h2>
        <h3>حساب توفير ذو عائد</h3>
        <p>حساب توفير ذو عائد شرائح تصاعدي يصرف شهريا لحساب العميل بدأ من رصيد ١٠٬٠٠٠ جم / ٥٠٠ دولار أمريكي</p>
        <p>تم تعديل سعر العائد على بعض الشرائح اعتبارا من ٢٠٢٠/١٢/٠١ </p>

        <h3>تأمين مجاني علي الحياة</h3>
        <p>يتم تغطية العميل بتأمين مجاني علي الحياة حتى ١٠,٠٠٠ جم مع إمكانية زيادة مبلغ التأمين*</p>
        <p>العملاء المؤهلين للتأمين العملاء من ١٨ الى ٦٤ عام*</p>

        <h3>باقة الحسابات والمنتجات البنكية</h3>
        <p>تتيح لك الباقة الحصول علي العديد من المنتجات البنكية بتكلفة موحدة تدفع مرة واحدة عند الاشتراك في الباقة</p>

        <h3>الخدمات و المنتجات المتاحة</h3>
        <p>بطاقة انسباير للخصم المباشر</p>
        <p>تطبيق الموبايل والإنترنت البنكي</p>
        <p>تطبيق محفظتي</p>

        <h3>خصائص الحساب</h3>
        <p>الحد الأدني لفتح الحساب٥٠٠ جم</p>
        <p>الحد الأدني لاحتساب العائد١٠٬٠٠٠ جم / ٥٠٠ دولار أمريكي</p>
        <p>الحد الأدني للحصول على التأمين المجاني١٠,٠٠٠ جم</p>
        <img src="./images/alex/hand.PNG" alt="platinum card"><br><br>




        <h2>حساب توفير المايكرو</h2>
        <h3>حساب توفير ذو عائد</h3>
        <p>حساب توفير ذو عائد يصرف نصف سنويا لحساب العميل بدأ من رصيد ٥٠٠ جم</p>
        <p>تم تعديل سعر العائد على بعض الشرائح اعتبارا من ٢٠٢٠/١٢/٠١ </p>

        <h3>الخدمات و المنتجات المتاحة</h3>
        <p>بطاقة انسباير للخصم المباشر</p>
        <p>تطبيق الموبايل والإنترنت البنكي</p>
        <p>تطبيق محفظتي</p>

        <h3>خصائص الحساب</h3>
        <p>الحد الأدني لفتح الحساب٥٠٠ جم</p>
        <p>الحد الأدني لاحتساب العائد٥٠٠ جم</p>
    </section>
	
	
</body>
<footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="cont">
                            <h3> <strong class="multi"> Egypt Banks</strong><br>
                                All Rights Reserved 2022
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="social_icon">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>