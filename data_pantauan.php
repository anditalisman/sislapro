<?php

include "conn.php";

if(isset($_POST['submit'])){
  
  $id_pengawas=htmlentities($_POST['id_pengawas']);
  $id_subkon=htmlentities($_POST['id_subkon']);
  $id_kavling=htmlentities($_POST['id_kavling']);
  $tahapan=htmlentities($_POST['tahapan']);
  
  $query=mysql_query("insert into tabel_pantauan values('','$id_pengawas','$id_subkon','$id_kavling', '$tahapan')");
  
  
  if($query){
    ?><script language="javascript">document.location.href="?page=data_pantauan&status=1";</script><?php
  }else{
    ?><script language="javascript">document.location.href="?page=data_pantauan&status=2";</script><?php
  }
  
  
}else{
  unset($_POST['submit']);
}

?>
<!--  start page-heading -->
<div id="page-heading">
    <h1>Data Pantauan</h1>
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
                <td class="red-left">Data gagal di simpan!</td>
                <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
            
      <?php
      }
      ?>
    
        <form action="?page=data_pantauan" method="post">
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
                      <th valign="top">Subkon</th>
                      <td><select name="id_subkon"  class="styledselect_form_1">

                          <?php
              $subkon=mysql_query("select * from data_subkon order by nama_subkon asc");
              while($row2=mysql_fetch_array($subkon)){
              ?>
                <option value="<?php echo $row2['id_subkon'];?>"><?php echo $row2['nama_subkon'];?></option>
              <?php
              }
              ?>    
  
                        </select>
                      </td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <th valign="top">Kavling</th>
                      <td><select name="id_kavling" class="styledselect_form_1">

                          <?php
              $kavling=mysql_query("select * from data_kavling order by nomor_kavling asc");
              while($row3=mysql_fetch_array($kavling)){
              ?>
                <option value="<?php echo $row3['id_kavling'];?>"><?php echo $row3['nomor_kavling'];?></option>
              <?php
              }
              ?>    
  
                        </select>
                      </td>
                      <td></td>
                    </tr>

                    <tr>
                      <th valign="top">Tahapan</th>
                      <td><select name="tahapan"  class="styledselect_form_1">
                        <option value="BAJA BERAT"> BAJA BERAT</option>
                        <option value="BAJA RINGAN F1"> BAJA RINGAN F1</option>
                        <option value="BAJA RINGAN F2"> BAJA RINGAN F2</option>
                        <option value="FISIK F1"> FISIK F1</option>
                        <option value="FISIK F2"> FISIK F2</option>
                        <option value="FISIK F3"> FISIK F3</option>
                        <option value="FISIK F4"> FISIK F4</option>                        
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

      <p><em>*1 Kavling hanya bisa dikelola oleh 1 Subkon dan 1 Pengawas.<br /></em> </p>           
      <p>&nbsp;</p>
        <!--  start product-table ..................................................................................... -->
        <form id="mainform" action="">
        <table border="0" width="80%" cellpadding="0" cellspacing="0" id="product-table">
        <tr>
            <th width="13%" class="table-header-repeat line-left minwidth-1"><a href="">Nomor</a> </th>
            <th width="24%" class="table-header-repeat line-left minwidth-1"><a href="">Nama Pengawas</a></th>
            <th width="24%" class="table-header-repeat line-left minwidth-1"><a href="">Nama Subkon</a></th>
            <th width="24%" class="table-header-repeat line-left minwidth-1"><a href="">No. Kavling</a></th>
            <th width="30%" class="table-header-repeat line-left minwidth-1"><a href="">Tahapan</a></th>
            <th width="10%" class="table-header-options line-left"><a href="">Aksi</a></th>
        </tr>
        
        
        <?php
    $view=mysql_query("select * from tabel_pantauan pantauan, data_kavling kavling, data_subkon subkon, data_pengawas pengawas where pantauan.id_kavling=kavling.id_kavling and pantauan.id_subkon=subkon.id_subkon and pantauan.id_pengawas=pengawas.id_pengawas order by id_pantauan asc");
    
    $no=0;
    while($row=mysql_fetch_array($view)){
    ?>  
    <tr>
            <td><?php echo $no=$no+1;?></td>
            <td><?php echo $row['nama_pengawas'];?></td>
            <td><?php echo $row['nama_subkon'];?></td>
            <td><?php echo $row['nomor_kavling'];?></td>
            <td><?php echo $row['tahapan'];?></td>
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
