<?PHP
session_start();
session_destroy();
header("Location: /index.php?is_out=1");
?>