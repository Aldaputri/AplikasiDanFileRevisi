
<?php require_once('config/main.php'); 
// $query=mysqli_query($koneksi, "SELECT * FROM prb_pangkat WHERE id=".$_GET['id']);
$query=mysqli_query($koneksi, "SELECT p.nama, p.nip, j.nama_jabatan, j.nama_pangkat, j.golongan, j.ruang, r.menjadi_pangkat, r.menjadi_golongan, r.menjadi_ruang, r.tmt_pangkat FROM prb_pangkat r
INNER JOIN pegawai p ON r.id_pegawai = p.id 
INNER JOIN jabatan j ON r.id_pegawai = j.pegawai_id
WHERE r.id=".$_GET['id']);
$data = mysqli_fetch_array($query);


?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Edit Data Perubahan Pangkat</h3>
	        </div>
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          	<input type="hidden" name="type" value="perubahan_pangkat">
	           <input type="hidden" name="cmd" value="edit">
			   <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	            
	           <!-- text input -->
			   <div class="form-group">
				<label>Nama Pegawai</label>
	              <div class="">
                    <input type="text" value="<?php echo $data['nama'] ?> - <?php echo $data['nip'] ?> | <?php echo $data['nama_pangkat'] ?> (<?php echo $data['golongan'] ?>/ <?php echo $data['ruang'] ?>)" class="form-control" readonly/>
				  </div>
	            </div>
	            <!-- textarea -->

				<div class="form-group">
	              <label>Menjadi Pangkat</label>
	                <div class="">
						<?php
						$pangkat = $data['menjadi_pangkat'];
						?>
                    <select class="form-control" name="pangkat" id="">
                        <option <?php if ($pangkat == 'PEMBINA UTAMA'){ echo 'selected';} ?> value="PEMBINA UTAMA">PEMBINA UTAMA</option>
                        <option <?php if ($pangkat == 'PEMBINA UTAMA MADYA'){ echo 'selected';} ?> value="PEMBINA UTAMA MADYA">PEMBINA UTAMA MADYA</option>
                        <option <?php if ($pangkat == 'PEMBINA UTAMA MUDA'){ echo 'selected';} ?> value="PEMBINA UTAMA MUDA">PEMBINA UTAMA MUDA</option>
                        <option <?php if ($pangkat == 'PEMBINA TINGKAT I'){ echo 'selected';} ?> value="PEMBINA TINGKAT I">PEMBINA TINGKAT I</option>
                        <option <?php if ($pangkat == 'PEMBINA'){ echo 'selected';} ?> value="PEMBINA">PEMBINA</option>
                        <option <?php if ($pangkat == 'PENATA TINGKAT I'){ echo 'selected';} ?> value="PENATA TINGKAT I">PENATA TINGKAT I</option>
                        <option <?php if ($pangkat == 'PENATA'){ echo 'selected';} ?> value="PENATA">PENATA</option>
                        <option <?php if ($pangkat == 'PENATA MUDA TINGKAT I'){ echo 'selected';} ?> value="PENATA MUDA TINGKAT I">PENATA MUDA TINGKAT I</option>
                        <option <?php if ($pangkat == 'PENATA MUDA'){ echo 'selected';} ?>  value="PENATA MUDA">PENATA MUDA</option>
                        <option <?php if ($pangkat == 'PENGATUR TINGKAT I'){ echo 'selected';} ?> value="PENGATUR TINGKAT I">PENGATUR TINGKAT I</option>
                        <option <?php if ($pangkat == 'PENGATUR '){ echo 'selected';} ?> value="PENGATUR">PENGATUR</option>
                        <option <?php if ($pangkat == 'PENGATUR MUDA TINGKAT I'){ echo 'selected';} ?> value="PENGATUR MUDA TINGKAT I">PENGATUR MUDA TINGKAT I</option>
                        <option <?php if ($pangkat == 'PENGATUR MUDA'){ echo 'selected';} ?> value="PENGATUR MUDA">PENGATUR MUDA</option>
                        <option <?php if ($pangkat == 'JURU TINGKAT I'){ echo 'selected';} ?> value="JURU TINGKAT I">JURU TINGKAT I</option>
                        <option <?php if ($pangkat == 'JURU'){ echo 'selected';} ?> value="JURU">JURU</option>
                        <option <?php if ($pangkat == 'JURU MUDA TINGKAT I'){ echo 'selected';} ?> value="JURU MUDA TINGKAT I">JURU MUDA TINGKAT I</option>
                        <option <?php if ($pangkat == 'JURU MUDA'){ echo 'selected';} ?> value="JURU MUDA">JURU MUDA</option>
                    </select>
                  </div>
	            </div>

				<div class="form-group">
	              <label>Golongan</label>
	                <div class="">
					<?php
						$golongan = $data['menjadi_golongan'];
						?>
                    <select class="form-control" name="golongan" id="">
                        <option <?php if ($golongan == 'VI'){ echo 'selected';} ?> value="VI">VI</option>
                        <option <?php if ($golongan == 'III'){ echo 'selected';} ?> value="III">III</option>
                        <option <?php if ($golongan == 'II'){ echo 'selected';} ?>value="II">II</option>
                        <option <?php if ($golongan == 'I'){ echo 'selected';} ?>value="I">I</option> 
                    </select>
                  </div>
	            </div>

				<div class="form-group">
	              <label>Ruang</label>
	                <div class="">
					<?php
						$ruang = $data['menjadi_ruang'];
						?>
                    <select class="form-control" name="ruang" id="">
                    <option value="">Pilih</option>
                        <option <?php if ($ruang == 'D'){ echo 'selected';} ?> value="D">D</option>
                        <option <?php if ($ruang == 'C'){ echo 'selected';} ?> value="C">C</option>
                        <option <?php if ($ruang == 'B'){ echo 'selected';} ?> value="B">B</option>
                        <option <?php if ($ruang == 'A'){ echo 'selected';} ?>  value="A">A</option> 
                    </select>
                  </div>
	            </div>

	            <div class="form-group">
	              <label>Tmt Pangkat</label>
	              <input type="date" class="form-control" name="tmt_pangkat" value="<?php echo $data['tmt_pangkat'] ?>"/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=perubahan_pangkat" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>