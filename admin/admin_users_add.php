<?php require_once 'admin_security_check.php';?>

<html> 
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Админка</title>

	<link rel="stylesheet" type="text/css" href="/css/admin.css">
</head>
<body> 
	<div id="container"> 
		<div id="content"> 
			<div class="cont"> 
				<div class="forma"> 
				<h1>Добавление пользователя</h1>
				<form action="admin_users_add.php" method="post">
						login<br />
						<input type="text1" name="login" />
						<br />
                        ФИО<br />
                        <input type="text1" name="name" /><br />
                        телефон<br />
                        <input type="text1" name="phone" /><br />
                        адрес<br />
                        <input type="text1" name="address" /><br />

						пароль<br />
						<input type="password" name="password" />
						<br />
						Почта<br />
						<input type="email" name="email" /><br />
						isadmin<br />
						<input type="number" name="isadmin" />
						<br />
						<input type="submit" name="ok" value="  OK  " />
				</form>
				<?PHP

				if (isset($_POST['login']) and (isset($_POST['password'])))
					$br = mysqli_query($conn,"INSERT INTO users SET login='". $_POST['login']."', 
					name='". $_POST['name']."',
					phone='". $_POST['phone']."',
					address='". $_POST['address']."',
					password = '".md5(trim($_POST['password']))."', 
					isadmin='". $_POST['isadmin']."', 
					email='". $_POST['email']."'");
				if ($br)
					echo '<span style=\'color:blue;\'>Пользователь успешно добавлен</span>';
				?>
                    <div class="edit"> <a href="admin.php"><p>Назад</p></a></div>
				</div> 
			</div> 
		</div> 
	</div>
</body>
</html> 