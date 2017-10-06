@extends('main.template')
@section('content')
<!--breadcrumb-->
<style type="text/css" media="screen">
    .header-breadcrumb {
        background: url({{img_header($header->produk)}}) no-repeat scroll center 0 transparent;
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




<!--blog-details-->
<section class="row blog_content">
    <div class="container">
        <div class="row sectpad">
            <div class="blog_section col-lg-8 shop-page-content">
                <div class="row m0 section_header color">
                    <h2>Produk Unggulan</h2> 
                </div> 
                <br><br>
                <div class="row">
                    <!--Start single shop item-->
                    @foreach ($produkBaru as $result)
                    <div class="col-lg-4 col-md-4 single-shop-item">
                        <img style="max-width: 244px;max-height: 190px;min-height: 190px" src="{{img_produk($result->cover)}}" alt="{{$result->judul}}">
                        <div class="meta">
                            <h4>{{$result->judul}}</h4>
                            {{-- <div class="star-rating"> 
                                <i class="fa fa-star" data-rating="1"></i>
                                <i class="fa fa-star" data-rating="2"></i>
                                <i class="fa fa-star" data-rating="3"></i>
                                <i class="fa fa-star" data-rating="4"></i>
                                <i class="fa fa-star-o" data-rating="5"></i>
                                <input type="hidden" name="whatever" class="rating-value" value="3">
                            </div> --}}
                            <span>Dilihat: <b>{{$result->view}}</b></span>
                            <a href="{{base_url('main/produk/'.$result->id_produk.'/'.seo($result->judul))}}">
                                <div class="cart-button">
                                    <p>Detail Produk</p>
                                    <i class="fa fa-eye"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <!--End single shop item-->
                </div>
            </div>
            <div class="sidebar_section col-lg-4">
                <div class="sidebar row m0">
                    <div class="row widget widget-search">
                        <div class="row widget-inner">
                            <form action="{{base_url('main/produk/cari')}}" class="search-form" method="post">
                                <div class="input-group">
                                    <input type="search" name="cari" class="form-control" placeholder="Cari Produk">
                                    <span class="input-group-addon">
                                        <button type="submit"><i class="icon icon-Search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div> <!--Search-->
                    <div class="row widget widget-popular-posts">
                        <h4 class="widget-title">Populer Produk</h4>
                        @foreach ($produkPop as $key => $result)
                            <div class="row widget-inner">
                                <div class="media popular-post">
                                    <div class="media-left"><a href="single.html"><img style="max-width: 120px;max-height: 92px;min-height: 92px" src="{{img_produk($result->cover)}}" alt=""></a></div>
                                    <div class="media-body">
                                        <h5 class="post-title"><a href="{{base_url('main/artikel/'.$result->id_produk.'/'.seo($result->judul))}}">{{$result->judul}}</a></h5>
                                        <h5 class="post-date"><a href="#">{{tgl_indo($result->created_at)}}</a></h5>                            
                                    </div>
                                </div> <!--Popular Post-->
                            </div>
                        @if ($key==5)
                            @break
                        @endif    
                        @endforeach
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