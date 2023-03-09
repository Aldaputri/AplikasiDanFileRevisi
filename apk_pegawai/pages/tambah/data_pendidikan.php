<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-success">
	        <div class="box-header">
	          <h3 class="box-title">Tambah Data Pendidikan</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
			  <input type="hidden" name="type" value="data_pendidikan">
	            <input type="hidden" name="cmd" value="tambah">
	            <div class="form-group">
	              <label>Nip</label>
	              <div class="">
                    <select class="form-control" name="pegawai_id" id="">
						<option value="">--pilih--</option>
					<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"select * from pegawai");
while($q=mysqli_fetch_array($query)){
?>
<option value="<?php echo $q['id'] ?>"><?php echo $q['nip'] ?> | <?php echo $q['nama'] ?></option>
<?php }?>
                    </select>
				  </div>
                </div>
	            <!-- textarea -->
	            
	            <div class="form-group">
	              <label>Nama Sekolah</label>
	              <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" value=""/>
	            </div>
	            <div class="form-group">
	              <label>Fakultas</label>
	              <input type="text" name="fakultas" class="form-control" placeholder="Fakultas" value=""/>
	            </div>
				<div class="form-group">
	              <label>Jurusan</label>
	              <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value=""/>
	            </div>
				<div class="form-group">
	              <label>Tingkat Pendidikan</label>
	              <div class="">
                    <select class="form-control" name="tingkat_pendidikan" id="">
                        <option value="">Pilih</option>
                        <option value="D1">D1</option>
						<option value="D2">D2</option>
						<option value="D3">D3</option>
						<option value="S1">S1</option>
						<option value="S2">S2</option>
						<option value="S3">S3</option>
                    </select>
				  </div>
                </div>
				<div class="form-group">
	              <label>Tahun Lulus</label>
	              <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" value=""/>
	            </div>
	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=data_pendidikan" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>