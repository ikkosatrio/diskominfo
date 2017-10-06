@extends('main.template')
@section('content')
<!--breadcrumb-->
<style type="text/css" media="screen">
    .header-breadcrumb {
        background: url({{img_header($header->artikel)}}) no-repeat scroll center 0 transparent;
        -webkit-background-size: cover;
        background-size: cover;
    }
</style>
<section class="row header-breadcrumb">
    <div class="container">
        <div class="row m0 page-cover">
            <h2 class="page-cover-tittle">Artikel</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Artikel</li>
            </ol>
        </div>
    </div>
</section>


<!--blog-details-->
<section class="row blog_content">
    <div class="container">
        <div class="row sectpad">
            <div class="blog_section col-lg-8">
                <!--Blog-->
                @foreach ($artikelBaru as $result)
                <div class="row blog">
                    <div class="featured_img row m0">
                        <a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}"><img style="max-width: 770px;max-height: 330px;min-height: 330px" src="{{img_artikel($result->cover)}}" alt="" class="img-responsive"></a>                    
                    </div>
                    <div class="post-contents row m0">
                        <a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}" class="post-date">{{$result->view}}<span>Dilihat</span></a>
                        <h4 class="post-title"><a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}">{{ucwords($result->judul)}}</a></h4>
                        <ul class="post-meta nav">
                            <li><i class="fa fa-user"></i>By: <a href="#">Admin</a></li>
                            <li><i class="fa fa-tag"></i><a href="#">{{$result->nama}}</a></li>
                            <li><i class="fa fa-calendar"></i>Publish: <a href="#">{{tgl_indo($result->created_at)}}</a></li>
                        </ul>
                        <p>{{read_more($result->deskripsi,250)}}...</p>
                        <a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}" class="read-more submit">read more</a>
                    </div>
                </div>
                @endforeach
                <ul class="pagination">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
            <div class="sidebar_section col-lg-4">
                <div class="sidebar row m0">
                    <div class="row widget widget-search">
                        <div class="row widget-inner">
                            <form action="{{base_url('main/artikel/cari')}}" class="search-form" method="post">
                                <div class="input-group">
                                    <input type="search" name="cari" class="form-control" placeholder="Cari Artikel">
                                    <span class="input-group-addon">
                                        <button type="submit"><i class="icon icon-Search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div> <!--Search-->
                    <div class="row widget widget-categories">
                        <h4 class="widget-title">Kategori</h4>
                        <div class="row widget-inner">
                            <ul class="nav categories">
                                @foreach ($kategori as $key => $result)
                                    <li><a href="{{base_url('main/artikel/kategori/'.$result->id_kategori.'/'.seo($result->nama))}}"><i class="fa fa-angle-right"></i>{{$result->nama}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div> <!--Categories-->
                    <div class="row widget widget-popular-posts">
                        <h4 class="widget-title">Artikel Populer</h4>
                        <div class="row widget-inner">
                        @foreach ($artikelPop as $key => $result)
                            <div class="media popular-post">
                                <div class="media-left"><a href="#"><img style="max-width: 120px;max-height: 92px;min-height: 92px" src="{{img_artikel($result->cover)}}" alt=""></a></div>
                                <div class="media-body">
                                    <h5 class="post-title"><a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}">{{$result->judul}}</a></h5>
                                    <h5 class="post-date"><a href="#">{{tgl_indo($result->created_at)}}</a></h5>                            
                                </div>
                            </div> <!--Popular Post-->
                        @if ($key==5)
                            @break
                        @endif
                        @endforeach
                        </div>
                    </div> <!--Popular Posts-->
                    <div class="row widget text-widget-post">
                        <h4 class="widget-title">Text Widget</h4>
                        <div class="text-widegt widget-inner">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant ium dolore que laudantium, totam rem aperiam, eaque ipsa quae ab illo inve ntore veritatis et quasi arc</p>
                        </div>
                    </div> <!--Tag Clouds-->
                    {{-- <div class="row widget widget-tag-clouds">
                        <h4 class="widget-title">tag clouds</h4>
                        <div class="row widget-inner clouds">
                            <a href="blog-details.html" class="widget-tag">Kitchen Renovation</a>
                            <a href="blog-details.html" class="tag widget-tag active">Tips</a>
                            <a href="blog-details.html" class="widget-tag">Indoor Furniture</a>
                            <a href="blog-details.html" class="tag widget-tag">Repairing</a>
                            <a href="blog-details.html" class="widget-tag">Wood Supply</a>
                            <a href="blog-details.html" class="tag widget-tag">Flooring </a>
                        </div>
                    </div> --}} <!--Tag Clouds-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection