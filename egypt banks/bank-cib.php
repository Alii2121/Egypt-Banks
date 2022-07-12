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
	 <img src="images/cib part/WhatsApp Image 2022-06-27 at 8.26.22 PM (1).JPEG" class="rounded-circle part-imag">
	
		 <img src="images/cib part/WhatsApp Image 2022-06-27 at 8.26.22 PM.JPEG" class="rounded-circle part-imag">
		 <img src="images/cib part/WhatsApp Image 2022-06-27 at 8.26.23 PM (1).JPEG" class="rounded-circle part-imag">
		<img src="images/cib part/WhatsApp Image 2022-06-27 at 8.26.23 PM (2).JPEG" class="rounded-circle part-imag">
		<img src="images/cib part/WhatsApp Image 2022-06-27 at 8.26.23 PM.JPEG" class="rounded-circle part-imag">
		
	</div>
	<p>
	
	</p>
	<ul>
	 <li class="hed">2B</li>
            <li>التقسيط على 6 أشهر متاح لكل المنتجات </li>
            <li>التقسيط على 12 و 18 شهر متاح على بعض المنتجات المختارة -</li>
            <li>الحد األدنى لمعاملة التقسيط 500 جنية مصري -</li>
            <li>يجب أن تحتوي البطاقة على رصيد كاف لقيمة المعاملة بالكامل -</li>
			<li>اثناء عملية الدفع واطلب السداد على برنامج التقسيط CIB قدم بطاقة -
</li>   
        </ul> 
		<br>
		<ul>
		<li class="hed">Adidas</li>
            <li>هذا العرض غير صالح مع أي عرض آخر - </li>
            <li>الحد األدنى للمعاملة 500 جنيه في حالة التقسيط -</li>
            <li>يجب أن تحتوي البطاقة على رصيد كاف لقيمة المعاملة بالكامل -</li>
            <li>اثناء عملية الدفع و اطلب السداد على برنامج التقسيط CIB قدم بطاقة -</li>
			
        </ul> 
		
		<br>
		<ul>
		 <li class="hed">Al Araby Group</li>
            <li>هذا العرض غير صالح مع أي عرض آخر </li>
            <li>اثناء عملية الدفع و اطلب السداد على برنامج التقسيط CIB قدم بطاقة -</li>
            <li>يجب أن تحتوي البطاقة على رصيد كاف لقيمة المعاملة بالكامل -</li>
           
			
        </ul> 
		
		<br>
		<ul>
		<li class="hed">Hub Furniture </li>
            <li>هذا العرض غير صالح مع أي عرض آخر </li>
            <li>الحد األدنى للمعاملة 500 جنيه في حالة التقسيط -</li>
            <li>يجب أن تحتوي البطاقة على رصيد كاف لقيمة المعاملة بالكامل -</li>
            <li>اثناء عملية الدفع و اطلب السداد على برنامج التقسيط CIB قدم بطاقة -</li>
			
        </ul> 
		
		<br>
		<ul>
		<li class="hed">IKEA </li>
            <li>الحد األدنى لمعاملة التقسيط 500 جنية مصري</li>
            <li>يجب أن تحتوي البطاقة على رصيد كاف لقيمة المعاملة بالكامل -</li>
            <li>طلب السداد على برنامج التقسيط CIB قدم بطاقة -
ااثناء عملية الدفع و</li>
			
        </ul> 
	</section>
    <section class="container bank-description">
        <h1>بنك التجاري الدولي</h1>

        <p>يعد من أكبر بنوك القطاع الخاص المصري، يعمل على تقديم مجموعة واسعة ومتميزة من المنتجات
            والخدمات البنكية لعملائه من الأفراد وأصحاب الثروات والمؤسسات والشركات بمختلف أنواعها، يدبر البنك
            التجارى الدولى حلول مناسبة ونزيهة لكافة الاحتياجات المالية لعملائه وبرؤية خبيرة في سوق المال والاستثمار
            ونجح البنك التجاري الدولي أن يكون الاختيار الأول لأكثر من 500 شركة عاملة في مصر مقدما لهم أفضل الحلول
            المالية. يحافظ البنك على بقائه كأكثر البنوك التجارية تحقيقا للأرباح في مصر لأكثر من 35 عاما وذلك بفضل إدارته
            التي تتبنى أعلى معايير الشفافية والحوكمة بالإضافة إلى برامج التدريب المتميزة المقدمة للعاملين به، ويبلغ عدد
            العاملين فيه حوالي 6000 موظف</p><br><br><br><br>

        <h2>ستة معلومات من الواجب معرفتها عن بطاقة البنك التجاري الدولي</h2>
        <p>تعتبر بطاقة ميزة مسبقة الدفع للمرتبات الحكومية قد يتم إصدارها للقيام بتحويل مرتبات موظفي القطاع
            الحكومي، كما تعتبر هذه البطاقة هي من إحدى الحلول الذكية للعمل على تحويل المرتبات بالهيئات
            والمؤسسات الحكومية وذلك بعيدا عن قيمة الرواتب. كما أن مبلغ مصاريف إصدار وتجديد بطاقة ميزة
            مسبقة الدفع كارتي قد تبلغ قيمتها حوالي خمسة عشر جنيهًا فقط، كما تبلغ مصاريف إصدار وتجديد بطاقة
            ميزة مسبقة الدفع للمرتبات الحكومية مبلغ قدره عشرون جنيهًا. وتعتبر بطاقات ميزة هي واحدة من أحد
            المبادرات التي يقوم بإطلاقها المجلس القومي للمدفوعات. وذلك بهدف تعزيز الشمول المالي والعمل على
            دعم جهود الدولة للقيام بالتحول إلى مجتمع غير نقدي. وذلك عن طريق امتلاك منظومة دفع وطنية تعمل
            بإتاحة العملاء للقيام بالكثير. من المعاملات عبر آلية تحصيل إلكتروني من داخل جمهورية مصر العربية.
            كما قام البنك المركزي المصري بالإعلان عن القيام بإصدار بطاقات ميزة، في إطار استراتيجية العمل على
            التحول إلى مجتمع غير نقدي. والعمل على تعزيز الشمول المالي مما يعمل ذلك على تنمية قطاع المدفوعات
            الإلكترونية. وقد يستطيع الشخص الذي يحمل بطاقات ميزة، على الحصول على المدفوعات الخاصة بهم.
            وأيضًا القيام بإجراء المعاملا ت الإلكترونية والقيام بسداد مقابل الخدمات الحكومية، والرسوم، وصرف أنواع
            الدعم المختلفة والمتنوعة. كما أنه يستهدف البنك المركزي المصري بالعمل على إصدار عشرين مليون
            بطاقة دفع وطنية جديدة لمدة ثلاث سنوات. وقامت بالبدء بخمسة بنوك عاملة بالسوق المحلية، وذلك بإص دار
            البطاقة المدفوعة مقدمًا وهي ميزة. ويكون بشكل مجاني اعتبارًا من يوم الخميس أثنين من شهر مايو، ومن
            هذه البنوك: البنك الأهلي المصري، وبنك مصر. والبنك التجاري الدولي مصر، وبنك القاهرة، والبنك
            الزراعي المصري. للقيام بتوفير سبل الدفع الإلكتروني للمستحقات الحكومية، وذلك يكون لمدة ستة أشهر.
            كما يتم إصدار البنوك الخمسة التي تم ذكرها سابقا للبطاقات المدفوعة مقدمًا وبشكل مجاني، وفي القيام
            بالجهود. التي يبذلها القطاع المصرفي للعمل على دعم توجه الحكومة المصرية وذلك عند تعزيز الشمول
            المالي والعمل على التحول نحو مجتمع غير نقدي. وهذا يبدأ وقته مع بداية الوزارة المالية، ثم يقوم بتطبيق
            منظومة الدفع الإلكترونية في كل الجهات الحكومية وجميع أجهزة الدولة للقيام بسداد المواطنين مستحقات
            الجهات الحكومية المختلفة والمتنوعة، وذلك يكون باستخدام البطاقات الإلكترونية بكل أنواعها</p>

        <h2>عشرة مزايا بنكية يقدمها البنك التجاري الدولي لفتح حسابات التوفير</h2>
        <p>هناك الكثير من الأشخاص يقومون بالسؤال عن البنك المفضل في القيام بفتح حسابات بنكية لجميع العملاء .
            والقيام أيضًا على ادخار المبالغ المالية الخاصة بهم حتى يقوموا بتحقيق الكثير من المكاسب الما دية . وهذا هو
            الذي يبحثون عنه العملاء في الكثير من البنوك وهي الأفضلية بالمقارنة بين البنوك الأخرى المختلفة . ولهذا فيكون
            عملية البحث عن بنك للقيام بفتح حساب قد يعتبر أنها من الخطوات الأساسية للعملا ء
            كما أن البنك التجاري الدول ي cib, يعتبر من البنوك الكبرى في مصر والذي يتمتع بالكثير والكثير من المزايا
            مقارنة بالبنوك المنافسة وذلك بما يخص فتح حسابات التوفير والذي يكون متمتعًا بمميزات عالية وكثيرة ومنها</p>

        <h3>حساب عائد الأفراد</h3>
        <p>وهذا النوع من الحساب يكون حسابًا ذات عائد للأفراد الذين يريدون أن يصرفون العائد الخاص بهم بدوريات
            صرف تكون متغيرة. ويبدأ من أول خمسمائة جنيه للقيام بفتح الحساب، على أن يكون الحد الأدنى لفتح حساب
            توفير بالجنيه المصري. هو مبلغًا وقدره خمسة آلاف جنيهًا وذلك يكون بدوريات صرف العائد بالشكل الآتي</p>
        <h4>عائد يومي وعائد يومي تصاعدي</h4>
        <h4>عائد شهري</h4>
        <p>وهذا الحساب يتم حسابه بشكل يومي، كما يتم إضافة هذا الحساب بشكل شهري إلى الحساب. عائد شهري
            وعائد شهري تصاعدي: ويتم حساب هذا العائد الشهري بأقل رصيد شهري دائن، كما يتم إضافة هذا الحساب
            بصورة شهرية إلى الحساب أيضًا. عائد ربع سنوي وعائد ربع سنوي تصاعدي: وهذا النوع من الحساب بشكل
            شهري على أقل رصيد شهري دائن، كما يتم إضافة هذا الحساب إلى الحساب كل ربع سنوي أي كل ثلاث
            شهور</p>
        <h4>عائد ربع سنوي</h4>
        <p>وعائد ربع سنوي تصاعدي: وهذا النوع من الحساب بشكل شهري على أقل رصيد شهري دائن، كما يتم إضافة
            هذا الحساب إلى الحساب كل ربع سنوي أي كل ثلاث شهور</p>


        <h3>تسهيلات السحب</h3>
        <p>وهذه التسهيلات تكون خاصة في الإقراض وذلك بنسبة قد تصل إلى نسبة 0.09 من اجمالي الرصيد</p>

        <h3>حسابات التوفير</h3>
        <p>أما عن حسابات التوفير فهي تكون بالدولار، والجنيه الإسترليني، واليورو</p>
        <p>ويكون الحد الأدنى للرصيد لفتح هذا الحساب بمبلغًا قدره ألف دولار، وقد يتم حساب العائد بشكل يومي، ويتم
            إضافة هذا الحساب كل ثلاثة أشهر</p>

        <h3>السحب النقدي</h3>
        <p>أما عن السحب فإنه ن المستطاع للعميل أن يقوم بالسحب النقدي عند الطلب وذلك بنموذج سحب من أي فرع
            من فروع البنك التجاري الدولي
            ويكون ذلك بعملة الحساب نفسه أو ما يعادله، أو عن طريق الشبكة الواسعة التي قد تحتوي على أكثر من
            ستمائة ماكينة صراف آلي وذلك في جميع أنحاء الجمهورية</p> <br><br><br><br>


        <h1>مميزات فيزا مشتريات التجاري الدولي</h1>
        <ul>
            <li>يصل الحد الائتماني للبطاقة الائتمانية إلى 500 ألف جنيه مصري</li>
            <li>يمكنك الاستفادة من زيادة الحد اليومي للسحب والشراء من داخل مصر وخارجها دون حدود للمشتريات بالخارج</li>
            <li>سحب نقدي فوري</li>
            <li>توفير خيارات متعددة لتسدي د مستحقات البطاقة الائتمانية</li>
            <li>يمنحك البنك فترة سماح دون فائدة تصل إلى 55 يومًا</li>
            <li>إرسال رسالة مجانية بعد كل معاملة</li>
            <li>يمكنك الاختيار الذاتي للرقم السري</li>
            <li>تغطية الرصيد المدين بقيمة تصل إلى 500000 جنيه مصري</li>
            <li>كشف حساب شهري مجانًا</li>
            <li>إرسال رسالة مجانية للتذكير بميعاد السداد</li>
            <li>إمكانية استخدام بطاقة الائتمان في الخارج</li>
            <li>يمكنك الإيداع النقدي لحسابك من خلال ماكينات الصراف الآلي</li>
            <li>سحب ما تُريد من أموال من ماكينات الصراف الآلي أيضًا المتوفرة في جميع أنحاء جمهورية مصر العربية</li>
            <li>من الممكن أن تقوم بإيقاف البطاقات المفقودة عبر خدمة الإنترنت وتطبيق الهاتف المحمول</li>
            <li>التبرع لأية جمعية خيرية عبر الإنترنت</li>
        </ul>


        <h1>انواع بطاقات التجاري الدولي</h1>
        <h2>مميزات بطاقة بلاتينيوم</h2>
        <img src="./images/cib/platinum.PNG" alt="platinum card"><br><br>
        <ul>
            <li>إتاحة بطاقات إضافية مجانية</li>
            <li>دخول صالات الاستراحة ماستركارد بالمطارات</li>
            <li>حماية المشتريات</li>
            <li>سعر فائدة أقل</li>
            <li>إتاحة خدمة الطوارئ الخاصة بماستر كارد</li>
            <li>ما يصل إلى 80,000 نقطة هدية بقيمة 400 جنيه مصري</li>
            <li>توفير ثلاث نقاط مقابل كل 1 جنيه مصري في المشتريات</li>
        </ul> <br><br><br>


        <h2>مميزات بطاقة تيتانيوم</h2>
        <img src="./images/cib/titanium.PNG" alt="titanium card"><br><br>
        <ul>
            <li>إتاحة بطاقات إضافية مجانية</li>
            <li>سعر فائدة أقل</li>
            <li>ما يصل إلى 40000 نقطة هدية بقيمة 200 جنيه مصري</li>
            <li>دخول صالات الاستراحة ماستركارد بالمطارات</li>
            <li>إتاحة نقطتين مقابل كل جنيه مصري في المشتريات</li>
        </ul> <br><br><br>


        <h2>مميزات بطاقة جولد</h2>
        <img src="./images/cib/gold.PNG" alt="gold card"><br><br>
        <ul>
            <li>إتاحة بطاقات إضافية مجانية</li>
            <li>سعر فائدة أقل</li>
            <li>ما يصل إلى 20000 نقطة هدية بقيمة 100 جنيه مصري</li>
            <li>إتاحة نقطة مقابل كل جنيه مصري في المشتريات</li>
        </ul> <br><br><br>


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