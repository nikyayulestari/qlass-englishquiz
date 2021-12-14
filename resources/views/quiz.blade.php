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
                            <li class="scroll-to-section"><a href="/detailclass">Announcement</a></li>
                            <li class="scroll-to-section"><a href="#" class="menu-item">Quiz</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Menu</a>
                                <ul>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#createquiz">Create Quiz</a></li>
                                    <li><a href="" class="menu-item">Students List</a></li>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#editclass">Edit Class</a></li>
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

    <!-- ***** Modal Create Quiz Start ***** -->
    <div class="modal fade" id="createquiz" tabindex="-1" role="dialog" aria-labelledby="CreateQuizTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="CreateQuizTitle">Create a Quiz</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/createquiz" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" name="judulQuiz" id="judulQuiz" placeholder="Quiz Title" required="" style="font-size: 14px;">
                            </div>
                            <div class="form-group col-lg-12">
                                <select class="form-control" id="tipeQuiz" name="tipeQuiz" style="font-size: 14px;">
                                    <option value="" disabled selected>Choose quiz type here...</option>
                                    <option value="Grammar">Grammar</option>
                                    <option value="Vocabulary">Vocabulary</option>
                                    <option value="Listening">Listening</option>
                                    <option value="Speaking">Speaking</option>
                                    <option value="Reading">Reading</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="date" class="form-control" name="tglQuiz" id="tglQuiz" required="" style="font-size: 14px;" min="{{date('yy-m-d')}}">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <input type="time" class="form-control" name="wktMulaiQuiz" id="wktMulaiQuiz"required="" style="font-size: 14px;" value="00:00">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <input type="time" class="form-control" name="wktSelesaiQuiz" id="wktSelesaiQuiz" required="" style="font-size: 14px;" value="00:00">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="form-submit" class="btn btn-outline-primary">Share</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Modal Create Quiz End ***** -->

    <!-- ***** Modal Edit Class Start ***** -->
    <div class="modal fade" id="editclass" tabindex="-1" role="dialog" aria-labelledby="EditClassTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="EditClassTitle">Edit Class Detail</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/editclass" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" name="nmKelas" id="nmKelas" placeholder="Class Name" value="{{$kelas->nmKelas}}" required="" style="font-size: 14px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="form-submit" class="btn btn-outline-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Modal Edit Class End ***** -->

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
                ?>
                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            @if ($quiz->tipeQuiz=='Listening' || $quiz->tipeQuiz=='Reading' || $quiz->tipeQuiz=='Speaking')
                                <h4 style="font-size: 16px; color: black !important;">
                                    <a href="/search/{{$quiz->idQuiz}}">{{$quiz->tipeQuiz}} - {{$quiz->judulQuiz}}</a>
                                    <p style="font-size: 12px;">Created at {{$tgldibuat}}</p>
                                </h4>
                            @else
                                <h4 style="font-size: 16px;">
                                    <a href="/quiz/{{$quiz->idQuiz}}/detail">{{$quiz->tipeQuiz}} - {{$quiz->judulQuiz}}</a>
                                    <p style="font-size: 12px;">Created at {{$tgldibuat}}</p>
                                </h4>
                            @endif
                            <p style="font-size: 14px;"> Held on {{$tglquiz}}</p>
                            <p style="font-size: 14px;"> {{$wktmulai}} - {{$wktselesai}} ({{$jarak}})</p>
                            <p style="margin-top: 25px;">
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#editQuiz{{$quiz->idQuiz}}" alt="Edit Quiz"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#hapus{{$quiz->idQuiz}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    @foreach($data_quiz as $quiz)

    <!-- ** Modal Ubah Start ** -->
        <div class="modal fade" id="editQuiz{{$quiz->idQuiz}}" tabindex="-1" role="dialog" aria-labelledby="editQuiz{{$quiz->idQuiz}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editQuiz{{$quiz->idQuiz}}">Edit Quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/quiz/{{$quiz->idQuiz}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" name="judulQuiz" id="judulQuiz" value="{{$quiz->judulQuiz}}" required="" style="font-size: 14px;">
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="date" class="form-control" name="tglQuiz" id="tglQuiz" required="" style="font-size: 14px;" min="{{date('yy-m-d')}}" value="{{date('yy-m-d', strtotime($quiz->tglQuiz))}}">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <input type="time" class="form-control" name="wktMulaiQuiz" id="wktMulaiQuiz" required="" style="font-size: 14px;" value="{{$quiz->wktMulaiQuiz}}">
                            </div>
                            <div class="form-group col-lg-6 col-md-12">
                                <input type="time" class="form-control" name="wktSelesaiQuiz" id="wktSelesaiQuiz" required="" style="font-size: 14px;" value="{{$quiz->wktSelesaiQuiz}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="form-submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ** Modal Ubah End ** -->

        <!-- ** Modal Hapus Quiz Start ** -->
        <div class="modal fade" id="hapus{{$quiz->idQuiz}}" tabindex="-1" role="dialog" aria-labelledby="hapus{{$quiz->idQuiz}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapus{{$quiz->idQuiz}}">Announcement File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/quiz/{{$quiz->idQuiz}}/delete" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <p style="font-size: 14px;">Are you sure want to delete this announcement?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="form-submit" class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ** Modal Hapus Quiz End ** -->
    @endforeach

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