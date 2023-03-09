<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Tambah Data jabatan</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	            <!-- text input -->
	            <input type="hidden" name="type" value="data_jabatan">
	            <input type="hidden" name="cmd" value="tambah">
                <div class="form-group">
                  <label>Pilih Pegawai</label>
                  <div class="">
                      <select class="form-control" name="pegawai_id" id="">
                        <option value="">Pilih</option>
                          <?php require_once('config/main.php'); 
                            $query=mysqli_query($koneksi,"select * from pegawai");
                            while($q=mysqli_fetch_array($query)){
                            ?>
                            <option value="<?php echo $q['id'] ?>"><?php echo $q['nama'] ?> | <?php echo $q['nip'] ?></option>
                          <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Jabatan</label>
                  <div class="">
                      <select class="form-control" name="nama_jabatan" id="">
                          <option value="">Pilih</option>
                          <option value="CAMAT">CAMAT</option>
                          <option value="SEKRETARIS CAMAT">SEKRETARIS CAMAT</option>
                          <option value="SEKSI TATA PEMERINTAHAN">SEKSI TATA PEMERINTAHAN</option>
                          <option value="SEKSI PEMBANGUNAN DAN KESEJAHTERAAN SOSIAL">SEKSI PEMBANGUNAN DAN KESEJAHTERAAN SOSIAL</option>
                          <option value="SEKSI PELAYANAN UMUM">SEKSI PELAYANAN UMUM</option>
                          <option value="SEKSI KETENTERAMAN DAN KETERTIBAN UMUM">SEKSI KETENTERAMAN DAN KETERTIBAN UMUM</option>
                          <option value="SEKSI PEMBERDAYAAN MASYARAKAT DAN DESA">SEKSI PEMBERDAYAAN MASYARAKAT DAN DESA</option>
                          <option value="SUBBAGIAN UMUM DAN KEPEGAWAIAN">SUBBAGIAN UMUM DAN KEPEGAWAIAN</option>
                          <option value="SUBBAGIAN PERENCANAAN DAN KEUANGAN">SUBBAGIAN PERENCANAAN DAN KEUANGAN</option>
                      </select>
                  </div>
                </div>
				      <div class="form-group">
	              <label>Nama Pangkat</label>
	                <div class="">
                    <select class="form-control" name="nama_pangkat" id="">
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
                        <option value="IV">IV</option>
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
			
	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=data_jabatan" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>