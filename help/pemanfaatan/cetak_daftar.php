<!DOCTYPE php PUBLIC "-//W3C//DTD php 4.01//EN" "http://www.w3.org/TR/php4/strict.dtd">
<?php
include "../../config/config.php";
?>
<php>
    <head>
        <title>Help SIMBADA</title>
        <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
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
            <div id="frame_kiri">
              <?php include '../menu_samping.php';?>
            </div>
        </div>
        
        <div id="tengah">	
            <div id="frame_tengah">
                <div id="" style="padding: 10px">
                    <fieldset style="padding: 5px;">
                    <label style='font-size:18px'>Help &raquo;</label>
					<br><br>
					<p style='font-size:17px' >Sub Menu Cetak Daftar Pemanfaatan</p>
					<br>
					<p style='font-size:14px'>Pada Sub Menu cetak daftar pemanfaatan ini mempunyai alur operasi sebagai berikut :</p>
					<br>
					<p align="center"><img  src="../pemanfaatan/images/cetak.jpg" width="500px" height="75px"/></p><br>
					<p style="padding: 3px">Sub menu ini digunakan untuk melakukan pencetakan daftar aset yang telah dimanfaatkan dalam periode tertentu. Caranya adalah sebagai berikut&nbsp;:</p>
					<ol style="padding: 18px"><li>Klik sub menu Cetak Daftar Pemanfaatan.<p align="center"><img  src="../pemanfaatan/images/pm26.jpg"><br><br></p></li><li>SIMBADA akan menampilkan halaman seleksi data aset yang akan dicetak.<ul style="padding: 12px"><li>Isi Tanggal Awal dan Akhir sesuai dengan periode penetapan pemanfaatan yang ingin dilihat.</li><li>Isi Nomor Penetapan Pemanfaatan dengan nomor atau bagian nomor SK Penetapan Pemanfaatan yang ingin ditampilkan.</li><li>Pilih SKPD bila ingin menampilkan data berdasarkan SKPD.</li><li>Bersihkan Filter untuk membersihkan dari seleksi sebelumnya.<br><br><img  src="../pemanfaatan/images/pm27.jpg"></li></ul>
					<li>Klik Tampilkan Data untuk menampilkan data pemanfaatan yang sudah ada seperti berikut.<br><br><img  src="../pemanfaatan/images/pm28.jpg"><br><br></li>
					<li>Klik Cetak untuk mencetak daftar aset yang dimanfaatkan ke dalam format file .pdf yang bisa disimpan atau bisa langsung dicetak dengan menggunakan printer.</li>
					</li></ol>
					<p align="center"><input type="button" value="<< Previous" onClick="window.location.href='pengembalian_pemanfaatan.php'"> &nbsp;<input type='BUTTON' value='TOC' onClick="window.location.href='../'">&nbsp;  <input type='BUTTON' value='Next >>' onClick="window.location.href='index.php'"></p>
                    </fieldset>
                </div>
            </div>
        </div>
        
        </div>
            <div id="footer">Sistem Informasi Barang Daerah ver. 0.x.x <br />
            Powered by BBSDM Team 2012
            </div>
        </div>
    </body>
</php>
