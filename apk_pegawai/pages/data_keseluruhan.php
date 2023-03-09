<?php 
require_once('config/main.php');
// $query=mysqli_query($koneksi,"SELECT * FROM keseluruhan 
// INNER JOIN jabatan 		ON keseluruhan.jabatan_id = jabatan.id 
// INNER JOIN pendidikan 	ON keseluruhan.pendidikan_id = pendidikan.id 
// INNER JOIN pegawai 		ON pendidikan.pegawai_id = pegawai.id");

$query=mysqli_query($koneksi,"SELECT 
p.nip, 
p.nama, 
p.tgl, 
j.nama_pangkat, 
j.golongan, 
j.nama_jabatan, 
d.tingkat_pendidikan, 
d.jurusan, 
d.tahun_lulus  

FROM pegawai p
INNER JOIN jabatan j ON p.id = j.pegawai_id
INNER JOIN pendidikan d ON p.id = d.pegawai_id

")
?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Keseluruhan ( Terdapat <?php echo mysqli_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
		<div class="col">
		<?php if ($_SESSION['username'] == 'admin'){
			?>
		<a href="pages/reports/cetak_data_keseluruhan.php" target="_BLANK" style="margin-bottom: 10px;" class="btn btn-md btn-primary">
		 <i class="fa fa-print"></i> Cetak Data</a>
		<?php } ?>
		</div>
	<br><br>
		<table width="100%" class="table table-bordered" id="tabel">
		<thead>
			
		  <tr>
		    <th>NO</th>
		    <th>NIP</th>
			<th>NAMA</th>
			<th>TGL LAHIR</th>
		    <th>PANGKAT</th>
			<th>GOL/RUANG</th>
			<th>JABATAN</th>
			<th>TINGKAT PEND</th>
			<th>JURUSAN</th>
			<th>TAHUN LULUS</th>
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
			<td><?php echo $q['tgl']?></td>
			<td><?php echo $q['nama_pangkat']?></td>
		    <td><?php echo $q['golongan']?></td>
			<td><?php echo $q['nama_jabatan']?></td>
			<td><?php echo $q['tingkat_pendidikan']?></td>
			<td><?php echo $q['jurusan']?></td>
			<td><?php echo $q['tahun_lulus']?></td>
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