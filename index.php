<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body align='center'>
<?php 
include("sql_connect.php");
function checkspecial($string) 
{	
	if (preg_match('/[^a-zA-Z0-9]/', $string)) 
	{		
		return false;	
	} 
	else 
	{		
		return true;
	}
}
?>
<form method="POST" action="#" name="loginForm">
	<table align="center" class="ust_bosluk">
		<tr>
			<td colspan='2' align='center'><h3 class="logo">ANCSoft Stok Takip v1.0</h3></td>
		</tr>
		<tr align='right'>
			<td>Kullanıcı Adı</td>
			<td> : <input type="text" name="user_id"/></td>
		</tr>
		<tr align='right'>
			<td>Parola</td>
			<td> : <input type="password" name="user_pw"/></td>
		</tr>
		<tr>
			<td align="right" colspan='2'><input type='submit' name="gonder" value="Giriş Yap"/></td>
		</tr>
	</table>
</form>

<?php
if(isset($_POST['gonder']))
{
	if(empty($_POST['user_id']) or empty($_POST['user_pw']))
	{
		echo "<p align='center'>Kullanıcı Adı ve Parola Alanları Boş Bırakılamaz!</p>";
	}
	else
	{
		$user_id = $_POST['user_id'];
		$user_pw = $_POST['user_pw'];
		if(!checkspecial($user_id))
		{
			echo "<p align='center'>Geçersiz Karakter Girişi Algılandı.</p>";
		}		
		else if(!checkspecial($user_pw))
		{
			echo "<p align='center'>Geçersiz Karakter Girişi Algılandı.</p>";
		}
		else
		{
			$arama = mysql_query("SELECT * FROM admins WHERE user_id = '$user_id' and user_pw = '$user_pw'");
			if(mysql_num_rows($arama) != 0)
			{
				session_start();
				$_SESSION['user'] = 1;
				echo "<p align='center'>Hoşgeldiniz Sayın Zorlu</p>";
				echo "<script>window.location.href='default.php';</script>";
			}
			else
			{
				echo "<p align='center'>Giriş Reddedildi.!</p>";
			}
		}
	}
}
?>
</body>
</html>