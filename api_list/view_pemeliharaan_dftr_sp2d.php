<?php
ob_start();
include "../config/config.php";

$id=$_SESSION['user_id'];//Nanti diganti
// echo  $id;
// echo "masukkkkkk";
// exit;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
#This code provided by:
#Andreas Hadiyono (andre.hadiyono@gmail.com)
#Gunadarma University

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

/* Array of database columns which should be read and sent back to DataTables. Use a space where
 * you want to insert a non-database field (for example a counter or static image)
 */
 /*SELECT a.Aset_ID,a.kodeKelompok,pr.kodeSatker,a.Tahun,k.Uraian,s.NamaSatker from aset a 
 inner join kelompok as k on k.Kode = a.kodeKelompok 
 inner join satker as s on s.kode = pr.kodeSatker 
 where a.tahun = '2014' and pr.kodeSatker = '01.01.01.01' and a.kodekelompok like '02%' limit 1 */
 
 // echo "masuk aja dulu";
 // pr($_GET);
 // exit;
$aColumns = array('pr.Pemeliharaan_ID','pr.nosp2d','pr.tglsp2d','pr.nokontrak','pr.tglkontrak',
				  'pr.NamaPenyediaJasa','pr.tglPemeliharaan','pr.KeteranganPemeliharaan');
$test = count($aColumns);
  
// echo $aColumns; 
/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "pr.Pemeliharaan_ID";

/* DB table to use */
$sTable = "pemeliharaan as pr";
// pr($_GET);
//variabel ajax
$tglPemeliharaanAwal 		= $_GET['tglAw'];
$tglPemeliharaanAkhir 		= $_GET['tglAk'];
$satker 				= $_GET['satker'];

// $par_data_table="tahun=$tahun&satker=$satker";
$par_data_table="tglAw=$tglPemeliharaanAwal&tglAk=$tglPemeliharaanAkhir&satker=$satker";

// echo $tahun;
/* REMOVE THIS LINE (it just includes my SQL connection user/pass) */
//include( $_SERVER['DOCUMENT_ROOT'] . "/datatables/mysql.php" );


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
 * no need to edit below this line
 */

/*
 * Local functions
 */

function fatal_error($sErrorMessage = '') {
     header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
     
     die(mysql_error());
}

/*
/*
 * Paging
 */
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
     $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " .
             intval($_GET['iDisplayLength']);
}


/*
 * Ordering
 */
$sOrder = "";
if (isset($_GET['iSortCol_0'])) {
     $sOrder = "ORDER BY  ";
     for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
          if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
               $sOrder .= "" . $aColumns[intval($_GET['iSortCol_' . $i])] . " " .
                       ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
          }
     }

     $sOrder = substr_replace($sOrder, "", -2);
     if ($sOrder == "ORDER BY") {
          $sOrder = "";
     }
}
// ECHO $sOrder;

/*
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
$sWhere = "";

if ($satker != '' AND $tglPemeliharaanAwal != '' AND  $tglPemeliharaanAkhir != ''){
	$sWhere=" WHERE pr.TglPemeliharaan >='$tglPemeliharaanAwal' AND pr.TglPemeliharaan <='$tglPemeliharaanAkhir'  AND pr.kodeSatker='$satker'";
}

if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
     //$sWhere = "WHERE (";
	 if ($satker != '' AND $tglPemeliharaanAwal != '' AND  $tglPemeliharaanAkhir != ''){
		$sWhere=" WHERE pr.TglPemeliharaan >='$tglPemeliharaanAwal' AND pr.TglPemeliharaan <='$tglPemeliharaanAkhir'  AND pr.kodeSatker='$satker' AND (";
	}
     // $sWhere.="(";
     for ($i = 0; $i < count($aColumns); $i++) {
          if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
               $sWhere .= "" . $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%' OR ";
          }
     }
     $sWhere = substr_replace($sWhere, "", -3);
     $sWhere .= ')';
}

/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
     if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
          if ($sWhere == "") {
               $sWhere = "WHERE pr.TglPemeliharaan >='$tglPemeliharaanAwal' AND pr.TglPemeliharaan <='$tglPemeliharaanAkhir'  AND pr.kodeSatker='$satker'";
          } else {
               $sWhere .= " AND pr.TglPemeliharaan >='$tglPemeliharaanAwal' AND pr.TglPemeliharaan <='$tglPemeliharaanAkhir'  AND pr.kodeSatker='$satker'";
          }
          $sWhere .= "" . $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
     }
}
// echo $sWhere;

/*
 * SQL queries
 * Get data to display
 */
 /*SELECT a.Aset_ID,a.kodeKelompok,pr.kodeSatker,a.Tahun,k.Uraian,s.NamaSatker from aset a 
 inner join kelompok as k on k.Kode = a.kodeKelompok 
 inner join satker as s on s.kode = pr.kodeSatker 
 where a.tahun = '2014' and pr.kodeSatker = '01.01.01.01' and a.kodekelompok like '02%' limit 1 */
 
 

$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable 
		$sWhere
		$sOrder
		$sLimit
		";

// echo $sQuery;
$rResult = $DBVAR->query($sQuery) or fatal_error('MySQL Error: ' . mysql_errno());


/* Data set length after filtering */
$sQuery = "
		SELECT FOUND_ROWS()
	";
// echo $sQuery;
$rResultFilterTotal = $DBVAR->query($sQuery) or fatal_error('MySQL Error: ' . mysql_errno());
$aResultFilterTotal = $DBVAR->fetch_array($rResultFilterTotal);
$iFilteredTotal = $aResultFilterTotal[0];

/* Total data set length */
if($kodeKelompok != '' && $reg_aw  != '' && $reg_ak  != ''){
	$sQuery = "
		SELECT COUNT(" . $sIndexColumn . ")
		FROM   $sTable 
		$sWhere ";
}
		// echo $sQuery;
$rResultTotal = $DBVAR->query($sQuery) or fatal_error('MySQL Error: ' . mysql_errno());
$aResultTotal = $DBVAR->fetch_array($rResultTotal);
$iTotal = $aResultTotal[0];


/*
 * Output
 */
$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);
$no=$_GET['iDisplayStart']+1;
while ($aRow = $DBVAR->fetch_array($rResult)) {
		// pr($aRow);
		//DAFTAR FIELD 'pr.kodeRekening','pr.HargaSatuan','pr.UraianPemeliharaan','pr.Lokasi','pr.keketerangan'
		$row = array();
		$prId =  $aRow['Pemeliharaan_ID'];
		$nosp2d = $aRow['nosp2d'];
		$tglsp2d = $aRow['tglsp2d'];
		$nokontrak = $aRow['nokontrak'];
		$tglkontrak = $aRow['tglkontrak'];
		
		$NamaPenyediaJasa = $aRow['NamaPenyediaJasa'];
		$tglPemeliharaan = $aRow['tglPemeliharaan'];
		$KeteranganPemeliharaan = $aRow['KeteranganPemeliharaan'];
		
		//change format date
		if($tglsp2d != "0000-00-00"){
		  $temptglsp2d = explode('-',$tglsp2d);
		  $tglsp2d_rev = $temptglsp2d[2]."/".$temptglsp2d[1]."/".$temptglsp2d[0];
		}
		
		if($tglkontrak !="0000-00-00"){
		  $temptglkontrak = explode('-',$tglkontrak);
		  $tglkontrak_rev = $temptglkontrak[2]."/".$temptglkontrak[1]."/".$temptglkontrak[0];
		}
		
		if($tglPemeliharaan !="0000-00-00"){
		  $temptglpemeliharaan = explode('-',$tglPemeliharaan);
		  $tglpemeliharaan_rev = $temptglpemeliharaan[2]."/".$temptglpemeliharaan[1]."/".$temptglpemeliharaan[0];
		}
		
		 $identity = "id=$prId&sk=$satker";
		 $addUrl = encode($identity);
		 $filterUrl = encode($par_data_table);
		 
		 // $addUrl2 = decode($addUrl);
		 // $addUrl = encode(id=$id&tipe=$TipeAset&$par_data_table);
		  $rincian="<center><a href=\"pemeliharaan_rincian.php?url=$addUrl\" class=\"btn btn-success btn-small\">
			<i class=\"fa fa-edit\" align=\"center\"></i>&nbsp;Rincian</a></center>";
		  
		  $edit ="<center><a href=\"pemeliharaan_edit.php?url=$addUrl&surl=$filterUrl\" class=\"btn btn-warning btn-small\">
			<i class=\"fa fa-pencil\" align=\"center\"></i>&nbsp;&nbsp;Edit</a></center>";
		
		  $hapus="<center><a onclick=\"return confirm('Hapus Data?')\" href=\"pemeliharaan_hapus_proses.php?url=$addUrl&surl=$filterUrl\" class=\"btn btn-danger btn-circle\">
			<i class=\"fa fa-trash simbol\">&nbsp;Hapus</i></a></center>"; 
			
		  
					
		  $row[] ="<center>".$no."</center>";
		  $row[] =$nosp2d;
		  $row[] =$tglsp2d_rev;
		  $row[] =$nokontrak;
		  $row[] =$tglkontrak_rev;
		  $row[] =$NamaPenyediaJasa;
		  $row[] =$tglpemeliharaan_rev;
		  $row[] =$KeteranganPemeliharaan;
		  $row[] =$rincian."&nbsp;".$edit."&nbsp;".$hapus;
		  
		  
		  
		$no++;
		 $output['aaData'][] = $row;
	}
echo json_encode($output);

?>

