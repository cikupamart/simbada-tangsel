
<?php

include "../../../config/config.php";
include "../../report_engine.php";
// echo "masukk";
$modul = $_REQUEST['menuID'];
$mode = $_REQUEST['mode'];
$tab = $_REQUEST['tab'];
$tglawalperolehan = $_REQUEST['tglPerolehan_awal_kb'];
$tglakhirperolehan = $_REQUEST['tglPerolehan_akhir_kb'];
$tglcetak = $_REQUEST['tglCetakKb'];
$skpd_id = $_REQUEST['kodeSatker10'];
$kelompok=$_REQUEST['kelompok_id3'];
$tipe=$_REQUEST['tipe_file'];
$kb = $_REQUEST['kb'];
pr($_REQUEST);
// exit;
$data=array(
    "modul"=>$modul,
    "mode"=>$mode,
    "kb"=>$kb,
    "tglawalperolehan"=>$tglawalperolehan,
    "tglakhirperolehan"=>$tglakhirperolehan,
    "skpd_id"=>$skpd_id,
    "kelompok"=>$kelompok,
    "tab"=>$tab
);

// print_r($_POST);
// exit;

$paramater_url="menuID=$modul&mode=$mode&tab=$tab&skpd_id=$skpd_id&kelompok=$kelompok&tglawalperolehan=$tglawalperolehan&tglakhirperolehan=$tglakhirperolehan&kb=$kb&tglcetak=$tglcetak&tipe_file=$tipe";
// echo $paramater_url;
if(isset($kb))
{
    $REPORT=new report_engine();
    switch ($kb)
    {
        case 'KB-A':
            {
                
                $url="report_perolehanaset_cetak_kba.php?$paramater_url";
				//include 'report_perolehanaset_cetak_kiba.php';
//                echo "<script>window.location.href='$namafile_web';</script>";

            }
            break;
        case 'KB-B':
            {
			// echo "masukkk";
			// exit;
				$url="report_perolehanaset_cetak_kbb.php?$paramater_url";
                //include 'report_perolehanaset_cetak_kibb.php';
            }
            break;
        case 'KB-C':
            {
				$url="report_perolehanaset_cetak_kbc.php?$paramater_url";	
                //include 'report_perolehanaset_cetak_kibc.php';
            }
            break;
        case 'KB-D':
            {
				$url="report_perolehanaset_cetak_kbd.php?$paramater_url";
                //include 'report_perolehanaset_cetak_kibd.php';
            }
            break;
        case 'KB-E':
            {
				$url="report_perolehanaset_cetak_kbe.php?$paramater_url";
               // include 'report_perolehanaset_cetak_kibe.php';
            }
            break;
        case 'KB-F':
            {
				$url="report_perolehanaset_cetak_kbf.php?$paramater_url";
                //include 'report_perolehanaset_cetak_kibf.php';
            }
            break;
    }
    
$REPORT->show_pilih_download($url);    
/*echo "Download File $kib A tersedia dalam bentuk:<br/>";
echo "1. <a href=\"$url"."1\">PDF</a><br/>";
echo "2. <a href=\"$url"."2\">Micorosoft Excel</a>";
*/
}

?>

 

