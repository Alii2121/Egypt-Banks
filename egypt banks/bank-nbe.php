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
        <br><br><img src="./images/nbe/logo.PNG" alt="cards"><br><br>
        <section class="container bank-description">
	 <h1>شركاء</h1>
	 <div class="">
	 <img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.47 PM (1).JPEG" class="rounded-circle part-imag">
	
		 <img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.47 PM (2).JPEG" class="rounded-circle part-imag">
		 <img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.47 PM (3).JPEG" class="rounded-circle part-imag">
		<img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.47 PM (4).JPEG" class="rounded-circle part-imag">
		<img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.47 PM.JPEG" class="rounded-circle part-imag">
		<img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.48 PM (1).JPEG" class="rounded-circle part-imag">
		
		<img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.48 PM (2).JPEG" class="rounded-circle part-imag">
		<img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.48 PM (3).JPEG" class="rounded-circle part-imag">
		<img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.48 PM (4).JPEG" class="rounded-circle part-imag">
        <img src="images/nbe part/WhatsApp Image 2022-06-27 at 8.24.48 PM.JPEG" class="rounded-circle part-imag">

	</div>
	</section>
        <h1>البنك الأهلي المصري</h1>
        <p>يعد البنك الأهلي المصري أقدم وأعرق البنوك التجارية المصرية ، حيث أنشئ في 25 يونيو 1898 برأسمال مليون جنيه
            إسترليني ، وقد
            تطورت وظائف البنك وأعماله بشكل مستمر عبر تاريخه وفقا للتطورات الاقتصادية والسياسية التي مرت بها البلاد ، ففي
            الخمسينات من
            القرن الماضي تولى البنك القيام بوظائف البنوك المركزية ثم تفرغ بعد تأميمه في الستينات لأعمال البنوك التجارية
            مع استمرار قيامه
            بوظائف البنك المركزي في المناطق التي لا يوجد للأخير فروع بها ، فضلاً عن الاضطلاع منذ منتصف الستينات من القرن
            الماضي
            بإصدار وإدارة شهادات الاستثمار لحساب الدولة .
            وتمكن البنك خلال العام المالي 2019 / 2020 من تحقيق نتائج أداء غير مسبوقة ، حيث تخطى إجمالي المركز المالي 2
            تريليون جنيه في
            نهاية يونيو 2020 بمعدل نمو 23 % عن نهاية يون يو 2019 ، لتصل نسبة إجمالي أصول البنك 31.5 % من إجمالي أصول
            الجهاز
            المصرفي المصري ، واستمر المركز المالي للبنك في الارتفاع ليصل إلى نحو 2.5 تريليون جنيه في نهاية مارس 2021.
            وبلغت أرصدة الودائع نحو 1.6 تريليون جنيه في نهاية يونيو 2020 بمعدل نمو 36 % عن العام السابق تمثل نحو 34 % من
            إجمالي
            ودائع الجهاز المصرفي ، وذلك بفضل قيام البنك بتقديم مجموعة متنوعة من الأوعية الادخارية بالعملتين المحلية
            والأجنبية وذلك بأسعار
            فائدة جاذبة وتنافسية ، ولتقترب ودائع البنك من نحو 2 تريليون جنيه في نهاية مارس 2021 مما يعكس ثقة العملاء في
            البنك الأهلي
            المصري .
            كما قام البنك بتوفير العديد من الأنظمة التمويلية المميزة التي تلبى كافة الاحتياجات التمويلية اللازمة لكافة
            القطاعات الاقتصاد ية الرئيسية
            ، حيث بلغ إجمالي محفظة التجزئة المصرفية نحو 102 مليار جنيه في نهاية يونيو 2020 بزيادة قدرها 29 ملياراً عن
            العام السابق
            بمعدل نمو 40 % )تتضمن نحو 10 مليار جنيه ضمن مبادرة البنك المركزي المصري للتمويل العقاري لنحو 94 ألف عميل( ،
            وقد
            استمرت قروض التجزئة في الارتفاع لتصل إلى 130 مليار جنيه في نهاية مارس 2021.
            وفى قطاع تمويل الشركات الكبرى، قام البنك بدور فعال في تدعيم تمويل الانشطة الرئيسية للاقتصاد القومي ، حيث
            ارتفع إجمالي
            قروض الشركات الكبرى بمعدل نمو 32 % ليصل إجمالي المحفظة إلى نحو 542 مليار جنيه في نهاية يونيو 2020 ، ولتستمر
            في
            الارتفاع لتصل إلى 714.5 مليار جنيه في نهاية مارس 2021.
            وفي إطار مساندة البنك للمشروعات الصغيرة والمتوسطة بلغ إجمالي محفظة القروض المقدمة لهذه المشروعات نحو 77
            مليار جنيه في
            نهاية يونيو 2020 بمعدل نمو 33 % عن العام السابق بزيادة قدرها 19 مليار جنيه ، ولتبلغ 91 مليار جنيه في مارس
            2021.
            وقد ساهم ذلك في ارتفاع إجمالي القروض بمعدل نمو 33 % لتصل إلى نحو 720 مليار جنيه ، تمثل نحو 33 % من إجمالي
            القروض
            على مستوى الجهاز المصرفي ، وقد استمرت القروض في النمو لتصل إلى 935 مليار جنيه في نهاية مارس 2021.
            وقد أدت تلك الجهود لتسجيل البنك أرباح )قبل الضرائب( بلغت نحو 30.6 مليار جنيه ، وتحق يق صافي ربح بلغ نحو 13.1
            مليار جنيه
            خلال العام المالي 2019 / 2020.
            وقد نجح البنك في زيادة حقوق الملكية لتصل إلى نحو 122 مليار جنيه في نهاية يونيو 2020 بمعدل نمو 11.1 % مقارنة
            بنهاية يونيو
            2019 ، حيث قام البنك بزيادة رأس المال المدفوع ليصل إلى 50 مليار جنيه بزيادة قدرها 15 مليار جنيه عن نهاية
            العام المالي السابق .
            هذا ويعتبر البنك الأهلي المصري من أكبر البنوك المساهمة في مجال المسئولية المجتمعية ، وذلك لإيمانه بأهمية
            دوره في تحسين حياة
            المواطن المصري، وقد تركزت سياسة البنك على دعم قطاعي الصحة والتعليم ، وتطوير المناطق العشوائية ، ومكافحة
            الفقر وفك كرب
            الغارمين ، ورعاية ذوي الهمم ، بالإضافة إلى دعم الثقافة والمحافظة على التراث ، حيث بلغ إجمالي تبرعات البنك
            خلال العام المالي
            2019 / 2020 نحو 2.6 مليار جنيه بزيادة نسبتها 70 % عن العام المالي السابق، لتصل إجمالي مساهما ت البنك في هذا
            المجال إلى 8
            مليارات جنيه خلال 5 سنوات .
            وتتويجا لهذه الجهود حصد البنك الأهلى المصري جائزة أفضل بنك مصري في مجال الخدمات المصرفية للأفراد لعام 2020
            من
            مؤسسة Asian Banker العالمية ، كما منحته جائزة أفضل بنك على مستوى أفريقيا والشرق الأوسط في الحوالات
            الإلكترونية من
            الوكلاء .
            كما فاز البنك الأهلى المصري بلقب " بنك العام " في مصر لعام 2020 ، المقدمة من مجلة The Banker العالمية .
            وكان البنك قد حصل على 5 جوائز مقدمة من مجلة The European كأفضل بنك في المسئولية الإجتماعية بمصر ، وأفضل مزود
            للمعاملات المصرفية ، وأفضل بنك في مجال إقراض الشركات ، وأفضل بنك في التجزئة المصرفية ، وأفضل بنك في مجال
            الخدمات
            المصرفية الرقمية في مصر لعام 2020.
            هذا وقد حصد البنك الأهلي المصري جائزتي أفضل بنك في مصر ، وجائزة أفضل بنك في مجالات المسئولية المجتمعية على
            مستوى
            قارة أفريقيا مقدمة من مؤسس ة EMEA financeالعالمية .
            كما حصل البنك على جائزة البنك الأفضل في التحول الرقمي في مصر لعام 2020 من اتحاد المصارف العربية ، حيث تأتي
            تلك الجائزة
            انعكاسا لنجاح البنك في تفعيل خطط طموحة للتوسع في الخدمات الرقمية التي يقدمها البنك .
            كما أعلنت مجلة Global Finance العالمية عن حصول البنك الأهلى المصرى على جائزة أفضل مقدم لخدمات تمويل التجارة
            في السوق المصرفية المصرية .
            وفي إطار استمرار تطوير البنك لخدماته ومنتجاته المتنوعة بهدف تقديم خدمة متميزة للعملاء ، قام البنك بزيادة عدد
            ماكينات الصارف
            الآلى ATM وتحسين أماكن تواجدها في كافة أنحاء البلاد ليصل عددها إلى 4950 ماكينة ، بالإضافة إلى 214 ألف ماكينة
            POS في
            مارس 2021.
            وحرصا من البنك على نشر ثقافة الشمول المالي والتحول الرقمي ، فقد قام بتقديم العديد من الخدمات المصرفية عن
            طريق شبكة
            الانترنت ، لخدمة 2.3 مليون عميل من خلال الأهلي نت ، بالإضافة إلى 1.8 مليون عميل من خلال محفظة الفون كاش ،
            كما قام البنك
            بإفتتاح 23 فرع إلكتروني لتقليل حجم التعاملات النقدية في الأسواق .
            كما احتفظ البنك في مجال الريادة في إصدار بطاقات التجزئة المصرفية ، حيث بلغ عدد إجمالي البطاقات مسبقة الدفع
            7.4 مليون بطاقة
            ، وبلغ إجمالي عدد بطاقات الخصم المباشر 5.8 مليون بطاقة في مارس 2021.
            وفى مجال تنشيط ا لاستثمار وسوق الأوراق المالية يمتلك البنك عددا متميزا من صناديق الاستثمار التي تدعم سوق رأس
            المال المصري
            وتخدم شريحة متميزة من العملاء ، علاوة على تقديم خدمات الاستثمار من خلال التوسع في خدمات الحفظ المركزي
            والمتاجرة .
            ويستند البنك في تقديم خدماته إلى شبكة ضخمة من الفروع والمكاتب والوحدات المصرفية تبلغ 553 فرع ووحدة مصرفيه
            بالداخل )تخدم
            نحو 16.5 مليون عميل( تغطى كافة أنحاء البلاد ، إلى جانب تواجد خارجي فعال في معظم قارات العالم من خلال البنك
            الأهلي
            المصري )بالمملكة المتحدة( والبنك الأهلي المصري - الخرطوم )بالسودان( وفرعي البنك الأهلي المصري - بنيويورك
            )الولايات
            المتحدة الأمريكي( وشنغهاي )الصين( ، ومكاتب التمثيل في كل من جوهانسبرج )جنوب إفريقيا( ودبى )الإمارات العربية
            المتحدة(
            وأديس أبابا )أثيوبيا( ، بالإضافة إلي شركة البنك الاهلي المصري – مركز دبي المالي العالمي لتقديم الاستشارات
            المالية ، كما يضم
            البنك شبكة ضخمة من المراسلين في مختلف أنحاء العالم )أوروبا - الولايات المتحدة - إستراليا - كندا - الشرق
            الأقصى - أفريقيا -
            الخليج العربي( .
            ويحرص البنك الأهلي المصري دائما على تقديم أحدث الخدمات والمنتجات المصرفية المتطورة على أفضل وجه لعملائه
            الكرام، للحفاظ
            على ثقتهم الغالية وعلى ريادة البنك في السوق المصرفية المحلية</p> <br><br><br><br>



        <h1>الشركات التابعة</h1>
        <ul>
            <li>شركة الاهلى للصرافة.) هي أهم ذراع للبنك الاهلي لاستقرار سعرالصرف هو الهدف الرئيسى لإنشاء الأهلى للصرافة
                ليس تحقيق أرباح ولكن مساندة الدولة لتحقيق الاستقرار في سعر الصرف (</li>
            <li>شركة الاهلى كابيتال القابضة )وهي الذراع الإستثماري للبنك الذي يضم مساهمات البنك(</li>
            <li>الشركة المصرية لإدارة الأصول العقارية والإستثمار</li>
            <li>شركة الاهلى للتمويل العقارى</li>
            <li>شركة الاهلى للتأجير التمويلى</li>
            <li>شركة الاهلى للخدمات الطبية</li>
            <li>شركة الاهلى للاستصلاح وزراعة الاراضى</li>
            <li>نادي البنك الأهلي المصري الرياضي</li>
            <li>البنك الأهلي المصري الدولي</li>
        </ul>

        <br><br><img src="./images/nbe/cards.PNG" alt="cards"><br><br>

        <h1>أنواع الفيزا كارد البنك الأهلي</h1>
        <p>يوفر البنك الأهلي المصري عدة أنواع من بطاقات الائتمان بناءً على الامتيازات والمزايا التي يوفرها،
            وعلى هذا الأساس يتم استخراجها واستخدامها، وهذه الأنواع هي</p>

        <ul>
            <li>البطاقة مسبقة الدفع، يتم تقديم نسخة فقط من بطاقة الهوية، كما إنها لا تتطلب هذه البطاقة أي
                إجراءات، مثل فتح حساب مصرفي أو أي ضمان</li>
            <li>بطاقة الخصم المباشر، لاستخدام هذه البطاقة، يجب على العملاء فتح حساب “جاري أو ادخار”
                لدى البنك الأهلي المصري وهذا للحصول على هذه البطاقة</li>
            <li>بطاقة ائتمانية، من أجل الحصول على هذه البطاقة، يطلب البنك الأهلي المصري أي ضمان،
                مثل تحويل الراتب الشهري أو شهادة الاستثمار أو الإيداع</li>
            <li>كما تنقسم هذه البطاقة إلى 3 أنواع، “بلاتينية، وذهبية، وكلاسيكية”، وفيما يلي سيكون هناك
                وصف تفصيلي عن أنواع الفيزا كارد البنك الأهلي</li>
        </ul>

        <h2>البطاقة الائتمانية البلاتينية</h2>
        <p>تعد من الإصدارات التي يستخدمها البنك الأهلي المصري للبطاقات الائتمانية وتتميز بالعديد من
            المزايا كالآتي</p>

        <ul>
            <li>يمنح البنك الأهلي فترة سماح تصل إلى 57 يومًا للبطاقة البلاتينية دون دفع أي فائدة فقط على
                الشراء</li>
            <li>بالإضافة إلى إمكانية توفير هذه البطاقة للعملاء خدمة الرسائل القصيرة المجانية</li>
            <li>كما يمكن للعملاء الاستفادة الكاملة من حد ائتمان البطاقة البلاتينية في خدمات الشراء والسحب</li>
            <li>تقدم البطاقة معدل فائدة فريد للديون، والحد الأدنى للسداد هو 0.05 من اجمالي الرصيد</li>
            <li>بالإضافة إلى انه قد وفر البنك الأهلي المصري للبطاقة البلاتينية وظيفة إصدار بطاقتين
                إضافيتين مجانًا</li>
            <li>عند الشراء بالبطاقة البلاتينية، يمكن للعملاء مضاعفة فترة الضمان لجميع المنتجات، حتى 24
                شهرًا</li>
            <li>تقديم خدمات تأمين شاملة لمنع فقدان أو تلف البطاقة البلاتينية</li>
            <li>يمكن لعملاء البطاقة البلاتينية الاستمتاع بنصف النقاط المكتسبة من خلال برنامج “نقاط الأهلي”
                مقابل كل جنيه يتم شراؤه، يقدم نقطه ونصف</li>
            <li>وهذا بشرط أن يكون العميل قد حصل على قسائم تسوق بقيمة هذه النقاط من البنك</li>
        </ul> <br><br><br>



        <h2>البطاقة الائتمانية الذهبية</h2>
        <p>وهذه أيضًا من إصدارات البنك الأهلي المصري والتي تجلب العديد من الفوائد للعملاء وتتميز
            بالتالي</p>
        <ul>
            <li>توفر هذه البطاقة للمستخدمين فترة سماح تصل إلى 55 يومًا للشراء فقط</li>
            <li>يمكن لعملاء البطاقة الذهبية أيضًا استخدام حد الائتمان بالكامل عند شراء وسحب النقود</li>
            <li>سعر فائدة الدين الخاص والحد الأدنى للسداد 5 ٪ من إجمالي الرصيد</li>
            <li>كما يسمح البنك الأهلي لعملاء البطاقة الذهبية بإصدار بطاقة أخرى مجاناً</li>
            <li>بالإضافة إلى تقديم البنك الأهلي العديد من العروض والمزايا الخاصة لمستخدمي البطاقة
                الذهبية</li>
        </ul><br><br><br>



        <h2>البطاقة الائتمانية الكلاسيكية</h2>
        <ul>
            <li>على المستوى المحلي والدولي، تعتبر البطاقات الكلاسيكية الأكثر استخداماً بين بطاقات
                الائتمان، خاصةً عندما يتعلق الأمر بعمليات الشراء والسحب</li>
            <li>بالإضافة إلى أن فترة السماح للبطاقات الكلاسيكية تنطبق فقط على المشتريات، والتي تبلغ
                حوالي 55 يومًا</li>
            <li>كما يوفر البنك الأهلي لعملائه خدمة “الرسائل النصية” المجانية لهذه البطاقة</li>
            <li>كما يتيح البنك الأهلي لعملاء البطاقات الائتمانية بالاستفادة الكاملة من خطوط الائتما ن عند
                إجراء عمليات الشراء والسحب</li>
            <li>حيث أن معدل فائدة خاص، والحد الأدنى للسداد هو 5 ٪ فقط من إجمالي الرصيد</li>
            <li>كما يتمتع العميل بعروض ومزايا ومكافآت البنك الأهلي</li>
        </ul> <br><br><br><br>



        <h1>شروط فيزا البنك الأهلي المصري</h1>
        <p>قام البنك الأهلي المصري بوضع العديد من الشروط والإجراءات الخاصة بإصدار بطاقات
            الائتمان، ومن هذه الشروط والإجراءات التالي</p>
        <ul>
            <li>يجب أن يكون العميل حاملاً للجنسية المصرية أو إقامة أجنبية معتمدة</li>
            <li>خصص البنك الأهلي حد أدنى للعمر للعملاء، والحد الأدنى لسن البطاقة الأصلية هو 21 عامًا،
                والحد الأدنى لسن البطاقة الثان وية هو 18 عامًا</li>
            <li>نسخة من الرقم القومي للعميل</li>
            <li>استلام التسهيلات في سكن العميل غاز، ماء، كهرباء، هاتف</li>
            <li>تسجيل بيانات العميل في طلب إصدار بطاقة الائتمان البنكية</li>
            <li>شهادة راتب مقدمة من جهة العمل</li>
            <li>يتم تحديد الراتب كضمان للبطاقة، والحد الائتماني هو 3 إلى 5 أضعاف صافي الراتب
                الشهري</li>
        </ul>
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