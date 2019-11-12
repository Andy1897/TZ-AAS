<?php require_once 'admin_security_check.php'; ?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Админка</title>
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
</head>
<body>
<div id="container">
    <div id="content">
        <div class="cont">
            <div class="forma">
                <h1>Редактированние пользователей</h1>
                <?PHP
                $query = "SELECT * FROM users";
                $results = mysqli_query($conn, $query);
                $results = mysqli_fetch_all($results, MYSQLI_ASSOC);
                ?>

                <table align="center" border="1">
                    <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>FIO</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>password</th>
                        <th>email</th>
                        <th>isadmin</th>
                    </tr>
                    <?PHP foreach ($results as $result): ?>
                        <tr>
                            <td><?= $result['id'] ?></td>
                            <td><a href="admin_users_edit.php?user_id=<?= $result['id'] ?>"><?= $result['login'] ?></a></td>
                            <td><?= $result['name'] ?></td>
                            <td><?= $result['phone'] ?></td>
                            <td><?= $result['address'] ?></td>
                            <td><?= $result['password'] ?></td>
                            <td><?= $result['email'] ?></td>
                            <td><?= $result['isadmin'] ?></td>
                        </tr>
                    <?PHP endforeach; ?>
                </table>
                <?PHP
                if ((isset ($_GET['user_id']))) {
                    $query = "SELECT * FROM users WHERE id = " . $_GET['user_id'];
                    $edit = mysqli_query($conn, $query);
                    $edit = mysqli_fetch_row($edit);
//var_dump($edit);
                    ?>
                    <br/> <a> Внесите изменения:</a>
                    <form action="admin_users_edit.php" method="POST">
                        <label>
                            <input type="hidden"  name="id"  value="<?= $edit[0] ?>">
                        </label>
                        <label>
                            <input type="text" name="login" placeholder="логин" value="<?= $edit[1] ?>">
                        </label>
                        <label>
                            <input type="text" name="name" placeholder="ФИО" value="<?= $edit[2] ?>">
                        </label>
                        <label>
                            <input type="text" name="phone" placeholder="телефон" value="<?= $edit[3] ?>">
                        </label>
                        <label>
                            <input type="text" name="address" placeholder="адресс" value="<?= $edit[4] ?>">
                        </label>
                        <label>
                            <input type="text" name="password" placeholder="пароль" value="">
                        </label>
                        <label>
                            <input type="text" name="email" placeholder="email" value="<?= $edit[6] ?>">
                        </label>
                        <label>
                            <input type="text" name="isadmin" placeholder="1|0"value="<?= $edit[7] ?>">
                        </label>
                        <input type="submit" name="ok" value="  Ok  "/>
                    </form>

                    <?PHP
                }
                if ((isset ($_POST))) {
//                    var_dump ($_POST);
                    $id = $_POST['id'];
                    $br = mysqli_query($conn,"UPDATE users SET
						login = '". $_POST['login']."',
						name='". $_POST['name']."',
					    phone='". $_POST['phone']."',
					    address='". $_POST['address']."',
						password = '".md5(trim($_POST['password']))."',
						email = '". $_POST['email']."',
						isadmin = '". $_POST['isadmin']."'
					WHERE
						id = ".$id.";");

                    if ($br) {

                        echo "<span style='color:blue;'>Данные обновлены</span>";
//                        header("Location: http://web4/admin/admin_users_edit.php");
                    }
                }

                ?>
                <div class="edit"> <a href="admin.php"><p>Назад</p></a></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>