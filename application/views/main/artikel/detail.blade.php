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
            {{-- <h2 class="page-cover-tittle">Blog details</h2> --}}
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html">Artikel</a></li>
                <li class="active">{{read_more($artikel->judul,30)}}...</li>
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
                        <img style="max-width: 770px;max-height: 330px;min-height: 330px" src="{{img_artikel($artikel->cover)}}" alt="{{$artikel->judul}}" class="img-responsive">                    
                    </div>
                    <div class="post-contents row m0">
                        <a href="blog-details.html" class="post-date">{{$artikel->view}}<span>Dilihat</span></a>
                        <h4 class="post-title"><a href="#">{{$artikel->judul}}</a></h4>
                        <ul class="post-meta nav">
                            <li><i class="fa fa-user"></i>By: <a href="#">Admin</a></li>
                            <li><i class="fa fa-tag"></i><a href="#">{{$artikel->nama}}</a></li>
                            <li><i class="fa fa-comments"></i>Publish: <a href="#">{{tgl_indo($artikel->created_at)}}</a></li>
                        </ul>
                        <p>
                            {!!$artikel->deskripsi!!}
                        </p>
                    </div>
                </div> <!--Blog-->
                <div class="row m0 posts-social">
                    <div class="post-count">Share</div>
                    <ul class="nav social">
                        <li><a target="_blank" href="https://facebook.com/sharer/sharer.php?u={{base_url('main/artikel/'.$artikel->id_artikel.'/'.seo($artikel->judul))}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/share?url={{base_url('main/artikel/'.$artikel->id_artikel.'/'.seo($artikel->judul))}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://plus.google.com/share?url={{base_url('main/artikel/'.$artikel->id_artikel.'/'.seo($artikel->judul))}}"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                {{-- <div class="row about-post-author">
                    <div class="media author-bio">
                        <div class="media-left">
                            <a href="#"><img src="{{base_url()}}assets/main/images/blogs/admin.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="media-body media-middle">
                            <h4><a href="#">administrator</a></h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem ape riam, eaque ipsa quae ab illo invent ore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                        </div>
                    </div>
                </div>
                <div class="comments row">
                    <h3 class="comments_count">Comments (5)</h3>                
                    <div class="media comment">
                        <div class="media-left"><img src="{{base_url()}}assets/main/images/blogs/coments1.jpg" alt=""></div>
                        <div class="media-body">
                            <h5 class="commenter-name">John Michale</h5>
                            <ul class="date-reply nav">
                                <li><a href="#">feb 02 2016</a></li>
                                <li><a href="#">reply</a></li>
                            </ul>
                            <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu fugiat nulla pari atur. Excepteur sint occaecat cupidatat non proid pent.</p>
                        </div>
                    </div> <!--Comment-->              
                    <div class="media comment">
                        <div class="media-left"><img src="{{base_url()}}assets/main/images/blogs/coments1.jpg" alt=""></div>
                        <div class="media-body">
                            <h5 class="commenter-name">John Michale</h5>
                            <ul class="date-reply nav">
                                <li><a href="#">feb 02 2016</a></li>
                                <li><a href="#">reply</a></li>
                            </ul>
                            <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu fugiat nulla pari atur. Excepteur sint occaecat cupidatat non proid pent.</p>
                        </div>
                    </div> <!--Comment-->              
                    <div class="media comment">
                        <div class="media-left"><img src="{{base_url()}}assets/main/images/blogs/coments1.jpg" alt=""></div>
                        <div class="media-body">
                            <h5 class="commenter-name">John Michale</h5>
                            <ul class="date-reply nav">
                                <li><a href="#">feb 02 2016</a></li>
                                <li><a href="#">reply</a></li>
                            </ul>
                            <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu fugiat nulla pari atur. Excepteur sint occaecat cupidatat non proid pent.</p>                       
                            <div class="media comment reply">
                                <div class="media-left"><img src="{{base_url()}}assets/main/images/blogs/coments2.jpg" alt=""></div>
                                <div class="media-body">
                                    <h5 class="commenter-name">John Michale</h5>
                                    <ul class="date-reply nav">
                                        <li><a href="#">feb 02 2016</a></li>
                                        <li><a href="#">reply</a></li>
                                    </ul>
                                    <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu fugiat nulla pari atur. Excepteur sint occaecat.</p>
                                </div>
                            </div> <!--Comment-->  
                        </div>
                    </div> <!--Comment-->              
                    <div class="media comment">
                        <div class="media-left"><img src="{{base_url()}}assets/main/images/blogs/coments1.jpg" alt=""></div>
                        <div class="media-body">
                            <h5 class="commenter-name">John Michale</h5>
                            <ul class="date-reply nav">
                                <li><a href="#">feb 02 2016</a></li>
                                <li><a href="#">reply</a></li>
                            </ul>
                            <p>Duis aute irure dolor in reprehenderit in vol uptate velit esse cillum dolore eu fugiat nulla pari atur. Excepteur sint occaecat cupidatat non proid pent.</p>
                        </div>
                    </div> <!--Comment-->
                </div> <!--Comments-->
<!--                    contact-->
                <form action="#" method="post" class="comment_form row m0">
                    <h3 class="leave-comment-title">Leave a Comment</h3>
                    <input type="text" class="form-control">
                    <input type="email" class="form-control">
                    <textarea class="form-control"></textarea>
                    <button type="submit" class="btn btn-primary submit">submit</button>
                </form> --}}
            </div>
            <div class="sidebar_section col-lg-4">
                <div class="sidebar row m0 ">
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
                            @foreach ($artikelPop as $key => $result)
                        <div class="row widget-inner">
                                <div class="media popular-post">
                                    <div class="media-left"><a href="{{img_artikel($result->cover)}}"><img style="max-width: 120px;max-height: 92px;min-height: 92px" src="{{img_artikel($result->cover)}}" alt=""></a></div>
                                    <div class="media-body">
                                        <h5 class="post-title"><a href="{{base_url('main/artikel/'.$result->id_artikel.'/'.seo($result->judul))}}">{{$result->judul}}</a></h5>
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
                    </div> <!--Tag Clouds-->     <!--Tag Clouds-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection