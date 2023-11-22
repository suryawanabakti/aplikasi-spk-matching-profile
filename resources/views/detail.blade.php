<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Aplikasi Donasi Bencana Alam</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="#" class="navbar-brand sidebar-gone-hide">PROFILE - MATCHING | </a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i
                            class="fas fa-bars"></i></a>
                </div>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item active"><a href="#" class="nav-link">Home</a></li> --}}
                    </ul>
                </div>
                <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250" name="search">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item active"><a href="/login" class="nav-link">Login Sebagai Admin</a></li>


                </ul>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">

                        <li class="nav-item active">
                            <a href="/bencana" class="nav-link"><i class="fas fa-newspaper"></i><span> Berita</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                    class="fas fa-city"></i><span>Kabupaten / Kota</span></a>
                            <ul class="dropdown-menu" id="kabupaten">

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">


                    <div class="section-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="ml-5">{{ $rankings->kabupaten ?? null }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                @if ($rankings->kabupaten == 'KABUPATEN KEPULAUAN SELAYAR')
                                                    <img src="{{ asset('slide/selayar2.png') }}" class="d-block"
                                                        height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN BULUKUMBA')
                                                    <img src="{{ asset('slide/Lambang_Kabupaten_Bulukumba.svg.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN BANTAENG')
                                                    <img src="{{ asset('slide/logobantaeng.png') }}" class="d-block"
                                                        height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN JENEPONTO')
                                                    <img src="{{ asset('slide/Logo_Jeneponto.png') }}" class="d-block"
                                                        height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN TAKALAR')
                                                    <img src="{{ asset('slide/Lambang_Kabupaten_Takalar.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN GOWA')
                                                    <img src="{{ asset('slide/New_Coat_of_Arms_of_Gowa.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN SINJAI')
                                                    <img src="{{ asset('slide/Lambang_Kabupaten_Sinjai.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN MAROS')
                                                    <img src="{{ asset('slide/maros.png') }}" class="d-block"
                                                        height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN PANGKAJENE DAN KEPULAUAN')
                                                    <img src="{{ asset('slide/Official_Regency_Logo_of_Pangkajene_dan_Kepulauan.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN BARRU')
                                                    <img src="{{ asset('slide/Barru_Regency_Logo.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN BONE')
                                                    <img src="{{ asset('slide/Bone_Regency_Logo.png') }}"
                                                        class=" d-flex justify-content-center text-center" height="200" style="margin-left:40px" alt="..." style="margin-left:40px">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN SOPPENG')
                                                    <img src="{{ asset('slide/Official_Logo_of_Soppeng_Regency.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN WAJO')
                                                    <h3>KABUPATEN WAJO</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN SINDERENG RAPPANG')
                                                    <h3>KABUPATEN SINDERENG RAPPANG</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN PINRANG')
                                                    <h3>KABUPATEN PINRANG</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN ENREKANG')
                                                    <h3>KABUPATEN ENREKANG</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN LUWU')
                                                    <h3>KABUPATEN LUWU</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN TANA TORAJA')
                                                    <h3>KABUPATEN TANA TORAJA</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN LUWU UTARA')
                                                    <h3>KABUPATEN LUWU UTARA</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN LUWU TIMUR')
                                                    <h3>KABUPATEN LUWU TIMUR</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN TORAJA UTARA')
                                                    <h3>KABUPATEN TORAJA UTARA</h3>
                                                @endif
                                                @if ($rankings->kabupaten == 'KOTA MAKASSAR')
                                                    <img src="{{ asset('slide/LOGO-KOTA-MAKASSAR.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KOTA PAREPARE')
                                                    <img src="{{ asset('slide/Lambang_Kota_Parepare.png') }}"
                                                        class="d-block" height="200" style="margin-left:40px" alt="...">
                                                @endif
                                                @if ($rankings->kabupaten == 'KABUPATEN PALOPO')
                                                    <h3>KABUPATEN PAOLOPO</h3>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                              <b class="h2 font-weight-bold"> <i class="fas fa-map-marker-alt"></i> Provinsi
                                                : {{ $rankings->prov ?? null }}</b> <br>
                                            <span><i class="fas fa-street-view"></i> Nama Kecamatan :
                                                {{ $rankings->nama_kecamatan ?? null }}</span> <br>
                                            <span><i class="fas fa-calendar-week"></i> Tanggal Kejadian :
                                                {{ $rankings->tanggal_kejadian ?? null }}</span> <br>
                                            <span><i class="fas fa-home"></i> Desa : {{ $rankings->desa ?? null }}</span>
                                            <br>
                                            <style>
                                                .scroll::-webkit-scrollbar {
   display: none;
 }
                                            </style>
                                            <p><i class="fas fa-car-crash"></i> Penyebab Bencana :
                                                {{ $rankings->penyebab_bencana ?? 'tidak diketahui' }}</p>
                                            <p><i class="fas fa-users-slash"></i> Korban : <br>
                                                <textarea style="border:none;outline:none; overflow:hidden;" name="" readonly id="" cols="30" rows="100">{{ $rankings->nama_korban }}</textarea>
                                            </p>
                                            </div>

                                        </div>
                                        

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>



    <script>
        $(document).ready(() => {
            $.ajax({
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/73.json",
                method: "GET",
                success: function(data) {
                    data.forEach(element => {

                        $('#kabupaten').append(
                            `<li class="nav-item"><a  class="nav-link" href="/kabupaten/${element.name}">${element.name}</a></li>`
                            )
                    });
                }
            })
        })
    </script>

</body>

</html>
{{-- 
<div class="container mt-5">
    @if ($rankings->isNotEmpty())
    <div class="row">
        <div class="col-md-12">
            <div class="card text-bg-primary mb-3">
                <div class="card-header fw-bold">{{ $rankings->kabupaten ?? null }}</div>
                <div class="card-body text-center">
                    <b class="h2 font-weight-bold"> Provinsi : {{ $rankings->prov  ?? null }}</b> <br>
                    <span>Nama Kecamatan : {{ $rankings->nama_kecamatan ?? null }}</span> <br>
                    <span>Tanggal Kejadian : {{ $rankings->tanggal_kejadian ?? null }}</span> <br>
                    <span>Desa : {{ $rankings->desa ?? null }}</span> <br>
                    <p> {{ $rankings->penyebab_bencana ?? 'tidak diketahui' }}</p>
                    <a href="/detail/{{ $rankings->id }}" class="text-decoration-none text-white">Baca selengkapnya..</a>
    
                </div>
            </div>
        </div>
    </div>
    @endif

    @if ($rankings->isEmpty())
        <h1>Tidak ditemukan </h1>
    @endif
   

    <div class="row mt-2">
        @foreach ($rankings->skip(1) as $ranking)
            <div class="col-md-4 mt-2">
                <div class="card text-bg-primary mb-3">
                    <div class="card-header fw-bold">{{ $ranking->kabupaten }}</div>
                    <div class="card-body">
                        <span>Provinsi : {{ $ranking->prov }}</span> <br>
                        <span>Nama Kecamatan : {{ $ranking->nama_kecamatan }}</span> <br>
                        <span>Tanggal Kejadian : {{ $ranking->tanggal_kejadian }}</span> <br>
                        <span>Desa : {{ $ranking->desa ?? '-' }}</span> <br>
                        <p>{{ $ranking->penyebab_bencana ?? 'tidak diketahui' }}</p> <br>
                        <a href="/detail/{{ $ranking->id }}" class="text-decoration-none text-white">Baca selengkapnya..</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}
