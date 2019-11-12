<?php
	//безопастность на каждой странице
	session_start();
	// соединяемся с базой
	$conn = mysqli_connect("localhost", "root", "", "web4"); 
	// составляем запрос
	$query = "SELECT isadmin FROM users WHERE login='". $_SESSION['login']."';";
	$result = mysqli_query($conn, $query);
	$result = mysqli_fetch_assoc($result); 
	if($result['isadmin']!=1)
	{
		header("Location: /index.php?is_out=3"); // если юзер не найден, то снова на страницу авторизации
		exit();
	}
?>