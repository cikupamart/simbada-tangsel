<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
include "config/database.php";
$alamat_simpul="http://localhost/gunadarma/dropdown_v3/simpul_kelompok.php";
$alamat_search="http://localhost/gunadarma/dropdown_v3/search_kelompok.phps";
js_kelompok($alamat_simpul, $alamat_search);
$style="style=\"width:525px; height:220px; overflow:auto; border: 1px solid #dddddd;\"";
kelompok($style);*/
 
function js_radiokontrak($alamat_simpul,$alamat_search,$parsing,$save_element,$tbody_name,$prefix,$data,$root_api){
     //js_radiokontrak($alamat_simpul,$alamat_search,$parsing,$save_element,$tbody_name,$u_no_kontrak,$u_nilai_kontrak,$u_nama_pekerjaan,$u_nama_kontrak,$u_tgl_kontrak,$prefix)
   echo"<script type=\"text/javascript\">
function add_kontrak$prefix(kode_for_js,kode){
 
     if (document.getElementById(kode).checked == true ) {
	 var c = 1;
	 } else { c = 0;}
     url=\"$alamat_simpul?kode_for_js=\"+kode_for_js
          +\"&kode=\"+kode+\"|\"+c;
     dropDownRadioButton_Kelompok(url,kode_for_js,'$tbody_name');
     //ambilData(url, kode_for_js)
     
} </script>";

  
     
  echo "<script type=\"text/javascript\">
			function recp$prefix(id) {
			document.getElementById('preload_kontrak').value='Mencari..';
			document.getElementById('preload_kontrak').disabled=true;
			document.getElementById('$parsing').value='(Semua Kontrak)';
			id=document.getElementById('search_kontrak$prefix').value;
                                    url=\"$alamat_search?id=$prefix\"+\"_\"+encodeURIComponent(id)+\"&tbody=$tbody_name\";
			  $('#$tbody_name').load(url);
			}
			</script>";
  
  echo "
          <script type=\"text/javascript\">
               
		  function SelectAllChild_$tbody_name(id) {
                   b=id.id;
                    query=document.getElementById(b).value;
                   //setCheckBox(\"$tbody_name\", \"input\", b, m);
                   show_result$prefix(\"$tbody_name\", \"input\", \"$prefix\", \"$parsing\");
                   url=\"$root_api\"+query;
                   ambilDataPenerimaan(url, \"$data\");

              }
		  </script>
               <script type=\"text/javascript\">
               function show_result$prefix(container, selectorTag, prefix,element_update) {
                   
                    var index_id= new Array();
                    var hasil_item=new Array();
                    var kelompok_id=    new Array();
                    var hasil='';
                    var myPosts = document.getElementById(container).getElementsByTagName(selectorTag);
                    var c=1;
                    var panjang=0;
                    for (var i = 0; i < myPosts.length; i++) {
                         //omitting undefined null check for brevity

                         if (myPosts[i].id.lastIndexOf(prefix, 0) === 0) {
                              hasil=myPosts[i].id;
                               kelompok=document.getElementById(hasil).value;
                              temp_cek=document.getElementById(hasil).checked;
                              nilai_cek=document.getElementById(\"id_nilai_\"+hasil).value;
                                
                              if(temp_cek!=0){   
                                 
                                             cek_unique=0;
                                             for(j=0;j<panjang;j++){
                                                  var str=hasil;
                                                  patt1 = \"\^\"+index_id[j];
                                                  n=str.match(patt1);
                                                  if(n==index_id[j]){
                                                       cek_unique++;
                                                  }
                                             }
                                             if(cek_unique==0){
                                                  hasil_item[panjang]=nilai_cek;
                                                       index_id[panjang]=hasil;
                                                   kelompok_id[panjang]=kelompok;
                                                       panjang++
                                             }
                                }
                              

                         }
                    }
                    if(panjang!=0){
                              for(i=0;i<panjang;i++) {
                                   if(i==0)
                                   {
                                        document.getElementById(element_update).value=hasil_item[i];
                                         document.getElementById(\"$save_element\").value=kelompok_id[i];
                                   }
                                   else
                                   {
                                        document.getElementById(element_update).value+=\", \"+hasil_item[i];
                                          document.getElementById(\"$save_element\").value+=\",\"+kelompok_id[i];
                                   }
                              }
                   }else {
                         document.getElementById(element_update).value='(Semua Kelompok)';
                         document.getElementById(\"$save_element\").value='';     
                              }
                    
               }
                </script >
             <script type=\"text/javascript\">
               function set_parent(id,nilai) {
                    parent=document.getElementById(\"id_parent_\"+id).value;
                   
               if(parent!=\"\"){
                    document.getElementById(parent).checked=nilai;
                   set_parent(parent,nilai);
                   }
              }
		  </script>
         
         <script>
              function setCheckBox(container, selectorTag, prefix,nilai,element_update) {
               var items = [];
               var hasil='';
               var myPosts = document.getElementById(container).getElementsByTagName(selectorTag);
               var c=1;
               for (var i = 0; i < myPosts.length; i++) {
                    //omitting undefined null check for brevity
                     
                    if (myPosts[i].id.lastIndexOf(prefix, 0) === 0) {
                         hasil=myPosts[i].id;
                         document.getElementById(hasil).checked=nilai
                         
                    }
               }
                    
               }
         </script>";
}
function radiokontrak($style_div,$save_element,$tbody_name,$prefix){
 
     
     $temp=explode("|",$prefix);
     $prefix=$temp[0];
     $update=$temp[1];
      
     
     $sql="SELECT DISTINCT DATE_FORMAT(TglKontrak,'%Y') as Tanggal FROM Kontrak WHERE 1 ORDER BY TglKontrak ASC";
     $result = mysql_query($sql);
     echo "<div $style_div>";
     echo "<table width=\"100%\" align=\"left\" border=\"0\" class=\"tabel\">";
     echo " <tr>
               <th align=\"left\" border=\"0\" nowrap colspan=\"3\">
                <input type=\"text\" name=\"$save_element\" id=\"$save_element\" value=\"$update\">     
               <input type=\"text\" style=\"width: 70%;\" value=\"\" id=\"search_kontrak$prefix\">
               <input type=\"button\" id=\"preload_kontrak\" value=\"Cari\" onClick=\"recp$prefix()\">
               </th>
               </tr>
               <tr>

               <th width=\"100px\">&nbsp;</th>
               <th width=\"150px\"align=\"center\"><b>Kode</b></th>
               <th width=\"500px\" align=\"left\"><b>Nama</b></th>
               </tr>
               <tr>
               <td colspan=\"3\"></td>
               </tr>
        <tbody id='$tbody_name'>";
      if($update!=""){
          
          radio_update_kontrak($update,$prefix, $tbody_name);
          
     }else{
          
         while($row = mysql_fetch_object($result))
          {
              
               $kode=$row->Tanggal;
			   if($kode=='0000')
			   $tahun="Data tahun kosong";
			   else $tahun=$kode;
               $kode_for_js="$prefix-kontrak_row_1|$kode|1";

               echo "<tr id='$kode_for_js'>";
                    echo "<td> &nbsp;<input type=\"hidden\" name=\"$tbody_name"."[]\" id=\"$prefix"."_$kode\" value=\"$kode\" onclick=\"SelectAllChild_$tbody_name(this);\">[+]</td>";
                    echo "<input type=\"hidden\" id=\"id_parent_$prefix"."_$kode\" value=\"\">";
                    echo "<input type=\"hidden\" id=\"id_nilai_$prefix"."_$kode\" value=\"$uraian\">";
                    echo "<td><a href=\"javascript:void(0)\" onClick=\"add_kontrak$prefix('$kode_for_js','$prefix"."_$kode')\">$tahun</a></td>";
                    echo "<td>&nbsp;</td>";
               echo "</tr>";
              
          }
        
     }  
     echo "	</tbody></table>";
          echo "</div>";

 }
 
 function radio_update_kontrak($id,$prefix,$tbody_name){
      $total=0;
  if($id!=""){
  $sql=mysql_query("SELECT DATE_FORMAT(TglKontrak,'%Y') as Tanggal,NoKontrak,Pekerjaan FROM Kontrak WHERE  Kontrak_ID='$id'");
  } else {
  $sql=mysql_query("SELECT * FROM Kontrak WHERE TglKontrak ='dummy'");
  }
  while($row = mysql_fetch_object($sql))
{
	 $nokontrak_tmp[]=$row->NoKontrak;
	 $pekerjaan_tmp[]=$row->pekerjaan;
	 $thnkontrak_tmp[]=$row->Tanggal;
	 $total=$total+1;	 

       echo "masukkk ";
       
}

$sql="SELECT DISTINCT DATE_FORMAT(TglKontrak,'%Y') as Tanggal FROM Kontrak WHERE 1 ORDER BY TglKontrak ASC";

$result = mysql_query($sql);

while($row = mysql_fetch_object($result))
          {
               $kode_tahun=$row->Tanggal;
               $kode=$row->Tanggal;
			   if($kode=='0000')
			   $tahun="Data tahun kosong";
			   else $tahun=$kode;
               $kode_for_js="$prefix-kontrak_row_1|$kode|1";

               echo "<tr id='$kode_for_js'>";
                    echo "<td> &nbsp;<input type=\"hidden\" name=\"$tbody_name"."[]\"  id=\"$prefix"."_$kode\" value=\"\" onclick=\"SelectAllChild_$tbody_name(this);\">[+]</td>";
                    echo "<input type=\"hidden\" id=\"id_parent_$prefix"."_$kode\" value=\"\">";
                    echo "<input type=\"hidden\" id=\"id_nilai_$prefix"."_$kode\" value=\"$uraian\">";
                    echo "<td><a href=\"javascript:void(0)\" onClick=\"add_kontrak$prefix('$kode_for_js','$prefix"."_$kode')\">$tahun</a></td>";
                    echo "<td>&nbsp;</td>";
               echo "</tr>";
	 
	 //cari child
	 $distinct="";
	 for($i=0;$i<$total;$i++){
	 if($kode_tahun==$thnkontrak_tmp[$i] && $distinct!=$nokontrak_tmp[$i]){
	 $sql_lvl1=mysql_query("select * from Kontrak where TglKontrak like '$thnkontrak_tmp[$i]%' ORDER by TglKontrak ASC");
	 while($row = mysql_fetch_object($sql_lvl1))
{	
	 $kontrak_id=$row->Kontrak_ID;
	 $kode=$row->NoKontrak;
	 $uraian=$row->Pekerjaan;
	 $distinct=$row->NoKontrak;
     
	 
	 $parent="";
    
     if($thnkontrak_tmp[$i]!='')
            $parent.="$prefix"."_$thnkontrak_tmp[$i]"; 
	
     echo "<tr id='$kode_for_js'>";
          echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" id=\"$prefix"."_$kode\" name=\"$tbody_name"."[]\"  value=\"$kontrak_id\" onclick=\"SelectAllChild_$tbody_name(this)\" checked></td>";
		  echo "<input type=\"hidden\" id=\"id_parent_$prefix"."_$kode\" value=\"$parent\">";
                    echo "<input type=\"hidden\" id=\"id_nilai_$prefix"."_$kode\" value=\"$uraian\">";
		  echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;$kode</td>";
          echo "<td>$uraian</td>";
     echo "</tr>";
	 
	 }
	}
   }
	 
	 
}   
 }
 ?>
        