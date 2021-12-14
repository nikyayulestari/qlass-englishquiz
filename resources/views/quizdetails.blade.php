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
                            <li class="scroll-to-section"><a href="/detailclass">Announcement</a></li>
                            <li class="scroll-to-section"><a href="/quiz">Quizzes</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Menu</a>
                                <ul>
                                    <li><a href="" class="menu-item">Students Grade</a></li>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#editQuiz{{$quiz->idQuiz}}">Edit Quiz</a></li>
                                    <li><a href="" class="menu-item" data-toggle="modal" data-toggle="modal" data-target="#hapusQuiz{{$quiz->idQuiz}}">Delete Quiz</a></li>
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
                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            @if ($quiz->tipeQuiz=='Grammar')
                            <form action="/createsoal" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" onchange="judulSoalChange()" id="judulSoal" name="judulSoal" style="font-size: 14px;">
                                            <option value="" disabled selected>Create questions for this quiz here...</option>
                                            <option value="Multiple Choice">Multiple Choice</option>
                                            <option value="Essay">Essay</option>
                                            <option value="Arrangement">Arrangement</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="input-group">
                                            <button type="submit" class="main-button1 btn-block">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @elseif ($quiz->tipeQuiz=='Vocabulary')
                            <form action="/createsoal" id="myForm" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" onchange="judulSoalChange()" id="judulSoal" name="judulSoal" style="font-size: 14px;">
                                            <option value="" disabled selected>Create questions for this quiz here...</option>
                                            <option value="Multiple Choice">Multiple Choice</option>
                                            <option value="Essay">Essay</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="input-group">
                                            <button type="submit" class="main-button1 btn-block">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
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
                            <h4 style="font-size: 16px;">{{$judulSoal}}
                                <p style="font-size: 12px;">{{$jumlahSoal}} Questions</p>
                            </h4>
                            <p style="margin-top: 25px;">
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#hapus{{$soal->idSoal}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                @if ($judulSoal=='Multiple Choice')
                                <a href="/multiple/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Details</a>
                                @elseif ($judulSoal=='Essay')
                                <a href="/essay/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Details</a>
                                @elseif ($judulSoal=='Arrangement')
                                <a href="/arrangement/{{$soal->idSoal}}" id="form-submit" class="main-button1"><i class="fa fa-paper-plane" aria-hidden="true"></i> Details</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Modal Create Announce Start ***** -->
    <div class="modal fade" id="createmultiple" tabindex="-1" role="dialog" aria-labelledby="CreateMultipleTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="CreateMultipleTitle">Create Question</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/createmultiple" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <p  style="font-size: 14px;">
                            <input type="text" class="form-control" name="tnyPilgan" id="tnyPilgan" placeholder="Questions here..." required="">
                        </p>
                        <p  style="font-size: 14px; margin-top: 10px;">
                            <input type="text" class="form-control" name="aPilgan" id="aPilgan" placeholder="Option A" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="font-size: 14px; margin-top: 10px;">
                            <input type="text" class="form-control" name="bPilgan" id="bPilgan" placeholder="Option B" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="font-size: 14px; margin-top: 10px;">
                            <input type="text" class="form-control" name="cPilgan" id="cPilgan" placeholder="Option C" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="font-size: 14px; margin-top: 10px;">
                            <input type="text" class="form-control" name="dPilgan" id="dPilgan" placeholder="Option D" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="font-size: 14px; margin-top: 10px;">
                            <select class="form-control" id="benarPilgan" name="benarPilgan" style="font-size: 12px;" required="">
                                <option value="" disabled selected>Choose Correct Answer</option>
                            </select>
                        </p>
                        <p  style="font-size: 14px; margin-top: 10px;">
                            <input type="file" class="form-control-file" name="nmFile" id="nmFile" style="font-size: 12px;">
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="form-submit" class="btn btn-outline-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Modal Create Announce End ***** -->

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
                    <form action="/quiz/{{$quiz->idQuiz}}/updatequiz" method="POST" enctype="multipart/form-data">
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
        <div class="modal fade" id="hapusQuiz{{$quiz->idQuiz}}" tabindex="-1" role="dialog" aria-labelledby="hapusQuiz{{$quiz->idQuiz}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusQuiz{{$quiz->idQuiz}}">Announcement File</h5>
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

        @foreach ($data_soal as $soal)
        <!-- ** Modal Hapus Question Start ** -->
        <div class="modal fade" id="hapus{{$soal->idSoal}}" tabindex="-1" role="dialog" aria-labelledby="hapus{{$soal->idSoal}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapus{{$soal->idSoal}}">Delete Questions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/questions/{{$soal->idSoal}}/delete" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p style="font-size: 14px;">Are you sure want to delete this questions?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="form-submit" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- ** Modal Hapus Questions End ** -->
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