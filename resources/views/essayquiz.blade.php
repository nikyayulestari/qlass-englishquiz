<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Qlass - Essay</title>
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
                        <a href="/" class="logo">
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
                                    @if ($nilai==1)
                                    <li><a href="" class="menu-item">Submit</a></li>
                                    @elseif ($nilai==2)
                                    <li><a href="" class="menu-item">Your Grade</a></li>
                                    @endif
                                    @if ($quiz->tipeQuiz=='Vocabulary' || $quiz->tipeQuiz=='Grammar')
                                    <li><a href="/quizzes/details/">Back to Quiz</a></li>
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
                            <p style="color: white;"><i class="fa fa-tags" aria-hidden="true"></i> {{$soal->judulSoal}}</p>
                            <p style="color: white;"><i class="fa fa-question-circle" aria-hidden="true"></i> {{$jumlahSoal}} Questions</p>
                            <p style="color: white;"><i class="fa fa-calendar-o" aria-hidden="true"></i> Held on {{$tglquiz}}</p>
                            <p style="color: white;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$wktmulai}} - {{$wktselesai}} ({{$jarak}})</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <form action="/essaysubmit" method="GET" style="width: 100%;">
                    @foreach($data_isian as $isian)
                    <div class="col-lg-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <div class="features-item" style="text-align: left;">
                            <div class="features-icon">
                                <h4 style="font-size: 16px; margin-bottom: 5px;">{{$isian->tnyIsian}}</h4>
                                <?php
                                    $jumlah = \App\FileQ::where('idIsian', $isian->idIsian)->count();
                                ?>
                                @if($jumlah>0)
                                <p style="font-size: 12px;"><a href="#" data-toggle="modal" data-target="#downloadFile{{$isian->idIsian}}"><i class="fa fa-download" aria-hidden="true"></i> {{$jumlah}} attachments</a></p>
                                @endif

                                <p style="margin-top: 15px;"><input name="isiJawaban" type="text" placeholder="Your answer" required="" class="isiantext" style="background-color: rgba(250,250,250,0.3);">
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    @foreach($data_isian as $isian)

    <?php
    $data_file = \App\FileQ::where('idIsian', $isian->idIsian)->get();
    ?>
    
    <!-- ** Modal Download File Start ** -->
        <div class="modal fade" id="downloadFile{{$isian->idIsian}}" tabindex="-1" role="dialog" aria-labelledby="downloadFile{{$isian->idIsian}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="downloadFile{{$isian->idIsian}}">Multiple Choice File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                @foreach($data_file as $file)
                                {{csrf_field()}}
                                <div class="bordertable1">
                                    <table width="100%">
                                        <tr>
                                            <td width="90%" style="font-size: 12px;">{{$file->nmFile}}</td>
                                            <td style="font-size: 16px; text-align: center;"><a href="/fileannounce/{{$file->idFile}}/download"><i class="fa fa-download" aria-hidden="true" style="color: #f4813f;"></i></a></td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ** Modal Download File End ** -->

        @endforeach

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