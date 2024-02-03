<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Management Bimbel Prestasi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #9aa3b3;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar {
            background-color: #343a40 !important;
            padding-left: 15px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff;
        }

        .navbar-brand img {
            max-height: 50px;
            margin-right: 10px;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        #menu-toggle {
            color: #fff;
            position: fixed;
            right: 10px;
            top: 20px;
            transition: all 0.3s;
            z-index: 2;
        }

        .sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
            color: #999;
        }

        .sidebar-brand a {
            color: #999;
        }

        .sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        #wrapper.toggled #sidebar-wrapper {
            right: 0;
        }

        #sidebar-wrapper {
            position: fixed;
            top: 0;
            right: -250px;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            transition: all 0.3s;
            padding-top: 50px;
            z-index: 1;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #fff;
            padding: 10px;
            transition: color 0.3s;
        }

        .sidebar-nav li a:hover {
            background: #555;
            color: #fff;
            text-decoration: none;
        }

        .content-wrapper {
            margin-top: 50px;
            padding: 15px;
        }

        .rectangle-container-wrapper {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .rectangle-container {
            width: 360px;
            height: 227px;
            position: relative;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            margin-right: 20px;
        }

        .rectangle-image {
            max-width: 100%;
            max-height: 100%;
            margin-top: 10px;
        }

        .rectangle-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .rectangle-header i {
            margin-right: 5px;
            color: #007bff;
        }

        .rectangle-header-text {
            font-weight: bold;
            font-size: 14px;
        }

        .upload-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            padding: 5px 10px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('logo1.png') }}" alt="Logo">
                DASHBOARD - Aplikasi Management Bimbel Prestasi
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ Auth::user()->email }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">Level: {{ Auth::user()->role }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('actionlogout') }}"><i
                                    class="fa fa-power-off"></i> Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="#" id="menu-toggle">
                <div class="three-dots">
                    <i class="fas fa-bars"></i>
                </div>
            </a>
        </nav>

        <div id="wrapper" class="toggled">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            DASHBOARD
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-home" aria-hidden="true"></i> <span
                                style="margin-left:10px;">Beranda</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('create.blade') }}"> <i class="fa fa-bullhorn" aria-hidden="true"></i> <span
                                style="margin-left:10px;"> Pengumuman</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.index') }}"> <i class="fa fa-users" aria-hidden="true"></i> <span
                                style="margin-left:10px;"> Kelola User</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.create') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span style="margin-left:10px;"> Tambah User</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('paket.index') }}"> <i class="fa fa-cubes" aria-hidden="true"></i> <span
                                style="margin-left:10px;"> Kelola Paket</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('paket.create') }}"> <i class="fa fa-inbox" aria-hidden="true"></i> <span
                                style="margin-left:10px;"> Tambah Paket</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('transaksi.create') }}"> <i class="fa fa-credit-card" aria-hidden="true"></i> <span
                                style="margin-left:10px;"> Pembayaran</span> </a>
                    </li>
                </ul>
            </div>
            <div id="page-content-wrapper" class="content-wrapper">
                <!-- Your existing content goes here -->

                <!-- Container for the rectangles -->
                <div class="rectangle-container-wrapper">
                    <div class="rectangle-container">
                        <div class="rectangle-header">
                            <i class="fas fa-calendar fa-2x"></i>
                            <span class="rectangle-header-text">Jadwal</span>
                        </div>
                        @if(Auth::user()->role == 'Administrator')
                            <a class="btn btn-primary upload-button" href="{{ route('upload.blade') }}"><i
                                    class="fas fa-upload"></i> Unggah</a>
                        @else
                            <button class="btn btn-primary upload-button" onclick="downloadImage()"><i
                                    class="fas fa-download"></i> Unduh</button>
                        @endif
                        @if($schedule != "")
                            <img src="{{ $schedule['image'] }}" alt="Jadwal" class="rectangle-image" id="jadwalImage">
                            <a href="{{ asset('/schedules/'. explode('schedules/', $schedule['image'])[1]) }}"
                                download="{{asset('/schedules/'. explode('schedules/', $schedule['image'])[1]) }}"></a>
                        @endif
                    </div>

                    <!-- Rectangle-sisi-kanan content moved to a new rectangle-container -->
                    <div class="rectangle-container" id="rectanglePengumuman">
                        <div class="rectangle-header">
                            <i class="fas fa-list-alt fa-2x"></i>
                            <span class="rectangle-header-text">List Pembayaran</span>
                        </div>
                        <button class="btn btn-primary upload-button" onclick="downloadNewImage()"><i
                                class="fas fa-eye"></i> Lihat</button>
                        <img src="{{ asset('history.jpg') }}" alt="Rectangle Baru" class="rectangle-image"
                            id="rectangleBaruImage" style="width: 170px; height: 120px;">
                    </div>

                    <!-- Rectangle untuk bagian kanan -->
                    <div class="rectangle-container">
                        <div class="rectangle-header">
                            <i class="fas fa-calendar fa-2x"></i>
                            <span class="rectangle-header-text">Pengumuman</span>
                        </div>
                        @if(Auth::user()->role == 'Administrator')
                            <a class="btn btn-primary upload-button" href="{{ route('create.blade') }}"><i
                                    class="fas fa-upload"></i> Unggah</a>
                        @else
                            <button class="btn btn-primary upload-button" onclick="downloadImage()"><i
                                    class="fas fa-download"></i> Unduh</button>
                        @endif
                        <img src="{{ asset('pengumuman.jpg') }}" alt="Pengumuman" class="rectangle-image"
                            id="pengumumanImage"
                            style="width: 170px; height: 120px;">  
                    </div>
                </div>
            </div>
        </div>

        <script>
            function downloadImage() {
                var image = document.getElementById('jadwalImage');
                var link = document.createElement('a');
                link.href = image.src;
                link.download = 'cropped.jpg';
                link.click();
            }

            function downloadNewImage() {
                var image = document.getElementById('rectangleBaruImage');
                var link = document.createElement('a');
                link.href = image.src;
                link.download = 'rectangle_baru.jpg';
                link.click();
            }

            $(document).ready(function () {
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                    $("#sidebar-wrapper").toggleClass("sidebar-open");
                });
            });
        </script>
    </div>
</body>

</html>
