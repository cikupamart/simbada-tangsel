<?php
include "../../config/config.php";

	$menu_id = 43;
    $SessionUser = $SESSION->get_session_user();
    ($SessionUser['ses_uid']!='') ? $Session = $SessionUser : $Session = $SESSION->get_session(array('title'=>'GuestMenu', 'ses_name'=>'menu_without_login')); 
    $USERAUTH->FrontEnd_check_akses_menu($menu_id, $SessionUser);
?>

<?php
	include"$path/meta.php";
	include"$path/header.php";
	include"$path/menu.php";
	
?>
	  <script type="text/javascript" src="<?php echo "$url_rewrite/";?>JS/script.js"></script>
		<script type="text/javascript" src="<?php echo "$url_rewrite/"; ?>JS/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo "$url_rewrite/";?>JS/ajax_checkbox.js"></script>
			<!--[if IE]>
			<link rel="stylesheet" type="text/css" href="ie_office.css" />
			<![endif]-->

	<section id="main">
		<ul class="breadcrumb">
		  <li><a href="#"><i class="fa fa-home fa-2x"></i>  Home</a> <span class="divider"><b>&raquo;</b></span></li>
		  <li><a href="#">Penghapusan</a><span class="divider"><b>&raquo;</b></span></li>
		  <li class="active">Penetapan Pemindahtanganan  </li>
		  <?php SignInOut();?>
		</ul>
		<div class="breadcrumb">
			<div class="title">Penetapan Pemindahtanganan  </div>
			<div class="subtitle">Filter Data</div>
		</div>
		<section class="formLegend">
			
			 <form method="POST" action="<?php echo "$url_rewrite";?>/module/pemindahtanganan/lanjut_tambah_aset.php?pid=1">
			<ul>
							<li>
								<span class="span2">Tahun</span>
								<input type="text" size="4" name="rkb_thn" class="span2" value="">
							</li>
							<li>
								<span class="span2">SKPD</span>
								<div class="input-append">
										<input type="text" name="rkb_skpd" id="rkb_skpd" class="span5" readonly="readonly" value="<?php echo $_SESSION['ses_satkername'] ; ?>">
										<input type="button" name="idbtnlookupkelompok" id="idbtnlookupkelompok" class="btn" value="Pilih" onclick = "showSpoiler(this);">
										<div class="inner" style="display:none;">
											
											<?php
												$alamat_simpul_skpd="$url_rewrite/function/dropdown/radio_simpul_skpd.php";
												$alamat_search_skpd="$url_rewrite/function/dropdown/radio_search_skpd.php";
												js_radioskpd($alamat_simpul_skpd, $alamat_search_skpd,"rkb_skpd","skpd_id",'skpd','rkbskpdfilter');
												$style2="style=\"width:525px; height:220px; overflow:auto; border: 1px solid #dddddd;\"";
												radiopengadaanskpd($style2,"skpd_id",'skpd','rkbskpdfilter');
											?>
										</div>
								</div>
							</li>
							<li>
								<span class="span2">Lokasi</span>
								<div class="input-append">
									<input type="text" name="rkb_lokasi" id="rkb_lokasi" class="span5" readonly="readonly" value="" />
									<input type="button" name="idbtnlookupkelompok" id="idbtnlookupkelompok" class="btn" value="Pilih" onclick = "showSpoiler(this);">
									<div class="inner" style="display:none;">
										
										<?php
											$alamat_simpul_lokasi="$url_rewrite/function/dropdown/radio_simpul_lokasi_pengadaan.php";
											$alamat_search_lokasi="$url_rewrite/function/dropdown/radio_search_lokasi_pengadaan.php";

											js_radiopengadaanlokasi($alamat_simpul_lokasi, $alamat_search_lokasi,"rkb_lokasi","lokasi_id",'lokasi','p_provinsi','p_kabupaten','p_kecamatan','p_desa','lok');
											$style1="style=\"width:525px; height:220px; overflow:auto; border: 1px solid #dddddd;\"";
											radiopengadaanlokasi($style1,"lokasi_id",'lokasi',"lok");
											
										?>
									</div>
								</div>
							</li>
							<li>
								<span class="span2">Nama/Jenis Barang</span>
								<div class="input-append">
									<input type="text" name="rkb_njb" id="rkb_njb" class="span5" readonly="readonly" value="">
									<input type="button" name="idbtnlookupkelompok" id="idbtnlookupkelompok" class="btn" value="Pilih" onclick = "showSpoiler(this);">
									<div class="inner" style="display:none;">
										
										<?php
											$alamat_simpul_kelompok="$url_rewrite/function/dropdown/radio_simpul_kelompok.php";
											$alamat_search_kelompok="$url_rewrite/function/dropdown/radio_search_kelompok.php";
											js_radiokelompok($alamat_simpul_kelompok, $alamat_search_kelompok,"rkb_njb","kelompok_id",'kelompok','rkbkelompokfilter');
											$style="style=\"width:525px; height:220px; overflow:auto; border: 1px solid #dddddd;\"";
											radiokelompok($style,"kelompok_id",'kelompok','rkbkelompokfilter');
											
										?>
									</div>
								</div>
							</li>
							<li>
								<span class="span2">&nbsp;</span>
								<input type="submit" name="submit" class="btn btn-primary" value="Tampilkan Data" />
								<input type="reset" name="reset" class="btn" value="Bersihkan Data">
							</li>
						</ul>
						<table border="0" cellspacing="6" style="display: none">
                                                <tr>
                                                    <td>Desa</td>
                                                    <td>Kecamatan</td> 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" id="p_desa" name="p_desa" value="" size="45"  readonly="readonly">
                                                    </td>
                                                    <td>
                                                        <input type="text" id="p_kecamatan" name="p_kecamatan" value="" size="45" readonly="readonly" >
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Kabupaten</td>
                                                    <td>Provinsi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" id="p_kabupaten" name="p_kabupaten" value=""size="45" readonly="readonly" >
                                                    </td>
                                                    <td>
                                                        <input type="text" id="p_provinsi" name="p_provinsi" value=""size="45" readonly="readonly" >
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
						</form>
			
		</section>     
	</section>
	
<?php
	include"$path/footer.php";
?>