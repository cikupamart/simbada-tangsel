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
					<p style='font-size:17px' >Sub Menu Penetapan Penggunaan</p>
					<br>
					<p style='font-size:14px'>Pada Sub Menu penetapan penggunaan ini mempunya alur operasi sebagai berikut :</p>
					<br>
					<p align="center"><img  src="../penggunaan/images/penetapan_penggunaan.jpg" width="650px" height="195px"/> </p>
					<br>
					<p style='font-size:14px'>Sub menu ini digunakan untuk mencatat penetapan penggunaan aset sesuai dengan Surat Keputusan yang dibuat oleh Kepala Daerah atau Pengelola Barang. Langkahnya adalah sebagai berikut&nbsp;:</p>
					<ol style="padding: 17px">
					<li>Klik sub menu Penetapan Penggunaan.<br><p align="center"><img  src="../penggunaan/images/pp1.jpg"></p><br></li>
					<li>SIMBADA akan menampilkan halaman seleksi pencarian data.<br>
					<ul style="padding: 17px"><li>Isi Tanggal Awal dan Akhir dengan tanggal penerbitan SK Penetapan Penggunaan yang ingin ditampilkan datanya.</li><li>Isi Nomor Penetapan Penggunaan dengan nomor Surat Keputusan Penetapan Penggunaan yang ingin ditampilkan datanya.</li><li>Pilih SKPD dari tabel SKPD sesuai cara yang sudah dijelaskan sebelumnya, untuk menampilkan data berdasarkan SKPD.</li><li>Bersihkan Filter untuk membersihkan dari seleksi sebelumnya.<br><img  src="../penggunaan/images/pp2.jpg"></li></ul>
					<li>Klik Tampilkan Data untuk menampilkan data berdasarkan seleksi. Bila tanpa seleksi atau filter dikosongkan, maka SIMBADA akan menampilkan semua data.<br><br><img  src="../penggunaan/images/pp3.jpg"></li>
					<li>Klik Cetak untuk mencetak data dalam format PDF, klik Edit untuk mengedit data atau klik Hapus untuk menghapus data penetapan penggunaan yang tidak digunakan.<br><br></li>
					<li>Klik Tambah Data untuk membuat atau menambahkan data baru. SIMBADA akan menampilkan halaman seleksi pencarian yang berisi daftar aset yang ingin dibuatkan penetapan penggunaannya. Isi Nama Aset untuk mencari data berdasarkan nama yang dicari, isi Nomor Kontrak untuk mecari data berdasarkan nomor yang dicari, pilih Satker yang ingin dicari atau kosongkan semua filter untuk menampilkan semua data.<br><br><img  src="../penggunaan/images/pp4.jpg"><br><br></li>
					<li>Klik tombol Lanjut untuk menampilkan daftar aset kemudian SIMBADA akan menampilkan daftar informasi data aset yang dicari<br><br></li>
					<li>Berikan tanda centang „‟ pada data aset yang ingin di pilih dan klik tombol Lanjutkan maka SIMBADA akan menambahkan data aset kedalam daftar aset yang ingin dibuatkan penetapan penggunaannya.<br><br><img  src="../penggunaan/images/pp6.jpg"></li>
					<ul style="padding: 17px"><li>Isi Nomor Penetapan dengan nomor Surat Keputusan Penetapan Penggunaan.</li><li>Isi Tanggal Penetapan dengan tanggal Surat Keputusan Penetapan Penggunaan.</li><li>Isi Keterangan dengan teks keterangan yang diperlukan.</li><li>Klik Penggunaan untuk mencatat data penetapan penggunaan, atau klik Batal untuk membatalkan proses.</li></ul>
					</li>
					</ol>
					<p align="center"><input type="button" value="<< Previous" onClick="window.location.href='index.php'"> &nbsp;<input type='BUTTON' value='TOC' onClick="window.location.href='../'">&nbsp;  <input type='BUTTON' value='Next >>' onClick="window.location.href='validasi.php'"></p>
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
