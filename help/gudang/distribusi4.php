<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
include "../../config/config.php";
?>
<html>
    <head>
        <title>Help SIMBADA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title><?=$title?></title>
                <!-- include css file -->
                
                <link rel="stylesheet" href="../../css/simbada.css" type="text/css" media="screen" />
                <link rel="stylesheet" href="../../css/jquery-ui.css" type="text/css">
                <link rel="stylesheet" href="../../css/example.css" TYPE="text/css" MEDIA="screen">
    </head>
    <body>
        <div>
            <div id="frame_header">
                <div id="header"></div>
            </div>
            <div id="list_header"></div>
            <div id="kiri">
            <?php include '../menu_samping.php';?>
        </div>
        
        <div id="tengah1">	
            <div id="frame_tengah1">
                <div id="frame_gudang">
                    <div id='topright'><label>Help &raquo;</label><label>Gudang &raquo; Distribusi Barang <label></div>;
                        <div id='bottomright' style='border:0px'>
						
						<ul type="disc" style="padding-left:20px;">
							<li>Pilih Transfer ke Satker dari tabel SKPD, dengan Unit SKPD yang akan menggunakan barang 
								sesuai Surat Permintaan Pengeluaran Barang.</li><br>
							<li>Isi No Dokumen dengan nomor Bukti Pengeluaran Barang dari Gudang.</li><br>
							<li>Isi Tanggal Proses dengan tanggal pada Bukti Pengeluaran Barang.</li><br>
							<li>Isi Alasan dengan keterangan pengeluaran barang.</li><br>
							<li>Isi Nomor SPPB dengan nomor Surat Permintaan Pengeluaran Barang dari SKPD atau unit SKPD terkait.</li><br>
							<li>Isi Tanggal SPPB dengan tanggal pada Surat Permintaan Pengeluaran Barang.</li><br>
							<li>Pada bagian Pihak Penyimpan, isi Nama, Golongan dan NIP Penyimpan Barang, 
								kemudian isikan pula Nama Atasan, Golongan dan NIP AtasanLangsung Penyimpan Barang.</li><br>
							<li>Pada bagian Pihak Pengurus, isi Nama, Golongan dan NIP Petugas Penerima Barang.</li><br>
							<li>Klik Keluarkan Barang untuk melanjutkan proses atau klik Batal untukmembatalkan proses.</li><br>
							<li>Bila dilanjutkan akan kembali ke seleksi pencarian utama halaman Distribusi Barang, 
								klik lanjutkan untuk melihat hasilnya, seperti gambar di bawah ini :</li><br>
								
							<img src="g10.png">
		
						</ul>
                  
				  <table width="100%">
					<tr>
						<td width="30%"> <a href="distribusi3.php" style="color:#0000ff;font-size:20px">Prev</a></td>
						<td style="text-align:center"> <a href="index.php" style="color:#0000ff;font-size:20px">TOC</a></td>
						<td width="30%"></td>
						
					</tr>
				</table>
				  
				 
				  

					
						</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
            <div id="footer">Sistem Informasi Barang Daerah ver. 0.x.x <br />
            Powered by BBSDM Team 2012
            </div>
        </div>
    </body>
</html>