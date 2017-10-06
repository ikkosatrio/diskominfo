@extends('main.template')
@section('content')
<!--breadcrumb-->
<style type="text/css" media="screen">
    .header-breadcrumb {
        background: url({{img_header($header->kontak)}}) no-repeat scroll center 0 transparent;
        -webkit-background-size: cover;
        background-size: cover;
    }
</style>
@section('css')
    
@endsection
<section class="row header-breadcrumb">
    <div class="container">
        <div class="row m0 page-cover">
            <h2 class="page-cover-tittle">Kontak Kami</h2>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Kontak Kami</li>
            </ol>
        </div>
    </div>
</section>

<section class="row touch">
    <div class="sectpad touch_bg">
        <div class="container">
            <div class="row m0 section_header color">
                <h2>get in touch</h2>
                <p>If you are interested in finding out more about how we can help your organization, please fill out the form below. you can call us anytime between 4 A.M. to 2 P. M. GMT</p>
            </div>
            
            <div class="row touch_middle">
                <div class="col-md-4 open_hours">
                    <div class="row m0 touch_top">
                        <ul class="nav">
                            <li class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <i class="fa fa-map-marker"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                       {{$config->address}}
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <i class="fa fa-envelope-o"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        {{$config->email}}
                                    </div>
                                </div>
                            </li>
                            <li  class="item">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <i class="fa fa-phone"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        {{$config->phone}}<br>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 input_form">
                    <form id="form-pesan" method="post">
                        <input type="text" class="form-control" id="yourname" name="nama" placeholder="Nama">
                        <input type="email" class="form-control" id="youremail" name="email" placeholder="Email">
                        <textarea class="form-control" rows="6" id="message" name="pesan" placeholder="Pesan"></textarea>
                        <div class="row m0">
                            <button type="submit" class="btn btn-default submit">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>           
        </div>
    </div>
</section>
<!--MapBox-->
<section class="map">
    <div style="height: 425px;" class="row m0"><iframe style="width: 100%;height: 100%" src="https://www.google.com/maps/d/u/0/embed?mid=130hP436ho4XgPG8_Tv1FmKXD9y4"></iframe></div>
</section>
@section('js')

@endsection
@endsection