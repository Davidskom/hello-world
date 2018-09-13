<?php
	include ("conn.php");
	$query=mysql_query("select * from users where username = '".$_POST['u']."' and password = '".md5($_POST['p'])."'");
	$q = mysql_num_rows($query);
	
	if($q > 0){
		while($r=mysql_fetch_array($query)){
			if($r['level']=="2"){
				session_start();
				$_SESSION['u'] = $r['username'];
				header("location:index.php?l=barang");
			}else{
				$_SESSION['u'] = $r['username'];
				header("location:index1.php");
			}
		}
	}else{
		header("location:login.php?error=bm");
	}
?>