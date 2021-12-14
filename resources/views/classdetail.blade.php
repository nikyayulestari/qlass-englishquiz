<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Qlass - Class Details</title>
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
                            <li class="scroll-to-section"><a href="#" class="menu-item">Announcement</a></li>
                            <li class="scroll-to-section"><a href="/quiz">Quiz</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Menu</a>
                                <ul>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#createannounce">Create Announce</a></li>
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

    <!-- ***** Modal Create Announce Start ***** -->
    <div class="modal fade" id="createannounce" tabindex="-1" role="dialog" aria-labelledby="CreateAnnounceTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="CreateAnnounceTitle">Create an Announcement</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/createannounce" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" name="judulInfo" id="judulInfo" placeholder="Title" required="" style="font-size: 14px;">
                            </div>
                            <div class="form-group col-lg-12">
                                <textarea name="isiInfo" class="form-control" rows="4" id="isiInfo" placeholder="Your Announcement" style="background-color: rgba(250,250,250,0.3); font-size: 14px;"></textarea>
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
    <!-- ***** Modal Create Announce End ***** -->

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
                @foreach($data_info as $info)
                

                <?php
                $tgldibuat = date('d F Y', strtotime($info->tgldibuatInfo));
                ?>
                <div class="col-lg-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            <h4 style="font-size: 16px;">{{$info->judulInfo}}
                                <p style="font-size: 12px;">Created at {{$tgldibuat}}</p>
                            </h4>
                            <p style="font-size: 14px;">"{{$info->isiInfo}}"</p>
                            <p style="margin-top: 25px;">
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#editInfo{{$info->idInfo}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                <a href="#" id="form-submit" class="main-button1" data-toggle="modal" data-target="#hapus{{$info->idInfo}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    @foreach($data_info as $info)
    <!-- ** Modal Ubah Start ** -->
        <div class="modal fade" id="editInfo{{$info->idInfo}}" tabindex="-1" role="dialog" aria-labelledby="editInfo{{$info->idInfo}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editInfo{{$info->idInfo}}">Edit Announcement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/classinfo/{{$info->idInfo}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" name="judulInfo" id="judulInfo" value="{{$info->judulInfo}}" required="" style="font-size: 14px;">
                            </div>
                            <div class="form-group col-lg-12">
                                <textarea name="isiInfo" class="form-control" rows="4" id="isiInfo" style="background-color: rgba(250,250,250,0.3); font-size: 14px;"><?php echo $info->isiInfo; ?></textarea>
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

        <!-- ** Modal Hapus Info Start ** -->
        <div class="modal fade" id="hapus{{$info->idInfo}}" tabindex="-1" role="dialog" aria-labelledby="hapus{{$info->idInfo}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapus{{$info->idInfo}}">Announcement File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/classinfo/{{$info->idInfo}}/delete" method="POST" enctype="multipart/form-data">
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
        <!-- ** Modal Hapus Info End ** -->
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