<?php
include('../../config/main.php');

$id = $_POST['id'];
$query = mysqli_query($koneksi, "SELECT 
s.tempat, s.bulan, s.tahun, s.pegawai, s.tgl_berangkat, s.tgl_kembali, s.uang_saku, s.tujuan, s.jenis_kendaraan, s.perihal,
p.nama, p.nip, p.id, j.pegawai_id, j.nama_jabatan, j.nama_pangkat, j.golongan, j.ruang 
FROM sppd s
INNER JOIN pegawai p ON s.pegawai = p.nama
INNER JOIN jabatan j ON p.id = j.pegawai_id 
WHERE s.id = '$id'");
$q = mysqli_fetch_array($query);

if($q['id'] < '10'){
    $no_srt = '00'.$q['id'].'';
} elseif($q['id'] < '100'){
    $no_srt = '0'.$q['id'].'';
}elseif($q['id'] < '1000'){
    $no_srt = ''.$q['id'].'';
}

$tgl1 = new DateTime ($q['tgl_berangkat']);
$tgl2 = new DateTime ($q['tgl_kembali']);
$jarak = $tgl2->diff($tgl1)->days + 1;
$hari = $jarak.' Hari';

// memanggil library FPDF
require('../../plugins/fpdf185/fpdf.php');




$waktu_sekarang = date('d F Y');

class Pdf extends FPDF

{

    function letak($gambar)

    {

        //memasukkan gambar untuk header

        $this->Image($gambar, 13, 8, 29, 29);

        //menggeser posisi sekarang

    }

    function judul($teks1, $teks2, $teks3)

    {

        $this->Cell(25);

        $this->SetFont('Times', 'B', '18');

        $this->Cell(0, 9, $teks1, 0, 1, 'C');

        $this->Cell(25);

        $this->Cell(0, 9, $teks2, 0, 1, 'C');

        $this->Cell(25);

        $this->SetFont('Times', 'I', '9');

        $this->Cell(0, 5, $teks3, 0, 1, 'C');


    }

    function garis()

    {

        $this->SetLineWidth(1);

        $this->Line(10, 37, 200, 37);

        $this->SetLineWidth(0);

        $this->Line(10, 38, 200, 38);

    }

}

//instantisasi objek

$pdf = new PDF('P','mm','A4');

//Mulai dokumen

$pdf->AddPage('P', 'A4');

//meletakkan gambar

$pdf->letak('../../plugins/fpdf185/barut.jpg');

//meletakkan judul disamping logo diatas

$pdf->judul('PEMERINTAH KABUPATEN BARITO UTARA', 'KECAMATAN GUNUNG TIMANG','Jalan A. Yani RT. 4 KM 4.5 Kandui Kec. Gung Timang, Kab. Barito Utara, Kalimantan Tengah Kode Pos : 73862');

//membuat garis ganda tebal dan tipis
$pdf->garis();

// Isi Laporan
$pdf->SetFont('Times','BU',13);
$pdf->Cell(200,10,'',0,1,'C');
$pdf->Cell(200,10,'SURAT PERINTAH PERJALANAN DINAS (SPPD)',0,1,'C');
$pdf->SetFont('Times','B',11);
$pdf->Cell(200,1,'Nomor Surat : '.$q['tempat'].' /'.$no_srt.' / SPPD /'.$q['bulan'].' /'.$q['tahun'],0,1,'C');

$pdf->Cell(10,13,'',0,1);
$pdf->SetFont('Times','',10);
$pdf->Cell(10,7,'1','TL',0,'C');
$pdf->Cell(80,7,'Pejabat berwenang yang memberi perintah','TL',0,'L');
$pdf->Cell(100,7,'CAMAT GUNUNG TIMANG','TLR',1,'L');
$pdf->Cell(10,6,'','BL',0,'C');
$pdf->Cell(80,6,'','BL',0,'L');
$pdf->Cell(100,6,'DENNY KURNIAWAN, S.T., M.Eng','BLR',1,'L');

$pdf->Cell(10,6,'2','TL',0,'C');
$pdf->Cell(80,6,'Nama pegawai yang diperintahkan','TL',0,'L');
$pdf->Cell(100,6,$q['pegawai'],'TLR',1,'L');
$pdf->Cell(10,5,'','L',0,'C');
$pdf->Cell(80,5,'','L',0,'L');
$pdf->Cell(100,5,$q['nip'],'LR',1,'L');

$pdf->Cell(10,6,'3','TL',0,'C');
$pdf->Cell(80,6,'a. Pangkat / Gol.Ruang','TL',0,'L');
$pdf->Cell(100,6,'a. '.$q['nama_pangkat'].' /'.$q['golongan'].'.'.$q['ruang'],'TLR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'b. Jabatan','L',0,'L');
$pdf->Cell(100,5,'b. '.$q['nama_jabatan'],'LR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'c. Gaji/Pokok','L',0,'L');
$pdf->Cell(100,5,'c.','LR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'d. Tingkat menurut Peraturan Perjalanan Dinas','L',0,'L');
$pdf->Cell(100,5,'d.','LR',1,'L');

$pdf->Cell(10,6,'4','TL',0,'C');
$pdf->Cell(80,6,'Maksud Perjalanan Dinas','TL',0,'L');
$pdf->Cell(100,6,$q['perihal'],'TLR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'','L',0,'L');
$pdf->Cell(100,5,'','LR',1,'L');

$pdf->Cell(10,6,'5','TL',0,'C');
$pdf->Cell(80,6,'Alat angkut yang dipergunakan','TL',0,'L');
$pdf->Cell(100,6,$q['jenis_kendaraan'],'TLR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'','L',0,'L');
$pdf->Cell(100,5,'','LR',1,'L');

$pdf->Cell(10,6,'6','TL',0,'C');
$pdf->Cell(80,6,'a. Tempat Berangkat','TL',0,'L');
$pdf->Cell(100,6,'a. Kec. Gunung Timang','TLR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'b. Tempat Tujuan','L',0,'L');
$pdf->Cell(100,5, 'b. '. $q['tujuan'],'LR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'','L',0,'L');
$pdf->Cell(100,5,'','LR',1,'L');

$pdf->Cell(10,6,'7','TL',0,'C');
$pdf->Cell(80,6,'a. Lamanya perjalanan dinas','TL',0,'L');
$pdf->Cell(100,6,'a. '.$hari,'TLR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'b. Tanggal berangkat','L',0,'L');
$pdf->Cell(100,5,'b. '.$q['tgl_berangkat'],'LR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'c. Tanggal harus kembali','L',0,'L');
$pdf->Cell(100,5,'c. '.$q['tgl_kembali'],'LR',1,'L');

$pdf->Cell(10,6,'8','TL',0,'C');
$pdf->Cell(80,6,'Pengikut :                         Nama','TL',0,'L');
$pdf->Cell(50,6,'Tanggal Lahir','TLR',0,'C');
$pdf->Cell(50,6,'Keterangan','TR',1,'c');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'1.','L',0,'L');
$pdf->Cell(50,5,'','LR',0,'C');
$pdf->Cell(50,5,'','R',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'2.','L',0,'L');
$pdf->Cell(50,5,'','LR',0,'C');
$pdf->Cell(50,5,'','R',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'3.','L',0,'L');
$pdf->Cell(50,5,'','LR',0,'C');
$pdf->Cell(50,5,'','R',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'4.','L',0,'L');
$pdf->Cell(50,5,'','LR',0,'C');
$pdf->Cell(50,5,'','R',1,'L');

$pdf->Cell(10,6,'9','TL',0,'C');
$pdf->Cell(80,6,'Pembebanan anggaran','TL',0,'L');
$pdf->Cell(100,6,'','TLR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'a. Instansi','L',0,'L');
$pdf->Cell(100,5,'a. Kantor Kecamatan Gunung Timang','LR',1,'L');
$pdf->Cell(10,5,'','L',0,'L');
$pdf->Cell(80,5,'b. Akun','L',0,'L');
$pdf->Cell(100,5,'b. ','LR',1,'L');

$pdf->Cell(10,6,'10','TL',0,'C');
$pdf->Cell(80,6,'Keterangan Lain','TL',0,'L');
$pdf->Cell(100,6,'','TLR',1,'L');
$pdf->Cell(10,5,'','BL',0,'C');
$pdf->Cell(80,5,'','BL',0,'L');
$pdf->Cell(100,5,'','BLR',1,'L');


// $pdf->Cell(10,25,'',0,1);
// $pdf->SetFont('Times','B',9);
// $pdf->Cell(8,7,'NO',1,0,'C');
// $pdf->Cell(30,7,'No Reg' ,1,0,'C');
// $pdf->Cell(20,7,'Tgl Laporan',1,0,'C');
// $pdf->Cell(50,7,'Kronologi',1,0,'C');
// $pdf->Cell(32,7,'Alamat Kej',1,0,'C');
// $pdf->Cell(20,7,'Kecamatan',1,0,'C');
// $pdf->Cell(15,7,'Korban',1,0,'C');
// $pdf->Cell(15,7,'Progress',1,0,'C');
 
 
// $pdf->Cell(10,7,'',0,1);
// $pdf->SetFont('Times','',10);
// $no=1;




$data = mysqli_query($koneksi,"SELECT * FROM sppd");
// while($d = mysqli_fetch_array($data)){
//   $pdf->Cell(8,6, $no++,1,0,'C');
//   $pdf->Cell(30,6, $d['nip'],1,0);
//   $pdf->Cell(20,6, $d['nama'],1,0);
//   $pdf->Cell(50,6, $d['tgl'],1,0);
//   $pdf->Cell(32,6, $d['nama_pangkat'],1,0); 
//   $pdf->Cell(20,6, $d['golongan'],1,0); 
//   $pdf->Cell(15,6, $d['nama_jabatan'],1,0);
//   $pdf->Cell(15,6, $d['tingkat_pendidikan'],1,1); 
// }



// TTD
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(300,15,'Kandui, '.$waktu_sekarang,0,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(260,15,'Mengetahui',0,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(300,15,'Camat Gunung Timang',0,0,'C');
$pdf->Cell(10,20,'',0,1);
$pdf->SetFont('Times','BU',11);
$pdf->Cell(300,15,'DENNY KURNIAWAN, S.T., M.Eng',0,0,'C');
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,4,'',0,1);
$pdf->Cell(300,15,'NIP.19720913 200003 1 005',0,0,'C');

$pdf->Output();

?>