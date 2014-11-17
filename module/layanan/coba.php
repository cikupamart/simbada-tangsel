<script language="JavaScript" src="prototype.js"></script>
 <script language="JavaScript">
 function showChildren(obj)
 {
     var children = obj.immediateDescendants();
     for(var i=0;i<children.length;i++)
     {
         if(children[i].tagName.toLowerCase()=='ul')
             children[i].toggle();
     }
 }
 
 function checkChildren(obj,srcObj)
 {
     var children = obj.immediateDescendants();
     for(var i=0;i<children.length;i++)
     {
         if(children[i].tagName.toLowerCase()=='input' && children[i].type=='checkbox' && children[i]!=srcObj)
             children[i].checked = srcObj.checked;
 
         // recursive call
         checkChildren(children[i],srcObj);
     }
 }
 </script>
 <style type='text/css' media='all'>
 body {
     font: normal 11px verdana;
     }
 
 ul li{
     list-style-type:none;
     margin:0;
     padding:0;
     margin-left:8px;
 }
 
 ul li a{
     text-decoration:none;
     color:#000;
 }
 </style>

<?php

include "../../config/config.php";
open_connection();
$i=0;
$j=0;
$k=0;
echo"<table border=\"1\">";

$sql_data="SELECT * FROM Kelompok WHERE Bidang='NULL' AND Kelompok='NULL' AND  Sub='NULL' AND SubSub='NULL' ORDER BY Golongan";
$qry_data=mysql_query($sql_data) or die ("gagal menampilkan".mysql_error());
      while($hsl_data=mysql_fetch_array($qry_data)){
                  $golongan=$hsl_data['Golongan'];
                  
                 
                  
                  $subsub=$hsl_data['SubSub'];
                                   
                  echo "<tr  style=\"display:block\" id=\"".$i++."\"><td ><input type=\"checkbox\" onclick='checkChildren($(\"".$j++."\"),this);' ></td><td>".$hsl_data['Kode']."</td><td><a href='javascript:void(0);' onclick='showChildren($(\"".$k++."\"));'>".$hsl_data['Uraian']."</a></td></tr>";
                      $sql_data1="SELECT * FROM Kelompok WHERE Golongan='$golongan' AND Bidang!='NULL' AND Kelompok='NULL' AND  Sub='NULL' AND SubSub='NULL' ";
                      $qry_data1=mysql_query($sql_data1) or die ("gagal menampilkan".mysql_error());
                              while($hsl_data1=mysql_fetch_array($qry_data1)){
                                    $bidang=$hsl_data1['Bidang'];                        
                               
                                    echo "<tr  style=\"display:none\" id=\"".$i++."\"><td><input type=\"checkbox\" onclick='checkChildren($(\"".$j++."\"),this);'></td><td>".$hsl_data1['Kode']." </td><td><a href='javascript:void(0);' onclick='showChildren($(\"".$k++."\"));'> ".$hsl_data1['Uraian']."</a></td></tr>";
                                    $sql_data2="SELECT * FROM Kelompok WHERE Golongan='$golongan' AND Bidang='$bidang' AND Kelompok!='NULL' AND  Sub='NULL' AND SubSub='NULL' ";
                                    $qry_data2=mysql_query($sql_data2) or die ("gagal menampilkan".mysql_error());
                                              while($hsl_data2=mysql_fetch_array($qry_data2)){
                                                   $kelompok=$hsl_data2['Kelompok'];
                                                  
                                                  echo "<tr  style=\"display:none\" id=\"".$i++."\"><td><input type=\"checkbox\" onclick='checkChildren($(\"".$j++."\"),this);'></td><td>".$hsl_data2['Kode']."  </td><td><a href='javascript:void(0);' onclick='showChildren($(\"".$k++."\"));'> ".$hsl_data2['Uraian']."</a></td></tr>";
                                                  $sql_data3="SELECT * FROM Kelompok WHERE Golongan='$golongan' AND Bidang='$bidang' AND Kelompok='$kelompok' AND  Sub!='NULL' AND SubSub='NULL' ";
                                                  $qry_data3=mysql_query($sql_data3) or die ("gagal menampilkan".mysql_error());
                                                              while($hsl_data3=mysql_fetch_array($qry_data3)){
                                                                  $sub=$hsl_data3['Sub'];
                                                                  
                                                                  echo "<tr  style=\"display:none\" id=\"".$i++."\"><td><input type=\"checkbox\" onclick='checkChildren($(\"".$j++."\"),this);' ></td><td>".$hsl_data3['Kode']."</td><td> <a href='javascript:void(0);' onclick='showChildren($(\"".$k++."\"));'>".$hsl_data3['Uraian']."</a></td></tr>";
                                                                  $sql_data4="SELECT * FROM Kelompok WHERE Golongan='$golongan' AND Bidang='$bidang' AND Kelompok='$kelompok' AND  Sub='$sub' AND SubSub!='NULL' ";
                                                                  $qry_data4=mysql_query($sql_data4) or die ("gagal menampilkan".mysql_error());
                                                                              while($hsl_data4=mysql_fetch_array($qry_data4)){
                                                                                 
                                                                                  echo "<tr  style=\"display:none\" id=\"".$i++."\"><td><input type=\"checkbox\" onclick='checkChildren($(\"".$j++."\"),this);'></td><td>".$hsl_data4['Kode']."</td><td><a href='javascript:void(0);' onclick='showChildren($(\"".$k++."\"));'> ".$hsl_data4['Uraian']."</a></td></tr>";
                                                                              }
                                                                  
                                                                  //echo"</ul></li>";
                                                                  
                                                              }
                                                  
                                                  //echo"</ul></li>";
                                                  
                                              }
                                  
                                  //echo"</ul></li>";
                                  
                              }

                  //echo"</ul></li>";  
                  
       }

//echo "</ul>";

echo"</table>";

?>

 