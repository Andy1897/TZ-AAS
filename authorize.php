<?php
// соединяемся с базой
$conn = mysqli_connect("localhost", "root", "", "web4");
// составляем запрос
$query = "SELECT * FROM users WHERE login='" . $_POST['login'] . "' AND password='" . md5($_POST['password']) . "';";
$q = mysqli_query($conn, $query);
$n = mysqli_num_rows($q);
if ($n !== 0) {
    session_start();
    $value = mysqli_fetch_array($q);
    $_SESSION['login'] = $value['login'];
    $_SESSION['message'] = 'Вы успешно авторизованы';
    header("Location: index.php");
} else {
    header("Location: /index.php?is_out=2");
}
mysqli_close();
?>