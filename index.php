<!DOCTYPE html>
<html>
<head>
	<title>LOGIN ACP RESTORAN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<h1><br/></h1>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
			<br/>
						<br/>
                        <td><select name="hak_akses">
					<option value="admin">Admin
					<option value="waiter">Waiter
					<option value="kasir">Kasir
					<option value="owner">Owner
					<option value="pelanggan">Pelanggan
					</select>
			 		</td>
		<br><br><br><br>
 <center><a href="register.php">Create Your Account</a> or <a href="#">Forgot Password</a></center>
			<br/>
						
		</form>
		
	</div>
 
 
</body>
</html>