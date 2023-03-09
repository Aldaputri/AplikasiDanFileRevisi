<?php require_once('config/main.php');
$query=mysqli_query($koneksi,"SELECT r.id, r.menjadi_pangkat, r.menjadi_golongan, r.menjadi_ruang, r.tmt_pangkat, p.nama, p.nip, j.nama_pangkat, j.golongan, j.ruang FROM prb_pangkat r
INNER JOIN pegawai p ON r.id_pegawai = p.id 
INNER JOIN jabatan j ON r.id_pegawai = j.pegawai_id 
");
?>

 <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Perubahan Pangkat ( Terdapat <?php echo mysqli_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
	<div class="col">
		<?php if ($_SESSION['username'] == 'admin'){
			?>
		<a href="tambah.php?tambah=perubahan_pangkat" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> 
		<i class="fa fa-plus"></i> Tambah Data Perubahan Pangkat</a>
		<a href="pages/reports/cetak_perubahan_pangkat.php" target="_BLANK" style="margin-bottom: 10px;" class="btn btn-md btn-primary">
		 <i class="fa fa-print"></i> Cetak Data</a>
		<?php } ?>
	</div>
		<table class="table table-bordered" id="tabel">
			<thead>
				<tr>
				<th>NO</th>
				<th>NIP</th>
				<th>NAMA</th>
				<th>PANGKAT SEBELUMNYA</th>
				<th>PANGKAT TERAKHIR</th>
				<th>TANGGAL TMT</th>
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
				<td><?php echo $q['nip']?></td>
				<td><?php echo $q['nama']?></td>
				<td><?php echo $q['nama_pangkat'] ?> (<?php echo $q['golongan'] ?>/ <?php echo $q['ruang'] ?>)</td>
				<td><?php echo $q['menjadi_pangkat'] ?> (<?php echo $q['menjadi_golongan'] ?>/ <?php echo $q['menjadi_ruang'] ?>)</td>
				<td><?php echo $q['tmt_pangkat']?></td>
				
				<td>
				<?php if ($_SESSION['username'] == 'admin'){
			?>
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