<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Qlass - Quiz</title>
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
                            <li class="scroll-to-section"><a href="#" class="menu-item">Quiz</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Menu</a>
                                <ul>
                                    <li><a href="" class="menu-item">Students List</a></li>
                                    <li><a href="/dashguru">Back to Dashboard</a></li>
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
                            <h4 style="font-size: 25px; color: white;"><b>{{$kelas->nmKelas}}</b>
                                <p style="font-size: 12px; color: white;">Lecturer by {{$nmGuru}}</p>
                            </h4>
                            <p style="color: white;"><i class="fa fa-key" aria-hidden="true"></i> Code class {{$kelas->kodeKelas}}</p>
                            <p style="color: white;"><i class="fa fa-users" aria-hidden="true"></i> {{$kelas->kuotaKelas}} students</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($data_quiz as $quiz)
                

                <?php
                $tglquiz = date('d F Y', strtotime($quiz->tglQuiz));
                $wktmulai = date('H.i', strtotime($quiz->wktMulaiQuiz));
                $wktselesai = date('H.i', strtotime($quiz->wktSelesaiQuiz));
                $diff = strtotime($quiz->wktSelesaiQuiz) - strtotime($quiz->wktMulaiQuiz);

                if($diff<=3600){
                    $menit = $diff/60;
                    $jarak = $menit.' minutes';
                }else{
                    $jam = floor($diff/3600);
                    $menit = ($diff % 3600)/60;
                    $jarak = $jam.' hours '.$menit.' minutes';
                }
                

                $tgldibuat = date('d F Y', strtotime($quiz->tgldibuatQuiz));

                $pelaksanaan1 = $tglquiz.' '.$wktmulai;
                $pelaksanaan2 = $tglquiz.' '.$wktselesai;
                if($sekarang<$pelaksanaan1){
                    $nilai = 0;
                }elseif(($sekarang>=$pelaksanaan1) && ($sekarang<=$pelaksanaan2)){
                    $nilai = 1;
                }elseif($sekarang>$pelaksanaan2){
                    $nilai = 2;
                }
                ?>
                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            @if ($quiz->tipeQuiz=='Listening' || $quiz->tipeQuiz=='Reading' || $quiz->tipeQuiz=='Speaking')
                                <h4 style="font-size: 16px;">
                                    @if ($nilai == 0)
                                    {{$quiz->tipeQuiz}} - {{$quiz->judulQuiz}}
                                    @else
                                    <a href="/searchquiz/{{$quiz->idQuiz}}">{{$quiz->tipeQuiz}} - {{$quiz->judulQuiz}}</a>
                                    @endif
                                    <p style="font-size: 12px;">Created at {{$tgldibuat}}</p>
                                </h4>
                            @else
                                <h4 style="font-size: 16px;">
                                    @if ($nilai == 0)
                                    {{$quiz->tipeQuiz}} - {{$quiz->judulQuiz}}
                                    @else
                                    <a href="/quizzes/{{$quiz->idQuiz}}/detail">{{$quiz->tipeQuiz}} - {{$quiz->judulQuiz}}</a>
                                    @endif
                                    <p style="font-size: 12px;">Created at {{$tgldibuat}}</p>
                                </h4>
                            @endif
                            <p style="font-size: 14px;"> Held on {{$tglquiz}}</p>
                            <p style="font-size: 14px;"> {{$wktmulai}} - {{$wktselesai}} ({{$jarak}})</p>
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