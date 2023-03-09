<?php require_once('config/main.php');
$data_pembelian = mysqli_query($koneksi,"select * from user");
$data_sppd=mysqli_query($koneksi,"select * from sppd");
$data_pegawai=mysqli_query($koneksi,"select * from pegawai");
$data_jabatan=mysqli_query($koneksi,"select * from jabatan");
$data_pendidikan=mysqli_query($koneksi,"select * from pendidikan");
$perubahan_pangkat=mysqli_query($koneksi, "select * from prb_pangkat");
$data_keseluruhan=mysqli_query($koneksi,"SELECT 
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
");
 ?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysqli_num_rows($data_pegawai); ?></h3>
          <p>Data Pegawai</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="./?page=data_pegawai" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysqli_num_rows($data_jabatan); ?></h3>
          <p>Data Jabatan</p>
        </div>
        <div class="icon">
          <i class="fa fa-group"></i>
        </div>
        <a href="./?page=data_jabatan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysqli_num_rows($data_pendidikan); ?></h3>
          <p>Data Pendidikan</p>
        </div>
        <div class="icon">
          <i class="fa fa-graduation-cap"></i>
        </div>
        <a href="./?page=data_pendidikan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysqli_num_rows($data_keseluruhan); ?></h3>
          <p>Data Keseluruhan</p>
        </div>
        <div class="icon">
          <i class="fa fa-file"></i>
        </div>
        <a href="./?page=data_keseluruhan" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysqli_num_rows($data_sppd); ?></h3>
          <p>Data SPPD</p>
        </div>
        <div class="icon">
          <i class="fa fa-file"></i>
        </div>
        <a href="./?page=data_sppd" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo mysqli_num_rows($perubahan_pangkat); ?></h3>
          <p>Data Perubahan Pangkat</p>
        </div>
        <div class="icon">
          <i class="fa fa-file"></i>
        </div>
        <a href="./?page=perubahan_pangkat" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>