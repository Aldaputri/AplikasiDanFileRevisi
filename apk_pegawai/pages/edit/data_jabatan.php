<?php require_once('config/main.php');
$id = $_GET['id'];
$query=mysqli_query($koneksi, "select * from jabatan where id='$id'");
$data = mysqli_fetch_array($query);
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Edit Data jabatan</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	            <!-- text input -->
	            <input type="hidden" name="type" value="data_jabatan">
	            <input type="hidden" name="cmd" value="edit">
              <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

	            <div class="form-group">
              <label>NIP</label>
	              <div class="">
				  <?php
					$selected_n = $data['id'];
				  ?>
                   <select class="form-control" name="pegawai_id" id="">
				   <?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"select * from pegawai WHERE id = ".$data['pegawai_id']."");
while($q2=mysqli_fetch_array($query)){
?>
<option value="<?php echo $q2['id'] ?>"><?php echo $q2['nip'] ?> | <?php echo $q2['nama'] ?></option>
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
	              <label>Nama Jabatan</label>
	              <div class="">
                    <?php
					            $selected_nj = $data['nama_jabatan'];
					          ?>
                     <select class="form-control" name="nama_jabatan" id="">
                          <option value="CAMAT" <?php if ($selected_nj == 'CAMAT') {echo 'selected';}?>>CAMAT</option>
                          <option value="SEKRETARIS CAMAT" <?php if ($selected_nj == 'SEKRETARIS CAMAT') {echo 'selected';}?>>SEKRETARIS CAMAT</option>
                          <option value="SEKSI TATA PEMERINTAHAN" <?php if ($selected_nj == 'SEKSI TATA PEMERINTAHAN') {echo 'selected';}?>>SEKSI TATA PEMERINTAHAN</option>
                          <option value="SEKSI PEMBANGUNAN DAN KESEJAHTERAAN SOSIAL" <?php if ($selected_nj == 'SEKSI PEMBANGUNAN DAN KESEJAHTERAAN SOSIAL') {echo 'selected';}?>>SEKSI PEMBANGUNAN DAN KESEJAHTERAAN SOSIAL</option>
                          <option value="SEKSI PELAYANAN UMUM"  <?php if ($selected_nj == 'SEKSI PELAYANAN UMUM') {echo 'selected';}?>>SEKSI PELAYANAN UMUM</option>
                          <option value="SEKSI KETENTERAMAN DAN KETERTIBAN UMUM"<?php if ($selected_nj == 'SEKSI KETENTERAMAN DAN KETERTIBAN UMUM') {echo 'selected';}?>>SEKSI KETENTERAMAN DAN KETERTIBAN UMUM</option>
                          <option value="SEKSI PEMBERDAYAAN MASYARAKAT DAN DESA"<?php if ($selected_nj == 'SEKSI PEMBERDAYAAN MASYARAKAT DAN DESA') {echo 'selected';}?>>SEKSI PEMBERDAYAAN MASYARAKAT DAN DESA</option>
                          <option value="SUBBAGIAN UMUM DAN KEPEGAWAIAN" <?php if ($selected_nj == 'SUBBAGIAN UMUM DAN KEPEGAWAIAN') {echo 'selected';}?>>SUBBAGIAN UMUM DAN KEPEGAWAIAN</option>
                          <option value="SUBBAGIAN PERENCANAAN DAN KEUANGAN"<?php if ($selected_nj == 'SUBBAGIAN PERENCANAAN DAN KEUANGAN') {echo 'selected';}?>>SUBBAGIAN PERENCANAAN DAN KEUANGAN</option>
                      </select>
                </div>
	            </div>

				      <div class="form-group">
	              <label>Nama Pangkat</label>
	                <div class="">
                  <?php
					            $selected_np = $data['nama_pangkat'];
					          ?>
                    <select class="form-control" name="nama_pangkat">
                        <option value="PEMBINA UTAMA" <?php if ($selected_np == 'PEMBINA UTAMA') {echo 'selected';}?>>PEMBINA UTAMA</option>
                        <option value="PEMBINA UTAMA MADYA" <?php if ($selected_np == 'PEMBINA UTAMA MADYA') {echo 'selected';}?>>PEMBINA UTAMA MADYA</option>
                        <option value="PEMBINA UTAMA MUDA" <?php if ($selected_np == 'PEMBINA UTAMA MUDA') {echo 'selected';}?>>PEMBINA UTAMA MUDA</option>
                        <option value="PEMBINA TINGKAT I" <?php if ($selected_np == 'PEMBINA TINGKAT I') {echo 'selected';}?>>PEMBINA TINGKAT I</option>
                        <option value="PEMBINA" <?php if ($selected_np == 'PEMBINA') {echo 'selected';}?>>PEMBINA</option>
                        <option value="PENATA TINGKAT I" <?php if ($selected_np == 'PENATA TINGKAT I') {echo 'selected';}?>>PENATA TINGKAT I</option>
                        <option value="PENATA" <?php if ($selected_np == 'PENATA') {echo 'selected';}?>>PENATA</option>
                        <option value="PENATA MUDA TINGKAT I" <?php if ($selected_np == 'PENATA MUDA TINGKAT I') {echo 'selected';}?>>PENATA MUDA TINGKAT I</option>
                        <option value="PENATA MUDA" <?php if ($selected_np == 'PENATA MUDA') {echo 'selected';}?>>PENATA MUDA</option>
                        <option value="PENGATUR TINGKAT I" <?php if ($selected_np == 'PENGATUR TINGKAT I') {echo 'selected';}?>>PENGATUR TINGKAT I</option>
                        <option value="PENGATUR" <?php if ($selected_np == 'PENGATUR') {echo 'selected';}?>>PENGATUR</option>
                        <option value="PENGATUR MUDA TINGKAT I" <?php if ($selected_np == 'PENGATUR MUDA TINGKAT I') {echo 'selected';}?>>PENGATUR MUDA TINGKAT I</option>
                        <option value="PENGATUR MUDA" <?php if ($selected_np == 'PENGATUR MUDA') {echo 'selected';}?>>PENGATUR MUDA</option>
                        <option value="JURU TINGKAT I" <?php if ($selected_np == 'JURU TINGKAT I') {echo 'selected';}?>>JURU TINGKAT I</option>
                        <option value="JURU" <?php if ($selected_np == 'JURU') {echo 'selected';}?>>JURU</option>
                        <option value="JURU MUDA TINGKAT I" <?php if ($selected_np == 'JURU MUDA TINGKAT I') {echo 'selected';}?>>JURU MUDA TINGKAT I</option>
                        <option value="JURU MUDA" <?php if ($selected_np == 'JURU MUDA') {echo 'selected';}?>>JURU MUDA</option>
                    </select>
                  </div>
	            </div>

				      <div class="form-group">
	              <label>Golongan</label>
	                <div class="">
                    <?php 
                      $selected_gol = $data['golongan'];
                    ?>
                    <select class="form-control" name="golongan">
                        <option value="IV" <?php if ($selected_gol == 'IV') {echo 'selected';}?>>VI</option>
                        <option value="III" <?php if ($selected_gol == 'III') {echo 'selected';}?>>III</option>
                        <option value="II" <?php if ($selected_gol == 'II') {echo 'selected';}?>>II</option>
                        <option value="I" <?php if ($selected_gol == 'I') {echo 'selected';}?>>I</option> 
                    </select>
                  </div>
	            </div>

				      <div class="form-group">
	              <label>Ruang</label>
	                <div class="">
                    <?php 
                      $selected_r = $data['ruang'];
                    ?>
                    <select class="form-control" name="ruang">
                        <option value="D" <?php if ($selected_r == 'D') {echo 'selected';}?>>D</option>
                        <option value="C" <?php if ($selected_r == 'C') {echo 'selected';}?>>C</option>
                        <option value="B" <?php if ($selected_r == 'B') {echo 'selected';}?>>B</option>
                        <option value="A" <?php if ($selected_r == 'A') {echo 'selected';}?>>A</option> 
                    </select>
                  </div>
	            </div>
			
	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_jabatan" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>