@extends('main.template')
@section('content')
<section id="container">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="row">
                    
                    <!-- page content -->
                    <section id="page-sidebar" class="alignleft span8">
                        <div class="title-divider">
   <h3>Kuota Magang</h3>
   <div class="divider-arrow"></div>
</div>
<div class="block-grey" style="height: 300px">
    <div class="block-light">
        <div class="wrapper">
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Bidang</th>
					<th>Periode Magang</th>
					<th>Kuota</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($bidang as $key => $result)
				<tr>
					<td>{{($key+1)}}</td>
					<th>{{$result->nm_bidang}}</th>
					<th>{{$result->bulan."-".$result->tahun}}</th>
					<th>{{$result->kuota}}</th>
				</tr>
			@endforeach
			</tbody>
		</table>
        <!-- FORM -->
	<script src="jquery-1.10.2.min.js"></script>
	<script src="jquery.chained.min.js"></script>
	<!-- FORM -->
		
        </div>
    </div>
</div>
</section>	

           
                </div>
            </div>
        </div>
    </div>
</section>
@endsection