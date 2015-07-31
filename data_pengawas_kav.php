<?php

include "conn.php";

if(isset($_POST['submit'])){
	
	$id_pengawas=htmlentities($_POST['id_pengawas']);
	$id_kavling=htmlentities($_POST['id_kavling']);
	
	$query=mysql_query("insert into tabel_pengawas_kav values('','$id_pengawas','$id_kavling')");
	
	if($query){
		?><script language="javascript">document.location.href="?page=data_pengawas_kav&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="?page=data_pengawas_kav&status=2";</script><?php
	}
	
}else{
	unset($_POST['submit']);
}


?>

<!--  start page-heading -->
<div id="page-heading">
    <h1>Data Pengawas/Kavling</h1>
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
                <td class="green-left">Data berhasil di simpan</td>
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
                <td class="red-left">Data gagal di simpan !</td>
                <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
            
			<?php
			}
			?>
    
    		<form action="?page=data_pengawas_kav" method="post">
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td><!--  start step-holder -->
                <!--  end step-holder -->
                  <!-- start id-form -->
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Pengawas</th>
                      <td><select name="id_pengawas"  class="styledselect_form_1">
                      
                      <?php
					  $pengawas=mysql_query("select * from data_pengawas order by nama_pengawas asc");
					  while($row1=mysql_fetch_array($pengawas)){
					  ?>
                          <option value="<?php echo $row1['id_pengawas'];?>"><?php echo $row1['nama_pengawas'];?></option>
					  <?php
					  }
					  ?>                          
                          
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Kavling</th>
                      <td><select name="id_kavling"  class="styledselect_form_1">

                          <?php
						  $kavling=mysql_query("select * from data_kavling order by nomor_kavling asc");
						  while($row2=mysql_fetch_array($kavling)){
						  ?>
							  <option value="<?php echo $row2['id_kavling'];?>"><?php echo $row2['nomor_kavling'];?></option>
						  <?php
						  }
						  ?>    
  
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th>&nbsp;</th>
                      <td valign="top"><input type="submit" name="submit" value="" class="form-submit" />
                          <input type="reset" value="" class="form-reset"  />
                      </td>
                      <td></td>
                    </tr>
                  </table>
                <!-- end id-form  -->
              </td>
              <td><!--  start related-activities -->
              </td>
            </tr>
            <tr>
              <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
              <td></td>
            </tr>
        	</table>
			</form>

		    <p><em>*Satu Pengawas mengelola banyak kavling      	    </em>
              <!--  start product-table ..................................................................................... -->
        </p>
		    <p>&nbsp;    </p>
	    <form id="mainform" action="">
        <table border="0" width="71%" cellpadding="0" cellspacing="0" id="product-table">
        <tr>
            <th width="24%" class="table-header-repeat line-left minwidth-1"><a href="">Nama pengawas</a></th>
            <th width="24%" class="table-header-repeat line-left minwidth-1"><a href="">Kavling</a></th>
            <th width="13%" class="table-header-options line-left"><a href="">Aksi</a></th>
        </tr>
        
        
        <?php
		$view=mysql_query("select * from tabel_pengawas_kav pengawas_kav, data_kavling kavling, data_pengawas pengawas where pengawas_kav.id_kavling=kavling.id_kavling and pengawas_kav.id_pengawas=pengawas.id_pengawas order by id_pengawas_kav asc");
		
		$no=0;
		while($row=mysql_fetch_array($view)){
		?>	
		<tr>
            <td><?php echo $row['nama_pengawas'];?></td>
            <td><?php echo $row['nomor_kavling'];?></td>
            <td class="options-width">
            <a href="" title="Delete" class="icon-2 info-tooltip"></a>
            <a href="" title="Edit" class="icon-5 info-tooltip"></a>            
            </td>
        </tr>
		<?php
		}
		?>
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
