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
 
function js_radiongo($alamat_simpul,$alamat_search,$parsing,$save_element,$tbody_name,$prefix){
     
   echo"<script type=\"text/javascript\">
function add_ngo$prefix(kode_for_js,kode){
     
     if (document.getElementById(kode).checked == true ) {
	 var c = 1;
	 } else { c = 0;}
     url=\"$alamat_simpul?kode_for_js=\"+kode_for_js
          +\"&kode=\"+kode+\"|\"+c;
     dropDownRadioButton_Kelompok(url,kode_for_js,'$tbody_name');
     //ambilData(url, kode_for_js)
     
} </script>";

  
     
  echo "<script type=\"text/javascript\">
			function recp_ngo$prefix(id) {
			document.getElementById('preload_ngo').value='Mencari..';
			document.getElementById('preload_ngo').disabled=true;
			document.getElementById('$parsing').value='(Semua NGO)';
			id=document.getElementById('search_ngo$prefix').value;
			   url=\"$alamat_search?id=$prefix\"+\"_\"+encodeURIComponent(id)+\"&tbody=$tbody_name\";
			  $('#$tbody_name').load(url);
			}
			</script>";
  
  echo "
          <script type=\"text/javascript\">
               
		  function SelectAllChild_$tbody_name(id) {
                   b=id.id;
                 
                   show_result_ngo_$tbody_name(\"$tbody_name\", \"input\", \"$prefix\", \"$parsing\");


              }
		  </script>
               <script type=\"text/javascript\">
               function show_result_ngo_$tbody_name(container, selectorTag, prefix,element_update) {
                   
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
                         document.getElementById(element_update).value='(Semua NGO)';
                         document.getElementById(\"$save_element\").value='';     
                              }
                    
               }
                </script >
             <script type=\"text/javascript\">
               function set_parent_ngo(id,nilai) {
                    parent=document.getElementById(\"id_parent_\"+id).value;
                   
               if(parent!=\"\"){
                    document.getElementById(parent).checked=nilai;
                   set_parent_ngo(parent,nilai);
                   }
              }
		  </script>
         
         <script>
              function setradio_ngo(container, selectorTag, prefix,nilai,element_update) {
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
function radiongo($style_div,$save_element,$tbody_name,$prefix){
 
     
     $temp=explode("|",$prefix);
     $prefix=$temp[0];
     $update=$temp[1];
     
     
     $sql="SELECT * FROM Satker WHERE KodeSektor is not NULL and KodeSatker is NULL and NGO ='1' order by KodeSektor asc";
     $result = mysql_query($sql);
     echo "<div $style_div>";
     echo "<table width=\"100%\" align=\"left\" border=\"0\" class=\"tabel\">";
     echo " <tr>
               <th align=\"left\" border=\"0\" nowrap colspan=\"3\">
                <input type=\"hidden\" name=\"$save_element\" id=\"$save_element\" value=\"$update\">     
               <input type=\"text\" style=\"width: 70%;\" value=\"\" id=\"search_ngo$prefix\">
               <input type=\"button\" id=\"preload_ngo\" value=\"Cari\" onClick=\"recp_ngo$prefix()\">
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
          radio_updatengo($update,$prefix, $tbody_name);
          
     }else{ 
     
         while($row = mysql_fetch_object($result))
          {
               $ngo_id=$row->Satker_ID;
               $kode=$row->KodeSektor;
               $uraian=$row->NamaSatker;
               $kode_for_js="$prefix-ngo_row__1|$kode|1";
			   
			

               echo "<tr id='$kode_for_js'>";
                    echo "<td> &nbsp;<input type=\"hidden\" name=\"$tbody_name"."[]\" id=\"$prefix"."_$kode\" value=\"$ngo_id\" onclick=\"SelectAllChild_$tbody_name(this);\">[+]</td>";
                    echo "<input type=\"hidden\" id=\"id_parent_$prefix"."_$kode\" value=\"\">";
                    echo "<input type=\"hidden\" id=\"id_nilai_$prefix"."_$kode\" value=\"$uraian\">";
                    echo "<td>NGO-$kode</td>";
                    echo "<td><a href=\"javascript:void(0)\" onClick=\"add_ngo$prefix('$kode_for_js','$prefix"."_$kode')\">$uraian</a></td>";
               echo "</tr>";
              
          }
          
     }
          
          echo "	</tbody></table>";
          echo "</div>";

 }
 
 
 function radio_updatengo($update,$prefix, $tbody_name){
      $total=0;
  if($update!=""){
  $sql=mysql_query("SELECT * FROM Satker WHERE Satker_ID='$update' limit 1");
  } else {
  $sql=mysql_query("SELECT * FROM Satker WHERE NGO ='dummy' order by KodeSektor asc");
  }
  while($row = mysql_fetch_object($sql))
{
	 $kodesektor_tmp[]=$row->KodeSektor;
	 $kodesatker_tmp[]=$row->KodeSatker;
	 $namasatker_tmp[]=$row->NamaSatker;
	 $total=$total+1;	 
}


$sql="SELECT * FROM Satker WHERE KodeSektor is not NULL and KodeSatker is NULL and NGO ='1' order by KodeSektor asc";

$result = mysql_query($sql);

while($row = mysql_fetch_object($result))
{
			   $kode_induk=$row->KodeSektor;
			   $ngo_id=$row->Satker_ID;
               $kode=$row->KodeSektor;
               $uraian=$row->NamaSatker;
               $kode_for_js="$prefix-ngo_row_1|$kode|1";
			   
			   $parent="";
			   
               echo "<tr id='$kode_for_js'>";
                    echo "<td> &nbsp;<input type=\"hidden\" name=\"$tbody_name"."[]\" id=\"$prefix"."_$kode\" value=\"$ngo_id\" onclick=\"SelectAllChild_$tbody_name(this);\">[+]</td>";
                    echo "<input type=\"hidden\" id=\"id_parent_$prefix"."_$kode\" value=\"\">";
                    echo "<input type=\"hidden\" id=\"id_nilai_$prefix"."_$kode\" value=\"$uraian\">";
                    echo "<td>NGO-$kode</td>";
                    echo "<td><a href=\"javascript:void(0)\" onClick=\"add_ngo$prefix('$kode_for_js','$prefix"."_$kode')\">$uraian</a></td>";
               echo "</tr>";
	 
	 //cari child
	 $distinct="";
	 for($i=0;$i<$total;$i++){
	 if($kode_induk==$kodesektor_tmp[$i] && $distinct!=$kodesatker_tmp[$i]){
	 $sql_lvl1=mysql_query("select * from Satker where KodeSektor='$kodesektor_tmp[$i]' and KodeSatker='$kodesatker_tmp[$i]' and NGO='1' ORDER by KodeSatker ASC");
	 while($row = mysql_fetch_object($sql_lvl1))
{	
	 $ngo_id=$row->Satker_ID;
	 $kode=$row->KodeSatker;
	 $uraian=$row->NamaSatker;
	 $distinct=$row->KodeSatker;
     $kode_for_js="$prefix-ngo_row_1|$kode|2";
	 
	 $parent="";
    
     if($kodesektor_tmp[$i]!='')
            $parent.="$prefix"."_$kodesektor_tmp[$i]"; 
	
     echo "<tr id='$kode_for_js'>";
          echo "<td> &nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" id=\"$prefix"."_$kode\" name=\"$tbody_name"."[]\" value=\"$ngo_id\" onclick=\"SelectAllChild_$tbody_name(this)\"checked></td>";
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
        