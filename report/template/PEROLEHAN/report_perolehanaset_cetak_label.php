<?php
ob_start();
require_once('../../../config/config.php');

define("_JPGRAPH_PATH", "$path/function/mpdf/jpgraph/src/"); // must define this before including mpdf.php file
$JpgUseSVGFormat = true;
define('_MPDF_URI',"$url_rewrite/function/mpdf/"); 	// must be  a relative or absolute URI - not a file system path

include "../../report_engine.php";
require_once('../../../function/mpdf/mpdf.php');

$modul = $_REQUEST['menuID'];
$mode = $_REQUEST['mode'];
$tab = $_REQUEST['tab'];
$skpd_id = $_REQUEST['kodeSatker8'];
$tahun = $_REQUEST['tahun_label'];
$gol = $_REQUEST['gol'];
$label = $_REQUEST['label'];

// exit;
$data=array(
    "modul"=>$modul,
    "mode"=>$mode,
    "skpd_id"=>$skpd_id,
	"tahun"=>$tahun,
    "gol"=>$gol,
    "tab"=>$tab,
	"label"=>$label
);
// pr($data);
//mendeklarasikan report_engine. FILE utama untuk reporting
$REPORT=new report_engine();

//menggunakan api untuk query berdasarkan variable yg telah dimasukan
$REPORT->set_data($data);

//mendapatkan jenis query yang digunakan
$query=$REPORT->list_query();
// pr($query);
// exit;
//mengenerate query
$result_query=$REPORT->retrieve_query($query);
// pr($result_query);
// exit;
//set gambar untuk laporan
$gambar = $FILE_GAMBAR_KABUPATEN;


$html=$REPORT->retrieve_html_cetak_label($result_query, $gambar);

/*$count = count($html);
	for ($i = 0; $i < $count; $i++) {
		 
		 echo $html[$i];     
	}
exit;*/
$REPORT->show_status_download();
$mpdf=new mPDF('','','','',8,8,5,5,10,10,'P');
$mpdf->AddPage('P','','','','',8,8,5,5,10,10);
// $mpdf->setFooter('{PAGENO}') ;
$mpdf->progbar_heading = '';
$mpdf->StartProgressBarOutput(2);
$mpdf->useGraphs = true;
$mpdf->list_number_suffix = ')';
$mpdf->hyphenate = true;
$count = count($html);
for ($i = 0; $i < $count; $i++) {
     if($i==0)
			$mpdf->WriteHTML($html[$i]);
     else
     {
           $mpdf->AddPage('P','','','','',15,15,16,16,9,9);
           $mpdf->WriteHTML($html[$i]);
           
     }
}



$waktu=date("d-m-y_h-i-s");
$namafile="$path/report/output/Cetak Label $waktu.pdf";
$mpdf->Output("$namafile",'F');
$namafile_web="$url_rewrite/report/output/Cetak Label $waktu.pdf";
echo "<script>window.location.href='$namafile_web';</script>";
exit;


?>
