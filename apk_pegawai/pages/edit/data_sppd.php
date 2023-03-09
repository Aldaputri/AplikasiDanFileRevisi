
<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi, "select * from sppd where id=".$_GET['id']);
$data = mysqli_fetch_array($query);
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      
	      <div class="box box-warning">
	        <div class="box-header">
	          <h3 class="box-title">Edit Data SPPD</h3>
	        </div>
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="type" value="data_sppd">
	           <input type="hidden" name="cmd" value="edit">
			   <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	          
			   <div class="form-group">
	              <label>Tempat</label>
	              <input type="text" name="tempat" class="form-control" placeholder="Tempat" value="<?php echo $data['tempat']; ?>"/>
	            </div>
				<div class="form-group">
					<label>Bulan</label>
				  <?php
				  $bln  =$data['bulan'];
				  ?>
				  <select class="form-control" name="bulan" >
                        <option <?php if ($bln == "I"){ echo 'selected';} ?> value="I">I</option>
                        <option <?php if ($bln == "II"){ echo 'selected';} ?> value="II">II</option>
                        <option <?php if ($bln == "III"){ echo 'selected';} ?> value="III">III</option>
                        <option <?php if ($bln == "IV"){ echo 'selected';} ?> value="IV">IV</option>
                        <option <?php if ($bln == "V"){ echo 'selected';} ?> value="V">V</option>
                        <option <?php if ($bln == "VI"){ echo 'selected';} ?> value="VI">VI</option>
                        <option <?php if ($bln == "VII"){ echo 'selected';} ?> value="VII">VII</option>
                        <option <?php if ($bln == "VIII"){ echo 'selected';} ?> value="VIII">VIII</option>
                        <option <?php if ($bln == "IX"){ echo 'selected';} ?> value="IX">IX</option>
                        <option <?php if ($bln == "X"){ echo 'selected';} ?> value="X">X</option>
                        <option <?php if ($bln == "XI"){ echo 'selected';} ?> value="XI">XI</option>
                        <option <?php if ($bln == "XII"){ echo 'selected';} ?> value="XII">XII</option>
                    </select>
	            </div>
				<div class="form-group">
					<label>Tahun</label> 
	              <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="<?php echo $data['tahun']; ?>"/>
	            </div> 

				<div class="form-group">
	              <label>Nama</label>
	              <select class="form-control" name="pegawai">
					<option value="<?php echo $data['pegawai'] ?>" selected><?php echo $data['pegawai'] ?></option>
					<?php 
						require_once('config/main.php');
						$nama_selected = $data['pegawai'];
						$query=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nama !='$nama_selected'");
						while($q=mysqli_fetch_array($query)){
						?>
						<option value="<?php echo $q['nama'] ?>"><?php echo $q['nama'] ?></option>
						<?php }?>
                </select>
                </div>

				<div class="form-group">
	              <label>Tanggal Berangkat</label>
	              <input type="date" name="tgl_berangkat" class="form-control" placeholder="Tanggal Berangkat" value="<?php echo $data['tgl_berangkat']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Tannggal Kembali</label>
	              <input type="date" name="tgl_kembali" class="form-control" placeholder="Tanggal Kembali" value="<?php echo $data['tgl_kembali']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Uang Saku</label>
	              <input type="number" name="uang_saku" class="form-control" placeholder="Uang Saku" value="<?php echo $data['uang_saku']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Tujuan</label>
	              <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" value="<?php echo $data['tujuan']; ?>"/>
	            </div>

				<div class="form-group">
	              <label>Jenis Kendaraan</label>
	              <div class="">
				  <?php
					$selected_jk = $data['jenis_kendaraan'];
				  ?>
                    <select class="form-control" name="jenis_kendaraan" >
                        <option value="Motor Pribai" <?php if ($selected_jk == 'Motor Pribadi') {echo 'selected';}?>>Motor Pribai</option>
						<option value="Mobil Pribadi" <?php if ($selected_jk == 'Mobil pribadi') {echo 'selected';}?>>Mobil Pribadi</option>
						<option value="Travel" <?php if ($selected_jk == 'Travel') {echo 'selected';}?>>Travel</option>
						<option value="Pesawat Udara" <?php if ($selected_jk == 'Pesawat Udara') {echo 'selected';}?>>Pesawat Udara</option>
                    </select>
				  </div>
	            </div>

				<div class="form-group">
	              <label>Perihal</label>
	              <input type="text" name="perihal" class="form-control" placeholder="Perihal" value="<?php echo $data['perihal']; ?>"/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_sppd" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>