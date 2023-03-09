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

$pdf->judul('PEMERINTAH KABUPATEN BARITO UTARA', 'KECAMATAN GUNUNG TIMANG','Jalan A. Yani RT. 4 KM 4.5 Kandui Kec. Gunung Timang, Kab. Barito Utara, Kalimantan Tengah Kode Pos : 73862');

//membuat garis ganda tebal dan tipis
$pdf->garis();

// Isi Laporan
$pdf->SetFont('Times','B',13);
$pdf->Cell(287,30,'DATA PEGAWAI',0,0,'C');

$pdf->setMargins(23, 44, 11.7);
$pdf->Cell(10,25,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(8,7,'No',1,0,'C');
$pdf->Cell(30,7,'Nip' ,1,0,'C');
$pdf->Cell(30,7,'Nama',1,0,'C');
$pdf->Cell(30,7,'Tempat Lahir',1,0,'C');
$pdf->Cell(30,7,'Tanggal Lahir',1,0,'C');
$pdf->Cell(30,7,'Jenis Kelamin',1,0,'C');
$pdf->Cell(28,7,'Agama',1,0,'C');
$pdf->Cell(40,7,'Alamat',1,0,'C');
$pdf->Cell(25,7,'No HP',1,0,'C');



$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM pegawai");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(8,6, $no++,1,0,'C');
  $pdf->Cell(30,6, $d['nip'],1,0,'C');
  $pdf->Cell(30,6, $d['nama'],1,0,'C');
  $pdf->SetFont('Times','',9);
  $pdf->Cell(30,6, $d['tempat'],1,0,'C');
  $pdf->SetFont('Times','',9);
  $pdf->Cell(30,6, $d['tgl'],1,0,'C'); 
  $pdf->SetFont('Times','',10);
  $pdf->Cell(30,6, $d['jenis_kelamin'],1,0,'C');
  $pdf->Cell(28,6, $d['agama'],1,0,'C');  
  $pdf->Cell(40,6, $d['alamat'],1,0,'C');  
  $pdf->Cell(25,6, $d['nohp'],1,1,'C');  
};


// TTD
$pdf->Cell(10,15,'',0,1);
$pdf->Cell(400,15,'Kandui, '.$waktu_sekarang,0,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(360,15,'Mengetahui',0,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(400,15,'Camat Gunung Timang',0,0,'C');
$pdf->Cell(10,20,'',0,1);
$pdf->SetFont('Times','BU',11);
$pdf->Cell(400,15,'DENNY KURNIAWAN, S.T., M.Eng',0,0,'C');
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,4,'',0,1);
$pdf->Cell(400,15,'NIP.19720913 200003 1 005',0,0,'C');

$pdf->Output();

?>