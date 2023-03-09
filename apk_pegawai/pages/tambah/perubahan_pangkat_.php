
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
				<label>NAMA</label>
	              <div class="">
                    <input type="text" value="<?php echo $s['nama'] ?>" readonly>
				  </div>
	            </div>
	            <!-- textarea -->
	            
	            <div class="form-group">
	              <label>DARI PANGKAT</label>
				  <input type="text" value="<?php echo $q['nama_pangkat'] ?>" class="form-control"/>
	            </div>
	            
	            <div class="form-group">
	              <label>MENJADI PANGKAT</label>
	              <input type="text" class="form-control" name="menjadi_pangkat" placeholder="Menjadi Pangkat" value=""/>
	            </div>

	            <div class="form-group">
	              <label>TMT PANGKAT</label>
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