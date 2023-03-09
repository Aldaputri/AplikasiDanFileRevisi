<?php require_once('config/main.php');
$query=mysqli_query($koneksi,"SELECT A.*,B.*,A.id id1 FROM pegawai B RIGHT JOIN pendidikan A ON a.pegawai_id = b.id");
 ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pendidikan ( Terdapat <?php echo mysqli_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
	<div class="col">
    <?php if ($_SESSION['username'] == 'admin'){
			?>
     <a href="tambah.php?tambah=data_pendidikan" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> 
	 <i class="fa fa-plus"></i> Tambah Data Pendidikan</a>
	 <?php } ?>
	</div>
		<table width="100%" class="table table-bordered" id="tabel">
		<thead>
			
		  <tr>
		    <th>NO</th>
			<th>NIP</th>
			<th>NAMA</th>
		    <th>NAMA SEKOLAH</th>
			<th>FAKULTAS</th>
			<th>JURUSAN</th>
			<th>TINGKAT PEND</th>
			<th>TAHUN LULUS</th>
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
			<td><?php echo $q['nama_sekolah']?></td>
			<td><?php echo $q['fakultas']?></td>
		    <td><?php echo $q['jurusan']?></td>
			<td><?php echo $q['tingkat_pendidikan']?></td>
			<td><?php echo $q['tahun_lulus']?></td>
			
			
			<td>
			<?php if ($_SESSION['username'] == 'admin'){
				?>
				<a class="btn btn-sm btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['id1']; ?>">Edit</a>
				<a class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id1']; ?>">Hapus</a>
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