<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>APLIKASI DONASI BENCANA ALAM</title>

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
                <a href="#" class="navbar-brand sidebar-gone-hide">Aplikasi Donasi Bencana Alam </a>
                <div class="navbar-nav">
                    <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i
                            class="fas fa-bars"></i> </a>
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
                                    class="fas fa-search"></i> </a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250" name="search">
                        <button class="btn" type="submit"><i class="fas fa-search"></i> </button>
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
                            <a href="/bencana" class="nav-link"><i class="fas fa-newspaper"></i> <span> Berita</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                    class="fas fa-city"></i> <span>Kabupaten / Kota</span></a>
                            <ul class="dropdown-menu" id="kabupaten">

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content">
                <section class="section">
                    <div class="row justify-content-center">
                        @if ($kabupaten == 'default')
                        <div class="col-md-10 mb-2">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                              
                                    <div class="carousel-item active">
                                        <img src="/slide/bencanaa.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/korban2.jpeg" class="d-block w-100" alt="...">
                                    </div>
                                
                                   
                               

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-target="#carouselExampleIndicators" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-target="#carouselExampleIndicators" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if ($kabupaten == 'KABUPATEN KEPULAUAN SELAYAR')
                        <img src="{{ asset('slide/selayar2.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN BULUKUMBA')
                        <img src="{{ asset('slide/Lambang_Kabupaten_Bulukumba.svg.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN BANTAENG')
                        <img src="{{ asset('slide/logobantaeng.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN JENEPONTO')
                        <img src="{{ asset('slide/Logo_Jeneponto.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN TAKALAR')
                        <img src="{{ asset('slide/Lambang_Kabupaten_Takalar.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN GOWA')
                        <img src="{{ asset('slide/New_Coat_of_Arms_of_Gowa.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN SINJAI')
                        <img src="{{ asset('slide/Lambang_Kabupaten_Sinjai.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN MAROS')
                        <img src="{{ asset('slide/maros.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN PANGKAJENE DAN KEPULAUAN')
                        <img src="{{ asset('slide/Official_Regency_Logo_of_Pangkajene_dan_Kepulauan.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN BARRU')
                        <img src="{{ asset('slide/Barru_Regency_Logo.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN BONE')
                        <img src="{{ asset('slide/Bone_Regency_Logo.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN SOPPENG')
                        <img src="{{ asset('slide/Official_Logo_of_Soppeng_Regency.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KABUPATEN WAJO')
                        <h3>KABUPATEN WAJO</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN SINDERENG RAPPANG')
                        <h3>KABUPATEN SINDERENG RAPPANG</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN PINRANG')
                        <h3>KABUPATEN PINRANG</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN ENREKANG')
                        <h3>KABUPATEN ENREKANG</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN LUWU')
                        <h3>KABUPATEN LUWU</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN TANA TORAJA')
                        <h3>KABUPATEN TANA TORAJA</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN LUWU UTARA')
                        <h3>KABUPATEN LUWU UTARA</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN LUWU TIMUR')
                        <h3>KABUPATEN LUWU TIMUR</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN TORAJA UTARA')
                        <h3>KABUPATEN TORAJA UTARA</h3>
                        @endif
                        @if ($kabupaten == 'KABUPATEN MAKASSAR')
                        <img src="{{ asset('slide/LOGO-KOTA-MAKASSAR.png') }}" class="d-block" height="200" alt="...">
                        @endif
                        @if ($kabupaten == 'KOTA PAREPARE')
                        <img src="{{ asset('slide/Lambang_Kota_Parepare.png') }}" class="d-block" height="200" alt="...">
                        @endif  
                        @if ($kabupaten == 'KABUPATEN PALOPO')
                        <h3>KABUPATEN PAOLOPO</h3>
                        @endif
                        
                        
                        
                        
                    </div>



                    <div class="section-body">


                        @if ($rankings->isNotEmpty())
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>{{ $rankings[0]->kabupaten ?? null }} (1)</h4>
                                        </div>
                                        <div class="card-body text-center">
                                            <b class="h2 font-weight-bold"> <i class="fas fa-map-marker-alt"></i>
                                                Provinsi : {{ $rankings[0]->prov ?? null }}</b> <br>
                                            <span><i class="fas fa-street-view"></i> Nama Kecamatan :
                                                {{ $rankings[0]->nama_kecamatan ?? null }}</span> <br>
                                            <span><i class="fas fa-calendar-week"></i> Tanggal Kejadian :
                                                {{ $rankings[0]->tanggal_kejadian ?? null }}</span> <br>
                                            <span><i class="fas fa-home"></i> Desa :
                                                {{ $rankings[0]->desa ?? null }}</span> <br>
                                            <p> <i class="fas fa-car-crash"></i> Penyebab Bencana :
                                                {{ $rankings[0]->penyebab_bencana ?? 'tidak diketahui' }}</p>
                                            <a href="/detail/{{ $rankings[0]->id }}" class="text-decoration-none">Baca
                                                selengkapnya..</a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body">Tidak ditemukan .... </div>
                            </div>
                        @endif

                        <div class="row">

                            @foreach ($rankings->skip(1) as $ranking)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>{{ $ranking->kabupaten ?? null }} ({{ $loop->iteration + 1 }})</h4>
                                        </div>
                                        <div class="card-body">
                                            <b class="h5 font-weight-bold"><i class="fas fa-map-marker-alt"></i>
                                                Provinsi : {{ $ranking->prov ?? null }}</b> <br>
                                            <span><i class="fas fa-street-view"></i> Nama Kecamatan :
                                                {{ $ranking->nama_kecamatan ?? null }}</span> <br>
                                            <span><i class="fas fa-calendar-week"></i> Tanggal Kejadian :
                                                {{ $ranking->tanggal_kejadian ?? null }}</span> <br>
                                            <span><i class="fas fa-home"></i> Desa :
                                                {{ $ranking->desa ?? null }}</span> <br>
                                            <p><i class="fas fa-car-crash"></i> Penyebab Bencana :
                                                {{ $ranking->penyebab_bencana ?? 'tidak diketahui' }}</p>
                                            <a href="/detail/{{ $ranking->id }}" class="text-decoration-none">Baca
                                                selengkapnya..</a>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
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
                <div class="card-header fw-bold">{{ $rankings[0]->kabupaten ?? null }}</div>
                <div class="card-body text-center">
                    <b class="h2 font-weight-bold"> Provinsi : {{ $rankings[0]->prov  ?? null }}</b> <br>
                    <span>Nama Kecamatan : {{ $rankings[0]->nama_kecamatan ?? null }}</span> <br>
                    <span>Tanggal Kejadian : {{ $rankings[0]->tanggal_kejadian ?? null }}</span> <br>
                    <span>Desa : {{ $rankings[0]->desa ?? null }}</span> <br>
                    <p> {{ $rankings[0]->penyebab_bencana ?? 'tidak diketahui' }}</p>
                    <a href="/detail/{{ $rankings[0]->id }}" class="text-decoration-none text-white">Baca selengkapnya..</a>
    
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
