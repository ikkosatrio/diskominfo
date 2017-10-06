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
            {{-- <h2 class="page-cover-tittle">Single Product</h2> --}}
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">{{read_more($produk->judul,30)}}...</li>
        </ol>
        </div>
    </div>
</section>




<!--blog-details-->
<section class="row blog_content">
    <div class="container">
        <div class="row sectpad">
            <div class="blog_section col-lg-8 shop-page-content product-page">
                <div class="row product-details-box">
                    <div class="col-lg-6 img-holder">
                        <img style="max-width: 370px;max-height: 426px;min-height: 426px" src="{{img_produk($produk->cover)}}" alt="">
                    </div>
                    <div class="col-lg-6">
                        <h3>{{$produk->judul}}</h3>
                            {!!$produk->deskripsi!!}    
                        <span>Dilihat : <b>{{$produk->view}}</b></span>
                    </div>
                </div>
                
                {{-- <div class="product-details-tab-title row">
                    <div class="col-lg-12">
                        <ul>
                            <li data-tab-name="description" class="active"><span>Descripton</span></li>
                            <li data-tab-name="specification"><span>Specification</span></li>
                            <li data-tab-name="review"><span>Review (0)</span></li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="product-details-tab-content row">
                    <div class="col-lg-12" id="description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="col-lg-12" id="specification">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="col-lg-12" id="review">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                </div> --}}

                <div class="row best-seller">
                    <div class="row m0 section_header color">
                        <h2>Produk Terkait</h2> 
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <!--Start single shop item-->
                    @foreach ($produkRand as $key => $result)
                    <div class="col-lg-4 col-md-4 single-shop-item">
                        <img style="max-width: 244px;max-height: 190px;min-height: 190px" src="{{img_produk($result->cover)}}" alt="">
                        <div class="meta">
                            <h4>{{$result->judul}}</h4>
                            <span>Dilihat: <b>{{$result->view}}</b></span>
                            <a href="{{base_url('main/produk/'.$result->id_produk.'/'.seo($result->judul))}}">
                                <div class="cart-button">
                                    <p>DETAIL PRODUK</p>
                                    <i class="fa fa-eye"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    @if ($key==3)
                        @break
                    @endif
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
                        <div class="row widget-inner">
                            @foreach ($produkPop as $result)
                            <div class="media popular-post">
                                <div class="media-left"><a href="{{base_url('main/produk/'.$result->id_produk.'/'.seo($result->judul))}}"><img style="max-width: 120px;max-height: 92px;min-height: 92px" src="{{img_produk($result->cover)}}" alt=""></a></div>
                                <div class="media-body">
                                    <h5 class="post-title"><a href="{{base_url('main/produk/'.$result->id_produk.'/'.seo($result->judul))}}">{{$result->judul}}</a></h5>
                                    <h5 class="post-date"><a href="{{base_url('main/produk/'.$result->id_produk.'/'.seo($result->judul))}}">{{tgl_indo($result->created_at)}}</a></h5>                            
                                </div>
                            </div>
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
                    </div> <!--Tag Clouds--> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection