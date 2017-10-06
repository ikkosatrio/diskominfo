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
<section class="row header-breadcrumb">
    <div class="container">
        <div class="row m0 page-cover">
            {{-- <h2 class="page-cover-tittle">Blog details</h2> --}}
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">{{read_more($potensi->judul,30)}}...</li>
            </ol>
        </div>
    </div>
</section>
<!--blog-details-->
<section class="row blog_content">
    <div class="container">
        <div class="row sectpad">
            <div class="blog_section col-lg-8">
                <div class="row blog blog-details">
                    <div class="featured_img row m0">
                        <img style="max-width: 770px;max-height: 330px;min-height: 330px" src="{{img_potensi($potensi->cover)}}" alt="" class="img-responsive">                    
                    </div>
                    <div class="post-contents row m0">
                        <a href="blog-details.html" class="post-date">{{$potensi->view}}<span>Dilihat</span></a>
                        <h4 class="post-title"><a href="#">{{$potensi->judul}} </a></h4>
                        <ul class="post-meta nav">
                            <li><i class="fa fa-user"></i>By: <a href="#">Admin</a></li>
                            <li><i class="fa fa-calendar"></i>Publish: <a href="#">{{tgl_indo($potensi->created_at)}}</a></li>
                        </ul>
                        {!!$potensi->deskripsi!!}
                    </div>
                </div> <!--Blog-->
                <div class="row m0 posts-social">
                    <div class="post-count">Share</div>
                    <ul class="nav social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar_section col-lg-4">
                <div class="sidebar row m0 ">
                    <div class="row widget widget-search">
                        <div class="row widget-inner">
                            <form action="#" class="search-form" method="get">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Cari Potensi">
                                    <span class="input-group-addon">
                                        <button type="submit"><i class="icon icon-Search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div> <!--Search-->
                    <div class="row widget widget-popular-posts">
                        <h4 class="widget-title">Potensi Populer</h4>
                        <div class="row widget-inner">
                            @foreach ($potensiPop as $result)
                            <div class="media popular-post">
                                <div class="media-left"><a href="#"><img style="max-width: 120px;max-height: 92px;min-height: 92px" src="{{img_potensi($result->cover)}}" alt=""></a></div>
                                <div class="media-body">
                                    <h5 class="post-title"><a href="{{base_url('main/potensi/'.$result->id_potensi.'/'.seo($result->judul))}}">{{$result->judul}}</a></h5>
                                    <h5 class="post-date"><a href="#">{{tgl_indo($result->created_at)}}</a></h5>                            
                                </div>
                            </div> <!--Popular Post-->
                            @endforeach
                        </div>
                    </div> <!--Popular Posts-->
                    <div class="row widget text-widget-post">
                        <h4 class="widget-title">Text Widget</h4>
                        <div class="text-widegt widget-inner">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusant ium dolore que laudantium, totam rem aperiam, eaque ipsa quae ab illo inve ntore veritatis et quasi arc</p>
                        </div>
                    </div> <!--Tag Clouds-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection