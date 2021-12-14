<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Qlass - Voice Note</title>
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
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#createvn">Create Question</a></li>
                                    <li><a href="" class="menu-item">Students Answer</a></li>
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

    <!-- ***** Modal Create VN Start ***** -->
    <div class="modal fade" id="createvn" tabindex="-1" role="dialog" aria-labelledby="CreateVNTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="CreateVNTitle">Create Question</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/createvn" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <p  style="font-size: 14px;">
                            <input type="text" class="form-control" name="tnyIsian" id="tnyIsian" placeholder="Questions here..." required="">
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
    <!-- ***** Modal Create VN End ***** -->


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
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($data_isian as $isian)
                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            <h4 style="font-size: 16px;">{{$isian->tnyIsian}}
                                <?php
                                    $jumlah = \App\FileQ::where('idIsian', $isian->idIsian)->count();
                                ?>
                                @if($jumlah>0)
                                <p style="font-size: 12px; margin-top: 15px;"><a href="#" data-toggle="modal" data-target="#hapusFile{{$isian->idIsian}}"><i class="fa fa-paperclip" aria-hidden="true"></i> {{$jumlah}} attachments</a></p>
                                @endif
                            </h4>
                            <p style="margin-top: 25px;">
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#editEssay{{$isian->idIsian}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#hapusEssay{{$isian->idIsian}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

     @foreach($data_isian as $isian)

    <!-- ** Modal Ubah Start ** -->
        <div class="modal fade" id="editEssay{{$isian->idIsian}}" tabindex="-1" role="dialog" aria-labelledby="editEssay{{$isian->idIsian}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEssay{{$isian->idIsian}}">Edit Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/questionisian/{{$isian->idIsian}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>
                            <input type="text" class="form-control" name="tnyIsian" id="tnyIsian" required="" style="font-size: 14px;" value="{{$isian->tnyIsian}}">
                        </p>
                        <p style="margin-top: 10px;">
                            <input type="file" class="form-control-file" name="nmFile" id="nmFile" style="font-size: 12px;">
                        </p>
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
        <div class="modal fade" id="hapusEssay{{$isian->idIsian}}" tabindex="-1" role="dialog" aria-labelledby="hapusEssay{{$isian->idIsian}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusEssay{{$isian->idIsian}}">Delete Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/questionisian/{{$isian->idIsian}}/delete" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <p style="font-size: 14px;">Are you sure want to delete this question?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="form-submit" class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ** Modal Hapus Quiz End ** -->

    <?php
    $data_file = \App\FileQ::where('idIsian', $isian->idIsian)->get();
    ?>
    
    <!-- ** Modal Hapus File Start ** -->
        <div class="modal fade" id="hapusFile{{$isian->idIsian}}" tabindex="-1" role="dialog" aria-labelledby="hapusFile{{$isian->idIsian}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusFile{{$isian->idIsian}}">Essay File</h5>
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
                                            <td style="font-size: 16px; text-align: center;"><a href="/fileannounce/{{$file->idFile}}/delete"><i class="fa fa-trash" aria-hidden="true" style="color: #f4813f;"></i></a></td>
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
        <!-- ** Modal Hapus File End ** -->

    @endforeach

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