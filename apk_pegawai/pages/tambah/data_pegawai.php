<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Tambah Data Pegawai</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body" >
	          <form role="form" method="post" action="simpan.php">
	            <!-- text input -->
	            <input type="hidden" name="type" value="data_pegawai">
	            <input type="hidden" name="cmd" value="tambah">

	            <div class="form-group">
	              <label>Nip</label>
	              <input type="number" class="form-control" name="nip" placeholder="Nip" value=""/>
	            </div>

				<div class="form-group">
	              <label>Nama Pegawai</label>
	              <input type="text" class="form-control" name="nama" placeholder="Nama" value=""/>
	            </div>

				<div class="form-group">
	              <label>Tempat Lahir</label>
	              <input type="text" class="form-control" name="tempat" placeholder="Tempat" value=""/>
	            </div>

				<div class="form-group">
	              <label>Tanggal Lahir</label>
	              <input type="date" class="form-control" name="tgl" placeholder="Tgl" value=""/>
	            </div>

				<div class="form-group">
	              <label>Jenis Kelamin</label>
				  <div class="">
					<select class="form-control" name="jenis_kelamin" id="">
						<option value="">Pilih</option>
						<option value="Laki-laki">Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				  </div>
	            </div>

				<div class="form-group">
	              <label>Agama</label>
	              <input type="text" class="form-control" name="agama" placeholder="Agama" value=""/>
	            </div>

	            <!-- textarea -->
	            <div class="form-group">
	              <label>Alamat</label>
	              <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
	            </div>
				
	            <div class="form-group">
	              <label>No Hp</label>
	              <input type="number" class="form-control" name="nohp" placeholder="Nohp" value=""/>
	            </div>

	            <button type="submit" name="simpan" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=data_pegawai" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>