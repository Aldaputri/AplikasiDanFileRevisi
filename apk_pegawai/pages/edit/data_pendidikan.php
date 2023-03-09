<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi, "select * from pendidikan where id=".$_GET['id']);
$data = mysqli_fetch_array($query);
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-success">
	        <div class="box-header">
	          <h3 class="box-title">Edit Data Pendidikan</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
			  <input type="hidden" name="type" value="data_pendidikan">
	            <input type="hidden" name="cmd" value="edit">
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

	            <div class="form-group">
	              <label>Nip</label>
	              <div class="">
				  <?php
					$selected_n = $data['id'];
				  ?>
                   <select class="form-control" name="pegawai_id" id="">
				   <?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"select * from pegawai WHERE id = ".$data['pegawai_id']."");
while($q1=mysqli_fetch_array($query)){
?>
<option value="<?php echo $q1['id'] ?>"><?php echo $q1['nip'] ?> | <?php echo $q1['nama'] ?></option>
<?php }?>
					<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"select * from pegawai");
while($q=mysqli_fetch_array($query)){
?>
<option value="<?php echo $q['id'] ?>"><?php echo $q['nip'] ?> | <?php echo $q['nama'] ?></option>
<?php }?>
                    </select>
				  </div>
                </div>
	            
	            

	            <div class="form-group">
	              <label>Nama Sekolah</label>
	              <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" value="<?php echo $data['nama_sekolah']; ?>"/>
	            </div>

	            <div class="form-group">
	              <label>Fakultas</label>
	              <input type="text" name="fakultas" class="form-control" placeholder="Fakultas" value="<?php echo $data['fakultas']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Jurusan</label>
	              <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="<?php echo $data['jurusan']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Tingkat Pendidikan</label>
	              <div class="">
				  <?php
					$selected_tp = $data['tingkat_pendidikan'];
				  ?>
                    <select class="form-control" name="tingkat_pendidikan" >
                        <option value="D1" <?php if ($selected_tp == 'D1') {echo 'selected';}?>>D1</option>
						<option value="D2" <?php if ($selected_tp == 'D2') {echo 'selected';}?>>D2</option>
						<option value="D3" <?php if ($selected_tp == 'D3') {echo 'selected';}?>>D3</option>
						<option value="S1" <?php if ($selected_tp == 'S1') {echo 'selected';}?>>S1</option>
						<option value="S2" <?php if ($selected_tp == 'S2') {echo 'selected';}?>>S2</option>
						<option value="S3" <?php if ($selected_tp == 'S3') {echo 'selected';}?>>S3</option>
                    </select>
				  </div>
                </div>

				<div class="form-group">
	              <label>Tahun Lulus</label>
	              <input type="number" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus" value="<?php echo $data['tahun_lulus']; ?>"/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_pembelian" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>