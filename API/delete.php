<?php

class DELETE extends DB
{
    
    
    public function delete_data_pengadaan($param)
    {

        $aset_id=$_POST['Aset_ID'];
        $Kontraktor_ID=$_POST['kontraktor_id'];
        $sp2d_ID=$_POST['SP2D_ID'];
        $Penerimaan_ID=$_POST['Penerimaan_ID'];
        $BAST_ID=$_POST['BAST_ID'];
        $BASP_ID=$_POST['BASP_ID'];
        $Kontrakid=$_POST['Kontrak_ID'];
        $sp2did=$_POST['SP2D_ID'];
        
        if ($_POST['hapus']) {
    
            if ($aset_id !='')
            {
            $querydeleteaset = "DELETE from Aset where Aset_ID=$aset_id";
            $resultdeleteaset = mysql_query($querydeleteaset) or die ('eror2');
            $querydeletetanah = "DELETE from Tanah where Aset_ID=$aset_id";
            $resultdeletedeletetanah = mysql_query($querydeletetanah) or die ('eror3');
            $querydeletemesin = "DELETE from Mesin where Aset_ID=$aset_id";
            $resultdeletemesin = mysql_query($querydeletemesin) or die ('eror4');
            $querydeletebangunan = "DELETE from Bangunan where Aset_ID=$aset_id";
            $resultdeletebangunan = mysql_query($querydeletebangunan) or die ('eror5');
            $querydeletejaringan = "DELETE from Jaringan where Aset_ID=$aset_id";
            $resultdeletejaringan = mysql_query($querydeletejaringan) or die ('eror6');
            $querydeleteasetlain = "DELETE from AsetLain where Aset_ID=$aset_id";
            $resultdeleteasetlain = mysql_query($querydeleteasetlain) or die ('eror7');
            $querydeleteasetkdp = "DELETE from KDP where Aset_ID=$aset_id";
            $resultdeleteasetkdp = mysql_query($querydeleteasetkdp) or die ('eror8');
            $querydeletekeputusanundangundang = "DELETE from KeputusanUndangUndang where Aset_ID=$aset_id";
            $resultdeletekeputusanundangundang = mysql_query($querydeletekeputusanundangundang) or die ('eror9');
            $querydeletekeputusanpengadilan = "DELETE from KeputusanPengadilan where Aset_ID=$aset_id";
            $resultdeletekeputusanpengadilan = mysql_query($querydeletekeputusanpengadilan) or die ('eror10');
            $querydeletefoto = "DELETE from Foto where Aset_ID=$aset_id";
            $resultdeletefoto = mysql_query($querydeletefoto) or die ('eror11');
            $querydeletefotonota = "DELETE from FotoNota where Aset_ID=$aset_id";
            $resultdeletefotonota = mysql_query($querydeletefotonota) or die ('eror12');
            $querydeletekapitalisasiaset = "DELETE from KapitalisasiAset where Aset_ID=$aset_id";
            $resultdeletekapitalisasiaset= mysql_query($querydeletekapitalisasiaset) or die ('eror16');
            $querydeletepemusnahan = "DELETE from Pemusnahan where Aset_ID=$aset_id";
            $resultdeletepemusnahan= mysql_query($querydeletepemusnahan) or die ('eror17');
            }
            
            if ($BASP_ID !='')
            {
          
            $querydeletebasp = "DELETE from BASP where BASP_ID=$BASP_ID";
            $resultdeletebasp = mysql_query($querydeletebasp) or die ('eror13');
            
            }
            if ($BAST_ID !='')
            {
            $querydeletebast = "DELETE from BAST where BAST_ID=$BAST_ID";
            $resultdeletebast = mysql_query($querydeletebast) or die ('eror14');
            }if($Penerimaan_ID !='')
            {
        
                $querydeletepenerimaan = "DELETE from Penerimaan where Penerimaan_ID=$Penerimaan_ID";
                $resultdeletepenerimaan = mysql_query($querydeletepenerimaan) or die ('error1'); 
            }
            if($Kontrakid !='')
            {
            
            $querydeletekontrak = "DELETE from Kontrak where Kontrak_ID=$Kontrakid";
            $resultdeletekontrak= mysql_query($querydeletekontrak) or die ('eror15');
            }
            if($sp2d_ID !='')
            {
            $querydeletesp2d = "DELETE from SP2D where SP2D_ID=$sp2d_ID";
            $resultdeletesp2d= mysql_query($querydeletesp2d) or die ('eror18');
            }
            if($Kontraktor_ID !='')
            {
            
            $querydeletekontraktor = "DELETE from Kontraktor where Kontraktor_ID=$Kontraktor_ID"; 
            $resultkontraktor= mysql_query($querydeletekontraktor ) or die ('eror19');
            
            }
            
            $status = 1;

        }
        
        return true;
    }
    
    
    
	//tambahan
	
	//Dari Bayu 
	//PERENCANAAN
	public function delete_rkpb_data($parameter)
    {
		$id=$parameter['param']['ID'];
        $query	= "UPDATE Perencanaan SET StatusPemeliharaan ='0', Pemeliharaan ='' WHERE Perencanaan_ID = '$id'";
        $result = $this->query($query) or die ('error function delete_rkpb_data');
        if ($result)
        {
			echo '<script type=text/javascript>alert("Data Berhasil Dihapus")</script>';
            return true;
        }
        else{
			echo '<script type=text/javascript>alert("Data Gagal Dihapus")</script>';
            return false;
        }
    }
	
	public function delete_rkb_data($parameter)
    {
		$id=$parameter['param']['ID'];
        $query	= "DELETE FROM Perencanaan WHERE Perencanaan_ID= '$id'";
        $result = $this->query($query) or die ('error function delete_rkb_data');
        if ($result)
        {
			echo '<script type=text/javascript>alert("Data Berhasil Dihapus")</script>';
            return true;
        }
        else{
			echo '<script type=text/javascript>alert("Data Gagal Dihapus")</script>';
            return false;
        }
    }
	
	
	public function delete_skb_data($parameter)
    {
		$id=$parameter['param']['ID'];
        $query	= "DELETE FROM StandarKebutuhan WHERE skb_id= $id";
        $result = $this->query($query) or die ('error function delete_skb_data');
        if ($result)
        {
			echo '<script type=text/javascript>alert("Data Berhasil Dihapus")</script>';
            return true;
        }
        else{
			echo '<script type=text/javascript>alert("Data Gagal Dihapus")</script>';
            return false;
        }
    }
	
	
	public function delete_shb_data($parameter)
    {
		$id=$parameter['param']['ID'];
        $query	= "DELETE FROM StandarHarga WHERE StandarHarga_ID= $id";
        $result = $this->query($query) or die ('error function delete_shb_data');
        if ($result)
        {
            return true;
        }
        else{
            return false;
        }
    }
	
	
	//GUDANG
    public function delete_distribusi_barang($aset)
    {
		$sql = "SELECT
					Aset_ID
				FROM
					Transfer
				WHERE
					NoDokumen='$aset'";
		$exec = $this->query($sql) or die($this->error());
        while ($data = $this->fetch_object($exec))
        {
            $dataArr[] = $data->Aset_ID;
        }
                
        foreach ($dataArr as $value)
        {
        $query = "delete from Transfer where Aset_ID='$value'";
		$query2= "update Aset SET OriginDBSatker = 0, Status_Validasi_Barang=0, LastSatker_ID=0 where Aset_ID='$value'";
        $result = $this->query($query) or die ($this->error);
		$result2 = $this->query($query2) or die ($this->error);
		}
        if ($result)
        {
            return true;
        
        }
        else
        {
            return false;
        }
		
    }
    
	public function delete_gudang_pemeriksaan($aset,$gudang_id)
    {
        $query 	 = "delete from PemeriksaanGudang where Aset_ID='$aset' and PemeriksaanGudang_ID='$gudang_id'";
        $query2 = "delete from Kondisi where Aset_ID='$aset' and PemeriksaanGudang_ID='$gudang_id'";
		$result = $this->query($query) or die ($this->error);
		$result2 = $this->query($query2) or die ($this->error);
        if ($result)
        {
            return true;
        
        }
        else
        {
            return false;
        }
    }
	//Akhir Dari Bayu
	
	//kerjaan yoda
  //kerjaan yoda
    public function delete_daftar_usulan_pemindahtanganan($id)
    {
        $query="UPDATE Usulan SET FixUsulan=0 WHERE Usulan_ID='$id'";
        $exec=$this->query($query) or die($this->error());


        $query2="UPDATE Aset SET NotUse=0 WHERE Usulan_Pemindahtanganan_ID='$id'";
        $exec2=$this->query($query2) or die($this->error());


        $query3="DELETE FROM UsulanAset WHERE Usulan_ID='$id'";
        $exec3=$this->query($query3) or die($this->error());

        $query4="UPDATE Aset SET Usulan_Pemindahtanganan_ID=NULL WHERE Usulan_Pemindahtanganan_ID='$id'";
        $exec4=$this->query($query4) or die($this->error());
        
        if($exec3){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_daftar_penetapan_pemindahtanganan($id)
    {
        $query="UPDATE BASP SET FixPemindahtanganan=0 WHERE BASP_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query2="UPDATE UsulanAset SET StatusPenetapan=0 WHERE Penetapan_ID='$id' AND Jenis_Usulan='PDH'";
        $exec2=$this->query($query2) or die($this->error());


        $tampil="SELECT Aset_ID,NomorRegOrigin FROM BASPAset WHERE BASP_ID='$id'";
        $exec_tampil=$this->query($tampil) or die($this->error());
        while($array=  $this->fetch_array($exec_tampil)){

                $nomorreg=$array['NomorRegOrigin'];
                $asetid=$array['Aset_ID'];

                $update="UPDATE Aset Set NomorReg='$nomorreg' WHERE Aset_ID='$asetid'";
                //print_r($update);
                $query_update=$this->query($update) or die($this->error());
                if($query_update)
                {
                    $status = 1;
                }
                else
                {
                    $status = 0;
                }

        }

        if ($status == 1)
        {
            //echo 'goal';
        }

        $query3="DELETE FROM BASPAset WHERE BASP_ID='$id' AND Status=0";
        $exec3=$this->query($query3) or die($this->error());

        $query4="UPDATE Aset SET BASP_ID=0 WHERE BASP_ID='$id'";
        $exec4=$this->query($query4) or die($this->error());
    
        if($exec3){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_daftar_validasi_pemindahtanganan($id)
    {
        $query="UPDATE BASP SET Status=0 WHERE BASP_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query2="UPDATE BASPAset SET Status=0 WHERE BASP_ID='$id'";
        $exec=$this->query($query2) or die($this->error());
    
        if($exec){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_daftar_usulan_penghapusan($id)
    {
        $query="UPDATE Usulan SET FixUsulan=0 WHERE Usulan_ID='$id'";
        $exec=$this->query($query) or die($this->error());


        $query2="UPDATE Aset SET NotUse=0 WHERE Usulan_Penghapusan_ID='$id'";
        $exec2=$this->query($query2) or die($this->error());


        $query3="DELETE FROM UsulanAset WHERE Usulan_ID='$id'";
        $exec3=$this->query($query3) or die($this->error());

        $query4="UPDATE Aset SET Usulan_Penghapusan_ID=NULL WHERE Usulan_Penghapusan_ID='$id'";
        $exec4=$this->query($query4) or die($this->error());
        
        if($exec3){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_daftar_penetapan_penghapusan($id)
    {
        $querytampil="SELECT * FROM PenghapusanAset WHERE Penghapusan_ID='$id'";
        $exectampil=  $this->query($querytampil) or die($this->error());
        while($row=  $this->fetch_array($exectampil)){

        $asetid = $row['Aset_ID'];

        $query4="UPDATE Aset SET Dihapus=0 WHERE Aset_ID='$asetid'";
        $exec4=$this->query($query4) or die($this->error());
        }   

        $query="UPDATE Penghapusan SET FixPenghapusan=0 WHERE Penghapusan_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query2="UPDATE UsulanAset SET StatusPenetapan=0 WHERE Penetapan_ID='$id' AND Jenis_Usulan='HPS'";
        $exec2=$this->query($query2) or die($this->error());

        $query3="DELETE FROM PenghapusanAset WHERE Penghapusan_ID='$id' AND Status=0";
        $exec3=$this->query($query3) or die($this->error());
        
        if($exec3){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_update_daftar_validasi_penghapusan($id)
    {
        $query="UPDATE Penghapusan SET Status=0 WHERE Penghapusan_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query2="UPDATE PenghapusanAset SET Status=0 WHERE Penghapusan_ID='$id'";
        $exec2=$this->query($query2) or die($this->error());
    
        if($exec)
        {
            return true;
        }
        elseif($exec2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function delete_daftar_usulan_pemusnahan($id)
    {
        $query="UPDATE Usulan SET FixUsulan=0 WHERE Usulan_ID='$id'";
        $exec=$this->query($query) or die($this->error());


        $query2="UPDATE Aset SET NotUse=0 WHERE Usulan_Pemusnahan_ID='$id'";
        $exec2=$this->query($query2) or die($this->error());


        $query3="DELETE FROM UsulanAset WHERE Usulan_ID='$id'";
        $exec3=$this->query($query3) or die($this->error());

        $query4="UPDATE Aset SET Usulan_Pemusnahan_ID=NULL WHERE Usulan_Pemusnahan_ID='$id'";
        $exec4=$this->query($query4) or die($this->error());
        
        if($exec3)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    //update kerjaan yoda lanjt sinii ...
    
    public function delete_daftar_penetapan_pemusnahan($id)
    {
        $query="UPDATE BAPemusnahan SET FixPemusnahan=0 WHERE BAPemusnahan_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query2="UPDATE UsulanAset SET StatusPenetapan=0 WHERE Penetapan_ID='$id' AND Jenis_Usulan='MSN'";
        $exec2=$this->query($query2) or die($this->error());

        $query3="DELETE FROM BAPemusnahanAset WHERE BAPemusnahan_ID='$id' AND Status=0";
        $exec3=$this->query($query3) or die($this->error());

        $query4="UPDATE Aset SET BAPemusnahan_ID=0 WHERE BAPemusnahan_ID='$id'";
        $exec4=$this->query($query4) or die($this->error());
        
        if($exec3)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function delete_update_daftar_validasi_pemusnahan($id)
    {
        $query="UPDATE BAPemusnahan SET Status=0 WHERE BAPemusnahan_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query2="UPDATE BAPemusnahanAset SET Status=0 WHERE BAPemusnahan_ID='$id'";
        $exec2=$this->query($query2) or die($this->error());
    
        if($exec)
        {
            return true;
        }
        elseif($exec2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function delete_daftar_penetapan_penggunaan($id)
    {
        $query="UPDATE Penggunaan SET FixPenggunaan=0 WHERE Penggunaan_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query2="UPDATE Aset SET NotUse=0 WHERE LastPenggunaan_ID='$id'";
        $exec2=$this->query($query2) or die($this->error());

        $query3="DELETE FROM PenggunaanAset WHERE Penggunaan_ID='$id' AND Status=0 AND StatusMenganggur=0";
        $exec3=$this->query($query3) or die($this->error());

        $query4="UPDATE Aset SET LastPenggunaan_ID=NULL WHERE LastPenggunaan_ID='$id'";
        $exec4=$this->query($query4) or die($this->error());
        
        if($exec3){
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_update_daftar_validasi_penggunaan($id)
    {
        $query="UPDATE Penggunaan SET Status=0 WHERE Penggunaan_ID='$id'";
        $exec=$this->query($query) or die($this->error());

        $query1="UPDATE PenggunaanAset SET Status=0 WHERE Penggunaan_ID='$id' AND StatusMenganggur=0";
        $exec1=$this->query($query1) or die($this->error());
    
        if($exec)
        {
            return true;
        }
        elseif($exec1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    //kerjaan yoda end
    
	//akhir tambahan
    
    /* Clear table apl_user_asetlist ketika logout */
    public function clear_table_apl_userasetlist($sessi)
    {
	
	$query = "DELETE FROM apl_userasetlist WHERE UserNm = '$sessi'";
	$result = $this->query($query) or die ($this->error());
	
	return true;
	
	
    }
    
	public function reset_table_apl_userasetlist($data)
	{
		$query = "DELETE FROM apl_userasetlist WHERE UserNm ='{$data['user']}'";
		$result = $this->query($query) or die ($this->error());
		return true;
	}
    public function clear_table_apl_userasetlist_by_module($module, $sessi)
    {
	
		$query = "DELETE FROM apl_userasetlist WHERE aset_action = '$module' AND UserSes = '$sessi'";
		$result = $this->query($query) or die ($this->error());
		
		return true;
	
	
    }
	
}

?>