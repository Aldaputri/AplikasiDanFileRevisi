<?php
require_once('config/main.php'); 
$query=mysqli_query($koneksi,"SELECT p.id, p.nama, p.nip, j.nama_pangkat, j.golongan, j.ruang FROM pegawai p INNER JOIN jabatan j ON p.id=j.pegawai_id");
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Tambah Data Perubahan Pangkat</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
			<form role="form" method="post" action="simpan.php">
	        	<input type="hidden" name="type" value="perubahan_pangkat">
	            <input type="hidden" name="cmd" value="tambah">
				

	            <!-- text input -->
	            <div class="form-group">
				<label>Pilih Pegawai | Pangkat Sebelumnya</label>
	              <div class="">
                    <select class="form-control" name="pegawai_id" id="pegawai">
						<option value="" >--pilih--</option>
							<?php 
								while($q=mysqli_fetch_array($query)){
							?>
						<option value="<?php echo $q['id'] ?>">
						<?php echo $q['nama'] ?> - <?php echo $q['nip'] ?> | <?php echo $q['nama_pangkat'] ?> (<?php echo $q['golongan'] ?>/ <?php echo $q['ruang'] ?>;)
						</option>
							<?php }?>
                    </select>
				  </div>
	            </div>
	            <!-- textarea -->

				<div class="form-group">
	              <label>Menjadi Pangkat</label>
	                <div class="">
                    <select class="form-control" name="pangkat" id="">
                        <option value="">Pilih</option>
                        <option value="PEMBINA UTAMA">PEMBINA UTAMA</option>
                        <option value="PEMBINA UTAMA MADYA">PEMBINA UTAMA MADYA</option>
                        <option value="PEMBINA UTAMA MUDA">PEMBINA UTAMA MUDA</option>
                        <option value="PEMBINA TINGKAT I">PEMBINA TINGKAT I</option>
                        <option value="PEMBINA">PEMBINA</option>
                        <option value="PENATA TINGKAT I">PENATA TINGKAT I</option>
                        <option value="PENATA">PENATA</option>
                        <option value="PENATA MUDA TINGKAT I">PENATA MUDA TINGKAT I</option>
                        <option value="PENATA MUDA">PENATA MUDA</option>
                        <option value="PENGATUR TINGKAT I">PENGATUR TINGKAT I</option>
                        <option value="PENGATUR">PENGATUR</option>
                        <option value="PENGATUR MUDA TINGKAT I">PENGATUR MUDA TINGKAT I</option>
                        <option value="PENGATUR MUDA">PENGATUR MUDA</option>
                        <option value="JURU TINGKAT I">JURU TINGKAT I</option>
                        <option value="JURU">JURU</option>
                        <option value="JURU MUDA TINGKAT I">JURU MUDA TINGKAT I</option>
                        <option value="JURU MUDA">JURU MUDA</option>
                    </select>
                  </div>
	            </div>

				<div class="form-group">
	              <label>Golongan</label>
	                <div class="">
                    <select class="form-control" name="golongan" id="">
                    <option value="">Pilih</option>
                        <option value="VI">VI</option>
                        <option value="III">III</option>
                        <option value="II">II</option>
                        <option value="I">I</option> 
                    </select>
                  </div>
	            </div>

				<div class="form-group">
	              <label>Ruang</label>
	                <div class="">
                    <select class="form-control" name="ruang" id="">
                    <option value="">Pilih</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="B">B</option>
                        <option value="A">A</option> 
                    </select>
                  </div>
	            </div>

	            <div class="form-group">
	              <label>Tmt Pangkat</label>
	              <input type="date" class="form-control" name="tmt_pangkat" placeholder="Tmt Pangkat" value=""/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=perubahan_pangkat" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>