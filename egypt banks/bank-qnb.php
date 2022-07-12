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
	 <img src="images/QNB  part/WhatsApp Image 2022-06-27 at 9.01.06 PM (1).JPEG" class="rounded-circle part-imag">
	
		 <img src="images/QNB  part/WhatsApp Image 2022-06-27 at 9.01.06 PM (2).JPEG" class="rounded-circle part-imag">
		 <img src="images/QNB  part/WhatsApp Image 2022-06-27 at 9.01.06 PM (3).JPEG" class="rounded-circle part-imag">
		<img src="images/QNB  part/WhatsApp Image 2022-06-27 at 9.01.06 PM.JPEG" class="rounded-circle part-imag">
		<img src="images/QNB  part/WhatsApp Image 2022-06-27 at 9.01.07 PM.JPEG" class="rounded-circle part-imag">
		
	</div>
	</section>
    <section class="container bank-description">
        <h1>عن بنك قطر الوطني</h1>

        <p> هو واحد من المؤسسات المالية الرائدة في مصر التي تم تأسيسها في أبريل ١٩٧٨ ، وتم تصنيفه كثاني أكبر
            بنك خاص في مصر .</p><br>

        <p>يقدم البنك خدماته لأكثر من 1,333,781 عميل يخدمهم أكثر من 6,970 مصرفي متخصص من خلال شبكه فروع تغطى كافة
            محافظات مصر تصل الى اكثر
            من 231 فرع بالإضافة إلى شبكة ممتدة من 872 جهاز صراف آلي وأكثر م ن 62,234 نقطة بيع لخدمة العملاء، علاوة على
            ذلك، تعمل خدمة العملاء المميزة(
            مركز الاتصال )على مدار الساعة 7 أيام في الأسبوع .</p><br>

        <p>أنشأ البنك عددا من الشركات التابعة في مجالات متخصصة مثل الأهلي للتأجير التمويلي والتي تأسست في عام 1997
            كواحدة من أوائل الوافدين لسوق
            التأجير التمويلي المصري. تم تأسيس الأهلي لتأمينات الحياة في عام 2003 لتوفير مجموعة متنوعة من المنتجات
            لتلبية احتياجات العملاء للتأمين على
            الحياة والادخار. الأهلي للتخصيم تأسست عام 2012 كمؤسسة مالية تشارك في جميع أنواع خدمات التخصيم المحلية
            والدولية .</p><br>

        <p>نجح بنك القطري الأهلي في الحفاظ على مكانته في السوق المصري مما ساعده على تحقيق نمو ملحوظ في محفظة القروض
            والودائع، نمو حصة السوق، زيادة
            العائدات، والحفاظ على جودة الأصول السليمة ونسب التكلفة، ويأتي هذا نتيجة لاستراتيجيته في أن يبقي شريكا تجاريا
            ملتزما لعملائه في جميع الأوقات من خلال
            سياسات متوازنة لمواجهة التحديات الراهنة. وكلها تهدف إلى بقاء البنك الخيار الأول للعملاء من خلال خدمة عملاء
            مميزة .</p><br>

        <p>يولي البنك القطري الأهلي الكثير من الاهتمام لكيفية الوصول إلى عملائه الكرام مع ضمان السهولة والاحترافية في
            التعامل، كما أنه يسعي دائما الي توسيع نطاق خدماته
            من خلال تمديد شبكة الفروع.</p><br>

        <p>يقدم البنك منتجات مخصصة في مجال الشركات، الاستشارات المالية، تمويل المشروعات، تمويل التجارة، إدارة النقد،
            وتغيير العملات الأجنبية. ومن خلال هذه
            الخدمات التنافسية تمكن البنك القطري الأهلي من إقامة ر وابط قوية مع مختلف عملاء الشركات سواء الشركات المحلية
            الكبيرة، الشركات التابعة متعددة الجنسيات،
            الشركات المتوسطة، وكذلك الشركات الصغيرة والمتوسطة.</p><br>

        <p>تمكن البنك القطري الأ هلي من الاستفادة من مكانته الرائدة لتقديم خدمة مصرفية على مستوى عالمي. قام البنك بتبني
            سوق مخصص فر يد من نوعه ليكون قادر علي
            هيكلة المنتجات والحلول التي تلبي جميع احتياجات ومتطلبات كل قطاع مع نهج شخصي ومجموعة واسعة من المنتجات .</p>
        <br>

        <p>اعتمد البنك القطري الأهلي على ثقته ف ي قوة قطاع الشركات الصغيرة والمتوسطة في دفع النمو وتحقيق التنمية
            المستدامة، ويعطي
            هذا القطاع نفس القدر من الأهمية لدعم
            عملائه من الشركات الصغيرة والمتوسطة.</p><br>

        <p>أصبح البنك القطري الأهلي الأداة المفضلة للممولين متعددي الأطراف لتوزيع الائتمان بين الشركات والشركات الصغيرة
            بالإضافة البرامج المقدمة والتي تهدف الى
            تمكين المرأة في برامج الأعمال.</p><br>

        <p>ومن الجدير بالذكر أن بنك البنك القطري الأهلي قد حصل على 42 جائزة خلال الاربعة أعوام الماضية من مؤسسات دولية
            وهي جلوبال بانكنج اند فاينانس، البنك
            الأوروبي لإعادة الإعمار والتنمية، كابيتال فاينانس الدولية، إنترناشونال فاينانس الدولية، ومؤسسة إيميا
            فاينانس.</p><br>

        <p>في إطار الاهتمام المستمر لبنك القطري الأهلي بالمشاركة في مختلف محاور الخدمة المجتمعية قام مصرفنا بالتعاون مع
            عدد من مؤسسات العمل المجتمعي في
            العديد من المبادرات والمشروعات التي تهدف إلى دعم القطاعات الأكثر احتياجا في المجتمع.</p><br>

        <p>من خلال كل ما سبق، فإن البنك القطري الأهلي يسعى إلى توظيف جودته وموارده المبتكرة لدعم الاقتصاد المصري
            والمساعدة في تطويره من خلال التوسع الدائم في
            الخدمات المالية والشمول المالي .</p><br>


        <h1>انواع حسابات البنك</h1>

        <h2>حساب توفير يوماتي</h2>
        <h3>المزايا والخصائص</h3>
        <ul>
            <li>نوع العائد: يومي -</li>
            <li>الحد الأدنى لفتح الحساب واحتساب بالعائد 50,000 جنية -</li>
            <li>يختلف العائد باختلاف المبلغ المودع، كما يلي -</li>
            <p class="tab">من 50 الف الي 100 الف النسبة 2.5</p>
            <p>من 100 الف الي 500 الف النسبة 2.75</p>
            <p>من 500 الف الي مليون جنية النسبة 3.25</p>
            <p>من مليون الي 5 مليون جنية النسبة 5.50</p>
            <p>اكثر من 5 ملايين النسبة 7.0</p>
            <li>يتيح لك التمتع بعوائد تنافسية بالرغم من وجود حركات مستمرة على الحساب -</li>
            <li>إمكانية التعامل على حساباتك 24 ساعة، 7 أيام في الأسبوع باستخدام بطاقات فيزا -</li>
            <li>يمكنك متابعة حساباتك والقيام بعمليات مصرفية من خلال أي من الخدمات المصرفية الإلكترونية -</li>
            <li>يحتسب العائد على الرصيد اليومي الذي يتعدّى الحد الأدنى، ويُضاف شهريا إلى الحساب -</li>
        </ul> <br><br><br><br>

        <h2>حساب توفير بلس</h2>
        <h3>المزايا والخصائص</h3>
        <ul>
            <li>دورية صرف العائد: شهريا -</li>
            <li>الحد الأدنى لفتح الحساب 1000 جنية -</li>
            <li>يختلف العائد باختلاف المبلغ المودع، كما يلي -</li>
            <p>من الف الي 5 الاف النسبة 3.0</p>
            <p>من 5 الاف الي 50 الف النسبة 3.72</p>
            <p>من 50 الف الي 100 الف النسبة 4.0</p>
            <p>من 100 الف الي 500 الف النسبة 5.0</p>
            <p>من 500 الف الي مليون جنية النسبة 6.0</p>
            <p>من مليون جنية الي 5 مليون جنية النسبة 7.5</p>
            <p>اكثر من 5 مليون جنية النسبة 8.25</p>
            <li>الحد الأدنى لاحتساب العائد 1000 جنيه -</li>
            <li>لديك الفرصة لإضافة إيداعات جديدة إلى الرصيد الحالي للانتقال إلى شريحة أعلى، والتمتع بعائد وتغطية
                تأمينية أعلى -</li>
            <li>يتم إرسال كشف الحساب شهرياً، ربع سنوي، نصف سنوي أو سنوياً، طبقا لاحتياجاتك -</li>
            <li>إمكانية متابعة حساباتك والقيام بعمليات مصرفية من خلال أي من الخدمات المصرفية الإلكترونية -</li>
            <li>يتم احتساب العائد على أقل رصيد للحساب خلال الشهر -</li>
        </ul> <br><br><br><br>


        <h2>حساب سوبر توفير</h2>
        <h3>المزايا والخصائص</h3>
        <ul>
            <li>الحد الأدنى لفتح الحساب 5000 جنيه -</li>
            <li>دوري صرف العائد: سنويا -</li>
            <li>يختلف العائد باختلاف المبلغ المودع، كما يلي: من 5000 حتى مليون جنيه: 5.00 %، أكثر من مليو ن
                جنيه: 5.5 -</li>
            <li>الحد الأدنى لاحتساب العائد 5000 جنيه -</li>
            <li>يتم احتساب العائد على أقل رصيد للحساب خلال الشهر -</li>
            <li>يُحتسب العائد على أساس سعر الكوريدور المعلن من البنك المركزي المصري -</li>
            <li>يتم إرسال كشف الحساب شهريا، ربع سنوي، نصف سنوي أو سنويا، طبقا لاحتياجاتك -</li>
            <li>تابع حسابك ونفذ معاملاتك المصرفية من خلال مجموعة واسعة من الخدمات المصرفية -</li>
        </ul> <br><br><br><br>




        <h1>انواع كروت البنك</h1>

        <h2>بطاقة فيزا كلاسيك</h2>
        <img src="./images/qnb/classic-card.PNG" alt="classic card"><br><br>
        <ul>
            <li>يتيح البنك الأهلي الوطني QNB هذه البطاقة بحد ائتماني يبدأ من 6000 جنيها ويصل الى 15000 جنيها ويسمع
                البنك بفترات سماح عليها لمدة 57 يوما</li>
            <li>تقدم البطاقة بحد 100 % للمشتريات والسحب النقدي وبفائدة 2.1 % على السحب النقدي -</li>
        </ul> <br><br><br><br>


        <h2>بطاقة فيزا الذهبية</h2>
        <img src="./images/qnb/gold-card.PNG" alt="gold card"><br><br>
        <ul>
            <li>يتيح البنك الأهلي الوطني QNB بطاقة فيزا الذهبية بحد إئتماني ييدأ من 10000 جنيها ويصل الى 39999 جنيها
                بفترات سماح 57 يوما</li>
            <li>ويتم استخراج هذه البطاقة بمصروفات ادارية 250 جنيها وبحد 100 % على المشتريات وعلى السحب النقدي
                وبفائدة 2.55 على السحب الكاش</li>
        </ul> <br><br><br><br>


        <h2>بطاقة ماستر كارد ستاندرد</h2>
        <img src="./images/qnb/master-card.PNG" alt="master card"><br><br>
        <ul>
            <li>يقدم البنك الأهلي الوطني هذه البطاقة الائتمانية بمصاريف اصدار 150 جنيها ويضع عليها حد شهري
                للمشتريات يصل الى 100 % من قيمة الائتمانية للبطاقة</li>
            <li>كما يتيح البنك الأهلي الوطني على بطاقة ستاندرد 100 % على السحب النقد من الحد الائتماني وبعمولة
                سحب 2.5 % على الكاش</li>
        </ul> <br><br><br><br>


        <h2>بطاقة تيتانيوم</h2>
        <img src="./images/qnb/titanium-card.PNG" alt="titanium card"><br><br>
        <ul>
            <li>تقدم بطاقة تيتانيوم من البنك الأهلي الوطني بحد ائتماني يبدأ من 30000 ويصل الى 100000 جنيها
                بنوعية ماستر كارد</li>
            <li>يمكن استخراج البطاقة بمصروفات ادارية تصل الى 275 جنيها ومصروفات سنوية 200 جنيها تقدم البطاقة بنسبة
                100 % من الحد الائتماني شهريا وسحب نقدي 100 % وبعمولة 2.5 % علي السحب الكاش</li>
        </ul> <br><br><br><br>


        <h2>بطاقة فيزا البلاتينية</h2>
        <img src="./images/qnb/platinum-card.PNG" alt="platinum card"><br><br>
        <ul>
            <li>بطاقة فيزا البلاتينية من البنك الأهلي الوطني تقدم بحد ائتماني يبدأ من 40000 ويصل الى 150000
                جنيها بمصروفات ادارية 600 جنيها</li>
        </ul> <br><br><br><br>
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