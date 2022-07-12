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
	 <img src="images/BDC partners/WhatsApp Image 2022-06-27 at 9.38.08 PM.JPEG" class="rounded-circle part-imag">
	
		 <img src="images/BDC partners/WhatsApp Image 2022-06-27 at 9.38.09 PM (1).JPEG" class="rounded-circle part-imag">
		 <img src="images/BDC partners/WhatsApp Image 2022-06-27 at 9.38.09 PM (2).JPEG" class="rounded-circle part-imag">
		<img src="images/BDC partners/WhatsApp Image 2022-06-27 at 9.38.09 PM (3).JPEG" class="rounded-circle part-imag">
		<img src="images/BDC partners/WhatsApp Image 2022-06-27 at 9.38.09 PM.JPEG" class="rounded-circle part-imag">
		
	</div>
	</section>
    <section class="container bank-description">
        <h1>بنك القاهرة</h1>

        <p>تأسس بنك القاهرة في عام 1952 ، وهو أحد أقدم وأكبر البنوك المصرية ، حيث يوفر لعملائه حزمة متكاملة ومتنوعة من
            الخدمات والمنتجات
            المصرفية المصممة خصيصًا لتلبية احتياجاتهم ، مما أدى بدوره إلى حصول البنك على العديد من الجوائز على مدار ستة
            عقود من العمل. ن جح
            بنك القاهرة في تحويل نفسه إلى مؤسسة مالية رائدة من خلال محفظته المتنوعة ، بما في ذلك الشركات الكبيرة
            والمتوسطة والصغيرة ومتناهية
            الصغر في السوق المصري. يتم تحقيق ذلك من خلال شبكتها المتنامية من الفروع وأجهزة الصراف الآلي المنتشرة في جميع
            أنحاء البلاد ،
            والفريق الذي يضم عددًا كبيرًا من مواهب القطاع المصرفي.
            من خلال شبكة من 246 فرعا ، و 1450 جهاز صراف آلي منتشرة في جميع أنحاء البلاد ، يخدم بنك القاهرة قاعدة عملاء
            ضخمة ومتنوعة لأكثر
            من 3 ملايين عميل. وهذا يشمل الشركات الكبرى والمؤسسات البارزة والعملاء ذوي الملاءة المالية العالية والعملاء
            الأفراد ، بما في ذلك مليون
            عميل مشترك في الخدمات الرقمية. تزويدهم بباقة من أفضل الخدمات والمنتجات المصرفية. كما يحرص البنك على مواصلة
            ريادته كمؤسسة
            مصرفية مفضلة للعملاء ، من خلال توسيع حزمة الخدمات المصرفية الرقمية ، وتحديث البنية التحتية للبنك وأنظمة
            التشغيل ، فضلاً عن تطوير
            نظام الحوكمة وفقًا لأفضل المعايير الدولية</p><br><br>

        <h2>خدمات بنك القاهرة</h2>
        <p>هناك مميزات كثيرة يتمتع بها البنك عن غيره من البنوك الأخرى، وتأتي على النحو التالي:
            يعمل البنك على الزيادة في النمو الاستثماري إلى جانب وجود توسعات في النطاق الاقتصادي. -
            توفير خاصية الخصوصية والأمان للعملاء إضافة إلى أنه يوفر المعاملات المصرفية والمالية بدقة وبسرعة كبيرة. -
            كما يتيح البنك بطاقة الائتمان الذهبية والتي يمكن أن يستخدمها العميل خلال عملية السحب والشراء داخل وخارج نطاق
            الجمهورية، ويوفر أيضًا الماستر كارد -
            والهدف منها هو التقسيط للعملاء.
            يقدم البنك كارت ميزة المدفوع مقدمًا وهذا للتسهيل على المستثمرين والعملاء كل التسهيلات الائتمانية، إلى جانب
            توفير ديبت كارد وهو كارت ميزة خاص -
            بالخصومات.
            تمويل المشروعات بجميع العملات سواء الدولية أو المحلية وهذا يرجع إلى حالة قطاع طالب التمويل. -
            يسمح البنك بتمويل الكثير من القطاعات الاقتصادية، فهو يقوم بتمويل المشروعات المتوسطة والصغيرة وأيضًا مشروعات
            متناهية الصغر</p><br><br>


        <h2>انواع بطاقات بنك القاهرة</h2>
        <h3>ماستركارد ستاندارد</h3>
        <img src="./images/cairo/standard.PNG" alt="card"><br><br>
        <p>وتتضمن مجموعة بطاقات الائتمان المقدمة من بنك القاهرة بطاقة ائتمان ماستركارد ستاندارد التي تقدم العديد من
            المزايا للعملاء بحد ائتماني يبدأ من 5000 جنية و
            يصل الي 8000 جنية</p><br><br><br><br>

        <h3>ماستركارد تيتانيوم</h3>
        <img src="./images/cairo/titanium.PNG" alt="card"><br><br>
        <p>وتتضمن مجموعة بطاقات الائتمان المقدمة من بنك القاهرة بطاقة ائتمان ماستركارد تيتانيوم التي تقدم العديد من
            المزايا للعملاء بحد ائتماني يبدأ من 10000 جنية و
            يصل الي 20000 جنية</p><br><br><br><br>

        <h3>فيزا الكلاسيكية</h3>
        <img src="./images/cairo/classic.PNG" alt="card"><br><br>
        <p>وتتضمن مجموعة بطاقات الائتمان المقدمة من بنك القاهرة بطاقة ائتمان فيزا الكلاسيكية التي تقدم العديد من المزايا
            للعملاء بحد ائتماني يبدأ من 3000 جنية و يصل
            الي 8000 جنية</p><br><br><br><br>

        <h3>فيزا الدهبية</h3>
        <img src="./images/cairo/gold.PNG" alt="card"><br><br>
        <p>وتتضمن مجموعة بطاقات الائتمان المقدمة من بنك القاهرة بطاقة ائتمان فيزا الدهبية التي تقدم العديد من المزايا
            للعملاء بحد ائتماني يبدأ من 8000 جنية و يصل الي
            50000 جنية</p><br><br><br><br>

        <h3>وورلد ايليت ماستركارد</h3>
        <img src="./images/cairo/elite.PNG" alt="card"><br><br>
        <p>وتتضمن مجموعة بطاقات الائتمان المقدمة من بنك القاهرة بطاقة ائتمان وورلد ايليت ماستركارد التي تقدم العديد من
            المزايا للعملاء بحد ائتماني يبدأ من 200000
            جنية و يصل الي مليون جنية</p><br><br><br><br>

        <h3>ارسنال تيتانيوم ماستركارد</h3>
        <img src="./images/cairo/arsenal.PNG" alt="card"><br><br>
        <p>وتتضمن مجموعة بطاقات الائتمان المقدمة من بنك القاهرة بطاقة ائتمان ارسنال تيتانيوم ماستركارد التي تقدم العديد
            من المزايا للعملاء بحد ائتماني يبدأ من 10000
            جنية و يصل الي 200000 جنية</p><br><br><br><br>

        <h3>بطاقة ايزي كارد مسبقة الدفع</h3>
        <img src="./images/cairo/eazy.PNG" alt="card"><br><br>
        <p>البطاقات الصادرة للأفراد ) 16 سنة على الأقل(
            يمكن للوالدين شراء ما يصل إلى خمس بطاقات لأنفسهم ولأطفالهم )من سن 10 سنوات وما فوق( وتجديد البطاقة بمبالغ
            لمنح الأطفال الشعور بالاستقلالية باستخدام
            البطاقة.
            لا حاجة لفتح حساب في بنك القاهرة لإصدار البطاقة.
            إصدار سريع للبطاقة لعملاء بنك القاهرة وغير عملاء بنك القاهرة حيث لا يحتاج إلى موافقة ائتمانية</p>
        <br><br><br><br>
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