@extends('main.template')
@section('content')
<!--breadcrumb-->
<style type="text/css" media="screen">
    .header-breadcrumb {
        background: url({{img_header($header->potensi)}}) no-repeat scroll center 0 transparent;
        -webkit-background-size: cover;
        background-size: cover;
    }
</style>
<section class="row header-breadcrumb sectpad">
    <div class="container">
        <div class="row m0 page-cover">
            <h2 class="page-cover-tittle">Potensi</h2>
        <ol class="breadcrumb">
            <li><a href="{{base_url()}}">Home</a></li>
            <li class="active">Potensi</li>
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
<section class="row latest_projects sectpad projects-3">
    <div class="container">
        {{-- <div class="row m0 filter_row projects-menu">
            <ul class="nav project_filter" id="project_filter2">
                <li class="active" data-filter="*">all</li>
            </ul>
        </div> --}}
        <div class="projects3 row m0" id="projects">
            <div class="grid-sizer"></div>
            @foreach ($potensiBaru as $result)
            <div class="project project-listing project-item indoor wood_supply hardwood manufacturing">
                <div class="projects-img col-md-7 col-lg-8">
                    <div class="projects-img-hover">
                        <img style="max-width: 770px;max-height: 327px;min-height: 327px" src="{{img_potensi($result->cover)}}" alt="{{$result->judul}}">
                    </div>
                    <a href="{{base_url('main/potensi/'.$result->id_potensi.'/'.seo($result->judul))}}" class="projects-button">Details</a>
                </div>                
                <div class="projects-content">
                    <a href="{{base_url('main/potensi/'.$result->id_potensi.'/'.seo($result->judul))}}"><h3>{{$result->judul}}</h3></a>
                    <p>{!!read_more($result->deskripsi,200)!!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection