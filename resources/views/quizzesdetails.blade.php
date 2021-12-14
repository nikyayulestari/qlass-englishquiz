<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Qlass - Quiz Details</title>
<!--

Lava Landing Page

https://templatemo.com/tm-540-lava-landing-page

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/templatemo-lava.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/owl-carousel.css')}}">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            Lava
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/class">Announcement</a></li>
                            <li class="scroll-to-section"><a href="/quizzes">Quizzes</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Menu</a>
                                <ul>
                                    <li><a href="" class="menu-item">Class Grade</a></li>
                                    @if ($nilai==2)
                                    <li><a href="" class="menu-item">Your Summary Grade</a></li>
                                    @endif
                                </ul>
                            </li>
                            
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item classtitle" style="text-align: left;">
                        <div class="features-icon">
                            <h4 style="font-size: 25px; color: white;"><b>{{$quiz->tipeQuiz}} - {{$quiz->judulQuiz}}</b>
                                <p style="font-size: 12px; color: white;">Created by {{$nmGuru}} at {{$tgldibuat}}</p>
                            </h4>
                            <p style="color: white;"><i class="fa fa-calendar-o" aria-hidden="true"></i> Held on {{$tglquiz}}</p>
                            <p style="color: white;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$wktmulai}} - {{$wktselesai}} ({{$jarak}})</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($data_soal as $soal)
                <?php $judulSoal = $soal->judulSoal; ?>
                @if ($judulSoal=='Multiple Choice')
                <?php $jumlahSoal = \App\Pilgan::where('idSoal',$soal->idSoal)->count(); ?>
                @elseif ($judulSoal=='Essay' || $judulSoal=='Arrangement')
                <?php $jumlahSoal = \App\Isian::where('idSoal',$soal->idSoal)->count(); ?>
                @endif

                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            <h4 style="font-size: 16px; margin-bottom: 0 !important;">{{$judulSoal}}
                                <p style="font-size: 12px;">{{$jumlahSoal}} Questions</p>
                            </h4>
                            @if ($nilai==1)
                            <p style="margin-top: 25px;">
                                @if ($judulSoal=='Multiple Choice')
                                <a href="/multiplequiz/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Take Quiz</a>
                                @elseif ($judulSoal=='Essay')
                                <a href="/essayquiz/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Take Quiz</a>
                                @elseif ($judulSoal=='Arrangement')
                                <a href="/arrangementquiz/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Take Quiz</a>
                                @endif
                            </p>
                            @elseif ($nilai==2)
                            <p style="margin-top: 25px;">
                                @if ($judulSoal=='Multiple Choice')
                                <a href="/multiplequiz/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Your Grade</a>
                                @elseif ($judulSoal=='Essay')
                                <a href="/essayquiz/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Your Grade</a>
                                @elseif ($judulSoal=='Arrangement')
                                <a href="/arrangementquiz/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Your Grade</a>
                                @endif
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- jQuery -->
    <script src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins -->
    <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/imgfix.min.js')}}"></script>

    <!-- Global Init -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>