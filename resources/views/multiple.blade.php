<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Qlass - Multiple Choice</title>
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

    <script type="text/javascript">
        function correctAnswerChange(){
            $('#benarPilgan').empty();
            var newOption = $('<option value="" disabled selected>Choose Correct Answer</option>');
            $('#benarPilgan').append(newOption);
            var answerOp = ['#aPilgan','#bPilgan','#cPilgan','#dPilgan'];
            var i = 0;
            while(i<4){
                var isiOp = $(answerOp[i]).val();
                if(isiOp!=''){
                    $('#benarPilgan').append($('<option>', {
                        value: isiOp,
                        text: isiOp
                    }));
                }
                i++;
                //alert(isiOp);
            }
        }
    </script>

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
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#createmultiple">Create Question</a></li>
                                    <li><a href="" class="menu-item">Students Answer</a></li>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#editQuiz{{$quiz->idQuiz}}">Edit Quiz</a></li>
                                    <li><a href="" class="menu-item" data-toggle="modal" data-toggle="modal" data-target="#hapusQuiz{{$quiz->idQuiz}}">Delete Quiz</a></li>
                                    @if ($quiz->tipeQuiz=='Vocabulary' || $quiz->tipeQuiz=='Grammar')
                                    <li><a href="/quiz/details/">Back to Quiz</a></li>
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
                        <p>
                            <input type="text" class="form-control" name="tnyPilgan" id="tnyPilgan" placeholder="Questions here..." required="" style="font-size: 14px;">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="aPilgan" id="aPilgan" placeholder="Option A" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="bPilgan" id="bPilgan" placeholder="Option B" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="cPilgan" id="cPilgan" placeholder="Option C" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="dPilgan" id="dPilgan" placeholder="Option D" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
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
                @foreach($data_pilgan as $pilgan)
                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            <h4 style="font-size: 16px;">{{$pilgan->tnyPilgan}}
                                <p style="font-size: 12px;">Correct Answer <b>{{$pilgan->benarPilgan}}</b></p>
                            </h4>
                            <p style="font-size: 12px;">a. {{$pilgan->aPilgan}} <br>
                                b. {{$pilgan->bPilgan}} <br>
                                c. {{$pilgan->cPilgan}} <br>
                                d. {{$pilgan->dPilgan}}
                            </p>
                            <?php
                                $jumlah = \App\FileQ::where('idPilgan', $pilgan->idPilgan)->count();
                            ?>
                            @if($jumlah>0)
                            <p style="margin-top: 15px;"><a href="#" data-toggle="modal" data-target="#hapusFile{{$pilgan->idPilgan}}" style="font-size: 12px;;"><i class="fa fa-paperclip" aria-hidden="true"></i> {{$jumlah}} attachments</a></p>
                            @endif
                            <p style="margin-top: 15px;">
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#editPG{{$pilgan->idPilgan}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#hapusPG{{$pilgan->idPilgan}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    @foreach($data_pilgan as $pilgan)

    <!-- ** Modal Ubah Question Start ** -->
        <div class="modal fade" id="editPG{{$pilgan->idPilgan}}" tabindex="-1" role="dialog" aria-labelledby="editPG{{$pilgan->idPilgan}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPG{{$pilgan->idPilgan}}">Edit Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/questionpilgan/{{$pilgan->idPilgan}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>
                            <input type="text" class="form-control" name="tnyPilgan" id="tnyPilgan" required="" style="font-size: 14px;" value="{{$pilgan->tnyPilgan}}">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="aPilgan" id="aPilgan" value="{{$pilgan->aPilgan}}" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="bPilgan" id="bPilgan" value="{{$pilgan->bPilgan}}" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="cPilgan" id="cPilgan" value="{{$pilgan->cPilgan}}" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
                            <input type="text" class="form-control" name="dPilgan" id="dPilgan" value="{{$pilgan->dPilgan}}" required="" style="font-size: 12px;" onchange="correctAnswerChange()">
                        </p>
                        <p  style="margin-top: 10px;">
                            <select class="form-control" id="benarPilgan" name="benarPilgan" style="font-size: 12px;" required="">
                                <option value="" disabled selected>Choose Correct Answer</option>

                                <?php $benarPilgan =  $pilgan->benarPilgan;?>
                                @if ($pilgan->aPilgan==$benarPilgan)
                                <option value="{{$pilgan->aPilgan}}" selected="">{{$pilgan->aPilgan}}</option>
                                @else
                                <option value="{{$pilgan->aPilgan}}">{{$pilgan->aPilgan}}</option>
                                @endif

                                @if ($pilgan->bPilgan==$benarPilgan)
                                <option value="{{$pilgan->bPilgan}}" selected="">{{$pilgan->bPilgan}}</option>
                                @else
                                <option value="{{$pilgan->bPilgan}}">{{$pilgan->bPilgan}}</option>
                                @endif

                                @if ($pilgan->cPilgan==$benarPilgan)
                                <option value="{{$pilgan->cPilgan}}" selected="">{{$pilgan->cPilgan}}</option>
                                @else
                                <option value="{{$pilgan->cPilgan}}">{{$pilgan->cPilgan}}</option>
                                @endif

                                @if ($pilgan->dPilgan==$benarPilgan)
                                <option value="{{$pilgan->dPilgan}}" selected="">{{$pilgan->dPilgan}}</option>
                                @else
                                <option value="{{$pilgan->dPilgan}}">{{$pilgan->dPilgan}}</option>
                                @endif

                            </select>
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
        <!-- ** Modal Ubah Question End ** -->

        <!-- ** Modal Hapus Question Start ** -->
        <div class="modal fade" id="hapusPG{{$pilgan->idPilgan}}" tabindex="-1" role="dialog" aria-labelledby="hapusPG{{$pilgan->idPilgan}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusPG{{$pilgan->idPilgan}}">Delete Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/questionpilgan/{{$pilgan->idPilgan}}/delete" method="POST" enctype="multipart/form-data">
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
        <!-- ** Modal Hapus Question End ** -->

    <?php
    $data_file = \App\FileQ::where('idPilgan', $pilgan->idPilgan)->get();
    ?>
    
    <!-- ** Modal Hapus File Start ** -->
        <div class="modal fade" id="hapusFile{{$pilgan->idPilgan}}" tabindex="-1" role="dialog" aria-labelledby="hapusFile{{$pilgan->idPilgan}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusFile{{$pilgan->idPilgan}}">Multiple Choice File</h5>
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