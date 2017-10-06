@extends('main.template')
@section('content')
<!--breadcrumb-->
<style type="text/css" media="screen">
    .header-breadcrumb {
        background: url({{img_header($header->gallery)}}) no-repeat scroll center 0 transparent;
        -webkit-background-size: cover;
        background-size: cover;
        object-fit: cover;
    }
</style>
<section class="row header-breadcrumb">
    <div class="container">
        <div class="row m0 page-cover">
            <h2 class="page-cover-tittle">Gallery</h2>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Gallery</li>
        </ol>
        </div>
    </div>
</section>

<!--checkout-->
<section class="row check-project sectpad">
    <div class="container">
        <div class="row m0 section_header color">
            <h2>Checkout Our Projects</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
        </div>
        
    </div>
</section>

<!-- Projects -->
<section class="row latest_projects sectpad projects-1">
    <div class="container">
        <div class="row m0 filter_row projects-menu">
            <ul class="nav project_filter" id="project_filter2">
                <li class="active" data-filter="*">all</li>
                @foreach ($album as $element)
                    @foreach ($gambar as $key => $result)
                        @if ($element->id_album==$result->id_album)
                            <li data-filter=".{{$result->id_album}}">{{$result->nama_album}}</li>
                            @break
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
        <div class="projects2 popup-gallery" id="projects">
            <div class="grid-sizer"></div>
            @foreach ($gambar as $result)
            <div class="col-sm-3 col-xs-6 project {{$result->id_album}}">
               <div class="project-img">
                    <img style="max-width: 290px;max-height: 255px;min-height: 255px" src="{{img_album($result->gambar)}}" alt="{{$result->nama_album}}">
                    <div class="project-text">
                        <ul class="list-unstyled">
                            {{-- <li><a href="projects-details.html"><i class="icon icon-Linked"></i></a></li> --}}
                            <li><a href="{{img_album($result->gambar)}}" data-source="#" title="{{$result->nama_album}}" data-desc="" class="popup"><i class="icon icon-Search"></i></a></li>
                        </ul>
                        <div class="row m0">
                            <a href="#"><h3>{{$result->nama_album}}</h3></a>
                            {{-- <p>Wood Work of Racks</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection