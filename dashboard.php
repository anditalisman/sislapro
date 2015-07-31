<?php 

if($_SESSION['domain']=='pengawas'){
	$id_pengawas=$_SESSION['id_pengawas'];
	$username=ucwords($_SESSION['username']);
	
	$data=mysql_fetch_array(mysql_query("select * from data_pengawas where id_pengawas='$id_pengawas'"));
}else{
	$pengguna=ucwords($_SESSION['username']);
}

?>

<div id="page-heading">
    <h1>Hello, <?php echo $username;?> :)</h1>
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
    		
            <div id="message-green">
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td class="green-left">Selamat Datang di web SISLAPRO (Sistem Hasil Laporan Project). Waktu Akses [ <?php echo $_SESSION['waktu'];?> ]</td>
                <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
            </tr>
            </table>
            </div>
          
 	        <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr valign="top">
              <td><!--  start step-holder -->
                <!--  end step-holder -->
                <div id="table-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. 
                <br />
                <br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. 
                <br />
                <br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
                adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. 
                </div>
                <!-- end id-form  -->
              </td>
              <td>
              	<!--  start related-activities -->
                <?php include "pengumuman.php";?>  
                <!-- end related-activities -->
              </td>
            </tr>
            <tr>
              <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
              <td></td>
            </tr>
          </table>

      

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