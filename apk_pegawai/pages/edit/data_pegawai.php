<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi, "select * from pegawai where id=".$_GET['id']);
$data = mysqli_fetch_array($query);
?>
<section>
	<div class="row">
		<div class="col-md-12 ">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Edit Data Pegawai</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	           <input type="hidden" name="type" value="data_pegawai">
	            <input type="hidden" name="cmd" value="edit">
	            <!-- text input -->

	            <div class="form-group">
	              <label>Nip</label>
	              <input type="number" class="form-control" name="nip" placeholder="Nip" value="<?php echo $data['nip']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Nama Pegawai</label>
	              <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Tempat Lahir</label>
	              <input type="text" class="form-control" name="tempat" placeholder="Tempat" value="<?php echo $data['tempat']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Tanggal Lahir</label>
	              <input type="date" class="form-control" name="tgl" placeholder="Tgl" value="<?php echo $data['tgl']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Jenis Kelamin</label>
				  <div class="">
					<?php
					$selected_jns = $data['jenis_kelamin'];
					?>
					<select class="form-control" name="jenis_kelamin">
						<option value="Laki-laki" <?php if ($selected_jns == 'Laki-laki') {echo 'selected';}?>>Laki</option>
						<option value="Perempuan" <?php if ($selected_jns == 'Perempuan') {echo 'selected';}?>>Perempuan</option>
					</select>
				  </div>
	            </div>

				<div class="form-group">
	              <label>Agama</label>
	              <input type="text" class="form-control" name="agama" placeholder="Agama" value="<?php echo $data['agama']; ?>"/>
	            </div>

	            <!-- textarea -->
	            <div class="form-group">
	              <label>Alamat</label>
	              <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
	            </div>

	            <div class="form-group">
	              <label>No Hp</label>
	              <input type="number" class="form-control" name="nohp" placeholder="Nohp" value="<?php echo $data['nohp']; ?>"/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_pegawai" class="btn btn-danger"> <i class="fa fa-times"></i>  Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>