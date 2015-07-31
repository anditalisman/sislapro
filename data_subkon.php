<?php

include "conn.php";

if(isset($_POST['submit'])){
  
  $nama_subkon=htmlentities($_POST['nama_subkon']);
  $telpon_subkon=htmlentities($_POST['telpon_subkon']);
    
  $query=mysql_query("insert into data_subkon values('','$nama_subkon','$telpon_subkon')");
  
  if($query){
    ?><script language="javascript">document.location.href="?page=data_subkon&status=1";</script><?php
  }else{
    ?><script language="javascript">document.location.href="?page=data_subkon&status=2";</script><?php
  }
  
}else{
  unset($_POST['submit']);
}


?>

<!--  start page-heading -->
<div id="page-heading">
    <h1>Data subkon</h1>
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
    
        <form action="?page=data_subkon" method="post">
          <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td><!--  start step-holder -->
                <!--  end step-holder -->
                  <!-- start id-form -->
                  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                    <tr>
                      <th valign="top">Nama Subkon </th>
                      <td><input type="text" class="inp-form" name="nama_subkon"/></td>
                      <td></td>
                    </tr>                     
                     <tr>
                      <th valign="top">Telpon </th>
                      <td><input type="text" class="inp-form" name="telpon_subkon"/></td>
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


        <!--  start product-table ..................................................................................... -->
        <form id="mainform" action="">
        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
        <tr>
            <th width="5%" class="table-header-repeat line-left minwidth-1"><a href="">Nomor</a>  </th>
            <th width="28%" class="table-header-repeat line-left minwidth-1"><a href="">Nama Subkon</a></th>
            <th width="13%" class="table-header-repeat line-left minwidth-1"><a href="">Telpon</a></th>
            <th width="5%" class="table-header-options line-left"><a href="">Aksi</a></th>
        </tr>
        
        
        <?php
    $view=mysql_query("select * from data_subkon order by nama_subkon asc");
    
    $no=0;
    while($row=mysql_fetch_array($view)){
    ?>  
    <tr>
            <td><?php echo $no=$no+1;?></td>
            <td><?php echo $row['nama_subkon'];?></td>
            <td><?php echo $row['telpon_subkon'];?></td>
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
