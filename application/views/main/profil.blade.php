@extends('main.template')
@section('content')
<!--breadcrumb-->
@section('css')
<style type="text/css" media="screen">
    .header-breadcrumb {
        background: url({{img_header($header->profil)}}) no-repeat scroll center 0 transparent;
        -webkit-background-size: cover;
        background-size: cover;
    }
    .who-area {
        background: url('') no-repeat scroll center 0 transparent;
        position: relative!important;
    }
    .who-area .who-are-image:after{
             border: 0px solid #fff; 
    }
</style>
@endsection
<section class="row header-breadcrumb">
    <div class="container">
            <div class="row m0 page-cover">
                <h2 class="page-cover-tittle">Profil Desa</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Profil</li>
            </ol>
            </div>
        </div>
</section>

<!--who-are-->
<section class=" row who-area sectpad">
    <div class="container">
        <div class="row m0 section_header color">
            <h2>Sejarah Desa</h2> 
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-3 who-are">
                <div class="who-are-image row m0">
                    <img src="{{img_profil($profil->gambar)}}" alt="{{$profil->nama_desa}}">
                </div>
            </div>
            <div class="col-sm-8 col-lg-9 who-are-texts">
                <div class="who-text">
                    <h3>{{$profil->nama_desa}}</h3>
                    <p>{!!$profil->deskripsi!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--features-->

<!--team-->
 <section class="row sectpad team-area">
    <div class="container">
        <div class="row m0 section_header color">
            <h2>Aparatur Desa</h2> 
        </div>
        <div class="row our-team">
            @foreach ($pejabat as $result)
            <div class="col-sm-6 col-md-3 team">
                <div class="team-images row m0">
                    <img style="max-width: 209px;max-height: 282px;min-height: 282px" src="{{img_pejabat($result->foto)}}" alt="">
                </div>
                <div class="team-content">
                    <a href="#"><h4>{{$result->nama}}</h4></a>
                    <p>{{$result->jabatan}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!--testimonial-->
{{-- <section class="row sectpad testimonial-area">
   <div class="container">
       <div class="row m0 section_header">
           <h2>What our client says</h2> 
        </div>
        <div class="testimonial-sliders">
            <div class="item">
                <div class="media testimonial">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{base_url()}}assets/main/images/testimonial/1.jpg"  alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <a href="#">-  John Michale</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="media testimonial">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{base_url()}}assets/main/images/testimonial/2.jpg"  alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <a href="#">-  John Michale</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="media testimonial">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{base_url()}}assets/main/images/testimonial/3.jpg"  alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <a href="#">-  John Michale</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="media testimonial">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{base_url()}}assets/main/images/testimonial/4.jpg"  alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <a href="#">-  John Michale</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="media testimonial">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{base_url()}}assets/main/images/testimonial/5.jpg"  alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <a href="#">-  John Michale</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="media testimonial">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{base_url()}}assets/main/images/testimonial/6.jpg"  alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <a href="#">-  John Michale</a>
                    </div>
                </div>
            </div>
        </div>
   </div>
</section> --}}
@endsection