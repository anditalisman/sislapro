<?php session_start();

include "conn.php";

if (isset($_POST['login'])){
	//koneksi terpusat

	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$domain=$_POST['domain'];
	
	if($domain=="admin"){
		$query=mysql_query("select * from user_admin where username='$username' and password='$password'");
		$cek=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		$id_admin=$row['id_admin'];
		
		if($cek){
			$_SESSION['username']=$username;
			$_SESSION['id_admin']=$id_admin;
			$_SESSION['domain']=$domain;
			$_SESSION['waktu']=date("Y-m-d H:i:s");
			
			?><script language="javascript">document.location.href="home.php";</script><?php
			
		}else{
			?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
		}	
	}
	
	if($domain=="pengawas"){
		$query=mysql_query("select * from data_pengawas where username='$username' and password='$password'");
		$cek=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		$id_pengawas=$row['id_pengawas'];
		
		if($cek){
			$_SESSION['username']=$username;
			$_SESSION['id_pengawas']=$id_pengawas;
			$_SESSION['waktu']=date("Y-m-d H:i:s");
			$_SESSION['domain']=$domain;
			
			?><script language="javascript">document.location.href="home.php";</script><?php
			
		}else{
			?><script language="javascript">document.location.href="index.php?status=Gagal Login";</script><?php
		}
	}
	
}else{
	unset($_POST['login']);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SISLAPRO (Sistem Hasil Laporan Project)</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$(document).pngFix( );
	});
</script>
</head>
<body id="login-bg" onLoad="document.postform.elements['username'].focus();"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
    	<p align="center"><font face="verdana" size="2" color="#333333"><?php  if(isset($_GET['status'])){ echo "&laquo;".$_GET['status']."&raquo;"; }?></font></p>
        <p>&nbsp;</p>
        <form action="index.php" method="post" name="postform">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text"  class="login-inp" name="username"/></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value="************"  name="password" onFocus="this.value=''" class="login-inp" /></td>
		</tr>
        <tr>
			<th>Akses</th>
			<td>
             <select name="domain" class="styledselect">
            	<option value="admin"> ADMIN </option>
                <option value="pengawas"> PENGAWAS </option>
            </select>
            </td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login" name="login"/></td>
		</tr>
		</table>
        </form>
	</div>
    
    
    
 	<!--  end login-inner -->
	<div class="clear"></div>
 </div>
 <!--  end loginbox -->

</div>
<!-- End: login-holder -->
</body>

</html>