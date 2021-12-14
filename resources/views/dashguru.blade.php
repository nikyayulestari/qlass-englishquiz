<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Qlass - Teacher's Dashboard</title>
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
                            <li class="scroll-to-section"><a href="#welcome" class="menu-item">Dashboard</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Menu</a>
                                <ul>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#createclass">Create New Class</a></li>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#editaccount">Account</a></li>
                                    <li><a href="#" class="menu-item" data-toggle="modal" data-target="#editpass">Security</a></li>
                                    <li><a href="" class="menu-item">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="/logout">Log Out</a></li>
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

    <!-- ***** Modal Masuk Start ***** -->
    <div class="modal fade" id="createclass" tabindex="-1" role="dialog" aria-labelledby="CreateClassTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="CreateClassTitle">Create a New Class</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/createclass" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" name="nmKelas" id="nmKelas" placeholder="Class Name" required="" style="font-size: 14px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="form-submit" class="btn btn-outline-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Modal Masuk End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                @foreach($data_kelas as $kelas)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item" style="text-align: left;">
                        <div class="features-icon">
                            <h4 style="font-size: 20px;">{{$kelas->nmKelas}}</h4>
                            <p><i class="fa fa-users" aria-hidden="true"></i> {{$kelas->kuotaKelas}} students</p>
                            <p><i class="fa fa-key" aria-hidden="true"></i> Code class {{$kelas->kodeKelas}}</p>
                            <a href="/dashguru/{{$kelas->idKelas}}" class="main-button">
                                Get In
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ** Modal Account Start ** -->
        <div class="modal fade" id="editaccount" tabindex="-1" role="dialog" aria-labelledby="editAccount" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAccount">Account Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/dashguru/updateaccount" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" name="nmGuru" id="nmGuru" value="{{$guru->nmGuru}}" required="" style="font-size: 14px;">
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
        <!-- ** Modal Account End ** -->

        <!-- ** Modal Security Start ** -->
        <div class="modal fade" id="editpass" tabindex="-1" role="dialog" aria-labelledby="editPass" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPass">Edit Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/dashguru/updatepass" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <input type="password" class="form-control" placeholder="Current Password" name="oldpass" id="oldpass" required="" style="font-size: 14px;">
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="password" class="form-control" placeholder="New Password" name="newpass" id="newpass" required="" style="font-size: 14px;">
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="password" class="form-control" placeholder="Re-enter New Password" name="newpass1" id="newpass1" required="" style="font-size: 14px;">
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
        <!-- ** Modal Security End ** -->

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