@extends('admin.template')
@section('title')
Dashboard - Administrasi
@endsection
@section('corejs')
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{base_url()}}assets/js/pages/datatables_basic.js"></script>
@endsection
@section('content')
	<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="{{base_url('superuser')}}"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active"><a href="#">Artikel</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Daftar Artikel</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-heading">
							<a href="{{base_url('superuser/artikel/create')}}"><button type="button" class="btn bg-teal-400 btn-labeled"><b><i class="icon-plus-circle2"></i></b> Tambah Artikel</button></a>
						</div>
						<table class="table table-striped datatable-basic table-lg table-responsive">
		                    <thead>
		                        <tr>
		                        	<th>No</th>
		                        	<th>Gambar</th>
		                            <th>Artikel</th>
		                            <th>Kategori</th>
		                            <th>Di Lihat</th>
		                            <th>Status</th>
		                            <th class="text-center">Aksi</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    	@foreach($artikel as $key => $result)
		                         <tr>
		                        	<td align="center">{{($key+1)}}</td>
			                        <td>
				                        <a href="{{$result->cover}}" data-popup="lightbox">
					                        <img src="{{img_artikel($result->cover)}}" alt="{{$result->cover}}" class="img-rounded img-preview" style="object-fit: cover;height: 70px;">
				                        </a>
			                        </td>
			                        <td style="width:300px;">
			                        	<a href="{{base_url('superuser/artikel/update/'.$result->id_artikel.'/'.seo($result->judul))}}">
			                        		<b>{{ucwords(read_more($result->judul,30))}}</b>
			                        	</a><br>
			                        	<span class="text-size-mini">
			                        	Tanggal Publish : {{tgl_indo($result->created_at)}}
			                        	</span><br>
			                        	<span class="text-size-small text-muted">
			                        		{{read_more(strip_tags($result->deskripsi),30)}}
			                        	</span>
			                        </td>
			                        <td align="center">
			                        	<a href="{{base_url('superuser/kategori/'.$result->id_kategori)}}">
			                        		<span class="label label-warning"><i class="fa fa-tags"></i> &nbsp;{{read_more(@$result->nama,20)}}</span>
			                        	</a>
			                        </td>
			                        <td align="center">
			                        	<span class="label label-success"><i class="icon-eye"></i> &nbsp;{{$result->view}} Di Lihat</span>
			                        </td>
			                        <td align="center">
			                        	@if($result->status==1)
			                        		<span class="label label-default label-icon" data-popup="tooltip" title="Draft"><i class="icon-pencil5"></i></span>
			                        	@else
			                        		<span class="label label-primary label-icon" data-popup="tooltip" title="Terpublikasikan"><i class="icon-check"></i></span>
			                        	@endif
			                        </td>
			                      
			                        <td class="text-center">
			                           <div class="btn-group">
					                    	<button type="button" class="btn btn-danger btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown"><i class="icon-cog5 position-left"></i> Action <span class="caret"></span></button>
					                    	<ul class="dropdown-menu dropdown-menu-right">
					                    		<li>
													<a href="{{base_url('main/news/detail/'.$result->id_artikel.'/'.seo($result->judul))}}" target="_blank">
														<i class="fa fa-eye"></i> Lihat Artikel Website
													</a>
												</li>
												<li>
													<a href="{{base_url('superuser/artikel/update/'.$result->id_artikel.'/'.seo($result->judul))}}">
														<i class="fa fa-edit"></i> Ubah Artikel
													</a>
												</li>
												<li><a href="javascript:void(0)" onclick="deleteIt(this)" 
												data-url="{{base_url('superuser/artikel/deleted/'.$result->id_artikel.'/'.seo($result->judul))}}">
														<i class="fa fa-trash"></i> Hapus Artikel
													</a>
												</li>
											</ul>
										</div>
			                        </td>
		                        </tr>
		                        @endforeach
		                    </tbody>
		                </table>
					</div>
					<!-- /basic datatable -->					

				</div>
				<!-- /content area -->

			</div>
@endsection