<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Tambah Data Keseluruhan</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	            <!-- text input -->
	            <input type="hidden" name="type" value="data_keseluruhan">
	            <input type="hidden" name="cmd" value="tambah">

                
               
                <div class="form-group">
	              <label>Pegawai dan Pendidikan</label>
	              <div class="">
                    <select class="form-control" name="pendidikan_id" id="">
						<option value="">--pilih--</option>
					<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"SELECT A.*,B.*,A.id id1 FROM pegawai B RIGHT JOIN pendidikan A ON a.pegawai_id = b.id");
while($q=mysqli_fetch_array($query)){
?>
<option value="<?php echo $q['id1'] ?>"><?php echo $q['nama'] ?> (<?php echo $q['nip'] ?>) | <?php echo $q['tingkat_pendidikan'] ?> | <?php echo $q['jurusan'] ?>| <?php echo $q['tahun_lulus'] ?></option>
<?php }?>
                    </select>
				  </div>
                </div>
                <div class="form-group">
	              <label>Jabatan</label>
	              <div class="">
                    <select class="form-control" name="jabatan_id" id="">
						<option value="">--pilih--</option>
					<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"select * from jabatan");
while($q=mysqli_fetch_array($query)){
?>
<option value="<?php echo $q['id'] ?>"><?php echo $q['nama_pangkat'] ?> | <?php echo $q['golongan'] ?>| <?php echo $q['nama_jabatan'] ?></option>
<?php }?>
                    </select>
				  </div>
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