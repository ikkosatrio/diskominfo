@extends('main.template')
@section('content')
<!--rv-slider-->
<section class="bannercontainer row">
    <div class="rev_slider banner row m0" id="rev_slider" data-version="5.0">
        <ul>
            @foreach ($slider as $result)
            <li data-transition="slidehorizontal"  data-delay="10000">
                <img style="max-width: 1920px;max-height: 828px;min-height: 828px" src="{{img_slider($result->cover)}}"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
                <div class="tp-caption sfr tp-resizeme carpenters-h1" 
                    data-x="0" data-hoffset="690" 
                    data-y="355" data-voffset="160" 
                    data-whitespace="nowrap"
                    data-start="900">
                    {{$result->judul}}

                </div>
                <div class="tp-caption sfb tp-resizeme carpenters-p" 
                    data-x="0" data-hoffset="500" 
                    data-y="430" data-voffset="470" 
                    data-whitespace="nowrap"
                    data-start="1800">                    
                    {!!$result->deskripsi!!}
                </div>
            </li>
            @endforeach
            
            {{-- <li data-transition="parallaxvertical">
                <img src="{{base_url()}}assets/main/images/slider-img/2.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
                
                <div class="tp-caption sfb tp-resizeme carpenters-ul type2" 
                    data-x="left" data-hoffset="620" 
                    data-y="255" data-voffset="470" 
                    data-whitespace="nowrap"
                    data-start="1500">
                    <ul class="nav">
                        <li><a href="{{base_url()}}assets/main/#">Domestic</a></li>
                        <li><a href="{{base_url()}}assets/main/#">Commercial</a></li>
                        <li><a href="{{base_url()}}assets/main/#">Industrial</a></li>
                    </ul>
                </div>
                <div class="tp-caption sfr tp-resizeme carpenters-h1 type2" 
                    data-x="left" data-hoffset="620" 
                    data-y="320" data-voffset="160" 
                    data-whitespace="nowrap"
                    data-start="900">
                    <span>Design</span> futniture<br><span>Make</span> doors
                </div>
            </li> --}}
        </ul>
    </div>
</section>

<section class="row experience-area">
   <div class="container">
       <div class="row">
           <div class="col-sm-5 worker-image">
               <img style="max-width: 336px;max-height: 366px;min-height: 366px" src="{{img_profil($profil->gambar)}}" alt="{{$profil->nama_desa}}">
           </div>
           <div class="col-sm-7 experience-info">
              <div class="content">
                  <h2>{{$profil->nama_desa}}</h2> 
                  <p>{!!$profil->deskripsi!!}</p>  
              </div>
              {{-- <div class="content-image">
              <img src="{{base_url()}}assets/main/images/expreence/2.jpg" alt="">
              </div> --}}
               
           </div>
       </div>
   </div>
</section>


<!--we-do-->
<section class="row sectpad we-do-section">
    <div class="container">
        <div class="row m0 section_header color">
           <h2>Artikel Terbaru</h2> 
        </div>
        <div class="we-do-slider">
            <div class="we-sliders">
                @foreach ($artikelBaru as $key => $result)
                <div class="item">
                    <div class="post-image">
                        <img style="min-height: 200px" src="{{img_artikel($result->cover)}}"  alt="">
                    </div>
                    <a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}"><h4>{{ucwords($result->judul)}}</h4></a>
                    <p>{{read_more($result->deskripsi,150)}}...</p>
                </div>
                @if ($key==7)
                    @break
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Projects -->
<section class="row latest_projects sectpad projects-1">
    <div class="container">
        <div class="row m0 section_header">
            <h2>Gallery</h2>
        </div>
        <div class="row m0 filter_row">
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
            @foreach ($gambar as $key => $result)
            <div class="col-sm-3 col-xs-6 project {{$result->id_album}}">
                <div class="project-img">
                    <img style="max-width: 285px;max-height: 260px;min-height: 260px" src="{{img_album($result->gambar)}}" alt="{{$result->nama_album}}">
                    <div class="project-text">
                        <ul class="list-unstyled">
                            <li><a href="{{img_album($result->gambar)}}" data-source="#" title="{{$result->nama_album}}" data-desc="" class="popup"><i class="icon icon-Search"></i></a></li>
                        </ul>
                        <div class="row m0">
                            <a href="#"><h3>{{$result->nama_album}}</h3></a>
                            <p>{{tgl_indo($result->created_at)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--work-shop-->
{{-- <section class="row fluid-work-area">
    <div class="work-image">
        <img src="{{base_url()}}assets/main/images/workshop/work.jpg" alt="">
    </div>
    <div class="work-promo">
        <div class="promo-content">
            <h2>Welcome to Wood Workshop</h2>
            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quae rat voluptatem. Ut enim ad minima.</p>
            <h3>We are available for 24/7 for you requirements</h3>
            <ul class="nav">
                <li>Complete Savety Analysis</li>
                <li>Complete Savety Analysis</li>
                <li>Certified Company Since 2005</li>
                <li>Certified Company Since 2005</li>
            </ul>
        </div>
    </div>
</section> --}}
<!--testimonial-->
<section class="row sectpad testimonial-area">
   <div class="container">
       <div class="row m0 section_header common">
           <h2>Potensi</h2> 
        </div>
        <div class="testimonial-sliders">
            @foreach ($potensi as $key => $result)
            <div class="item">
                <div class="media testimonial">
                    <div class="media-left">
                        <a href="{{base_url('main/potensi/'.$result->id_potensi.'/'.seo($result->judul))}}">
                            <img style="max-width: 170px;max-height: 185px;min-height: 185px" src="{{img_potensi($result->cover)}}"  alt="{{$result->judul}}">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>{{read_more($result->deskripsi,150)}}...</p>
                        <a href="{{base_url('main/potensi/'.$result->id_potensi.'/'.seo($result->judul))}}">-  {{$result->judul}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
   </div>
</section>

<!-- latest-news-area -->
<section class="row sectpad latest-news-area">
    <div class="container">
        <div class="row m0 section_header">
           <h2>Artikel Populer</h2> 
        </div>
        <div class="row latest-content">
            @foreach ($artikelPop as $key => $result)
            <div class="col-sm-4 clo-xs-12 latest">
                <div class="row m0 latest-image">
                    <a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}"><img style="max-width: 369px;max-height: 202px;min-height: 202px" src="{{img_artikel($result->cover)}}" alt="{{seo($result->judul)}}"></a>
                </div>
                <div class="latest-news-text">
                    <a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}">
                        <h4>{{ucwords($result->judul)}}</h4>
                    </a>
                    <p>{{read_more($result->deskripsi,150)}}...</p>
                    <div class="row m0 latest-meta">
                        <a href="{{base_url()}}assets/main/#"><i class="fa fa-tag"></i>{{$result->nama}}</a> <a class="read_more" href="{{base_url()}}assets/main/single.html"><i class="fa fa-eye"></i> Dilihat: {{$result->view}}</a>
                    </div>
                </div>
            </div> 
                @if ($key==7)
                    @break
                @endif
            @endforeach
        </div>
    </div>
</section>


<!-- clients -->
<section class="row clients">
    <div class="container">
        <div class="row m0 section_header">
            <h2>Produk Desa</h2>
        </div>
        <div class="row clients-logos">
        @foreach ($produk as $key => $result)
            <div class="col-md-2 col-sm-3 col-xs-6 client">
                <div class="row m0 inner-logo">
                   <a href="{{base_url('main/produk/'.$result->id_produk.'/'.seo($result->judul))}}"><img src="{{img_produk($result->cover)}}" alt="{{$result->judul}}"></a>
                </div>
            </div>
        @if ($key==6)
            @break
        @endif
        @endforeach
        </div>
    </div>
</section>
@endsection