<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-info">
	        <div class="box-header">
	          <h3 class="box-title">Tambah Data Perubahan Pangkat</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="tambah.php?tambah=perubahan_pangkat">
	          	<input type="hidden" name="type" value="perubahan_pangkat">
	           <input type="hidden" name="cmd" value="tambah">
	            <!-- text input -->
	            <div class="form-group">
				<label>Pilh Nama Pegawai</label>
	              <div class="">
                    <select class="form-control" name="pegawai_id" id="pegawai">
						<option value="" >--pilih--</option>
							<?php 
								require_once('../../config/main.php'); 
								// $query=mysqli_query($koneksi,"SELECT p.nama, p.nip, j.nama_pangkat, j.golongan, j.ruang FROM pegawai p INNER JOIN jabatan j ON p.id=j.pegawai_id");
								$query=mysqli_query($koneksi,"SELECT * FROM pegawai");
								while($q=mysqli_fetch_array($query)){
							?>
						<option value="<?php echo $q['id'] ?>"><?php echo $q['nama'] ?> | <?php echo $q['nip'] ?>></option>
							<?php }?>
                    </select>
				  </div>
	            </div>
	            <!-- textarea -->

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Pilih</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=spk" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>