<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-warning">
	        <div class="box-header">
	          <h3 class="box-title">Tambah Data SPPD</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="type" value="data_sppd">
	           <input type="hidden" name="cmd" value="tambah">
	            <!-- text input -->
	            <div class="form-group">
	              <label>Tempat</label>
	              <input type="text" name="tempat" class="form-control" placeholder="Tempat" value=""/>
	            </div>
				<div class="form-group">
	              <input type="hidden" name="bulan" class="form-control" placeholder="Bulan" value="<?php $array_bln= array(1=>"I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"); $bln = $array_bln[date('n')]; echo $bln ?>"/>
	            </div>
				<div class="form-group"> 
	              <input type="hidden" name="tahun" class="form-control" placeholder="Tahun" value="<?php echo date('Y') ?>"/>
	            </div>
				<div class="form-group">
	              <label>Nama</label>
	              <div class="">
                    <select class="form-control" name="pegawai" id="">
						<option value="">--pilih--</option>
					<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"select * from pegawai");
while($q=mysqli_fetch_array($query)){
?>
<option value="<?php echo $q['nama'] ?>"> <?php echo $q['nama'] ?></option>
<?php }?>
                    </select>
				  </div>
                </div>
				<div class="form-group">
	              <label>Tanggal Berangkat</label>
	              <input type="date" name="tgl_berangkat" class="form-control" placeholder="Tanggal Berangkat" value=""/>
	            </div>
				<div class="form-group">
	              <label>Tanggal Kembali</label>
	              <input type="date" name="tgl_kembali" class="form-control" placeholder="Tanggal Kembali" value=""/>
	            </div>
				<div class="form-group">
	              <label>Uang Saku</label>
	              <input type="number" name="uang_saku" class="form-control" placeholder="Uang Saku" value=""/>
	            </div>
				<div class="form-group">
	              <label>Tujuan</label>
	              <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" value=""/>
	            </div>
				<div class="form-group">
	              <label>Jenis Kendaraan</label>
	              <div class="">
                    <select class="form-control" name="jenis_kendaraan" id="">
                        <option value="">Pilih</option>
                        <option value="Motor Pribai">Motor Pribai</option>
						<option value="Mobil Pribadi">Mobil Pribadi</option>
						<option value="Travel">Travel</option>
						<option value="Pesawat Udara">Pesawat Udara</option>
                    </select>
				  </div>
	            </div>
				<div class="form-group">
	              <label>Perihal</label>
	              <input type="text" name="perihal" class="form-control" placeholder="Perihal" value=""/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=data_sppd" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>