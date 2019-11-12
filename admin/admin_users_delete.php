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
				<h1>Удаление пользователей</h1>
				<?PHP
                $query = "SELECT * FROM users";
                $results = mysqli_query($conn, $query);
                $results = mysqli_fetch_all($results, MYSQLI_ASSOC);
                ?>

				<form action="admin_users_delete.php" method="post">
					ID пользователя для удаления<br />
					<input type="number" name="post_id" />
					<br /><input type="submit" name="ok" value="  OK  " />
					
				<?PHP
				$id = (int)$_POST['post_id'];
				$sql = "DELETE FROM users WHERE id=$id";
				
				if (isset($_POST['post_id']))
					$br = mysqli_query($conn,$sql);
				if ($br)
					echo
                     '<span style=\'color:blue;\'> <br> Пользователь успешно удален</span>';
				?>
				<table align="center" border="1">
                    <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>password</th>
                        <th>email</th>
                        <th>isadmin</th>
                    </tr>
                    <?PHP foreach ($results as $result): ?>
                        <tr>
                            <td><?= $result['id'] ?></td>
                            <td><a href="admin_users_edit.php?user_id=<?= $result['id'] ?>"><?= $result['login'] ?></a></td>
                            <td><?= $result['password'] ?></td>
                            <td><?= $result['email'] ?></td>
                            <td><?= $result['isadmin'] ?></td>
                        </tr>
                    <?PHP endforeach; ?>
                </table>
				</div>
                <div class="edit"> <a href="admin.php"><p>Главное меню</p></a></div>
			</div> 
		</div> 
	</div>
</body>
</html> 