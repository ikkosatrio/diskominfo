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
   <h3>Pendaftaran Peserta</h3>
   <div class="divider-arrow"></div>
</div>
<div class="block-grey">
    <div class="block-light">
        <div class="wrapper">
		<h3>Harap isi sesuai dengan biodata Anda</h3>
        <!-- FORM -->
	<form method="POST" id="form-registration" enctype="multipart/form-data" class="form-horizontal" action="{{base_url('authentication/register/member')}}">
		<div class="control-group">
			<label class="control-label" for="nim"><b>Nama Peserta</b></label>
			<div class="controls">
				<input class="input-large" type="text" id="nama" name="nama" required=""><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="bidang_minat"><b>Jenjang Pendidikan</b></label>
			<div class="controls">
				<select class="span3 chosen-select" name="jenjang" id="jenjang">
					<option value="">==Pilih Jenjang==</option>
					<option value="SMK">SMK</option>
					<option value="D3">D3</option>
					<option value="D4">D4</option>
					<option value="Perguruan Tinggi">Perguruan Tinggi</option>				
				</select><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="nama"><b>Nama Sekolah / PT</b></label>
			<div class="controls">
				<input class="input-xlarge" type="text" id="sekolah" name="sekolah" required=""><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telp"><b>Program Studi</b></label>
			<div class="controls">
				<input class="input-medium" type="text" id="program_studi" name="program_studi" required=""><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="telp"><b>Email / Username</b></label>
			<div class="controls">
				<input class="input-medium" type="email" id="email" name="email" required=""><font color="red"> *</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password"><b>Password</b></label>
			<div class="controls">
				<input class="input-medium" type="password" id="password" name="password" required=""><font color="red"> *<br>
				(Minimal 8 Karakter)</font>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="password"><b>Konfirmasi Password</b></label>
			<div class="controls">
				<input class="input-medium" type="password" id="passwordconf" name="passwordconf" required=""><font color="red"> *<br>
				(Minimal 8 Karakter)</font>
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
	<script type="text/javascript">
	$("#form-registration").submit(function(e){
    e.preventDefault();
    var formData = new FormData( $("#form-registration")[0] );

    $.ajax({
      url:    $("#form-registration").attr('action'),
      type:   "POST",
      data:     new FormData(this),
          processData: false,
          contentType: false,
    })
    .done(function(data){
      alert(data.msg)
    })
    .fail(function() {
        alert("something wrong")
     })
  })
	</script>
		
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