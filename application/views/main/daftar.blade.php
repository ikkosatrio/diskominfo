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
   <h3>Pendaftaran Mahasiswa SIM TKP UNTAG Surabaya</h3>
   <div class="divider-arrow"></div>
</div>
<div class="block-grey">
    <div class="block-light">
        <div class="wrapper">
		<h3>Harap isi sesuai dengan biodata Anda</h3>
        <!-- FORM -->
	<form method="POST" enctype="multipart/form-data" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="nim"><b>NBI</b></label>
			<div class="controls">
				<input class="input-large" type="text" id="nim" name="nim" required=""><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama"><b>Nama</b></label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="nama" name="nama" required=""><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="bidang_minat"><b>Bidang Minat</b></label>
			<div class="controls">
				<select class="span3 chosen-select" name="bidang_minat" id="bidang_minat">
					<option value="1">Sistem Informasi Bisnis</option><option value="2">Teknologi Multimedia dan Bergerak</option><option value="3">Kecerdasan Buatan dan Visi Komputer</option><option value="4">Teknologi Perangkat Keras dan Jaringan Komputer</option>				</select><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telp"><b>Telp/HP/WA</b></label>
			<div class="controls">
				<input class="input-medium" type="text" id="telp" name="telp" required=""><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><b>Email</b></label>
			<div class="controls">
				<input class="input-xlarge" type="email" id="email" name="email" required=""><font color="red"> *</font>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="username"><b>Username</b></label>
			<div class="controls">
				<input class="input-medium" type="text" id="username" name="username" required=""><font color="red"> *<br>
				(Isikan Kombinasi Huruf dan Angka Tanpa Simbol Maupun Spasi)</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password"><b>Password</b></label>
			<div class="controls">
				<input class="input-medium" type="password" id="password" name="password" required=""><font color="red"> *<br>
				(Isikan Kombinasi Huruf dan Angka Tanpa Simbol Maupun Spasi)</font>
			</div>
		</div>
		<font color="red"><b>*) Wajib diisi</b></font>
		<div class="controls">
			<button class="btn btn-primary btn-large" type="submit" name="simpan">
				Simpan
			</button>
			<a class="btn btn-primary btn-large" href="index.php?page=">
				Batal
			</a>
		</div>
	</form>
	<script src="jquery-1.10.2.min.js"></script>
	<script src="jquery.chained.min.js"></script>
	<script>
			$("#p1").chained("#bidang_minat");
			$("#p2").chained("#bidang_minat");
			$("#p3").chained("#bidang_minat");
	</script>
	<!-- FORM -->
		
        </div>
    </div>
</div>
                                       </section>

                    <!-- sidebar -->
                    @include('main/login')
                    <!-- sidebar -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection