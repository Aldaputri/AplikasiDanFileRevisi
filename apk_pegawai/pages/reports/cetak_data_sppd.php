<?php
// memanggil library FPDF
require('../../plugins/fpdf185/fpdf.php');
include('../../config/main.php');

$waktu_sekarang = date('d F Y');

class Pdf extends FPDF

{

    function letak($gambar)

    {

        //memasukkan gambar untuk header

        $this->Image($gambar, 60, 8, 29, 29);

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

        $this->Line(10, 37, 287, 37);

        $this->SetLineWidth(0);

        $this->Line(10, 38, 287, 38);

    }

}

//instantisasi objek

$pdf = new PDF('L','mm','A4');

//Mulai dokumen

$pdf->AddPage('L', 'A4');

//meletakkan gambar

$pdf->letak('../../plugins/fpdf185/barut.jpg');

//meletakkan judul disamping logo diatas

$pdf->judul('PEMERINTAH KABUPATEN BARITO UTARA', 'KECAMATAN GUNUNG TIMANG','Jalan A. Yani RT. 4 KM 4.5 Kandui Kec. Gung Timang, Kab. Barito Utara, Kalimantan Tengah Kode Pos : 73862');

//membuat garis ganda tebal dan tipis
$pdf->garis();

// Isi Laporan
$pdf->SetFont('Times','B',13);
$pdf->Cell(287,30,'DATA SPPD',0,0,'C');
 
$pdf->Cell(10,25,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(8,7,'No',1,0,'C');
$pdf->Cell(45,7,'No.SPPD' ,1,0,'C');
$pdf->Cell(22,7,'NIP' ,1,0,'C');
$pdf->Cell(30,7,'Nama',1,0,'C');
$pdf->Cell(25,7,'Tgl Berangkat',1,0,'C');
$pdf->Cell(25,7,'Tgl Kembali',1,0,'C');
$pdf->Cell(20,7,'Uang Saku',1,0,'C');
$pdf->Cell(30,7,'Tujuan',1,0,'C');
$pdf->Cell(30,7,'Jenis Kendaraan',1,0,'C');
$pdf->Cell(40,7,'Perihal',1,0,'C');
 

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM sppd");
while($d = mysqli_fetch_array($data)){
    if($d['id'] < '10'){
        $no_srt = '00'.$d['id'].'';
    } elseif($d['id'] < '100'){
        $no_srt = '0'.$d['id'].'';
    }elseif($d['id'] < '1000'){
        $no_srt = ''.$d['id'].'';
    }
     


  $pdf->Cell(8,6, $no++,1,0,'C');

  $pdf->Cell(45,6, $d['tempat'].'/'.$no_srt.'/SPPD/'.$d['bulan'].'/'.$d['tahun'].'',1,0,'C');
  $pdf->Cell(22,6, $d['nip_pegawai'],1,0,'C');
  $pdf->Cell(30,6, $d['pegawai'],1,0,'C');
  $pdf->Cell(25,6, $d['tgl_berangkat'],1,0,'C');
  $pdf->Cell(25,6, $d['tgl_kembali'],1,0,'C');
  $pdf->SetFont('Times','',8);
  $pdf->Cell(20,6, $d['uang_saku'],1,0,'C'); 
  $pdf->SetFont('Times','',10);
  $pdf->Cell(30,6, $d['tujuan'],1,0,'C'); 
  $pdf->SetFont('Times','',8);
  $pdf->Cell(30,6, $d['jenis_kendaraan'],1,0,'C');
  $pdf->SetFont('Times','',10);
  $pdf->Cell(40,6, $d['perihal'],1,1,'C'); 

};


// TTD
$pdf->Cell(10,15,'',0,1);
$pdf->Cell(500,15,'Kandui, '.$waktu_sekarang,0,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(460,15,'Mengetahui',0,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(500,15,'Camat Gunung Timang',0,0,'C');
$pdf->Cell(10,20,'',0,1);
$pdf->SetFont('Times','BU',11);
$pdf->Cell(500,15,'DENNY KURNIAWAN, S.T., M.Eng',0,0,'C');
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,4,'',0,1);
$pdf->Cell(500,15,'NIP.19720913 200003 1 005',0,0,'C');

$pdf->Output();

?>