<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"SELECT * FROM sppd ");
?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data SPPD ( Terdapat <?php echo mysqli_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
	<div class="col">
		<?php if ($_SESSION['username'] == 'admin'){
			?>
		<a href="tambah.php?tambah=data_sppd" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus">
		</i> Tambah Data SPPD</a>
		<a href="pages/reports/cetak_data_sppd.php" target="_BLANK" style="margin-bottom: 10px;" class="btn btn-md btn-primary">
		 <i class="fa fa-print"></i> Cetak Data</a>
		<?php } ?>
	</div>

		<table class="table table-bordered" id="tabel">
		<thead>
			<tr>
		    <th>NO</th>
		    <th>NO. SPPD</th>
			<th>NIP</th>
			<th>NAMA</th>
			<th>TGL BERANGKAT</th>
			<th>TGL KEMBALI</th>
			<th>UANG SAKU</th>
			<th>TUJUAN</th>
			<th>JENIS KENDARAAN</th>
			<th>PERIHAL</th>

		    <?php if (isset($_SESSION['username'])): ?>
		    <th></th>
			<?php endif; ?>
		  </tr>
		</thead>
		<tbody>
			<?php
		  $no=1;
		  while($q=mysqli_fetch_array($query)){
		  ?>
		  <tr>
		    <td><?php echo $no++; ?></td>          
		    <td><?php if($q['id'] < '10'){
				$no_srt = '00'.$q['id'].'';
			} elseif($q['id'] < '100'){
				$no_srt = '0'.$q['id'].'';
			}elseif($q['id'] < '1000'){
				$no_srt = ''.$q['id'].'';
			}
			 echo ''.$q['tempat'].'/'.$no_srt.'/SPPD/'.$q['bulan'].'/'.$q['tahun'].''?></td>
			<td><?php echo $q['nip_pegawai']?></td>
			<td><?php echo $q['pegawai']?></td>
			<td><?php echo $q['tgl_berangkat']?></td>
			<td><?php echo $q['tgl_kembali']?></td>
			<td><?php echo $q['uang_saku']?></td>
			<td><?php echo $q['tujuan']?></td>
			<td><?php echo $q['jenis_kendaraan']?></td>
			<td><?php echo $q['perihal']?></td>


		    <td>
			<?php if ($_SESSION['username'] == 'admin'){
				?>
				<form action="pages/reports/cetak_sppd_pegawai.php" target="_BLANK" method="post">
					<input type="text" name="id" value="<?php echo $q['id']; ?>" hidden>
					<button  type="submit" class="btn btn-sm btn-primary"  >Cetak</button>
				</form>
		    	<a class="btn btn-sm btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Edit</a>
		    	<a class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Hapus</a>
				<?php } ?>
				</td>

		  </tr>
		  <?php
		  }
		  ?>
		</tbody>
		  
		</table>
	</div>
</div>
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	 	$('#tabel').dataTable({
	          "bPaginate": true,
	          "bLengthChange": true,
	          "bFilter": true,
	          "bSort": true,
	          "bInfo": true,
	          "bAutoWidth": true
	    });
	 });
</script>