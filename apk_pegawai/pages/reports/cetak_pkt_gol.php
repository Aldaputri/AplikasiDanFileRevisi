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
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,30,'DATA PEGAWAI BERDASARKAN PANGKAT DAN GOLONGAN',0,0,'C');

$pdf->setMargins(23, 44, 11.7);
$pdf->Cell(10,25,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(20,7,'Nip' ,1,0,'C');
$pdf->Cell(30,7,'Nama',1,0,'C');
$pdf->Cell(50,7,'Pangkat',1,0,'C');
$pdf->Cell(30,7,'Golongan',1,0,'C');
$pdf->Cell(30,7,'Ruang',1,0,'C');



$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($koneksi,"SELECT A.*,B.*,A.id id1 FROM pegawai B RIGHT JOIN jabatan A ON A.pegawai_id = B.id");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(20,6, $d['nip'],1,0,'C');
  $pdf->Cell(30,6, $d['nama'],1,0,'C');
  $pdf->SetFont('Times','',9);
  $pdf->Cell(50,6, $d['nama_pangkat'],1,0,'C');
  $pdf->SetFont('Times','',9);
  $pdf->Cell(30,6, $d['golongan'],1,0,'C'); 
  $pdf->SetFont('Times','',10);
  $pdf->Cell(30,6, $d['ruang'],1,1,'C');
};


// TTD
$pdf->Cell(10,15,'',0,1);
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