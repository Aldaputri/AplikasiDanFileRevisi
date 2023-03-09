<?php require_once('config/main.php'); 
$query=mysqli_query($koneksi,"SELECT * FROM pegawai");
?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pegawai ( Terdapat <?php echo mysqli_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body"  >
	<div class="col">
    <?php if ($_SESSION['username'] == 'admin'){
			?>
    <a href="tambah.php?tambah=data_pegawai" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> 
		<i class="fa fa-plus"></i> Tambah Data Pegawai</a>
	<a href="pages/reports/cetak_data_pegawai.php"  target="_BLANK" style="margin-bottom: 10px;" class="btn btn-md btn-primary">
		<i class="fa fa-print"></i> Cetak Data</a>
	<?php } ?>
	</div>
    <br>
		<table class="table table-bordered" id="tabel">
		<thead>
			 <tr>
		    <th>NO</th>
		    <th>NIP</th>
			<th>NAMA</th>
			<th>TEMPAT LAHIR</th>
		    <th>TANGGAL LAHIR</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>ALAMAT</th>
			<th>NO HP</th>

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
			<td><?php echo $q['tempat']?></td>
		    <td><?php echo $q['tgl']?></td>
			<td><?php echo $q['jenis_kelamin']?></td>
			<td><?php echo $q['agama']?></td>
			<td><?php echo $q['alamat']?></td>
		    <td><?php echo $q['nohp']?></td>
		

		    <td>
			<?php if ($_SESSION['username'] == 'admin'){
				?>
				<a class="btn btn-sm btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Edit</a>
				<a class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Hapus</a>
		    </td>
			<?php } ?>
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