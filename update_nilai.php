<?php

include "conn.php";

if(isset($_POST['submit'])){
	
	$jumSis = $_POST['jumlah'];
	
	
	for ($i=1; $i<=$jumSis; $i++)
	{
	  
	   $nilai  = $_POST['nilai'.$i];
	   
	   $id_kavling = $_POST['id_kavling'.$i];
	   $id_pengawas = $_POST['id_pengawas'];
	   $id_subkon = $_POST['id_subkon'];
	   
	   $query = "update tabel_nilai set nilai='$nilai' where id_kavling='$id_kavling' and id_subkon='$id_subkon' and id_pengawas='$id_pengawas'";
	   $hasil=mysql_query($query);
	}
	
	if($hasil){
		?><script language="javascript">document.location.href="?page=input_nilai_selesai&id_pengawas=<?php echo $id_pengawas;?>&id_subkon=<?php echo $id_subkon;?>";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=input_nilai_selesai&status=0";</script><?php
	}
	
	
}else{
	unset($_POST['submit']);
}

?>

<!--  start page-heading -->
<div id="page-heading">
    <h1>Input Nilai</h1>
</div>
<!-- end page-heading -->



<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
    <td id="tbl-border-left"></td>
    <td>
    <!--  start content-table-inner ...................................................................... START -->
    <div id="content-table-inner">
    		
            <?php
			if($_GET['status']='1'){
			?>
			
            <div id="message-green">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="green-left">Data berhasil disimpan</td>
                <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
            
			<?php
			}
			
			if($_GET['status']='0'){
			?>

            <div id="message-red">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="red-left"><?php echo mysql_error();?></td>
                <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
            
			<?php
			}
			?>


      	<!--  start product-table ..................................................................................... -->
        
        <!--  start step-holder -->
		<div id="step-holder">
			
		    <div class="step-no-off">1</div>
			<div class="step-light-left"><a href="?page=input_nilai">Pilih Subkon</a></div>
			<div class="step-light-right">&nbsp;</div>
            
            <div class="step-no">2</div>
			<div class="step-dark-left">Update Nilai</div>
			<div class="step-dark-right">&nbsp;</div>
            
            
			<div class="step-no-off">3</div>
			<div class="step-light-left">Selesai</div>
			<div class="step-light-round">&nbsp;</div>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
    	<?php
		
		$id_pengawas=$_GET['id_pengawas'];
		$id_subkon=$_GET['id_subkon'];
		$id_pelajaran=$_GET['id_pelajaran'];
		
		$pengawas=mysql_fetch_array(mysql_query("select * from data_pengawas where id_pengawas='$id_pengawas'"));
		$subkon=mysql_fetch_array(mysql_query("select * from setup_subkon where id_subkon='$id_subkon'"));
		
		$nama_pengawas=$pengawas['nama_pengawas'];
		$nama_subkon=$subkon['nama_subkon'];
		
		?>
    
    
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
          <th valign="top">Nama pengawas</th>
          <td><input type="text" class="inp-form" name="nomor_kavling" value="<?php echo $nama_pengawas;?>" disabled="disabled"/></td>
          <td></td>
        </tr>         
        <tr>
          <th valign="top">subkon</th>
          <td><input type="text" class="inp-form" name="nis" value="<?php echo $nama_subkon;?>" disabled="disabled"/></td>
          <td></td>
        </tr>
      </table>
      <br />
      
        <form id="mainform" action="home.php?page=input_nilai_update" method="post">
        <table border="0" width="48%" cellpadding="0" cellspacing="0" id="product-table">
        <tr>
            <th width="10%" class="table-header-repeat line-left minwidth-1"><a href="">Nomor</a>	</th>
            <th width="60%" class="table-header-repeat line-left minwidth-1"><a href="">Nama kavling</a></th>
            <th width="30%" class="table-header-repeat line-left minwidth-1"><a href="">Nilai kavling</a></th>
        </tr>
        
        
        <?php
		$view=mysql_query("SELECT * FROM tbl_nilai nilai, data_kavling kavling WHERE nilai.id_kavling=kavling.id_kavling and nilai.id_pengawas='$id_pengawas' and nilai.id_subkon='$id_subkon' and nilai.id_pelajaran='$id_pelajaran' order by kavling.nomor_kavling asc");
		
		$i = 1;
		while($row=mysql_fetch_array($view)){
			?>
            <input type="hidden" name="id_pengawas" value="<?php echo $id_pengawas;?>" />
			<input type="hidden" name="id_subkon" value="<?php echo $id_subkon;?>" />
            <?php echo "<input type='hidden' name='id_kavling".$i."' value='".$row['id_kavling']."' />"; ?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $row['nomor_kavling'];?></td>
				<td><?php echo "<input type='text' name='nilai".$i."' size='10' value='".$row['nilai']."'/>"; ?></td>
			</tr>
			<?php
			$i++;
		}
			$jumSis = $i-1;
		?>
        <input type="hidden" name="jumlah" value="<?php echo $jumSis ?>" />
        <tr>
            <td colspan="4" align="center"><input type="submit" onclick="return confirm('Apakah Anda yakin?')" value="Update" name="submit"/></td>
        </tr>
        </table>
        <!--  end product-table................................... --> 
        </form>
		
        
        
	<div class="clear"></div>
     
    </div>
    <!--  end content-table-inner ............................................END  -->
    </td>
    <td id="tbl-border-right"></td>
</tr>
<tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom">&nbsp;</td>
    <th class="sized bottomright"></th>
</tr>
</table>