<?php 

require "config/main.php";
$type = trim($_POST['type']);
$cmd = trim($_POST['cmd']);

switch ($type) {
	case 'data_pegawai':
		if ($cmd=="tambah") {
			mysqli_query($koneksi, "INSERT INTO pegawai(nip,nama,tempat,tgl,jenis_kelamin,agama,alamat,nohp)
			VALUES('$_POST[nip]',
					'$_POST[nama]',
					'$_POST[tempat]',
					'$_POST[tgl]',
					'$_POST[jenis_kelamin]',
					'$_POST[agama]',
					'$_POST[alamat]',
					'$_POST[nohp]')");
		}
		elseif($cmd=="edit") {
			mysqli_query($koneksi, "UPDATE pegawai SET 
				nip				='$_POST[nip]',
				nama			='$_POST[nama]',
				tempat			='$_POST[tempat]',
				tgl				='$_POST[tgl]',
				jenis_kelamin	='$_POST[jenis_kelamin]',
				agama			='$_POST[agama]',
				alamat			='$_POST[alamat]',
				nohp			='$_POST[nohp]'
				WHERE id		='$_POST[id]'");
		}
		else {
			die(); 
		}
		header('Location:index.php?page=data_pegawai');
		break;


	case 'data_jabatan':
		if ($cmd=="tambah") {
			mysqli_query($koneksi, "INSERT INTO jabatan(pegawai_id,nama_jabatan,nama_pangkat,golongan,ruang)
			VALUES('$_POST[pegawai_id]',
				   '$_POST[nama_jabatan]',
				   '$_POST[nama_pangkat]',
				   '$_POST[golongan]',
				   '$_POST[ruang]')");
		}
		elseif($cmd=="edit") {
			mysqli_query($koneksi,"UPDATE jabatan SET
				pegawai_id			='$_POST[pegawai_id]', 
				nama_jabatan		='$_POST[nama_jabatan] ',
				nama_pangkat		='$_POST[nama_pangkat]',
				golongan			='$_POST[golongan]',
				ruang				='$_POST[ruang]'
				WHERE id			='$_POST[id]'");
		}
		else {
			die(); 
		}
		header('Location:index.php?page=data_jabatan');
		break;


	case 'data_pendidikan':
		if ($cmd=="tambah") {
			mysqli_query($koneksi, "INSERT INTO pendidikan(pegawai_id,nama_sekolah,fakultas,jurusan,tingkat_pendidikan,tahun_lulus)
			VALUES('$_POST[pegawai_id]',
				   '$_POST[nama_sekolah]',
				   '$_POST[fakultas]',
				   '$_POST[jurusan]',
				   '$_POST[tingkat_pendidikan]',
				   '$_POST[tahun_lulus]')");
		}
		elseif($cmd=="edit") {
			mysqli_query($koneksi, "UPDATE pendidikan SET 
				pegawai_id			='$_POST[pegawai_id]',
				nama_sekolah		='$_POST[nama_sekolah]',
				fakultas			='$_POST[fakultas]',
				jurusan				='$_POST[jurusan]',
				tingkat_pendidikan	='$_POST[tingkat_pendidikan]',
				tahun_lulus			='$_POST[tahun_lulus]'
				WHERE id			='$_POST[id]'");
		}
		else {
			die(); 
		}
		header('Location:index.php?page=data_pendidikan');
		break;


	case 'data_keseluruhan':
		if ($cmd=="tambah") {
			mysqli_query($koneksi, "INSERT INTO keseluruhan(jabatan_id,pendidikan_id)
			VALUES('$_POST[jabatan_id]',
					'$_POST[pendidikan_id]')");
			}
			else if($cmd=="edit") {
				mysqli_query($koneksi, "UPDATE pendidikan SET 
					jabatan_id			='$_POST[jabatan_id]',
					pendidikan_id		='$_POST[pendidikan_id]'
					WHERE id			='$_POST[id]'");
			}
			else {
				die(); 
			}
			header('Location:index.php?page=data_keseluruhan');
			break;

	case 'data_sppd':
		if ($cmd=="tambah") {
			// panggil data pangkat awal
			$nama = $_POST['pegawai'];
			$pegawai = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nama='$nama'");
			$nip = mysqli_fetch_array($pegawai);

			mysqli_query($koneksi, "INSERT INTO sppd(tempat,bulan,tahun,nip_pegawai,pegawai,tgl_berangkat,tgl_kembali,uang_saku,tujuan,jenis_kendaraan,perihal)
			VALUES('$_POST[tempat]',
				   '$_POST[bulan]',
				   '$_POST[tahun]',
				   '$nip[nip]',
				   '$_POST[pegawai]',
				   '$_POST[tgl_berangkat]',
				   '$_POST[tgl_kembali]',
				   '$_POST[uang_saku]',
				   '$_POST[tujuan]',
				   '$_POST[jenis_kendaraan]',
				   '$_POST[perihal]')");
		}
		elseif($cmd=="edit") {
			mysqli_query($koneksi, "UPDATE sppd SET 
				tempat			='$_POST[tempat]',
				bulan			='$_POST[bulan]',
				tahun			='$_POST[tahun]',
				pegawai			='$_POST[pegawai]',
				tgl_berangkat	='$_POST[tgl_berangkat]',
				tgl_kembali		='$_POST[tgl_kembali]',
				uang_saku		='$_POST[uang_saku]',
				tujuan			='$_POST[tujuan]',
				jenis_kendaraan	='$_POST[jenis_kendaraan]',
				perihal			='$_POST[perihal]'
				WHERE id		='$_POST[id]'");
		}
		else {
			die(); 
		}
		header('Location:index.php?page=data_sppd');
		break;

	case 'perubahan_pangkat':
		if ($cmd=="tambah") {
			// panggil data pangkat awal
			$id = $_POST['pegawai_id'];
			$p = mysqli_query($koneksi,"SELECT * FROM jabatan WHERE pegawai_id='$id'");
			$s = mysqli_fetch_array($p);
			$gabung = $s[nama_pangkat].' '.'('.$s[golongan].'/'.$s[ruang].')';
			
			// masukkan ke dalam database
			mysqli_query($koneksi, "INSERT INTO prb_pangkat(id_pegawai,pangkat_awal,menjadi_pangkat,menjadi_golongan, menjadi_ruang,tmt_pangkat)
			VALUES('$_POST[pegawai_id]',
				   '$gabung',
				   '$_POST[pangkat]',
				   '$_POST[golongan]',
				   '$_POST[ruang]',
				   '$_POST[tmt_pangkat]')");

			// update pangkat terbaru ke table jabatan
			mysqli_query($koneksi,"UPDATE jabatan SET 
				nama_pangkat='$_POST[pangkat]',
				golongan	='$_POST[golongan]',
				ruang		='$_POST[ruang]'
			WHERE 
				pegawai_id = $id");
		}
		elseif($cmd=="edit") {
			mysqli_query($koneksi,"UPDATE prb_pangkat SET nip='$_POST[nip] ',
				nama			='$_POST[nama]',
				dari_pangkat	='$_POST[dari_pangkat]',
				menjadi_pangkat	='$_POST[menjadi_pangkat]',
				tmt_pangkat		='$_POST[tmt_pangkat]'
				WHERE id		='$_POST[id]'");
		}
		else {
			die(); 
		}
		header('Location:index.php?page=perubahan_pangkat');
		break;


	case 'admin':
		if ($cmd=="tambah") {
			mysqli_query($koneksi,"INSERT INTO admin(nama,username,password)
			VALUES('$_POST[nama]',
				   '$_POST[username]',
				   '$_POST[password]')");
		}
		elseif($cmd=="edit") {
			mysqli_query($koneksi,"UPDATE admin SET nama='$_POST[nama]',
				username	='$_POST[username]',
				password	='$_POST[password]'
				WHERE id	='$_POST[id]'");
			
		}
		else {
			die(); 
		}
		header('Location:index.php?page=admin');
		break;
	
	default:
		require_once("pages/404.php");
		break;
}

 ?>